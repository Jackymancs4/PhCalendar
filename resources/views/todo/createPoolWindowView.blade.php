
@extends('layouts.master')

@push('style')
<link href="{{ asset('css/dayStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('todo.partial.todoBarView')
    @yield('todoutilbar')

@endsection

@section('navbar')

@endsection

@section('content')
    <div class="row">
        <h1>New Pool Window</h1>
        <form action="{{ url('event/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Task Name -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Pool</label>

                <div class="col-sm-6">
                    <select class="form-control" name="repetition">
                      <option>random</option>
                      <option>alphabetic</option>
                      <option>queue</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Weekday</label>

                <div class="col-sm-6">
                    <select class="form-control" name="repetition">
                      <option>random</option>
                      <option>alphabetic</option>
                      <option>queue</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Start time</label>

                <div class="col-sm-6">
                    <input type="text" name="title" class="form-control" value="Name.">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">End time</label>

                <div class="col-sm-6">
                    <input type="text" name="title" class="form-control" value="Name.">
                </div>
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Add Event
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection