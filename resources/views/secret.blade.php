<h2>Esto es un secreto que nadie se entere</h2>
<a href={{route('logout')}}>Salir</button></a>

@auth
    Página privada de {{Auth::user()->name}}
@endauth