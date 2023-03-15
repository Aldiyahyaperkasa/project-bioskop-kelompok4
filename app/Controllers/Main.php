<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Faker\Provider\Base;

class Main extends BaseController
{
    public function index()
    {
        return view('Home');
    }
    // public function layout()
    // {
    //     return view('Layout');
    // }
}
