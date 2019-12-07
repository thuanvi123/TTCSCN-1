<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getLogout() {
        Auth::logout();
        return redirect('/');
    }
}
