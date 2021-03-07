<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(request $request)
    {

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            session(['admin' => true]);
            return redirect('dashboard')->with(
                ['success' => "
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Selamat, Kamu Berhasil Login',
                        showConfirmButton: false,
                        timer: 5000
                    })
                </script>
                "]
              );
        }else{
            return redirect('admin');
        }

        
         
        // session(['admin' => true]);
        // return redirect('dashboard');

        // if($login) {
        //     session(['admin' => true]);
        //     return redirect('dashboard');
        // }else {
        //     return redirect('admin');
        // }

        // return redirect('admin');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('admin');
    }

    public function username()
    {
        return 'username';
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

}
