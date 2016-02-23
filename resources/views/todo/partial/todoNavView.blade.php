@section('todonavbar')
    <div class="row todo-navigation">
        <div class="col-md-12">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li>        
                            <h4><a href="{{ url('todo/'.$item.'/list') }}">List {{ $item }}</a></h4>
                        </li>
                        <li>        
                            <h4><a href="{{ url('todo/'.$item.'/create') }}">Create {{ $item }}</a></h4>
                        </li>                  
                    </ul>
              </div>
            </nav>
        </div>
    </div>
@endsection

