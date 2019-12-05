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

    //Esta función crea el html dentro del DataTable, se formatea cada valor para pasarlo a html, se esta manejando 3 cartas por fila
    function formatTable(res) {
        var data = res.data;
        var newData = [];
        var row = ["", "", ""];

        //Se recorre cada registro que responde el Ajax
        for (let i = 0, x = 1, p = 0; i < data.length; i++, x++) {

            var rep = data[i];

            //Se crea su HTML
            row[x - 1] = '<div class="card tarjetaImagenes" style=""> <img src="' + rep[2] + '" class="card-img-top openInNewTab" alt="..."><div class="card-body bodyTarjeta"><h5 class="card-title">' + rep[0] + '</h5><p class="">' + rep[3] + '</p><p class="card-text">' + rep[1] + '</p><a href="#" class="btn btn-primary edit-record" id="i-' + rep[0] + '" data-toggle="modal" data-target="#ModalVerTodos">Editar</a></div></div>';

            newData[p] = row;

            //Si ya pasaron 3 registros, se reinicializan algunas variables para poder empezar a guardar en una segunda fila
            if (x % 3 == 0) {
                x = 0;
                p++;
                row = ["", "", ""];
            }

        }

        return newData;
    }

    //TableIndexs contiene los indices de las columnas de res.data que me interesa conservar, res es la respuesta del servidor al hacer la consulta, dentro trae data que son todas las filas y columnas
    var tableIndexs = [0, 1, 11, 16];
    //pushToTheEnd es una cadena que se pone al final del DataTable
    var pushToTheEnd = ['<a href="#" id="e-{id}" data-toggle="modal" data-target="#ModalVerImagenes" data-placement="top" title="Ver detalles" class="loadGallery"><i class="far fa-newspaper"></i></a>']

    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_clientes_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
        return formatDataTable(res, tableIndexs, [], pushToTheEnd);
    }); // Se fijan los labels estandars de las tablas y sus busquedas

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

    //Se rellenan los slecets de paises y provincias
    selectCtryPopulate('#selectCtry', 0, 'Seleccione Pais');

    //Rellena el tipo de cliente
    selectPopulate("#tipoCliente", "getTipoCli", 0, 1);

    //Rellena la cliente
    selectPopulate("#Cliente", "getClients", 0, 1);


    //Detecta cuando se abre una galería
    $(document).on("click", ".loadGallery", function(){
        
        var id = this.id.split("-")[1];

        var data = {
            id: id
        }

        //Establezco en la ventana modal el id con el que estoy trabajando
        $("#tablaVerImagenes").get(0).dataset.idCliente = id;

        updateTableLabels('#tablaVerImagenes', LangLabelsURL, './ajax_rep_img_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', data, function (res) {
            return formatTable(res);
        }); // Se fijan los labels estandars de las tablas y sus busquedas
    
    });

    //Abre una imagen en una nueva pestaña
    $(document).on("click", ".openInNewTab", function (e) {
    
        var src = this.src;
        window.open(src, "_blank");
    
    });

    // Código para actualizar la data

    var isUpdating = false; //Variable que indica si el formulario va a ser para actualizar o insertar
    var idToUpdate;

    $(document).on("click", ".edit-record", function () {
        isUpdating = true;
        idToUpdate = this.id.split("-")[1];

        getDataOfThisRecord(idToUpdate, "getRepImgData", {
            idCliente: 0,
            observCliente: 2
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

        if (validateInputs(inputs) || isUpdating) {

            var clientId = $("#tablaVerImagenes").get(0).dataset.idCliente;

            var formData = new FormData(this);
            var successText;

            if (isUpdating) {
                formData.append("mode", "updateRepImgInfo");
                formData.append("idToUpdate", idToUpdate);
                successText = "¡Registro actualizado con éxito!";
            } else {
                formData.append("mode", "uploadRepImgInfo");
                successText = "¡Registro agregado con éxito!";
            }

            formData.append("cliente", clientId);

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
                    var data = {
                        id: clientId
                    }

                    updateTableLabels('#tablaVerImagenes', LangLabelsURL, './ajax_rep_img_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', data, function (res) {
                        return formatTable(res);
                    }); // Se fijan los labels estandars de las tablas y sus busquedas

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