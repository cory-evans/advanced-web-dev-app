<?php

namespace Database\Seeders;

use App\Models\Forum\ForumPost;
use App\Models\Forum\ForumPostComment;
use App\Models\Shop\ShopProduct;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        User::factory()
            ->has(
                ForumPost::factory()
                ->count(3)
            )
            ->count(25)
            ->create();

        ForumPost::factory()
            ->count(30)
            ->state(function (array $attributes, ForumPost|null $fp) {
                return [
                    'user_id' => User::all()->random()->id,
                ];
            })
            ->create();

        // create post comments with a random user_id
        ForumPostComment::factory()
            ->count(100)
            ->state(function (array $attributes, ForumPostComment|null $fpc) {
                return [
                    'user_id' => User::all()->random()->id,
                    'forum_post_id' => ForumPost::all()->random()->id
                ];
            })
            ->create();
        ShopProduct::factory()
            ->count(30)
            ->create();
    }
}
