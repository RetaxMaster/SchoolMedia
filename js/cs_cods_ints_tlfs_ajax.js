// JavaScript Document

// Receptor de datos de la lista de Paises
// esta es la funcion que manipula la respuesta que proporciona el servidor
function phoneProccessReceiver() {
    fillSelectLst(ajaxResponse,"#selectCtry",3,0,2)
}

// Instance Select List Ctry
function selectPhonePopulate(idComponent, defaultIndex, defaultText) {
    const url = './ajax_cods_ints_tlfs_rcvry.php?Lang='+globalLang+'&UID='+getCookie("UID")+'&USS='+getCookie("USS")+'';
    receiverFunction="phoneProccessReceiver()";
    startSelectLst (idComponent, defaultIndex, defaultText, url, receiverFunction);
}
