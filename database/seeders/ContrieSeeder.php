<?php

namespace Database\Seeders;

use App\Models\Contrie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContrieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            ['name' => 'Item 1', 'code' => 'CODE001'],
            ['name' => 'Item 2', 'code' => 'CODE002'],
            // Add more items as needed
        ];
    
        foreach ($data as $item) {
            Contrie::create($item);
        }





        // $country = new Contrie();
        // $country->name = 'bangladesh';
        // $country->code = 'BD';
        // $country->save();

        // $country = new Contrie();
        // $country->name = 'amirica';
        // $country->code = 'UK';
        // $country->save();

    }
}
