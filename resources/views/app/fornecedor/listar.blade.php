@extends('app.layouts._partials.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

<div class="conteudo">

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            Fornecedor - Listar
        </div>

    
       Lista
    

        <div class="menu">
            <ul>
                <li>
                    <div style="width: 30%; margin-left: auto; margin-right: 420px;">
                        <form method="post" action="">
                            @csrf
                            <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                            <input type="text" name="site" placeholder="Site" class="borda-preta">
                            <input type="text" name="uf" placeholder="Uf" class="borda-preta">
                            <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                            <button type="submit" class="borda-preta">Pesquisar</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">

        </div>
    
    </div>

        

</div>

@endsection