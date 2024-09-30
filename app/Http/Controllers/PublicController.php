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
        $cssFile = asset('css/navstyle.css');
        return view('catalogohome', ['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function showInfo(): View{
        $navbarView = 'layouts/navutente';
        $cssFile = asset('css/navstyle.css');
        return view('info',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function showPosition(): View{
        $navbarView = 'layouts/navutente';
        $cssFile = asset('css/navstyle.css');
        $stabilimenti = Stabilimenti::all();
        return view('posizione',['navbarView'=>$navbarView, 'cssFile'=>$cssFile,  'stabilimenti' => $stabilimenti]);
    }
}
