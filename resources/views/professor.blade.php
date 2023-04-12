@extends('layouts.app')
@section('titulo')
   Crear Profesor
@endsection
@section('contenido')
<!--Tabla o grid-->
<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-2 xl:gap-x-2">
  <section>
  <div class="group relative">
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-3 lg:px-3">
    <div class="p-6 w-full max-w-md space-y-8 shadow-md border border-gray-200 rounded-lg">
      <div>
        <img class="mx-auto h-36 w-auto " src="{{asset('imagenes/registrar.png')}}" alt="Practica con Laravel">  
      </div>
      <form class="mt-8 space-y-6" action="{{route('crear-cuenta')}}" method="POST">
        @if (session('creado'))
        @push('scripts')
           <!--<script>
             //alert('Hola Mundo')
           </script>-->
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
           <script>
               Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Usuario creado correctamente',
                     showConfirmButton: false,
                     timer: 1500
                   })
           </script>
         @endpush    
       @endif
       @csrf
        <input type="hidden" name="remember" value="true">
        <div class="-space-y-px rounded-md shadow-sm">
          <div>
            <label for="name" class="sr-only">Nombre</label>
            <input 
              id="name" 
              name="name" 
              type="text"  
              class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
              value="{{old('name')}}" 
              placeholder="Escribe tu usuario"/>
              @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                     {{$message}}
                </p>
              @enderror
          </div>
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input 
              id="email-address" 
              name="email" 
              type="email" 
              autocomplete="email" 
              class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
              value="{{old('email')}}" 
              placeholder="Escribe tu correo"/>
              @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                     {{$message}}
                </p>
              @enderror
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input 
              id="password" 
              name="password" 
              type="password" 
              autocomplete="current-password" 
              class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" 
              placeholder="Escribe el Password"/>
              @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                     {{$message}}
                </p>
              @enderror
          </div>
          <div>
            <label for="password_confirmation" class="sr-only">Confirmar Password</label>
            <input 
              id="password_confirmation" 
              name="password_confirmation" 
              type="password" 
              autocomplete="current-password" 
              class="border p-3 w-full rounded-lg" 
              placeholder="Confirmar Password">
          </div>
        </div>
        <div>
          <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <!-- Heroicon name: mini/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
              </svg>
            </span>
            Registrar
          </button>
        </div>
      </form>
    </div>
  </div>
  </div>
 </section>
 <section>
 
<!-- Mostrar Datos-->

<div class="group relative">   
      <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-1 lg:grid-cols-4 xl:gap-x-4">
    @foreach ($pro as $p )

        <div class="group relative">
          <div class="overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75">
           @if ($p->foto)
            <img src="/storage/{{$p->foto}}" alt="Front of men&#039;s Basic Tee in black." class="w-11 h-11 object-cover object-center">
         @else
         <img src="{{asset('imagenes/login.png')}}" alt="Front of men&#039;s Basic Tee in black." class="w-11 h-11 scale-50">
         @endif
          </div>
            <div class="mt-4 flex justify-between">
              <div>
                  <span aria-hidden="true" class="absolute inset-0"></span>
                 {{$p->name}}  
              <p class="mt-1 text-sm text-gray-500">{{$p->perfil}}</p>
    </div>   
  </div>
    </div>
    <div>
    <form action="{{route('mod.profesor',$p->id)}}" method="POST" > 
      @csrf
     
        <button type="submit" class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-2 py-1.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
          </svg>     
        Editar
        </button>
      
    </form>
    <form action="{{route('profesor.delete',$p->id)}}" method="POST" >  
      @csrf
     
        <button type="submit" class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-2 py-1.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
          </svg>     
        Eliminar
        </button>
    
    </form>
    </div>
        @endforeach    
  <!--2-->
  </div>  


 </section>
</div>

@endsection