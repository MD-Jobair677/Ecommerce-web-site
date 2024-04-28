<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user= new User();
        $user->name = 'Md Shovo';
        $user->email = 'shovom677@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('admin');

        User::factory(10)->create();
    }
}
