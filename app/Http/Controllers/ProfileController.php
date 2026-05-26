<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nim' => 'required|string|unique:users,nim,' . $user->id,
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|confirmed|min:8';
            $rules['current_password'] = 'required|current_password';
        }

        $data = $request->validate($rules);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        unset($data['current_password']);

        if ($request->hasFile('photo')) {
            $request->validate(['photo' => 'image|mimes:jpg,jpeg,png|max:2048']);
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $user->update($data);

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
