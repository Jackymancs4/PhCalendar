
@extends('layouts.master')

@push('style')
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
        	{{ $event->title }}
        </div>
    </div>
@endsection