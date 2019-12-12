// JavaScript Document

// Se ejecuta cuando la pagina carga o se reestablece
function onPageStart() {
    setInnerHTML(global_txtObj["txts"], global_txtObj["attrsx"], global_txtObj["components_ids"]); // se fijan textos
    /* setInnerAttrs(global_hintsObj["txts"], global_hintsObj["attrsx"], global_hintsObj["components_ids"]) */ // fija atributos
    switch (globalLang) {
        case "es":
            LangLabelsURL = LangLabels[0];
            break;
        case "en":
            LangLabelsURL = LangLabels[1];
            break;
        case "pt":
            LangLabelsURL = LangLabels[2];
            break;
        case "gh":
            LangLabelsURL = LangLabels[3];
            break;
    }

    var tableIndexs = [0, 8, 1, 3, 4, 2, 5, 9];

    var pushToTheEnd = ['<a href="#" id="e-{id}" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles" class="updateData"><i class="far fa-newspaper"></i></a>']

    //Se rellenan los selects de paises y provincias
    selectCtryPopulate('#selectCtry', 0, 'Seleccione Pais');

    var url = './ajax_tipos_clients_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';
    
    //Rellena el select list
    $.get(url, function(res) {

        res = JSON.parse(res);
        var data = res.data;
        
        for (const key in data) {
            var op = data[key];
            var option = $("<option value='" + op[0] + "'>" + op[1] + "</option>");
            $("#tipoCliente").append(option);
        }
        
    });

    //Detecta el cambio de fecha
    $(document).on("change", "#fecha", function (e) {

        var pais = $("#selectCtry").val();
        var tipoCliente = $("#tipoCliente").val();
        var estatus = $("#statusInstallVal1").val();
        var fecha = $("#fecha").val();
    
        makeCalendar(this.value);
        fillActivitiesOfTheDay({
            mode: "getCalAnuntsActivities",
            pais: pais,
            tipoCliente: tipoCliente,
            estatus: estatus,
            fecha: fecha
        });
    
    });

    //Detecta cuando se quiere mirar la lista de actividades de un día
    $(document).on("click", ".see-act", function (e) {
    
        var id = (this.id).split("-").pop();
        var fecha = $("#fecha").val();
        var pais = $("#selectCtry").val();
        var tipoCliente = $("#tipoCliente").val();
        var estatus = $("#statusInstallVal1").val();

        var url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';

        //Manipulo la fecha para establecer el día
        fecha = fecha.split("-");
        fecha.pop();
        fecha.push(id);
        fecha = fecha.join("-");

        console.log(fecha);

        var data = {
            mode: "getCalAnuntsActivitiesByDay",
            fecha: fecha,
            pais: pais,
            tipoCliente: tipoCliente,
            estatus: estatus
        }
        
        updateTableLabels('#tablaVerTodos', LangLabelsURL, './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', data, function (res) {
            return formatDataTable(res, tableIndexs, [], pushToTheEnd);
        });

    });

    

    //Limpia el formulario
    $(document).on("click", "#idBtnLimpiar", function (e) {
        resetDefaultForm();
    });

    /* Envía el formulario
    $("#idFormDetalles").on("submit", function(e) {
        e.preventDefault();

        var inputs = $("#idFormDetalles .required");

        if (validateInputs(inputs)) {
            
            var formData = new FormData(this);
            formData.append("mode", "uploadInfo");

            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }
            
            //Inserto los datos mediante Ajax
            $.ajax({
                url: './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '',
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    console.log("Enviando...");
                },
                success: function (res) {
                    console.log(res);
                    
                    //Limpio el formulario
                    resetDefaultForm();
                    //Actualizo la DataTable
                    $("#tablaVerTodos").DataTable().destroy();
                    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_clientes_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
                        return formatDataTable(res, tableIndexs);
                    });

                    //Informo de éxito
                    alert("Agregado!!");
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }
        else {
            alert("¡Rellena todos los campos requeridos!");
        }

    }); */

}