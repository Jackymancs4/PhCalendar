
@extends('layouts.master')

@push('style')
<link href="{{ asset('css/weekStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('date.dateBarView', ["item"=>$week])
    @yield('databar')

@endsection

@section('content')
    <div class="row date-navigation">
        <div class="col-md-4">
            <h1><a href="{{ action('CalendarController@weekView', ['year' => $prevweek->year, 'month' => $prevweek->month, 'day' => $prevweek->days[1]->day]) }}"> < </a></h1>
        </div>
        <div class="col-md-4">
            <h1><a href="{{ action('CalendarController@weekView', ['year' => $week->year, 'month' => $week->month, 'day' => $week->days[1]->day]) }}">{{ $week->nweek }}</a></h1>
        </div>
        <div class="col-md-4">
            <h1><a href="{{ action('CalendarController@weekView', ['year' => $nextweek->year, 'month' => $nextweek->month, 'day' => $nextweek->days[1]->day]) }}"> > </a></h1>
        </div>
    </div>
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
                        <a href="{{ action('CalendarController@dayView', ['year' => $week->year, 'month' => $week->month, 'day' => $day->day]) }}">{{ $day->day }}</a>
                    </td>
                @endforeach
                </tr>    
            </table>
        </div>
    </div>
@endsection