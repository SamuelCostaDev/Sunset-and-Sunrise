<?php

use PHPUnit\Framework\TestCase;

class testApiService extends TestCase
{
    public function testRequisicaoPost()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['latitude'] = '10.123';
        $_POST['longitude'] = '20.456';
        $_POST['tipo'] = 'sunrise';

        // Suprimir a saída para evitar interferências no PHPUnit
        ob_start();

        // Inclua o código que chama o seu arquivo aqui
        require_once '/xampp/htdocs/Teste/src/Api/apiService.php';

        // Capturar a saída do buffer
        $output = ob_get_clean();

        // Adapte conforme necessário para verificar se a saída é a esperada
        $expectedOutput = json_encode([
            'type' => 'sunrise',
            'latitude' => '10.123',
            'longitude' => '20.456',
            // Adicione outras verificações conforme necessário
        ]);

        $this->expectOutputString($expectedOutput);
        $this->assertEquals($expectedOutput, $output);
    }
}
