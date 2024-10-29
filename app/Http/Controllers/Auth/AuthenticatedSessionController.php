<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create(): View{
        $navbarView = 'layouts/navUser';
        $cssFile = asset('css/navUser.css');
        return view('login',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }


    public function store(LoginRequest $request): RedirectResponse {

        $request->authenticate();
        $request->session()->regenerate();

//        return redirect()->intended(RouteServiceProvider::HOME);
        
        $role = auth()->user()->role;
        
        switch ($role) {
            // case 'admin': return redirect()->route('admin');
            //     break;
            case 'technician': return redirect()->route('home');
                break;
                case 'staff': return redirect()->route('staffHome');
                break;
                case 'admin': return redirect()->route('adminHome');
            default: return redirect('/');
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
