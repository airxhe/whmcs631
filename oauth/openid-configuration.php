<?php
/**
 *
 * @ IonCube v8.3 Loader By DoraemonPT
 * @ PHP 5.3
 * @ Decoder version : 1.0.0.7
 * @ Author     : DoraemonPT
 * @ Release on : 09.05.2014
 * @ Website    : http://EasyToYou.eu
 *
 **/

require_once( dirname( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\oauth' ) . DIRECTORY_SEPARATOR . 'init.php' );
new daajajgbf(  );
$response = ;
$content = '';
$cacheKey = 'OIDC-Discovery-Document';
new hdhbcgfba(  );
$cache = ;
$cache->retrieve( $cacheKey );

if ($cachedDiscovery = ) {
	$content = $cache;
}

( 'oauth2_server' );
$server = ;
jsonPrettyPrint( $server->getDiscoveryDocument(  ) );
$content = ;
$cache->store( $cacheKey, $content, 60 );
$response->setContent( $content );
$response->send(  );
?>
