<?php

namespace App\Http\Controllers;

use App\Models\Malfunction;
use Illuminate\Http\Request;
use App\Models\Solution;
use Illuminate\View\View;

class SolutionController extends Controller
{

    //restituzione della soluzioni riguardanti ad un malfunzionamento
    public function index($malfunctionId): View
    {
        $solutions = Solution::where('malfunction_id', $malfunctionId)->select('id', 'title')
            ->get();
        $malfunction = Malfunction::select('title')->find($malfunctionId);
        return view('general/partialViews/listSolutionsPublic', ['solutions' => $solutions, 'malfunction' => $malfunction]);
    }

    //Funzione per il salvataggio di un nuova soluzione
    public function store($id, Request $request)
    {
        //validazione delle informazioni passate
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => 'required|string',
        ], [
            'title.required' => 'Il campo titolo è obbligatorio.',
            'title.string' => 'Il campo titolo deve essere una stringa valida.',
            'title.max' => 'Il campo titolo non può superare i 255 caratteri.',
            'description.required' => 'Il campo descrizione è obbligatorio.',
            'description.string' => 'Il campo descrizione deve essere una stringa valida.',
        ]);
        //salvataggio delle informazioni
        $solution = new Solution();
        $solution->malfunction_id = $id;
        $solution->title = $request->get('title');
        $solution->description = $request->get('description');
        $solution->save();
        return response()->json(['message' => 'Soluzione inserita con successo']);
    }

    //funzione per la modifica delle informaizoni di una soluzione
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
        try {
            $solution = Solution::findOrFail($id);
            $solution->title = $request->input('title') ?: $solution->title;
            $solution->description = $request->input('description') ?: $solution->description;
            $solution->save();
            return response()->json(['message' => 'Soluzione aggiornata con successo']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([], 404);
        } catch (\Exception $e) {
            return response()->json([], 500);
        }
    }

    //funzione per la rimozione della soluzione
    public function destroy($id)
    {
        Solution::destroy($id);
    }
}
