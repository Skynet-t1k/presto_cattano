<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'elettronica',
        'abbigliamento',
        'salute & bellezza',
        'casa & giardinaggio',
        'giocattoli',
        'sport',
        'animali domestici',
        'libri & riviste',
        'accessori',
        'motori',
        'videogames'
    ];

    public function run(): void
    {

        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
