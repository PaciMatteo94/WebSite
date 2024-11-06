<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Malfunction;
use Illuminate\View\View;
use App\Models\Product;

class PublicController extends Controller
{
    //funzioni per le varie restituzioni view pubbliche
    public function home(): View{
        $categories = Category::all();
        $navbarView = 'general/partialViews/navUser';
        $cssFile = asset('css/navbar.css'); 
        return view('general/home',compact('categories'), ['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
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
