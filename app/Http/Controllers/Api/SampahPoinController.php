<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sampah;
use App\Models\Poin;
use Illuminate\Http\Request;

class SampahPoinController extends Controller {
    public function getSampah() {
        return response()->json(Sampah::all(), 200);
    }

    public function storeSampah(Request $request) {
        $sampah = Sampah::create($request->all());
        return response()->json($sampah, 201);
    }

    public function getPoin() {
        return response()->json(Poin::all(), 200);
    }

    public function storePoin(Request $request) {
        $poin = Poin::create($request->all());
        return response()->json($poin, 201);
    }
}