<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    public function index()
    {
        //dd(NotificationResource::collection(auth()->user()->readNotifications()));
        return [
            'read' => NotificationResource::collection(auth()->user()->readNotifications()),
            //'unread' => NotificationResource::collection(auth()->user()->unReadNotifications()),
        ];
    }

    public function markAsRead(Request $request) {
        auth()->user()->notification->where(id, $request->id)->markAsRead();
    }
}
