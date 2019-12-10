$(document).ready(function(){

    //Realiza la búsqueda al escribir
    $("input.search-clientes").on("keyup", function () {
        
        var query = this.value;
        var optionContainer = $(this).parent().children(".results");
        console.log(optionContainer);
        

        console.log(query);
        

        var data = {
            mode: "filterClients",
            query: query
        }

        var url = './ajax_requests_rcvry.php?Lang=' + globalLang + '&enbd=2&UID=' + getCookie("UID") + '&USS=' + getCookie("USS") + '';

        $.post(url, data, function(res) {
            res = JSON.parse(res);
            var data = res.data;

            $(optionContainer).children().remove();

            for (const key in data) {

                var cliente = data[key];
                var id = cliente[0];
                var nombre = cliente[1];

                var option = $("<div class='dropdown-item' data-id='" + id + "'>" + nombre + "</div>");
                $(optionContainer).append(option);

            }
            
        });

    });

    //Establece el valor del select
    $(document).on("click", ".dropdown-item", function () {
    
        var id = this.dataset.id;
        var name = $(this).text();
        var padre = $(this).parent().parent().parent();

        $(padre).children(".dropdown-value").val(id);
        $(padre).children(".btn").text(name);
        $("input.search-clientes").val("");
        $(".results").children().remove();

    
    });

});