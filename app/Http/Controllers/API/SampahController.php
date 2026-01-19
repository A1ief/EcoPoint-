<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SampahController extends Controller
{
    /**
     * Display a listing of sampah (Admin/SuperAdmin only).
     */
    public function index()
    {
        $sampah = Sampah::with(['user', 'poin'])->get();

        return response()->json([
            'status' => true,
            'message' => 'Sampah retrieved status',
            'data' => $sampah
        ], 200);
    }

    /**
     * Store a newly created sampah.
     * User can submit their own waste
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kriteria' => 'required|string|max:100',
            'berat' => 'required|integer|min:1',
            'jenis' => 'required|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Use authenticated user's ID
        $data = [
            'id_user' => $request->user()->id_user,
            'kriteria' => $request->kriteria,
            'berat' => $request->berat,
            'jenis' => $request->jenis,
        ];

        // Handle file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('sampah', $filename, 'public');
            $data['foto'] = $path;
        }

        $sampah = Sampah::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Sampah submitted status',
            'data' => $sampah
        ], 201);
    }

    /**
     * Display the specified sampah.
     */
    public function show($id)
    {
        $sampah = Sampah::with(['user', 'poin'])->find($id);

        if (!$sampah) {
            return response()->json([
                'status' => false,
                'message' => 'Sampah not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Sampah retrieved status',
            'data' => $sampah
        ], 200);
    }

    /**
     * Update the specified sampah.
     */
    public function update(Request $request, $id)
    {
        $sampah = Sampah::find($id);

        if (!$sampah) {
            return response()->json([
                'status' => false,
                'message' => 'Sampah not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_user' => 'sometimes|required|exists:tb_user,id_user',
            'kriteria' => 'sometimes|required|string|max:100',
            'berat' => 'sometimes|required|numeric|min:1',
            'jenis' => 'sometimes|required|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only(['id_user', 'kriteria', 'berat', 'jenis']);

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Delete old file if exists
            if ($sampah->foto && Storage::disk('public')->exists($sampah->foto)) {
                Storage::disk('public')->delete($sampah->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('sampah', $filename, 'public');
            $data['foto'] = $path;
        }

        $sampah->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Sampah updated status',
            'data' => $sampah
        ], 200);
    }

    /**
     * Remove the specified sampah.
     */
    public function destroy($id)
    {
        $sampah = Sampah::find($id);

        if (!$sampah) {
            return response()->json([
                'status' => false,
                'message' => 'Sampah not found'
            ], 404);
        }

        // Delete file if exists
        if ($sampah->foto && Storage::disk('public')->exists($sampah->foto)) {
            Storage::disk('public')->delete($sampah->foto);
        }

        $sampah->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sampah deleted status'
        ], 200);
    }

    /**
     * Get sampah by user (Admin/SuperAdmin can view any user)
     */
    public function getByUser($id_user)
    {
        $sampah = Sampah::where('id_user', $id_user)->with(['poin'])->get();

        return response()->json([
            'status' => true,
            'message' => 'Sampah retrieved status',
            'data' => $sampah
        ], 200);
    }

    /**
     * Get current user's sampah (for regular users)
     */
    public function getMySampah(Request $request)
    {
        $sampah = Sampah::where('id_user', $request->user()->id_user)
                        ->with(['poin'])
                        ->orderBy('created_at', 'desc')
                        ->get();

        return response()->json([
            'status' => true,
            'message' => 'Your sampah retrieved status',
            'data' => $sampah
        ], 200);
    }
}