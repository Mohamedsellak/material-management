<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('profile.index');
    }

    public function editEmail()
    {
        return view('profile.edit-email');
    }

    public function editPassword()
    {
        return view('profile.edit-password');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        $user = User::where('email', session('user')->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password Incorrect');
        }

        $user->email = $request->email;
        $user->save();

        // Update the session with the new user data
        session()->put('user', $user);

        return redirect()->route('profile.index')->with('success', 'Email updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:4|confirmed',
        ]);

        $user = User::where('email', session('user')->email)->first();

        if (!$user || !Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Your Current Password Incorrect');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Update the session with the new user data
        session()->put('user', $user);

        return redirect()->route('profile.index')->with('success', 'Password updated successfully');
    }

}
