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

require( '../init.php' );

if (!function_exists( 'imagecreatefrompng' )) {
	exit( 'You need to recompile with the GD library included in PHP for this feature to be able to function' );
	generateNewCaptchaCode(  );
	$rand = ;
	imagecreatefrompng( '../assets/img/verify.png' );
	$image = ;
	imagecolorallocate( $image, 0, 0, 0 );
	$textColor = ;
	imagestring;
	$image;
	5;
}

( 28, 4, $rand, $textColor );
header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' );
header( 'Content-type: image/png' );
imagepng( $image );
imagedestroy( $image );
?>
