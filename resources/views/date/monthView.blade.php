
@extends('layouts.master')

@push('style')
<link href="{{ asset('css/monthStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('date.partial.dateBarView', ["item"=>$month])
    @yield('dateutilbar')

@endsection

@section('navbar')

    @include('date.partial.dateNavView', [  "name"=> trans('calendar/longMonths.'.$month->month),
                                            "link"=> action('CalendarController@monthView', ['year' => $month->year, 'month' => $month->month]),
                                            "prelink"=> action('CalendarController@monthView', ['year' => $prevmonth->year, 'month' => $prevmonth->month]),
                                            "nextlink"=> action('CalendarController@monthView', ['year' => $nextmonth->year, 'month' => $nextmonth->month])
                                        ])
    @yield('datenavbar')

@endsection

@section('content')
    <div class="row date-content">
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
                        @foreach ($day->getEvents() as $event) 
                            <div>
                                {{ $event->title }}
                            <div>
                        @endforeach
                    </td>
                @endforeach
                </tr>   
            @endforeach
            </table>
        </div>

    </div>
@endsection