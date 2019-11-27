jQuery(function ($) {

    // --------------------------------- GRAFICO 1 ---------------------------
    data = {
        datasets: [{
            data: [77, 23],
            backgroundColor: [
                "#fdc000",
                "#57af3e"
             ]
        }],    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Instalaciones 65%',
            'Por Instalar 35%'
        ]
    };

    options = {
        cutoutPercentage: 50,
        legend: {
            display: true,
            position: 'right'
        }
    };

    // For a pie chart 1
    var myPieChart = new Chart(myChart1, {
        type: 'pie',
        data: data,
        options: options
    }); 
    
    // ---------------------------------- GRAFICO 2 --------------------------
    data = {
        datasets: [{
            data: [77, 23],
            backgroundColor: [
                "#fdc000",
                "#57af3e"
             ]
        }],    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Instalaciones 65%',
            'Por Instalar 35%'
        ]
    };
    
    // For a pie chart 1
    var myPieChart = new Chart(myChart2, {
        type: 'pie',
        data: data,
        options: options
    }); 
  
});