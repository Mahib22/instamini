<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user();
        $notifications = $user->notifications;

        return view('profile.notification', compact('notifications'));
    }

    public function seen()
    {
        //
        $user = auth()->user();
        Notification::where('user_id', $user->id)->update(['is_read' => true]);
        return ['msg' => 'success'];
    }

    public function count()
    {
        //
        $total = auth()->user()->notifications()->where('is_read', 0)->count();
        return ['total' => $total];
    }
}
