<?php

namespace App\Http\Controllers;

use App\models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
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
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'integer' => 'o campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe!'
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
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        print_r($request->all());
        echo '<br><br>';
        print_r($produto->getAttributes());

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
