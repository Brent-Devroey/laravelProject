<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Brent',
            'email' => 'brent.devroey@gmail.com',
            'password' => Hash::make('Password!321'),
            'is_admin' => 0,
            'profile_picture' => 'profile_pictures/Serpiente_alquimica.jpg',
            'bio' => 'HELLO',
            'date_of_birth' => '2005-03-19',

        ]);

        User::create([
            'name' => 'Z',
            'email' => 'z@gmail.com',
            'password' => Hash::make('Password!321'),
            'is_admin' => 0,
            'profile_picture' => 'profile_pictures/CDSbrQ0frIXPl3FQ1FJ8yfYEv3epvmaBvKVorgac.jpg',
            'bio' => 'Z',
            'date_of_birth' => '2003-03-06',
        ]);
    }
}
