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

require_once( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\oauth' . DIRECTORY_SEPARATOR . 'bootstrap.php' );
DI::make( 'oauth2_server' );
$server = ;
$server->setConfig( 'issuer', cghhhbhjdj::getIssuer(  ) );
$server->handleUserInfoRequest( $request, $response );
Log::debug( 'oauth/userinfo', array( 'request' => array( 'headers' => $request->server->getHeaders(  ), 'request' => $request->request->all(  ), 'query' => $request->query->all(  ) ), 'response' => array( 'body' => $response->getContent(  ) ) ) );
$response->send(  );
?>
