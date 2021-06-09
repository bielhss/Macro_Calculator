<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Refeicao;
use App\models\Usuario;
use App\models\Alimento;
use App\Http\Requests\RefeicaoRequest;

class RefeicaoController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Refeicao $refeicao)
    {
        $this->repository = $refeicao;
        $this->request = $request;
    }

    //retorna lista a pagina de listagem de autores
    public function index(Request $request)
    {
        
        $registros = $this->repository->paginate(15);
        return view('refeicao.index', [
            'registros' => $registros,
        ]);
    }

    public function search(Request $request){

        $filters = $request->all();
        $registros = $this->repository->search($request->nome);

        return view('refeicao.index', [
            'registros' => $registros,
            'filters'=>$filters,
        ]);


    }

    //retorna a pagina para cadastrar um novo refeicao
    public function new()
    {   
        $usuarios = Usuario::all();
        $alimentos = Alimento::all();

        return view('refeicao.incluir', [
            'usuarios'=>$usuarios,
            'alimentos'=>$alimentos,
        ]);
    }
    // salvar o registro de um novo refeicao
    public function create(RefeicaoRequest $request)
    {
        $registro = $request->all();
        $this->repository->create($registro);
        return redirect()->route('refeicao.listar');
    }

    //retorna o registro de um refeicao para alteração dos dados. 
    public function update($id)
    {
        $usuarios = Usuario::all();
        $alimentos = Alimento::all();

        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back();
        }

        return view('refeicao.alterar',
            [
                'registro' => $registro,
                'usuarios'=>$usuarios,
                'alimentos'=>$alimentos,
            ]
        );
    }

     //alterar no banco o registro do refeicao- modificado pelo refeicao
     public function save(RefeicaoRequest $request, $id)
     {
         $data = $request->all();
 
         $registro = $this->repository->find($id);

         $registro->update($data);
         return redirect()->route('refeicao.listar');
     }

    //retorna o registro de um refeicao para excluir
    public function delete($id)
    {
        $usuarios = Usuario::all();
        $alimentos = Alimento::all();

        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back();
        }

        return view('refeicao.excluir', [
            'registro' => $registro,
            'usuarios'=>$usuarios,
            'alimentos'=>$alimentos,
        ]);
    }

     //excluir no banco o registro do refeicao
     public function excluir($id)
     {
         $registro = $this->repository->find($id);
         $registro->delete();
         return redirect()->route('refeicao.listar');
     }

    //retorna o registro para consulta - ver o registro na tela
    public function view($id)
    {
        $usuarios = Usuario::all();
        $alimentos = Alimento::all();

        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back();
        }

        return view('refeicao.consultar', [
            'registro' => $registro,
            'usuarios'=>$usuarios,
            'alimentos'=>$alimentos,
        ]);
    }


    // cancela a operação do refeicao
    public function cancel(Request $request)
    {
        return redirect()->route('refeicao.listar');
    }
}
