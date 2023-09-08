@extends('app.layouts._partials.basico')

@section('titulo', 'Produto')

@section('conteudo')

<div class="conteudo">

    <div class="conteudo-pagina">

        <div class="titulo-pagina" >
            @if (isset($produto->id))
                <p>Editar produto</p>
            @else
            <p>Adicionar produto</p>
            @endif
        </div>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('produtos.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
                <div class="informacao-pagina">                
                    <div style="width: 30%; margin-left: auto; margin-right: auto;">
                       @component('app.produto._components.form_create_edit', ['unidades' => $unidades])
                       @endcomponent
                    </div>
                </div>
            

        <div class="informacao-pagina">

        </div>
    
   

        

</div>

@endsection