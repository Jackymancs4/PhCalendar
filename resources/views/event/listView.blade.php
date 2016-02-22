
@extends('layouts.master')

@push('style')
    <link href="{{ asset('css/listEventStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('event.partial.eventBarView')
    @yield('eventutilbar')

@endsection

@section('navbar')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach ($events as $event)
            <table>
                    <tr>
                        <th>
                            <div>
    							{{ $event->title }}
                            </div>
                        </th>
                        <th></th>
                        <td rowspan='5'>Status</td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                {{ $event->description }}
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                Tipo
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                {{ $event->start_date }}
                            </div>
                        </td>
                        <td>
                            <div>
                                {{ $event->start_time }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                {{ $event->end_date }}
                            </div>
                        </td>
                        <td>
                            <div>
                                {{ $event->end_time }}
                            </div>
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
    </div>
@endsection