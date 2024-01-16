<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    if (isset($_POST['tipo'])) {
        $type = ($_POST['tipo']);
        switch ($type) {
            case 'sunrise':
            case 'sunset':
                $url = "https://api.sunrise-sunset.org/json?lat=$latitude&lng=$longitude&formatted=0&date=today";
                $response = file_get_contents($url);
                $data = json_decode($response, true);

                if ($data['status'] == 'OK') {
                    $timezone = new DateTimeZone('America/Sao_Paulo');

                    $sunTimeUTC = new DateTime($data['results'][$type], new DateTimeZone('UTC'));
                    $sunTimeUTC->setTimezone($timezone);

                    $remainingTime = $sunTimeUTC->getTimestamp() - time();
                    $exactDatetime = $sunTimeUTC->format('d-m-Y H:i:s');
                    $requestDatetime = (new DateTime())->setTimezone($timezone)->format('d-m-Y H:i:s');

                    // Saída em uma tabela HTML
                    echo json_encode([
                        'type' => $type,
                        'latitude' => $latitude,
                        'longitude' => $longitude,
                        'remaining_time' => gmdate("H:i:s", $remainingTime),
                        'exact_datetime' => $exactDatetime,
                        'request_datetime' => $requestDatetime
                    ]);
                } else {
                    echo "Erro ao obter dados do nascer/pôr do sol.";
                }
                break;
            default:
                echo "Por favor, selecione o tipo (Pôr do Sol, Nascer do Sol ou Ambos ).";
                break;
        }
    } else {
        echo "Por favor, selecione o tipo (sunrise ou sunset).";
    }
} else {
    echo "Método não permitido.";
}
