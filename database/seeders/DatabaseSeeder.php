<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Question::factory(30)->create();
        \App\Models\Reply::factory(10)->create()->each(function($reply){
            return $reply->likes()->save(\App\Models\Like::factory()->make());
        });
    }
}