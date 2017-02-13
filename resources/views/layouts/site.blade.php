<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}</title>
    <meta name="description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}"/>
    <!-- Twiter Card data -->
    <meta name="twiter:card" value="summary" />
    <!-- Open Graph data-->
    <meta property="ng:title" content="{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('seo.url') }}" />
    <meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}" />
    <meta property="og:description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

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
<body>
    
    <header>
        @include('layouts._site._nav')
    </header>
    <main>
      <div id="app">
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
      </div>
    </main>
    <footer class="page-footer teal">
      <div class="container">
      </div>
      <div class="footer-copyright">
        <div class="container">
            © 2016 Copyright LCOM  <a class="grey-text text-lighten-3 right" href="#">Home</a>                
        </div>
      </div>
    </footer>
    <!-- Scripts -->
    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
</body>
</html>
