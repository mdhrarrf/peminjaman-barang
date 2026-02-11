<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('roles')->insert([
            [
                'role_id'   => 1,
                'role_name' => 'admin', 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role_id'   => 2,
                'role_name' => 'user', 
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
