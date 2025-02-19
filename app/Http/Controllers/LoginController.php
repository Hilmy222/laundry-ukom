<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view ('login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        try {
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                Auth::user();
                        return redirect()->route('admin.dashboard')->with('success', 'Login sebagai Admin berhasil!');
                        Auth::logout();
                        return redirect()->route('login.show')->with('error', 'Role tidak dikenali.');
                
            }
        } catch (Exception $e) {
    
            return redirect()->back()->with('error', 'Username atau password salah: ' . $e->getMessage());

        }
      
    }
    
}
