<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    public function index()
    {
        return response()->json(Sampah::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user'  => 'required|exists:tb_user,id_user',
            'kriteria' => 'required|string',
            'berat'    => 'required|integer',
            'jenis'    => 'required|string',
            'foto'     => 'nullable|string' // Bisa dikembangkan untuk upload file
        ]);

        $sampah = Sampah::create($request->all());
        return response()->json([
            'message' => 'Data sampah berhasil ditambahkan',
            'data' => $sampah
        ], 201);
    }
}