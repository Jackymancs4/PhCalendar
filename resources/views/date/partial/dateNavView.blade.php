@section('datenavbar')
 
    <div class="row date-navigation">
        <div class="col-md-4">
            <h1><a href="{{ $prelink }}"> < </a></h1>
        </div>
        <div class="col-md-4">
            <h1><a href="{{ $link }}">{{ $name }}</a></h1>
        </div>
        <div class="col-md-4">
            <h1><a href="{{ $nextlink }}"> > </a></h1>
        </div>
    </div>

@endsection

