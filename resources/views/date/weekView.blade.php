
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
                        <th></th>
                    @foreach ($week->days as $daynum => $day)
                        <th>
                            <a href="{{ action('CalendarController@dayView', ['year' => $day->year, 'month' => $day->month, 'day' => $day->day]) }}">
                            {{ trans('calendar/shortDays.'.$daynum) }} {{ $day->day }}
                            </a>
                        </th>
                    @endforeach
                    </tr>
                </thead>
                <tr>
                    <td></td>
                @foreach ($week->days as $daynum => $day)
                    <td>
                        @foreach ($day->getEvents() as $event) 
                            <div>
                                {{ $event->title }}
                            <div>
                        @endforeach
                    </th>
                @endforeach
                </tr>

               @foreach ($week->days[1]->hours as $nhour => $hour)
                    @foreach ($hour->quarters as $nquarter => $quarter)
                    @if($quarter->quarter==1)
                        <tr class="hour">
                            <td>{{ $quarter->hour }}:00</td>
                    @else
                        <tr>
                            <td></td>
                    @endif
                            @foreach ($week->days as $day) 

                                @if($day->hours[$nhour]->quarters[$nquarter]->getPoolwindow()->count()!=0)
                                    @foreach ($day->hours[$nhour]->quarters[$nquarter]->getPoolwindow() as $poolwindows)

                                        @if($day->hours[$nhour]->quarters[$nquarter]->dayindex==$quarter->getDayindexfromString($poolwindows->start_time))
                                        <td class="pool" rowspan="{{ ($quarter->getDayindexfromString($poolwindows->end_time)-$quarter->getDayindexfromString($poolwindows->start_time)) }}">
                                            <div class="pool-title">
                                                {{ $poolwindows->poolRelation->name }}
                                            <div>
                                            @if(isset($list[$poolwindows->id.$day->day.$day->month.$day->year]))
                                                @foreach($list[$poolwindows->id.$day->day.$day->month.$day->year] as $name)
                                                    {{ $name }}
                                                @endforeach
                                            @endif
                                        </td>
                                        @endif
                                    @endforeach
                                @else
                                    <td></td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>
@endsection