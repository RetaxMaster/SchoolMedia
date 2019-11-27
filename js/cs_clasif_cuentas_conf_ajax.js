// JavaScript Document

// Se ejecuta cuando la pagina carga o se reestablece
function onPageStart() {
    setInnerHTML(global_txtObj["txts"], global_txtObj["attrsx"], global_txtObj["components_ids"]); // se fijan textos
    // setInnerAttrs(global_hintsObj["txts"], global_hintsObj["attrsx"], global_hintsObj["components_ids"]) // fija atributos
    switch (globalLang) {
        case "es":
            LangLabelsURL=LangLabels[0];
            break;
        case "en":
            LangLabelsURL=LangLabels[1];
            break;
        case "pt":
            LangLabelsURL=LangLabels[2];
            break;
        case "gh":
            LangLabelsURL=LangLabels[3];
            break;
     }
    setTableLabels('#tablaVerTodos', LangLabelsURL, true, './ajax_clasif_cuentas_rcvry.php?Lang='+globalLang+'&UID='+getCookie("UID")+'&USS='+getCookie("USS")+''); // Se fijan los labels estandars de las tablas y sus busquedas
}
