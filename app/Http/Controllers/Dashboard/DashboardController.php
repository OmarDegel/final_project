<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends MainController
{
    public function __construct()
    {
        $this->setClass('dashboard');
    }
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
