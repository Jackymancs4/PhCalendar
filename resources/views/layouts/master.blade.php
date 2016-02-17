<!DOCTYPE html>
<html>
    <head>
        <title>PhCalendar</title>

        <script src="{{ asset('js/lib/jquery-2.2.0.min.js') }}"></script>

        @include('layouts.bootstrap')

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        
        @stack('style')
        @stack('script')

    </head>
    <body>
        <div class="container-fluid">

            <div class="row mainbar">
                <div class="col-md-12">

                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <ul class="nav nav-justified">
                                <li>        
                                    <h3>AAA</h3>
                                </li> 
                                <li>        
                                    <h3>AAA</h3>
                                </li> 
                                <li>        
                                    <h3>AAA</h3>
                                </li> 
                                <li>        
                                    <h3>AAA</h3>
                                </li>                      
                            </ul>
                      </div>
                    </nav>
                </div>
            </div>


            @yield('utilbar')           
            @yield('content')

            <div class="row footerbar">
                <div class="col-md-12">

                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <ul class="nav nav-justified">
                                <li>        
                                    <h4>All rights reserved - © copyright 2016</h4>
                                </li>                      
                            </ul>
                      </div>
                    </nav>
                </div>
            </div>

        </div>
    </body>
</html>