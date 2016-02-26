
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
            @foreach ($day->getEvents() as $event) 
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                </tr>
            @endforeach
            </table>
            <table>
            @foreach ($day->hours as $hour)
                @foreach ($hour->quarters as $quarter)
                    <tr>
                        <td class="quarters">
                            <div class="quarter-{{ $quarter->quarter }}">
                            @if ($quarter->quarter == 1)
                                <b>{{ $hour->hour }}:00</b>
                            @else
                                {{ $hour->hour }}:{{ ($quarter->quarter -1)*15 }}
                            @endif
                            </div>
                        </td>
                        @if($quarter->getPoolwindow()->count()!=0)
                            @foreach ($quarter->getPoolwindow() as $poolwindow)

                                @if($quarter->dayindex==$quarter->getDayindexfromString($poolwindow->start_time))
                                <td rowspan="{{ ($quarter->getDayindexfromString($poolwindow->end_time)-$quarter->getDayindexfromString($poolwindow->start_time)) }}">
                                    <div class="pool">
                                        {{ $poolwindow->poolRelation->name }}
                                    <div>
                                </td>
                                @endif
                            @endforeach
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
            </table>
        </div>
    </div>
@endsection