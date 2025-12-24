<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    // Ambil semua data user
    public function index() {
        return response()->json(User::all(), 200);
    }

    // Tambah user baru (Register)
    public function store(Request $request) {
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);
        return response()->json($user, 201);
    }

    // Detail user berdasarkan ID
    public function show($id) {
        return response()->json(User::findOrFail($id), 200);
    }

    // Update data user
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    // Hapus user
    public function destroy($id) {
        User::destroy($id);
        return response()->json(['message' => 'User dihapus'], 200);
    }
    public function loginUser(Request $request) {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau Password salah'
            ], 401);
        }

        // Membuat token untuk auth
        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json([
            'message' => 'Login Berhasil',
            'token' => $token,
            'data' => $user
        ], 200);
    }
}