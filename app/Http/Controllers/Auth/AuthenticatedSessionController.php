<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    //restituisce la view della login
    public function create(): View
    {
        $navbarView = 'general/partialViews/navUser';
        $cssFile = asset('css/navbar.css');
        return view('general/login', ['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    }

    //funzione per la validazione dell'utente e la creazione della sesisone 
    public function store(LoginRequest $request): RedirectResponse {
        try {
            //esegue il metodo authenticate sulla richiesta->in caso di fallita auntenticazione genera la validation exception
            $request->authenticate();
            //dopo l'autenticazione rigenera l'ID della sessione per prevenire attacchi di session fixation
            $request->session()->regenerate();
            //recupera il ruolo dell'utente autenticato
            $role = auth()->user()->role;

            //in base al ruolo reinvia alla coretta rotta
            switch ($role) {
                case 'technician': return redirect()->route('home');
                case 'staff': return redirect()->route('viewStaffHome');
                case 'admin': return redirect()->route('adminHome');
                default: return redirect('/');
            }
        } catch (ValidationException $e) {
            // nel caso le credenziali sono errate, verrà inviato un messaggio di errore che si visualizza nella schermata del login 
            return redirect()->route('login')->withErrors($e->errors());
        }
    }

    public function destroy(Request $request): RedirectResponse {
        //chiama il metodo di authenticazione di laravel e disconette l'utente
        Auth::guard('web')->logout();
        //elimina tutti i dati della sessione dell'utente
        $request->session()->invalidate();
        //rigenera il csrf token per la session dell'utente
        $request->session()->regenerateToken();
        //reinderizza alla home page
        return redirect('/');
    }

}
