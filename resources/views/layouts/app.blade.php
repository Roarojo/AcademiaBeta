<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
   @vite('resources/css/app.css')
  <title>@yield('titulo')</title>

<!--Contador-->
<style>
  input[type='number']::-webkit-inner-spin-button,
  input[type='number']::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .custom-number-input input:focus {
    outline: none !important;
  }

  .custom-number-input button:focus {
    outline: none !important;
  }
</style>

<!--Fin del contador-->



</head>
<body class="bg-gray-100">
<header class="p-2 border-b bg-white shadow">
  <div class="container mx-auto flex justify-between p-1">
    <div>
      <img src="{{asset('imagenes/tecjaliscologo.png')}}" alt="Front of men&#039;s Basic Tee in black." class="mx-auto object-cover object-center">
      <h3 class="text-2x1 font-black">
        Repositorio Academia Informatica
     </h3>
    </div>
     @auth
        <nav class="flex gap-2 items-center">
      <!--Menu desplegable
      <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>-->
      <div class="container flex flex-wrap justify-between items-center mx-auto">
        <div>
          <a class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">{{auth()->user()->email}}</a>
        </div>
      <!-- <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>-->
     
      <img src="{{asset('imagenes/login.png')}}" id="dropdownDefault" data-dropdown-toggle="dropdown" class="h-8 w-8 rounded-full  focus:ring-4 focus:outline-none  font-medium  inline-flex " >
      <!-- Dropdown menu -->
      <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
          <a  class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
          <li>
            
            <a href="{{route('post.index')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Dashboard</a>
       
          </li>
          <li>
            
            <a href="{{route('post.perfil',auth()->user()->id)}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Perfil</a>
       
          </li>
    
          <li>
            <a class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">
            <form method="POST" action="{{route('logout')}}">
              @csrf
                <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                  Cerrar Sesion
                </button>
            </form>
          </li>
        </a>
      </div>
        </ul>
    </div>
  </div> 
        </nav>
     @endauth
     
     @guest
         <nav class="flex gap-1 items-center">
          <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('index') }}">
            Login
          </a>
        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('crear-cuenta') }}">
            Crear Cuenta
        </a>
        </nav>
     @endguest
          
     
     
  </div>
</header>
  @yield('contenido')
  @stack('scripts')
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

  @include('footer')
</body>
</html>