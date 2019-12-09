<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function read(Request $request) {
        if ($request->ajax()) {
            $notification = Notification::where('noti_id', $request->id)->first();
            $notification->read_at = Carbon::now();
            $notification->save();
        }
    }
}
