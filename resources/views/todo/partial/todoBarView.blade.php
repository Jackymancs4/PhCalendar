@section('todoutilbar')
    <div class="row utilbar">
        <div class="col-md-12">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li>        
                            <h4><a href="{{ url('') }}">Home</a></h4>
                        </li> 
                        <li>        
                            <h4>-</h4>
                        </li>
                        <li>        
                            <h4><a href="{{ url('/todo/pool/create') }}">Create pool</a></h4>
                        </li>
                        <li>        
                            <h4><a href="{{ url('') }}">List pool</a></h4>
                        </li>
                        <li>        
                            <h4><a href="{{ url('todo/poolwindow/create') }}">Create pool window</a></h4>
                        </li>
                        <li>        
                            <h4><a href="{{ url('') }}">List pool window</a></h4>
                        </li>
                        <li>        
                            <h4><a href="{{ url('') }}">Create todo</a></h4>
                        </li>
                        <li>        
                            <h4><a href="{{ url('') }}">List todo</a></h4>
                        </li>                  
                    </ul>
              </div>
            </nav>
        </div>
    </div>
@endsection

