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
    var tableIndexs = [1, 7, 9, 4];

    var juntar = [{
        "fields": [9, 5],
        "firstIndex": 2
    }];

    var pushToTheEnd = ['<a href="#" id="e-{id}" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles" class="updateData"><i class="far fa-newspaper"></i></a>']

    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_cent_op_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
        return formatDataTable(res, tableIndexs, juntar, pushToTheEnd);
    }); // Se fijan los labels estandars de las tablas y sus busquedas


    //Se rellenan los slecets de paises y provincias
    selectCtryPopulate('#country', 0, 'Seleccione Pais');
    selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', 168);
    selectCodCtryPopulate("#CodPais1", 168);


    //Se detecta el evento de cambio de país para rellenar el select de provincia
    $("#country").on("change", function () {
        selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', this.value);
        selectCodCtryPopulate("#CodPais1", this.value);
    });

    //Rellena el idplan
    selectPopulate("#id_cap", "getCaps", 0, 1);

    //Detecta la inserción de archivos
    var filesToUpload = new FormData();
    $(document).on("change", "#documents", function (e) {

        for (var i = 0; i < this.files.length; i++) {
            var element = this.files[i];
            var id = getRandomString(7);
            filesToUpload.append(id, element);

            var picture = createFile(element, id);
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
        $("#loadedFiles").attr("href", $("#loadedFiles").attr("href") + "&sect=centOp&reg=" + idToUpdate);

        getDataOfThisRecord(idToUpdate, "getCentOpData", {
            idCliente: 0,
            razSocCliente: 1,
            ruc: 2,
            address: 3,
            country: 4,
            Provincia: 5,
            email: 6,
            CodPais1: 7,
            telefono: 8,
            customCheck1: [9, "checkbox"]
        });
    });

    $(document).on("click", "#idBtnNuevo", function () {
        isUpdating = false;
        $("#uploadDocs").hide();
        resetDefaultForm();
    });

    // Termina código para actualizar la data

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
                formData.append("mode", "updateCentOpInfo");
                formData.append("idToUpdate", idToUpdate);
                successText = "¡Registro actualizado con éxito!";
            } else {
                formData.append("mode", "uploadCentOpInfo");
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
                    if(!isUpdating)
                        resetDefaultForm();
                    //Actualizo la DataTable
                    $("#tablaVerTodos").DataTable().destroy();
                    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_cent_op_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
                        return formatDataTable(res, tableIndexs, juntar, pushToTheEnd);
                    });

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