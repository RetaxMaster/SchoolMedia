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

    //Se rellenan los slecets de paises y provincias
    selectCtryPopulate('#country', 0, 'Seleccione Pais');
    selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', 168);
    selectPopulate("#fp", "getFormasPago", 0, 1);

    //Busca las facturas
    $("#Cliente").on("change", function (e) {

        var data = {
            mode: "getFactura",
            id: this.value
        }

        $.post(url, data, function(res) {
            res = JSON.parse(res);
            console.log(res);

            $("#ruc").val(res.ruc);
            $("#telefono").val(res.telefono);
            $("#direccion").val(res.direccion);
            $("#country").val(res.pais);
            $("#Provincia").val(res.provincia);

            $("#facturas").children().remove();
            var option = $("<option value='0'>Elige...</option>");
            $("#facturas").append(option);

            $(res.facturas).each(function() {
                
                var option = $("<option value='" + this.id_cot + "'>" + this.id_cot + "</option>");

                $("#facturas").append(option);

            });
        })

    });

    // Busca la información sobre la factura 
    $(document).on("change", "#facturas", function (e) {
    
        var data = {
            mode: "getFacturaInfo",
            id: this.value
        }

        $.post(url, data, function(res) {
            console.log(res);
            res = JSON.parse(res);
            console.log(res);
            
            
            
        })
    
    });

}