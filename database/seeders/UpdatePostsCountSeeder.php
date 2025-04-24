<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UpdatePostsCountSeeder extends Seeder
{
    public function run()
    {
        // Option 1: Using chunks with direct count
        User::chunk(200, function ($users) {
            foreach ($users as $user) {
                $user->update([
                    'posts_count' => $user->posts()->count()
                ]);
            }
        });

        // Option 2: Disable model events if needed
        // User::withoutEvents(function () {
        //     User::chunk(200, function ($users) {
        //         foreach ($users as $user) {
        //             $user->update([
        //                 'posts_count' => $user->posts()->count()
        //             ]);
        //         }
        //     });
        // });
    }
}
