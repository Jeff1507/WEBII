<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TurmasRepository;

class TurmasController extends Controller
{
    protected $repository;
    private $rules = [
        'ano' => 'required|unique:turmas',
    ];
    private $messages = [
        "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        "unique" => "Já existe uma truam cadastrada com esse [:attribute]!",
    ];
    public function __construct(){
        $this->repository = new TurmasRepository();
    }
    public function index()
    {
        //
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
