<?php
// Requiere la libreria de twitter y las llaves (tokens)
include_once 'Twitter.php';
include_once 'keys.php';
// Crear una nueva instancia
$twitter = new Twitter($consumerKey, $consumerSecretKey);
// Setear tokens
$twitter->setOAuthToken($oAuthToken);
$twitter->setOAuthTokenSecret($oAuthTokenSecret);
// Verificar credenciales
$twitter->accountVerifyCredentials();
// Mensaje
$mensaje = "Shhhhh!";


$url = 'http://search.twitter.com/search.json?q=pinera&lang=es';
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, 'Mi Aplicacion de Twitter');
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_COOKIESESSION, false);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$json = json_decode(curl_exec($ch),true);
curl_close($ch);
$total = sizeof($json['results']);


//for($i=0;$i<$total;$i++){
for($i=0;$i<1;$i++){
    $valor = rand(1,4);
        if($valor == 1 || $valor == 2 || $valor == 3){
            try{
                    $twitter->statusesUpdate('@'.$json['results'][$i]['from_user'].' Shhhhhhh!',$json['results'][$i]['id']);
            }catch(Exception $e){
                    echo '{NO ENVIADO: '.$e.'}';
            }
        }
        else{
            try{
                    $twitter->statusesUpdate('@'.$json['results'][$i]['from_user'].' Soy tu Presidente de la República... Shhhhhhh!',$json['results'][$i]['id']);
            }catch(Exception $e){
                    echo '{NO ENVIADO: '.$e.'}';
            }
        }
}

//$twitter->statusesUpdate($mensaje);
//echo $mensaje;
?>