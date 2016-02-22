@section('eventutilbar')
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
                            <h4><a href="{{ action('EventController@listView') }}">List</a></h4>
                        </li>
                        <li>        
                            <h4><a href="{{ action('EventController@createView') }}">Create</a></h4>
                        </li>                    
                    </ul>
              </div>
            </nav>
        </div>
    </div>
@endsection

