<?php
require 'vendor/autoload.php';

use DeviceDetector\Parser\Bot as BotParser;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

/**
 * Analisa a string do User-Agent para determinar se é um bot conhecido.
 * @param string $userAgent O User-Agent a ser analisado.
 * @return array Um array contendo [booleano é_bot, string output_mensagem].
 */
function scanBotsDeviceDetector($userAgent) { 
    // Criação da instância do parser de bot
    $botParser = new BotParser();
    $botParser->setUserAgent($userAgent);
    
    // Parse do user-agent
    $result = $botParser->parse();
    
    if (!is_null($result)) {
        // Concatena as informações do bot em uma string
        $output = 'Nome: ' . $result['name'] . ", Categoria: " . $result['category'] . ", URL: " . $result['url'];
        
        // Verifica se há mais informações no array 'producer' e as concatena
        if (!empty($result['producer'])) {
            $producerDetails = [];
            foreach ($result['producer'] as $key => $value) {
                $producerDetails[] = ucfirst($key) . ": " . $value;
            }
            $output .= ", Produtor: " . implode(", ", $producerDetails);
        }
        
        // Retorna true e o output
        return [true, $output];
    }
    
    // Se não for um bot, retorna false e uma mensagem de saída
    return [false, "Bot NÃO detectado. O User-Agent parece ser de um navegador comum."];
}

// --- Roteamento da API ---

$method = $_SERVER['REQUEST_METHOD'] ?? '';

if ($method === 'POST') {
    
    // O User-Agent é lido diretamente do cabeçalho da requisição feita pelo frontend.
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

    if (empty($userAgent)) {
         http_response_code(400);
         echo json_encode(['success' => false, 'error' => 'User-Agent não detectado. Por favor, utilize um navegador moderno.']);
         exit;
    }

    // Chama a função de detecção
    list($isBot, $output) = scanBotsDeviceDetector($userAgent);
    
    $result = [
        'success' => true,
        'is_bot' => $isBot,
        'message' => $output,
        'user_agent_tested' => $userAgent
    ];

    echo json_encode($result);
    
} elseif ($method === 'OPTIONS') {
    http_response_code(200);
    exit();
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Método não permitido.']);
}
?>
