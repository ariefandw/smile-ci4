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
        return view('test', $data);
    }

    public function getHitung($bil1, $bil2)
    {
        $hasil = $bil1 + $bil2;
        return (string) $hasil;
    }
}