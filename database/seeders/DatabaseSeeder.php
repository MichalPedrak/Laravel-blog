<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Przed db:seed czyścimy tabelki
        User::truncate();
        Category::truncate();
        Post::truncate();

        Post::factory()->create();


//        $user = User::factory()->create([
//            'name' => 'John Doe'
//        ]);
//
//        posts::factory(5)->create([  // tego używamy jak nie mamy factory - associate this post iwht created $user moment ago
//            'user_id' => $user->id
//        ]);

        Post::factory()->create(5);

    }
}
