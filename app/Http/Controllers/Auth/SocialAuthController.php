<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Role;
use Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        if(isset($_GET['error']) ){
            if(($_GET['error']=="access_denied")){


            return redirect('/');
            }
        }
        //dd(Socialite::driver($provider));
        $social_user = Socialite::driver($provider)->user();
        //dd($social_user);
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {
        	
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $nombreUser=explode("@",$social_user->email);
            $nombreCompleto=explode(" ",$social_user->name);
            $user = user::create([
                'name' => $nombreCompleto[0],
                'email' => $social_user->email,
                'apellido'=>$nombreCompleto[1],
                'user'=>$nombreUser[0],
                'password' => Hash::make($social_user->email),
            ]);
            $user
	        ->roles()
	        ->attach(Role::where('name', 'user')->first());
            $usuario=$user->getUsuario;
            $usuario->img=$social_user->avatar_original;
            $usuario->save();

            return $this->authAndRedirect($user); // Login y redirección
        }
    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect("/");
    }
}
