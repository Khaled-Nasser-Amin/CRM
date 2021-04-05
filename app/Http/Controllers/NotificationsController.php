<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function NumberOfUnreadNotifications(){
        return auth()->user()->unreadNotifications->count();
    }

    public function markAllAsRead(){
        return auth()->user()->unreadNotifications->markAsRead();
    }
    public function DeleteNotifications(){
         auth()->user()->notifications()->delete();
         return redirect()->back()->with(['success' => 'All Notifications Deleted Successfully']);
    }



}
