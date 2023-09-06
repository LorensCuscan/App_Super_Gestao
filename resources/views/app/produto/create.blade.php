@extends('app.layouts._partials.basico')

@section('titulo', 'Produto')

@section('conteudo')

<div class="conteudo">

    <div class="conteudo-pagina">

        <div class="titulo-pagina" >
           <h1>Adicionar Produto<h1>
        </div>

       

        <div class="menu">
            <ul>
                <li><a href="{{ route('produtos.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
                <div class="informacao-pagina">
                  
                    <div style="width: 30%; margin-left: auto; margin-right: auto;">
                        <form method="post" action="{{ route('produtos.store') }}">
                            <input type="hidden" name="id" value="{{ isset($fornecedor) ? $fornecedor->id : '' }}">
                            @csrf
                            
                            <input type="text" name="nome" value=""  placeholder="Nome"   class="borda-preta">
                           
                            <input type="text" name="descrição" value=""  placeholder="Descrição"   class="borda-preta">
                    

                            <input type="text" name="peso" value=""    placeholder="Peso"     class="borda-preta">
                          

                            <select name="unidade_id">
                                <option>-- Selecione a Unidade de Medida --</option>

                                @foreach ($unidades as $unidade)
                                <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                                @endforeach
                            
                            </select>
                  

                            <button type="submit" class="borda-preta">Cadastrar</button>
                        </form>
                    </div>
                </div>
            

        <div class="informacao-pagina">

        </div>
    
   

        

</div>

@endsection