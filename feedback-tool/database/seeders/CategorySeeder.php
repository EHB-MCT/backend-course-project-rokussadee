<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[
            'Algemeen',
            'Individueel',
            'Aanpak en/of werkwijze',
            'Doelen en onderwerpen',
            'Relationeel',
            'Relatie',
            'Sociaal'
        ];

        foreach ($categories as $category) {
            Category::create([
                'title' => $category
            ]);
        }
    }
}
