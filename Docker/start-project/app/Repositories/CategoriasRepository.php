<?php
namespace App\Repositories;
use App\Models\Categorias;
class CategoriasRepository extends Repository {
    public function __construct() {
        parent::__construct(new Categorias());
    }
}