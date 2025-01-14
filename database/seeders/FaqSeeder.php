<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach (Category::all() as $category) {
            $faq = Faq::create([
                'question' => 'Sample FAQ for ' . $category->name,
                'answer' => 'This is a sample FAQ answer for ' . $category->name . ' category.',
            ]);

            $faq->categories()->attach($category);
        }
    }
}
