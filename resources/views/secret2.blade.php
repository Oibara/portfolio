<h2>ni tan secreto</h2>

@auth
    Página privada de {{Auth::user()->name}}
@endauth
<a href={{route('logout')}}>Salir</button></a>