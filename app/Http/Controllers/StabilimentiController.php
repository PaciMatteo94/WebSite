<?php

namespace App\Http\Controllers;
use App\Models\Stabilimenti;
use Illuminate\Http\Request;

class StabilimentiController extends Controller
{
    public function getAllStabilimenti()
    {
        // Recupero tutti gli stabilimenti dal database
        $stabilimenti = Stabilimenti::all();
        return response()->json($stabilimenti);
    }
}