<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['player','owner','admin'];
        foreach ($roles as $role){
            DB::table('roles')->insert(
                ['name' => $role]);
        }
    }
}
