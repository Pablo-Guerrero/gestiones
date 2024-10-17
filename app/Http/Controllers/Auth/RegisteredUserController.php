<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validación de los campos, incluyendo los nuevos: institución, país, dedicación
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'institution' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'dedication' => 'required|string|max:255',
        ]);

        // Creación del usuario con los nuevos campos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'institution' => $request->institution,  // Guardar institución
            'country' => $request->country,          // Guardar país
            'dedication' => $request->dedication,    // Guardar dedicación
        ]);

        // Disparar el evento de registro
        event(new Registered($user));

        // Autenticar al usuario recién registrado
        Auth::login($user);

        // Redireccionar a la página de inicio o dashboard
        return redirect(RouteServiceProvider::HOME);
    }
}
