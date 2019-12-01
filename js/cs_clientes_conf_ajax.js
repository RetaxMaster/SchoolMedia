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

    //TableIndexs contiene los indices de las columnas de res.data que me interesa conservar, res es la respuesta del servidor al hacer la consulta, dentro trae data que son todas las filas y columnas
    var tableIndexs = [0, 1, 11, 16];

    var pushToTheEnd = ['<a href="#" id="e-{id}" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles" class="updateData"><i class="far fa-newspaper"></i></a>']

    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_clientes_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
        return formatDataTable(res, tableIndexs, [], pushToTheEnd);
    }); // Se fijan los labels estandars de las tablas y sus busquedas

    //Se rellenan los slecets de paises y provincias
    selectCtryPopulate('#selectCtry', 0, 'Seleccione Pais');
    selectCtryPopulate('#country', 0, 'Seleccione Pais');
    selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', 168);

    //Se detecta el evento de cambio de país para rellenar el select de provincia
    $("#country").on("change", function() {
        selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', this.value);
        selectCodCtryPopulate("#CodPais1", this.value);
        selectCodCtryPopulate("#CodPais2", this.value);
    });

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

    //Detecta el cambio de país
    $("#selectCtry").on("change", function() {
        var pais = this.value;

        var data = {
            mode: "filterClientsByCtry",
            pais: pais
        }

        updateTableLabels('#tablaVerTodos', LangLabelsURL, './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', data, function(res) {
            return formatDataTable(res, tableIndexs, [], pushToTheEnd);
        });
        
    });

    //Detecta el cambio de tipo de cliente
    $("#tipoCliente").on("change", function () {
        var tipoCliente = this.value;

        var data = {
            mode: "filterClientsByType",
            tipoCliente: tipoCliente
        }

        updateTableLabels('#tablaVerTodos', LangLabelsURL, './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', data, function (res) {
            return formatDataTable(res, tableIndexs, [], pushToTheEnd);
        });

    });

    //Rellena la lista de códigos de países
    selectCodCtryPopulate("#CodPais1", 168);
    selectCodCtryPopulate("#CodPais2", 168);

    //Rellena la clasificación del cliente
    selectPopulate("#clasificacionCliente", "getClasifCli", 0, 1);

    //Rellena el tipo de cliente
    selectPopulate("#tipoCliente2", "getTipoCli", 0, 1);

    //Rellena la calificación del cliente
    selectPopulate("#calificacionCliente", "getCalifCli", 0, 1);

    //Abre el formulario para actualizar la data
    var isUpdating = false; //Variable que indica si el formulario va a ser para actualizar o insertar
    var idToUpdate;

    $(document).on("click", ".updateData", function(){
        isUpdating = true;
        idToUpdate = this.id.split("-")[1];
    });

    $(document).on("click", "#idBtnNuevo", function () {
        isUpdating = false;
    });

    //Limpia el formulario
    $(document).on("click", "#idBtnLimpiar", function (e) {
        $("#idFormDetalles").get(0).reset();
    });

    //Envía el formulario
    $("#idFormDetalles").on("submit", function(e) {
        e.preventDefault();

        var inputs = $("#idFormDetalles .required");

        alert(isUpdating)

        if (validateInputs(inputs) || isUpdating) {
            
            var formData = new FormData(this);

            if (isUpdating) {
                formData.append("mode", "updateInfo");
                formData.append("idToUpdate", idToUpdate);
            }
            else {
                formData.append("mode", "uploadInfo");
            }

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
                    $("#idFormDetalles").get(0).reset();
                    //Actualizo la DataTable
                    $("#tablaVerTodos").DataTable().destroy();
                    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_clientes_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
                        return formatDataTable(res, tableIndexs, [], pushToTheEnd);
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

    });

}