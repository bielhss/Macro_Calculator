=<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\models\Usuario;
use Illuminate\Cache\Repository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;

class UsuarioRestController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Usuario $usuario,  ConsoleOutput $out)
    {
        $this->repository = $usuario;
        $this->request = $request;
        $this->out = $out;     
    }

// ------------------------------------Listar Usuarios----------------------------------------------------- //
    //retorna a pagina de listagem de Usuarios
    // paginaAtual 0....n
    // pageSize    5,10,15,20,25.... 
    // dir/sort    classificar -> asc, desc 
    // props "campos da tabela" -> id, nome, email.
    // search      nome, email, cpf, cgc ......             

    public function index(Request $request)
    {
        //$this->out->writeln("Hello from Terminal");

        //$registros = $this->repository->paginate();

        //DB::table('usuarios')->paginate();

        $paginaAtual = $request->get('paginaAtual') ? $request->get('paginaAtual') : 1;
        $pageSize    = $request->get('pageSize') ? $request->get('pageSize') : 5;
        $dir         = $request->get('dir') ? $request->get('dir') : "asc";
        $props       = $request->get('props') ? $request->get('props') : "id";
        $search      = $request->get('search') ? $request->get('search') : "";

        if (empty($search)){
            $query = DB::table('usuarios')->select('*')->orderBy( $props, $dir);   
        } else {
            $query = DB::table('usuarios')->where('nome', 'LIKE','%'.$search.'%')
                                        ->orWhere('email','LIKE','%'.$search.'%')
                                        ->orderBy( $props, $dir); 
        } 

        $total = $query->count();

        $registros = $query->offset(($paginaAtual-1) * $pageSize)->limit($pageSize)->get();

        return response()->json([
            'data'        =>$registros,
            'paginaAtual' =>$paginaAtual-1,
            'pageSize'    =>$pageSize,
            'paginaFim'   =>ceil($total/$pageSize),
            'total'       =>$total,
        ]);
    }

// ------------------------------------Pesquisar Usuarios----------------------------------------------------- //
    //retorna registro de um usuario
    public function search(Request $request)
    {
        $filters = $request->all();

        $registros = $this->repository->search($request->nick);

        return view('usuario.index', [
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

// ------------------------------------Incluir Usuarios----------------------------------------------------- //
    //retorna a pagina para cadastrar um novo usuario
    public function new()
    {
        return view('usuario.incluir');
    }

    // salvar o registro de um novo usuario
    public function create(Request $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return response()->json(['mensagem'=>'Cadastro realizado com sucesso!']);
    }

// ------------------------------------Alterar Usuarios----------------------------------------------------- //
    //retorna o registro de um usuario para a alteração dos dados
    public function update($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro) {
            return response()->json(['mensagem' => "Registro não localizado!"]);
        }

        return  response()->json(['autor' => $registro]);
    }

    //alterar no banco o registro do usuario que modificado pelo usuario - tela
    public function save(Request $request, $id)
    {
        $data = $request->all();
        $registro = $this->repository->find($id);

        if (!$registro){
            return response()->json(['mensagem' => "Registro não localizado!"]);
        }

        $registro->update($data);
        
        return response()->json(['mensagem' => "Alteração realizada com sucesso!"] );
    }

// ------------------------------------Excluir Usuarios----------------------------------------------------- //
    //retorna o registro de um usuario para excluir do banco de dados
    public function delete($id)
    {
        $registro = $this->repository->find($id);
        if (!$registro) {
            return redirect()->back();
        }
        return view('usuario.excluir', [
            'registro' => $registro,
        ]);
    }

    //excluir no banco o registro do autor
    public function excluir($id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('usuario.listar');
    }

// ------------------------------------Consultar Usuarios----------------------------------------------------- //
    //retorna o registro para consultar - ver o registro na tela
    public function view($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back();
        }

        return view('usuario.consultar', [
            'registro' => $registro,
        ]);
    }


// ------------------------------------Cancelar Operação----------------------------------------------------- //
    //cancela a operação do usuario
    public function cancel()
    {
        return redirect()->route('usuario.listar');
    }
