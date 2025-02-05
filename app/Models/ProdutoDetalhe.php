<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    use HasFactory;

    protected $table = 'produtos_detalhes';

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\Models\ProdutoDetalhe');
    }

    public function produto(){
        return $this->belongsTo('App\Models\Produto');
    }
}
