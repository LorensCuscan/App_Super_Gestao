<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    
    public function index(){
        return view('app.fornecedor.index');

    }

    public function listar(){
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request){
        //validacao
        $msg = '';
       
        if($request->input('_token') != ''){
        $regras = [
            'nome' => 'required|min:3|max:40',
            'site' => 'required',
            'uf' => 'required|min:2|max:2',
            'email' => 'email'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preechido',
            'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no minimo 3 caracteres',
            'uf.min' => 'O  campo uf deve ter no minimo 2 caracteres',
            'uf.max' => 'O campo uf deve ter no minimo 2 caracteres',
            'email.email' => 'O campo e-mail não foi preenchido corretamente'
        ];

        $request->validate($regras, $feedback);  
       
        $fornecedor = new Fornecedor();
        $fornecedor->create($request->all());


        $msg = 'Cadastro Realizado!';

    }
    return view('app.fornecedor.adicionar', ['msg' => $msg]);
        
        
    }
}
