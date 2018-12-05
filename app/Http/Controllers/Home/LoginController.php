<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function dologin(Request $request)
    {

        if (Auth::attempt(['name' => $request['name'], 'password' => request('password')])) {
            return  Redirect::to('index')
                ->with('message', '成功登录');

        } else {
            return \redirect('login');
        }

    }

    public function register()
    {
        return view('login.register');
    }

    /**
     * @param Request $request
     *
     */
    public function registeradd(Request $request)
    {
        $name             = $request->get('name');
        $email            = $request->get('email');
        $phone            = $request->get('phone');
        $password         = bcrypt($request->get('password'));
        $data['name']     = $name;
        $data['email']    = $email;
        $data['phone']    = $phone;
        $data['password'] = $password;
        //dd($data);
        $result = User::create($data);
        if ($result) {
            return '注册成功';
        } else {
            return '注册失败';
        }
    }

    public function logout()
    {
        Auth::logout();
        return \redirect('login');

    }

    public function check()
    {
        if (Auth::check()) {
            // The user is logged in...
            dd(Auth::user());
        } else {
            return '未登录';
        }
    }
}
