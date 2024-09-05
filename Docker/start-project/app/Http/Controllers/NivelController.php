<?php

namespace App\Http\Controllers;
use App\Repositories\NivelRepository;
use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    protected $repository;
    public function __construct(){
    $this->repository = new NivelRepository();
    }
    public function index()
    {
        $data = $this->repository->selectAll();
        return view("nivel.index", compact('data'));
    }  
    public function create()
    {
        return view('nivel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $obj = new Nivel();
        if (isset($obj)) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $this->repository->save($obj);
            return redirect()->route('nivel.index');
            # code...
        }
        return view('message')
            ->with('template', "main")
            ->with('type', "warning")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Nivel não encontrado para alteração!")
            ->with('link', "nivel.index");
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->repository->findById($id);
        return view('nivel.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->repository->findById($id);
        if(isset($data)) {
            return view('nivel.edit', compact('data'));
        }
        return view('message')
            ->with('template', "main")
            ->with('type', "warning")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Nível não encontrado para alteração!")
            ->with('link', "nivel.index");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = $this->repository->findById($id);
        if(isset($obj)) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $this->repository->save($obj);
            return redirect()->route('nivel.index');
        }
        return view('message')
            ->with('template', "main")
            ->with('type', "warning")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Nivel não encontrado para alteração!")
            ->with('link', "nivel.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($this->repository->delete($id)) {
            return redirect()->route('nivel.index');
        }
        return view('message')
            ->with('template', "main")
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o registro!")
            ->with('link', "nivel.index");
    }
}
