<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

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
        $user = $request->get('user');

        if (empty($categoryIds) && ($searchArray[0] == null || $searchArray[0] === '')) {
            $products = Product::simplePaginate(5);
        } else if (!empty($categoryIds) && ($searchArray[0] == null || $searchArray[0] === '')) {
            $query = Product::query();
            $query->whereIn('category_id', $categoryIds);
            $products = $query->simplePaginate(5);
        } else if (!empty($categoryIds) && !($searchArray[0] == null || $searchArray[0] === '')) {
            $search = $searchArray[0];
            $query = Product::query();
            $query->whereIn('category_id', $categoryIds);
            if (substr($search, -1) === '*') {
                $search = rtrim($search, '*');
                $query->where('info', 'LIKE', "%{$search}%");
                $products = $query->simplePaginate(5);
            } else {
                $query->where('info', 'LIKE', "% $search %");
                $products = $query->simplePaginate(5);
            }
        } else if (empty($categoryIds) && !($searchArray[0] == null || $searchArray[0] === '')) {
            $search = $searchArray[0];
            $query = Product::query();
            if (substr($search, -1) === '*') {
                $search = rtrim($search, '*');
                $query->where('info', 'LIKE', "% {$search}%");
                $products = $query->simplePaginate(5);
            } else {
                $query->where('info', 'LIKE', "% $search %")->simplePaginate(5);
                $products = $query->simplePaginate(5);
            }
        }
        if ($user === 'staff') {
            // Restituisce una view diversa se l'utente è staff
            return view('staff/partialViews/staffProductsList', ['products' => $products])->render();
        }


        return view('productsList', ['products' => $products])->render();
    }


    public function getInfo(Request $request)
    {

        $info = Product::select('id', 'category', 'name')->get();
        return response()->json($info);
    }


    public function getMalfuntionsAndSolutions($productId)
    {
        $product = Product::with('malfunctions', 'solutions')->find($productId);
        if (!$product) {
            return response()->json(['error' => 'Prodotto non trovato'], 404);
        }
        // Mappa i malfunzionamenti e le soluzioni correlate
        $datas = $product->malfunctions->map(function ($malfunction) use ($product) {
            return [
                'id' => $malfunction->id,
                'title' => $malfunction->title,
                'description' => $malfunction->description,
                'solutions' => $product->solutions->where('malfunction_id', $malfunction->id)->map(function ($solution) {
                    return [
                        'id' => $solution->id,
                        'title' => $solution->title,
                        'description' => $solution->description
                    ];
                })
            ];
        });
        return response()->json($datas);
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
    public function store(Request $request, $category_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'info' => 'required|string',
            'usage_techniques' => 'nullable|string',
            'installation_mode' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);
        $categoryName = Category::where('id', $category_id)->value('name');
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/' . $categoryName), $imageName);
            $imagePath = 'images/' . $categoryName . '/' . $imageName;
        }
        if ($request->hasFile('thumbnail')) {
            $thumbnailName = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path('images/' . $categoryName . '/Thumbnails'), $thumbnailName);
            $thumbnailPath = 'images/' . $categoryName . '/Thumbnails/' . $thumbnailName;
        }
        $product = new Product();
        $product->category_id = $category_id;
        $product->name = $request->input('name');
        $product->info = $request->input('info');
        $product->usage_techniques = $request->input('usage_techniques');
        $product->installation_mode = $request->input('installation_mode');
        $product->image = $imagePath;
        $product->thumbnail = $thumbnailPath;
        $product->save();
        return response()->json(['message' => 'Prodotto inserito con successo']);
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
    public function update(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $request->validate([
            'name' => 'required|string|max:255',
            'info' => 'required|string',
            'usage_techniques' => 'nullable|string',
            'installation_mode' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);
        if ($request->hasFile('image')) {
            $category_id = $product->category_id;
            $categoryName = Category::where('id', $category_id)->value('name');
            $oldImagePath = public_path( $product->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/' . $categoryName), $imageName);
            $imagePath = 'images/' . $categoryName . '/' . $imageName;
            $product->image = $imagePath;
        }

        if ($request->hasFile('thumbnail')) {
            $category_id = $product->category_id;
            $categoryName = Category::where('id', $category_id)->value('name');
            $oldThumbnailPath = public_path($product->thumbnail);
            if (File::exists($oldThumbnailPath)) {
                File::delete($oldThumbnailPath);
            }
            $thumbnailName = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path('images/' . $categoryName . '/Thumbnails'), $thumbnailName);
            $thumbnailPath = 'images/' . $categoryName . '/Thumbnails/' . $thumbnailName;
            $product->thumbnail = $thumbnailPath;
        }
        $product->name = $request->input('name') ?: $product->name;
        $product->info = $request->input('info') ?: $product->info;
        $product->usage_techniques = $request->input('usage_techniques') ?: $product->usage_techniques;
        $product->installation_mode = $request->input('installation_mode') ?: $product->installation_mode;


        $product->save();

        return response()->json(['message' => 'Prodotto inserito con successo']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path( $product->image);
        $thumbnailPath = public_path($product->thumbnail);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    
        if (File::exists($thumbnailPath)) {
            File::delete($thumbnailPath);
        }
        $product->delete();
    }
}
