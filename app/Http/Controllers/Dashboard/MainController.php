<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class MainController extends Controller
{
    protected $class;


    protected function setClass($class)
    {
        $this->class = $class;
        View::share('class', $class);
    }
}
