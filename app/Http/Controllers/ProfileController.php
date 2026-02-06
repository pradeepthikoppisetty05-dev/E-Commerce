<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('profileindex', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
        ]);

        $user = $request->user();
        $user->update($request->only('name', 'email'));

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $request->user()->password)) {
            return redirect()
                ->back()
                ->with('error', 'Current password is incorrect');
        }

        $request->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Password changed successfully');
    }
}
