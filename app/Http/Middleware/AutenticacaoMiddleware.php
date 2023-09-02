<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {
        echo $metodo_autenticacao. '-' . $perfil .'<br>';
        
        //verifica se o usuario possui acesso a rota
        if($metodo_autenticacao == 'padrao'){
            echo 'verificar usuario e senha no db'. $perfil .'<br>';
        }
        if($metodo_autenticacao == 'ldap'){
            echo 'verificar usuario e senha no ad'. $perfil .'<br>';
        }

        if ($perfil == 'visitante'){
            echo 'exibir apenas alguns recursos';
        }else{
            echo 'faz o login';
        }

        if(false){
            return $next($request);

            
        } else{
            return Response('Acesso negado! Rota exige autenticação!!');
        }

    
       
    }
}
