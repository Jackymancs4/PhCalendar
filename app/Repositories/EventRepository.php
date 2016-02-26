<?php

namespace App\Repositories;

use App\Event;

class EventRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function getAll()
    {
        return Event::all();
    }

    public function find($id)
    {
        return Event::find($id);
    }

    public function findEventforDay($dayString)
    {
        return Event::where('start_date','<=',$dayString)->where('end_date','>=',$dayString)->get();
    }

    public function countEventforDayforType($dayString, $type)
    {
        return Event::where('start_date','<=',$dayString)->where('end_date','>=',$dayString)->where('type', $type)->count();
    }

}