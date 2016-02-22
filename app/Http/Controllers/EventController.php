<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\EventRepository;
use App\Event;

class EventController extends Controller
{

    public function createView() {

        return view("event.createView");

    }

    public function listView() {

    	$event= new EventRepository();
        return view("event.listView", ['events'=>$event->getAll()]);

    }

    public function getView($id) {

    	$event= new EventRepository();
        return view("event.getView", ['event'=>$event->find($id)]);

    }

    public function store(Request $request) {
	    $this->validate($request, [
	        'title' => 'required|max:50',
            'description' => 'max:65535',
            'start_date' => 'date|before:3000-12-31|after:1970-1-1',
            'end_date' => 'date|before:3000-12-31|after:start_date',                
	    ]);

	    $event = new Event();

	    $event->title=$request->title;
        $event->description=$request->description;
        $event->start_date=$request->start_date;
        $event->end_date=$request->end_date;
        $event->start_time=$request->start_time;
        $event->end_time=$request->end_time;

	    $event->save();

	    return redirect(('/event/create'));
	}

}
