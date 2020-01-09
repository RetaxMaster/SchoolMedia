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


    var listaProductos = [];
    var listaImpuestos = {};
    var subtotal = 0;
    var total = 0;

    // Relleno los datos del cliente
    $("#Cliente").on("change", function (e) {
    
        var cliente = this.value;

        getDataOfThisRecord(cliente, "getClientData", {
            idCliente: 0,
            ruc: 2,
            telefonoCliente: 8,
            direccion: 3,
            country: 4,
            Provincia: 5,
        });
    
    });

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
                    <div class="products" data-codigo="${this[1]}" data-descrip="${this[2]}" data-cant="${this[3]}" data-precio="${this[7]}" data-impuesto="${this[6]}">
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

        var imp_id = this.dataset.impuesto;
        var codigo = this.dataset.codigo;
        var descripcion = this.dataset.descrip;
        var cantidad = this.dataset.cant;
        var precio = this.dataset.precio;

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

            updateImpuestos();

            //Hacemos los cálculos y los insertamos

            var valorImpuesto = res[2];
            precio = precio * cantidad;

            var precioConImpuestos = (parseFloat(precio) + ((precio * valorImpuesto) / 100)).toFixed(2);

            subtotal += precio;
            total += parseFloat(precioConImpuestos);

            //Es la posicion dentro del arreglo de la lista de productos, como aun no se ha insetado, con obtner el largo del arreglo podemos determinar la posicion que ocupará
            var positionInArray = listaProductos.length;

            var row = [codigo, descripcion, cantidad, precio, valorImpuesto, precioConImpuestos, '<a href="#" id="e-' + positionInArray + '" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles" class="loadGallery"><i class="far fa-newspaper"></i></a>'];

            listaProductos.push(row);
            
            //Creo la datatable
            $("#tablaVerTodos").DataTable().destroy();
            $("#tablaVerTodos").dataTable({
                "data": listaProductos,
                "order": [[ 0, "asc" ]], // Se predefinie ordenar la tabla en base a la columna 0, id 
                "language": { // se cargan todos los labels en funcion al idioma seleccionado
                    "url": LangLabels,
                    "oPaginate": { //  se hace override de los botones de adelante y atras
                        "sPrevious": "<i class='fas fa-arrow-alt-circle-left'></i>",
                        "sNext":     "<i class='fas fa-arrow-alt-circle-right'></i>",
                    }
                }
            });
            
            updatePrecio();
        })
        
    
    });

    //Establece el precio en los respectivos campos
    function updatePrecio() {
        console.log(total);
        console.log(subtotal);
        
        $("#Total").val(total);
        $("#Subtotal").val(subtotal);
    }

    //Establece la lista de los impuestos
    function updateImpuestos() {
        $("#lista-impuestos").children().remove();

        $.each(listaImpuestos, function (index, item) {
        
            var td = $(`
            <tr>
                <td>${item[3]}</td>
                <td>${item[2]}</td>
                <td></td>
                <td></td>
            </tr>
            `);

            $("#lista-impuestos").append(td);

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

    //Limpia el formulario
    $(document).on("click", "#idBtnLimpiar", function (e) {
        resetDefaultForm();
    });

    //Envía el formulario
    $("#idFormDetalles").on("submit", function (e) {
        e.preventDefault();

        var inputs = $("#idFormDetalles .required");

        if (validateInputs(inputs)) {

            var formData = new FormData(this);
            formData.append("mode", "uploadCentOpInfo");

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
                    resetDefaultForm();
                    //Actualizo la DataTable
                    $("#tablaVerTodos").DataTable().destroy();
                    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_cotizacion_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '', function (res) {
                        return formatDataTable(res, tableIndexs, juntar, pushToTheEnd);
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