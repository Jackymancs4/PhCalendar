@extends('layouts.master')

@push('style')
<link href="{{ asset('css/yearStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('date.partial.dateBarView', ["item"=>$year])
    @yield('dateutilbar')

@endsection

@section('navbar')

    @include('date.partial.dateNavView', [  "name"=> $year->year,
                                            "link"=> action('CalendarController@yearView', ['year' => $year->year]),
                                            "prelink"=> action('CalendarController@yearView', ['year' => $prevyear->year]),
                                            "nextlink"=> action('CalendarController@yearView', ['year' => $nextyear->year])
                                        ])
    @yield('datenavbar')

@endsection

@section('content')
    <div class="row date-content">
    @foreach ($year->months as $month)
        <div class="col-md-4">
            <table>
                <caption>
                    <a href="{{ action('CalendarController@monthView', ['year' => $month->year, 'month' => $month->month]) }}">
                        <h2>{{ trans('calendar/longMonths.'.$month->month) }}</h2>
                    </a>
                </caption>  
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
                    <td >
                    @if($day->out=="not")
                        @if($day->today==true)
                        <div class="today">
                            <a href="{{ action('CalendarController@weekView', ['year' => $day->year, 'month' => $day->month, 'day' => $day->day]) }}">
                                {{ $day->day }}
                            </a>
                        </div>
                        @else
                        <div>
                            <a href="{{ action('CalendarController@weekView', ['year' => $day->year, 'month' => $day->month, 'day' => $day->day]) }}">
                                {{ $day->day }} {{ $day->getCountEventForType()->count() }}
                            </a>
                        </div>
                        @endif
                    @else
                        <div class="{{ $day->out }}-out">
                            <a href="{{ action('CalendarController@weekView', ['year' => $day->year, 'month' => $day->month, 'day' => $day->day]) }}">
                                {{ $day->day }}
                            </a>
                        </div>

                    @endif
                    </td>
                @endforeach
                </tr>   
            @endforeach
            </table>
        </div>
    @endforeach
    </div>
@endsection