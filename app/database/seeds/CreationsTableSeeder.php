<?php

use Faker\Factory as Faker;
use MDH\Entities\User;

class CreationsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $user = User::find(1);

        foreach(range(1, 20) as $index)
        {
            $title = $faker->sentence(3);
            $user->creations()->create([
                'title'        => $index == 1 ? 'First creation' : $title,
                'slug'         => $index == 1 ? 'first-creation' : Str::slug($title),
                'weblink'      => $index == 1 ? 'http://martindilling.com' : (rand(0, 1) ? $faker->url() : null),
                'image'        => $faker->randomElement($array = array('1_full.png','2_full.png','3_full.png','4_full.png')),
                'thumb'        => $faker->randomElement($array = array('1_thumb.png','2_thumb.png','3_thumb.png','4_thumb.png')),
                'body'         => $faker->text(500),
                'publish_at'   => $index == 1 ? $faker->dateTimeBetween('-1 hour', 'now') : $faker->dateTimeBetween('-30 days', '+5 days'),
            ]);
        }
    }

}
