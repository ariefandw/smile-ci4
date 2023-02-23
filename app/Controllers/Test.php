<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function getIndex()
    {
        // dd(auth()->loggedIn());
        db_connect()->connect();
        $os   = ['windows', 'mac', 'linux'];
        $data = [
            'nama' => 'Smile',
            'alamat' => null,
            'os' => $os,
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