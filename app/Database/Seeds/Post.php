<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Post extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $post  = new \App\Models\Post();
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'category' => $faker->numerify(),
                'title' => $faker->name(),
                'description' => $faker->text(),
            ];
            $post->insert($data);
        }
    }
}