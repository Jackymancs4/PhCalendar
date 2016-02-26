<?php

namespace App\Repositories;

use App\Pool;
use App\Poolwindow;
use App\Todo;

class TodoRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function getAllPools()
    {
        return Pool::all();

    }

    public function getAllTodos()
    {
        return Todo::all();

    }

    public function getAllPoolWindows()
    {
        return Poolwindow::orderBy('weekday')->orderBy('start_time')->get();

    }

    public function getAllTodoswithoutParent()
    {
        return Todo::where('parent', NULL)->get();

    }

    public function getPoolwindowsforHour($hour, $day)
    {
        return Poolwindow::where('weekday', $day)->where('start_time','<=',$hour)->where('end_time','>',$hour)->get();

    }

}