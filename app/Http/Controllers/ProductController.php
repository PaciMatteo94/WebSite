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

        if (empty($categoryIds) && ($searchArray[0]==null ||$searchArray[0]==='') ) {
            $products = Product::simplePaginate(5); 
        } else if(!empty($categoryIds) && ($searchArray[0]==null ||$searchArray[0]==='') ){
            $products = Product::whereIn('category', $categoryIds)->simplePaginate(5); 
        } else if(!empty($categoryIds) && !($searchArray[0]==null ||$searchArray[0]==='')){
            $search = $searchArray[0];
            if(substr($search, -1) === '*'){ 
                $search = rtrim($search, '*');
                $products = Product::whereIn('category', $categoryIds)->where('info', 'LIKE',"% {$search}%")->simplePaginate(5);
            } else{
                $products = Product::whereIn('category', $categoryIds)->where('info','LIKE', "% $search %")->simplePaginate(5); 
            }

        } else if(empty($categoryIds) && !($searchArray[0]==null ||$searchArray[0]==='')){
            $search = $searchArray[0];
            if(substr($search, -1) === '*'){
                $search = rtrim($search, '*');
                $products = Product::where('info', 'LIKE', "% {$search}%")->simplePaginate(5); 
            } else{
                $products = Product::where('info','LIKE',"% $search %")->simplePaginate(5); 
            }
        }



        return view('productsList', ['products' => $products])->render();


    }


    public function getInfo(Request $request){

    $info = Product::select('category', 'name')->get();
    return response()->json($info);

    }

    public function getProduct(Request $request){

        $product = Product::whereIn('name', $request)->get();
        return response()->json($product);
    
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
