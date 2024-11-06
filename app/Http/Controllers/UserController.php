<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //funzione per il salvataggio di nuovi membri dello staff
    public function store(Request $request)
    {
        $role = $request->input('element');
    
        // Regole di validazione comuni
        $commonValidationRules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'username' => 'required|string|unique:users|max:255',
            'password' => 'required|string|min:6',
        ];
    
        // Messaggi di errore personalizzati per i campi comuni
        $commonValidationMessages = [
            'name.required' => 'Il campo nome è obbligatorio e non può contenere solo spazi.',
            'name.string' => 'Il nome deve essere una stringa.',
            'name.max' => 'Il nome non può superare i 255 caratteri.',
            
            'surname.required' => 'Il campo cognome è obbligatorio e non può contenere solo spazi.',
            'surname.string' => 'Il cognome deve essere una stringa.',
            'surname.max' => 'Il cognome non può superare i 255 caratteri.',
            
            'username.required' => 'Il campo username è obbligatorio e non può contenere solo spazi.',
            'username.string' => 'L\'username deve essere una stringa.',
            'username.unique' => 'Questo username è già stato usato.',
            'username.max' => 'L\'username non può superare i 255 caratteri.',
            
            'password.required' => 'Il campo password è obbligatorio e non può contenere solo spazi.',
            'password.string' => 'La password deve essere una stringa.',
            'password.min' => 'La password deve essere di almeno 6 caratteri.',
        ];
    
        if ($role === 'staff') {
            // Validazione solo per utenti "staff"
            $request->validate($commonValidationRules, $commonValidationMessages);
        } else {
            // Regole di validazione aggiuntive per gli utenti "tecnici"
            $techValidationRules = array_merge($commonValidationRules, [
                'birth_date' => 'required|date',
                'specialization' => 'required|string|max:255',
                'center_name' => 'required|string|max:255',
                'center_address' => 'required|string|max:255',
            ]);
    
            // Messaggi di errore aggiuntivi per i campi specifici degli utenti "tecnici"
            $techValidationMessages = array_merge($commonValidationMessages, [
                'birth_date.required' => 'Il campo data di nascita è obbligatorio.',
                'birth_date.date' => 'La data di nascita deve essere una data valida.',
                
                'specialization.required' => 'Il campo specializzazione è obbligatorio e non può contenere solo spazi.',
                'specialization.string' => 'La specializzazione deve essere una stringa.',
                'specialization.max' => 'La specializzazione non può superare i 255 caratteri.',
                
                'center_name.required' => 'Il campo nome centro è obbligatorio e non può contenere solo spazi.',
                'center_name.string' => 'Il nome del centro deve essere una stringa.',
                'center_name.max' => 'Il nome del centro non può superare i 255 caratteri.',
                
                'center_address.required' => 'Il campo indirizzo centro è obbligatorio e non può contenere solo spazi.',
                'center_address.string' => 'L\'indirizzo del centro deve essere una stringa.',
                'center_address.max' => 'L\'indirizzo del centro non può superare i 255 caratteri.',
            ]);
    
            $request->validate($techValidationRules, $techValidationMessages);
        }
    
        // Creazione dell'utente in base al ruolo
        $userData = [
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'role' => $role,
        ];
        
        $user = User::create($userData);
    
        // Associazione del profilo tecnico, se necessario
        if ($role !== 'staff') {
            $user->techProfile()->create([
                'birth_date' => $request->input('birth_date'),
                'specialization' => $request->input('specialization'),
                'center_name' => $request->input('center_name'),
                'center_address' => $request->input('center_address'),
            ]);
        }
    
        return response()->json(['message' => 'Utente aggiunto correttamente']);
    }
    
    //funzione per l'aggiornamento delle informazioni dello staff
    public function update(Request $request, string $id)
    {       
        $user = User::findOrFail($id);
        
        $commonData = $request->validate([
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'username' => [
                'nullable',
                'string',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string',
        ], [
            'username.unique' => 'Il nome utente è già stato utilizzato. Scegline un altro.',
        ]);
    
        $user->update([
            'name' => $commonData['name'] ?? $user->name,
            'surname' => $commonData['surname'] ?? $user->surname,
            'username' => $commonData['username'] ?? $user->username,
            'password' => isset($commonData['password']) ? bcrypt($commonData['password']) : $user->password,
        ]);
    
        if ($user->role === 'technician') {
            $extraData = $request->validate([
                'birth_date' => 'nullable|date',
                'specialization' => 'nullable|string',
                'center_name' => 'nullable|string',
                'center_address' => 'nullable|string',
            ]);
            
            $user->techProfile()->updateOrCreate(
                [],
                [
                    'birth_date' => $extraData['birth_date'] ?? $user->techProfile->birth_date,
                    'specialization' => $extraData['specialization'] ?? $user->techProfile->specialization,
                    'center_name' => $extraData['center_name'] ?? $user->techProfile->center_name,
                    'center_address' => $extraData['center_address'] ?? $user->techProfile->center_address,
                ]
            );
        }
    
        return response()->json(['message' => 'Utente aggiornato con successo']);
    }
    
    //funzione rimozione di un utente
    public function destroy(string $id)
    {
        User::destroy($id);
    }
}
