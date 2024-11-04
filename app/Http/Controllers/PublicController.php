<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Malfunction;
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
        $navbarView = 'general/partialViews/navUser';
        $cssFile = asset('css/navbar.css'); //asset = funzione base di laravel per creare l'url completo, si riferisce ai file nella cartella public
        return view('general/home',compact('categories'), ['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
        // view = funzione base di laravel per restituire un file che si trova in resources
    }

    public function info(): View{
        $navbarView = 'general/partialViews/navUser';
        $cssFile = asset('css/navbar.css');
        return view('general/info',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function where(): View{
        $navbarView = 'general/partialViews/navUser';
        $cssFile = asset('css/navbar.css');
        return view('general/where',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }



    public function catalog(): View{
        $navbarView = 'general/partialViews/navUser';
        $cssFile = asset('css/navbar.css');
        $categories = Category::all();
        return view('general/catalog',['navbarView'=>$navbarView, 'cssFile'=>$cssFile, 'categories'=>$categories]);
    }

    public function show($id)
    {
        $navbarView = 'general/partialViews/navUser';
        $cssFile = asset('css/navbar.css');
        $product =Product::findOrFail($id);
        $malfunctions = Malfunction::where('product_id', $id)->get();
        return view('general/productShow', [
            'navbarView' => $navbarView,
            'cssFile' => $cssFile,
            'product' => $product,
            'malfunctions' => $malfunctions,
        ])->render();
    }

}
