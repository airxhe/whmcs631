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
if ($action == 'add') = ;

if (( $addCredit && 0 < $amountOut )) {
	$validationError = true;
	$validationErrorDescription[] = $aInt->lang( 'transactions', 'amountOutCannotBeUsedWithAddCredit' ) . PHP_EOL;

	if (( $addCredit && $invoiceID )) {
		$validationError = true;
		$validationErrorDescription[] = $aInt->lang( 'transactions', 'invoiceIDAndCreditInvalid' ) . PHP_EOL;

		if (( $transactionID && !isUniqueTransactionID( $transactionID, $paymentMethod ) )) {
			$validationError = true;
			$validationErrorDescription[] = $aInt->lang( 'transactions', 'requireUniqueTransaction' ) . PHP_EOL;

			if ($validationError) {
				dfabehjiaj::set( 'ValidationError', array( 'invoiceid' => $invoiceID, 'transid' => $transactionID, 'amountin' => $amountIn, 'fees' => $fees, 'paymentmethod' => $paymentMethod, 'date' => $date, 'amountout' => $amountOut, 'description' => $description, 'addcredit' => $addCredit, 'validationError' => $validationErrorDescription ) );
				redir( array( 'userid' => $userID, 'error' => 'validation', 'action' => 'add' ) );

				if ($invoiceID) {
					get_query_val( 'tblinvoices', 'userid', array( 'id' => $invoiceID ) );
					$transactionUserID = ;

					if (!$transactionUserID) {
						redir( 'error=invalidinvid' );
					}
				}

				(  );

				if ($sub == 'save') {
					check_token( 'WHMCS.admin.default' );
					update_query( 'tblaccounts', array( 'gateway' => $paymentmethod, 'date' => toMySQLDate( $date ), 'description' => $description, 'amountin' => $amountin, 'fees' => $fees, 'amountout' => $amountout, 'transid' => $transid, 'invoiceid' => $invoiceid ), array( 'id' => $id ) );
					logActivity( (  . 'Modified Transaction (User ID: ' . $userid . ' - Transaction ID: ' . $id . ')' ) );
					redir(  . 'userid=' . $userid );

					if ($sub == 'delete') {
						check_token( 'WHMCS.admin.default' );
						checkPermission( 'Delete Transaction' );
						$ide = (int)$whmcs->get_req_var( 'ide' );
						ccbjgfhb::find( $userID )->transactions->find( $ide );
						$transaction = ;

						if ($transaction) {
							$transaction->delete(  );
							logActivity( (  . 'Deleted Transaction (ID: ' . $ide . ' - User ID: ' . $userID . ')' ) );
							redir(  . 'userid=' . $userID );
							ob_start(  );

							if ($action == '') {
								$aInt->deleteJSConfirm( 'doDelete', 'transactions', 'deletesure', 'clientstransactions.php?userid=' . $userid . '&sub=delete&ide=' );
								getCurrency( $userid );
								$currency = ;

								if ($error == 'invalidinvid') {
									infoBox( $aInt->lang( 'invoices', 'checkInvoiceID' ), $aInt->lang( 'invoices', 'invalidInvoiceID' ), 'error' );
								}
							}

							$data[0];
							$numrows = ;
							select_query( 'tblaccounts', '', array( 'userid' => $userid ), $orderby, $order, $page * $limit . ( (  . ',' ) . $limit ) );
							$result = ;
							mysql_fetch_array( $result );

							if ($data = ) {
								$data['id'];
								$ide = ;
								$data['date'];
								$date = ;
								fromMySQLDate( $date );
								$date = ;
								$data['gateway'];
								$gateway = ;
								$data['description'];
								$description = ;
								$data['amountin'];
								$amountin = ;
								$data['fees'];
								$fees = ;
								$data['amountout'];
								$amountout = ;
								$data['transid'];
								$transid = ;
								$data['invoiceid'];
								$invoiceid = ;
								$totalin = $totalin + $amountin;
								$totalout = $totalout + $amountout;
								$totalfees = $totalfees + $fees;
								formatCurrency( $amountin );
								$amountin = ;
								formatCurrency( $fees );
								$fees = ;
								formatCurrency( $amountout );
								$amountout = ;

								if ($invoiceid != '0') {
									$description .=  . ' (<a href="invoices.php?action=edit&id=' . $invoiceid . '">#' . $invoiceid . '</a>)';

									if ($transid != '') {
									}
								}
							}

							$description .=  . ' - Trans ID: ' . $transid;
							select_query( 'tblpaymentgateways', '', array( 'gateway' => $gateway, 'setting' => 'name' ) );
							$result2 = ;
							mysql_fetch_array( $result2 );
							$data = ;
							$data['value'];
							$gateway = ;
						}
					}
				}

				$tabledata[] = array( $date, $gateway, $description, $amountin, $fees, $amountout,  . '<a href="?userid=' . $userid . '&action=edit&id=' . $ide . '"><img src="images/edit.gif" width="16" height="16" border="0" alt="Edit"></a>',  . '<a href="#" onClick="doDelete(\'' . $ide . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="Delete"></a>' );
			}
		}
	}
}
else {
	(  );
	$data = ;
	$data['id'];
	$id = ;
	$data['date'];
	$date = ;
	fromMySQLDate( $date );
	$date = ;
	$data['description'];
	$description = ;
	$data['amountin'];
	$amountin = ;
	$data['fees'];
	$fees = ;
	$data['amountout'];
	$amountout = ;
	$data['gateway'];
	$paymentmethod = ;
	$data['transid'];
	$transid = ;
	$data['invoiceid'];
	$invoiceid = ;
	echo '
<p><b>';
	echo $aInt->lang( 'transactions', 'edit' );
	echo '</b></p>

<form method="post" action="';
	echo $whmcs->getPhpSelf(  );
	echo '?userid=';
	echo $userid;
	echo '&sub=save&id=';
	echo $id;
	echo '" name="calendarfrm">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'fields', 'date' );
	echo '</td><td class="fieldarea"><input type="text" size="12" name="date" value="';
	echo $date;
	echo '" class="datepick"></td><td width="15%" class="fieldlabel" width=110>';
	echo $aInt->lang( 'fields', 'transid' );
	echo '</td><td class="fieldarea"><input type="text" name="transid" size=20 value="';
	echo $transid;
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'paymentmethod' );
	echo '</td><td class="fieldarea">';
	echo paymentMethodsSelection( $aInt->lang( 'global', 'none' ) );
	echo '</td><td class="fieldlabel">';
	echo $aInt->lang( 'transactions', 'amountin' );
	echo '</td><td class="fieldarea"><input type="text" name="amountin" size=10 value="';
	echo $amountin;
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'description' );
	echo '</td><td class="fieldarea"><input type="text" name="description" size=50 value="';
	echo $description;
	echo '"></td><td class="fieldlabel">';
	echo $aInt->lang( 'transactions', 'fees' );
	echo '</td><td class="fieldarea"><input type="text" name="fees" size=10 value="';
	echo $fees;
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'invoiceid' );
	echo '</td><td class="fieldarea"><input type="text" name="invoiceid" size=8 value="';
	echo $invoiceid;
	echo '"></td><td class="fieldlabel">';
	echo $aInt->lang( 'transactions', 'amountout' );
	echo '</td><td class="fieldarea"><input type="text" name="amountout" size=10 value="';
	echo $amountout;
	echo '"></td></tr>
</table>

<p align="center"><input type="submit" value="';
	echo $aInt->lang( 'global', 'savechanges' );
	echo '" class="button btn btn-default"></p>

</form>

';
	ob_get_contents(  );
	$content = ;
	ob_end_clean(  );
	$aInt->content = $content;
	$aInt->jquerycode = $jquerycode;
	$aInt->jscode = $jscode;
	$aInt->display;
}

(  );
?>
