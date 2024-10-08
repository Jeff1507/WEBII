<?php 

namespace App\Repositories;

use stdClass;
use App\Models\Turmas;

class TurmasRepository extends Repository { 

    protected $rows = 6;

    public function __construct() {
        parent::__construct(new Turmas());
    }   

    public function getRows() { return $this->rows; }

    public function selectAllAdapted($curso_id = 0) {

        if($curso_id == 0)
            $turmas = $this->selectAllWith(
                ['curso'], 
                (object) ["use" => true, "rows" => $this->rows]
            );
        else 
            $turmas = $this->findFirstByColumn(
                'curso_id',
                $curso_id, 
                ['curso'],
                (object) ["use" => true, "rows" => $this->rows]
            );

        $cont = 0;
        foreach($turmas as $turma) {
            $turmas[$cont]["turma"] = $turma->curso->sigla.$turma->ano;
            $turmas[$cont]["curso"] = $turma->curso->nome;
            $cont++;
        }   

        return $turmas;
    }
}