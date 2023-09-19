@extends('app.layouts._partials.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Listagem de Pedidos</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 95%; margin-left: auto; margin-right: auto;">
              
                <table border="1" width="100%  margin-left: auto; margin-right: auto;">
                    <thead>
                        <tr>
                            <th>ID do pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $pedido->id }}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                        <!--<button type="submit">Excluir</button>-->
                                    </form>
                                </td>
                                <td><a href="{{ route('cliente.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pedidos->appends($request)->links() }}
          
            </div>
        </div>
     
    </div>
    
@endsection

 