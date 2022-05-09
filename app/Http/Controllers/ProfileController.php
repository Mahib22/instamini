<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            abort(404);
        }

        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'username' => 'required|alpha_dash|min:5|max:20|unique:users,username,' . $user->id,
            'fullname' => 'required|max:50',
            'bio' => 'required|max:150',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = $user->avatar;
        if ($request->avatar) {
            $avatarImage = $request->avatar;
            $imageName = $user->username . '-' . time() . '.' . $avatarImage->extension();
            $avatarImage->move(public_path('img/avatar'), $imageName);
        }

        $user->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'bio' => $request->bio,
            'avatar' => $imageName,
        ]);

        return back()->with('status', 'Profile berhasil diperbarui');
    }

    public function follow($following_id)
    {
        $user = auth()->user();

        if ($user->following->contains($following_id)) {
            $user->following()->detach($following_id);
            $message = ['status' => 'UNFOLLOW'];
        } else {
            $user->following()->attach($following_id);
            $message = ['status' => 'FOLLOW'];
        }

        return response()->json($message);
    }
}
