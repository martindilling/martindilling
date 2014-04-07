<?php

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use MDH\Entities\User;

class PostsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $user = User::find(1);

        foreach(range(1, 20) as $index)
        {
            $title = $faker->sentence(3);
            $body = $faker->text(500);
            $user->posts()->create([
                'title'        => $index == 1 ? 'First blog post' : $title,
                'slug'         => $index == 1 ? 'first-blog-post' : Str::slug($title),
                'summary'      => Str::limit($body, 100),
                'body'         => $body,
                'publish_at'   => $index == 1 ? $faker->dateTimeBetween('-1 hour', 'now') : $faker->dateTimeBetween('-30 days', '+5 days'),
//                'unpublish_at' => $index == 1 ? 'Martin Dilling-Hansen' : $faker->name(),
            ]);
        }
    }

}
