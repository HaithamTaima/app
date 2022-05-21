<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//      $this->call(UserSeeder::class);
//      $this->call(PostSeeder::class);
//      $this->call(InterestSeeder::class);
        $this->call([
            UserSeeder::class,
            InterestSeeder::class,
            PostSeeder::class
        ]);

        foreach (range(1,500) as $item){
            app('db')
                ->table('user_interest')
                ->insert([
                    'user_id' => DB::table('users')
                        ->inRandomOrder()
                        ->first()->id,
                    'interest_id' => DB::table('interests')
                        ->inRandomOrder()
                        ->first()->id
                ]);
        }

    }
}
