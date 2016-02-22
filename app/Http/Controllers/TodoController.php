<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    public function createPoolView() {
        return view("todo.createPoolView");
    }

    public function createPoolWindowView() {
        return view("todo.createPoolWindowView");
    }
}
