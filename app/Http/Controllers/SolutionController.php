<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Solution;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $prodotto = Product::find($id);
        $datas = $prodotto->solutions;
        return view('staff/removeOption', ['datas' => $datas])->render();    }

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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $solution = new Solution();
        $solution->malfunction_id = $id;
        $solution->title = $request->get('title');
        $solution->description = $request->get('description');
        $solution->save();
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
        $solution = Solution::findOrFail($id);

        // Controlla i valori e, se vuoti, mantieni i valori attuali
        $solution->title = $request->input('title') ?: $solution->title;
        $solution->description = $request->input('description') ?: $solution->description;
    
        $solution->save();
    
        return response()->json(['success' => true, 'message' => 'Solution updated successfully']);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Solution::destroy($id);
    }
}
