
function AlertaEliminar() {
    Swal.fire({
        title: 'Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'advertencia',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Eliminado!',
            'El registro fue eliminado.',
            'success'
          )
        }
      })
}