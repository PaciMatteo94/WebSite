<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function admin(): View
    {
        $navbarView = 'admin/navbarAdmin';
        $cssFile = asset('css/navUser.css');
        return view('admin/adminProva', ['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    }

    public function adminProdotti(): View
    {
        $navbarView = 'admin/navbarAdmin';
        $cssFile = asset('css/navUser.css');
        return view('admin/prodotti', ['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    }

    public function adminStaff(): View
    {
        $navbarView = 'admin/navbarAdmin';
        $cssFile = asset('css/navUser.css');
        return view('admin/staff', ['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    }

    public function adminTecnici(): View
    {
        $navbarView = 'admin/navbarAdmin';
        $cssFile = asset('css/navUser.css');
        return view('admin/tecnici', ['navbarView' => $navbarView, 'cssFile' => $cssFile]);
    }

    public function insertStaff(): View
    {

        return view('admin/staffInsert');
    }

    public function changeStaff(): View
    {
        $staffMembers = User::where('role', 'staff')->get();
        return view('admin/staffChange', compact('staffMembers'));
    }

    public function removeStaff(): View
    {
        $staffMembers = User::where('role', 'staff')->get();
        return view('admin/staffRemove', compact('staffMembers'));
    }

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


}
