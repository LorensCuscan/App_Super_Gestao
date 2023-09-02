<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
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

        echo "Usuario: $email | Senha: $password";
        echo '<br>';

        $user = new User();

        $usuario = $user->where('email', $email)
        ->where('password', $password)
        ->get()
        ->first();

      

        if(isset($usuario->name)){
            echo "usuario existe";
        }else{
            echo "usuario não existe";
        }
       

    }
}
