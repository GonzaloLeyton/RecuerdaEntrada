<?php
/*
	Codigo desarrollado por Chevi ( http://chevismo.com )
	Twitter: @Chevi_
	BOT para seguir a tus seguidores. Articulo en http://blog.chevismo.com/2011/07/bots-de-twitter-parte-2/
	Si utilizas este codigo en tu web, por favor deja un link hacia el articulo.
*/
include('Twitter.php');
$response = array();
// -------------------------------------- //
// 				CONFIGURACION			  //
	// Rellena bien las siguientes variables:
	define('TWITTER_ID',1093250384);  // Entra en http://chevismo.com/twitterid
	$twitter = new Twitter('rTGwV87xoNjpm0isRW2mZw', 'hub84Jrib4IRxBCEHvxFX52hWEHCMwgsWXmTO8Q');	// Disponible en dev.twitter.com Creando una App
	$twitter->setOAuthToken('1093250384-6lHPc7r72ZvDseNRUwS8rWa2YrrvvqXhMMcd6Pi');		// En My Access Token
	$twitter->setOAuthTokenSecret('i9bPTTrMrVOo2TUiF00XuRplFGocAfHGP6KrJ6FQ'); // En My Access Token
	// A continuacion escribe la palabra/s que el BOT buscara para responder:
	$palabra = 'piñera';
	// El User Agent no es demasiado importante, pon lo que quieras
	$userAgent = 'SexyPiñi bot';
	// Que quieres que tu bot diga a los usuarios?
	// El BOT dira una de las siguientes frases al azar cada vez
	$response[] = ' Shhhhh!';
	$response[] = ' Soy tu Presidente de la Republica... Shhhhhh!';
	//$response[] = 'Claro que si! Chevismo mola :)';
// --------------------------------------- //
// --------------------------------------- //
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_URL,'http://search.twitter.com/search.json?q='.$palabra.'&lang=es');
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_COOKIESESSION, false);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$json = json_decode(curl_exec($ch),true);
curl_close($ch);
$total = sizeof($json['results']);
$responses = sizeof($response);
for($i=0;$i<1;$i++){
 	try{
		$tweet = '@'.$json['results'][$i]['from_user'].$response[rand(0,$responses)];
 		$twitter->statusesUpdate($tweet,$json['results'][$i]['id']);
		echo 'Enviado '.$tweet.'<br />';
	}catch(Exception $e){
		echo '{NO ENVIADO: '.$e.'}';
	}
}