<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model {
    use HasFactory;
    use SoftDeletes;
    protected $table = "niveis";
    public function curso() {
    $this->hasMany('\App\Models\Curso');
}
}
