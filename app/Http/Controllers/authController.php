<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\rol;
class authController extends Controller
{
    public function index()
    {        
        
        $roles = rol::all();
        return view('auth.login', compact('roles'));
    }
    public function vistaresgistrar()
    {       
       
        $roles = rol::all();
        return view('auth.registroUsuarios',compact('roles'));
    }


    public function registrarUsuarios(Request $request)
    {
        // dd($request->toArray());
        $validate = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:255',
            'rol_id' => 'required',
            'password' => 'required|min:6'
        ]);
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [   'name' => $request->name,
                'rol_id' => $request->rol_id,
                'password' => Hash::make($request->password)
            ]
        );
        // dd($user);
        Auth::login($user);
        return redirect('/dashboard');
    }


    // public function login(Request $request)
    // {
    //     // dd($request);
    //     $validate = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
    //     $user = User::where('email', $request->email)->first();
    //     if($user){
    //         if(Hash::check($request->password, $user->password)){
    //             Auth::login($user);
    //             $request->session()->regenerate();
    //             return redirect()->route('ver.archivos');
    //         }else{
    //             return back()->withErrors(['password' => 'Contraseña incorrecta']);
    //         }
    //     }else{
    //         return back()->withErrors([
    //             'email' => 'El email no existe'
    //         ])->withInput();
    //     }
    // }


    public function login(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                $request->session()->regenerate();
                switch($user->rol_id){
                    case 1:
                        return redirect()->route('ver.archivos');
                    case 2:
                        return redirect()->route('tablas.archivos');
                    default:
                    return redirect()->route('login'); 

                }
            }else{
                return back()->withErrors(['password' => 'Contraseña incorrecta']);
            }
        }else{
            return back()->withErrors([
                'email' => 'El email no existe'
            ])->withInput();
        }
    }
    
    
    public function enviarCorreoResetPassword(Request $request){
        // dd($request->toArray());
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $response = Password::sendResetLink($request->only('email'));
        // return $response == Password::RESET_LINK_SENT
        // ? back()->with('status', 'Te hemos enviado un enlace para restablecer la contraseña.')
        // : back()->withErrors(['email' => 'No podemos encontrar un usuario con ese correo.']);
        if ($response == Password::RESET_LINK_SENT) {
            Log::info('Correo de restablecimiento enviado a: ' . $request->email);  // Log si el correo fue enviado
            return back()->with('status', 'Te hemos enviado un enlace para restablecer la contraseña.');
        } else {
            Log::error('Error al enviar el correo de restablecimiento a: ' . $request->email);  // Log si hubo un error
            return back()->withErrors(['email' => 'No podemos encontrar un usuario con ese correo.']);
        }
    }

   

    public function mostrarFormularioReset(Request $request, $token=null){
        return view('auth.resetPassword')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function mostrarFormularioEmail(){
        return view('auth.email');
    }

    public function resetPassword(Request $request){
        // dd($request->toArray());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => $request->token,
        ]);
        $response = Password::reset(
            $request->only('email', 'password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60), 
                ])->save();
    
                event(new PasswordReset($user)); 
    
                if (method_exists($user, 'tokens')) {
                    $user->tokens()->delete(); 
                }
            }
        );
        return $response == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', 'Tu contraseña ha sido restablecida con éxito.')
        : back()->withErrors(['email' => 'El token de restablecimiento es inválido o ha expirado.']);
    }

    public function traerUsuarios(){


        // $usuarios = User::with('roles')->get();
        $usuarios = User::all();
        return $usuarios;
    }

}
