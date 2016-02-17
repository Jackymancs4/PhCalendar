@section('databar')
    <div class="row utilbar">
        <div class="col-md-12">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li>        
                            <h4><a href="{{ asset('') }}">Home</a></h4>
                        </li>    
                        <li>        
                            <h4>-</h4>
                        </li>     
                       <li>        
                            <h4><a href="{{ action('CalendarController@yearView', ['year' => $item->year]) }}">{{ trans('calendar/interface.year') }}</a></h4>
                        </li>
                        <li>        
                            <h4>@if (isset($item->month))
                                <a href="{{ action('CalendarController@monthView', ['year' => $item->year, 'month' => $item->month]) }}">{{ trans('calendar/interface.month') }}</a>
                                @else
                                {{ trans('calendar/interface.month') }}
                                @endif
                            </h4>
                        </li> 
                        <li>
                            <h4>@if (isset($item->day))
                                <a href="{{ action('CalendarController@weekView', ['year' => $item->year, 'month' => $item->month, 'day' => $item->day]) }}">{{ trans('calendar/interface.week') }}</a>
                                @else
                                {{ trans('calendar/interface.week') }}
                                @endif
                            </h4>
                        </li>
                         <li>
                            <h4>@if (isset($item->day))
                                <a href="{{ action('CalendarController@dayView', ['year' => $item->year, 'month' => $item->month, 'day' => $item->day]) }}">{{ trans('calendar/interface.day') }}</a>
                                @else
                                {{ trans('calendar/interface.day') }}
                                @endif
                            </h4>
                        </li>                       
                    </ul>
              </div>
            </nav>
        </div>
    </div>
@endsection

