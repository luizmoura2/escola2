<nav>
    <div class="nav-wrapper teal ">
        <div class="container">
            <a href="{{route('admin.principal')}}" class="brand-logo">ALCOM Admin Imóveis</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{route('admin.principal')}}">Início</a></li>
                <li><a target="_blanck" href="{{route('site.home')}}">Site</a></li>
                @if(Auth::guest())
                    <li><a href="{{route('admin.login')}}">Login</a></li>
                @else
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">{{Auth::user()->name}}
                            <i class="material-icons right">arrow_drop_down</i>                            
                        </a>
                    </li>

                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="#!">{{Auth::user()->name}}</a></li>
                        @can('usuario_listar')
                        <li><a href="{{route('admin.usuarios')}}">Usuarios<i class="material-icons left">assignment_ind</i> </a></li>
                        @endcan
                        @can('pagina_listar')
                        <li><a href="{{route('admin.paginas')}}">Páginas<i class="material-icons left">library_books</i></a></li>
                        @endcan
                        @can('tipos_listar')
                        <li><a href="{{route('admin.tipos')}}">Tipos<i class="material-icons left">view_list</i></a></li>
                        @endcan
                        @can('cidades_listar')
                        <li><a href="{{route('admin.cidades')}}">Cidades<i class="material-icons left">play_for_work</i></a></li>
                        @endcan
                        @can('imoveis_listar')
                        <li><a href="{{route('admin.imoveis')}}">Imóveis<i class="material-icons left">play_for_work</i></a></li>
                        @endcan
                        @can('slides_listar')
                        <li><a href="{{route('admin.slides')}}">Slides<i class="material-icons left">play_for_work</i></a></li>
                        @endcan
                        @can('papel_listar')
                        <li><a href="{{route('admin.papel')}}">Papel<i class="material-icons left">play_for_work</i></a></li>
                        @endcan
                       
                    </ul>

                    <li><a href="{{route('admin.login.sair')}}">Sair</a></li>
                @endif
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="{{route('admin.principal')}}">Início</a></li>
                <li><a target="_blanck" href="{{route('site.home')}}">Site</a></li>
                 @if(Auth::guest())
                    <li><a href="{{route('admin.login')}}">Login</a></li>
                @else
                    <li><a href="#">{{Auth::user()->name}}</a></li>
                    <li><a href="{{route('admin.login.sair')}}">Sair</a></li>
                     <li><a href="{{route('admin.usuarios')}}">Usuarios</a></li>
                    <li><a href="{{route('admin.paginas')}}">Páginas</a></li>
                    <li><a href="{{route('admin.tipos')}}">Tipos</a></li>
                    <li><a href="{{route('admin.cidades')}}">Cidades</a></li>
                    <li><a href="{{route('admin.imoveis')}}">Imóveis</a></li>
                    <li><a href="{{route('admin.slides')}}">Slides</a></li>
                    <li><a href="{{route('admin.papel')}}">Papel</a></li>
                @endif
                              
            </ul>
        </div>
    </div>
</nav>              