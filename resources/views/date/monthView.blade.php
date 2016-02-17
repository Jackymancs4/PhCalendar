
@extends('layouts.master')

@push('style')
<link href="{{ asset('css/monthStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('date.dateBarView', ["item"=>$month])
    @yield('databar')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1><a href="{{ action('CalendarController@monthView', ['year' => $prevmonth->year, 'month' => $prevmonth->month]) }}"> < </a></h1>
        </div>
        <div class="col-md-4">
            <h1><a href="{{ action('CalendarController@monthView', ['year' => $month->year, 'month' => $month->month]) }}">{{ trans('calendar/longMonths.'.$month->month) }}</a></h1>
        </div>
        <div class="col-md-4">
            <h1><a href="{{ action('CalendarController@monthView', ['year' => $nextmonth->year, 'month' => $nextmonth->month]) }}"> > </a></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table>
                <thead>
                    <tr>
                        <th class="week_index"></th>
                    @foreach ($month->weeks[1]->days as $daynum => $day)
                        <th>{{ trans('calendar/shortDays.'.$daynum) }}</th>
                    @endforeach
                    </tr>
                </thead>
            @foreach ($month->weeks as $week)
                <tr>
                    <td class="week_index">{{ $week->nweek }}</td>
                @foreach ($week->days as $day)
                    <td>
                        <a href="{{ action('CalendarController@weekView', ['year' => $day->year, 'month' => $day->month, 'day' => $day->day]) }}">
                            {{ $day->day }}
                        </a>
                    </td>
                @endforeach
                </tr>   
            @endforeach
            </table>
        </div>

    </div>
@endsection