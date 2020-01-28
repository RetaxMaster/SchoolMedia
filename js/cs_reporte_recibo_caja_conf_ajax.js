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

    var url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';

    selectCtryPopulate('#country', 0, 'Seleccione Pais');

    $(document).on("click", "#Search", function () {

        loading(true, "Buscando...");

        var pais = $("#country").val();
        var cliente = $("#Cliente").val();
        var cancelado = $("#cancelado").val();
        var fechaInicio = $("#fechaInicio").val();
        var fechaFin = $("#fechaFin").val();
        var totalGeneralRecaudado = 0;

        var data = {
            mode: "getReciboList",
            pais: pais,
            cliente: cliente,
            cancelado: cancelado,
            fechaInicio: fechaInicio,
            fechaFin: fechaFin
        }

        var tableIndexs = [11, 1, 0, 5, 14, 9, 15];

        updateTableLabels('#tablaFormatoPago', LangLabelsURL, url, data, function (res) {
            loading(false);
            return formatDataTable(res, tableIndexs, [], [], function (row, allData) {

                console.log(row);


                var id_fact = allData.id_fact;

                //Por defecto siempre va a tener el botón para ver el detalle de la cotización
                var actions = '<a href="#" id="vd-' + id_fact + '" data-toggle="modal" title="Ver detalles"><i class="far fa-sticky-note"></i></a>';

                //Si no está facturada se le agregará el botón para facturar
                var facturar = (allData.pagado == "0") ? '<a href="#" title="Facturar" class="ml-1"><i class="fas fa-file-alt"></i></a>' : "";

                actions += facturar;

                row.push(actions);

                //Aprovecho a sumar el total cotizado
                totalGeneralRecaudado += parseFloat(allData.total);
                $("#totalGeneralRecaudado").val(parseMoney(totalGeneralRecaudado));

                return row;
            });
        });

    });

}