<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Item;
use App\models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);
    
        // Criar a visualização
        $view = view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    
        // Retornar a visualização dentro de uma resposta HTTP
        return response($view);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'descrição' => 'required',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores.id',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'integer' => 'o campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe!',
            'fornecedor_id.exists' => 'O fornecedor informado não existe!'
        ];

        $request->validate($regras, $feedback);
        Produto::create($request->all());
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
     
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
       return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
       // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required',
            'descrição' => 'required',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades.id',
            'fornecedor_id' => 'exists:fornecedores.id',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'integer' => 'o campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe!',
            'fornecedor_id.exists' => 'O fornecedor informado não existe!'
        ];

        $request->validate($regras, $feedback);
    
        $produto->update($request->all());
        return redirect()->route('produtos.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index', ['produto' => $produto->id]);
     }
}
