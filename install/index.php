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

$location = pathinfo( $_SERVER['PHP_SELF'], PATHINFO_DIRNAME ) . '/install.php';
header(  . 'Location: ' . $location );
exit(  );
?>
