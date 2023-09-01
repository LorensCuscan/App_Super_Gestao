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



        $request->validate([
            
            'nome' => 'required|min:3|max:40', //nomes com no minimo de 3 caracteres e no maximo 40  
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required|max:2000',
            
            
        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index')->withInput();

      
    }
    


}
