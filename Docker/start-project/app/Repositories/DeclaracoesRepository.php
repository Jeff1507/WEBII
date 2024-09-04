<?php
namespace App\Repositories;
use App\Models\Declaracoes;
class DeclaracoesRepository extends Repository {
    public function __construct() {
        parent::__construct(new Declaracoes());
    }
}