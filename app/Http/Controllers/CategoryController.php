<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function destroy(string $id)
    {
        Category::destroy($id);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('images'), $imageName);

            }
            $category = new Category();
            $category->name = $request->input('name');
            $category->image = 'images/' . $imageName; // Salva il percorso dell'immagine come stringa
            $category->save();
            return response()->json(['message' => 'Categoria inserita con successo']);
        } catch (\Exception $e) {
            return response()->json([], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $request->validate([
                'name' => 'string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('images', $imageName, 'public');
                $category->image = 'images/' . $imageName;
                
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
