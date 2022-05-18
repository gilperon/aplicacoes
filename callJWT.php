<?php


//Criamos o JWT Token
function createToken(){ 

    //Chave secreta para gerar o JWT -> É aconselhavel usar uma string forte tipo um sha256 (minimum size of 256 bit key)
    $chave_api = "634c4fc187238c4b3e3f037a08c3ec0efcd3ca450bbc27a6188b5db4e477c74d";

    // Define o token header
    $header = json_encode([ 'typ' => 'JWT', 'alg' => 'HS256' ]);

        // Define token payload (JSON string)
        $payload = json_encode([
            'sub' => 555, //ID do usuario 
            'uname' => 'Gustavo Company', //Nome do usuario 
            'iss' => 'www.gustavo.com', // Emissor
            'iat' => time(), // Issued at ->  hora de geracao do token
            'exp' => time()+ 60 * 60 * 8, // Expire -> valido por 8 horas
            'key' => strtoupper(uniqid()) //String aleatória
        ]);
                 
    // Codifica Header to Base64Url String
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    // Codifica Payload to Base64Url String
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    // Cria Signature Hash
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $chave_api, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    // Create JWT
    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

    return $jwt;

}


//Verificamos o JWT Token
function verifyToken($token){ 

    //Chave secreta para o JWT 
    $chave_api = "634c4fc187238c4b3e3f037a08c3ec0efcd3ca450bbc27a6188b5db4e477c74d";

    // Define o token header
    $header = json_encode([ 'typ' => 'JWT', 'alg' => 'HS256' ]);

    //2 = Verifica Token -> Passou o token entao decodifica o JWT para gerar um novo, com nossa chave_api
    $payload_decodificada = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))),true);
    $payload = json_encode( $payload_decodificada );

    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $chave_api, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

    return $jwt;


}


?>