<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $users = User::factory()->count(5)->create();
        }

        Post::factory()->count(30)->create([
            'user_id' => function () use ($users) {
                return $users->random()->id;
            }
        ]);
    }
}
