<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function checkPhone(Request $request)
    {
        $res = $this->api_post('admin/auth/check_phone', $request->all());

        if ($res->success == false) {
            return fail($res->message, 200);
        }

        return ok($res->data);
    }

    public function register(Request $request)
    {
        $res = $this->api_post('admin/auth/register', $request->all());

        if ($res->success == false) {
            return fail($res->message, 200);
        }
        session()->put('auth', $res->data);

        return ok($res->data);
    }

    public function submitRegister(Request $request)
    {
        $result = $this->api_post('admin/auth/register', $request->all());
        if ($result->success == false) {
            return back()->withInput(request()->except('password'))->with('error', self::getErrorMessage($result->message));
        }

        session()->put('auth', $result->data);

        return redirect()->to('admin');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function submitLogin(Request $request)
    {
        $result = $this->api_post('admin/auth/login', $request->all());
        
        if ($result->success == false) {
            return back()->withInput(request()->except('password'))->with('error', self::getErrorMessage($result->message));
        }

        session()->put('auth', $result->data);

        return redirect()->to('admin');
    }

    public function loginGet(Request $request)
    {
        $result = $this->api_post('admin/auth/login', $request->all());
        if ($result->success == false) {
            return back()->withInput(request()->except('password'))->with('error', self::getErrorMessage($result->message));
        }

        session()->put('auth', $result->data);

        return redirect()->to('admin');
    }

    public function forget()
    {
        return view('home.auth.forget_password');
    }

    public function submitForgetPassword(Request $request)
    {
        $result = $this->api_post('admin/auth/forgetPassword', $request->all());
        if ($result->success == false) {
            return back()->withInput()->with('error', self::getErrorMessage($result->message));
        }

        return redirect()->to('auth/verify/'.$request->phone_number. '?code='. $result->data->verify_code);
    }

    public function verify($phone_number)
    {
        return view('home.auth.verify', compact('phone_number'));
    }

    public function submitVerify(Request $request)
    {
        $result = $this->api_post('admin/auth/forgetPassword/verify',$request->all());

        if ($result->success == false) {
            return back()->withInput()->with('error', self::getErrorMessage($result->message));
        }
        $phone_number = $request->phone_number;
        $token = $result->data->token;

        return redirect()->to('auth/reset/'.$phone_number.'/'.$token);
    }

     public function reset($phone_number, $token)
    {
        return view('home.auth.reset', compact('phone_number', 'token'));
    }

    public function submitResetPassword(Request $request)
    {

        $password = $request->password;
        $confirm_password = $request->confirm_password;
        if($password == $confirm_password && $password!=null&$confirm_password!=null){
            $result = $this->api_post('admin/auth/forgetPassword/reset', $request->all());
            if ($result->success == false) {
                return back()->withInput()->with('error', self::getErrorMessage($result->message));
            }
            return redirect()->to('auth/login')->with('message', 'Password Reset Successfully');
        }elseif($password != $confirm_password){
            return back()->withInput()->with('error', self::getErrorMessage("Password and confirm password not match!"));
        }else{
            return back()->withInput()->with('error', self::getErrorMessage("Password and confirm password invalid!"));
        }

    }

    public function logout()
    {
        return self::clearAuth();
    }
}
