// JavaScript Document

// Paquetes de idiomas para Data Table:
// https://datatables.net/plug-ins/i18n/#Translations

LangLabels = [
    "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    "https://cdn.datatables.net/plug-ins/1.10.20/i18n/English.json",
    "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese.json",
    "https:////cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
];


//////////////////////////////////////////////////////////////////////////
///// FUNCIONES DE CONTROLES GENERALES DE SECCIONES Y ETIQUETAS HTML /////
//////////////////////////////////////////////////////////////////////////
function hideComponents(visibilityA, elementsArry) {
 // Funcion que oculta o hace visible componentes
 // visibilityA: none or block
     elementsArry.forEach(
         function(element) {
            document.getElementById(element).style.display = visibilityA;
        }
    );
}

// Cambia todas la etiquetas HTML y los componentes requeridos (array de textos) en la lista de componentes proporcionados
function setInnerHTML(txtArry,tagsArry,elementsArry) {
    i=0;
    elementsArry.forEach(
        function(element) {
            patternStr=document.getElementById(element).innerHTML; // Se toma el nodo completo
            // alert(patternStr);
            document.getElementById(element).innerHTML=patternStr.replace(tagsArry[i],txtArry[i]); // se reemplaza el tag por el valor
            i++;
        }
    )
}

// Append a HTML section and add in to the end
function appendDivInnerHTML(idToAppend,elementsArry) {
    elementsArry.forEach(
        function(element) {
            document.getElementById(idToAppend).innerHTML +=element
            // $(idToAppend).append(element); 
        }
    )
} 

// Fully Clear the DIv Inside HTMl Section
function fullyClearDivInnerHTML (idToClear) {
    $(''+idToClear+' div').empty(); //clears all the childs, but leaves the master intact
}

// Cambia todas la etiquetas HTML y los componentes requeridos (array de textos) en la lista de componentes proporcionados
function setInnerAttrs(txtArry,tagsArry,elementsArry) {
    i=0;
    elementsArry.forEach(
        function(element) {
            document.getElementById(element).setAttribute(tagsArry[i], txtArry[i]);
             i++;
        }
    )
}

//////////////////////////////////////////////////////////////////////////
///// FUNCIONES DE CONTROLES GENERALES DE COMUNICACICONES AJAX ////// /////
//////////////////////////////////////////////////////////////////////////

// Se define cual sera la funcion y sus parametros que ejecutara la comunicacion con el servidor
function startAjaxTx(receiverTrigger,parametersLst,methodUsed,receiverPage) {
    ajaxResponse=null;
    ajaxConex(receiverTrigger,'['+parametersLst+']',methodUsed,receiverPage);
}

function ajaxConex(receiverTrigger,parametersLst,methodUsed,receiverPage) {
	// constructor del conector request XML 
	var request = new XMLHttpRequest();

    // Evento que se activa en la conexion cuando se tiene un cambio de estado, 
    // puede ser el envio de la recuperacion de la data recibida o el cambio del estad para indicar TimeOut de conexion, 
    // ambos se Capturaran y se manejaran segun el siguiente IF
	request.onreadystatechange = function () {
		if (this.readyState == this.DONE && this.status == 200) {
			if (this.status == 200) {
                if (this.responseText != null && this.responseText.trim() != "") {
                    // Se deserializa la data en vectores de objetos
                    ajaxResponse = deserializedJSON (this.responseText);
 				}else{
					ajaxResponse = [" Err: 0x001"]; // 001 no data Recovery
				}
			}else{
				ajaxResponse = [" Err: 0x002"]; // Problemas de comunicacion con el servidor
            }
            eval(receiverTrigger);
            // esta es la funcion que se encargara de activarse una vez se reciba una respuesta del servidor
		}else if (this.readyState == this.DONE){
            switch (this.status) {
                case 404:
                    ajaxResponse = [" Err: 0x003"]; // 003 no se encuentra el archivo de peticion
                    break;
                case 500:
                    ajaxResponse = [" Err: 0x004"]; // 004 Internal Server Error
                    break;
               default: 
                    ajaxResponse = [" UnKErr: 0x005"]; // 005 Error desconocido
            }
            eval(receiverTrigger);
        }
    }
    
    // Se abre la conexion (no se envia) con de metodo GET/POS el archivo JSON
    // Pagina que recibe la solicitud, opera y responde con los resulatdos correspondientes
	request.open(methodUsed, receiverPage);

	// Se envie la solicitud de Servidor
	request.send();
}

// Se lee la cantidad de elementos que tiene el objeto pasado
Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

// Funcion de deserializacion de JSon y conversion a Array
function deserializedJSON (jsonData) {
    // Se crea una variable todoArry que contendra todo el vector de Objetos por componentes
    var todoArry = new Array();
    // Se crea una variable key generica que recuperara de manera automatica el nombre del objeto
    var key;
	// En el objeto de Ajax se recupero que no viene vacio ni nulo
	// se deserializa el jSON a traves del objeto embebido JSON
	var jsonArry = JSON.parse(jsonData);
	// se verifica que el nuevo objeto deserializado (array de objetos) sea nulo
	if (Object.size(jsonArry) == 0) {
		consolo.log("el objeto est� vacio");
		return;
    }
    // Se extrae objeto por objeto y se va construyendo el nuevo arreglo de objetos recibido
    for (key in jsonArry) {
        todoArry.push(jsonArry[key]);
    }
	return todoArry; // Se devuelve el array deserializado
}

//////////////////////////////////////////////////////////////////////////
/////////////// FUNCIONES DE CONTROLES GENERALES Y COOKIES ///////////////
//////////////////////////////////////////////////////////////////////////

function ENCRYPT_DECRYPT(Str_Message) { 
    //Function : encrypt/decrypt a string message v.1.0  without a known key 
    //Author   : Aitor Solozabal Merino (spain) 
    //Email    : aitor-3@euskalnet.net 
    //Date     : 01-04-2005 
        Len_Str_Message=Str_Message.length; 
        Str_Encrypted_Message=""; 
        for (Position = 0;Position<Len_Str_Message;Position++){ 
            // long code of the function to explain the algoritm 
            //this function can be tailored by the programmer modifyng the formula 
            //to calculate the key to use for every character in the string. 
            Key_To_Use = ((Len_Str_Message+Position)+1); // (+5 or *3 or ^2) 
            //after that we need a module division because cant be greater than 255 
           // $Key_To_Use = $KeyWord;
            Key_To_Use = (255+Key_To_Use) % 255; 
            Byte_To_Be_Encrypted = Str_Message.substr(Position, 1); 
            Ascii_Num_Byte_To_Encrypt = Byte_To_Be_Encrypted.charCodeAt(0); // ord(Byte_To_Be_Encrypted); 
            Xored_Byte = Ascii_Num_Byte_To_Encrypt ^ Key_To_Use;  //xor operation 
            Encrypted_Byte = String.fromCharCode(Xored_Byte); 
            Str_Encrypted_Message += Encrypted_Byte; 
            
            //short code of  the function once explained 
            //$str_encrypted_message .= chr((ord(substr($str_message, $position, 1))) ^ ((255+(($len_str_message+$position)+1)) % 255)); 
        } 
        return Str_Encrypted_Message;
    } //end function 
    
// Funcion para recuperar Cookies segun sus nombre desde JavaScript
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
              var c = ca[i];
              while (c.charAt(0) == ' ') {
                c = c.substring(1);
              }
              if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
              }
            }
            return "";
          }
        
          
    function setCookie(cname) {
        document.cookie = cname; // +';'+expires+';'+cpath+''
      }

//////////////////////////////////////////////////////////////////////////
/////////////// FUNCIONES DE CONTROLES DE FORMULARIOS //// ///////////////
//////////////////////////////////////////////////////////////////////////

//////////////////////////// T A B L A S /////////////////////////////////  
function setTableLabels(tableName,LangLabels,autoPopulate,ajaxRequest, callback = "") {
    //Función para la tabla'#tablaVerTodos'
        if (autoPopulate) {
       // $('#tablaVerTodos').DataTable();
            $(tableName).dataTable({
                //ordering: false, me elimina el ordenamiento y la funcion de ordenar al darle clicl a los encabezados
                "processing": true,
                "ajax": {
                    "url": ajaxRequest,
                    "dataFilter": function (res) {
                        //Filtro la data que responde el servidor si se pasa un callback, dicho callback debe retornar la estructura de la nueva data
                        res = JSON.parse(res);
                        if (typeof callback == "function") res.data = callback(res);
                        return JSON.stringify(res);
                    }
                }, // Sedeine la funcion Ajax que servira de fuente de datos de la tabla
                "order": [[ 0, "asc" ]], // Se predefinie ordenar la tabla en base a la columna 0, id 
                "language": { // se cargan todos los labels en funcion al idioma seleccionado
                    "url": LangLabels,
                    "oPaginate": { //  se hace override de los botones de adelante y atras
                        "sPrevious": "<i class='fas fa-arrow-alt-circle-left'></i>",
                        "sNext":     "<i class='fas fa-arrow-alt-circle-right'></i>",
                    }
                }
         });
        }else{ // la tabla no lleva ningunos datos autorecuperados
            $(tableName).dataTable({
                "order": [[ 0, "asc" ]], // Se predefinie ordenar la tabla en base a la columna 0, id 
                "processing": true, // habilita para que se despliege el mensaje de procesando mientras realiza busquedas
                "language": { // se cargan todos los labels en funcion al idioma seleccionado
                    "url": LangLabels,
                    "oPaginate": { //  se hace override de los botones de adelante y atras
                        "sPrevious": "<i class='fas fa-arrow-alt-circle-left'></i>",
                        "sNext":     "<i class='fas fa-arrow-alt-circle-right'></i>",
                    }
                }
            });
        };
    }

function updateTableLabels(tableName, LangLabels, ajaxRequest, data, callback = "") {
    $(tableName).DataTable().destroy();
    $(tableName).dataTable({
        "processing": true,
        "ajax": {
            "url": ajaxRequest,
            "type": "POST",
            "data": data,
            "dataFilter": function(res) {
                //Filtro la data que responde el servidor si se pasa un callback, dicho callback debe retornar la estructura de la nueva data
                res = JSON.parse(res);
                if (typeof callback == "function") res.data = callback(res);
                return JSON.stringify(res);
            }
        }, // Sedeine la funcion Ajax que servira de fuente de datos de la tabla
        "order": [[ 0, "asc" ]], // Se predefinie ordenar la tabla en base a la columna 0, id 
        "language": { // se cargan todos los labels en funcion al idioma seleccionado
            "url": LangLabels,
            "oPaginate": { //  se hace override de los botones de adelante y atras
                "sPrevious": "<i class='fas fa-arrow-alt-circle-left'></i>",
                "sNext":     "<i class='fas fa-arrow-alt-circle-right'></i>",
            }
        }
    });
}

function formatDataTable(res, tableIndexs) {

    var data = res.data;
    var newData = [];

    //Recorro cada fila que trajo res.data
    for (const key in data) {
        var row = [];

        //Recorro tableIndexs para guardar dentro de row los valores de res.data que me interesan
        for (let i = 0; i < tableIndexs.length; i++) {
            var dataKeyPosition = tableIndexs[i];
            row[i] = data[key][dataKeyPosition]
        }

        //Dentro del arreglo newData voy formando el res.data que será retornado
        newData[key] = row;
    }

    return newData;
}

//////////////////////////// S E L E C T /////////////////////////////////  
function startSelectLst (idComponent, defaultIndex, defaultText, url, receiverFunction){
    let dropdown = $(idComponent); // Constructor del dropdown Component
    dropdown.empty(); // Se limpa cualquier valor del listado    
    dropdown.append('<option selected="true" disabled>'+defaultText+'</option>');
    dropdown.prop('selectedIndex', defaultIndex); // Default selected index 
    startAjaxTx(receiverFunction,"","GET",url);
}

function fillSelectLst(dataArry,componentLst,indice0,indice1,indice2) {
    // indice0=3;
    for ($i=0;$i<dataArry[3].length;$i++){
        $(componentLst).append($('<option></option>').attr('value', dataArry[indice0][$i][indice1]).text(dataArry[indice0][$i][indice2]));
    }
}


//////////////////////////////////////////////////////////////////////////
/////////////// OTRAS FUNCIONES //// ///////////////
//////////////////////////////////////////////////////////////////////////

//Rellena un select, el id se refiere al indice del Id de la respuesta y el value se refiere al indice del valor de la respuesta, por ejemplo: ["1", "V.I.P"], id sería 0 y value sería 1
function selectPopulate(idComponent, mode, id, value, field = "") {
    const url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=1&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';

    var data = {
        mode: mode,
        field: field
    }

    $.post(url, data, function (res) {
        res = JSON.parse(res);
        console.log(res);
        console.log(idComponent);
        
        
        var data = res.data;
        $(idComponent).children().remove();
        for (let i = 0; i < data.length; i++) {
            $(idComponent).append("<option value='" + data[i][id] + "'>" + data[i][value] + "</option>");
        }
    });
}

      // Set Country List Select component
/* Populate dropdown with list of provinces
$.getJSON(url, function (data) {
  $.each(data, function (key, entry) {
    dropdown.append($('<option></option>').attr('value', entry.abbreviation).text(entry.name));
  })
});*/


    /* 
                    "sProcessing":   labelsArry[0], // "Buscando...",
                //"sLengthMenu":   "Listing MENU records",
                "sZeroRecords":  labelsArry[1], // "No hay resultados para su búsqueda",
                "sInfo":         labelsArry[2], // "Mostrando desde START hasta END de un total de TOTAL registros",
                "sInfoEmpty":    labelsArry[3], // "No hay registros que mostrar",
                "sInfoFiltered": labelsArry[4], // "(buscado en un total de MAX registros)",
                "sInfoPostFix":  labelsArry[5], // "",
                "sSearch":       labelsArry[6], // "Buscar:",
                "sUrl":          labelsArry[7], // "",
                "oPaginate": {
                    "sFirst":    labelsArry[8], // "Primero",
                    "sPrevious": labelsArry[9], // "<i class='fas fa-arrow-alt-circle-left'></i>",
                    "sNext":     labelsArry[10], // "<i class='fas fa-arrow-alt-circle-right'></i>",
                    "sLast":     labelsArry[11] // "Último"
                  }
              }
       /*(document.getElementById("lb_un").style.display == 'none') ? 'block' :
       if (document.getElementById("allday").checked) {
           document.getElementById("horaInicTime").value="08:00"; // ahora el horario es de 8am a 7pm
           document.getElementById("horaFinTime").value="18:59";
           document.getElementById("horaInicTime").disabled=true;
           document.getElementById("horaFinTime").disabled=true;
       }else{
           document.getElementById("horaInicTime").value="";
           document.getElementById("horaFinTime").value="";
           document.getElementById("horaInicTime").disabled=false;
           document.getElementById("horaFinTime").disabled=false;
       }*/

