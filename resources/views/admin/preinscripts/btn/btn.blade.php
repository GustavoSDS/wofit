 <div class="flex -mx-3">
     <div class="w-2/6 h-full">
         <a title="Editar" href="{{ route('preinscripts.edit', $id) }}">
             <span>
                 <i class="hover:text-blue-700 text-blue-600 fas fa-edit hover:scale-125 text-md"></i></span>
         </a>
     </div>
     <div class="w-2/6 h-4">
         <a title="Ver" href="{{ route('preinscripts.show', $id) }}">
             <span><i class="hover:text-green-700 text-green-600 fas fa-eye hover:scale-125 text-md"></i></span>
         </a>
     </div>
 </div>
