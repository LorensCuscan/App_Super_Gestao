@if(isset($produto->id))
<form method="post" action="{{ route('produtos.update', ['produto' => $produto->id]) }}">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('produtos.store') }}">
    @csrf
@endif

<button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
    
    
    <svg viewBox="0 4 10 10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" >
      <path stroke="currentColor" stroke-linecap="butt" stroke-linejoin="round" stroke-width="1" d="M13 5H1m0 0 4 4M1 5l4-4"/>
    </svg>
    Anterior
</button>




    <input type="text" name="nome" value="{{$produto->nome ?? old('nome')}}" placeholder="Nome"   class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

    <input type="text" name="descrição" value="{{$produto->descrição ?? old('descrição')}}"  placeholder="Descrição"   class="borda-preta">
    {{ $errors->has('descrição') ? $errors->first('descrição') : ''}}

    <input type="text" name="peso" value="{{$produto->peso ?? old('peso')}}"  placeholder="Peso"   class="borda-preta">
    {{ $errors->has('peso') ? $errors->first('peso') : ''}}

  

    <select name="unidade_id">
        <option>-- Selecione a Unidade de Medida --</option>

        @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}" {{($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}} >{{ $unidade->descricao }}</option>
        @endforeach
    
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>