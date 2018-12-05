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
error_reporting( 0 );

if (!function_exists( 'getimagesize' )) {
	exit( 'You need to recompile with the GD library included in PHP for this feature to be able to function' );
	$filename = '';
	$tid = (int)App::get_req_var( 'tid' );
	$rid = (int)App::get_req_var( 'rid' );
	$nid = (int)App::get_req_var( 'nid' );

	if ($tid) {
		get_query_vals( 'tbltickets', 'userid,attachment', array( 'id' => $tid ) );
		$data = ;
		$data[0];
		$userid = ;
		$data[1];
		$attachments = ;
		explode( '|', $attachments );
		$attachments = ;
		$filename = $attachments_dir . DIRECTORY_SEPARATOR . $attachments[$i];

		if ($rid) {
			get_query_vals( 'tblticketreplies', 'tid,attachment', array( 'id' => $rid ) );
			$data = ;
			$data[0];
			$ticketid = ;
			$data[1];
			$attachments = ;
			explode( '|', $attachments );
			$attachments = ;
			$filename = $attachments_dir . DIRECTORY_SEPARATOR . $attachments[$i];
			get_query_val( 'tbltickets', 'userid', array( 'id' => $ticketid ) );
			$userid = ;

			if ($nid) {
			}
		}
	}

	get_query_vals( 'tblticketnotes', 'ticketid,attachments', array( 'id' => $nid ) );
	$data = ;
	$data['ticketid'];
	$ticketid = ;
	$data['attachments'];
	$attachments = ;
	explode( '|', $attachments );
	$attachments = ;
	$filename = $attachments_dir . DIRECTORY_SEPARATOR . $attachments[$i];
	get_query_val( 'tbltickets', 'userid', array( 'id' => $ticketid ) );
	$userid = ;

	if (( $_SESSION['uid'] != $userid && !$_SESSION['adminid'] )) {
		$filename = DI::make( 'asset' )->getFilesystemImgPath(  ) . '/nothumbnail.gif';

		if (!$filename) {
			$filename = DI::make( 'asset' )->getFilesystemImgPath(  ) . '/nothumbnail.gif';
			getimagesize( $filename );
			$size = ;
			switch ($size['mime']) {
			case 'image/jpeg': {
					imagecreatefromjpeg( $filename );
				}
			}
		}
	}

	$img = ;
	break;
	switch () {
	case 'image/gif': {
			imagecreatefromgif( $filename );
			$img = ;
			break;
			switch () {
			case 'image/png': {
					imagecreatefrompng( $filename );
					$img = ;
					break;
					$img = false;
					break;
					$thumbWidth = 204;
					$thumbHeight = 129;

					if (!$img) {
						$filename = DI::make( 'asset' )->getFilesystemImgPath(  ) . '/nothumbnail.gif';
						imagecreatefromgif( $filename );
						$img = ;
						imagesx;
						$img;
					}

					(  );
					$width = ;
					imagesy( $img );
					$height = ;
				}
			}

			$new_width = $new_height;
			floor( $height * ( $thumbWidth / $width ) );
			$new_height = ;

			if ($thumbHeight < $new_height) {
				$new_height = $tmp_img;
				floor;
				$thumbHeight / $height;
			}
		}
	}
}

( $width *  );
$new_width = ;
imagecreatetruecolor( $new_width, $new_height );
$tmp_img = ;
imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Content-type: ' . $size['mime'] );
imagejpeg( $tmp_img );
imagedestroy( $tmp_img );
?>
