<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Método para listar los usuarios con sus roles
    public function index()
    {
        // Obtener todos los usuarios con sus roles
        $users = User::with('roles')->get();
        return response()->json($users);
    }

    // Método para asignar un rol a un usuario
    public function assignRole(Request $request, User $user)
    {
        // Validar que el rol existe en la petición
        $request->validate([
            'role' => 'required|exists:roles,name'
        ]);

        // Asignar el rol al usuario
        $user->assignRole($request->role);

        return response()->json(['message' => 'Role assigned successfully']);
    }

    // Método para eliminar un rol de un usuario
    public function removeRole(Request $request, User $user)
    {
        // Validar que el rol existe en la petición
        $request->validate([
            'role' => 'required|exists:roles,name'
        ]);

        // Remover el rol del usuario
        $user->removeRole($request->role);

        return response()->json(['message' => 'Role removed successfully']);
    }
}
