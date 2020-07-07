<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();

        factory(User::class,10)->create()->each(function($user){
            
            $user->posts()->save(factory(Post::class)->make());

        }); 
        
        // factory(Post::class,10)->create();        
        
        // factory(User::class,10)->create()->each(function($user){
        //     $user->posts()->save(factory(Post::class)->make());
        // });

        // $this->call(PostTableSeeder::class);
    }
}
