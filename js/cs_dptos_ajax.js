// JavaScript Document

// Receptor de datos de la lista de Departamentos
// esta es la funcion que manipula la respuesta que proporciona el servidor
function dptosProccessReceiver() {
    fillSelectLst(ajaxResponse,"#selectCtry",3,0,1) // select de departamentos
}

// Instance Select List Ctry
function selecDptosPopulate(idComponent, defaultIndex, defaultText) {
    const url = './ajax_dptos_rcvry.php?Lang='+globalLang+'&UID='+getCookie("UID")+'&USS='+getCookie("USS")+'';
    receiverFunction="dptosProccessReceiver()";
    startSelectLst (idComponent, defaultIndex, defaultText, url, receiverFunction);
}
