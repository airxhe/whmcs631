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
new dgeegejige( 'List Domains' );
$aInt = ;
$aInt->title = $aInt->lang( 'services', 'listdomains' );
$aInt->sidebar = 'clients';
$aInt->icon = 'domains';
$aInt->requiredFiles( array( 'registrarfunctions' ) );
ob_start(  );
echo $aInt->beginAdminTabs( array( $aInt->lang( 'global', 'searchfilter' ) ) );
echo '
<form action="';
echo $whmcs->getPhpSelf(  );
echo '" method="post">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'domain' );
echo '</td><td class="fieldarea"><input type="text" name="domain" class="form-control input-300" value="';
echo $domain;
echo '"></td><td width="15%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'status' );
echo '</td><td class="fieldarea"><select name="status" class="form-control select-inline">
<option value="">';
echo $aInt->lang( 'global', 'any' );
echo '</option>
<option value="Pending"';

if ($status == 'Pending') {
	echo ' selected';
	echo '>';
	echo $aInt->lang( 'status', 'pending' );
	echo '</option>
<option value="Pending Transfer"';

	if ($status == 'Pending Transfer') {
		echo ' selected';
		echo '>';
		echo $aInt->lang( 'status', 'pendingtransfer' );
		echo '</option>
<option value="Active"';

		if ($status == 'Active') {
			echo ' selected';
			echo '>';
			echo $aInt->lang( 'status', 'active' );
			echo '</option>
<option value="Expired"';

			if ($status == 'Expired') {
				echo ' selected';
				echo '>';
				echo $aInt->lang( 'status', 'expired' );
				echo '</option>
<option value="Cancelled"';

				if ($status == 'Cancelled') {
					echo ' selected';
					echo '>';
					$aInt->lang( 'status', 'cancelled' );
				}
			}
		}
	}
}

echo ;
echo '</option>
<option value="Fraud"';

if ($status == 'Fraud') {
	echo ' selected';
	echo '>';
	echo $aInt->lang( 'status', 'fraud' );
	echo '</option>
</select></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'registrar' );
	echo '</td><td class="fieldarea">';
	echo getRegistrarsDropdownMenu( $registrar );
	echo '</td><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'clientname' );
	echo '</td><td class="fieldarea"><input type="text" name="clientname" class="form-control input-250" value="';
	echo $clientname;
	echo '"></td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
	echo $aInt->lang( 'global', 'search' );
	echo '" class="btn btn-default">
</div>

</form>

';
	echo $aInt->endAdminTabs(  );
	echo '
<br>

';
	$aInt->sortableTableInit( 'domain', 'ASC' );
	$query = 'FROM tbldomains INNER JOIN tblclients ON tblclients.id=tbldomains.userid WHERE tbldomains.id!=\'\' ';

	if ($clientname) {
		$query .= 'AND concat(firstname,\' \',lastname) LIKE \'%' . db_escape_string( $clientname ) . '%\' ';

		if ($status) {
			$query .= 'AND tbldomains.status=\'' . db_escape_string( $status ) . '\' ';

			if ($domain) {
				$query .= 'AND tbldomains.domain LIKE \'%' . db_escape_string( $domain ) . '%\' ';

				if ($registrar) {
					$query .= 'AND tbldomains.registrar=\'' . db_escape_string( $registrar ) . '\' ';

					if ($id) {
						$query .= 'AND tbldomains.id=\'' . db_escape_string( $id ) . '\' ';

						if ($subscriptionid) {
							$query .= 'AND tbldomains.subscriptionid=\'' . db_escape_string( $subscriptionid ) . '\' ';

							if ($notes) {
								$query .= 'AND tbldomains.additionalnotes LIKE \'%' . db_escape_string( $notes ) . '%\' ';
							}
						}
					}

					full_query( 'SELECT COUNT(tbldomains.id) ' . $query );
					$result = ;
					mysql_fetch_array( $result );
					$data = ;
					$data[0];
					$numrows = ;
					$query .= 'ORDER BY ';

					if ($orderby == 'clientname') {
						$query .= 'firstname ' . db_escape_string( $order ) . ',lastname';
					}
				}
			}
		}
	}
}

$amount = ;
$data['registrar'];
$registrar = ;
$data['nextduedate'];
$nextduedate = ;
$data['expirydate'];
$expirydate = ;
$data['subscriptionid'];
$subscriptionid = ;
$data['registrationdate'];
$registrationdate = ;
$data['registrationperiod'];
$registrationperiod = ;
$data['status'];
$status = ;
$data['firstname'];
$firstname = ;
$data['lastname'];
$lastname = ;
$data['companyname'];
$companyname = ;
$data['groupid'];
$groupid = ;
$data['currency'];
$currency = ;

if (!$domain) {
	$domain = '(No Domain)';
	getCurrency( '', $currency );
	$currency = ;
	formatCurrency( $amount );
	$amount = ;
	fromMySQLDate( $registrationdate );
	$registrationdate = ;
	fromMySQLDate( $nextduedate );
	$nextduedate = ;
	fromMySQLDate( $expirydate );
	$expirydate = ;

	if (1 < $registrationperiod) {
		$registrationperiod .= (true ? ' ' . $aInt->lang( 'domains', 'years' ) : ' ' . $aInt->lang( 'domains', 'year' ));

		while (true) {
			$tabledata[] = array(  . '<input type="checkbox" name="selectedclients[]" value="' . $id . '" class="checkall" />',  . '<a href="clientsdomains.php?userid=' . $userid . '&domainid=' . $id . '">' . $id . '</a>',  . '<a href="clientsdomains.php?userid=' . $userid . '&id=' . $id . '">' . $domain . '</a> <a href="http://www.' . $domain . '" target="_blank" style="color:#cc0000"><small>www</small></a>' . ' <span class="label ' . strtolower( $status ) . '">' . $status . '</span>', $aInt->outputClientLink( $userid, $firstname, $lastname, $companyname, $groupid ), $registrationperiod, ucfirst( $registrar ), $amount, $nextduedate, $expirydate );
		}

		$tableformurl = 'sendmessage.php?type=domain&multiple=true';
		$tableformbuttons = '<input type="submit" value="' . $aInt->lang( 'global', 'sendmessage' ) . '" class="button btn btn-default">';
		$aInt->sortableTable;
		array( 'checkall', array( 'id', $aInt->lang( 'fields', 'id' ) ), array( 'domain', $aInt->lang( 'fields', 'domain' ) ), array( 'clientname', $aInt->lang( 'fields', 'clientname' ) ), array( 'registrationperiod', $aInt->lang( 'fields', 'regperiod' ) ) );
		array( 'registrar' );
		$aInt->lang;
		'fields';
		'registrar';
	}

	array( array( (  ) ), array( 'recurringamount', $aInt->lang( 'fields', 'price' ) ), array( 'nextduedate', $aInt->lang( 'fields', 'nextduedate' ) ) );
	array( 'expirydate' );
	$aInt->lang;
	'fields';
	'expirydate';
}

echo ( array( array( (  ) ) ), $tabledata, $tableformurl, $tableformbuttons );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->display(  );
?>
