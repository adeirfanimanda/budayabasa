<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgotpassword()
    {
        return view('auth.forgot-password', [
            'app' => Application::all(),
            'title' => 'Lupa Kata Sandi'
        ]);
    }

    public function resetpassword()
    {
        return view('auth.reset-password', [
            'app' => Application::all(),
            'title' => 'Reset Kata Sandi'
        ]);
    }
}
