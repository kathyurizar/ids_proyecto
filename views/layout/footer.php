    
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
    <script src="../../js/app.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Plantilla -->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Para las alertas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- datatables: para las tablas dinamicas -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready( function () {
            $('#tablaDiseno').DataTable({
                language: {
                    processing:     "Cargando...",
                    search:         "Buscar",
                    lengthMenu:    "Mostrar _MENU_ Registros",
                    info:           "Mostrando registros del _START_ hasta _END_ de _TOTAL_ registros",
                    infoEmpty:      "Visualización del elemento 0 a 0 de 0 elementos",
                    infoFiltered:   "(Filtro de _MAX_ elementos en total)",
                    infoPostFix:    "",
                    loadingRecords: "Cargando...",
                    zeroRecords:    "No hay elementos para mostrar",
                    emptyTable:     "No hay registros disponibles por el momento",
                    paginate: {
                        first:      "Primero",
                        previous:   "Anterior",
                        next:       "Siguiente",
                        last:       "Ultimo"
                    },
                    aria: {
                        sortAscending:  ": activar para ordenar la columna en orden ascendente",
                        sortDescending: ": activar para ordenar la columna en orden descendente"
                    }
                }   
            });     
        });

    </script>

</body>
</html>