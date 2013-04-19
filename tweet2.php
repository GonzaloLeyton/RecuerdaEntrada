<?php
// Requiere la libreria de twitter y las llaves (tokens)
include_once 'Twitter.php';
include_once 'keys2.php';
// Crear una nueva instancia
$twitter = new Twitter($consumerKey, $consumerSecretKey);
// Setear tokens
$twitter->setOAuthToken($oAuthToken);
$twitter->setOAuthTokenSecret($oAuthTokenSecret);
// Verificar credenciales
$twitter->accountVerifyCredentials();
// Mensaje
$mensaje1 = "#YoEscuchoALosTenores";
$mensaje2 = "Tios Regálenme la camiseta!!! #YoEscuchoALosTenores ";
$mensaje3 = "#YoEscuchoALosTenores #YoEscuchoALosTenores #YoEscuchoALosTenores #YoEscuchoALosTenores";
$mensaje4 = "Trovador cánteme un gol del Bulla!! #YoEscuchoALosTenores";
$mensaje5 = "Vamos la U! #YoEscuchoALosTenores ";
$mensaje6 = "VAMOS LOS LEONES!! #YoEscuchoALosTenores";
$mensaje7 = "Aguante BULLA #YoEscuchoALosTenores";

$rando = rand(0,6);
$cola = substr(md5(time() * rand()),0,2);


if($rando == 0 )
    $mensaje = $mensaje1." ".$cola;
else if($rando == 1 )
    $mensaje = $mensaje2." ".$cola;
else if($rando == 2 )
    $mensaje = $mensaje3." ".$cola;
else if($rando == 3 )
    $mensaje = $mensaje4." ".$cola;
else if($rando == 4 )
    $mensaje = $mensaje5." ".$cola;
else if($rando == 5 )
    $mensaje = $mensaje6." ".$cola;
else if($rando == 6 )
    $mensaje = $mensaje7." ".$cola;

$twitter->statusesUpdate($mensaje);


echo $rando;
echo $mensaje;
?>
