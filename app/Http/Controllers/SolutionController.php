<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Solution;
use PhpParser\Node\Stmt\TryCatch;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $prodotto = Product::find($id);
        $datas = $prodotto->solutions;
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
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            $solution = new Solution();
            $solution->malfunction_id = $id;
            $solution->title = $request->get('title');
            $solution->description = $request->get('description');
            $solution->save();
            return response()->json(['message' => 'Soluzione inserita con successo']);
        } catch (\Exception $e) {       
            return response()->json([], 500);
        }

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
        try {
            $solution = Solution::findOrFail($id);
            $solution->title = $request->input('title') ?: $solution->title;
            $solution->description = $request->input('description') ?: $solution->description;
            $solution->save();
            return response()->json(['message' => 'Soluzione aggiornata con successo']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([], 404);
        }catch (\Exception $e) {
            return response()->json([], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Solution::destroy($id);
    }
}
