<?php


use Illuminate\Database\Seeder;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
    DB::table('posts')->truncate();
    factory(App\Post::class, 3)->create();
   }
}
