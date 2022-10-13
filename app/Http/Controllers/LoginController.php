<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6|max:16'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect(route('compra'));

    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = ($request->has('sesionactiva') ? true : false);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            $request->session()->regenerate();
            return redirect('compra');
        }else{
            return redirect()->route('login')->with('error', 'Credenciales Invalidas');
        }
        
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));

    }
}
