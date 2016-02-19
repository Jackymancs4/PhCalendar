
@extends('layouts.master')

@push('style')
<link href="{{ asset('css/dayStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('date.partial.dateBarView', ["item"=>$day])
    @yield('dateutilbar')

@endsection

@section('navbar')

    @include('date.partial.dateNavView', [  "name"=> trans('calendar/shortDays.'.$day->getWeekNumber())." ".$day->day,
                                            "link"=> action('CalendarController@dayView', ['year' => $day->year, 'month' => $day->month, 'day' => $day->day]),
                                            "prelink"=> action('CalendarController@dayView', ['year' => $prevday->year, 'month' => $prevday->month, 'day' => $prevday->day]),
                                            "nextlink"=> action('CalendarController@dayView', ['year' => $nextday->year, 'month' => $nextday->month, 'day' => $nextday->day])
                                        ])
    @yield('datenavbar')

@endsection

@section('content')
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