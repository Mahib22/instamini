<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index($username)
    {
        $user = User::with('posts')->where('username', $username)->first();
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

            $this->cancelNotify($user, $following_id);
        } else {
            $user->following()->attach($following_id);
            $message = ['status' => 'FOLLOW'];

            $this->notify($user, $following_id);
        }

        return response()->json($message);
    }

    private function notify($user, $following_id)
    {
        $target_id = User::find($following_id)->id;
        if ($user->id !== $target_id) {
            Notification::create([
                'message' => $user->username . ' mulai mengikuti anda.',
                'user_id' => $target_id,
                'post_id' => $user->id,
            ]);
        }
    }

    private function cancelNotify($user, $following_id)
    {
        $target_id = User::find($following_id)->id;
        if ($user->id !== $target_id) {
            Notification::where('user_id', $target_id)->where('post_id', $user->id)
                ->where('message', 'like', '%mengikuti%')->delete();
        }
    }
}
