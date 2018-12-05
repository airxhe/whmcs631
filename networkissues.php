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

$fromserverstatus = true;

if (!defined( 'CLIENTAREA' )) {
	define( 'CLIENTAREA', true );
	require( 'init.php' );
	$templatepath = ROOTDIR . '/templates/' . $CONFIG['Template'] . '/';

	if (( !file_exists( $templatepath . 'networkissues.tpl' ) && file_exists( $templatepath . 'serverstatus.tpl' ) )) {
		redir( '', 'serverstatus.php' );
		$_LANG['networkissuestitle'];
		$pagetitle = ;
		$pageicon = 'images/clientarea_big.gif';
		$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="networkissues.php">' . $_LANG['networkissuestitle'] . '</a>';
		$fromserverstatus = false;
		$whmcs->get_req_var( 'view' );
		$view = ;

		if ($view == 'open') {
			$query_where = 'status!=\'Resolved\' AND status!=\'Scheduled\'';
			$breadcrumbnav .= ' > <a href="networkissues.php?view=open">' . $_LANG['networkissuesstatusopen'] . '</a>';
			jmp;

			if ($view == 'scheduled') {
				$query_where = 'status=\'Scheduled\'';
				$breadcrumbnav .= ' > <a href="networkissues.php?view=scheduled">' . $_LANG['networkissuesstatusscheduled'] . '</a>';
				jmp;

				if ($view == 'resolved') {
					$query_where = 'status=\'Resolved\'';
					$breadcrumbnav .= ' > <a href="networkissues.php?view=resolved">' . $_LANG['networkissuesstatusresolved'] . '</a>';
				}

				$query_where = 'id=' . ;
				jmp;
				$query_where = 'status!=\'Resolved\'';

				if (!$fromserverstatus) {
					initialiseClientArea( $pagetitle, $pageicon, $breadcrumbnav );

					if (( $CONFIG['NetworkIssuesRequireLogin'] && !$_SESSION['uid'] )) {
						$goto = 'networkissues';
						require( 'login.php' );
						$issueStatusCounts = array(  );
						select_query( 'tblnetworkissues', 'COUNT(*)', 'status!=\'Resolved\' AND status!=\'Scheduled\'' );
						$result = ;
						mysql_fetch_array( $result );
						$data = ;
						$smartyvalues['opencount'] = $data[0];
						$issueStatusCounts['open'] = $data[0];
						select_query( 'tblnetworkissues', 'COUNT(*)', 'status=\'Scheduled\'' );
						$result = ;
						mysql_fetch_array( $result );
						$data = ;
						$smartyvalues['scheduledcount'] = $data[0];
						$issueStatusCounts['scheduled'] = $data[0];
						select_query( 'tblnetworkissues', 'COUNT(*)', 'status=\'Resolved\'' );
						$result = ;
						mysql_fetch_array( $result );
						$data = ;
						$smartyvalues['resolvedcount'] = $data[0];
						$issueStatusCounts['resolved'] = $data[0];
						$users_servers = array(  );

						if (isset( $_SESSION['uid'] )) {
							select_query( 'tblhosting', 'DISTINCT server', array( 'userid' => $_SESSION['uid'] ) );
							$result = ;
							mysql_fetch_array( $result );

							if ($data = ) {
								if ($data['server']) {
									$users_servers[] = $data['server'];
								}
							}
						}
					}
				}
				else {
					(  );
					$data = ;
					$data[0];
					$numitems = ;
					clientAreaTableInit( 'networkissues', 'lastupdate', 'DESC', $numitems )[2];
					$limit = ;
					[1];
					$sort = ;
					[0];
					$orderby = ;
					$smartyvalues['orderby'] = $orderby;
					$smartyvalues['sort'] = strtolower( $sort );
					$issues = array(  );
					select_query( 'tblnetworkissues', '', $query_where, $orderby, $sort, $limit );
					$result = ;
					mysql_fetch_array( $result );

					if ($data = ) {
						fromMySQLDate( $data['startdate'], true );
						$startdate = ;
						fromMySQLDate;
						$data['lastupdate'];
					}
				}
			}
		}
	}
}

( true );
$lastupdate = ;

if (!is_null( $data['enddate'] )) {
	fromMySQLDate( $data['enddate'], true );
	$enddate = ;
	jmp;
	$enddate = '';
	$_LANG['networkissuespriority' . strtolower( $data['priority'] )];
	$priority = ;
	$_LANG['networkissuesstatus' . str_replace( ' ', '', strtolower( $data['status'] ) )];
	$status = ;
	$_LANG['networkissuestype' . strtolower( $data['type'] )];
	$type = ;
	$affected = false;

	if ($data['server']) {
		if (in_array( $data['server'], $users_servers )) {
		}

		$affected = true;
		select_query( 'tblservers', 'name', array( 'id' => $data['server'] ) );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data2 = ;
		$data2['name'];
		$servername = ;
	}

	$issues[] = array( 'description' => , 'type' => $type, 'affecting' => $data['affecting'], 'server' => $servername, 'priority' => $priority, 'rawPriority' => $data['priority'], 'status' => $status, 'lastupdate' => $lastupdate, 'clientaffected' => $affected );
}

jmp = $view;
array_merge( $smartyvalues, clientAreaTablePageNav( $numitems ) );
$smartyvalues = ;

if (isset( $_LANG['networkissuesstatus' . $view] )) {
	$_LANG['networkissuesstatus' . $view];
}

$smartyvalues['noissuesmsg'] = sprintf( $_LANG['networkstatusnone'], '' );

if (!$fromserverstatus) {
	$templatefile = 'networkissues';
	outputClientArea;
	$templatefile;
	false;
	array( 'ClientAreaPageNetworkIssues' );
}

(  );
?>
