<header class="header">
    <div class="menu">

        <div class="logo">
            <!--Logo-->
            <a href="#"><img src="/img/logo.png" alt=""></a>
        </div>

        @guest
        <ul class="d-flex">
            <li class="me-2"><a href="{{route("login")}}" class="login">Acceder</a></li>
            <li><a href="{{route("register")}}" class="create">Crear cuenta</a></li>
        </ul>

        @else
        
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" 
               data-bs-toggle="dropdown" aria-expanded="false">

                <img src="{{Auth::User()->profile->photo ? asset ('storage/' . Auth::User()->profile->photo)
                : asset('img/user-default.png') }}" alt="Profile" class="img-profile">
          
                <span class="name-user">{{Auth::User()->full_name}}</span>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item"
                        href="#">Perfil</a></li>
                
                <li><a class="dropdown-item" href="{{route('admin.index')}}">Ir al admin</a></li>
                
                <li>
                    <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
                        
                    </form>
                    @csrf
                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault(); 
                           document.getElementById('logout-form').submit();">Salir</a>
                </li>
            </ul>
        </div>
        @endguest
        </nav>
    </div>

</header>