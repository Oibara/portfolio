<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    public function register(Request $request) {
        //Declaramos el objeto
        $user = new User();
        // Recogemos las propiedades del objeto
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // La subimos a la BD
            $user->save();
            Auth::login($user);
            return redirect(route('privada'));
    }
    public function login(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
          $remember = ($request->has('remember') ? true : false );
                if (Auth::attempt($credentials, $remember)) {
                    $request->session()->regenerate();
                    return redirect()->intended(route('privada'));
                }
                else {
                    var_dump($credentials);
                }
    }
    public function logout(Request $request) {
        Auth::logout();
        request()->session()->invalidate();    
        request()->session()->regenerateToken();   
        return redirect(route('/login')); 
    }
}

