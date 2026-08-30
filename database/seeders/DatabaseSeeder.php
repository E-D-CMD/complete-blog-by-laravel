<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name' => 'kenny',
            'email' => 'kenny@gmail.com',
            'password' => Hash::make('87654321'),
        ]);

        $user2 = User::factory()->create([
            'name' => 'john',
            'email' => 'john@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        Post::create([
            'user_id' => $user1->id,
            'content' => 'This is a tryout Laravel project',
        ]);

        Post::create([
            'user_id' => $user2->id,
            'content' => 'This is just dummy data',
        ]);
    }
}
