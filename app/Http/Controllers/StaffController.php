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


    //view per i malfunzionamenti

    public function tableMalfuntions($productId)
    {
        $malfunctions = Malfunction::where('product_id', $productId)
            ->select('id', 'title')
            ->get();
        return view('staff/partialViews/malfunctionsTable', ['malfunctions' => $malfunctions]);
    }
    public function viewInsertMalfunction(): View
    {
        return view('staff/partialViews/insert', ['type' => 'malfunction']);
    }

    public function viewMalfunction($malfunctionId): View
    {
        $malfunction = Malfunction::find($malfunctionId);
        return view('staff/partialViews/view', compact('malfunction'));
    }

    public function changeMalfunction($malfunctionId): View
    {
        $malfunction = Malfunction::find($malfunctionId);
        return view('staff/partialViews/change', compact('malfunction'));
    }


    //view per le soluzioni
    public function tableSolutions($malfunctionId): View
    {
        $solutions = Solution::where('malfunction_id', $malfunctionId)->select('id', 'title')
            ->get();
        return view('staff/partialViews/solutionsTable', ['solutions' => $solutions]);
    }

    public function viewInsertSolution(): View
    {
        return view('staff/partialViews/insert', ['type' => 'solution']);
    }


    public function viewSolution($solutionId): View
    {
        $solution = Solution::find($solutionId);
        return view('staff/partialViews/view', compact('solution'));
    }



    public function changeSolution($solutionId): View
    {
        $solution = Solution::find($solutionId);
        return view('staff/partialViews/change', compact('solution'));
    }
}
