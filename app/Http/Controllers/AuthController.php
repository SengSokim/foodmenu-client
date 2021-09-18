<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function submitRegister(Request $request)
    {
        $result = $this->api_post('portal/auth/register', $request->all());
        if ($result->success == false) {
            return back()->withInput(request()->except('password'))->with('error', self::getErrorMessage($result->message));
        }

        session()->put('auth', $result->data);
        
        return redirect()->to('portal');
    }

    public function login()
    {
        return view('home.auth.login');
    }

    public function submitLogin(Request $request)
    {
        $result = $this->api_post('portal/auth/login', $request->all());
        if ($result->success == false) {
            return back()->withInput(request()->except('password'))->with('error', self::getErrorMessage($result->message));
        }

        session()->put('auth', $result->data);
        
        return redirect()->to('portal');
    }

    public function logout()
    {
        return self::clearAuth();
    }
}
