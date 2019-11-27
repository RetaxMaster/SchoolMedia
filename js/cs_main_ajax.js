// JavaScript Document

// Limpia los valores de un formulario
function clearFrom() {
    setInnerAttrs(["","",""],["value","value","value"],["username","passwd","usernameRcvryPasswd"]);
}

// For a pie chart
function pieChartInstance(chartName, chartType, chartData, chartOptions) {
    var myPieChart = new Chart(chartName, {
    type: ''+chartType+'',
    data: chartData,
    options: chartOptions
    })
}; 


// Se ejecuta cuando la pagina carga o se reestablece
function onPageStart() {
    pieChartInstance('myChart1', 'pie', data1, options); // Crea la primera grafica
    pieChartInstance('myChart2', 'pie', data2, options); // Crea la segunda grafica
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
    setTableLabels('#tablaVerTodos1', LangLabelsURL, false, ''); // Se fijan los labels estandars de las tablas y sus busquedas
    setTableLabels('#tablaVerTodos2', LangLabelsURL, false, ''); // Se fijan los labels estandars de las tablas y sus busquedas
    appendDivInnerHTML("ctry1",elementsArry);
    appendDivInnerHTML("ctry2",elementsArry);
}
