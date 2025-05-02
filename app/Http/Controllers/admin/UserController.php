<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Bütün istifadəçilərin siyahısı
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = new User(); // boş bir User obyekti
        return view('admin.users.create', compact('user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        $isAdmin = $request->role === 'admin' ? 1 : 0;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $isAdmin,
            'role' => $request->role

        ]);

        return redirect()->route('admin.users.index')->with('success', 'User successfully created');
    }




    // Edit formu
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Məlumatı yenilə
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
        ]);

        $isAdmin = $request->role === 'admin' ? 1 : 0;

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $isAdmin,
            'role' => $request->role, // bunu əlavə et
        ]);
        

        return redirect()->route('admin.users.index')->with('success', 'User info updated successfully');
    }



    // İstifadəçini sil
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'İstifadəçi silindi');
    }

    // Aktiv / deaktiv et
    public function toggleStatus(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();
        return redirect()->back()->with('success', 'Status dəyişdirildi');
    }
}
