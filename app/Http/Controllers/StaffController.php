<?php

namespace App\Http\Controllers;

use App\Models\Malfunction;
use App\Models\Product;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $categoryIds = $request->get('categories');
        $searchArray = $request->get('search');

        if (empty($categoryIds) && ($searchArray[0] == null || $searchArray[0] === '')) {
            $products = Product::simplePaginate(5);
        } else if (!empty($categoryIds) && ($searchArray[0] == null || $searchArray[0] === '')) {
            $products = Product::whereIn('category', $categoryIds)->simplePaginate(5);
        } else if (!empty($categoryIds) && !($searchArray[0] == null || $searchArray[0] === '')) {
            $search = $searchArray[0];
            if (substr($search, -1) === '*') {
                $search = rtrim($search, '*');
                $products = Product::whereIn('category', $categoryIds)->where('info', 'LIKE', "% {$search}%")->simplePaginate(5);
            } else {
                $products = Product::whereIn('category', $categoryIds)->where('info', 'LIKE', "% $search %")->simplePaginate(5);
            }
        } else if (empty($categoryIds) && !($searchArray[0] == null || $searchArray[0] === '')) {
            $search = $searchArray[0];
            if (substr($search, -1) === '*') {
                $search = rtrim($search, '*');
                $products = Product::where('info', 'LIKE', "% {$search}%")->simplePaginate(5);
            } else {
                $products = Product::where('info', 'LIKE', "% $search %")->simplePaginate(5);
            }
        }



        return view('staff/staffProductsList', ['products' => $products])->render();
    }

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
        return view('/staff/catalog', ['navbarView' => $navbarView, 'cssFile' => $cssFile, 'categories' => $categories]);
    }



    // public function viewStaffMalfunction() : View {
    //         $javascript = 'js/staff/operationsMalfunction.js';
    //         $navbarView = 'staff/navbarStaff2';
    //         $cssFile = asset('css/navUser.css');
    //         return view('staff/basicViewStaff', ['navbarView' => $navbarView, 'cssFile' => $cssFile, 'javascript' => $javascript]);
    // }
    // public function viewStaffSolution() : View {
    //         $navbarView = 'staff/navbarStaff2';
    //         $cssFile = asset('css/navUser.css');
    //         return view('staff/basicViewStaff', ['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    // }



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
