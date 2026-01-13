<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
abstract class Controller
{
    //
}
=======
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
>>>>>>> 44fc51f (push)
