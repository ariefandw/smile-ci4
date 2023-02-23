<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;

class Post extends BaseController
{
    public $model;
    public $categories;
    public $perPage = 5;

    public function __construct()
    {
        $this->model      = new \App\Models\Post();
        $this->categories = (new \App\Models\Category())->findAll();
    }

    public function getIndex()
    {
        $data = $this->request->getVar();
        $q    = $data['q'] ?? "";
        $rows = $this->model
            ->select('post.*, category_name, category_description')
            ->join('category', 'category.id = post.category_id')
            ->where("CONCAT(category_name, title, description) LIKE \"%$q%\"")
            ->orderBy('updated_at', 'desc');
        $data = [
            'rows' => $rows->paginate($this->perPage),
            'pager' => $rows->pager,
            'q' => $q,
        ];
        return view('post/index', $data);
    }

    public function getNew()
    {
        $row  = $this->model;
        $data = [
            'categories' => $this->categories,
            'row' => $row,
            'action' => site_url('post/create'),
        ];
        return view('post/form', $data);
    }

    public function postCreate()
    {
        $data = $this->request->getVar();

        $rules      = [
            'title' => 'required',
        ];
        $validation = \Config\Services::validation();
        if (!$this->validate($rules)) {
            return 'tidak valid';
        }

        $this->model->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        $this->response->redirect(site_url('post'));
    }

    public function getEdit($id)
    {
        $row  = $this->model->find($id);
        $data = [
            'categories' => $this->categories,
            'row' => $row,
            'action' => site_url('post/update/' . $id),
        ];
        return view('post/form', $data);
    }

    public function postUpdate($id)
    {
        $data = $this->request->getVar();
        $this->model->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil diupdate');
        $this->response->redirect(site_url('post'));
    }

    public function postDelete($id)
    {
        try {
            $this->model->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            session()->setFlashdata('danger', $th->getMessage());
        }
        $this->response->redirect(site_url('post'));
    }

    public function getPrint()
    {
        $filename = date('y-m-d_H.i.s') . '-surat_tugas';
        $dompdf   = new Dompdf();
        $data     = $this->request->getVar();
        $q        = $data['q'] ?? "";
        $rows     = $this->model
            ->select('post.*, category_name, category_description')
            ->join('category', 'category.id = post.category_id')
            ->where("CONCAT(category_name, title, description) LIKE \"%$q%\"")
            ->orderBy('updated_at', 'desc');
        $data     = [
            'rows' => $rows->paginate($this->perPage),
            'pager' => $rows->pager,
            'q' => $q,
        ];

        $dompdf->getOptions()->setChroot(FCPATH);
        $dompdf->loadHtml(view('post/print', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("$filename.pdf", ['Attachment' => 0]);
        exit;
    }


}