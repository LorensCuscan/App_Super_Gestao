<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descrição', 'peso', 'unidade_id'];

public function produtoDetakhe(){
    return $this->hasOne('App\ProdutoDetalhe');
}
}
