
@extends('app.layouts._partials.basico')

@section('titulo', 'Cliente')

@section('conteudo')

<div class="conteudo">

    <div class="conteudo-pagina">

        <div class="titulo-pagina" >
            @if (isset($produto->id))
                <p>Editar produto</p>
            @else
            <p>Adicionar Cliente</p>
            @endif
        </div>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
                <div class="informacao-pagina">                
                    <div style="width: 30%; margin-left: auto; margin-right: auto;">
                       @component('app.cliente._components.form_create_edit')
                       @endcomponent
                    </div>
                </div>
            

        <div class="informacao-pagina">

        </div>
    
   

        

</div>

@endsection