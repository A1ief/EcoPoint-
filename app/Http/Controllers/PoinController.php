<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use Illuminate\Http\Request;

class PoinController extends Controller
{
    public function index()
    {
        return response()->json(Poin::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user'   => 'required|exists:tb_user,id_user',
            'id_sampah' => 'required|exists:tb_sampah,id_sampah',
            'status'    => 'required|string',
            'berat'     => 'required|string',
            'aksi'      => 'required|string'
        ]);

        $poin = Poin::create($request->all());
        return response()->json([
            'message' => 'Poin berhasil diverifikasi oleh admin',
            'data' => $poin
        ], 201);
    }
}