
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
        <h1>New Pool</h1>
        <form action="{{ url('event/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Task Name -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Title</label>

                <div class="col-sm-6">
                    <input type="text" name="title" class="form-control" value="Name.">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Description</label>

                <div class="col-sm-6">
                    <textarea name="description" class="form-control" rows="3">No description.</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Repetition</label>

                <div class="col-sm-6">
                    <select class="form-control" name="repetition">
                      <option>random</option>
                      <option>alphabetic</option>
                      <option>queue</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Active</label>

                <div class="col-sm-6">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="1">
                      </label>
                    </div>
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