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
    var tableIndexs = [0, 2, 3, 4];

    var pushToTheEnd = ['<a href="#" id="e-{id}" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles" class="updateData"><i class="far fa-newspaper"></i></a>']

    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_disp_cap_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
        return formatDataTable(res, tableIndexs, [], pushToTheEnd);
    }); // Se fijan los labels estandars de las tablas y sus busquedas


    //Se rellenan los slecets de paises y provincias
    selectCtryPopulate('#selectCtry', 0, 'Seleccione Pais');
    selectCtryPopulate('#country', 0, 'Seleccione Pais');
    selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', 168);

    //Se detecta el evento de cambio de país para rellenar el select de provincia
    $("#country").on("change", function () {
        selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', this.value);
    });

    //Rellena el idplan
    selectPopulate("#id_cap", "getCaps", 0, 1);

    // Código para actualizar la data

    var isUpdating = false; //Variable que indica si el formulario va a ser para actualizar o insertar
    var idToUpdate;

    $(document).on("click", ".updateData", function () {
        isUpdating = true;
        idToUpdate = this.id.split("-")[1];

        getDataOfThisRecord(idToUpdate, "getDispCapData", {
            idCliente: 0,
            id_cap: 1,
            country: 2,
            Provincia: 3,
            customCheck1: [4, "checkbox"]
        });
    });

    $(document).on("click", "#idBtnNuevo", function () {
        isUpdating = false;
        $("#idFormDetalles").get(0).reset();
    });

    // Termina código para actualizar la data

    //Limpia el formulario
    $(document).on("click", "#idBtnLimpiar", function (e) {
        $("#idFormDetalles").get(0).reset();
    });

    //Envía el formulario
    $("#idFormDetalles").on("submit", function (e) {
        e.preventDefault();

        var inputs = $("#idFormDetalles .required");

        if (validateInputs(inputs)) {

            var formData = new FormData(this);
            var successText;

            if (isUpdating) {
                formData.append("mode", "updateDispCapInfo");
                formData.append("idToUpdate", idToUpdate);
                successText = "¡Registro actualizado con éxito!";
            } else {
                formData.append("mode", "uploadDispCapInfo");
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
                        $("#idFormDetalles").get(0).reset();
                    //Actualizo la DataTable
                    $("#tablaVerTodos").DataTable().destroy();
                    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_disp_cap_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
                        return formatDataTable(res, tableIndexs, [], pushToTheEnd);
                    });

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