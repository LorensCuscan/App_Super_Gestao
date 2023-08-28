<h3>FORNECEDOR</h3>

@php
//dd($fornecedores);
@endphp

@isset($fornecedores[0])
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0] ['cnpj'])
        - VAZIO
        @endempty
    @endisset
@endisset


