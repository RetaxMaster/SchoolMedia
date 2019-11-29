// JavaScript Document

// Receptor de datos de la lista de Paises
// esta es la funcion que manipula la respuesta que proporciona el servidor
function ctryProccessReceiver(idComponent) {
    fillSelectLst(ajaxResponse, idComponent, 3, 0, 2)
}

// Instance Select List Ctry
function selectCtryPopulate(idComponent, defaultIndex, defaultText) {
    const url = './ajax_ctry_rcvry.php?Lang='+globalLang+'&enbd=1&UID='+getCookie("UID")+'&USS='+getCookie("USS")+'';
    receiverFunction = "ctryProccessReceiver('" + idComponent + "')";
    startSelectLst (idComponent, defaultIndex, defaultText, url, receiverFunction);
}



// JavaScript Document

// Receptor de datos de la lista de Provincias
// esta es la funcion que manipula la respuesta que proporciona el servidor
function provProccessReceiver(idComponent) {
    fillSelectLst(ajaxResponse, idComponent, 3, 0, 2)
}

// Instance Select List Ctry
function selectProvPopulate(idComponent, defaultIndex, defaultText, ctryId) {
    const url = './ajax_prov_rcvry.php?Lang=' + globalLang + '&enbd=1&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + "&ctryID=" + ctryId + "&tReq=1" + '';
    receiverFunction = "provProccessReceiver('" + idComponent + "')";
    startSelectLst(idComponent, defaultIndex, defaultText, url, receiverFunction);
}

// Receptor de datos de la lista de codigos de Paises
// esta es la funcion que manipula la respuesta que proporciona el servidor
function codctryProccessReceiver(idComponent) {
    fillSelectLst(ajaxResponse, idComponent, 3, 0, 2)
}

// Instance Select List Ctry
function selectCodCtryPopulate(idComponent, ctryId) {
    const url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=1&UID=' + getCookie("UID") + '&USS=' + getCookie("USS")  + '';

    var data = {
        mode: "getCtryCode",
        ctryId: ctryId
    }

    $.post(url, data, function(res) {
        res = JSON.parse(res);
        var data = res.data;
        $(idComponent).children().remove();
        for (let i = 0; i < data.length; i++) {
            $(idComponent).append("<option value='" + data[i][0] + "'>" + data[i][2] + "</option>");   
        }
    });
}