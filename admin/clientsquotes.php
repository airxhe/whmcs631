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
new dgeegejige( 'Manage Quotes' );
$aInt = ;
$aInt->requiredFiles( array( 'clientfunctions', 'invoicefunctions' ) );
$aInt->setClientsProfilePresets(  );
$aInt->valUserID( $whmcs->get_req_var( 'userid' ) );
$userId = ;
$aInt->assertClientBoundary( $userid );

if ($delete == 'true') {
	check_token( 'WHMCS.admin.default' );
	checkPermission( 'Manage Quotes' );
	$quoteId = (int)$whmcs->get_req_var( 'quoteid' );
	ccbjgfhb::find( $userId )->quotes->find( $quoteId );
	$quote = ;

	if ($quote) {
		$quote->delete(  );
		logActivity( (  . 'Deleted Quote (ID: ' . $quote->id . ' - User ID: ' . $userId . ')' ) );
		redir(  . 'userid=' . $userId );
		ob_start(  );
		$aInt->deleteJSConfirm( 'doDelete', 'quotes', 'deletesure', '?userid=' . $userid . '&delete=true&quoteid=' );
		echo '
<div class="context-btn-container">
    <button type="button" class="btn btn-primary" onClick="window.location=\'quotes.php?action=manage&userid=';
		echo $userid;
		echo '\'">
        <i class="fa fa-plus"></i>
        ';
		echo $aInt->lang( 'quotes', 'createnew' );
		echo '    </button>
</div>

';
		getCurrency( $userid );
		$currency = ;
		$aInt->sortableTableInit( 'id', 'DESC' );
		select_query( 'tblquotes', 'COUNT(*)', array( 'userid' => $userid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$numrows = ;
		select_query( 'tblquotes', '', array( 'userid' => $userid ), $orderby, $order, $page * $limit . ( (  . ',' ) . $limit ) );
		$result = ;
		mysql_fetch_assoc( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['subject'];
			$subject = ;
			$data['validuntil'];
			$validuntil = ;
			$data['datecreated'];
			$datecreated = ;
			$aInt->lang( 'status', str_replace( ' ', '', strtolower( $data['stage'] ) ) );
			$stage = ;
			$data['total'];
			$total = ;
			fromMySQLDate( $validuntil );
			$validuntil = ;
			fromMySQLDate( $datecreated );
			$datecreated = ;
			formatCurrency( $total );
			$total = ;

			while (true) {
				$tabledata[] = array(  . '<a href="quotes.php?action=manage&id=' . $id . '">' . $id . '</a>', $subject, $datecreated, $validuntil, $total, $stage,  . '<a href="quotes.php?action=manage&id=' . $id . '"><img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '"></a>',  . '<a href="#" onClick="doDelete(\'' . $id . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
			}
		}
	}
}

echo $aInt->sortableTable( array( array( 'id', $aInt->lang( 'quotes', 'quotenum' ) ), array( 'subject', $aInt->lang( 'quotes', 'subject' ) ), array( 'datecreated', $aInt->lang( 'quotes', 'createdate' ) ), array( 'validuntil', $aInt->lang( 'quotes', 'validuntil' ) ), array( 'total', $aInt->lang( 'fields', 'total' ) ), array( 'stage', $aInt->lang( 'quotes', 'stage' ) ), '', '' ), $tabledata );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
