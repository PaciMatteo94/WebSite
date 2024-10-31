<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stabilimenti;
use App\Models\Product;

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
        $categories = Category::all();
        $navbarView = 'layouts/navUser';
        $cssFile = asset('css/navUser.css'); //asset = funzione base di laravel per creare l'url completo, si riferisce ai file nella cartella public
        return view('home',compact('categories'), ['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
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



    public function catalog(): View{
        $navbarView = 'layouts/navUser';
        $cssFile = asset('css/navUser.css');
        $categories = Category::all();
        return view('catalog',['navbarView'=>$navbarView, 'cssFile'=>$cssFile, 'categories'=>$categories]);
    }

    public function show($id)
    {
        $navbarView = 'layouts/navUser';
        $cssFile = asset('css/navUser.css');
        $product = Product::with(['malfunctions', 'solutions'])->find($id);
        return view('productShow', [
            'navbarView' => $navbarView,
            'cssFile' => $cssFile,
            'product' => $product,
            'malfunctions' => $product->malfunctions, // Passa i malfunzionamenti alla view
            'solutions' => $product->solutions,       // Passa le soluzioni alla view
        ])->render();
    }

}
