<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;



class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'admin',
                'email' => 'admin@ehb.be',
                'password' => Hash::make('Password!321'),
                'is_admin' => 1,
                'profile_picture' => 'profile_pictures/Squirrel1.jpg',
                'bio' => 'admin',
                'date_of_birth' => '325-01-1',
            ]
        );
    }
}
