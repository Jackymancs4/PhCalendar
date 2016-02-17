
@extends('layouts.master')

@push('style')
<link href="{{ asset('css/dayStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('date.dateBarView', ["item"=>$day])
    @yield('databar')

@endsection


@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1><a href="{{ action('CalendarController@dayView', ['year' => $prevday->year, 'month' => $prevday->month, 'day' => $prevday->day]) }}"> < </a></h1>
        </div>
        <div class="col-md-4">
            <h1><a href="{{ action('CalendarController@dayView', ['year' => $day->year, 'month' => $day->month, 'day' => $day->day]) }}">{{ trans('calendar/shortDays.'.$day->getWeekNumber())." ".$day->day }}</a></h1>
        </div>
        <div class="col-md-4">
            <h1><a href="{{ action('CalendarController@dayView', ['year' => $nextday->year, 'month' => $nextday->month, 'day' => $nextday->day]) }}"> > </a></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table>
                @for ($i = 1; $i <= 24; $i++)
                    <tr><td>{{$i}}</td></tr>
                @endfor
            </table>
        </div>
    </div>
@endsection