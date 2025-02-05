@extends('app.layouts._partials.basico')

@section('titulo', 'Produto')

@section('conteudo')

<div class="conteudo">

    <div class="conteudo-pagina">

        <div class="titulo-pagina" >
           <h1>Visualizar Produto<h1>
        </div>

       

        <div class="menu">
            <ul>
                <li><a href="{{ route('produtos.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
                <div class="informacao-pagina">
                  
                    <div style="width: 30%; margin-left: auto; margin-right: auto;">
                        <table border="1" style="text-align: left">
                            <tr>
                                <td>ID:</td>
                                <td>{{ $produto->id }}</td>
                            </tr>
                            <tr>
                                <td>Nome</td>
                                <td>{{ $produto->nome }}</td>
                            </tr>
                            <tr>
                                <td>Descrição</td>
                                <td>{{ $produto->descrição }}</td>
                            </tr>
                            <tr>
                                <td>Peso:</td>
                                <td>{{ $produto->peso }} kg</td>
                            </tr>
                            <tr>
                                <td>Unidade de medida</td>
                                <td>{{ $produto->id }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            

        <div class="informacao-pagina">

        </div>
    
   

        

</div>

@endsection