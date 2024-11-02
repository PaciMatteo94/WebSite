<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function adminHome(): View
    {
        $navbarView = 'admin/navbarAdmin';
        $cssFile = asset('css/navUser.css');
        return view('admin/adminHome', ['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    }

    //SEZIONE VIEW STAFF
    // public function viewAdminStaff(): View
    // {
    //     $javascript = 'js/admin/operationsStaff.js';
    //     $navbarView = 'admin/navbarAdmin';
    //     $cssFile = asset('css/navUser.css');
    //     return view('admin/basicViewAdmin', ['navbarView' => $navbarView, 'cssFile' => $cssFile, 'javascript' => $javascript]);
    // }

    public function adminStaff(): View
    {
        $javascript = 'js/admin/operationsStaff2.js';
        $navbarView = 'admin/navbarAdmin';
        $cssFile = asset('css/navUser.css');
        return view('admin/basicViewAdmin', ['navbarView' => $navbarView, 'cssFile' => $cssFile, 'javascript' => $javascript]);
    }

    public function listStaff(): View
    {
        $staffUsers = User::where('role', 'staff')
        ->select('id','name', 'surname')
        ->get();
        $technicianUsers = User::where('role', 'technician')
        ->select('id','name', 'surname')
        ->get();
        return view('admin/staff/listStaff', compact('staffUsers', 'technicianUsers'));
    }

    public function insertView(Request $request): View
    {
        $roleType = $request->input('role');
        return view('admin/staff/insertView',compact('roleType'));
    }

    public function show(Request $request, $id): View
    {
        $roleType = $request->input('role');

        if( $roleType == 'technician'){
            $user = DB::table('users')
            ->join('tech_profiles', 'users.id', '=', 'tech_profiles.user_id')
            ->select('users.*', 'tech_profiles.birth_date', 'tech_profiles.specialization','tech_profiles.center_name','tech_profiles.center_address') // Aggiungi i campi che vuoi
            ->where('users.id', $id)
            ->first();

        }else{
            $user = User::find($id);
        }
        return view('admin/staff/show',compact('user','roleType'));
    }

    public function change(Request $request, $id): View
    {
        $roleType = $request->input('role');
        if( $roleType == 'technician'){
            $user = DB::table('users')
            ->join('tech_profiles', 'users.id', '=', 'tech_profiles.user_id')
            ->select('users.*', 'tech_profiles.birth_date', 'tech_profiles.specialization','tech_profiles.center_name','tech_profiles.center_address') // Aggiungi i campi che vuoi
            ->where('users.id', $id)
            ->first();

        }else{
            $user = User::find($id);
        }
        return view('admin/staff/change',compact('user','roleType'));
    }













    public function insertStaff()
    {
        $cssView = asset('css/admin/staff/staffInsert.css'). '?v=' . time();
        $htmlContent = view('admin/staff/staffInsert')->render();
        return response()->json([
            'css' =>  $cssView ,
            'html' => $htmlContent
        ]);
    }

    public function changeStaff()
    {
        $staffMembers = User::where('role', 'staff')->get();
        $cssView = asset('css/admin/staff/staffChange.css'). '?v=' . time();
        $htmlContent = view('admin/staff/staffChange', compact('staffMembers'))->render();
        return response()->json([
            'css' =>  $cssView,
            'html' => $htmlContent
        ]);
    }

    public function removeStaff()
    {
        $staffMembers = User::where('role', 'staff')->get();
        $cssView = asset('css/admin/staff/staffRemove.css'). '?v=' . time();
        $htmlContent = view('admin/staff/staffRemove', compact('staffMembers'))->render();
        return response()->json([
            'css' =>  $cssView,
            'html' => $htmlContent
        ]);

    }



    //SEZIONE VIEW PRODOTTI

    public function listCategory(): View{
        $categories = Category::all();
         return view('admin/product/listCategory', compact('categories'));
    }


    public function viewAdminProduct(): View
    {
        $javascript = 'js/admin/operationsProduct.js';
        $navbarView = 'admin/navbarAdmin';
        $cssFile = asset('css/navUser.css');
        return view('admin/product/productBasic', ['navbarView' => $navbarView, 'cssFile' => $cssFile, 'javascript' => $javascript]);
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
    public function viewInsertProduct(): View
    {
        return view('admin/product/adminInsert', ['type' => 'product']);
    }

    public function viewCategory($categoryId) : View {
        $category = Category::find($categoryId);
        return view('admin/product/adminView', compact('category'));
    }

    public function viewProduct($productId) : View {
        $product = Product::find($productId);
        return view('admin/product/adminView', compact('product'));
    }

    public function changeViewCategory($categoryId) : View {
        $category = Category::find($categoryId);
        return view('admin/product/adminChangeElement', compact('category'));
    }

    public function changeViewProduct($productId) : View {
        $product = Product::find($productId);
        return view('admin/product/adminChangeElement', compact('product'));
    }



//SEZIONE VIEW TECNICI

    public function viewAdminTech(): View
    {
        $javascript = 'js/admin/operationsTech.js';
        $navbarView = 'admin/navbarAdmin';
        $cssFile = asset('css/navUser.css');
        return view('admin/basicViewAdmin', ['navbarView' => $navbarView, 'cssFile' => $cssFile, 'javascript' => $javascript]);
    }
    public function insertTech()
    {
        return view('admin/tech/techInsert');
    }

    public function changeTech()
    {
        $user = User::where('role', 'technician')->get();
        return view('admin/tech/techChange', compact('user'));
    }
    public function removeTech()
    {
        $techMembers = User::where('role', 'technician')->get();
        return view('admin/tech/techRemove', compact('techMembers'));
    }



    //SEZIONE OPERAZIONI DB

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|confirmed', // Se presente, deve combaciare con password_confirmation
            'birth_date' => 'nullable|date', // Solo per tech
            'specialization' => 'nullable|string|max:255', // Solo per tech
            'center_name' => 'nullable|string|max:255', // Solo per tech
            'center_address' => 'nullable|string|max:255', // Solo per tech
        ]);
        $user = User::findOrFail($id);

        // Campi comuni
        if (!empty($validatedData['name'])) {
            $user->name = $validatedData['name'];
        }
    
        if (!empty($validatedData['surname'])) {
            $user->surname = $validatedData['surname'];
        }
    
        if (!empty($validatedData['username'])) {
            $user->username = $validatedData['username'];
        }
    
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        // Campi specifici del tecnico
        if ($user->role === 'tech') {
            if (!empty($validatedData['birth_date'])) {
                $user->birth_date = $validatedData['birth_date'];
            }
    
            if (!empty($validatedData['specialization'])) {
                $user->specialization = $validatedData['specialization'];
            }
    
            if (!empty($validatedData['center_name'])) {
                $user->center_name = $validatedData['center_name'];
            }
    
            if (!empty($validatedData['center_address'])) {
                $user->center_address = $validatedData['center_address'];
            }
        }
    
        $user->save();
        return;
    }
    public function changeProduct()
    {
        $categories = Product::distinct()->pluck('category');
        $products = Product::select('id', 'name', 'category')->get();
        return response()->json([
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|string',
            'role' => 'required|string',
            'birth_date' => 'nullable|date',
            'specialization' => 'nullable|string',
            'center_name' => 'nullable|string',
            'center_address' => 'nullable|string',
        ]);
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
        if ($user->role === 'tech') {
            $user->techProfile()->create([
                'birth_date' => $data['birth_date'],
                'specialization' => $data['specialization'],
                'center_name' => $data['center_name'],
                'center_address' => $data['center_address'],
            ]);
        }

        return;
    }


    public function destroy(string $id)
    {
        User::destroy($id);
    }

    public function productDestroy($id)
    {
        Product::destroy($id);
    }

    public function storeProduct(){
        return;
    }








    public function operationChangeProduct(Request $request, $productId ){
        $product = Product::findOrFail($productId);
        $category = $product->category;
        $basePath = "images/{$category}/";
    $thumbnailPath = "images/{$category}/thumbnail/";
    if ($request->hasFile('image')) {
        // Elimina l'immagine esistente, se presente
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // Carica la nuova immagine e salva il percorso nel database
        $newImagePath = $request->file('image')->store($basePath, 'public');
        $product->image = $newImagePath;
    }
    if ($request->hasFile('thumbnail')) {
        // Elimina la thumbnail esistente, se presente
        if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
            Storage::disk('public')->delete($product->thumbnail);
        }

        // Carica la nuova thumbnail e salva il percorso nel database
        $newThumbnailPath = $request->file('thumbnail')->store($thumbnailPath, 'public');
        $product->thumbnail = $newThumbnailPath;
    }
    $product->name = $request->input('name') ?? $product->name;
    $product->info = $request->input('info') ?? $product->info;
    $product->usage_techniques = $request->input('usage_techniques') ?? $product->usage_techniques;
    $product->installation_mode = $request->input('installation_mode') ?? $product->installation_mode;
    $product->save();
    return;
    }

}





