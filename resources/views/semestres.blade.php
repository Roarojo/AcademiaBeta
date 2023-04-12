@extends('layouts.app')
@section('titulo')
    Registro de Materias y Maestros
@endsection

@section('contenido')
<section class=" container-fluid mx-auto mt-1 flex min-h-full px-1">
  <div class=" flex min-h-full items-center justify-center px-8">
  <div class="px-11">
    <!-- Modal toggle -->
    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
      Agregar Semestre
    </button>
  </div>
    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 w-full max-w-md space-y-8 shadow-md border border-gray-200 rounded-lg">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Agregar Materia y Maestro</h3>
          <form 
                    class="mt-8 space-y-6"
                    action="{{route('guardar.semestre')}}" 
                    method="POST">
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
                            title: 'Materia creado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })
                  </script>
                @endpush    
            @endif
             @csrf  
        <input type="hidden" name="remember" value="true">
            <div class="-space-y-px rounded-md shadow-sm ">
                <div>
                    <select class="border p-3 w-full rounded-lg border-red-500"
                            name="semestre" 
                            id="semestre">
                              <option value="2023-A">2023-A</option>
                              <option value="2023-B">2023-B</option>  
                              <option value="2024-A">2024-A</option>  
                              <option value="2024-B">2024-B</option>     
                    </select>
                </div>
              
            <div class="-space-y-px rounded-md shadow-sm">
              
            <div>
                <select class="border p-3 w-full rounded-lg border-red-500"
                        name="materia" 
                        id="materia">
                        @foreach ($mat as $r)
                            <option value="{{$r->materia}}">{{$r->materia}}</option>
                        @endforeach  
                </select>
            </div>  
            <div>
                <select class="border p-3 w-full rounded-lg border-red-500"
                        name="profesor" 
                        id="profesor">
                        @foreach ($prof as $r)
                            <option value="{{$r->name}}">{{$r->name}}</option>
                        @endforeach  
                </select>
            </div>
            
            <div class="p-2 space-y-2">
        
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
    </div> 
 
</section>
<section>
<!--Inicio de la tabla por Materias-->
<div class="flex min-h-full items-center justify-center py-1 px-2 sm:px-2 lg:px-4">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="py-3 px-6">
                  ID
              </th>
              <th scope="col" class="py-3 px-6">
                  <div class="flex items-center">
                      Materia
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                  </div>
              </th>
              <th scope="col" class="py-3 px-6">
                  <div class="flex items-center">
                      Clave
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                  </div>
              </th> 
              <th scope="col" class="py-3 px-6">
                  <div class="flex items-center">
                      Creditos
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                  </div>
              </th>
              
              <th scope="col" class="py-3 px-6">
                  <div class="flex items-center">
                      Editar
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                  </div>
              </th> 
              <th scope="col" class="py-3 px-6">
                  <div class="flex items-center">
                      Eliminar
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                  </div>
              </th>  
                    
          </tr>
      </thead>
      <tbody>
      @foreach ( $sem as $p )
      @if ($p->email === @auth()->user()->email)
      @else
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
             {{$p->id}}
          </th>
          <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
             {{$p->semestre}}
          </th>
          <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
             {{$p->materias->materia}}
          </th>
          <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{$p->user->name}}
           </th>
         
       <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
         <form action="#" method="POST">
          @if (session('modificado'))
              @push('scripts')
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script>
                  Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario fue modificado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })
              </script>
              @endpush
          @endif
          @csrf
          
              <button  
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                  Editar
              </button>
        
         </form>
        </th>
         <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <form action="#" method="POST">
          @if (session('mensaje'))
              @push('scripts')
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script>
                  Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario fue eliminado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })
              </script>
              @endpush
          @endif
          @method('DELETE')  
          @csrf
          
            <button  
               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
               Eliminar
            </button>
      
        </form>
      </th>
      </tr>
          @endif 
          @endforeach
      </tbody>
  </table>
  
</div>
{{$sem->links()}}


<div>
</div>
<!--fin de la tabla por categorias-->  
<!--Mostrar tabla de profesores-->


</section>
<!--Fin de la tabla-->
</div>
@endsection

