{{ $slot }}

{{ $classe }}

<div style="position:absolute; top:0px; left:0px; width:100%; background:red">
    <pre>
        {{ print_r( $errors )}}
        </pre>
    </div>

<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" value="{{ old('email') }}" placeholder="E-mail" class="{{ $classe }}">
    <br>
   
   

    <select name="motivo_contato_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $motivo)
            <option value="{{ $motivo->id }}" {{ old('motivo_contato_id') == $motivo->id ? 'selected' : '' }}>{{ $motivo->motivo_contato }}</option>
        @endforeach
    </select>

       
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem') :  'Preencha aqui sua mensagem'}}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>


    
</form>


