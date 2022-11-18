<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'idFkEstado',
        'idFkCidade'



     ];

    public function Produtos()
    {
        return $this->belongsToMany(Post::class, 'produtos_fornecedores');
    }
}
