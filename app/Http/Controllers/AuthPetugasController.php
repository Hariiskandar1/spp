<?php

namespace App\Http\Controllers;

use App\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthPetugasController extends Controller
{
    public function index()
    {
        return view('petugas.login');
    }
    public function login(Request $request)
    {
        // dd($request->username);
        $data = Officer::where('username', $request->username)->first();
        if($data)
        {
            if(Hash::check($request->password, $data->password))
            {
                session(['petugas' => $data->id]);
                return redirect('petugasStudent')->with(
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
            }
            return redirect('petugas');
        }
        return redirect('petugas');

        // $petugas = $request->only('username', 'Password');

        // check user using auth function
    
    //   if ($officer=Officer::where($petugas)->first()) {
    //       auth()->login($officer);
    //       return redirect('officer');
    //    }


        // dd($request->password);
        // $login = Auth::guard('petugas')->attempt([
        //     'username'  => $request->username,
        //     'password'  => $request->Password,
        // ]);
        
        // if(Auth::guard('petugas')->attempt(['username' => $request->username, 'password' => $request->password]))
        // {
        //     // session(['petugas' => true]);
        //     return redirect('officer');
        // }else{
        //     return redirect('petugas');
        // }



        // $data = Officer::where('username', $Request->username)->first();
        // if($data)
        // {
        //     if(Hash::check($Request->password, $data->password))
        //     {
        //         session(['petugas' => true]);
        //         return redirect('');
        //     }
        // }
        // return redirect('petugas');


       

    }
    public function username()
    {
        return 'username';
    }

    public function password()
    {
        return 'password';
    }

    public function showLoginForm()
    {
        return view('petugas');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('petugas');
    }
}
