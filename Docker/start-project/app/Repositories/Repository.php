<?php
namespace App\Repositories;

use App\Models\Curso;
use App\Models\Eixo;
use App\Models\Nivel;

class EixoRepository extends Repository {
    public function __construct() {
        parent::__construct(new Eixo());
    }
}
class NivelRepository extends Repository {
    public function __construct() {
        parent::__construct(new Nivel());
    }
}
class CursoRepository extends Repository {
    public function __construct() {
        parent::__construct(new Curso());
    }
    public function selectAllWith(array $orm) {
        return $this->model::with($orm)->get();
    }
    
}