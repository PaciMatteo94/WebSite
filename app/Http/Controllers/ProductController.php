<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use function Laravel\Prompts\search;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryIds = $request->get('categories');
        $searchArray = $request->get('search');
        if($searchArray[0]==""|| empty($searchArray)){
            $products = Product::whereIn('category', $categoryIds)->simplePaginate(3);
        }else{
                $search= $searchArray[0];
                if(!empty($categoryIds)){
                    $products = Product::whereIn('category', $categoryIds)->where('name', 'LIKE', "%{$search}%")->simplePaginate(3);
                }else{
                    $products = Product::where('name', 'LIKE', "%{$search}%")->simplePaginate(3);
                }
                
        }
        return view('productsList', ['products' => $products])->render();
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
