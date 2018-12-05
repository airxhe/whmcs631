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
new dgeegejige( 'Manage Affiliates' );
$aInt = ;
$aInt->title = $aInt->lang( 'affiliates', 'title' );
$aInt->sidebar = 'clients';
$aInt->icon = 'affiliates';
$aInt->helplink = 'Affiliates';
$aInt->requiredFiles( array( 'invoicefunctions', 'gatewayfunctions' ) );

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	update_query( 'tblaffiliates', array( 'paytype' => $paymenttype, 'payamount' => $payamount, 'onetime' => $onetime, 'visitors' => $visitors, 'balance' => $balance, 'withdrawn' => $withdrawn ), array( 'id' => $id ) );
	logActivity(  . 'Affiliate ID ' . $id . ' Details Updated' );
	redir(  . 'action=edit&id=' . $id );

	if ($action == 'deletecommission') {
		check_token( 'WHMCS.admin.default' );
		delete_query( 'tblaffiliatespending', array( 'id' => $cid ) );
		redir(  . 'action=edit&id=' . $id );

		if ($action == 'deletehistory') {
			check_token( 'WHMCS.admin.default' );
			delete_query( 'tblaffiliateshistory', array( 'id' => $hid ) );
			redir(  . 'action=edit&id=' . $id );

			if ($action == 'deletereferral') {
				check_token( 'WHMCS.admin.default' );
				delete_query( 'tblaffiliatesaccounts', array( 'id' => $affaccid ) );
				redir(  . 'action=edit&id=' . $id );

				if ($action == 'deletewithdrawal') {
					check_token( 'WHMCS.admin.default' );
					delete_query( 'tblaffiliateswithdrawals', array( 'id' => $wid ) );
					redir(  . 'action=edit&id=' . $id );

					if ($action == 'addcomm') {
						check_token( 'WHMCS.admin.default' );
						format_as_currency( $amount );
						$amount = ;
						insert_query( 'tblaffiliateshistory', array( 'affiliateid' => $id, 'date' => toMySQLDate( $date ), 'affaccid' => $refid, 'description' => $description, 'amount' => $amount ) );
						update_query( 'tblaffiliates', array( 'balance' => '+=' . $amount ), array( 'id' => (int)$id ) );
						redir(  . 'action=edit&id=' . $id );

						if ($action == 'withdraw') {
							check_token( 'WHMCS.admin.default' );
							insert_query( 'tblaffiliateswithdrawals', array( 'affiliateid' => $id, 'date' => 'now()', 'amount' => $amount ) );
							update_query( 'tblaffiliates', array( 'balance' => '-=' . $amount, 'withdrawn' => '+=' . $amount ), array( 'id' => (int)$id ) );

							if ($payouttype == '1') {
								select_query( 'tblaffiliates', '', array( 'id' => (int)$id ) );
								$result = ;
								mysql_fetch_array( $result );
								$data = ;
								$id = (int)$data['id'];
								$clientid = (int)$data['clientid'];
								addTransaction( $clientid, '', 'Affiliate Commissions Withdrawal Payout', '0', '0', $amount, $paymentmethod, $transid );
							}
						}
					}
				}
			}
		}
	}
}
else {
	echo ( true );
	$aInt->sortableTableInit( 'regdate', 'DESC' );
	$tabledata = '';
	$mysql_errors = true;
	get_query_val( 'tblaffiliatesaccounts', 'COUNT(*)', array( 'tblaffiliatesaccounts.affiliateid' => $id ), '', '', '', 'tblhosting ON tblhosting.id=tblaffiliatesaccounts.relid INNER JOIN tblproducts ON tblproducts.id=tblhosting.packageid INNER JOIN tblclients ON tblclients.id=tblhosting.userid' );
	$numrows = ;

	if (( ( ( ( ( $orderby == 'id' || $orderby == 'regdate' ) || $orderby == 'clientname' ) || $orderby == 'name' ) || $orderby == 'lastpaid' ) || $orderby == 'domainstatus' )) {
	}
	else {
		$referraldata = ;
		$status = '';
		$billingcycle = ;
		$relid = ;
		$product = ;
		$companyname = ;
		$lastname = ;
		$firstname = ;
		$userid = ;

		if ($affaccid) {
			$referraldata[0];
			$userid = ;
			$referraldata[1];
			$firstname = ;
			$referraldata[2];
			$lastname = ;
			$referraldata[3];
		}
	}
}

$companyname = ;
$referraldata[4];
$product = ;
$referraldata[5];
$relid = ;
$referraldata[6];
$billingcycle = ;
$referraldata[7];
$status = ;
fromMySQLDate( $date );
$date = ;
formatCurrency( $amount );
$amount = ;

if (!$description) {
	$description = '&nbsp;';
	$tabledata[] = array( $date, $affaccid, $aInt->outputClientLink( $userid, $firstname, $lastname, $companyname ),  . '<a href="clientshosting.php?userid=' . $userid . '&id=' . $relid . '">' . $product . '</a>', $status, $description, $amount,  . '<a href="#" onClick="doAffHistoryDelete(\'' . $historyid . '\');return false"><img src="images/delete.gif" border="0"></a>' );
}

jmp;
echo ( array( ( 'product' ), $aInt->lang( 'affiliates', 'productstatus' ), 'Description', $aInt->lang( 'fields', 'amount' ), '' ), $tabledata );
echo '
<br />

<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '?action=addcomm&id=';
echo $id;
echo '">
<p align="left"><b>Add Manual Commission Entry</b></p>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
echo $aInt->lang( 'fields', 'date' );
echo ':</td><td class="fieldarea"><input type="text" name="date" value="';
echo getTodaysDate(  );
echo '" class="datepick" /></td></tr>
<tr><td class="fieldlabel">Related Referral:</td><td class="fieldarea"><select name="refid" class="form-control select-inline"><option value="">None</option>';
select_query( 'tblaffiliatesaccounts', 'tblaffiliatesaccounts.*,(SELECT CONCAT(tblclients.firstname,\'|||\',tblclients.lastname,\'|||\',tblhosting.userid,\'|||\',tblproducts.name,\'|||\',tblhosting.domainstatus,\'|||\',tblhosting.domain,\'|||\',tblhosting.amount,\'|||\',tblhosting.regdate,\'|||\',tblhosting.billingcycle) FROM tblhosting INNER JOIN tblproducts ON tblproducts.id=tblhosting.packageid INNER JOIN tblclients ON tblclients.id=tblhosting.userid WHERE tblhosting.id=tblaffiliatesaccounts.relid) AS referraldata', array( 'affiliateid' => $id ) );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
	$affaccid = ;
	$data['lastpaid'];
	$lastpaid = ;
	$data['relid'];
	$relid = ;
	$data['referraldata'];
	$referraldata = ;
	explode( '|||', $referraldata );
	$referraldata = ;
	$referraldata[0];
	$firstname = ;
	$referraldata[1];
	$lastname = ;
	$referraldata[2];
	$userid = ;
	$referraldata[3];
	$product = ;
	$referraldata[4];
	$status = ;
	$referraldata[5];
	$domain = ;
	$referraldata[6];
	$amount = ;
	$referraldata[7];
	$date = ;
	$referraldata[8];
	$billingcycle = ;

	if (!$domain) {
		$domain = '';

		if ($lastpaid == '0000-00-00') {
			$aInt->lang( 'affiliates', 'never' );
			$lastpaid = ;
		}
	}

	$data['date'];
	$date = ;
	$data['amount'];
	$amount = ;
	fromMySQLDate( $date );
	$date = ;
	formatCurrency( $amount );
	$amount = ;
	$tabledata[] = array( $date, $amount,  . '<a href="#" onClick="doWithdrawHistoryDelete(\'' . $historyid . '\');return false"><img src="images/delete.gif" border="0"></a>' );
}

jmp;
echo ( 'affiliates', 'payouttype' );
echo ':</td><td class="fieldarea"><select name="payouttype" class="form-control select-inline"><option value="1">';
echo $aInt->lang( 'affiliates', 'transactiontoclient' );
echo '</option><option value="2">';
echo $aInt->lang( 'affiliates', 'addtocredit' );
echo '</option><option>';
echo $aInt->lang( 'affiliates', 'withdrawalsonly' );
echo '</option></select></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'fields', 'transid' );
echo ':</td><td class="fieldarea"><input type="text" name="transid" size="25" /> (';
echo $aInt->lang( 'affiliates', 'transactiontoclientinfo' );
echo ')</td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'fields', 'paymentmethod' );
echo ':</td><td class="fieldarea">';
echo paymentMethodsSelection( $aInt->lang( 'global', 'na' ) );
echo '</td></tr>
</table>
<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'global', 'submit' );
echo '" class="btn btn-primary" />
</div>
</form>

';
echo $aInt->endAdminTabs(  );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
