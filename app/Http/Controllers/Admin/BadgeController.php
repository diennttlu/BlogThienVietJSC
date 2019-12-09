<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class BadgeController extends Controller
{
    public function index() {
        $badges = User::where('role', 0)->orderBy('point', 'DESC')->paginate(10);

        return view('admin.badges.index', compact('badges'));
    }
}
