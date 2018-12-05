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
new dgeegejige( 'loginonly' );
$aInt = ;

if ($a == 'savenotes') {
	check_token( 'WHMCS.admin.default' );
	update_query( 'tbladmins', array( 'notes' => $notes ), array( 'id' => $_SESSION['adminid'] ) );
	exit(  );

	if ($a == 'minsidebar') {
		dfabehjiaj::set( 'MinSidebar', '1' );
		exit(  );

		if ($a == 'maxsidebar') {
			dfabehjiaj::delete( 'MinSidebar' );
			exit(  );
			$ticketmatches = '';
			$invoicematches = ;
			$tempmatches = ;
			$matches = ;

			if ($intellisearch) {
				check_token( 'WHMCS.admin.default' );
				trim( $_POST['value'] );
				$value = ;

				if (( strlen( $value ) < 3 && !is_numeric( $value ) )) {
					exit(  );
					db_escape_string( $value );
					$value = ;

					if (( checkPermission( 'List Clients', true ) || checkPermission( 'View Clients Summary', true ) )) {
						$query =  . 'SELECT id,firstname,lastname,companyname,email,status FROM tblclients WHERE concat(firstname,\' \',lastname) LIKE \'%' . $value . '%\' OR companyname LIKE \'%' . $value . '%\' OR address1 LIKE \'%' . $value . '%\' OR address2 LIKE \'%' . $value . '%\' OR postcode LIKE \'%' . $value . '%\' OR phonenumber LIKE \'%' . $value . '%\'';

						if (is_numeric( $value )) {
							$query .= (  . ' OR id=\'' . $value . '\'' );

							if (( is_numeric( $value ) && strlen( $value ) == 4 )) {
								$query .= (  . ' OR cardlastfour=\'' . $value . '\'' );
							}
						}
					}
				}
			}

			(  );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$userid = ;
				$data['firstname'];
				$firstname = ;
				$data['lastname'];
				$lastname = ;
				$data['companyname'];
				$companyname = ;
				$data['email'];
				$email = ;
				$data['status'];
				$status = ;

				if ($companyname) {
					$companyname = (  . ' (' . $companyname . ')' );
					$tempmatches .= (  . '<div class="searchresult"><a href="clientssummary.php?userid=' . $userid . '"><strong>' . $firstname . ' ' ) . $lastname . $companyname . '</strong> #' . $userid . ' <span class="label ' . strtolower( $status ) . (  . '">' . $status . '</span><br /><span class="desc">' . $email . '</span></a></div>' );
				}
			}
		}
	}
}
else {
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$invoiceid = ;
		$data['userid'];
		$userid = ;
		$data['firstname'];
		$firstname = ;
		$data['lastname'];
		$lastname = ;
		$data['companyname'];
		$companyname = ;
		$data['status'];
		$status = ;

		if ($companyname) {
			$companyname = (  . ' (' . $companyname . ')' );
			$data['id'];
			$id = ;
			$invoicematches .=  . '<div class="searchresult"><a href="invoices.php?action=edit&id=' . $invoiceid . '"><strong>Invoice #' . $id . '</strong> <span class="label ' . strtolower( $status ) . ( (  . '">' . $status . '</span><br><span class="desc">' . $firstname . ' ' ) . $lastname . $companyname . ' #' . $userid . '</span></a></div>' );
		}
	}
}


while (true) {
	$tempmatches .=  . (  . $companyname . '</strong> #' . $userid . '<br /><span class="desc">' . $email . '</span></a></div>' );
}


if ($tempmatches) {
	$matches .=  . '<div class="searchresultheader">Search Results</div>' . $tempmatches;

	if (!$matches) {
		$matches = '<div class="searchresultheader">No Matches Found!</div>';
		echo $matches;
		exit(  );

		if ($type == 'clients') {
			if (( $field == 'ID' || $field == 'Client ID' )) {
				$searchin = 'userid';
			}
		}
	}
}

$searchin = 'address';
jmp;

if ($field == 'State') {
	$searchin = 'address';
}


if ((bool)) {
	$searchin = 'id';
}

(  . $q, 'clientsdomainlist.php' );
?>
