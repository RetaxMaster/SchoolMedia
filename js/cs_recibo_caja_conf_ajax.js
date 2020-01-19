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

    var resumenPago = [];
    var resumenPagoAll = [];
    var totalFacturado = 0;
    var totalAbonado = 0;
    var idFactura;
    var idCot;
    var editing = null;

    //Se rellenan los slecets de paises y provincias
    selectCtryPopulate('#country', 0, 'Seleccione Pais');
    selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', 168);
    selectPopulate("#contrato", "getcttos", 0, 1);

    $(document).on("click", "#addPayment", function (e) {

        var formaPago = $("#fp").val();
        var obs = $("#ObservacionPago").val();
        var monto = $("#Monto").val();

        if (formaPago != "" && obs != "" && monto != "" && formaPago > 0) {

            if (!isNaN(monto)) {

                //Buscamos el nombre de la forma de pago

                var fpName = $("#fp option[value='" + formaPago + "']").text();
                
                var positionInArray = resumenPago.length;
                monto = parseFloat(monto);
    
                var row = [fpName, obs, parseMoney(monto), '<a href="#" id="e-' + positionInArray + '" data-toggle="modal" data-target="#ModalEdit" data-placement="top" title="Ver detalles" class="editData"><i class="far fa-newspaper"></i></a> <a id="d-' + positionInArray + '" data-placement="top" title="Ver detalles" class="deleteArt" style="color: #ec3d3d; cursor: pointer"><i class="fas fa-times"></i></a>'];
                
                var rowAll = [idFactura, idCot, formaPago, fpName, "", obs, monto, ""];

                resumenPago.push(row);
                resumenPagoAll.push(rowAll);

                updateTotals();
                updatePaymentsTable();

                $("#fp").val(0);
                $("#ObservacionPago").val("");
                $("#Monto").val("");
            }
            else{
                Swal.fire(
                    'Error',
                    "El monto debe ser un número.",
                    'error'
                )
            }
        }
        else {
            Swal.fire(
                'Error',
                "Por favor, rellena todos los campos.",
                'error'
            )
        }
    
    });

    function updatePaymentsTable() {
        //Creo la datatable
        $("#tablaVerTodos").DataTable().destroy();
        $("#tablaVerTodos").dataTable({
            "data": resumenPago,
            "order": [[0, "asc"]], // Se predefinie ordenar la tabla en base a la columna 0, id 
            "language": { // se cargan todos los labels en funcion al idioma seleccionado
                "url": LangLabels,
                "oPaginate": { //  se hace override de los botones de adelante y atras
                    "sPrevious": "<i class='fas fa-arrow-alt-circle-left'></i>",
                    "sNext": "<i class='fas fa-arrow-alt-circle-right'></i>",
                }
            }
        });
    }

    function updateTotals() {
        
        var totalEsteAbono = 0;
        $(resumenPagoAll).each(function() {
            totalEsteAbono += parseFloat(this[6]);
        });

        
        var saldoPendiente;

        if ($("#pagoAprobado").val() == 1)
            saldoPendiente = totalFacturado - (totalAbonado + totalEsteAbono);
        else
            saldoPendiente = totalFacturado - totalAbonado;

        $("#Abono").val(parseMoney(totalEsteAbono));
        $("#pendiente").val(parseMoney(saldoPendiente));

        return 0;
    }

    $("#pagoAprobado").on("change", updateTotals);

    $(document).on("click", ".editData", function () {
        var id = (this.id).split("-").pop();
        editing = id;

        var info = resumenPagoAll[id];

        console.log(info);
        

        var fp = info[2];
        var observacion = info[5];
        var monto = info[6];

        $("#fpEdit").val(fp);
        $("#ObservacionPagoEdit").val(observacion);
        $("#MontoEdit").val(monto);
    });

    $(document).on("click", "#saveEdit", function (e) {

        var fp = $("#fpEdit").val();
        var fpName = $("#fpEdit option[value='" + fp + "']").text();
        var observacion = $("#ObservacionPagoEdit").val();
        var monto = $("#MontoEdit").val();

        resumenPago[editing][0] = fpName;
        resumenPago[editing][1] = observacion;
        resumenPago[editing][2] = monto;

        // Igual se ponen en e arreglo que tiene la información para la DB
        // [prodId, codigo, descripcion, cantidad, tipo, precioUnit, imp_id, valorImpuesto, precio];
        resumenPagoAll[editing][2] = fp;
        resumenPagoAll[editing][5] = observacion;
        resumenPagoAll[editing][6] = monto;

        console.log(resumenPago);
        console.log(resumenPagoAll);
        

        updatePaymentsTable();
        updateTotals();

    });

    $(document).on("click", ".deleteArt", function (e) {

        var id = (this.id).split("-").pop();

        resumenPago.splice(id, 1);
        resumenPagoAll.splice(id, 1);

        console.log(resumenPago);
        console.log(resumenPagoAll);

        //Para evitar el problema de que el id no coincide con el indice por haber borrado uno antes, simplemente hay que recorrer el arreglo y reajustar el id con base en el indice, este problema igual puede pasar en cotizacion y factura
        

        updatePaymentsTable();
        updateTotals();

    });

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

            selectPopulate("#fp", "getFormasPagoByCtry", 0, 1, "", res.pais);
            selectPopulate("#fpEdit", "getFormasPagoByCtry", 0, 1, "", res.pais);


            searchFacturas();
        })

    });

    $("#contrato").on("change", searchFacturas);

    //Busca las facturas filtrando por cliente y contrato
    function searchFacturas() {

        var client = $("#Cliente").val();
        var contrato = $("#contrato").val();

        if (contrato != "" && client != "" && !isNaN(contrato) && !isNaN(client) && contrato > 0 && client > 0) {

            var data = {
                mode: "getFacturasAll",
                client: client,
                contrato: contrato
            }

            $.post(url, data, function(res) {   
                console.log(res);
                
                res = JSON.parse(res);
                console.log(res);
                
                $("#facturas").children().remove();
                var option = $("<option value='0'>Elige...</option>");
                $("#facturas").append(option);
        
                $(res).each(function () {
        
                    var option = $("<option value='" + this.id_fact + "'>" + this.id_fact + "</option>");
        
                    $("#facturas").append(option);
        
                });
            })


        }

    }

    // Busca la información sobre la factura 
    $(document).on("change", "#facturas", function (e) {
        
        idFactura = this.value;

        var data = {
            mode: "getFacturaInfo",
            id: idFactura
        }

        $.post(url, data, function(res) {
            console.log(res);
            
            res = JSON.parse(res);

            console.log(res);
            

            totalFacturado = res.totalFacturado;
            totalAbonado = res.totalAbonado;
            idCot = res.idCot;
            
            $("#facturado").val(parseMoney(totalFacturado));
            $("#Abonado").val(parseMoney(totalAbonado));
            
        })
    
    });

    //Guarda el recibo
    $(document).on("click", "#saveRecibo", function (e) {
    
        var pagoAprobado = $("#pagoAprobado").val();

        if (pagoAprobado != "" && !isNaN(pagoAprobado) && pagoAprobado
         > 0) {

            var aprobado = pagoAprobado == 1 ? 1 : 0;
            
            //Recorro para establecer si el pago fue aprobado o no
            $(resumenPagoAll).each(function() {
                this[7] = aprobado;
            });

            var data = {
                mode: "uploadRecibo",
                resumenPago: resumenPagoAll
            }

            $.post(url, data, function(res) {
                Swal.fire(
                    '¡Listo!',
                    "El recibo fue guardado con éxito.",
                    'success'
                )

                setTimeout(function() {
                    document.location = "./recibo_caja_conf.php?Lang=es&wph=33";
                }, 3000);
                
            });

        }
        else { 
            Swal.fire(
                'Error',
                "Elige si el pago fue aprobado o no.",
                'error'
            )
        }
    
    });

}