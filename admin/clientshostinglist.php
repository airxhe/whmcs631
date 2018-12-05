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
new dgeegejige( 'List Services' );
$aInt = ;

if ($listtype == 'hostingaccount') {
	$aInt->lang( 'services', 'listhosting' );
	$pagetitle = ;
}


while (true) {
	(  );
	$result2 = ;
	mysql_fetch_array( $result2 );

	if ($data = ) {
		$data['id'];
		$fieldid = ;
		$data['fieldname'];
		$fieldname = ;
		$data['name'];
		$fieldprodname = ;
		echo (  . '<option value="' . $fieldid . '"' );

		if ($customfield ==  . $fieldid) {
			echo ' selected';
			echo  . '> ' . $fieldprodname . ' - ' . $fieldname . '</option>';
		}
	}
	else {
		array(  . '<a href="clientshosting.php?userid=' . $userid . '&id=' . $id . '">' . $id . '</a>', $dpackage . ' <span class="label ' . strtolower( $status ) . '">' . $status . '</span>', '<a href="clientshosting.php?userid=' . $userid . '&id=' . $id . '">' . $domain . '</a>' . $linkvalue );
		$aInt->outputClientLink( $userid, $firstname, $lastname, $companyname, $groupid );
	}

	$tabledata[] = array( , $amount, $billingcycle, $nextduedate );
}

$tableformurl = 'sendmessage.php?type=product&multiple=true';
$tableformbuttons = '<input type="submit" value="' . $aInt->lang( 'global', 'sendmessage' ) . '" class="button btn btn-default">';
echo $aInt->sortableTable( array( 'checkall', array( 'id', $aInt->lang( 'fields', 'id' ) ), array( 'product', $aInt->lang( 'fields', 'product' ) ), array( 'domain', $aInt->lang( 'fields', 'domain' ) ), array( 'clientname', $aInt->lang( 'fields', 'clientname' ) ), array( 'amount', $aInt->lang( 'fields', 'price' ) ), array( 'billingcycle', $aInt->lang( 'fields', 'billingcycle' ) ), array( 'nextduedate', $aInt->lang( 'fields', 'nextduedate' ) ) ), $tabledata, $tableformurl, $tableformbuttons );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->display(  );
?>
