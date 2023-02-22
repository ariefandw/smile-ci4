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
        $data = $this->request->getVar();
        $q    = $data['q'] ?? "";
        $rows = $this->model
            ->where("CONCAT(category, title, description) LIKE '%" . $q . "%'")
            ->findAll();
        $data = [
            'rows' => $rows,
            'q' => $q,
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
        $this->model->insert($data);
        $this->response->redirect(site_url('post'));
    }

    public function getEdit($id)
    {
        $row  = $this->model->find($id);
        $data = [
            'row' => $row,
            'action' => site_url('post/update/' . $id),
        ];
        return view('post/form', $data);
    }

    public function postUpdate($id)
    {
        $data = $this->request->getVar();
        $this->model->update($id, $data);
        $this->response->redirect(site_url('post'));
    }

    public function postDelete($id)
    {
        $this->model->delete($id);
        $this->response->redirect(site_url('post'));
    }
}