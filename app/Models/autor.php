<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'dataNascimento', 'foto', 'nacionalidade', 'ativo', 'biografia'];
    public $table = 'autores';

    public function livro() {
        // usamos belongsToMany quando temos muitos para muitos
        return $this->belongsToMany(livro::class, 'livro_autor', 'idAutor', 'idLivro');
    }
}
