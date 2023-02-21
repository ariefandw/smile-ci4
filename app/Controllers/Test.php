<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function getIndex()
    {
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
        $data = [];
        return view('test/hitung', $data);
    }
}