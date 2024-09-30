<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stabilimenti;

class PublicController extends Controller
{
    // $userLevel = auth()->user()->level;

    // Scegli la navbar in base al livello dell'utente
    // switch ($userLevel) {
    //     case 'admin':
    //         $navbarView = 'layouts.navadmin';
    //         break;
    //     case 'tecnico':
    //         $navbarView = 'layouts.navtecnico';
    //         break;
    //     default:  // Per livello utente normale
    //         $navbarView = 'layouts.navutente';
    //         break;
    // }

    

    public function showHome(): View{
        $navbarView = 'layouts/navutente';
        $cssFile = asset('css/navstyle.css'); //asset = funzione base di laravel per creare l'url completo, si riferisce ai file nella cartella public
        return view('catalogohome', ['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
        // view = funzione base di laravel per restituire un file che si trova in resources
    }

    public function showInfo(): View{
        $navbarView = 'layouts/navutente';
        $cssFile = asset('css/navstyle.css');
        return view('info',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function showPosition(): View{
        $navbarView = 'layouts/navutente';
        $cssFile = asset('css/navstyle.css');
        return view('posizione',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function login(): View{
        $navbarView = 'layouts/navutente';
        $cssFile = asset('css/navstyle.css');
        return view('login',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function showCatalogo(): View{
        $navbarView = 'layouts/navutente';
        $cssFile = asset('css/navstyle.css');
        return view('catalogo',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }
}
