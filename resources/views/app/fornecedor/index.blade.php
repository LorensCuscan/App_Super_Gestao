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
                <li><a href="">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
            
                    <div style="width: 30%; margin-left: auto; margin-right: 420px;">
                        <form method="post" action=" {{ route('app.fornecedor.listar') }} ">
                            @csrf
                            <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                            <input type="text" name="site" placeholder="Site" class="borda-preta">
                            <input type="text" name="uf" placeholder="Uf" class="borda-preta">
                            <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                            <button type="submit" class="borda-preta">Pesquisar</button>
                        </form>
            </ul>
        </div>

        <div class="informacao-pagina">

        </div>
    
    </div>

        

</div>

@endsection