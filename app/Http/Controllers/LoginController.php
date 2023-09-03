<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';
        
        if($request->get('erro') == 1) {
            $erro = 'Usúario ou senha não existe';
        };

        if($request->get('erro') == 2) {
            $erro = 'Necessario realizar login para ter acesso a pagina';
        };

        //$erro = $request->get('erro');
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    //regras de validação
    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        $feedback = [
            'usuario.email' => 'O campo usúario (e-mail) é obrigatorio',
            'senha.required' => 'O campo senha é obrigatorio'
        ];
        //se não passar pelo validate
        $request->validate($regras, $feedback);
        //as mensagens de feesback de validação

        $email = $request->get('usuario');
        $password = $request->get('senha');

      

        $user = new User();

        $usuario = $user->where('email', $email)
        ->where('password', $password)
        ->get()
        ->first();

      

        if(isset($usuario->name)){


            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        }else{
           return redirect()->route('site.login', ['erro' => 1]);
        }
       

    }

    public function sair(){
        echo 'Sair';
    }
}
