<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function staff(): View{
        $navbarView = 'staff/navbarStaff';
        $cssFile = asset('css/navUser.css');
        return view('/staff/benvenuto',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function remove(): View{
        $navbarView = 'staff/navbarStaff';
        $cssFile = asset('css/navUser.css');
        return view('/staff/rimozione',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function change(): View{
        $navbarView = 'staff/navbarStaff';
        $cssFile = asset('css/navUser.css');
        return view('/staff/cambio',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }

    public function insert(): View{
        $navbarView = 'staff/navbarStaff';
        $cssFile = asset('css/navUser.css');
        return view('/staff/inserimento',['navbarView'=>$navbarView, 'cssFile'=>$cssFile]);
    }
}
