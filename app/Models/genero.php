<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];
    public $table = 'generos';


    public function livro()
    {
        // usamos belongsToMany quando temos muitos para muitos
        return $this->belongsToMany(livro::class, 'genero_livro', 'idGenero', 'idLivro');
    }
}
