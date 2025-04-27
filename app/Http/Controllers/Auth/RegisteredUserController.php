<?php

namespace App\Http\Controllers\Auth;

use App\Models\Address;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $userData = $request->only(['name', 'email', 'password']);
        $userData['password'] = Hash::make($request->password);

        $user = User::create($userData);

        $addressData = $request->input('address');
        $addressData['user_id'] = $user->id;
        Address::create($addressData);

        event(new Registered($user));

        Auth::login($user);

        return redirect(config('app.home'));
    }
}
