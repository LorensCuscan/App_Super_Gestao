<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    
    
    public function contato(Request $request){
 
       // echo '<pre>';
       // print_r($request->all());
       // echo '<pre>';
        //dd($request);

        $motivo_contato = [
            '1' => 'Duvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];


        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        //$contato->save();

       // $contato = new SiteContato();
      //  $contato->create($request->all());

       // print_r($contato->getAttributes());
       // $contato->save();

       */

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request){


        // REALIZAR A VALIDAÇÃO DOS DAOS DO FORMULARIO RECEBIDOS NO REQUEST

       
       
        // $contato = new SiteContato();
       //SiteContato::create($request->all());

        $request->validate([
            
            'nome' => 'required|min:3|max:40', //nomes com no minimo de 3 caracteres e no maximo 40  
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000',
            
            
        ]);

        return redirect()->back()->withInput();

        //dd($request);
    }
    


}
