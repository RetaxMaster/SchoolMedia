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
    var tableIndexs = [5, 7, 9, 1];

    var juntar = [{
        "fields": [5, 6],
        "firstIndex": 0
    }];

    var pushToTheEnd = ['<a href="#" id="e-{id}" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles" class="updateData"><i class="far fa-newspaper"></i></a>']


    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_perfil_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
        return formatDataTable(res, tableIndexs, juntar, pushToTheEnd);
    }); // Se fijan los labels estandars de las tablas y sus busquedas


    //Se rellenan los slecets de paises y provincias

    //Detecta el cambio de departamento
    $("#depto").on("change", function () {
        var depto = this.value;
        selectPopulate("#cargo", "getcargobydepto", 0, 2, "tbl_gencargos.id_dptoemp", depto);
    });

    //Rellena el companies
    selectPopulate("#company", "getCompanies", 0, 1);

    //Rellena el cargo
    selectPopulate("#cargo", "getcargo", 0, 2);

    //Rellena el departamento
    selectPopulate("#depto", "getdepto", 0, 1);

    //Rellena el countrycode
    selectPopulate("#CodPais1", "getctrycode", 0, 2);

    selectPopulate("#CodPais2", "getctrycode", 0, 2);

    // Código para actualizar la data

    var isUpdating = false; //Variable que indica si el formulario va a ser para actualizar o insertar
    var idToUpdate;

    $(document).on("click", ".updateData", function () {
        isUpdating = true;
        idToUpdate = this.id.split("-")[1];
        
        $("#idBtnLimpiar").hide();

        getDataOfThisRecord(idToUpdate, "getPerfilData", {
            idCliente: 0,
            company: 1,
            sexo: 15,
            nom: 4,
            ape: 5,
            CodPais1: 7,
            telCliente: 8,
            extCliente: 9,
            CodPais2: 10,
            celCliente: 11,
            email: 6,
            cargo: 2,
            observCliente: 12
        });
    });

    $(document).on("click", "#idBtnNuevo", function () {
        isUpdating = false;
        $("#idBtnLimpiar").show();
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
            var successText;

            if (isUpdating) {
                formData.append("mode", "updatePerfilInfo");
                formData.append("idToUpdate", idToUpdate);
                successText = "¡Registro actualizado con éxito!";
            } else {
                formData.append("mode", "uploadPerfilInfo");
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
                    loading(true, "Registrando...");
                },
                success: function (res) {
                    console.log(res);
                    
                    loading(false);

                    if (res == "true") {
                        //Limpio el formulario
                        if(!isUpdating)
                            resetDefaultForm();
                        //Actualizo la DataTable
                        $("#tablaVerTodos").DataTable().destroy();
                        setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_perfil_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
                            return formatDataTable(res, tableIndexs, juntar, pushToTheEnd);
                        });
    
                        //Informo de éxito
                        Swal.fire(
                            '¡Listo!',
                            successText,
                            'success'
                        )
                    }
                    else {
                        Swal.fire(
                            "Error",
                            res,
                            'error'
                        )
                    }

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