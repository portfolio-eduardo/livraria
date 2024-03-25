<?php

namespace App\Http\Controllers;

use App\Models\requisicao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // gerir cliente
    public function gerirClientes()
    {
        // mostramos 5 registos por pagina
        $todosClientesAtivos = User::where('tipoUtilizador', 0)->where('ativo', true)->simplePaginate(5);
        $todosClientesInativos = User::where('tipoUtilizador', 0)->where('ativo', false)->paginate(5);
        return view('users.gerir', ['todosClientesAtivos' => $todosClientesAtivos, 'todosClientesInativos' => $todosClientesInativos]);
    }

    public function gerirFuncionarios()
    {
        $todosFuncionariosAtivos = User::where('tipoUtilizador', 1)->where('ativo', true)->paginate(5);
        $todosFuncionariosInativos = User::where('tipoUtilizador', 1)->where('ativo', false)->paginate(5);
        return view('users.gerirFuncionarios', ['todosFuncionariosAtivos' => $todosFuncionariosAtivos, 'todosFuncionariosInativos' => $todosFuncionariosInativos]);
    }

    public function createFuncionario()
    {
        return view("users.create");
    }

    public function storeFuncionario(Request $request)
    {
        $dadosFormulario = $request->validate([
            "nome" => ["required", "min:3"],
            "nomeUtilizador" => ["required", Rule::unique('users', 'nomeUtilizador')],
            "email" => ["required", "email", Rule::unique('users', 'email')],
            "password" => ["required", "confirmed", "min:8"],
            "morada" => ["required", "min:15"],
        ]);

        // encriptar a password
        $dadosFormulario['password'] = bcrypt($dadosFormulario['password']);

        // guardar foto do utilizador caso exista
        if ($request->hasFile('foto')) {
            $caminho = $request->file('foto')->store('fotografiasUtilizadores', 'public');
            $dadosFormulario['foto'] = $caminho;
        }

        // colocar perfil de funcionario
        $dadosFormulario['tipoUtilizador'] = 1;

        // gravar o utilizador na base de dados
        User::create($dadosFormulario);

        // redirecionar para a pagina de login
        return redirect('/gerirFuncionarios')->with('message', 'Conta criada com sucesso!');
    }

    // desativar / ativar um livro 
    public function desativarAtivar(User $User)
    {
        $User->update(['ativo' => !$User->ativo]);
        if ($User->tipoUtilizador == 0) {
            return redirect('/gerirClientes')->with('message', 'Cliente ativado / desativado com sucesso');
        } else {
            return redirect('/gerirFuncionarios')->with('message', 'Funcionario ativado / desativado com sucesso');
        }
    }

    // mostrar formulario para criar novo utilizador
    public function create()
    {
        return view("users.registar");
    }

    public function show(User $User)
    {
        return view("users.show", ['User' => $User]);
    }

    public function verperfil()
    {
        $user = Auth::user();
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {

        $User = Auth::user();

        
        // validamos o email e o username e pedimos para ignorar os valores do user atual

        $dadosFormulario = $request->validate([
            "nome" => ["required", "min:3"],
            "nomeUtilizador" => ["required", Rule::unique(User::class)->ignore(auth()->id())],
            "email" => ["required", "email", Rule::unique(User::class)->ignore(auth()->id())],
            "morada" => ["required", "min:15"],
        ]);

        // guardar foto do utilizador caso exista
        if ($request->hasFile('foto')) {
            $caminho = $request->file('foto')->store('fotografiasUtilizadores', 'public');
            $dadosFormulario['foto'] = $caminho;
        }

        // gravar o utilizador na base de dados
        $User->update($dadosFormulario);

        // redirecionar para a pagina de login
        return redirect('/verperfil')->with('message', 'Conta atualizada com sucesso!');

    }

    // inserir o utilizador na base de dados
    public function store(Request $request)
    {
        $dadosFormulario = $request->validate([
            "nome" => ["required", "min:3"],
            "nomeUtilizador" => ["required", Rule::unique('users', 'nomeUtilizador')],
            "email" => ["required", "email", Rule::unique('users', 'email')],
            "password" => ["required", "confirmed", "min:8"],
            "morada" => ["required", "min:15"],
        ]);

        // encriptar a password
        $dadosFormulario['password'] = bcrypt($dadosFormulario['password']);

        // guardar foto do utilizador caso exista
        if ($request->hasFile('foto')) {
            $caminho = $request->file('foto')->store('fotografiasUtilizadores', 'public');
            $dadosFormulario['foto'] = $caminho;
        }

        // gravar o utilizador na base de dados
        User::create($dadosFormulario);

        // redirecionar para a pagina de login
        return redirect('/login')->with('message', 'Conta criada com sucesso!');

    }

    // mostrar formulario para efeturar login
    public function login()
    {
        return view("users.login");
    }

    // finalizar sessap
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        // regeneramos o token CSRF
        $request->session()->regenerateToken();

        return redirect('/')->with('message', "Sessão terminada");
    }

    // tentar autenticar o utilizador
    public function autenticar(Request $request)
    {

        // validar os dados
        $dadosFormulario = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        $user = User::where('email', $dadosFormulario['email'])->first();

        if ($user != null && $user->ativo == true) {
            // tentar fazer o login, se correto faz login do utilizador
            if (auth()->attempt($dadosFormulario)) {
                if (auth()->user()->ativo == true) {
                    // por motivos de seguranca regeneramos a sessao
                    $request->session()->regenerate();
                    return redirect("/")->with("message", "Log in bem sucedido");
                } else {
                    // no caso da autenticacao falhar, entao mostramos o erro no campo email de que as credenciasi nao sao validas
                    return back()->withErrors(['email' => 'Credenciais inválidas'])->onlyInput('email');
                }
            }
        }

        // no caso da conta ter sido desativada
        return redirect('/')->with(['message' => 'A conta encontra-se desativada']);
    }

    // mostrar requisicoes do cliente autenticado
    public function minhasRequisicoes() {
        
    }
}
