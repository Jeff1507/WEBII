<?php
namespace App\Repositories;
use App\Models\Comprovantes;
class ComprovantesRepository extends Repository {
    public function __construct() {
        parent::__construct(new Comprovantes());
    }
}