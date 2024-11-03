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
    public function create(): View
    {
        $navbarView = 'general/partialViews/navUser';
        $cssFile = asset('css/navUser.css');
        return view('general/login', ['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    }


    public function store(LoginRequest $request): RedirectResponse {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            $role = auth()->user()->role;

            switch ($role) {
                case 'technician': return redirect()->route('home');
                case 'staff': return redirect()->route('viewStaffHome');
                case 'admin': return redirect()->route('adminHome');
                default: return redirect('/');
            }
        } catch (ValidationException $e) {
            return redirect()->route('login')->withErrors([
                'login' => 'Le credenziali inserite non sono corrette. Riprova.'
            ]);
        }
    }

    public function destroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    //
}
