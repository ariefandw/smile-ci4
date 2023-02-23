<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function getIndex()
    {
        // dd(auth()->loggedIn());
        db_connect()->connect();
        $model  = new \App\Models\Post();
        $rows   = $model->limit(3)->find();
        $events = [];
        foreach ($rows as $row) {
            $events[] = [
                'title' => $row->title,
                'start' => $row->created_at,
                'end' => $row->updated_at,
                'url' => site_url('post/edit/' . $row->id),
            ];
        }

        $os   = ['windows', 'mac', 'linux'];
        $data = [
            'nama' => 'Smile',
            'alamat' => null,
            'os' => $os,
            'json' => json_encode($events),
        ];
        return view('test/test', $data);
    }

    public function getHitung()
    {
        $data = $this->request->getVar();
        $bil1 = $data['bil1'] ?? 0;
        $bil2 = $data['bil2'] ?? 0;
        $data = [
            'bil1' => $bil1,
            'bil2' => $bil2,
            'hasil' => $bil1 + $bil2,
        ];
        return view('test/hitung', $data);
    }
}