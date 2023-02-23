<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Category extends Seeder
{
    public function run()
    {
        $category = new \App\Models\Category();
        $category->truncate();
        $category->insert([
            'category_name' => 'News',
            'category_description' => 'Post berisi berita',
        ]);
        $category->insert([
            'category_name' => 'Sport',
            'category_description' => 'Post tentang olah raga',
        ]);
        $category->insert([
            'category_name' => 'Politics',
            'category_description' => 'Post tentang politik',
        ]);
    }
}