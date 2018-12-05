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

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'View Email Message Log', false );
$aInt = ;
$aInt->setClientsProfilePresets(  );
iciahfajh::getInstance(  );
$whmcs = ;
$whmcs->get_req_var( 'userid' );
$userid = ;
$whmcs->get_req_var( 'messageID' );
$messageID = ;
cebaiefhhg::find( $messageID );
$emailTemplate = ;
$id = (int)$whmcs->get_req_var( 'id' );
$aInt->assertClientBoundary( $userid );

if ($displaymessage == 'true') {
	$aInt->title = $aInt->lang( 'emails', 'viewemail' );
	select_query( 'tblemails', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['date'];
	$date = ;

	if (is_null( $data['to'] )) {
		(true ? $aInt->lang( 'emails', 'registeredemail' ) : $data['to']);
	}

	$to = ;
}

$data['cc'];
$cc = ;
$data['bcc'];
$bcc = ;
$data['subject'];
$subject = ;
$data['message'];
$message = ;
$content = '<p><b>' . $aInt->lang( 'emails', 'to' ) . ':</b> ' . dfdidhdbdc::makeSafeForOutput( $to ) . '<br />';

if ($cc) {
	$content .= '<b>' . $aInt->lang( 'emails', 'cc' ) . ':</b> ' . dfdidhdbdc::makeSafeForOutput( $cc ) . '<br />';

	if ($bcc) {
		$content .= '<b>' . $aInt->lang( 'emails', 'bcc' ) . ':</b> ' . dfdidhdbdc::makeSafeForOutput( $bcc ) . '<br />';
		$content .= '<b>' . $aInt->lang( 'emails', 'subject' ) . ':</b> <span id="subject">' . dfdidhdbdc::makeSafeForOutput( $subject ) . '</span></p>
    ' . $message;
		$aInt->title = $aInt->lang( 'emails', 'viewemailmessage' );
		$aInt->content = $content;
		$aInt->displayPopUp(  );
		exit(  );

		if (( $action == 'send' && $messageID == 0 )) {
			redir(  . 'type=' . $type . '&id=' . $id, 'sendmessage.php' );

			if ($action == 'delete') {
				check_token( 'WHMCS.admin.default' );
				delete_query( 'tblemails', array( 'id' => $id, 'userid' => $userid ) );
				redir(  . 'userid=' . $userid );
				$aInt->valUserID( $userid );
				ob_start(  );
				$jscode = '';

				if ($action == 'send') {
					check_token( 'WHMCS.admin.default' );
					sendMessage;
					$emailTemplate;
				}
			}

			( $id, '', true );
			$result = ;
			$queryStr = 'userid=' . $userid;

			if ($result === true) {
				$queryStr .= '&success=1';
			}
		}
	}
}

$queryStr .= '&error=1';
jmp;

if (0 < strlen( $result )) {
	$queryStr .= '&error=1';
	eaaadiagec::set( 'EmailError', $result );
	$whmcs->getApplicationConfig(  );
	$whmcsConfig = ;
	$whmcsConfig['smtp_debug'];
	$smtp_debug = ;

	if ($smtp_debug) {
		eaaadiagec::set( 'SMTPDebug', base64_encode( ob_get_contents(  ) ) );
		$debug = ;
		redir( $queryStr );
		$aInt->deleteJSConfirm( 'doDelete', 'emails', 'suredelete', 'clientsemails.php?userid=' . $userid . '&action=delete&id=' );
		base64_decode( eaaadiagec::getAndDelete( 'SMTPDebug' ) );
		$debug = ;

		if ($debug) {
			echo $debug;
			$whmcs->get_req_var( 'success' );
			$success = ;
			$whmcs->get_req_var( 'error' );
			$error = ;

			if ($success) {
				infoBox;
				$aInt->lang;
				'global';
			}
		}
	}


	while (true) {
		( ( 'success' ), $aInt->lang( 'email', 'sentSuccessfully' ), 'success' );
		jmp;

		if ($error) {
			eaaadiagec::get( 'EmailError' );
			$result = ;
			eaaadiagec::delete( 'EmailError' );

			if ($result) {
				infoBox;
				$aInt->lang( 'global', 'erroroccurred' );
				$result;
			}
		}

		( 'error' );
		break;
	}

	$aInt->sortableTable;
	array( array( 'date', $aInt->lang( 'fields', 'date' ) ), array( 'subject', $aInt->lang( 'emails', 'subject' ) ), '', '' );
}

echo ( , $tabledata );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
