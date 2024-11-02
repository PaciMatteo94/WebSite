<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $role =$request->input('element');
        $commonData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|string',
        ]);
        if($role =='staff'){
        // Crea utente staff
        $user = User::create([
            'name' => $commonData['name'],
            'surname' => $commonData['surname'],
            'username' => $commonData['username'],
            'password' => bcrypt($commonData['password']),
            'role' => $role,
        ]);
        }else{
            $extraData = $request->validate([
                'birth_date' => 'nullable|date',
                'specialization' => 'nullable|string',
                'center_name' => 'nullable|string',
                'center_address' => 'nullable|string',
            ]);
            $user = User::create([
                'name' => $commonData['name'],
                'surname' => $commonData['surname'],
                'username' => $commonData['username'],
                'password' => bcrypt($commonData['password']),
                'role' => $role,
            ]);
    
            // Associa i dati tech_profile all'utente
            $user->techProfile()->create([
                'birth_date' => $extraData['birth_date'],
                'specialization' => $extraData['specialization'],
                'center_name' => $extraData['center_name'],
                'center_address' => $extraData['center_address'],
            ]);
        }
            return response()->json(['message'=>'Utente aggiunto correttamente']);

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
        $user = User::findOrFail($id);
        $commonData = $request->validate([
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'username' => 'nullable|string|unique:users',
            'password' => 'nullable|string',
        ]);
        $user->update([
            'name' => $commonData['name'] ?? $user->name,
            'surname' => $commonData['surname'] ?? $user->surname,
            'username' => $commonData['username'] ?? $user->username,
            'password' => isset($commonData['password']) ? bcrypt($commonData['password']) : $user->password,
        ]);
        if ($user->role === 'technician') {
            // Validazione dei campi aggiuntivi per il tecnico
            $extraData = $request->validate([
                'birth_date' => 'nullable|date',
                'specialization' => 'nullable|string',
                'center_name' => 'nullable|string',
                'center_address' => 'nullable|string',
            ]);
            $user->techProfile()->updateOrCreate(
                [], // Condizione di corrispondenza: aggiorna la riga esistente o creane una nuova
                [
                    'birth_date' => $extraData['birth_date'] ?? $user->techProfile->birth_date,
                    'specialization' => $extraData['specialization'] ?? $user->techProfile->specialization,
                    'center_name' => $extraData['center_name'] ?? $user->techProfile->center_name,
                    'center_address' => $extraData['center_address'] ?? $user->techProfile->center_address,
                ]
            );
        }
        
        

    
        return response()->json(['message'=>'Utente aggiornato con successo']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
    }
}
