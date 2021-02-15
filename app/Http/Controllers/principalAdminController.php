<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class principalAdminController extends Controller
{
    public function templete()
    {
        return view('Admin.templeteAdmin');
    }
}
