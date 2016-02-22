
@extends('layouts.master')

@push('style')
@endpush

@push('script')
<script src="{{ asset('js/lib/moment-with-locales.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap-datetimepicker.min.js') }}"></script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker1").on("dp.change", function (e) {
            $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker2").on("dp.change", function (e) {
            $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
@endpush

@section('utilbar')

    @include('event.partial.eventBarView')
    @yield('eventutilbar')

@endsection

@section('navbar')

@endsection

@section('content')

    <div class="row">
        <h1>New Event</h1>
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
                <label class="col-sm-3 control-label">Start date</label>

                <div class="col-sm-3">
                    <input type="text" name="start_date" id='datetimepicker1' class="form-control">
                </div>
                <label class="col-sm-1 control-label">Start time</label>

                <div class="col-sm-2">
                    <input type="text" name="start_time" id="event-title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">End date</label>

                <div class="col-sm-3">
                    <input type="text" name="end_date" id='datetimepicker2' class="form-control">
                </div>
                <label class="col-sm-1 control-label">End time</label>

                <div class="col-sm-2">
                    <input type="text" name="end_time" id="event-title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Repetition</label>

                <div class="col-sm-6">
                    <select class="form-control" name="repetition">
                      <option>none</option>
                      <option>annual</option>
                      <option>monthly</option>
                      <option>daily</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Type</label>

                <div class="col-sm-6">
                    <select class="form-control" name="type">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
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