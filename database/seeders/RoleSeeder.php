<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rols=['admin','writter','user'];
        foreach($rols as $role){
            $Role= new Role();
            $Role->name = $role;
            $Role->save();
        }
    }
}
