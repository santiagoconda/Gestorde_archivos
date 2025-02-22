<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class authController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registrarUsuarios(Request $request)
    {
        // dd($request -> all());
        $validate = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|min:6'
        ]);
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [   'name' => $request->name,
                'password' => Hash::make($request->password)
            ]
        );
        // dd($user);
        Auth::login($user);
        return redirect('/');
    }


    public function login(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->route('home');
            }else{
                return back()->with('fail', 'Contraseña incorrecta');
            }
        }else{
            return back()->withErrors([
                'email' => 'El email no existe'
            ])->withInput();
        }
    }    

}
