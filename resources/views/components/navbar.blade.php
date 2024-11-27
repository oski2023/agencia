<nav class="flex items-center space-x-4 mr-2">

    <x-nav-link href="http://127.0.0.1:8000/" :active="request()->is('http://127.0.0.1:8000/')">
        Dashboard
    </x-nav-link>
    <x-nav-link href="/regiones" :active="request()->is('regiones')">
        Regiones
    </x-nav-link>
    <x-nav-link href="/destinos" :active="request()->is('destinos')">
        Destinos
    </x-nav-link>

</nav>
