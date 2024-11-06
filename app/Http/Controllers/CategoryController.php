<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $imagePath = public_path($category->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $productsDirectory = public_path('images/' . $category->name);
        if (File::exists($productsDirectory)) {
            File::deleteDirectory($productsDirectory);
        }
        $category->delete();
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Il campo nome è obbligatorio e non può contenere solo spazi.',
            'image.required' => 'L\'immagine è obbligatoria.',
            'image.image' => 'Il file deve essere un\'immagine valida.',
            'image.mimes' => 'L\'immagine deve essere di tipo jpeg, png, jpg o gif.',
            'image.max' => 'L\'immagine non può superare i 2MB.'
        ]);
            $existingCategory = Category::whereRaw('LOWER(name) = ?', [strtolower($request->input('name'))])->first();
            if ($existingCategory) {
                return response()->json(['message' => 'Il nome della categoria è già presente.'], 400);
            }

            $imageName = $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('images/Categorie');
            if (file_exists($destinationPath . '/' . $imageName)) {
                return response()->json(['message' => 'Esiste già un file con lo stesso nome.'], 400);
            }
            $request->file('image')->move(public_path('images/Categorie'), $imageName);
            $category = new Category();
            $category->name = $request->input('name');
            $category->image = 'images/Categorie/' . $imageName; // Salva il percorso dell'immagine come stringa
            $category->save();
            return response()->json(['message' => 'Categoria inserita con successo']);

    }





    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $request->validate([
                'name' => 'nullable|string|max:255',
                'image' => 'nullabel|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],[
                'image.image' => 'Il file deve essere un\'immagine valida.',
                'image.mimes' => 'L\'immagine deve essere di tipo jpeg, png, jpg o gif.',
                'image.max' => 'L\'immagine non può superare i 2MB.'
            
            ]);
            $existingCategory = Category::whereRaw('LOWER(name) = ?', [strtolower($request->input('name'))])->first();
            if ($existingCategory) {
                return response()->json(['message' => 'Il nome della categoria è già presente.'], 400);
            }
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $destinationPath = public_path('images/Categorie');
                if (file_exists($destinationPath . '/' . $imageName)) {
                    return response()->json(['message' => 'Esiste già un file con lo stesso nome.'], 400);
                }
                $oldImagePath = public_path($category->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
                $request->file('image')->move(public_path('images/Categorie'), $imageName);
                $category->image = 'images/Categorie/' . $imageName;
            }

            $category->name = $request->input('name') ?: $category->name;
            $category->save();
            return response()->json(['message' => 'Categoria aggiornata con successo']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([], 404);
        } catch (\Exception $e) {
            return response()->json([], 500);
        }
    }
}
