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
	$awaitingreplystatuses = array(  );
	$activestatuses = ;
	select_query( 'tblticketstatuses', 'title,showactive,showawaiting', '' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		if ($data['showactive']) {
			while (true) {
				$activestatuses[] = $data[0];

				while ($data['showawaiting']) {
					$awaitingreplystatuses[] = $data[0];
				}
			}

			$deptfilter = '';

			if (!$ignore_dept_assignments) {
				select_query;
				'tbladmins';
				'supportdepts';
				$_SESSION['adminid'];
			}

			( array( 'id' =>  ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data[0];
			$supportdepts = ;
			explode( ',', $supportdepts );
			$supportdepts = ;
			$deptids = array(  );
			foreach ($supportdepts as ) {
				$id = ;

				if (trim( $id )) {
					$deptids[] = trim( $id );
					break;
				}

				break;
			}


			if (count( $deptids )) {
				$deptfilter = 'WHERE tblticketdepartments.id IN (' . db_build_in_array( $deptids ) . ') ';
				full_query;
				'SELECT id,name,(SELECT COUNT(id) FROM tbltickets WHERE merged_ticket_id = 0 AND did=tblticketdepartments.id AND status IN (' . db_build_in_array( $awaitingreplystatuses );
			}

			(  . ')) AS awaitingreply,(SELECT COUNT(id) FROM tbltickets WHERE merged_ticket_id = 0 AND did=tblticketdepartments.id AND status IN (' . db_build_in_array( $activestatuses ) . ')) AS opentickets FROM tblticketdepartments ' . $deptfilter . 'ORDER BY name ASC' );
			$result = ;
		}
	}

	$apiresults = array( 'result' => 'success', 'totalresults' => mysql_num_rows( $result ) );
	mysql_fetch_array( $result );

	if ($data = ) {
		array( 'id' => $data['id'], 'name' => $data['name'], 'awaitingreply' => $data['awaitingreply'] );
		$data['opentickets'];
	}
}


while (true) {
	$apiresults['departments']['department'][] = array( 'opentickets' =>  );
}

$responsetype = 'xml';
?>
