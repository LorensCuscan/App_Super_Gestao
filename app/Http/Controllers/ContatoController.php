<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    
    
    public function contato(Request $request){


        $motivo_contato = MotivoContato::all();
 

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request){

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos,nome', //nomes com no minimo de 3 caracteres e no maximo 40  
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required|max:2000',
    ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O nome pode ter no maximo 4 caracteres',
            'nome.unique' => 'Já existe um usuario com o nome inserido',
            'telefone.required' => "O campo Telefone é obrigatorio" ,
            'email.email' => "O endereço de e-mail não é valido!" ,
            'motivo_contato_id.required' => "Selecione o motivo do contato" ,
            'mensagem.required' => "Escreva a sua mensagem!" ,
        ];

        $request->validate($regras, $feedback);


        SiteContato::create($request->all());
        return redirect()->route('site.index')->withInput();

      
    }
    


}
