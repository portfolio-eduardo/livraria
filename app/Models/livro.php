<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livro extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'ISBN', 'dataPublicacao', 'numeroPaginas', 'seccao', 'requisitado', 'ativo','dataAdmissao', 'foto', 'descricao'];

    // filtrar livros
    public function scopeFilter ($query, $filters) {
        //dd($query);
        // verifica se existe e se nao existir da um valor null
        if ($filters['procurar'] ?? false){
            // procurar pelo titulo
            $query->where('nome','like','%'. request('procurar') . '%')
            ->orWhere('ISBN','like','%'. request('procurar') . '%');
        }

        if ($filters['dataInicio'] ?? false && $filters['dataFim'] ?? false) {
            // filtrar pela data de publicacao
            $query->whereBetween('dataPublicacao', [$filters['dataInicio'], $filters['dataFim']]);
        }

        if ($filters['genero'] ?? false) {
            // filtrar pelo genero
            // podemos usar este comando porque estabelecemos a relacao entre livro e genero nas respetivos modelos
            // whereHas e usado para filtrar com base em relacoes entre tabelas
            // 'genero' e o nome da funcao que se encotra a definir a relacao entre livro e genero no modelo do livro
            $query->whereHas('genero', function ($q) use ($filters) {
                $q->where('idGenero', $filters['genero']);
            });
        }

    }

    public function scopeFilterGerir ($query, $filters) {
        if ($filters['procurar'] ?? false){
            // procurar pelo titulo
            $query->where('nome','like','%'. request('procurar') . '%');
        }
    }

    public function utilizador() {
        // usamos belongsToMany quando temos muitos para muitos
        return $this->belongsToMany(User::class, 'requisicoes', 'idLivro','idUtilizador');
    }

    public function autor() {
        // usamos belongsToMany quando temos muitos para muitos
        return $this->belongsToMany(autor::class, 'livro_autor', 'idLivro', 'idAutor');
    }

    public function genero() {
        // usamos belongsToMany quando temos muitos para muitos
        return $this->belongsToMany(genero::class, 'genero_livro', 'idLivro', 'idGenero');
    }
}
