<?php

namespace App\Http\Controllers;

use App\Models\Superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return response()->json(Superadmin::all(), 200);
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'id_admin' => 'required|unique:tb_superadmin,id_admin',
            'nama'     => 'required|string',
            'email'    => 'required|email|unique:tb_superadmin,email',
            'password' => 'required|min:6'
        ]);

        $admin = Superadmin::create([
            'id_admin' => $request->id_admin,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['message' => 'Admin baru berhasil didaftarkan', 'data' => $admin], 201);
    }

    public function loginAdmin(Request $request)
    {
        return response()->json(['message' => 'Login Admin Berhasil'], 200);
    }

    public function indexSuper()
    {
        return response()->json(Superadmin::where('id_admin', 'SA01')->get(), 200);
    }

   
    public function loginSuper(Request $request)
    {
        
        return response()->json(['message' => 'Login Superadmin Berhasil'], 200);
    }
}