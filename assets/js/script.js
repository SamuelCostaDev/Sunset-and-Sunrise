function chamarApiService() {
    var latitude = document.getElementById('latitude').value;
    var longitude = document.getElementById('longitude').value;

    // Obtém o valor do radio selecionado
    var tipoCheckbox = document.querySelector('input[name="tipo"]:checked');
    var tipo = tipoCheckbox ? tipoCheckbox.value : null;

    $.ajax({
        url: '../../src/Api/apiService.php',
        type: 'post',
        data: { latitude: latitude, longitude: longitude, tipo: tipo },
        success: function(response) {
            // Converte a resposta JSON para um objeto JavaScript
            var responseData = JSON.parse(response);
            if (responseData.type === "sunset") {
                responseData.type = "Pôr do sol";
            }else {
                responseData.type = "Nascer do sol";
            }
            // Cria tabelas HTML
            var tableHtml = '<table class="table" border="1">';
            tableHtml = '<table class="table" border="1">';
            tableHtml += '<thead><tr><th scope="col">Inputs</th><th>Output</th></tr></thead>';
            tableHtml += '<tr><td>Type:</td><td>' + responseData.type + '</td></tr>';
            tableHtml += "<tr><td>Latitude:</td><td>" + responseData.latitude + "</td></tr>";
            tableHtml += "<tr><td>Longitude:</td><td>" + responseData.longitude + "</td></tr>";
            tableHtml += "<tr><td>Tempo restante:</td><td>" + responseData.remaining_time + "</td></tr>";
            tableHtml += "<tr><td>Data e hora aproximada:</td><td>" + responseData.exact_datetime + "</td></tr>";
            tableHtml += "<tr><td>Data e hora da solicitação:</td><td>" + responseData.request_datetime + "</td></tr>";
            tableHtml += "</table>";

            // Insire as tabelas no documento
            $('.table-responsive').html(tableHtml);
        },
        error: function(error) {
            console.error(error);
        }
    });
}
