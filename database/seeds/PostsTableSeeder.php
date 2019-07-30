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
        // $this->call(UsersTableSeeder::class);
        // $this->call(PostsTableSeeder::class);

        foreach(range(1, 100) as $key => $num){
            // echo('名前' . $num);
            // echo('address' . $num . '@2ndwave.jp');
            // echo(bcrypt('2ndwave'));
            User::create([
                'name'     => '名前' . $num,
                'email'    => 'address' . $num . '@2ndwave.jp',
                'password' => bcrypt('2ndwave'),
            ]);
        }

    }
}
