<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');      // use Illuminate\Support\Facades\DB;
        DB::table('users')->truncate();     // remove older data in users table
        // DB::table('posts')->truncate();     // remove older data in posts table


        // Automatic creation
        User::factory(10)->create();            // use App\Models\User;
        // adding data to linked table
        // User::factory(10)->create()->each(function($user){
        //     $user->posts()->save(Post::factory(10)->make());
        // });

        // Manual creation
        // $this->call(UsersTableSeeder::class);
    }
}
