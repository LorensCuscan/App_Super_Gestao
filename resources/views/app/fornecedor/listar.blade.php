@extends('app.layouts._partials.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

<div class="conteudo">

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            Fornecedor
        </div>

       

        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor.listar') }}">Consulta</a></li>
            </ul>
        </div>
                <div class="informacap-pagina">
                    <div style="width: 30%; margin-left: auto; margin-right: auto;">
                        ... Lista ...
                    </div>
                </div>
            

        <div class="informacao-pagina">

        </div>
    
   



</div>

@endsection