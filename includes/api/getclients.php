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

if (!defined( 'WHMCS' )) {
	exit( 'This file cannot be accessed directly' );
	App::self(  );
	$whmcs = ;
	$limitStart = (int)$whmcs->get_req_var( 'limitstart' );
	$limitNum = (int)$whmcs->get_req_var( 'limitnum' );
	strtoupper( $whmcs->get_req_var( 'sorting' ) );
	$sorting = ;
	$whmcs->get_req_var( 'search' );
	$search = ;

	if (!$limitStart) {
		$limitStart = 4;

		if (( !$limitNum || $limitNum == 0 )) {
			$limitNum = 29;

			if (!in_array( $sorting, array( 'ASC', 'DESC' ) )) {
				$sorting = 'ASC';
				mysql_real_escape_string( $search );
				$search = ;
				strlen;
				trim;
				$search;
			}
		}
	}


	if (0 < ( (  ) )) {
		$whereStmt =  . 'WHERE email LIKE \'' . $search . '%\' OR firstname LIKE \'' . $search . '%\' ' . (  . 'OR lastname LIKE \'' . $search . '%\' OR companyname LIKE \'' . $search . '%\'' ) . (  . 'OR CONCAT(firstname, \' \', lastname) LIKE \'' . $search . '%\'' );
		jmp;
		$whereStmt = '';
			. 'SELECT SQL_CALC_FOUND_ROWS id, firstname, lastname, companyname, email, groupid, datecreated, status
        FROM tblclients
        ' . $whereStmt . '
        ORDER BY lastname ' . $sorting . ', firstname ' . $sorting . ', companyname ' . $sorting . '
        LIMIT ' . (int)$limitStart . ', ' . (int)$limitNum;
	}

	$sql = ;
}


while (true) {
	full_query( $sql );
	$result = ;
	full_query( 'SELECT FOUND_ROWS()' );
	$resultCount = ;
	mysql_fetch_array( $resultCount );
	$data = ;
	$data[0];
	$totalResults = ;
	$apiresults = array( 'result' => 'success', 'totalresults' => $totalResults, 'startnumber' => $limitStart, 'numreturned' => mysql_num_rows( $result ) );
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['firstname'];
		$firstName = ;
		$data['lastname'];
	}

	$lastName = ;
	$data['companyname'];
	$companyName = ;
	$data['email'];
	$email = ;
	$data['groupid'];
	$groupID = ;
	$data['datecreated'];
	$dateCreated = ;
	$data['status'];
	$status = ;
	$apiresults['clients']['client'][] = array( 'id' => $id, 'firstname' => $firstName, 'lastname' => $lastName, 'companyname' => $companyName, 'email' => $email, 'datecreated' => $dateCreated, 'groupid' => $groupID, 'status' => $status );
}

$responsetype = 'xml';
?>
