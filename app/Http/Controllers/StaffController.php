<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Malfunction;
use App\Models\Product;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends Controller
{

    public function viewStaffHome(): View
    {
        $navbarView = 'staff/navbarStaff2';
        $cssFile = asset('css/navUser.css');

        return view('/staff/staffHome', ['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    }
    public function viewStaffCatalog(): View
    {
        $navbarView = 'staff/navbarStaff2';
        $cssFile = asset('css/navUser.css');
        $categories = Category::all();
        return view('/staff/catalogStaff', ['navbarView' => $navbarView, 'cssFile' => $cssFile, 'categories' => $categories]);
    }



    public function infoProduct($id)
    {

        $product = Product::with('malfunctions', 'solutions')->find($id);
        if (!$product) {
            return response()->json(['error' => 'Prodotto non trovato'], 404);
        }
        
        // Crea un array per i malfunzionamenti
        $malfunctionsData = $product->malfunctions->map(function ($malfunction) {
            return [
                'id' => $malfunction->id,
                'title' => $malfunction->title,
            ];
        });
        
        // Crea un array per le soluzioni
        $solutionsData = $product->solutions->map(function ($solution) {
            return [
                'id' => $solution->id,
                'title' => $solution->title,
            ];
        });
    
    return view('staff/productInfo', ['malfunctions' => $malfunctionsData->toArray(), 'solutions'=>$solutionsData->toArray()]);
    
    }

    public function viewInsertMalfunction(): View
    {

        return view('staff/malfunction/malfunctionInsert');
    }
    public function viewChangeMalfuction(): View
    {

        return view('staff/malfunction/malfunctionChange');
    }
    public function viewRemoveMalfunction(): View
    {

        return view('staff/malfunction/malfunctionRemove');
    }
}
