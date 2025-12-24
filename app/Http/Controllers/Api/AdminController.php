<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function indexAdmin()
    {
        return response()->json(Admin::all(), 200);
    }

    public function storeAdmin(Request $request)
    {
        $admin = Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['message' => 'Admin baru berhasil ditambahkan', 'data' => $admin], 201);
    }

    public function loginAdmin(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json(['message' => 'Email atau Password Admin salah'], 401);
        }
        $token = $admin->createToken('admin_token')->plainTextToken;
        return response()->json(['message' => 'Login Admin Berhasil', 'token' => $token], 200);
    }


    public function indexSuperadmin()
    {
        return response()->json(Superadmin::all(), 200);
    }

    public function loginSuperadmin(Request $request)
    {
        $super = Superadmin::where('email', $request->email)->first();
        if (!$super || !Hash::check($request->password, $super->password)) {
            return response()->json(['message' => 'Email atau Password Superadmin salah'], 401);
        }
        $token = $super->createToken('superadmin_token')->plainTextToken;
        return response()->json(['message' => 'Login Superadmin Berhasil', 'token' => $token], 200);
    }
}