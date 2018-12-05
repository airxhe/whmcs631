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

	if (!$limitstart) {
		$limitstart = 8;

		if (!$limitnum) {
		}
	}
}

$limitnum = 33;
$deptid = (int)App::get_req_var( 'deptid' );
$clientid = (int)App::get_req_var( 'clientid' );
$filters = array(  );

if ($deptid) {
	$filters[] = 'did IN (' . $deptid . ')';

	if ($clientid) {
		$filters[] = 'userid=\'' . $clientid . '\'';

		if ($email) {
			$filters[] = '(email=\'' . mysql_real_escape_string( $email ) . '\' OR userid=(SELECT id FROM tblclients WHERE email=\'' . mysql_real_escape_string( $email ) . '\'))';

			if ($status == 'Awaiting Reply') {
				$statusfilter = '';
				select_query( 'tblticketstatuses', 'title', array( 'showawaiting' => '1' ) );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					$statusfilter .= '\'' . $data[0] . '\',';
				}
			}
		}
	}
}
else {
	$filters[] = (  . $statusfilter . ')' );
}

$deptids = ;
foreach ($supportdepts as ) {
	$id = ;

	if (trim( $id )) {
		$deptids[] = trim( $id );
		break;
	}

	break;
}


if (count( $deptids )) {
	$filters[] = 'did IN (' . db_build_in_array( $deptids ) . ')';
	implode;
	' AND ';
}

( $filters );
$where = ;
select_query( 'tbltickets', 'COUNT(id)', $where );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data[0];
$totalresults = ;
$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults, 'startnumber' => $limitstart );
select_query( 'tbltickets', '', $where, 'lastreply', 'DESC', (  . $limitstart . ',' ) . $limitnum );
$result = ;
$apiresults['numreturned'] = mysql_num_rows( $result );

while (true) {
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['tid'];
		$tid = ;
		$data['did'];
		$deptid = ;
		$data['userid'];
		$userid = ;
		$data['name'];
		$name = ;
		$data['email'];
		$email = ;
		$data['cc'];
		$cc = ;
		$data['c'];
		$c = ;
		$data['date'];
		$date = ;
		$data['title'];
		$subject = ;
		$data['message'];
		$message = ;
		$data['status'];
		$status = ;
		$data['urgency'];
		$priority = ;
		$data['admin'];
		$admin = ;
		$data['attachment'];
		$attachment = ;
		$data['lastreply'];
		$lastreply = ;
		$data['flag'];
		$flag = ;
		$data['service'];
		$service = ;

		if ($userid) {
			select_query( 'tblclients', '', array( 'id' => $userid ) );
			$result2 = ;
			mysql_fetch_array( $result2 );
			$data = ;
			$name = $data['firstname'] . ' ' . $data['lastname'];

			if ($data['companyname']) {
				$name .= ' (' . $data['companyname'] . ')';
				$data['email'];
				$email = ;
				array( 'id' => $id, 'tid' => $tid, 'deptid' => $deptid, 'userid' => $userid, 'name' => $name );
			}
		}

		array( 'email' => $email, 'cc' => $cc, 'c' => $c, 'date' => $date, 'subject' => $subject, 'status' => $status, 'priority' => $priority, 'admin' => $admin, 'attachment' => $attachment, 'lastreply' => $lastreply, 'flag' => $flag, 'service' => $service );
		$apiresults['tickets']['ticket'];
	}

	[] = ;
}

$responsetype = 'xml';
?>
