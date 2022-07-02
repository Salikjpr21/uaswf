<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $data['nav'] = 'home';
        $data['nama'] = session()->get('username');
        return view('admin/home', $data);
    }
}
