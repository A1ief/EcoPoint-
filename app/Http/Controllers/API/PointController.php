<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PointController extends Controller
{
    /**
     * Display a listing of poin (Admin/SuperAdmin only).
     */
    public function index()
    {
        $poin = Point::with(['user', 'sampah'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Poin retrieved successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Store a newly created poin.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:tb_user,id_user',
            'id_sampah' => 'required|exists:tb_sampah,id_sampah',
            'status' => 'required|in:pending,approved,rejected',
            'berat' => 'required|integer|min:1',
            'aksi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $poin = Point::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Poin created successfully',
            'data' => $poin
        ], 201);
    }

    /**
     * Display the specified poin.
     */
    public function show($id)
    {
        $poin = Point::with(['user', 'sampah'])->find($id);

        if (!$poin) {
            return response()->json([
                'success' => false,
                'message' => 'Poin not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Poin retrieved successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Update the specified poin.
     */
    public function update(Request $request, $id)
    {
        $poin = Point::find($id);

        if (!$poin) {
            return response()->json([
                'success' => false,
                'message' => 'Poin not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_user' => 'sometimes|required|exists:tb_user,id_user',
            'id_sampah' => 'sometimes|required|exists:tb_sampah,id_sampah',
            'status' => 'sometimes|required|in:pending,approved,rejected',
            'berat' => 'sometimes|required|integer|min:1',
            'aksi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $poin->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Poin updated successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Remove the specified poin.
     */
    public function destroy($id)
    {
        $poin = Point::find($id);

        if (!$poin) {
            return response()->json([
                'success' => false,
                'message' => 'Poin not found'
            ], 404);
        }

        $poin->delete();

        return response()->json([
            'success' => true,
            'message' => 'Poin deleted successfully'
        ], 200);
    }

    /**
     * Get poin by user (Admin/SuperAdmin can view any user)
     */
    public function getByUser($id_user)
    {
        $poin = Point::where('id_user', $id_user)->with(['sampah'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Poin retrieved successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Get total poin by user (Admin/SuperAdmin can view any user)
     */
    public function getTotalByUser($id_user)
    {
        $totalPoin = Point::where('id_user', $id_user)
                        ->where('status', 'approved')
                        ->sum('berat');

        $pendingPoin = Point::where('id_user', $id_user)
                          ->where('status', 'pending')
                          ->sum('berat');

        $rejectedPoin = Point::where('id_user', $id_user)
                            ->where('status', 'rejected')
                            ->sum('berat');

        return response()->json([
            'success' => true,
            'message' => 'Total poin retrieved successfully',
            'data' => [
                'id_user' => $id_user,
                'total_approved' => $totalPoin,
                'total_pending' => $pendingPoin,
                'total_rejected' => $rejectedPoin,
                'grand_total' => $totalPoin,
            ]
        ], 200);
    }

    /**
     * Update poin status (approve/reject) - Admin/SuperAdmin only
     */
    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:approved,rejected',
            'aksi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $poin = Point::find($id);

        if (!$poin) {
            return response()->json([
                'success' => false,
                'message' => 'Poin not found'
            ], 404);
        }

        $poin->update([
            'status' => $request->status,
            'aksi' => $request->aksi ?? ($request->status === 'approved' ? 'Disetujui oleh admin' : 'Ditolak oleh admin')
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Poin status updated successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Get current user's poin (for regular users)
     */
    public function getMyPoin(Request $request)
    {
        $poin = Point::where('id_user', $request->user()->id_user)
                    ->with(['sampah'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        return response()->json([
            'success' => true,
            'message' => 'Your poin retrieved successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Get current user's total poin (for regular users)
     */
    public function getMyTotal(Request $request)
    {
        $userId = $request->user()->id_user;
        
        $totalPoin = Point::where('id_user', $userId)
                        ->where('status', 'approved')
                        ->sum('berat');

        $pendingPoin = Point::where('id_user', $userId)
                          ->where('status', 'pending')
                          ->sum('berat');

        $rejectedPoin = Point::where('id_user', $userId)
                            ->where('status', 'rejected')
                            ->sum('berat');

        return response()->json([
            'success' => true,
            'message' => 'Your total poin retrieved successfully',
            'data' => [
                'total_approved' => $totalPoin,
                'total_pending' => $pendingPoin,
                'total_rejected' => $rejectedPoin,
                'grand_total' => $totalPoin,
            ]
        ], 200);
    }
}
