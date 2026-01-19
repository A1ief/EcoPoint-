<?php

namespace App\Http\Controllers\API;

use App\Models\Point;
use App\Models\User;
use App\Models\Sampah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PointController extends Controller
{
    /**
     * Display a listing of poin transactions.
     */
    public function index(Request $request)
    {
        $query = Point::with(['user', 'sampah'])
            ->filter([
                'search' => $request->search,
                'status' => $request->status,
                'id_user' => $request->id_user
            ]);

        // Calculate totals
        $totalPoints = $query->count();
        $totalBerat = $query->sum('berat');
        $totalPoin = $query->sum('point');

        // Paginate results
        $perPage = $request->per_page ?? 10;
        $poins = $query->latest()->paginate($perPage);

        return response()->json([
            'status' => true,
            'message' => 'Poin transactions retrieved successfully',
            'data' => $poins->items(),
            'meta' => [
                'current_page' => $poins->currentPage(),
                'total' => $poins->total(),
                'per_page' => $poins->perPage(),
                'total_pages' => $poins->lastPage(),
                'total_points' => $totalPoints,
                'total_berat' => $totalBerat,
                'total_poin' => $totalPoin
            ]
        ], 200);
    }

    /**
     * Store a newly created poin transaction.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:tb_user,id_user',
            'id_sampah' => 'required|exists:tb_sampah,id_sampah',
            'berat' => 'required|numeric|min:0.1',
            'deskripsi' => 'required|string|max:255',
            'point' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $poin = Point::create([
            'id_user' => $request->id_user,
            'id_sampah' => $request->id_sampah,
            'status' => 'pending', // Default status
            'berat' => $request->berat,
            'deskripsi' => $request->deskripsi,
            'point' => $request->point
        ]);

        // Load relationships
        $poin->load(['user', 'sampah']);

        return response()->json([
            'status' => true,
            'message' => 'Poin transaction created successfully',
            'data' => $poin
        ], 201);
    }

    /**
     * Display the specified poin transaction.
     */
    public function show($id)
    {
        $poin = Point::with(['user', 'sampah'])->find($id);

        if (!$poin) {
            return response()->json([
                'status' => false,
                'message' => 'Poin transaction not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Poin transaction retrieved successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Update the specified poin transaction.
     */
    public function update(Request $request, $id)
    {
        $poin = Point::find($id);

        if (!$poin) {
            return response()->json([
                'status' => false,
                'message' => 'Poin transaction not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_user' => 'sometimes|required|exists:tb_user,id_user',
            'id_sampah' => 'sometimes|required|exists:tb_sampah,id_sampah',
            'status' => 'sometimes|required|in:pending,approved,rejected',
            'berat' => 'sometimes|required|numeric|min:0.1',
            'deskripsi' => 'sometimes|required|string|max:255',
            'point' => 'sometimes|required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $poin->update($request->all());
        $poin->load(['user', 'sampah']);

        return response()->json([
            'status' => true,
            'message' => 'Poin transaction updated successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Remove the specified poin transaction.
     */
    public function destroy($id)
    {
        $poin = Point::find($id);

        if (!$poin) {
            return response()->json([
                'status' => false,
                'message' => 'Poin transaction not found'
            ], 404);
        }

        $poin->delete();

        return response()->json([
            'status' => true,
            'message' => 'Poin transaction deleted successfully'
        ], 200);
    }

    /**
     * Approve a poin transaction.
     */
    public function approve($id)
    {
        $poin = Point::find($id);

        if (!$poin) {
            return response()->json([
                'status' => false,
                'message' => 'Poin transaction not found'
            ], 404);
        }

        $poin->update(['status' => 'approved']);
        $poin->load(['user', 'sampah']);

        // Here you can add logic to update user's total points
        // Example: $user = User::find($poin->id_user);
        // $user->increment('total_points', $poin->point);

        return response()->json([
            'status' => true,
            'message' => 'Poin transaction approved successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Reject a poin transaction.
     */
    public function reject($id)
    {
        $poin = Point::find($id);

        if (!$poin) {
            return response()->json([
                'status' => false,
                'message' => 'Poin transaction not found'
            ], 404);
        }

        $poin->update(['status' => 'rejected']);
        $poin->load(['user', 'sampah']);

        return response()->json([
            'status' => true,
            'message' => 'Poin transaction rejected successfully',
            'data' => $poin
        ], 200);
    }

    /**
     * Get statistics for dashboard.
     */
    public function statistics()
    {
        $totalTransactions = Point::count();
        $totalBerat = Point::sum('berat');
        $totalPoints = Point::sum('point');
        $pendingCount = Point::where('status', 'pending')->count();
        $approvedCount = Point::where('status', 'approved')->count();
        $rejectedCount = Point::where('status', 'rejected')->count();

        return response()->json([
            'status' => true,
            'data' => [
                'total_transactions' => $totalTransactions,
                'total_berat' => $totalBerat,
                'total_points' => $totalPoints,
                'pending_count' => $pendingCount,
                'approved_count' => $approvedCount,
                'rejected_count' => $rejectedCount,
                'status_distribution' => [
                    'pending' => $pendingCount,
                    'approved' => $approvedCount,
                    'rejected' => $rejectedCount
                ]
            ]
        ], 200);
    }
}