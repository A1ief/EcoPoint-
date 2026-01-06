<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of superadmin.
     */
    public function index()
    {
        $superadmins = Superadmin::with(['user', 'sampah'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Superadmins retrieved successfully',
            'data' => $superadmins
        ], 200);
    }

    /**
     * Store a newly created superadmin.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:tb_user,id_user',
            'id_sampah' => 'required|exists:tb_sampah,id_sampah',
            'id_admin' => 'required|string|max:50|unique:tb_superadmin',
            'nama' => 'required|string|max:100',
            'password' => 'required|string|min:6',
            'email' => 'required|string|email|max:100|unique:tb_superadmin',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $superadmin = Superadmin::create([
            'id_user' => $request->id_user,
            'id_sampah' => $request->id_sampah,
            'id_admin' => $request->id_admin,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Superadmin created successfully',
            'data' => $superadmin
        ], 201);
    }

    /**
     * Display the specified superadmin.
     */
    public function show($id)
    {
        $superadmin = Superadmin::with(['user', 'sampah'])->find($id);

        if (!$superadmin) {
            return response()->json([
                'success' => false,
                'message' => 'Superadmin not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Superadmin retrieved successfully',
            'data' => $superadmin
        ], 200);
    }

    /**
     * Update the specified superadmin.
     */
    public function update(Request $request, $id)
    {
        $superadmin = Superadmin::find($id);

        if (!$superadmin) {
            return response()->json([
                'success' => false,
                'message' => 'Superadmin not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_user' => 'sometimes|required|exists:tb_user,id_user',
            'id_sampah' => 'sometimes|required|exists:tb_sampah,id_sampah',
            'id_admin' => 'sometimes|required|string|max:50|unique:tb_superadmin,id_admin,' . $id . ',id_superadmin',
            'nama' => 'sometimes|required|string|max:100',
            'password' => 'sometimes|required|string|min:6',
            'email' => 'sometimes|required|string|email|max:100|unique:tb_superadmin,email,' . $id . ',id_superadmin',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $dataToUpdate = $request->only(['id_user', 'id_sampah', 'id_admin', 'nama', 'email']);
        
        if ($request->has('password')) {
            $dataToUpdate['password'] = Hash::make($request->password);
        }

        $superadmin->update($dataToUpdate);

        return response()->json([
            'success' => true,
            'message' => 'Superadmin updated successfully',
            'data' => $superadmin
        ], 200);
    }

    /**
     * Remove the specified superadmin.
     */
    public function destroy($id)
    {
        $superadmin = Superadmin::find($id);

        if (!$superadmin) {
            return response()->json([
                'success' => false,
                'message' => 'Superadmin not found'
            ], 404);
        }

        $superadmin->delete();

        return response()->json([
            'success' => true,
            'message' => 'Superadmin deleted successfully'
        ], 200);
    }

    /**
     * Login Superadmin
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $superadmin = Superadmin::where('email', $request->email)->first();

        if (!$superadmin || !Hash::check($request->password, $superadmin->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $superadmin->createToken('admin_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => [
                'superadmin' => $superadmin,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]
        ], 200);
    }
}
