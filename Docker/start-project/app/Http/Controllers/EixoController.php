<?php

namespace App\Http\Controllers;
use App\Repositories\EixoRepository;
use App\Models\Eixo;

use Illuminate\Http\Request;

class EixoController extends Controller
{
    protected $repository;
    public function __construct(){
    $this->repository = new EixoRepository();
    }
    public function create()
    {
        return view('eixo.create');

    }
    public function index() {
        $data = $this->repository->selectAll();
        return view("eixo.index", compact('data'));
    }
    public function store(Request $request) {
        $obj = new Eixo();
        $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
        $this->repository->save($obj);
        return redirect()->route('eixo.index');
    }
    public function show(string $id) {
        $data = $this->repository->findById($id);
        return view('eixo.show', compact('data'));
    
    }
    public function edit(string $id){
        $data = $this->repository->findById($id);
        if(isset($data)) {
            return view('eixo.edit', compact('data'));
        }
        return view('message')
            ->with('template', "main")
            ->with('type', "warning")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Eixo não encontrado para alteração!")
            ->with('link', "eixo.index");
    }
    public function update(Request $request, string $id) {
        $obj = $this->repository->findById($id);
        if(isset($obj)) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $this->repository->save($obj);
            return redirect()->route('eixo.index');
        }
        return view('message')
            ->with('template', "main")
            ->with('type', "warning")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Eixo não encontrado para alteração!")
            ->with('link', "eixo.index");
    }
    public function destroy(string $id) {
        if($this->repository->delete($id)) {
            return redirect()->route('eixo.index');
        }
        return view('message')
            ->with('template', "main")
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o registro!")
            ->with('link', "eixo.index");
    }
}
