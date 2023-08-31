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
    <select name="motivo_contato" value="{{ old('motivo_contato') }}" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem') :  'Preencha aqui sua mensagem'}}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>


    
</form>


