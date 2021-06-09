<?php

namespace App\Http\Controllers;

use App\models\Alimento;
use Illuminate\Http\Request;
use Illuminate\Cache\Repository;
use App\Http\Requests\AlimentoRequest;

class AlimentoController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Alimento $alimento)
    {
        $this->repository = $alimento;
        $this->request = $request;
    }

    //retorna lista a pagina de listagem de autores
    public function index(Request $request)
    {
        
        $registros = $this->repository->paginate(15);
        return view('alimento.index', [
            'registros' => $registros,
        ]);
    }

    public function search(Request $request){

        $filters = $request->all();
        $registros = $this->repository->search($request->nome);

        return view('alimento.index', [
            'registros' => $registros,
            'filters'=>$filters,
        ]);


    }

    //retorna a pagina para cadastrar um novo alimento
    public function new()
    {
        return view('alimento.incluir');
    }
    // salvar o registro de um novo alimento
    public function create(AlimentoRequest $request)
    {
        $registro = $request->all();
        $this->repository->create($registro);
        return redirect()->route('alimento.listar');
    }

    //retorna o registro de um alimento para alteração dos dados. 
    public function update($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back();
        }

        return view('alimento.alterar',
            [
                'registro' => $registro,
            ]
        );
    }

     //alterar no banco o registro do alimento- modificado pelo alimento
     public function save(AlimentoRequest $request, $id)
     {
         $data = $request->all();
 
         $registro = $this->repository->find($id);

         $registro->update($data);
         return redirect()->route('alimento.listar');
     }

    //retorna o registro de um alimento para excluir
    public function delete($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back();
        }

        return view('alimento.excluir', [
            'registro' => $registro,
        ]);
    }

     //excluir no banco o registro do alimento
     public function excluir($id)
     {
         $registro = $this->repository->find($id);
         $registro->delete();
         return redirect()->route('alimento.listar');
     }

    //retorna o registro para consulta - ver o registro na tela
    public function view($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back();
        }

        return view('alimento.consultar', [
            'registro' => $registro,
        ]);
    }


    // cancela a operação do alimento
    public function cancel(Request $request)
    {
        return redirect()->route('alimento.listar');
    }
}
