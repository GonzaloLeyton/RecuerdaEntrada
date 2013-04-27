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
//$twitter->searchTweets("@recuerdaentrada", null, null, null, null, '1');
$lastTweet = file_get_contents("http://api.twitter.com/1/statuses/user_timeline.json?screen_name=recuerdaentrada&count=1");
$data = json_decode($lastTweet);
$texto = $data[0]->text; 
$texto = utf8_decode($texto);
echo $texto;

$mensaje1 = "Recuerda llevar tu entrada al concierto! #RecuerdaTuEntrada";
$mensaje2 = "Lleva en tu teléfono siempre una fotografía de tu entrada, ojalá por ambos lados. Te puede salvar la vida! #RecuerdaTuEntrada";
$mensaje3 = "¿Se acerca tu concierto favorito? Recuerda llevar tu entrada el día del evento #RecuerdaTuEntrada";
$mensaje4 = "Que no te pase lo que me pasó a mi: LLEVA TU ENTRADA AL CONCIERTO  #RecuerdaTuEntrada";
$mensaje5 = "Billetera, llaves, teléfono Y LA ENTRADA! #RecuerdaTuEntrada";
$mensaje6 = "¿Ya vas saliendo a tu concierto favorito? ¿Te falta algo? TE FALTA LA ENTRADA! #RecuerdaTuEntrada";
$mensaje7 = "Ya no queda nada para tu concierto, recuerda tu entrada! #RecuerdaTuEntrada";
$mensaje8 = "¿Te recomendaban llevar una capa de agua? Mejor que recomienden llevar tu entrada #RecuerdaTuEntrada";
$mensaje9 = "Recuerda tu entrada! #RecuerdaTuEntrada";
$mensaje10 = "A mi se me quedó mi entrada en la casa. QUE NO TE PASE LO MISMO! #RecuerdaTuEntrada";
$mensaje11 = "¿Llevas tu entrada? #RecuerdaTuEntrada";
$mensaje12 = "No sea gil, lleve su entrada al concierto #RecuerdaTuEntrada";


if($texto == utf8_decode($mensaje1)){
    $i = 1;
}
else if($texto == utf8_decode($mensaje2)){
    $i = 2;
}
else if($texto == utf8_decode($mensaje3)){
    $i = 3;
}
else if($texto == utf8_decode($mensaje4)){
    $i = 4;
}
else if($texto == utf8_decode($mensaje5)){
    $i = 5;
}
else if($texto == utf8_decode($mensaje6)){
    $i = 6;
}
else if($texto == utf8_decode($mensaje7)){
    $i = 7;
}
else if($texto == utf8_decode($mensaje8)){
    $i = 8;
}
else if($texto == utf8_decode($mensaje9)){
    $i = 9;
}
else if($texto == utf8_decode($mensaje10)){
    $i = 10;
}
else if($texto == utf8_decode($mensaje11)){
    $i = 11;
}
else if($texto == utf8_decode($mensaje12)){
    $i = 0;
}

//$i=5;

//$rando = rand(0,5);
$cola = substr(md5(time() * rand()),0,1);

switch ($i){
    case 0:
        $mensaje = $mensaje1;
        break;
    case 1:
        $mensaje = $mensaje2;
        break;
    case 2:
        $mensaje = $mensaje3;
        break;
    case 3:
        $mensaje = $mensaje4;
        break;
    case 4:
        $mensaje = $mensaje5;
        break;
    case 5:
        $mensaje = $mensaje6;
        break;
    case 6:
        $mensaje = $mensaje7;
        break;
    case 7:
        $mensaje = $mensaje8;
        break;
    case 8:
        $mensaje = $mensaje9;
        break;
    case 9:
        $mensaje = $mensaje10;
        break;
    case 10:
        $mensaje = $mensaje11;
        break;
    case 11:
        $mensaje = $mensaje12;
        break;
}

//if($rando == 0 )
//    $mensaje = $mensaje1;
//else if($rando == 1 )
//    $mensaje = $mensaje2;
//else if($rando == 2 )
//    $mensaje = $mensaje3;
//else if($rando == 3 )
//    $mensaje = $mensaje4;
//else if($rando == 4 )
//    $mensaje = $mensaje5;
//else if($rando == 5 )
//    $mensaje = $mensaje6;

//$mensajefinal = $mensaje." [".$cola."]";
//$twitter->statusesUpdate($mensajefinal);

$twitter->statusesUpdate($mensaje);

echo $rando." -- ".$mensaje." -- ".$i;
?>
