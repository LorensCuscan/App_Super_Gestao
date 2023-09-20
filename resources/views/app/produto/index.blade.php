@extends('app.layouts._partials.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Listagem Produtos</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produtos.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 100%; margin-left: auto; margin-right: auto;">
              
                <table border="1" width="100%" align="center">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Nome do Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>Peso</th>
                            <th>E-Unidade ID</th>            
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descrição }}</td>
                                <td>{{ $produto->fornecedor->nome}}</td>
                                <td>{{ $produto->fornecedor->email}}</td>
                                <td>{{ $produto->fornecedor->site}}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                                <td><a href="{{ route('produtos.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $produto->id }}" method="post" action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                        <!--<button type="submit">Excluir</button>-->
                                    </form>
                                </td>
                                <td><a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr>

                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach ($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                           Pedido: {{ $pedido->id }},
                                        </a> 
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>                  
                </table>
                {{ $produtos->appends($request)->links() }}
          
            </div>
        </div>
     
    </div>
    
@endsection

 