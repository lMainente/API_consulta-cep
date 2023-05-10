<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header ("Access-Control-Allow-Credentials: true ");
header("Access-Control-Allow-Headers: Content-Type");
// header("Access-Control-Allow-Methods: POST"); 

if (isset($_GET['cep'])) {
    $cep = preg_replace("/[^0-9]/", "", $_GET['cep']);
    if (!empty($cep)) {
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $endereco = json_decode(file_get_contents($url));
        echo json_encode($endereco);
    } else {
        echo json_encode(null);
    }
} else {
    echo json_encode(null);
}

?>
