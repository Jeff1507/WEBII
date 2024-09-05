<?php 

namespace App\Repositories;

use App\Models\Categorias;

class CategoriasRepository extends Repository { 

    protected $rows = 6;

    public function __construct() {
        parent::__construct(new Categorias());
    }   

    public function getRows() { return $this->rows; }
}