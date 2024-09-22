<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class PublicController extends Controller
{
    //

    public function showHome(): View{
        return view('home');
    }
}
