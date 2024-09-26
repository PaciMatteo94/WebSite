<?php

namespace App\Http\Controllers;
use App\Models\Stabilimenti;
use Illuminate\Http\Request;

class StabilimentiController extends Controller
{
    public function index()
    {
        // Recupera tutte le regioni e stabilimenti
        $stabilimenti = Stabilimenti::all();
        
        return view('posizione', compact('stabilimenti'));
    }

    public function getByRegione($regione)
    {
        // Recupera gli stabilimenti per la regione selezionata
        $stabilimenti = Stabilimenti::where('regione', $regione)->get();
        
        return response()->json($stabilimenti);
    }
}
