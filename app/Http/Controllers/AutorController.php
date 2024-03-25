<?php

namespace App\Http\Controllers;

use App\Models\autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    // mostrar todos os autores
    public function index() {
        $todosAutores = autor::where('ativo', true)->get();
        return view('autores.index', ['todosAutores' => $todosAutores]);
    }

    // mostrar um ator especifico
    public function show(autor $autor) {
        // livro() e o nome da funcao que relaciona autor com livro no modelo
        $livrosAutor = $autor->livro()->where('ativo',true)->get();
        return view('autores.show', ['autor' => $autor, 'livrosAutor' => $livrosAutor]);
    }

    // desativar e ativar autores
    public function desativarAtivar(autor $autor) {
        $autor->update(['ativo' =>  !$autor->ativo]);
        return redirect('/gerirAutores')->with('message','Autor ativado / desativado com sucesso');
    }

    // gerir autores
    public function gerirAutores() {
        $todosAutoresAtivos = autor::where('ativo',true)->simplePaginate(5);
        $todosAutoresInativos = autor::where('ativo',false)->paginate(5);
        return view('autores.gerir', ['todosAutoresAtivos' => $todosAutoresAtivos, 'todosAutoresInativos' => $todosAutoresInativos]);
    }

    // mostrar formulario de editar autor
    public function edit(autor $autor) {
        return view('autores.edit', ['autor' => $autor]);
    }

    // guardar alteracoes ao autor
    public function update(Request $request, autor $autor) {
        $dadosFormulario = $request->validate([
            'nome'=> ['required', 'min:5'],
            'dataNascimento' => 'required',
            'nacionalidade'=> ['required'],
            'biografia'=> 'required'
        ]);

        // guardar fotografia na pasta
        if($request->hasFile('foto')) {
            $caminho =$request->file('foto')->store('fotografiasAutores', 'public');
            $dadosFormulario['foto'] = $caminho;
        }

        // atualizar
        $autor->update($dadosFormulario);

        return redirect('/gerirAutores')->with('message', 'Autor atualizado com sucesso');
    }

    // form de criacao de autor
    public function create() {
        return view('autores.create');
    }

    // inserir info do autor
    public function store(Request $request) {
        
        $dadosFormulario = $request->validate([
            'nome'=> ['required', 'min:5'],
            'dataNascimento' => 'required',
            'nacionalidade'=> ['required'],
            'biografia'=> 'required'
        ]);


        // guardar fotografia na pasta
        $caminho =$request->file('foto')->store('fotografiasAutores', 'public');
        $dadosFormulario['foto'] = $caminho;

        // criar
        autor::create($dadosFormulario);

        return redirect('/gerirAutores')->with('message', 'Autor adicionado com sucesso');
    }


}
