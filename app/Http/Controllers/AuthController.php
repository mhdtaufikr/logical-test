<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {            
        return view('auth.login');
        
    }

    public function postlogin(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        $cekuser_status=User::where('email',$email)->first();

        $dologin=Auth::attempt($credentials);
        if($dologin){
                    return redirect('/home');
                }
        else{
            return redirect('/')->with('statusLogin','Email atau password salah');
        }
    }

    public function register(Request $request)
    {            
        return view('auth.register');
        
    }
    public function store(Request $request)
    {            
        $user = User::create([
        	'name' => $request->name,
        	'email' => $request->email,
        	'password' => bcrypt($request->password)
        ]);
        return redirect('/')->with('success','Berhasil membuat akun');
        
    }

}
