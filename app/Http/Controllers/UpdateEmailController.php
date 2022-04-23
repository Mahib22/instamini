<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateEmailController extends Controller
{
    //
    public function edit()
    {
        return view('profile.update-email');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
        ]);

        $user->update([
            'email' => $request->email,
        ]);

        return back()->with('status', 'Email berhasil diperbarui');
    }
}
