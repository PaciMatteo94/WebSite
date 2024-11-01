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



    public function productMalfuntions($productId)
    {

        $malfunctions = Malfunction::where('product_id', $productId)
            ->select('id', 'title')
            ->get();
        return view('staff/malfunctionsTable', ['malfunctions' => $malfunctions]);
    }

    public function malfunctionSolutions($malfunctionId): View
    {
        $solutions = Solution::where('malfunction_id', $malfunctionId)->select('id', 'title')
            ->get();
        return view('staff/solutionsTable', ['solutions' => $solutions]);
    }



    public function viewInsertMalfunction(): View
    {
        return view('staff/partial-views/insert',['type' => 'malfunction']);
    }
    public function viewInsertSolution(): View
    {
        return view('staff/partial-views/insert',['type' => 'solution']);
    }
    public function viewMalfunction($malfunctionId): View
    {
        $malfunction = Malfunction::find($malfunctionId);
        return view('staff/partial-views/view', compact('malfunction'));
    }

    public function viewSolution($solutionId): View
    {
        $solution = Solution::find($solutionId);
        return view('staff/partial-views/view', compact('solution'));
    }

    public function changeMalfunction($malfunctionId): View
    {
        $malfunction = Malfunction::find($malfunctionId);
        return view('staff/partial-views/change', compact('malfunction'));
    }

    public function changeSolution($solutionId): View
    {
        $solution = Solution::find($solutionId);
        return view('staff/partial-views/change', compact('solution'));
    }
}
