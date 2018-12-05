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
new dgeegejige( 'List Clients' );
$aInt = ;
$aInt->title = $aInt->lang( 'clients', 'viewsearch' );
$aInt->sidebar = 'clients';
$aInt->icon = 'clients';
$limitClientId = 7;
DI::make( 'license' );
$licensing = ;

if ($licensing->isClientLimitsEnabled(  )) {
	$licensing->getClientBoundaryId(  );
	$limitClientId = ;
	$name = 'clients';
	$orderby = 'id';
	$sort = 'DESC';
	new beiiefhecf( $name, $orderby, $sort );
	$pageObj = ;
	$pageObj->digestCookieData(  );
	new hfacgibj( $pageObj );
	$tbl = ;
	$tbl->setColumns( array( 'checkall', array( 'id', $aInt->lang( 'fields', 'id' ) ), array( 'firstname', $aInt->lang( 'fields', 'firstname' ) ), array( 'lastname', $aInt->lang( 'fields', 'lastname' ) ), array( 'companyname', $aInt->lang( 'fields', 'companyname' ) ), array( 'email', $aInt->lang( 'fields', 'email' ) ), $aInt->lang( 'fields', 'services' ), array( 'datecreated', $aInt->lang( 'fields', 'created' ) ), array( 'status', $aInt->lang( 'fields', 'status' ) ) ) );
	new bafghafifi( $pageObj );
	$clientsModel = ;
	new gdacdjjje(  );
	$filters = ;
	ob_start(  );
	echo $aInt->beginAdminTabs( array( $aInt->lang( 'global', 'searchfilter' ) ) );
	$filters->get( 'userid' );
	$userid = ;
	$filters->get( 'country' );
	$country = ;
	echo '
<form action="clients.php" method="post">
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'fields', 'clientname' );
	echo '</td><td class="fieldarea"><input type="text" name="clientname" class="form-control input-250" value="';
	$filters->get( 'clientname' );
	echo $clientname = ;
	echo '" /></td><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'fields', 'companyname' );
	echo '</td><td class="fieldarea"><input type="text" name="companyname" class="form-control input-250" value="';
	$filters->get( 'companyname' );
	echo $companyname = ;
	echo '" /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'email' );
	echo '</td><td class="fieldarea"><input type="text" name="email" class="form-control input-300" value="';
	$filters->get( 'email' );
	echo $email = ;
	echo '" /></td><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'address' );
	echo '</td><td class="fieldarea"><input type="text" name="address" class="form-control input-250" value="';
	$filters->get( 'address' );
	echo $address = ;
	echo '" /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'status' );
	echo '</td><td class="fieldarea"><select name="status" class="form-control select-inline"><option value="">';
	echo $aInt->lang( 'global', 'any' );
	echo '</option><option value="Active"';
	$filters->get( 'status' );
	$status = ;

	if ($status == 'Active') {
		echo ' selected';
		echo '>';
		echo $aInt->lang( 'status', 'active' );
		echo '</option><option value="Inactive"';

		if ($status == 'Inactive') {
			echo ' selected';
			echo '>';
			echo $aInt->lang( 'status', 'inactive' );
			echo '</option><option value="Closed"';

			if ($status == 'Closed') {
				echo ' selected';
				echo '>';
				echo $aInt->lang( 'status', 'closed' );
				echo '</option></select></td><td class="fieldlabel">';
				echo $aInt->lang( 'fields', 'state' );
				echo '</td><td class="fieldarea"><input type="text" name="state" class="form-control input-250" value="';
				$filters->get( 'state' );
				echo $state = ;
				echo '" /></td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'fields', 'clientgroup' );
				echo '</td><td class="fieldarea"><select name="clientgroup" class="form-control select-inline"><option value="">';
				echo $aInt->lang( 'global', 'any' );
				echo '</option>';
				$filters->get( 'clientgroup' );
				$clientgroup = ;
				foreach ($clientsModel->getGroups(  ) as ) {
					$values = ;
					$id = ;
					echo '<option value="' . $id . '"';

					if ($id == $clientgroup) {
						echo ' selected';
						echo '>' . $values['name'] . '</option>';
						break;
					}

					break;
				}

				echo '</select></td><td class="fieldlabel">';
				echo $aInt->lang( 'fields', 'phonenumber' );
				echo '</td><td class="fieldarea"><input type="text" name="phonenumber" class="form-control input-250" value="';
				$filters->get( 'phonenumber' );
				echo $phonenumber = ;
				echo '" /></td></tr>
<tr><td width="15%" class="fieldlabel">';
				echo $aInt->lang( 'currencies', 'currency' );
				echo '</td><td class="fieldarea"><select name="currency" class="form-control select-inline"><option value="">';
				echo $aInt->lang( 'global', 'any' );
			}
		}
	}

	echo '</option>';
	$filters->get( 'currency' );
	$currency = ;
	select_query( 'tblcurrencies', 'id,code', '', 'code', 'ASC' );
	$result = ;
	mysql_fetch_assoc( $result );

	if ($data = ) {
		echo '<option value="' . $data['id'] . '"';

		if ($currency == $data['id']) {
			echo ' selected';
			echo '>' . $data['code'] . '</option>';
		}
	}
}

$linkopen =  . '>';
$linkclose = '</a>';
$checkbox = '<input type="checkbox" name="selectedclients[]" value="' . $client['id'] . '" class="checkall" />';

if (( 0 < $limitClientId && $limitClientId <= $clientId )) {
	$checkbox = array( 'trAttributes' => array( 'class' => 'grey-out' ), 'output' => $checkbox );
	$tbl->addRow( array( $checkbox, $linkopen . $client['id'] . $linkclose, $linkopen . $client['firstname'] . $linkclose, $linkopen . $client['lastname'] . $linkclose, $client['companyname'], '<a href="mailto:' . $client['email'] . '">' . $client['email'] . '</a>', $client['services'] . ' (' . $client['totalservices'] . ')', $client['datecreated'], '<span class="label ' . strtolower( $client['status'] ) . '">' . $client['status'] . '</span>' ) );
}

jmp;
( '<input type="submit" value="' . ( 'global', 'sendmessage' ) . '" class="btn btn-default" />' );
echo $tbl->output(  );
unset( $$clientlist );
unset( $$clientsModel );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
