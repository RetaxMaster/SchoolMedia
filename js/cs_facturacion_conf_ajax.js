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

    //Rellena usuarios
    selectPopulate("#iduser", "getUsers", 0, 1);

    //Rellena el impuestos
    selectPopulate("#imp", "getImp", 0, 3);

    var listaProductos = [];
    var listaProductosAllInfo = [];
    var listaImpuestos = {};
    var listaComisiones = [];
    var listaComisionesAllInfo = [];
    var editing = null;
    var sumaImpuestoDeLinea = 0;
    var saved = false;
    var idFactura;

    // Pone todos los datos en su lugar
    function putAllData(allData) {
        allData = JSON.parse(allData);
    
        //Los datos del cliente, condiciones de pago y los inputs de resumen de costos los podemos poner automaticamente con base en sus indices (Con excepción del botón)
        var datosCliente = allData.datosCliente;
        var condicionesPago = allData.condicionesPago;
        var resumenInputs = allData.resumenInputs;
    
        for (const key in datosCliente)
            $("#" + key).val(datosCliente[key]);
    
        for (const key in condicionesPago)
            $("#" + key).val(condicionesPago[key]);
    
        for (const key in resumenInputs)
            $("#" + key).val(resumenInputs[key]);
    
        $("#ClienteDD").text(datosCliente.ClienteDD);
    
        //Para las demás simplemente asigno valores y llamo a las funciones que actualizan las tablas
        listaProductos = allData.detallesFacturacion.listaProductos;
        listaProductosAllInfo = allData.detallesFacturacion.listaProductosAllInfo;
        listaImpuestos = allData.resumenImpuestos.listaImpuestos;
        listaComisiones = allData.resumenComisiones.listaComisiones;
        listaComisionesAllInfo = allData.resumenComisiones.listaComisionesAllInfo;
    
        updatePrecio();
        updateImpuestos();
        updateComisiones();
    }

    //Obtiene los datos por medio del id_cot
    function getDataByIdCot(id) {

        var url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';
        
        var data = {
            mode: "getCotizacionById",
            id: id
        }

        $.post(url, data, function(res) {
            console.log(res);
            
            putAllData(res);
        })

    }

    var allData = $("#data").val();
    var id_cot_input = $("#id_cot").val();

    if(allData == "" && id_cot_input != "")
        allData = getDataByIdCot(id_cot_input);
    else
        putAllData(allData);

    //Busca articulos
    $(document).on("keyup", "#SearchArticle", function () {
    
        var query = this.value;

        var url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';

        var data = {
            mode: "searchProducts",
            query: query
        }

        $.post(url, data, function(res) {
            var res = JSON.parse(res);
            
            $(".all-products").children().remove();
            
            //Cuando solo hay un registro, por alguna razón no lo trae como array bidimensional así que lo fuerzo
            if (typeof res[0] != "object") {
                res = [res];
            }

            $(res).each(function() {

                if (this[0] != null) {
                    var producto = $(
                    `
                    <div class="products" data-prodid="${this[0]}" data-tipo="${this[4]}" data-codigo="${this[1]}" data-descrip="${this[2]}" data-cant="${this[3]}" data-precio="${this[5]}" data-impuesto="${this[6]}">
                        <span>${this[2]}</span>
                    </div>`);
    
                    $(".all-products").append(producto);
                }
                
            });

        })
    
    });

    //Agrega productos
    $(document).on("click", ".products", function(){

        //Primero obtengo el impuesto
        var url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';

        var prodId = this.dataset.prodid;
        var imp_id = this.dataset.impuesto;
        var codigo = this.dataset.codigo;
        var descripcion = this.dataset.descrip;
        var cantidad = this.dataset.cant;
        var tipo = this.dataset.tipo;
        var precioUnit = this.dataset.precio;

        var data = {
            mode: "getImpuesto",
            imp_id: imp_id
        }

        $.post(url, data, function(res) {

            res = JSON.parse(res);
            res = res.data[0]; //Contiene la inormación del impuesto

            // Creamos la lista de impuestos

            var key = "imp-" + res[0];

            if (!listaImpuestos.hasOwnProperty(key)) {
                listaImpuestos[key] = res;
            }

            //Hacemos los cálculos y los insertamos

            var valorImpuesto = res[2];
            var precio = precioUnit * cantidad;

            var precioConImpuestos = (parseFloat(precio) + ((precio * valorImpuesto) / 100)).toFixed(2);

            //Es la posicion dentro del arreglo de la lista de productos, como aun no se ha insetado, con obtner el largo del arreglo podemos determinar la posicion que ocupará
            var positionInArray = listaProductos.length;

            var row = [codigo, descripcion, cantidad, precioUnit, valorImpuesto, precio, precioConImpuestos, '<a href="#" id="e-' + positionInArray + '" data-toggle="modal" data-target="#ModalEdit" data-placement="top" title="Ver detalles" class="editData"><i class="far fa-newspaper"></i></a> <a id="d-' + positionInArray + '" data-placement="top" title="Ver detalles" class="deleteArt" style="color: #ec3d3d; cursor: pointer"><i class="fas fa-times"></i></a>'];

            var rowAllInfo = [prodId, codigo, descripcion, cantidad, tipo, precioUnit, imp_id, valorImpuesto, precio];

            listaProductos.push(row);
            listaProductosAllInfo.push(rowAllInfo);
            
            updatePrecio();
            updateImpuestos();
        })
        
    
    });

    //Edita un producto
    $(document).on("click", ".editData", function(e){
    
        var id = (this.id).split("-").pop();
        editing = id;
        
        var info = listaProductos[id];
        var cantidad = info[2];
        var precioUnit = info[3];

        $("#editCant").val(cantidad);
        $("#editPrecio").val(precioUnit);
    
    });

    $(document).on("click", "#saveEdit", function(e){
    
        var cantidad = $("#editCant").val();
        var precioUnit = $("#editPrecio").val();
        var info = listaProductos[editing];


        //Hacemos los cálculos y los insertamos

        var valorImpuesto = info[4];
        var precio = precioUnit * cantidad;

        var precioConImpuestos = (parseFloat(precio) + ((precio * valorImpuesto) / 100)).toFixed(2);

        listaProductos[editing][2] = cantidad;
        listaProductos[editing][3] = precioUnit;
        listaProductos[editing][5] = precio;
        listaProductos[editing][6] = precioConImpuestos;

        // Igual se ponen en e arreglo que tiene la información para la DB
        // [prodId, codigo, descripcion, cantidad, tipo, precioUnit, imp_id, valorImpuesto, precio];
        listaProductosAllInfo[editing][4] = cantidad;
        listaProductosAllInfo[editing][6] = precioUnit;
        listaProductosAllInfo[editing][9] = precio;

        updatePrecio();
        updateImpuestos();
    
    });

    $(document).on("click", ".deleteArt", function(e){
    
        var id = (this.id).split("-").pop();

        listaProductos.splice(id, 1);
        listaProductosAllInfo.splice(id, 1);

        updatePrecio();
        updateImpuestos();
    
    });

    $(document).on("click", "#saveCom", function(e){
    
        var usuario = $("#iduser").val();
        var imp = $("#imp").val();

        var data = {
            mode: "getUserImpData",
            usuario: usuario,
            imp: imp
        }

        var url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';

        $.post(url, data, function(res) {

            res = JSON.parse(res);

            var subtotal = $("#Subtotal").val();

            var monto = (subtotal * res.valorporc) / 100;
             
            var row = [res.usuario, res.nombreimp, res.valorporc, monto];
            var rowAllInfo = [usuario, imp, res.valorporc, monto];

            listaComisiones.push(row);
            listaComisionesAllInfo.push(rowAllInfo);

            console.log(listaComisiones);
            

            updateComisiones();
        })
    
    });

    //Establece el precio en los respectivos campos
    function updatePrecio() {

        //Creo la datatable
        $("#tablaVerTodos").DataTable().destroy();
        $("#tablaVerTodos").dataTable({
            "data": listaProductos,
            "order": [[0, "asc"]], // Se predefinie ordenar la tabla en base a la columna 0, id 
            "language": { // se cargan todos los labels en funcion al idioma seleccionado
                "url": LangLabels,
                "oPaginate": { //  se hace override de los botones de adelante y atras
                    "sPrevious": "<i class='fas fa-arrow-alt-circle-left'></i>",
                    "sNext": "<i class='fas fa-arrow-alt-circle-right'></i>",
                }
            }
        });

        //Calculo el total y subtotal

        var subtotal = 0;
        var total = 0;

        $(listaProductos).each(function() {
            subtotal += parseFloat(this[2] * this[3]);
            total += parseFloat(this[6]);
        });

        $(listaComisiones).each(function () {
            var monto = (subtotal * this[2]) / 100;
            this[3] = monto;
        });

        $(listaComisionesAllInfo).each(function () {
            var monto = (subtotal * this[2]) / 100;
            this[3] = monto;
        });

        updateComisiones();
        
        $("#Total").val(total);
        $("#Subtotal").val(subtotal);
    }

    //Establece la lista de los impuestos
    function updateImpuestos() {
        $("#lista-impuestos").children().remove();
        sumaImpuestoDeLinea = 0;

        $.each(listaImpuestos, function (index, item) {

            var valorImp = item[2];

            //Busco los productos con este impuesto

            //[codigo, descripcion, cantidad, precioUnit, valorImpuesto, precio, precioConImpuestos]
            
            var productosConEsteImpuesto = listaProductos.filter(function(producto) {
                return producto[4] == valorImp;
            });

            var bimpo = 0;
            var impuLinea = 0;

            $(productosConEsteImpuesto).each(function() {
                bimpo += parseFloat(this[5]);
                impuLinea += (this[5] * this[4]) / 100;
            });

            sumaImpuestoDeLinea += impuLinea;
            
            var td = $(`
            <tr>
                <td>${item[3]}</td>
                <td>${item[2]}</td>
                <td>${bimpo}</td>
                <td>${impuLinea}</td>
            </tr>
            `);

            $("#lista-impuestos").append(td);

        });
        
    }

    function updateComisiones() {

        $("#allComisiones").children().remove();

        $(listaComisiones).each(function () {
            
            var td = $(`
            <tr>
                <td>${this[0]}</td>
                <td>${this[1]}</td>
                <td>${this[2]}</td>
                <td>${this[3]}</td>
            </tr>
            `);
    
            $("#allComisiones").append(td);
        });
    }

    //Se rellenan los slecets de paises y provincias
    selectCtryPopulate('#country', 0, 'Seleccione Pais');
    selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', 168);

    //Se detecta el evento de cambio de país para rellenar el select de provincia
    $("#country").on("change", function () {
        selectProvPopulate('#Provincia', 0, 'Seleccione Provincia', this.value);
        selectCodCtryPopulate("#CodPais1", this.value);
    });

    //Rellena el idplan
    selectPopulate("#id_cap", "getCaps", 0, 1);
    selectPopulate("#contrato", "getcttos", 0, 1);

    //Limpia el formulario
    $(document).on("click", "#idBtnLimpiar", function (e) {
        resetDefaultForm();
    });

    //Hace la factura
    $(document).on("click", "#Facturar", function(e){
    
        if (saved) {
            
            //Actualizamos el campo de la base de datos

            var url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';

            var data2 = {
                mode: "updateFacturaStatus2",
                id: idFactura
            }

            $.post(url, data2, function (res) {
                console.log(res);
            });
            
        }
        else {
            Swal.fire(
                'Un momento',
                "No has guardado esta factura, si no la guardas no podemos continuar",
                'warning'
            )
        }
    
    });

    //Envía el formulario
    $(document).on("click", "#Cotizar", function (e) {

        console.log();
        

        var form = $("#idFormCreacion").get(0);

        //Recojo los valores de headers
        
        $("#idFormCreacion input[disabled], #idFormCreacion select[disabled], #idFormCreacion textarea[disabled]").prop("disabled", false);

        var formHeaders = new FormData(form);
        var rs = $("#ClienteDD").text();
        var Prefactura = $("#Prefactura").val();
        var ppagoCC = $("#ppagoCC").val();
        var dias = $("#dias").val();
        var total = $("#Total").val();
        var subtotal = $("#Subtotal").val();
        var obs = $("#observacion").val();
        var ctto = $("#contrato").val();

        formHeaders.append("mode", "uploadCafactHeaders");
        formHeaders.append("rs", rs);
        formHeaders.append("Prefactura", Prefactura);
        formHeaders.append("ppagoCC", ppagoCC);
        formHeaders.append("dias", dias);
        formHeaders.append("allProducts", JSON.stringify(listaProductosAllInfo));
        formHeaders.append("allComisiones", JSON.stringify(listaComisionesAllInfo));
        formHeaders.append("sumaImpuestoDeLinea", sumaImpuestoDeLinea);
        formHeaders.append("total", total);
        formHeaders.append("subtotal", subtotal);
        formHeaders.append("obs", obs);
        formHeaders.append("ctto", ctto);
        formHeaders.append("id_cot", allData.idFactura);
        
        $("#idFormCreacion input, #idFormCreacion select, #idFormCreacion textarea").prop("disabled", true);
        
        //Inserto los datos mediante Ajax
        $.ajax({
            url: './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '',
            type: "post",
            data: formHeaders,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                console.log("Enviando...");
            },
            success: function (res) {
                
                console.log(res);
                
                saved = true;
                idFactura = res;

                $("#Cotizar").hide();
                $("#addComision").hide();
                $(".editData").hide();
                $(".deleteArt").hide();

                Swal.fire(
                    '¡Listo!',
                    "Cotización guardada",
                    'success'
                )

            },
            error: function (e) {
                console.log(e);
            }
        });
    
    });

}