<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Post extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $post  = new \App\Models\Post();
        $post->truncate();
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'category' => $faker->numberBetween(1, 3),
                'title' => $faker->name(),
                'description' => $faker->text(),
            ];
            $post->insert($data);
        }
    }
}