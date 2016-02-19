
@extends('layouts.master')

@push('style')
<link href="{{ asset('css/weekStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('date.partial.dateBarView', ["item"=>$week])
    @yield('dateutilbar')

@endsection

@section('navbar')

    @include('date.partial.dateNavView', [  "name"=> $week->nweek,
                                            "link"=> action('CalendarController@weekView', ['year' => $week->year, 'month' => $week->month, 'day' => $week->days[1]->day]),
                                            "prelink"=> action('CalendarController@weekView', ['year' => $prevweek->days[1]->year, 'month' => $prevweek->days[1]->month, 'day' => $prevweek->days[1]->day]),
                                            "nextlink"=> action('CalendarController@weekView', ['year' => $nextweek->days[1]->year, 'month' => $nextweek->days[1]->month, 'day' => $nextweek->days[1]->day])
                                        ])
    @yield('datenavbar')

@endsection

@section('content')
    <div class="row date-content">
        <div class="col-md-12">
            <table>
                <thead>
                    <tr>
                    @foreach ($week->days as $daynum => $day)
                        <th>{{ trans('calendar/shortDays.'.$daynum) }}</th>
                    @endforeach
                    </tr>
                </thead>
                <tr>
                @foreach ($week->days as $day)
                    <td>
                        <a href="{{ action('CalendarController@dayView', ['year' => $day->year, 'month' => $day->month, 'day' => $day->day]) }}">{{ $day->day }}</a>
                    </td>
                @endforeach
                </tr>    
            </table>
        </div>
    </div>
@endsection