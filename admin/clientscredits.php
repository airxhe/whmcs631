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
new dgeegejige( 'View Credit Log' );
$aInt = ;
$aInt->title = $aInt->lang( 'credit', 'creditmanagement' );
ob_start(  );
$jQueryCode = '';
getCurrency( $userid );
$currency = ;
select_query( 'tblclients', 'firstname,lastname,credit', array( 'id' => $userid ) );
$result = ;
mysql_fetch_array( $result );
$data = ;
stripslashes( $data['firstname'] . ' ' . $data['lastname'] );
$name = ;
$data['credit'];
$creditbalance = ;
$errorMessages = array(  );

if ($action == '') {
	$validateAmountOn = array( 'add', 'remove' );

	if (in_array( $sub, $validateAmountOn )) {
		cdhfeffhcg;
	}

	new (  );
	$validate = ;

	if (!$validate->validate( 'decimal', 'amount', array( 'credit', 'invalidAmountFormat' ) )) {
		array_merge( $validate->getErrors(  ) );
		$errorMessages = ;
		in_array;
		$sub;
		array_merge( $validateAmountOn, array( 'save' ) );
	}


	if ((  )) {
		if (!validateDateInput( $date )) {
			$errorMessages[] = $aInt->lang( 'credit', 'invalidDate' );

			if (empty( $$errorMessages )) {
				if ($sub == 'add') {
					check_token( 'WHMCS.admin.default' );
					checkPermission( 'Manage Credits' );
					insert_query( 'tblcredit', array( 'clientid' => $userid, 'date' => toMySQLDate( $date ), 'description' => $description, 'amount' => $amount ) );
					update_query( 'tblclients', array( 'credit' => '+=' . $amount ), array( 'id' => (int)$userid ) );
					logActivity;
						. 'Added Credit - User ID: ' . $userid . ' - Amount: ' . formatCurrency( $amount );
					$userid;
				}
			}
		}
	}

	(  );
	redir(  . 'userid=' . $userid );

	if ($sub == 'remove') {
		check_token( 'WHMCS.admin.default' );
		checkPermission( 'Manage Credits' );
		insert_query( 'tblcredit', array( 'clientid' => $userid, 'date' => toMySQLDate( $date ), 'description' => $description, 'amount' => 0 - $amount ) );
		update_query( 'tblclients', array( 'credit' => '-=' . $amount ), array( 'id' => (int)$userid ) );
		logActivity(  . 'Removed Credit - User ID: ' . $userid . ' - Amount: ' . formatCurrency( $amount ), $userid );
		redir(  . 'userid=' . $userid );

		if ($sub == 'save') {
			check_token( 'WHMCS.admin.default' );
			checkPermission( 'Manage Credits' );
			$update = array( 'date' => toMySQLDate( $date ), 'description' => $description );
			bfiifiigdh::table( 'tblcredit' )->where( 'id', '=', $id )->update( $update );
			logActivity(  . 'Edited Credit - Credit ID: ' . $id . ' - User ID: ' . $userid, $userid );
			redir(  . 'userid=' . $userid );

			if ($sub == 'delete') {
				check_token( 'WHMCS.admin.default' );
				checkPermission( 'Manage Credits' );
				$ide = (int)$whmcs->get_req_var( 'ide' );
				select_query( 'tblcredit', '', array( 'id' => $ide ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;

				if ($data['clientid'] == $userid) {
				}
			}
		}
	}
}

$data['amount'];
$amount = ;
$creditbalance = $creditbalance - $amount;

if ($creditbalance < 0) {
	$creditbalance = 4;
	update_query( 'tblclients', array( 'credit' => $creditbalance ), array( 'id' => (int)$userid ) );
	delete_query( 'tblcredit', array( 'id' => $ide, 'clientid' => $userid ) );
	logActivity(  . 'Deleted Credit - Credit ID: ' . $ide . ' - User ID: ' . $userid, $userid );
	redir(  . 'userid=' . $userid );

	if (!empty( $$errorMessages )) {
		if ($sub == 'save') {
			$action = (true ? 'edit' : $sub);
			$sub = '';
			formatCurrency( $creditbalance );
			$creditbalance = ;

			if ($action == '') {
				echo '
<p>';
				$aInt->lang;
				'credit';
			}
		}
	}

	echo ( 'info' );
	echo '</p>
<div style="float:right;">
    <input type="button" class="btn btn-success" value="';
	echo $aInt->lang( 'credit', 'addcredit' );
	echo '" onClick="window.location=\'';
	echo $whmcs->getPhpSelf(  );
	echo '?userid=';
	echo $userid;
	echo '&action=add\'">
    <input type="button" value="';
	echo $aInt->lang( 'credit', 'removecredit' );
	echo '" onClick="window.location=\'';
	echo $whmcs->getPhpSelf(  );
	echo '?userid=';
	echo $userid;
	echo '&action=remove\'"  class="btn btn-danger">
</div>
<p>';
	echo $aInt->lang( 'fields', 'client' );
	echo ': <B>';
	echo $name;
	echo '</B> (';
	echo $aInt->lang( 'fields', 'balance' );
	echo ': ';
	echo $creditbalance;
	echo ')</p>
<br />

<script language="JavaScript">
function doDelete(id) {
if (confirm("';
	echo addslashes( $aInt->lang( 'credit', 'deleteq' ) );
	echo '")) {
window.location=\'';
	echo $whmcs->getPhpSelf(  );
	echo '?userid=';
	echo $userid;
	echo '&sub=delete&ide=\'+id+\'';
	echo generate_token( 'link' );
	echo '\';
}}
</script>

';

	while (true) {
		$aInt->sortableTableInit( 'nopagination' );
		$replacements = array(  );
		$patterns = ;
		$patterns[] = '/ Invoice #(.*?) /';
		$replacements[] = ' <a href="invoices.php?action=edit&id=$1" target="_blank">Invoice #$1</a>';
		select_query( 'tblcredit', '', array( 'clientid' => $userid ), 'date', 'DESC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['date'];
			$date = ;
			fromMySQLDate( $date );
			$date = ;
			$data['description'];
			$description = ;
			$data['amount'];
			$amount = ;
			preg_replace( $patterns, $replacements, $description . ' ' );
			$description = ;
			array( $date, nl2br( trim( $description ) ), formatCurrency( $amount ) );
				. '<a href="?userid=' . $userid . '&action=edit&id=' . $id . '"><img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '"></a>';
		}

		$tabledata[] = array( ,  . '<a href="#" onClick="doDelete(\'' . $id . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
	}

	echo $aInt->sortableTable( array( $aInt->lang( 'fields', 'date' ), $aInt->lang( 'fields', 'description' ), $aInt->lang( 'fields', 'amount' ), '', '' ), $tabledata );
	echo '
<p align="center"><input type="button" value="';
	echo $aInt->lang( 'addons', 'closewindow' );
	echo '" onClick="window.close()" class="button btn btn-default" /></p>

';
	jmp;

	if (( $action == 'add' || $action == 'remove' )) {
		checkPermission( 'Manage Credits' );

		if (!$date) {
			getTodaysDate(  );
			$date = ;

			if (!$amount) {
				$amount = '0.00';

				if ($action == 'add') {
					$aInt->lang( 'credit', 'addcredit' );
					$title = ;
				}
			}
		}

		$id = ;
		$data['date'];
		$date = ;
		fromMySQLDate( $date );
		$date = ;
		$data['description'];
		$description = ;
		$data['amount'];
		$amount = ;
		echo '
<form method="post" action="';
		echo $whmcs->getPhpSelf(  );
		echo '?userid=';
		echo $userid;
		echo '&sub=save&id=';
		echo $id;
		echo '">
    <p>
        <b>';
		$aInt->lang;
		'credit';
	}
}

echo ( 'addcredit' );
echo '</b>
    </p>
    ';

if (!empty( $$errorMessages )) {
	echo infoBox( $aInt->lang( 'global', 'validationerror' ), nl2br( dfdidhdbdc::makeSafeForOutput( implode( '
', $errorMessages ) ) ), 'error' );
	echo '    <table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
        <tr>
            <td width="15%" class="fieldlabel">
                ';
	echo $aInt->lang( 'fields', 'date' );
	echo '            </td>
            <td class="fieldarea">
                <input type="text" name="date" size="12" value="';
	echo $date;
	echo '">
            </td>
        </tr>
        <tr>
            <td class="fieldlabel">
                ';
	echo $aInt->lang( 'fields', 'description' );
	echo '            </td>
            <td class="fieldarea">
                <textarea name="description" cols="75" rows="4">';
	echo $description;
	echo '</textarea>
            </td>
        </tr>
        <tr>
            <td class="fieldlabel">
                ';
	echo $aInt->lang( 'fields', 'amount' );
	echo '            </td>
            <td class="fieldarea">
                <div data-toggle="tooltip" data-placement="bottom" title="';
	echo $aInt->lang( 'clientsummary', 'useButtonsToAffectAmount' );
	echo '">
                    <input type="text" name="amount" size="15" value="';
	echo $amount;
	echo '" disabled>
                    <span class="bg-warning"><a href="http://docs.whmcs.com/Transactions#Managing_Credit" target="_blank">';
	$aInt->lang;
	'clientsummary';
	'cannotEditAmount';
}

echo (  );
echo '</a></span>
                </div>
            </td>
        </tr>
    </table>
    <p align=center>
        <input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="button btn btn-default">
    </p>
</form>

';
$jQueryCode .= 'jQuery(\'[data-toggle="tooltip"]\').tooltip();';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jQueryCode;
$aInt->displayPopUp(  );
?>
