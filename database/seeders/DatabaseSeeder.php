<?php

namespace Database\Seeders;

use App\Models\Forum\ForumPost;
use App\Models\Forum\ForumPostComment;
use App\Models\Media;
use App\Models\Shop\ShopProduct;
use App\Models\Shop\ShopProductCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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

        // scan the media storage folder for images
        $files = Storage::allFiles('media');
        for ($i=0; $i < count($files); $i++) {
            $f = $files[$i];
            $media = new Media();
            $media->name = 'file_' . $i;
            $media->path = $f;

            $media->save();
        }

        // create categories
        $categories = [
            'Computers & Tablets',
            'PC Peripherals & Accessories',
            'PC Parts',
            'Networking',
            'Printing & Office',
            'Phones & Accessories',
            'TV & AV',
            'Headphones & Audio',
            'Gaming',
            'Cameras & Drones',
            'Smart Home & Security',
            'Toys, Hobbies & STEM'
        ];
        foreach ($categories as $cat) {
            ShopProductCategory::create([
                'name' => $cat
            ]);
        }

        ShopProduct::factory()
            ->count(30)
            ->state(function (array $attributes, ShopProduct|null $fpc) {
                return [
                    'media_id' => Media::all()->random()->id,
                    'category_id' => ShopProductCategory::all()->random()->id
                ];
            })
            ->create();
    }
}
