<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
            'nome'

         ];

    public function Produtos()
    {
        return $this->belongsToMany(Post::class, 'produtos_categorias');
    }
}
