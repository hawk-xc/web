<?php

namespace App\Controllers;

use App\Models\Show;

class Home extends BaseController
{
    public $cari;
    public function __construct()
    {
        $this->cari = new Show();
    }
    public function index()
    {
        $keyword = $this->request->getPost('keyword');

        if ($keyword) {
            $result = $this->cari->search($keyword);
        } else {
            $result = $this->cari;
        }

        $data = [
            'title' => 'halaman utama',
            'pagin' => $result->paginate(3, 'contact'),
            'pager' => $result->pager
        ];

        return view('index', $data);
    }
}
