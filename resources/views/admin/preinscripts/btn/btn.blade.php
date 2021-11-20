<form action="{{ route('dates.destroy', $id) }}" method="post" class="formularioEliminar">
    @csrf
    @method('DELETE')
    <div class="flex -mx-3">
        <div class="w-2/6 h-full">
            <a title="Editar" href="{{ route('dates.edit', $id) }}">
                <span class="t">
                    <i class="fas fa-edit hover:scale-125 text-md"></i></span>
            </a>
        </div>
        <div class="w-2/6 h-4">
            <a title="Ver" href="{{ route('dates.show', $id) }}">
                <span class="te"><i class="fas fa-eye hover:scale-125 text-md"></i></span>
            </a>
        </div>
        <div class="w-2/6 h-4">
            <button title="Eliminar" onclick="borrarCiclo()">
                <span class=""><i class="fas fa-trash hover:scale-125 text-md"></i></span>
            </button>
        </div>
    </div>
</form>
<script>
    $('.formularioEliminar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Desea eliminar el registro?',
            text: "Si lo elimina no podrá recuperarlo!",
            icon: 'danger',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });
</script>
