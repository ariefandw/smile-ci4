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

    public function getNew()
    {
        $row  = $this->model;
        $data = [
            'row' => $row,
            'action' => site_url('post/create'),
        ];
        return view('post/form', $data);
    }

    public function postCreate()
    {
        $data = $this->request->getVar();
        dd($data);
        $this->response->redirect(site_url('post'));
    }
}