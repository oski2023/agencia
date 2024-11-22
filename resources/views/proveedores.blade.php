@include('layouts.header')

<div class="relative isolate px-6 pt-1 lg:px-8">
    
    <div class="mx-auto max-w-2xl py-20 sm:py-15 lg:py-10">      
      <div class="text-center">
        <h3 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-4xl">Lista de Proveedores</h3>

      @foreach($proveedores as $proveedor)

        <article class="pt-2 m-3">
          <h2 class="text-2xl">{{$proveedor->nombreProveedor}}</h2>
          <span>{{$proveedor->whatsapp}}</span>
        </article>

      @endforeach

                
      </div>
    </div>    
</div>

@include('layouts.footer')