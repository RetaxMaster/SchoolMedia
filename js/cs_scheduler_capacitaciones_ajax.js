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

    var tableIndexs = [5, 8, 7, 10, 11, 12];

    var juntar = [{
        "fields": [8, 9],
        "firstIndex": 1
    }];

    var pushToTheEnd = ['<a href="#" id="e-{id}" data-toggle="modal" data-target="#Modal_tbl_0100" data-dismiss="modal" data-placement="top" title="Ver detalles" class="updateData"><i class="far fa-newspaper"></i></a>']

    //Se rellenan los selects de paises y provincias
    selectCtryPopulate('#selectCtry', 0, 'Seleccione Pais');
    selectCtryPopulate('#country', 0, 'Seleccione Pais');
    selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', 168);

    $("#country").on("change", function () {
        selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', this.value);
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

    // Rellena el select de Anunciante
    selectPopulate("#cliente", "getClients", 0, 1);

    selectPopulate("#id_cttoPub", "getcttos", 0, 1);

    selectPopulate("#id_cap", "getCaps", 0, 6, "", "", [7]);

    selectPopulate("#idplan", "getPlans", 0, 7);

    selectPopulate("#calificacionCliente", "getCalifCli", 0, 1);

    $(document).on("change", "#cliente", function () {
        var anunciante = this.value;
        $("#id_cttoPub").children().remove();
        selectPopulate("#id_cttoPub", "getcttobyanunciante", 0, 1, "tbl_cacttos.id_client", anunciante);
    });

    // Crea y rellena los datos del calendario
    function setAndFillCalendar(fecha = null) {
        var pais = $("#selectCtry").val();
        var tipoCliente = $("#tipoCliente").val();
        var estatus = $("#statusInstallVal1").val();

        if(fecha == null) fecha = $("#fecha").val();

        makeCalendar(fecha);
        fillActivitiesOfTheDay({
            mode: "getCalCapsActivities",
            pais: pais,
            tipoCliente: tipoCliente,
            estatus: estatus,
            fecha: fecha
        });
    }

    //Detecta el cambio de fecha
    $(document).on("change", "#fecha, #selectCtry, #tipoCliente, #statusInstallVal1", function (e) {
        setAndFillCalendar();
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
            mode: "getCalCapsActivitiesByDay",
            fecha: fecha,
            pais: pais,
            tipoCliente: tipoCliente,
            estatus: estatus
        }
        
        updateTableLabels('#tablaVerTodos', LangLabelsURL, './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', data, function (res) {
            return formatDataTable(res, tableIndexs, juntar, pushToTheEnd);
        });

    });

    $(document).on("click", ".add-act", function (e){
        var id = (this.id).split("-").pop();
        var fecha = $("#fecha").val();

        $("#id_cttoPub").children().remove();
        $("#locationPub").children().remove();
        $("#caraPub").children().remove();
        

        //Ahora manipulo la fecha para poner la que el usuario eligió
        fecha = fecha.split("-");
        fecha.pop();
        fecha.push(id);
        fecha = fecha.join("-");

        setTimeout(function() {
            $("#finicioPub").val(fecha);
        }, 0);

        
    });

    // Código para actualizar la data

    var isUpdating = false; //Variable que indica si el formulario va a ser para actualizar o insertar
    var idToUpdate;

    $(document).on("click", ".updateData", function () {
        isUpdating = true;
        idToUpdate = this.id.split("-")[1];

        $("#uploadDocs").show();
        $("#loadedFiles").attr("href", $("#loadedFiles").attr("href") + "&sect=calVals&reg=" + idToUpdate);
        $("#finicioPub").prop("readonly", false);
        $("#idBtnLimpiar").hide();

        getDataOfThisRecord(idToUpdate, "getCalCapsData", {
            idActivityPub:0,
            cliente: [1, "drop-cliente"],
            id_cttoPub: 2,
            idplan: 3,
            id_cap: 4,
            country: 5,
            Provincia: 6,
            finicioPub: 7,
            ffinPub: 8,
            statusInstallPub: 9,
            calificacionCliente: 11
        });
    });

    $(document).on("click", ".add-act", function () {
        isUpdating = false;
        $("#uploadDocs").hide();
        $("#finicioPub").prop("readonly", true);
        $("#idBtnLimpiar").show();
        resetDefaultForm();
    });

    //Limpia el formulario
    $(document).on("click", "#idBtnLimpiar", function (e) {
        resetDefaultForm();
    });

    //Envía el formulario
    $("#idFormDetalles").on("submit", function (e) {
        e.preventDefault();

        var inputs = $("#idFormDetalles .required");

        if (validateInputs(inputs) || isUpdating) {

            var formData = new FormData(this);
            var successText;

            if (isUpdating) {
                formData.append("mode", "updateCalCapsInfo");
                formData.append("idToUpdate", idToUpdate);
                successText = "¡Registro actualizado con éxito!";
            } else {
                formData.append("mode", "uploadCalCapsInfo");
                successText = "¡Registro agregado con éxito!";
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
                    if (!isUpdating)
                        resetDefaultForm();
                    //Actualizo la DataTable
                    setAndFillCalendar();

                    //Informo de éxito
                    Swal.fire(
                        '¡Listo!',
                        successText,
                        'success'
                    )
                },
                error: function (e) {
                    console.log(e);
                }
            });
        } else {
            alert("¡Rellena todos los campos requeridos!");
        }

    });

}