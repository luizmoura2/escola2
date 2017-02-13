<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('lib/materialize/dist/css/materialize.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet">
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="app-layout">
    
        @include('layouts._admin._nav')      
    <main>
        @if(Session::has('mensage'))
        <div class="container">
             <div class="row">
                 <div class="card {{Session::get('mensage')['class']}}">
                    <div align="center" class="card-content">
                        {{Session::get('mensage')['msg']}}
                    </div> 
                 </div>
             </div>
        </div>
        @endif
        @yield('content')
    </main>
        
   
    <footer class="page-footer teal">
        
            <div class="footer-copyright">
                <div class="container">
                    © 2016 Copyright LCOM  <a class="grey-text text-lighten-3 right" target="_blanck" href="{{route('site.home')}}">Site</a>
                </div>
            </div>
        </footer>

    <!-- Scripts -->
    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib\jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
</body>
</html>
