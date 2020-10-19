<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NotificationsController extends Controller
{
    public function getIndex(){
        return view('dashboard_notifications');
    }
}
