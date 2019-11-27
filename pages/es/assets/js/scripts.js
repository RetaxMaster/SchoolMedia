/*
*PROYECTO :SCHOOL MEDIA
* FUNCIONES JS
 */
 

$(document).ready(function() {
    //Función para la tabla
   // $('#tablaVerTodos').DataTable();
     $('#tablaVerTodos').dataTable({
            //ordering: false, me elimina el ordenamiento y la funcion de ordenar al darle clicl a los encabezados
                        
            "order": [[ 0, "asc" ]],
            "language": {
            "sProcessing":   "Buscando...",
            //"sLengthMenu":   "Listing MENU records",
            "sZeroRecords":  "No hay resultados para su búsqueda",
            "sInfo":         "Mostrando desde START hasta END de un total de TOTAL registros",
            "sInfoEmpty":    "No hay registros que mostrar",
            "sInfoFiltered": "(buscado en un total de MAX registros)",
            "sInfoPostFix":  "",
            "sSearch":       "Buscar:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primero",
                "sPrevious": "<i class='fas fa-arrow-alt-circle-left'></i>",
                "sNext":     "<i class='fas fa-arrow-alt-circle-right'></i>",
                "sLast":     "Último"
              }
          }
    });



});

