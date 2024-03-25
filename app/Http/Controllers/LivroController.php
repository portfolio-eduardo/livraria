<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\autor;
use App\Models\livro;
use App\Models\genero;
use App\Models\requisicao;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LivroController extends Controller
{
    // mostrar todos os livros
    public function index() {
        $todosLivros = livro::where('ativo', true)->latest()->filter(request(['procurar', 'dataInicio', 'dataFim', 'genero']))->get();
        $todosGeneros = genero::all();
        return view("livros.index", ["todosLivros" => $todosLivros, "todosGeneros"=> $todosGeneros]);
    }

    // mostrar cinco livros mais recentes na pagina inicial
    public function mostrarCincoLivros() {
        $cincoLivros = livro::where('ativo', true)->orderBy("dataPublicacao", "desc")->take(5)->get();
        return view("welcome", ['cincoLivros' => $cincoLivros]);
    }

    // mostrar um livro especifico
    public function show(livro $livro) {
        // autores / autor do livro
        $autoresLivro = $livro->autor()->where('ativo', true)->get();
        return view('livros.show', ['livro' => $livro, 'autoresLivro' => $autoresLivro]);
    }

    // requisitar um livro
    public function requisitar(Request $request, livro $livro) {
        // sen nao estiver requisitado
        if($livro->requisitado == 0) {
            $dataAtual = Carbon::now();
            $livro->update([
                'requisitado' => true,
                'datePedido' => Carbon::now()
            ]);
            return redirect('/livros/' . $livro->id)->with('message', 'Foi feito o pedido de requisição!');
        }
        return redirect('/livros/' . $livro->id)->with('message', 'O livro já se encontra com um pedido de requisição');
    }

    // devolver um livro
    public function devolver(Request $request) {
        
    }

    // minhas requisicoes
    public function requisicoes(Request $request) {
        // obter o ID do utilizador
        $utilizador = User::where('id', auth()->id());
        $requisicoesUtilizador = $utilizador->livro()->get();


    }

    // gerir livros
    public function gerir() {
        $livrosAtivos =  livro::where('ativo', true)->latest()->filter(request(['procurar']))->paginate(5);
        $livrosInativos =  livro::where('ativo', false)->latest()->filter(request(['procurar']))->paginate(5);
        return view('livros.gerir', ['livrosAtivos' => $livrosAtivos, 'livrosInativos' => $livrosInativos]);
    }

    // mostrar formulario para adicionar novo livro
    public function create() {
        $todosAutores = autor::where('ativo', true)->get();
        $todosGeneros = genero::all();
        return view('livros.create', ['todosAutores' => $todosAutores,'todosGeneros'=> $todosGeneros]);
    }

    // guardar na base de dados um novo livro
    public function store(Request $request) {

        $dadosFormulario = $request->validate([
            'nome'=> ['required', 'min:5'],
            'ISBN'=> ['required', Rule::unique('livros', 'ISBN')],
            'dataPublicacao' => 'required',
            'numeroPaginas'=> ['required', 'numeric'],
            'foto'=> 'required',
            'seccao'=> 'required',
            'descricao'=> 'required',
        ]);

        // guardar fotografia na pasta
        $caminho =$request->file('foto')->store('fotografiasLivros', 'public');
        $dadosFormulario['foto'] = $caminho;
        

        // registar
        $livro = livro::create($dadosFormulario);

        // relacionar o livro com os autores, podemos faze assim porque estabelecemos as relacoes anteriormente
        // usamos attach() porque temos uma relacao de muitos para muitos
        // autores e o nome do input do formulario
        // autor() e o nome da relacao
        $livro->autor()->attach($request->input('autores'));

        // relacionamos o livro com os generos
        $livro->genero()->attach($request->input('generos'));

        //redirecionar
        return redirect('/gerir')->with('message', 'Livro adicionado com sucesso');
    }

    // mostrar formulario para editar um livro
    public function edit(livro $livro) {
        $todosAutores = autor::where('ativo', true)->get();
        $todosGeneros = genero::all();
        return view('livros.edit', ['livro' => $livro, 'todosAutores' => $todosAutores,'todosGeneros'=> $todosGeneros]);
    }

    // atualizar na base de dados o livro alterado
    public function update(Request $request, livro $livro) {

        $dadosFormulario = $request->validate([
            'nome'=> ['required', 'min:5'],
            'ISBN'=> ['required'],
            'dataPublicacao' => 'required',
            'numeroPaginas'=> ['required', 'numeric'],
            'seccao'=> 'required',
            'descricao'=> 'required',
        ]);

        if($request->hasFile('foto')) {
            $caminho = $request->file('foto')->store('fotografiasLivros', 'public');
            $dadosFormulario['foto'] = $caminho;
        }

        // remover ligacoes anteriores a autores
        $livro->autor()->detach();
        $livro->genero()->detach();

        $livro->autor()->attach($request->input('autores'));
        $livro->genero()->attach($request->input('generos'));

        // atualizar
        $livro->update($dadosFormulario);
        return redirect('/gerir')->with('message', 'Livro atualizado com sucesso');
    }

    // desativar um livro 
    public function desativarAtivar(livro $livro) {
        $livro->update(['ativo' =>  !$livro->ativo]);
        return redirect('/gerir')->with('message','Livro ativado / desativado com sucesso');
    }
}
