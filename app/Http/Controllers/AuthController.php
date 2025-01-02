<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
        }

        if (Hash::check($request->password, $user->password)) {

            session()->put('user', $user);

            if($user->role == 'admin'){
                return to_route('dashboard');
            }else if($user->role == 'fonctionnaire'){
                return to_route('fonctionnaire-reclamations.index');
            }

        }
        return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
    }


    public function logout()
    {
        session()->forget('user');
        return to_route('welcome');
    }
}
