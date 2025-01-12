<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Meditations',
            'description' => 'Meditations is a series of personal writings by Marcus Aurelius, Roman Emperor from 161 to 180 AD, recording his private notes to himself and ideas on Stoic philosophy.',
            'rating' => 5,
            'image' => 'profile_pictures/Squirrel1.jpg',
            'user_id' => 1,
        ]);

        Book::create([
            'title' => 'The Art of War',
            'description' => 'The Art of War is an ancient Chinese military treatise dating from the Late Spring and Autumn Period (roughly 5th century BC).',
            'rating' => 4,
            'image' => 'profile_pictures/Squirrel2.jpg',
            'user_id' => 1,
        ]);

        Book::create([
            'title' => 'The myth of Sisyphus',
            'description' => 'The Myth of Sisyphus is a 1942 philosophical essay by Albert Camus.',
            'rating' => 3,
            'image' => 'profile_pictures/MA.jpg',
            'user_id' => 2,
        ]);

        Book::create([
            'title' => 'Letters from a Stoic',
            'description' => 'A collection of letters providing practical advice on how to live a fulfilling life',
            'rating' => 5,
            'image' => 'profile_pictures/1334109.jpeg',
            'user_id' => 2,
        ]);

        Book::create([
            'title' => 'The Republic',
            'description' => 'The Republic is a Socratic dialogue, authored by Plato around 375 BC, concerning justice, the order and character of the just city-state',
            'rating' => 4,
            'image' => 'profile_pictures/Jan_Matejko,_Stańczyk.jpg',
            'user_id' => 2,
        ]);
    }
}
