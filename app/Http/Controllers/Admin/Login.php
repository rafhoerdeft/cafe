<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthLog;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{

    public function index()
    {
        return view('auth/index');
    }

    public function process(Request $request)
    {
        $this->validate($request, [
            'username'  => 'required|max:100',
            'password'  => 'required|max:100',
        ]);

        $user = $request->username;
        $pass = $request->password;
        $remember = $request->has('remember') ? true : false;

        Auth::setRememberDuration(720); // Set time duration remember cookies

        if (Auth::attempt(['username' => $user, 'password' => $pass, 'active' => 1], $remember)) {

            AuthLog::create([
                'user_id' => Auth::user()->id,
                'ip_address' => $request->ip(),
            ]);

            return redirect()->route('dash');
        } else {
            return redirect()->route('auth')->with('alert', 'Wrong username or password!')->withInput();
        }
    }

    public function logout()
    {
        // Hapus semua data pada session
        // session()->destroy();

        Auth::logout();
        Session::forget(['nav']);

        // redirect ke halaman login	
        return redirect()->route('auth');
    }
}
