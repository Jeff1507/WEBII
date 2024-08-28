<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["nome" => "ADMINISTRADOR"],
            ["nome" => "COORDENADOR"],
            ["nome" => "PROFESSOR"],
            ["nome" => "ALUNO"],
            ];
            DB::table('roles')->insert($data);
    }
}
