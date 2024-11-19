@include('layouts.header')


<main class="container">
    <h1 class="text-center">Mi primer Vista en Laravel</h1>

    <!--  handlebars o mustache -->
    Nombre: {{ $nombre }}
    <hr>
    Edad: {{ $numero }}
    <hr>
    <!-- directivas blade -->
    @if ($numero > 18)
    Eres mayor de edad
    <hr>
    @else
    Eres menor de edad
    @endif

    <ul>
        @foreach ($datos as $clave => $elemento)
        <li>{{ $elemento }}</li>
    </ul>
    @endforeach

</main>

@include('layouts.footer')

