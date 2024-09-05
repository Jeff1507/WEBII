<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $this->authorize('index', Documentos::class);

        $data = Documentos::all();    
        Storage::disk('local')->put('example.txt', 'Contents');
        return view('documentos.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Documentos::class);
        return view('documentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Documentos::class);
        if($request->hasFile('documento')) {

            $documento = new Documentos();
            $documento->url = $request->url;
            $documento->save();
            $ext = $request->file('documento')->getClientOriginalExtension();
            $nome_arq = $documento->id . "_" . time() . "." . $ext; 
            $request->file('documento')->storeAs("public/", $nome_arq);
            $documento->url = $nome_arq;
            $documento->save();

            return redirect()->route('documentos.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }
    
    public function report() {

        $data = Documentos::all();

        // Instancia um Objeto da Classe Dompdf
        $dompdf = new Dompdf();
        // Carrega o HTML
        $dompdf->loadHtml(view('documentos.pdf', compact('data')));
        // Converte o HTML em PDF
        $dompdf->render();
        // Serializa o PDF para Abertura em uma Nova A
        $dompdf->stream("relatorio-horas-turma.pdf", 
            array("Attachment" => false));
    }
    public function graph() {
        
        $data = json_encode([
            ["NOME", "TOTAL"],
            ["Eduardo", 100],
            ["Maria", 130],
            ["Carlos", 200],
            ["Rafaela", 120],
        ]);

        return view('documentos.graph', compact('data'));
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
