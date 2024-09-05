<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TurmasRepository;
use App\Repositories\CursoRepository;
use App\Models\Aluno;
use App\Repositories\AlunosRepository;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $repository;
    public function __construct(){
        $this->repository = new AlunosRepository();
    }
    public function index()
    {
        $cursos = (new CursoRepository())->selectAll();
        $turmas = (new TurmasRepository())->selectAll();
        return view('aluno.register', compact(['cursos', 'turmas']));
    }
    public function register() {
        $cursos = (new CursoRepository())->selectAll();
        $turmas = (new TurmasRepository())->selectAll();
        return view('aluno.register', compact(['cursos', 'turmas']));
        }
        public function storeRegister(Request $request) {
        $objCurso = (new CursoRepository())->findById($request->curso_id);
        $objTurma = (new TurmasRepository())->findById($request->turma_id);
        if(isset($objCurso) && isset($objTurma)) {
        $obj = new Aluno();
        $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
        $obj->cpf = $request->cpf;
        $obj->email = mb_strtolower($request->email, 'UTF-8');
        $obj->password = Hash::make($request->password);
        $obj->curso()->associate($objCurso);
        $obj->turma()->associate($objTurma);
        $this->repository->save($obj);
        return view('message')
        ->with('template', "site")
        ->with('type', "success")
        ->with('titulo', "")
        ->with('message', "[OK] Registro efetuado com sucesso!")
        ->with('link', "site");
        }
        return view('message')
        ->with('template', "site")
        ->with('type', "danger")
        ->with('titulo', "")
        ->with('message', "Não foi possível efetuar o registro!")
        ->with('link', "site");
        }
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
