
@extends('layouts.master')

@push('style')
<link href="{{ asset('css/todoStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('todo.partial.todoBarView')
    @yield('todoutilbar')

@endsection

@section('navbar')

    @include('todo.partial.todoNavView', ["item"=>"poolwindow"])
    @yield('todonavbar')

@endsection

@section('content')
    <div class="row">
        <h1>New Pool Window</h1>
        <form action="{{ url('todo/poolwindow/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Task Name -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Pool</label>

                <div class="col-sm-6">
                    <select class="form-control" name="pool">
                        @foreach ($pools as $pool)
                            <option value="{{ $pool->id }}" >{{ $pool->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Weekday</label>

                <div class="col-sm-6">
                    <select class="form-control" name="weekday">
                      <option value="1" >Mon</option>
                      <option value="2" >Tue</option>
                      <option value="3" >Wed</option>
                      <option value="4" >Thu</option>
                      <option value="5" >Fri</option>
                      <option value="6" >Sat</option>
                      <option value="7" >Sun</option>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Start time</label>

                <div class="col-sm-6">
                    <input type="text" name="start_time" class="form-control" value="12:00">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">End time</label>

                <div class="col-sm-6">
                    <input type="text" name="end_time" class="form-control" value="12:00">
                </div>
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Add Poolwindow
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection