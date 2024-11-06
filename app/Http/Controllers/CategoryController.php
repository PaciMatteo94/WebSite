<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //Funzione per il salvataggio di una nuova categoria
    public function store(Request $request)
    {
        //Validazione dei dati con messaggi di errori in caso di errore di validazione
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ], [

            'name.required' => 'Il campo nome è obbligatorio e non può contenere solo spazi.',
            'image.required' => 'L\'immagine è obbligatoria.',
            'image.image' => 'Il file deve essere un\'immagine valida.',
            'image.mimes' => 'L\'immagine deve essere di tipo jpeg, png, jpg o gif.',
            'image.max' => 'L\'immagine non può superare i 1MB.',
        ]);

        //Controllo se esiste gia il nome nella tabella ignorando maiuscole e minuscole, se esiste, ritorno un messaggio di errore
        $existingCategory = Category::whereRaw('LOWER(name) = ?', [strtolower($request->input('name'))])->first();
        if ($existingCategory) {
            return response()->json(['message' => 'Il nome della categoria è già presente.'], 400);
        }

        /*
        - Estraggo il nome originale della foto e imposto il percorso
        - Controllo se all'interno della cartella percorso vi sia già un'immagine con lo stesso nome, in caso affermativo invio un messaggio di errore
        - Nel caso non vi siano immagini con lo stesso nome salvo l'immagine nella cartella e procedo a creare la nuova categoria del database
        */
        $imageName = $request->file('image')->getClientOriginalName();
        $destinationPath = public_path('images/Categorie');
        if (file_exists($destinationPath . '/' . $imageName)) {
            return response()->json(['message' => 'Esiste già un file con lo stesso nome.'], 400);
        }
        $request->file('image')->move(public_path('images/Categorie'), $imageName);
        $category = new Category();
        $category->name = $request->input('name');
        $category->image = 'images/Categorie/' . $imageName;
        $category->save();

        return response()->json(['message' => 'Categoria inserita con successo']);
    }




    //funzione di update di una categoria
    public function update(Request $request, $id)
    {


        $request->validate(
            [
                'name' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'image.image' => 'Il file deve essere un\'immagine valida.',
                'image.mimes' => 'L\'immagine deve essere di tipo jpeg, png, jpg o gif.',
                'image.max' => 'L\'immagine non può superare i 2MB.'

            ]
        );
        //Controllo come sopra se il nome della categoria già esiste ignorando il caso in cui si ripassa il nome della categoria che si sta modificando 
        $category = Category::findOrFail($id);
        if (
            $request->input('name') && Category::whereRaw('LOWER(name) = ?', [strtolower($request->input('name'))])
            ->where('id', '!=', $category->id)
            ->exists()
        ) {
            return response()->json(['message' => 'Il nome della categoria è già presente.'], 400);
        }

        /*
        Se la richiesta ha un immagine si controlla se esiste gia un file con lo stesso nome nella cartella.
        In caso affermativo si invia un messaggio di errore
        In caso negativo si estrare il path della vecchia immagine e si elimina la vecchia foto e si aggiunge quella nuova
        */
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

        //si inserisce il nuovo nome o si tiene quello vecchio e si salva
        $oldname = $category->name;
        $newName = $request->input('name') ?: $category->name;
        $oldCategoryDirectoryPath = public_path('images/' . $oldname);
        $newCategoryDirectoryPath = public_path('images/' . $newName);
        if (File::exists($oldCategoryDirectoryPath)) {
            File::move($oldCategoryDirectoryPath, $newCategoryDirectoryPath);
        }
        $category->name = $request->input('name') ?: $category->name;
        $category->save();
        return response()->json(['message' => 'Categoria aggiornata con successo']);
    }

    //funzione che distrugge la categoria nel db con le eventuali immagini sia della categoria stessa sia dei prodotti associati alla categoria
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
}
