<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function show()
    {
        $data = [
            'nama'  => $this->request->getVar('nama'),
            'nis'  => $this->request->getVar('nis'),
            'kelas'  => $this->request->getVar('kelas'),
            'tgllahir'  => $this->request->getVar('tgllahir'),
            'tempatlahir'  => $this->request->getVar('tempatlahir'),
            'alamat'  => $this->request->getVar('alamat'),
            'gender'  => $this->request->getVar('gender'),
            'agama'  => $this->request->getVar('agama'),
        ];

        // return view('show', $data);
        return view('show', $data);
    }
}
