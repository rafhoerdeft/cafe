<?php

namespace App\Http\Controllers;

use App\Models\LogLogin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{

    public function __construct()
    {
        if (Auth::viaRemember()) {
            return redirect()->route('dash');
        }
    }

    public function index()
    {
        Auth::logout();
        Session::forget(['log', 'nav']);
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

        if (Auth::attempt(['username' => $user, 'password' => $pass, 'active' => 1], $remember)) {

            // $payload = array(
            //     'ses_id'    => session()->getId(),
            //     'ip_add'    => $request->ip()
            // );
            // $token = json_encode($payload);
            // dd(encode($token));

            LogLogin::create([
                'user_id' => Auth::user()->id,
                'ip_address' => $request->ip(),
            ]);

            session()->put('log', Auth::user()->role->nama_role);
            session()->put('log_uid', encode(Auth::user()->id));

            return redirect()->route('dash');
        } else {
            return redirect()->route('auth')->with('alert', 'Username atau password salah!')->withInput();
        }
    }

    public function logout()
    {
        // Hapus semua data pada session
        // session()->destroy();

        // redirect ke halaman login	
        return redirect()->route('auth');
    }
}
