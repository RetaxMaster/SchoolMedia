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
    var tableIndexs = [0, 8, 1, 3, 4, 5];

    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_ocup_espacios_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
        return formatDataTable(res, tableIndexs);
    }); // Se fijan los labels estandars de las tablas y sus busquedas

    //Se rellenan los slecets de paises y provincias
    selectCtryPopulate('#selectCtry', 0, 'Seleccione Pais');
    selectCtryPopulate('#country', 0, 'Seleccione Pais');
    selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', 168);
    selectProvPopulate('#Provincia2', 0, 'Seleccione Provincia', 168);

    //Se detecta el evento de cambio de país para rellenar el select de provincia
    $("#selectCtry").on("change", function () {
        selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', this.value);
    });

    //Se detecta el evento de cambio de país para rellenar el select de provincia
    $("#country").on("change", function () {
        console.log("ads");
        
        selectProvPopulate('#Provincia2', 0, 'Seleccione Provincia', this.value);
    });

    //Detecta el cambio de país
    $("#Provincia").on("change", function () {
        var pais = this.value;

        var data = {
            mode: "filterLocAtsByProv",
            pais: pais
        }

        updateTableLabels('#tablaVerTodos', LangLabelsURL, './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', data, function (res) {
            return formatDataTable(res, tableIndexs);
        });

    });

    //Detecta el cambio de tipo de publicidad
    $("#tpub").on("change", function () {
        var tpub = this.value;

        var data = {
            mode: "filterLocAtsByTpub",
            tpub: tpub
        }

        updateTableLabels('#tablaVerTodos', LangLabelsURL, './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', data, function (res) {
            return formatDataTable(res, tableIndexs);
        });

    });

    //Rellena la lista de códigos de países
    selectCodCtryPopulate("#CodPais1", 168);
    selectCodCtryPopulate("#CodPais2", 168);

    //Rellena el formato publicitario
    selectPopulate("#tpub", "gettpub", 0, 1);

    //Rellena el formato publicitario
    selectPopulate("#tpub2", "gettpub", 0, 1);

    //Rellena el tipo de cliente
    selectPopulate("#tcliente", "getTipoCli", 0, 1);

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
            formData.append("mode", "uploadOcupEspaciosInfo");

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
                    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_ocup_espacios_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
                        return formatDataTable(res, tableIndexs);
                    });

                    //Informo de éxito
                    alert("Agregado!!");
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