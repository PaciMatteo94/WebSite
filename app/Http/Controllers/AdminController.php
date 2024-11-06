<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //Funzioni che restituiscono le view di base delle pagine
    public function adminHome(): View
    {
        $navbarView = 'admin/navbarAdmin';
        $cssFile = asset('css/navbar.css');
        $user = Auth::user();
        return view('admin/adminHome', compact('user'),['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    }

    public function viewAdminProduct(): View
    {
        $javascript = 'js/admin/operationsProduct.js';
        $navbarView = 'admin/navbarAdmin';
        $contentCss = asset('css/admin/product/productSection.css');
        $cssFile = asset('css/navbar.css');
        return view('admin/basicViewAdmin', ['contentCss'=>$contentCss,'navbarView' => $navbarView, 'cssFile' => $cssFile, 'javascript' => $javascript]);
    }
    public function adminStaff(): View
    {
        $javascript = 'js/admin/operationsStaff.js';
        $navbarView = 'admin/navbarAdmin';
        $contentCss = asset('css/admin/staff/staffSection.css');
        $cssFile = asset('css/navbar.css');
        return view('admin/basicViewAdmin', ['contentCss'=>$contentCss,'navbarView' => $navbarView, 'cssFile' => $cssFile, 'javascript' => $javascript]);
    }


    //Funzioni che restituiscono le view parziali dell'area prodotti
    public function listCategory(): View
    {
        $categories = Category::all();
        return view('admin/product/listCategory', compact('categories'));
    }

    public function listProduct($categoryId): View
    {
        $products = Product::where('category_id', $categoryId)
            ->select('id', 'name')
            ->get();
        return view('admin/product/listProducts', compact('products'));
    }
    public function viewInsertCategory(): View
    {
        return view('admin/product/adminInsert', ['type' => 'category']);
    }
    public function viewCategory($categoryId): View
    {
        $category = Category::find($categoryId);
        return view('admin/product/adminView', compact('category'));
    }

    public function changeViewCategory($categoryId): View
    {
        $category = Category::find($categoryId);
        return view('admin/product/adminChangeElement', compact('category'));
    }
    public function changeViewProduct($productId): View
    {
        $product = Product::find($productId);
        return view('admin/product/adminChangeElement', compact('product'));
    }

    public function viewInsertProduct(): View
    {
        return view('admin/product/adminInsert', ['type' => 'product']);
    }

    public function viewProduct($productId): View
    {
        $product = Product::find($productId);
        return view('admin/product/adminView', compact('product'));
    }


    //funzioni che restiuiscono le view parziali dell'area del personale
    public function listStaff(): View
    {
        $staffUsers = User::where('role', 'staff')
            ->select('id', 'name', 'surname')
            ->get();
        $technicianUsers = User::where('role', 'technician')
            ->select('id', 'name', 'surname')
            ->get();
        return view('admin/staff/listStaff', compact('staffUsers', 'technicianUsers'));
    }

    public function insertView(Request $request): View
    {
        $roleType = $request->input('role');
        return view('admin/staff/insertView', compact('roleType'));
    }

    public function show(Request $request, $id): View
    {
        $roleType = $request->input('role');

        if ($roleType == 'technician') {
            $user = DB::table('users')
                ->join('tech_profiles', 'users.id', '=', 'tech_profiles.user_id')
                ->select('users.*', 'tech_profiles.birth_date', 'tech_profiles.specialization', 'tech_profiles.center_name', 'tech_profiles.center_address') // Aggiungi i campi che vuoi
                ->where('users.id', $id)
                ->first();
        } else {
            $user = User::find($id);
        }
        return view('admin/staff/show', compact('user', 'roleType'));
    }

    public function change(Request $request, $id): View
    {
        $roleType = $request->input('role');
        if ($roleType == 'technician') {
            $user = DB::table('users')
                ->join('tech_profiles', 'users.id', '=', 'tech_profiles.user_id')
                ->select('users.*', 'tech_profiles.birth_date', 'tech_profiles.specialization', 'tech_profiles.center_name', 'tech_profiles.center_address') // Aggiungi i campi che vuoi
                ->where('users.id', $id)
                ->first();
        } else {
            $user = User::find($id);
        }
        return view('admin/staff/change', compact('user', 'roleType'));
    }
}
