<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index():View{
       // dd('llegueeeee en el index');
        return view('todos.index');
    }

    public function create():View{
        return view('todos.create');
    }
}
