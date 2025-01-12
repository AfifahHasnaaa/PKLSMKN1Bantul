<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listUser()
    {
        return view('admin.user.listUser');
    }

    public function tambahUser()
    {
        return view('admin.user.tambahUser');
    }

    public function listRole()
    {
        return view('admin.role.role');
    }
}
