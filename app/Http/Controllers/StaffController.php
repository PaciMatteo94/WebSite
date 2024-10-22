<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function staff(): View{
        return view('staffTecnicoProve');
    }
}
