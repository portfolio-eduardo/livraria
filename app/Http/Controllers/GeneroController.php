<?php

namespace App\Http\Controllers;

use App\Models\genero;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GeneroController extends Controller
{
    // mostrar todos os generos
    public function index() {
        $todosGeneros = genero::all();
        return view("generos.index", ["todosGeneros" => $todosGeneros]);
    }

    // mostrar um genero em especifo e todos os seus livros
    public function show(genero $genero) {
        $livrosDoGenero = $genero->livro()->get();
        return view("generos.show", ["genero" => $genero, "livrosDoGenero" => $livrosDoGenero]);
    }

    // adicionar genero
    public function create(Request $request) {
        return view("generos.create");
    }

    // inserir genero
    public function store(Request $request) {
        $dadosFormulario = $request->validate([
            'nome'=> ['required', 'min:5', Rule::unique('generos', 'nome')],
            'descricao'=> ['required', 'min: 15'],
        ]);

        // inserir o genero
        genero::create($dadosFormulario);

        // redirecionar
        return redirect('/gerirGeneros')->with('message', 'Genero adicionado com sucesso');
    }

    // alterar genero
    public function edit(genero $genero) {
        return view('generos.edit', ['genero'=> $genero]);
    }

    // guardar alteracoes no genero
    public function update(Request $request, genero $genero) {
        $dadosFormulario = $request->validate([
            'nome'=> ['required', 'min:5'],
            'descricao'=> ['required', 'min: 15'],
        ]); 

        // atualizar apenas a descricao
        $genero->update(['descricao' => $dadosFormulario['descricao']]);
        return redirect('/gerirGeneros')->with('message', 'Genero atualizado com sucesso');
    }

    // gerir generos
    public function gerirGeneros() {
        $todosGeneros = genero::paginate(5);
        return view("generos.gerir", ["todosGeneros"=> $todosGeneros]);
    }
}
