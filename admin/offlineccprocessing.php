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
new dgeegejige( 'Offline Credit Card Processing' );
$aInt = ;
$aInt->title = $aInt->lang( 'offlineccp', 'title' );
$aInt->sidebar = 'billing';
$aInt->icon = 'offlinecc';
$aInt->requiredFiles( array( 'clientfunctions', 'invoicefunctions', 'gatewayfunctions', 'ccfunctions' ) );

if ($processwindow) {
	check_token( 'WHMCS.admin.default' );
	select_query( 'tblinvoices', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$id = ;
	$data['userid'];
	$userid = ;
	$data['date'];
	$date = ;
	$data['duedate'];
	$duedate = ;
	$data['subtotal'];
	$subtotal = ;
	$data['credit'];
	$credit = ;
	$data['tax'];
	$tax = ;
	$data['total'];
	$total = ;
	$data['value'];
	$paymentmethod = ;
	fromMySQLDate( $date );
	$date = ;
	fromMySQLDate( $duedate );
	$duedate = ;
	getCurrency( $userid );
	$currency = ;
	getClientsDetails( $userid );
	$clientsdetails = ;
	ob_start(  );
	echo '
<table width=100% cellspacing="4">
<tr><td height="120" width=50% style="border:1px solid #cccccc">

<p align=center><b>';
	echo $aInt->lang( 'emailtpls', 'typeinvoice' );
	echo ' #';
	echo $id;
	echo '</b><br>
';
	echo $aInt->lang( 'mergefields', 'datecreated' );
	echo ': ';
	echo $date;
	echo '<br>
';
	echo $aInt->lang( 'fields', 'duedate' );
	echo ': ';
	echo $duedate;
	echo '<br>
';
	echo $aInt->lang( 'fields', 'subtotal' );
	echo ': ';
	echo $subtotal;
	echo '<br>
';
	echo $aInt->lang( 'general', 'tabcredit' );
	echo ': ';
	echo $credit;
	echo '<br>
';
	echo $aInt->lang( 'fields', 'tax' );
	echo ': ';
	echo $tax;
	echo '<br>
';
	echo $aInt->lang( 'fields', 'total' );
	echo ': ';
	echo $total;
	echo '</p>

</td><td width=50% style="border:1px solid #cccccc">

<p align=center><b>';
	echo $aInt->lang( 'clientsummary', 'clientdetails' );
	echo '</b><br>
';
	echo $clientsdetails['firstname'] . ' ' . $clientsdetails['lastname'];

	if ($clientsdetails['companyname'] != '') {
		echo ' (' . $clientsdetails['companyname'] . ')';
		echo '<br>
';
		echo $clientsdetails['email'];
		echo '<br>
';
		echo $clientsdetails['address1'];
		echo ', ';
		echo $clientsdetails['address2'];
		echo '<br>
';
		echo $clientsdetails['city'];
		echo ', ';
		echo $clientsdetails['state'];
		echo ', ';
		echo $clientsdetails['postcode'];
		echo '<br>
';
		include( '../includes/countries.php' );
		echo $countries[$clientsdetails['country']];
		echo '<br>
';
		echo $clientsdetails['phonenumber'];
		echo '</p>

</td></tr>
</table>

<p><b>';
		echo $aInt->lang( 'clientsummary', 'ccdetails' );
		echo '</b></p>
';

		if ($cchash == '') {
			echo '<p>';
			echo $aInt->lang( 'offlineccp', 'entercchashmsg' );
			echo '</p>
<form method="post" action="';
			echo $whmcs->getPhpSelf(  );
			echo '?processwindow=true&id=';
			echo $id;
			echo '">
<p align=center><textarea name="cchash" cols=40 rows=3></textarea><br><br>
<input type="submit" value="Submit" class="button btn btn-default"></p>
</form>
';
			jmp;
			check_token( 'WHMCS.admin.default' );
			$_SERVER['HTTP_REFERER'];
			$referrer = ;
			strpos( $referrer, '?' );
			$pos = ;

			if ($pos) {
				substr( $referrer, 0, $pos );
				$referrer = ;
				$whmcs->get_admin_folder_name(  );
				$adminfolder = ;

				if (( $CONFIG['SystemURL'] . ( (  . '/' ) . $adminfolder . '/offlineccprocessing.php' ) != $referrer && $CONFIG['SystemSSLURL'] . ( (  . '/' ) . $adminfolder . '/offlineccprocessing.php' ) != $referrer )) {
					echo '<p>' . $aInt->lang( 'global', 'invalidaccessattempt' ) . '</p>';
					exit(  );

					if ($cchash != $cc_encryption_hash) {
						echo $aInt->lang( 'offlineccp', 'entercchashdie' );
					}
				}
			}

			exit(  );

			if ($failed == 'true') {
				sendMessage( 'Credit Card Payment Failed', $id );
				echo '<p align=center><a href="#" onClick="window.opener.location.reload();window.close()">' . $aInt->lang( 'addons', 'closewindow' ) . '</a></p>';
				exit(  );
				getCCDetails( $userid );
				$data = ;
				$data['cardtype'];
				$cardtype = ;
				$data['fullcardnum'];
				$cardnum = ;
				$data['expdate'];
				$cardexp = ;
				$data['issuenumber'];
				$cardissuenum = ;
				$data['startdate'];
				$cardstart = ;
				echo $aInt->lang( 'fields', 'cardtype' ) . ': ' . $cardtype . '<br>' . $aInt->lang( 'fields', 'cardnum' ) . ': ' . $cardnum . '<br>' . $aInt->lang( 'fields', 'expdate' ) . ': ' . $cardexp . ' (MMYY)';

				if ($cardissuenum) {
					echo '<br>' . $aInt->lang( 'fields', 'issueno' ) . (  . ': ' . $cardissuenum );

					if ($cardstart) {
						echo '<br>' . $aInt->lang( 'fields', 'startdate' ) . (  . ': ' . $cardstart );
						echo '<br><br>
<center>
<b>';
						echo $aInt->lang( 'offlineccp', 'transresult' );
						echo '</b><br>
<img src="images/spacer.gif" width="1" height="5"><br>
<form method="post" action="';
						echo $whmcs->getPhpSelf(  );
						echo '?processwindow=true&id=';
						echo $id;
						echo '&successful=true">Trans ID: <input type="text" name="transid" size="20"> <input type="hidden" name="cchash" value="';
						echo $cchash;
						echo '"><input type="submit" value="Successful" class="button btn btn-default"></form>
<img src="images/spacer.gif" width="1" height="5"><br>
<form method="post" action="';
						echo $whmcs->getPhpSelf(  );
						echo '?processwindow=true&id=';
						echo $id;
						echo '&failed=true"><input type="hidden" name="cchash" value="';
						echo $cchash;
						echo '"><input type="submit" value="Failed" class="button btn btn-default"></form>
';
						ob_get_contents(  );
						$content = ;
						ob_end_clean(  );
						$aInt->content = $content;
						$aInt->displayPopUp(  );
						exit(  );
						ob_start(  );
						$jscode = 'function openCCDetails(id) {
var winl = (screen.width - 500) / 2;
var wint = (screen.height - 400) / 2;
winprops = \'height=400,width=500,top=\'+wint+\',left=\'+winl+\',scrollbars=no\'
win = window.open(\'' . $_SERVER['PHP_SELF'] . '?processwindow=true' . generate_token( 'link' ) . '&id=\'+id, \'ccdetails\', winprops)
if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}';
						$aInt->sortableTableInit( 'duedate', 'ASC' );
						getGatewaysArray(  );
						$gatewaysarray = ;
						$query = 'SELECT tblinvoices.*,tblclients.firstname,tblclients.lastname,tblclients.companyname,tblclients.groupid FROM tblinvoices INNER JOIN tblclients ON tblclients.id=tblinvoices.userid WHERE paymentmethod=\'offlinecc\' AND tblinvoices.status=\'Unpaid\' ORDER BY ';

						if ($orderby == 'clientname') {
							$query .= 'firstname ' . db_escape_string( $order ) . ', lastname';
						}
					}
				}
			}
		}
	}
}

(  );
$query .= ;
$query .= ' ' . db_escape_string( $order );
full_query( $query );
$numresults = ;
mysql_num_rows( $numresults );
$numrows = ;
$query .= ' LIMIT ' . (int)$page * $limit . ',' . (int)$limit;
full_query( $query );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
	$id = ;
	$data['userid'];
	$userid = ;
	$data['date'];
	$date = ;
	$data['duedate'];
	$duedate = ;
	$data['total'];
	$total = ;
	$data['paymentmethod'];
	$paymentmethod = ;
	$gatewaysarray[$paymentmethod];
	$paymentmethod = ;
	fromMySQLDate( $date );
	$date = ;
	fromMySQLDate( $duedate );
	$duedate = ;
	$data['firstname'];
	$firstname = ;
	$data['lastname'];
	$lastname = ;
	$data['companyname'];
	$companyname = ;
	$data['groupid'];
	$groupid = ;
	getCurrency( $userid );
	$currency = ;
	formatCurrency( $total );
	$total = ;
	$tabledata[] = array(  . '<a href="invoices.php?action=edit&id=' . $id . '">' . $id . '</a>', $aInt->outputClientLink( $userid, $firstname, $lastname, $companyname, $groupid ), $date, $duedate, $total,  . '<input type="button" value="View Processing Window" onClick="openCCDetails(' . $id . ');return false">' );
}

jmp;
echo ( array( , array( 'total', $aInt->lang( 'fields', 'total' ) ), $aInt->lang( 'supportticketescalations', 'actions' ) ), $tabledata );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
