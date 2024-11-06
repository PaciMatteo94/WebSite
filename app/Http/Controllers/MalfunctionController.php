<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Malfunction;

class MalfunctionController extends Controller
{
    //Restituisce la view parziale per l'elenco dei malfunzionamenti
    public function index($malfunctionId)
    {
        $malfunction = Malfunction::find($malfunctionId);
        return view('general/partialViews/malfunctionsPublicView', compact('malfunction'));
    }

    //Funzione che salva un nuovo malfunzionamento
    public function store($id, Request $request)
    {
        //Validazione delle informazioni passate con eventuali messaggi di errore specifici
            $request->validate([
                'title' => [
                    'required',
                    'string',
                    'max:255'
                ],
                'description' => 'required|string',
            ], [
                'title.required' => 'Il campo titolo è obbligatorio e non può contenere solo spazi.',
                'title.string' => 'Il campo titolo deve essere una stringa valida.',
                'title.max' => 'Il campo titolo non può superare i 255 caratteri.',
                'description.required' => 'Il campo descrizione è obbligatorio e non può contenere solo spazi.',
                'description.string' => 'Il campo descrizione deve essere una stringa valida.',
            ]);

            //creazione e salvataggio delle informazioni
            $malfunction = new Malfunction();
            $malfunction->product_id = $id;
            $malfunction->title = $request->get('title');
            $malfunction->description = $request->get('description');
            $malfunction->save();
    
            return response()->json(['message' => 'Malfunzionamento inserito con successo']);
        
    }

    //Funzione per la modifica delle informaizoni dei malfunzionamenti 
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => [
                'nullable',
                'string',
                'max:255'
            ],
            'description' => 'nullable|string',
        ], [
            'title.string' => 'Il campo titolo deve essere una stringa valida.',
            'title.max' => 'Il campo titolo non può superare i 255 caratteri.',
            'description.string' => 'Il campo descrizione deve essere una stringa valida.',
        ]);
        //ricerco il malfunzionamento e modifico i campi nel caso non siano nulli, sennò lascio le vecchie info
        try {
            $malfunction = Malfunction::findOrFail($id);
            $malfunction->title = $request->input('title') ?: $malfunction->title;
            $malfunction->description = $request->input('description') ?: $malfunction->description;
            $malfunction->save();
            return response()->json(['message' => 'Malfunzionamento aggiornato con successo']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([], 404);
        }catch (\Exception $e) {
            return response()->json([], 500);
        }


    }

    //Distrugge il malfunzionamento e le soluzioni collegate a esso
    public function destroy(string $id)
    {
        Malfunction::destroy($id);
    }
}
