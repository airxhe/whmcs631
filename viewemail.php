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

define( 'CLIENTAREA', true );
require( 'init.php' );
App::self(  );
$whmcs = ;
$emailId = (int)$whmcs->get_req_var( 'id' );
new chchehhjfc(  );
$ca = ;
$ca->setPageTitle( Lang::trans( 'clientareaemails' ) );
$ca->addToBreadCrumb( 'index.php', $whmcs->get_lang( 'globalsystemname' ) );
$ca->addToBreadCrumb( 'viewemail.php?id=' . (int)$emailId . '#', Lang::trans( 'clientareaemails' ) );
$ca->initPage(  );
$ca->requireLogin(  );
checkContactPermission( 'emails' );
select_query( 'tblemails', '', array( 'id' => $emailId, 'userid' => $ca->getUserID(  ) ) );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['date'];
$date = ;
$data['subject'];
$subject = ;
$data['message'];
$message = ;
fromMySQLDate( $date, true, true );
$date = ;
$ca->assign( 'date', dfdidhdbdc::makeSafeForOutput( $date ) );
$ca->assign( 'subject', dfdidhdbdc::makeSafeForOutput( $subject ) );
dfdidhdbdc::maskEmailVerificationId( $message );
$message = ;
$ca->assign( 'message', $message );
$ca->setTemplate( 'viewemail' );
$ca->disableHeaderFooterOutput(  );
$ca->addOutputHookFunction( 'ClientAreaPageViewEmail' );
$ca->output(  );
?>
