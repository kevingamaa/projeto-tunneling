<?php

namespace App\Controllers;

use App\User;
use Core\Classes\Auth;
use Core\Classes\Controller;
use Core\Classes\Request;

class AuthController extends Controller
{

    function __construct()
    {
        if(isset($_SESSION['user']))
        {
            redirect('tickets');
        }
    }
    public function login()
    {
        return  $this->view('auth.login');
    }

    public function register()
    {
   
        return  $this->view('auth.register');
    }

    public function authenticate(Request $request, User $user)
    {
        $user = $user->where('email',  $request->email)->first();
        if(is_null( $user))
        {
            return redirect('login', ['error' => 'Nenhum cadastro no email: '. $request->email]);
        }
        $allow = password_verify($request->password,  $user->password);

        if($allow) {
            Auth::starts($user);
            return redirect('tickets');
        }
        
    }

    public function create(Request $request, User $user) {

        $exists = $user->where('email',  $request->email)->first();
        if(!is_null( $exists))
        {
            return redirect('register', ['error' => 'Este email já está em uso']);
        }
        $request->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user = $user->create($request->all());
        Auth::starts($user);
        return redirect('tickets');
    }



    public function logout() 
    {
        unset($_SESSION['user']);
        return redirect('home');
    }
}
