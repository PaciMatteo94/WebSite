<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Malfunction;

class MalfunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $datas = Malfunction::where('product_id', $id)->get();
        return view('staff/removeOption', ['datas' => $datas])->render();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        // Validazione dei dati in arrivo
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $malfunction = new Malfunction();
        $malfunction->product_id = $id;
        $malfunction->title = $request->get('title');
        $malfunction->description = $request->get('description');
        $malfunction->save();
        return;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $malfunction = Malfunction::findOrFail($id);

        // Controlla i valori e, se vuoti, mantieni i valori attuali
        $malfunction->title = $request->input('title') ?: $malfunction->title;
        $malfunction->description = $request->input('description') ?: $malfunction->description;

        $malfunction->save();

        return response()->json(['success' => true, 'message' => 'Malfunction updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Malfunction::destroy($id);
    }
}
