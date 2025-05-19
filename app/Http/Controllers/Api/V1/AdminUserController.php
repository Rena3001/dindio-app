<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // 🔍 Bütün istifadəçiləri qaytar
    public function index(Request $request)
    {
        
        $users = User::all();
        return response()->json($users);
    }


    // 🔍 Tək istifadəçini göstər
    public function show(User $user)
    {
        return response()->json($user, 200);
    }

    // ✏️ İstifadəçini yenilə
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return response()->json([
            'message' => 'İstifadəçi uğurla yeniləndi',
            'user' => $user
        ], 200);
    }

    // ❌ İstifadəçini sil
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'İstifadəçi silindi'
        ], 200);
    }

    // 🔄 Statusu dəyiş (aktiv/deaktiv)
    public function toggleStatus(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();

        return response()->json([
            'message' => 'Status dəyişdirildi',
            'is_active' => $user->is_active
        ], 200);
    }
}
