@if(isset($produto->id))
<form method="post" action="{{ route('produtos.update', ['produto' => $produto->id]) }}">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('produtos.store') }}">
    @csrf
@endif

    <input type="text" name="nome" value="{{$produto->nome ?? old('nome')}}" placeholder="Nome"   class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

    <input type="text" name="descrição" value="{{$produto->descrição ?? old('descrição')}}"  placeholder="Descrição"   class="borda-preta">
    {{ $errors->has('descrição') ? $errors->first('descrição') : ''}}

    <input type="text" name="peso" value="{{$produto->peso ?? old('peso')}}"  placeholder="Peso"   class="borda-preta">
    {{ $errors->has('peso') ? $errors->first('peso') : ''}}

  

    <select name="fornecedor_id">
        <option>-- Selecione um Fornecedor --</option>

        @foreach ($fornecedores as $fornecedor)
        <option value="{{ $fornecedor->id }}" {{( $produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->nome ? 'selected' : ''}} >{{ $fornecedor->nome }}</option>
        @endforeach
    
    </select>
    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>