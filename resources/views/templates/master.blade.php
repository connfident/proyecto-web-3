<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Proyecto Web</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{route('index.welcome')}}">
                ArtConnect
                @if(Gate::allows('cuenta-login') || Gate::allows('admin-login'))| {{Auth::user()->user}} @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                </ul>
                    
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    @if(Gate::allows('cuenta-login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('artistas.index', Auth::user()->user)}}">
                            <i class="material-symbols-outlined" style="vertical-align: -6px;">person</i>
                            Perfil
                        </a>
                    </li>
                    @endif
                    @if(Gate::allows('admin-login'))
                    <a class="nav-link" href="{{route('admin.index', Auth::user()->user)}}">
                        <i class="material-symbols-outlined" style="vertical-align: -6px;">admin_panel_settings</i>
                        Panel de administración 
                    </a>
                    @endif
                    </li>

                    <li class="nav-item @if(Gate::allows('cuenta-login') || Gate::allows('admin-login')) d-none @endif">
                        <a class="nav-link" href="{{route('auth.login')}}"">
                            <i class="material-symbols-outlined" style="vertical-align: -6px;">login</i>
                            Iniciar sesion
                        </a>
                    </li>

                    <li class="nav-item @if(Gate::allows('cuenta-login') || Gate::allows('admin-login')) d-none @endif">
                        <a class="nav-link" href="{{route('auth.registrar')}}">
                            <i class="material-symbols-outlined" style="vertical-align: -6px;">person_add</i>
                            Registrarse
                        </a>
                    </li>

                    @if(Gate::allows('cuenta-login') || Gate::allows('admin-login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('artista.logout')}}">
                            <i class="material-symbols-outlined" style="vertical-align: -6px;">logout</i>
                            Cerrar sesion
                        </a>
                    </li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex">
        @yield('contenido-principal')
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>