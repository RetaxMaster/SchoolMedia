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

    var tableIndexs = [6, 8, 1, 12, 10, 2, [4, "filterStatus"]];

    var juntar = [{
        "fields": [12, 13],
        "firstIndex": 3
    },
    {
        "fields": [10, 11],
        "firstIndex": 4
    }];

    var pushToTheEnd = ['<a href="#" id="e-{id}" data-toggle="modal" data-target="#Modal_tbl_0100" data-dismiss="modal" data-placement="top" title="Ver detalles" class="updateData"><i class="far fa-newspaper"></i></a>']

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

    // Rellena el select de Anunciante
    selectPopulate("#anunciantePub", "getClients", 0, 1);

    selectPopulate("#receptorPub", "getClients", 0, 1);

    selectPopulate("#id_cttoPub", "getcttos", 0, 1);

    selectPopulate("#installerPub", "getUsers", 0, 1);
    
    selectPopulate("#supervPub", "getUsers", 0, 1);

    selectPopulate("#sellerPub", "getUsers", 0, 1);

    selectPopulate("#locationPub", "getAllLocations", 0, 1);

    selectPopulate("#caraPub", "getAllLocations", 2, 2);

    $(document).on("change", "#anunciantePub", function () {
        var anunciante = this.value;
        $("#id_cttoPub").children().remove();
        selectPopulate("#id_cttoPub", "getcttobyanunciante", 0, 1, "tbl_cacttos.id_client", anunciante);
    });
    
    $(document).on("change", "#receptorPub", function () {
        var receptor = this.value;
        $("#locationPub").children().remove();
        $("#caraPub").children().remove();
        selectPopulate("#locationPub", "getlocationsbyreceptor", 0, 1, "tbl_calocats.id_client", receptor);
    });

    $(document).on("change", "#locationPub", function () {
        var location = $('select#locationPub option:selected').text();
        selectPopulate("#caraPub", "getcarabylocation", 2, 2, "tbl_calocats.cod", location);
    });

    //Carga el listado de imagenes
    $("#select-arte-grafico").on("click", function() {

        var cliente = $("#anunciantePub").val();

        console.log(cliente);
        

        if (cliente > 0) {
            var data = {
                mode: "getImagesByClient",
                cliente: cliente
            }

            var url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';

            $.post(url, data, function(res) {
                res = JSON.parse(res);
                var data = res.data;

                $("#gallery").children().remove();

                $(data).each(function() {
                    var image = $( //html
                    `<div class="col-sm-3 my-2">
                        <div class="image-container" style="cursor: pointer;">
                            <img src="${this[2]}" alt="${this[3]}" data-id="${this[0]}">
                        </div>
                    </div> `);
                    
                    $("#gallery").append(image);

                });
            })
            
        } else {
            Swal.fire(
                "Error",
                "Elige un anunciante para cargar las imágenes",
                "error"
            );
        }
        

    });

    //Detecta cuando se le hace click a la imagen de la gelería
    $(document).on("click", "#gallery .image-container img", function (e) {
    
        var src = this.src;
        var id = this.dataset.id;

        $("#arte-grafico").val(id);
        $("#arteGrafico").attr("src", src);
        $("#arteGrafico").show();
        $("#close-gallery").click();
    
    });

    // Crea y rellena los datos del calendario
    function setAndFillCalendar(fecha = null) {
        var pais = $("#selectCtry").val();
        var tipoCliente = $("#tipoCliente").val();
        var estatus = $("#statusInstallVal1").val();

        if(fecha == null) fecha = $("#fecha").val();

        makeCalendar(fecha);
        fillActivitiesOfTheDay({
            mode: "getCalAnuntsActivities",
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
            mode: "getCalAnuntsActivitiesByDay",
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

    //Detecta la inserción de archivos
    var filesToUpload = new FormData();
    $(document).on("change", "#documents", function (e) {

        for (var i = 0; i < this.files.length; i++) {
            var element = this.files[i];
            var id = getRandomString(7);
            filesToUpload.append(id, element);

            var picture = createImage(element, id);
            $("#all-images").append(picture);
        }

        this.value = "";

    });

    //Detecta cuando se elimina una imagen a subir
    $(document).on("click", ".item-container", function (e) {

        var id = this.id;
        $(`#${id}`).remove();
        id = id.split("-")[1];
        filesToUpload.delete(id);

    });

    // Código para actualizar la data

    var isUpdating = false; //Variable que indica si el formulario va a ser para actualizar o insertar
    var idToUpdate;

    $(document).on("click", ".updateData", function () {
        isUpdating = true;
        idToUpdate = this.id.split("-")[1];

        $("#uploadDocs").show();
        $("#loadedFiles").attr("href", $("#loadedFiles").attr("href") + "&sect=calAnun&reg=" + idToUpdate);
        $("#finicioPub").prop("readonly", false);
        $("#idBtnLimpiar").hide();

        getDataOfThisRecord(idToUpdate, "getCalAnunData", {
            idActivityPub: 0,
            anunciantePub: [2, "drop-cliente"],
            id_cttoPub: [1, "fillContratos"],
            receptorPub: [3, "drop-cliente"],
            locationPub: [4, "fillLocations"],
            caraPub: [5, "fillCaras"],
            "arte-grafico": [6, "arte"],
            finicioPub: 7,
            ffinPub: 8,
            installerPub: 10,
            supervPub: 9,
            sellerPub: 11,
            statusInstallPub: 12
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

            //Inserto los archivos a subir
            for (var pair of filesToUpload.entries()) {
                formData.append(pair[0], pair[1]);
            }

            var successText;

            if (isUpdating) {
                formData.append("mode", "updateCalAnunInfo");
                formData.append("idToUpdate", idToUpdate);
                successText = "¡Registro actualizado con éxito!";
            } else {
                formData.append("mode", "uploadCalAnunInfo");
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

                    //Elimino las vistas previas y limpio el formData
                    filesToUpload = new FormData();
                    $("#all-images").children().remove();

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