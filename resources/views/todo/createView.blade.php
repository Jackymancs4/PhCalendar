
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
        <h1>New TODO</h1>
        <form action="{{ url('todo/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Task Name -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" value="Name.">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Description</label>

                <div class="col-sm-6">
                    <textarea name="description" class="form-control" rows="3">No description.</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Priority</label>

                <div class="col-sm-6">
                    <select class="form-control" name="priority">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Durata</label>

                <div class="col-sm-6">
                    <input type="text" name="duration" class="form-control" value="45">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Pool</label>

                <div class="col-sm-6">
                    <select class="form-control" name="pool">
                        <option value="none" >None</option>
                        @foreach ($pools as $pool)
                            <option value="{{ $pool->id }}" >{{ $pool->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Parent</label>

                <div class="col-sm-6">
                    <select class="form-control" name="parent">
                        <option value="none" >None</option>
                        @foreach ($todos as $todo)
                            <option value="{{ $todo->id }}" >{{ $todo->name }}</option>
                        @endforeach
                    </select>
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