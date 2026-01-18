<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function rubbish()
    {
        return view('dashboard.rubbish.index');
    }
    public function rubbishCreate()
    {
        return view('dashboard.rubbish.create');
    }
    public function rubbishEdit()
    {
        return view('dashboard.rubbish.edit');
    }

    public function point()
    {
        return view('dashboard.point.index');
    }
    public function pointCreate()
    {
        return view('dashboard.point.create');
    }
}
