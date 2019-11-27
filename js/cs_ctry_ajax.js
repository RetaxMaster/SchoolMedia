// JavaScript Document

// Receptor de datos de la lista de Paises
// esta es la funcion que manipula la respuesta que proporciona el servidor
function ctryProccessReceiver() {
    fillSelectLst(ajaxResponse,"#selectCtry",3,0,2)
}

// Instance Select List Ctry
function selectCtryPopulate(idComponent, defaultIndex, defaultText) {
    const url = './ajax_ctry_rcvry.php?Lang='+globalLang+'&enbd=1&UID='+getCookie("UID")+'&USS='+getCookie("USS")+'';
    receiverFunction="ctryProccessReceiver()";
    startSelectLst (idComponent, defaultIndex, defaultText, url, receiverFunction);
}
