<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryAddDescription extends Migration
{
    public function up()
    {
        $this->forge->addColumn('category', [
            'category_description' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('category', ['category_description']);
    }
}