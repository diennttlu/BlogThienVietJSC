<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('admin')->only('logout');
    }

    public function login() {
        return view('admin.auth.login');
    }

    public function postLogin(AdminLoginRequest $request) {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1]) || Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 2])) {
            return redirect()->route('admin.dashbroad');
        } else {
            return redirect()->route('admin.login_create')->withErrors(['login' => 'Email,Password is Wrong Or Permission is not possible']);
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login_create');
    }
}
