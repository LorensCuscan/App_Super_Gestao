<h3>FORNECEDOR</h3>

@php
//dd($fornecedores);
@endphp


Fornecedor: {{ $fornecedores[0] ['nome']}}
<br>
Status: {{ $fornecedores[0] ['status']}}
<br>
@if ( !($fornecedores[0] ['status'] == 'S'))
Fornecedor inativo
@endif
<br>
@unless ($fornecedores[0] ['status'] == 'S')
Fornecedor inativo 
@endunless
