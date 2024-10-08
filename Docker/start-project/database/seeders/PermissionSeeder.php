<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            //ADMINISTRADOR
            ["role_id" => 1, "resource_id" => 1, "permission" => true],
            ["role_id" => 1, "resource_id" => 2, "permission" => true],
            ["role_id" => 1, "resource_id" => 3, "permission" => true],
            ["role_id" => 1, "resource_id" => 4, "permission" => true],
            ["role_id" => 1, "resource_id" => 5, "permission" => true],
            // COORDENADOR
            ["role_id" => 2, "resource_id" => 1, "permission" => false],
            ["role_id" => 2, "resource_id" => 2, "permission" => false],
            ["role_id" => 2, "resource_id" => 3, "permission" => false],
            ["role_id" => 2, "resource_id" => 4, "permission" => false],
            ["role_id" => 2, "resource_id" => 5, "permission" => false],
            // PROFESSOR
            ["role_id" => 3, "resource_id" => 1, "permission" => false],
            ["role_id" => 3, "resource_id" => 2, "permission" => false],
            ["role_id" => 3, "resource_id" => 3, "permission" => false],
            ["role_id" => 3, "resource_id" => 4, "permission" => false],
            ["role_id" => 3, "resource_id" => 5, "permission" => false],
            // ALUNO
            ["role_id" => 4, "resource_id" => 1, "permission" => false],
            ["role_id" => 4, "resource_id" => 2, "permission" => false],
            ["role_id" => 4, "resource_id" => 3, "permission" => false],
            ["role_id" => 4, "resource_id" => 4, "permission" => false],
            ["role_id" => 4, "resource_id" => 5, "permission" => false],
        ];
        DB::table('permissions')->insert($data);
    }
}
