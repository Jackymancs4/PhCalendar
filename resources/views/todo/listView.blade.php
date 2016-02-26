
@extends('layouts.master')

@push('style')
<link href="{{ asset('css/dayStyle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('utilbar')

    @include('todo.partial.todoBarView')
    @yield('todoutilbar')

@endsection

@section('navbar')

@endsection

@section('content')
    <div class="row">
        <table>
            @foreach($todos as $row)
            <tr>
                @foreach($row as $cell)
                <td> {{ $cell }} </td>
                @endforeach
            <tr>
            @endforeach
        </table>
    </div>
@endsection