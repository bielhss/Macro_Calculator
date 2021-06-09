<?php

namespace App\Http\Controllers;

use App\models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\UsuarioRequest;

class UsuarioRestController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Usuario $usuario)
    {
        $this->repository = $usuario;
        $this->request = $request;
    }

    //retorna lista a pagina de listagem de autores
    public function index(Request $request)
    {

        $registros = $this->repository->paginate();
        return response()->json($registros);
    }

    public function search(Request $request)
    {

        $filters = $request->all();
        $registros = $this->repository->search($request->nome);

        return view('usuario.index', [
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    //retorna a pagina para cadastrar um novo usuario
    public function new()
    {
        return view('usuario.incluir');
    }
    // salvar o registro de um novo usuario
    public function create(UsuarioRequest $request)
    {
        $registro = $request->all();
        $this->repository->create($registro);
        return response()->json(['mensagem'=>'cadastro realizado com sucesso!']);
    }

    //retorna o registro de um usuario para alteração dos dados. 
    public function update($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back();
        }

        return view(
            'usuario.alterar',
            [
                'registro' => $registro,
            ]
        );
    }

    //alterar no banco o registro do usuario- modificado pelo usuario
    public function save(UsuarioRequest $request, $id)
    {
        $data = $request->all();
        $registro = $this->repository->find($id);


        $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request['data_nascimento'])
            ->format('Y-m-d');

            
            $registro->update($data);
            
            return response()->json(['mensagem'=>'cadastro salvo com sucesso!']);
    }

    //retorna o registro de um usuario para excluir
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

    //excluir no banco o registro do usuario
    public function excluir($id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('usuario.listar');
    }

    //retorna o registro para consulta - ver o registro na tela
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


    // cancela a operação do usuario
    public function cancel(Request $request)
    {
        return redirect()->route('usuario.listar');
    }
}
