<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'Category update',
            'content' => 'You can now add categories to books',
            'image' => 'images/Jan_Matejko,_Stańczyk.jpg'
        ]);

        News::create([
            'title' => 'News update',
            'content' => 'You can now see news',
            'image' => 'images/MA.jpg'
        ]);

        News::create([
            'title' => 'Logout',
            'content' => 'You can now logout',
            'image' => 'images/Squirrel2.jpg'
        ]);

        News::create([
            'title' => 'FAQ',
            'content' => 'You can use the FAQ',
            'image' => 'images/Squirrel1.jpg'
        ]);
    }
}
