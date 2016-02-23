<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\TodoRepository;
use App\Pool;
use App\Poolwindow;
use App\Todo;


class TodoController extends Controller
{
    public function createPoolView() {
        return view("todo.createPoolView");
    }

    public function createPoolWindowView() {

    	$pools=new TodoRepository();
        return view("todo.createPoolWindowView", ["pools"=>$pools->getAllPools()]);
    }

    public function createView() {

        $repo=new TodoRepository();

        return view("todo.createView", ["pools"=>$repo->getAllPools(), "todos"=>$repo->getAllTodos()]);
    }

    public function storePool(Request $request) {

    	$pool= new Pool();
    	$pool->name=$request->name;
    	$pool->description=$request->description;
    	$pool->sorting=$request->sorting;

    	if (isset($request->active)) {
    		$pool->active=$request->active;
    	} else {
    		$pool->active=0;
    	}

    	$pool->save();

	    return redirect('/todo/pool/create');
    }
    
    public function storePoolWindow(Request $request) {

    	$poolwindow= new Poolwindow();
    	$poolwindow->pool=$request->pool;
    	$poolwindow->weekday=$request->weekday;
    	$poolwindow->start_time=$request->start_time;
        $poolwindow->end_time=$request->end_time;

    	$poolwindow->save();

	    return redirect('/todo/poolwindow/create');
    }
        
    public function store(Request $request) {

        $todo= new Todo();
        $todo->name=$request->name;
        $todo->description=$request->description;
        $todo->priority=$request->priority;
        $todo->duration=$request->duration;
        $todo->pool=$request->pool;
        $todo->parent=$request->parent;

        $todo->save();

	    return redirect('/todo/create');
    }

}
