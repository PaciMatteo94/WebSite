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
    //         $navbarView = 'layouts.navUser';
    //         break;
    // }

    

    public function home(): View{
        $navbarView = 'layouts/navUser';
        $cssFile = asset('css/navUser.css'); //asset = funzione base di laravel per creare l'url completo, si riferisce ai file nella cartella public
        return view('home', ['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
        // view = funzione base di laravel per restituire un file che si trova in resources
    }

    public function info(): View{
        $navbarView = 'layouts/navUser';
        $cssFile = asset('css/navUser.css');
        return view('info',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function where(): View{
        $navbarView = 'layouts/navUser';
        $cssFile = asset('css/navUser.css');
        return view('where',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function login(): View{
        $navbarView = 'layouts/navUser';
        $cssFile = asset('css/navUser.css');
        return view('login',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function catalog(): View{
        $navbarView = 'layouts/navUser';
        $cssFile = asset('css/navUser.css');
        $categories = [
            ['id' => 'MoBo', 'name' => 'Schede Madri'],
            ['id' => 'Cpu', 'name' => 'Processori'],
            ['id' => 'Gpu', 'name' => 'Schede Video'],
            ['id' => 'RAM', 'name' => 'RAM'],
            ['id' => 'Storage', 'name' => 'Storage'],
            ['id' => 'Monitor', 'name' => 'Monitor'],
            ['id' => 'Psu', 'name' => 'Alimentatori'],
            ['id' => 'Cooling', 'name' => 'Dissipatori'],
            ['id' => 'Fan', 'name' => 'Ventole'],
        ];
        return view('catalog',['navbarView'=>$navbarView, 'cssFile'=>$cssFile, 'categories'=>$categories]);
    }
}
