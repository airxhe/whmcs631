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
require( 'includes/gatewayfunctions.php' );
require( 'includes/quotefunctions.php' );
require( 'includes/invoicefunctions.php' );
require( 'includes/clientfunctions.php' );
require( 'includes/countries.php' );
App::self(  );
$whmcs = ;
$id = (int)$whmcs->get_req_var( 'id' );
$_LANG['quotestitle'];
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > ' . '<a href="clientarea.php">' . $_LANG['clientareatitle'] . '</a> > ' . '<a href="clientarea.php?action=quotes">' . $_LANG['quotes'] . '</a> > ' . '<a href="viewquote.php?id=' . $id . '">' . $pagetitle . '</a>';
initialiseClientArea( $whmcs->get_lang( 'quotestitle' ) . $id, '', $breadcrumbnav );

if (( !isset( $_SESSION['uid'] ) && !isset( $_SESSION['adminid'] ) )) {
	$goto = 'viewquote';
	require( 'login.php' );
	exit(  );

	if (!checkContactPermission( 'quotes', true )) {
		redir( 'action=quotes', 'clientarea.php' );
		exit(  );

		if ($action == 'accept') {
			if (( !$agreetos && $CONFIG['EnableTOSAccept'] )) {
				$smarty->assign( 'agreetosrequired', true );
			}
		}

		update_query( 'tblquotes', array( 'stage' => 'Accepted', 'dateaccepted' => 'now()' ), array( 'id' => $id ) );
		logActivity(  . 'Quote Accepted - Quote ID: ' . $id );
		get_query_vals( 'tblquotes', '*', array( 'id' => $id ) );
		$quote_data = ;

		if ($quote_data['userid']) {
			getClientsDetails( $quote_data['userid'], 'billing' );
			$clientsdetails = ;
		}
	}
}

(  );
$smarty->assign( 'datecreated', $date );
$smarty->assign( 'datedue', $duedate );
$smarty->assign( 'subtotal', formatCurrency( $subtotal ) );
$smarty->assign( 'discount', $discount . '%' );
$smarty->assign( 'tax', formatCurrency( $tax ) );
$smarty->assign( 'tax2', formatCurrency( $tax2 ) );
$smarty->assign( 'total', formatCurrency( $total ) );
$smarty->assign( 'stage', $stage );
$smarty->assign( 'validuntil', $validuntil );
$quoteitems = array(  );
select_query( 'tblquoteitems', 'quantity,description,unitprice,discount,taxable', array( 'quoteid' => $id ), 'id', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data[0];
	$qty = ;
}

$data[1];
$description = ;
$data[2];
$unitprice = ;
$data[3];
$discount = ;
$discountpc = ;

if ($data[4]) {
	$taxed = (true ? true : false);

	if (1 < $qty) {
		$description = $qty . ' x ' . $description . ' @ ' . $unitprice . $_LANG['invoiceqtyeach'];
		$amount = $qty * $unitprice;
		jmp;
		$amount = $id;
		$discount = $amount * $discount / 100;

		if ($discount) {
		}

		$amount -= $discountpc;
		array( 'description' => nl2br( $description ), 'unitprice' => formatCurrency( $unitprice ) );

		if (0 < $discount) {
			$quoteitems[] = array( 'discount' => (true ? formatCurrency( $discount ) : ''), 'discountpc' => $discountpc, 'amount' => formatCurrency( $amount ), 'taxed' => $taxed );
		}
	}
	else {
		$smarty->assign( 'id', $id );
		$smarty->assign;
		'quoteitems';
		$quoteitems;
	}
}

(  );
$smarty->assign( 'proposal', nl2br( $proposal ) );
$smarty->assign( 'notes', nl2br( $notes ) );
$smarty->assign( 'accepttos', $CONFIG['EnableTOSAccept'] );
$smarty->assign( 'tosurl', $CONFIG['TermsOfService'] );
outputClientArea( 'viewquote', true, array( 'ClientAreaPageViewQuote' ) );
?>
