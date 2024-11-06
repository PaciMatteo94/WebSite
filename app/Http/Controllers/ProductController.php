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
            $products = Product::simplePaginate(8);
        } else if (!empty($categoryIds) && ($searchArray[0] == null || $searchArray[0] === '')) {
            $query = Product::query();
            $query->whereIn('category_id', $categoryIds);
            $products = $query->simplePaginate(8);
        } else if (!empty($categoryIds) && !($searchArray[0] == null || $searchArray[0] === '')) {
            $search = $searchArray[0];
            $query = Product::query();
            $query->whereIn('category_id', $categoryIds);
            if (substr($search, -1) === '*') {
                $search = rtrim($search, '*');
                $query->where('info', 'LIKE', "%{$search}%");
                $products = $query->simplePaginate(8);
            } else {
                $query->where('info', 'LIKE', "% $search %");
                $products = $query->simplePaginate(8);
            }
        } else if (empty($categoryIds) && !($searchArray[0] == null || $searchArray[0] === '')) {
            $search = $searchArray[0];
            $query = Product::query();
            if (substr($search, -1) === '*') {
                $search = rtrim($search, '*');
                $query->where('info', 'LIKE', "% {$search}%");
                $products = $query->simplePaginate(8);
            } else {
                $query->where('info', 'LIKE', "% $search %")->simplePaginate(5);
                $products = $query->simplePaginate(8);
            }
        }
        if ($user === 'staff') {
            // Restituisce una view diversa se l'utente è staff
            return view('staff/partialViews/staffProductsList', ['products' => $products])->render();
        }


        return view('general/partialViews/productsList', ['products' => $products])->render();
    }


    public function getInfo(Request $request)
    {

        $info = Product::select('id', 'category', 'name')->get();
        return response()->json($info);
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
            'usage_techniques' => 'required|string',
            'installation_mode' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=500,height=500',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024|dimensions:width=185,height=185',
        ], [
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il nome deve essere una stringa.',
            'name.max' => 'Il nome non può superare i 255 caratteri.',

            'info.required' => 'Il campo informazioni è obbligatorio.',
            'info.string' => 'Le informazioni devono essere una stringa.',

            'usage_techniques.required' => 'Il campo tecniche di utilizzo è obbligatorio.',
            'usage_techniques.string' => 'Le tecniche di utilizzo devono essere una stringa.',

            'installation_mode.required' => 'Il campo modalità di installazione è obbligatorio.',
            'installation_mode.string' => 'La modalità di installazione deve essere una stringa.',

            'image.required' => 'Il campo immagine è obbligatorio.',
            'image.image' => 'Il file immagine deve essere valido.',
            'image.mimes' => 'L\'immagine deve essere di tipo jpeg, png, jpg o gif.',
            'image.max' => 'L\'immagine non può superare i 2MB.',
            'image.dimensions' => 'L\'immagine deve avere una dimensione di 500x500px.',

            'thumbnail.required' => 'Il campo miniatura è obbligatorio.',
            'thumbnail.image' => 'Il file miniatura deve essere valido.',
            'thumbnail.mimes' => 'La miniatura deve essere di tipo jpeg, png, jpg o gif.',
            'thumbnail.max' => 'La miniatura non può superare i 1MB.',
            'thumbnail.dimensions' => 'La miniatura deve avere una dimensione di 185x185px.',
        ]);
        $categoryName = Category::where('id', $category_id)->value('name');
        $imagePath = '';
        $thumbnailPath = '';
        //controllo del nome
        $productExists = Product::where('category_id', $category_id)
            ->where('name', $request->input('name'))
            ->exists();

        if ($productExists) {
            return response()->json(['message' => 'Esiste già un prodotto con lo stesso nome nella stessa categoria.'], 400);
        }
        //parte immagine controllo e storage
        $imageName = $request->file('image')->getClientOriginalName();
        $imageFolderPath = public_path('images/' . $categoryName);
        if (is_dir($imageFolderPath)) {
            // Se la cartella esiste, scansiona i file
            $imageFiles = scandir($imageFolderPath);
            $imageExists = false;
        
            foreach ($imageFiles as $file) {
                // Confronta il nome del file ignorando maiuscole e minuscole
                if (strtolower($file) === strtolower($imageName)) {
                    $imageExists = true;
                    break;
                }
            }
        
            // Se esiste un'immagine con lo stesso nome, restituisci un errore
            if ($imageExists) {
                return response()->json(['message' => 'Esiste già un\'immagine con lo stesso nome nella categoria.'], 400);
            }
        }


        //parte thumbanil controllo che storage
        $thumbnailName = $request->file('thumbnail')->getClientOriginalName();
        // Verifica se il file con lo stesso nome esiste già, ignorando maiuscole/minuscole
        $thumbnailFolderPath = public_path('images/' . $categoryName . '/Thumbnails');
        if (is_dir($thumbnailFolderPath)) {
            // Se la cartella esiste, scansiona i file
            $thumbnailFiles = scandir($thumbnailFolderPath);
            $thumbnailExists = false;
        
            foreach ($thumbnailFiles as $file) {
                // Confronta il nome del file ignorando maiuscole e minuscole
                if (strtolower($file) === strtolower($thumbnailName)) {
                    $thumbnailExists = true;
                    break;
                }
            }
        
            // Se esiste una thumbnail con lo stesso nome, restituisci un errore
            if ($thumbnailExists) {
                return response()->json(['message' => 'Esiste già un\'immagine thumbnail con lo stesso nome nella categoria.'], 400);
            }
        }

        $request->file('image')->move($imageFolderPath, $imageName);
        $imagePath = 'images/' . $categoryName . '/' . $imageName;
        $request->file('thumbnail')->move($thumbnailFolderPath, $thumbnailName);
        $thumbnailPath = 'images/' . $categoryName . '/Thumbnails/' . $thumbnailName;

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
            'name' => 'nullable|string|max:255',
            'info' => 'nullable|string',
            'usage_techniques' => 'nullable|string',
            'installation_mode' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=500,height=500',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024|dimensions:width=185,height=185',
        ], [
            
            'name.string' => 'Il nome deve essere una stringa.',
            'name.max' => 'Il nome non può superare i 255 caratteri.',

            'info.string' => 'Le informazioni devono essere una stringa.',

            'usage_techniques.string' => 'Le tecniche di utilizzo devono essere una stringa.',
            
            'installation_mode.string' => 'La modalità di installazione deve essere una stringa.',
            
            'image.image' => 'Il file immagine deve essere valido.',
            'image.mimes' => 'L\'immagine deve essere di tipo jpeg, png, jpg o gif.',
            'image.max' => 'L\'immagine non può superare i 2MB.',
            'image.dimensions' => 'L\'immagine deve avere una dimensione di 500x500px.',

            'thumbnail.image' => 'Il file miniatura deve essere valido.',
            'thumbnail.mimes' => 'La miniatura deve essere di tipo jpeg, png, jpg o gif.',
            'thumbnail.max' => 'La miniatura non può superare i 1MB.',
            'thumbnail.dimensions' => 'La miniatura deve avere una dimensione di 185x185px.',
        ]);
        if ($request->input('name') && Product::where('category_id', $product->category_id)
                                         ->where('name', $request->input('name'))
                                         ->where('id', '!=', $product->id)
                                         ->exists()) {
    return response()->json(['message' => 'Esiste già un prodotto con lo stesso nome nella stessa categoria.'], 400);
}
        if ($request->hasFile('image')) {
            $category_id = $product->category_id;
            $categoryName = Category::where('id', $category_id)->value('name');

            $imageName = $request->file('image')->getClientOriginalName();
            $imageFolderPath = public_path('images/' . $categoryName);

            // Controlla se esiste già un'immagine con lo stesso nome
            $imageFiles = scandir($imageFolderPath);
            $imageExists = false;
            foreach ($imageFiles as $file) {
                if (strtolower($file) === strtolower($imageName)) {
                    $imageExists = true;
                    break;
                }
            }
        
            if ($imageExists) {
                return response()->json(['message' => 'Esiste già un\'immagine con lo stesso nome nella categoria.'], 400);
            }

            $oldImagePath = public_path($product->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $request->file('image')->move($imageFolderPath, $imageName);
            $imagePath = 'images/' . $categoryName . '/' . $imageName;
            $product->image = $imagePath;
        }

        if ($request->hasFile('thumbnail')) {
            $category_id = $product->category_id;
            $categoryName = Category::where('id', $category_id)->value('name');
            $thumbnailName = $request->file('thumbnail')->getClientOriginalName();
            $thumbnailFolderPath = public_path('images/' . $categoryName . '/Thumbnails');
            
            // Controlla se esiste già un thumbnail con lo stesso nome
            $thumbnailFiles = scandir($thumbnailFolderPath);
            $thumbnailExists = false;
            foreach ($thumbnailFiles as $file) {
                if (strtolower($file) === strtolower($thumbnailName)) {
                    $thumbnailExists = true;
                    break;
                }
            }
        
            if ($thumbnailExists) {
                return response()->json(['message' => 'Esiste già un\'immagine thumbnail con lo stesso nome nella categoria.'], 400);
            }
        
            // Elimina il thumbnail precedente se esiste
            $oldThumbnailPath = public_path($product->thumbnail);
            if (File::exists($oldThumbnailPath)) {
                File::delete($oldThumbnailPath);
            }
        
            // Carica il nuovo thumbnail
            $request->file('thumbnail')->move($thumbnailFolderPath, $thumbnailName);
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
        $imagePath = public_path($product->image);
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
