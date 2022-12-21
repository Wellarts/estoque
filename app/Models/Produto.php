<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'produto',
        'idFkCategoria',
        'idFkFornecedor',
        'valorCompra',
        'valorVenda',

   ];

    public function categorias()
    {
        return $this->belongsToMany(Category::class, 'posts_categorias');
    }

    public function fornecedores()
    {
        return $this->belongsToMany(Post::class, 'produtos_fornecedores');
    }
}

