<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Post extends BaseController
{
    public $model;

    public function __construct()
    {
        $this->model = new \App\Models\Post();
    }

    public function getIndex()
    {
        $rows = $this->model->findAll();
        $data = [
            'rows' => $rows,
        ];
        return view('post/index', $data);
    }
}