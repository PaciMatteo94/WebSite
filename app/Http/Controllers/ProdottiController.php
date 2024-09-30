<?php

namespace App\Http\Controllers;

use App\Models\Prodotto;
use Illuminate\Http\Request;

class ProdottiController extends Controller
{
    public function getAllProdotti()
    {
        // Recupero tutti gli stabilimenti dal database
        $prodotti = Prodotto::all();
        return response()->json($prodotti);
    }
}
