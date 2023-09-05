<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\User;
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
            'email' => 'O campo e-mail não foi preenchido corretamente'
        ];

        $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->nome = $request->input('nome');
            $fornecedor->site = $request->input('site');
            $fornecedor->uf = $request->input('uf');
            $fornecedor->email = $request->input('email');
            $fornecedor->save();

        echo 'Chegamos até aqui';

        return view('app.fornecedor.adicionar');

        
        
    }
}
