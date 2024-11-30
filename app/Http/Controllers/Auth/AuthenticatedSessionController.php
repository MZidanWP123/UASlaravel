<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        
        try {
            // validasi password
            $request->validate([
                'password' => 'required',
            ]);

            


            $login = $request->input('email');

            $user = User::where('email', $login)->orWhere('username', $login)->first();

            if (!$user) {
                return
                    response()->json([
                        'error' => 'Email atau Password salah.',
                    ]);
            }

            if (
                Auth::attempt(['email' => $user->email, 'password' => $request->password]) ||
                Auth::attempt(['username' => $user->username, 'password' => $request->password])
            ) {
                $request->session()->regenerate();

                $url = '/';

                return redirect('/');


                return response()->json([
                    'success' => 'Login berhasil dilakukan',
                    'url' => $url,
                ]);
            }

            // dd('salah anjing');

            return response()->json([
                'error' => 'Email atau Password salah.',
            ]);
        } catch (\Throwable $th) {
            if (config('app.debug')) {
                throw $th;
            }
            return response()->json([
                'error' => 'Terjadi error, silahkan coba kembali.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
