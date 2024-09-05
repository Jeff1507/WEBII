<?php 

namespace App\Repositories;

use App\Models\Categorias;
use App\Models\Documentos;
use App\Repositories\CategoriasRepository;

class DocumentoRepository extends Repository { 

    protected $rows = 6;
    private $map = [-1 => 'RECUSADO', 0 => 'SOLICITADO', 1 => 'ACEITO' ];

    public function __construct() {
        parent::__construct(new Documentos());
    }

    public function getRows() { return $this->rows; }
    
    public function mapStatus($data) {

        if(!is_array($data))
            $data->status = $this->map[$data->status]; 
        else 
            for($a=0; $a<count($data); $a++)
                $data[$a]['status'] = $this->getMapStatus($data[$a]['status']);

        return $data;
    }

    public function getDocumentsToAssess($curso_id, $paginate) {

        $arr = array();
        $categorias = (new CategoriasRepository())->findByColumn(
            'curso_id', 
            $curso_id,
            (object) ["use" => false, "rows" => $this->rows]
        );
        // $categorias = Categoria::where('curso_id', $curso_id)->get();
        foreach($categorias as $c) array_push($arr, $c->id);
        
        if($paginate) {
            $data = Documentos::with(['categoria', 'user'])->whereIn('categoria_id', $arr)
                ->where('status', 0)->orderBy('created_at')->paginate($this->rows);
        }
        else {
            $data = Documentos::with(['categoria', 'user'])->whereIn('categoria_id', $arr)
                ->where('status', 0)->orderBy('created_at')->get();
        }

        return $data;
    }

    public function getTotalHoursByStudent($user_id) {

        return (object) [
            "total_in" => Documentos::where('user_id', $user_id)->sum('horas_in'),
            "total_out" => Documentos::where('user_id', $user_id)->sum('horas_out'),
        ];

    }

    public function getMapStatus($status) {
        return $this->map[$status];
    }
}