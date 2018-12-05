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

function getAdminPermsArray() {
	return ebfjeadgfa::all(  );
}

function checkPermission($action, $noredirect = '') {
	static $AdminRoleID = 0;
	static $AdminRolePerms = array(  );

	$permid = ;

	if (isset( $_SESSION['adminid'] )) {
		if (!$AdminRoleID) {
			select_query( 'tbladmins', 'roleid', array( 'id' => $_SESSION['adminid'] ) );
			$result = ;
			mysql_fetch_array;
		}

		( $result );
		$data = ;
		$data['roleid'];
		$roleid = ;
		$AdminRoleID = $result;
		count;
	}


	if (!( $AdminRolePerms )) {
		select_query;
		'tbladminperms';
		'permid';
		array( 'roleid' => $AdminRoleID );
	}

	(  );
	$result = array_search( $action, getAdminPermsArray(  ) );
	mysql_fetch_array( $result );

	if ($data = ) {
		$AdminRolePerms[] = $data[0];
	}

	jmp;
	(  . $permid, 'accessdenied.php' );
}

/**
 * Generate an "information" HTML block
 *
 * This function is used to generate the "flash" notification content for
 * admin interface pages.
 *
 * @param string $title Short title or state to present
 * @param string $description Descriptive text to explain the state
 * @param string $status Type of notification (success, error, info [default])
 *
 * @return string HTML div
 */
function infoBox($title, $description, $status = 'info') {
	global $infobox;

	if (( $status == 'error' || $status == 'success' )) {
		$class = $status . 'box';
	}

	sprintf( '<div class="%s"><strong><span class="title">%s</span></strong><br />%s</div>', $class, $title, $description );
	$infobox = ;
	return $infobox;
}

/**
 * Obtain the admin name from the passed admin id.
 * If no id is passed, id is obtained from session.
 *
 * @param int $adminId
 *
 * @return string
 */
function getAdminName($adminId = 0) {
	static $adminNames = null;

	if (!$adminNames) {
		$adminNames = array(  );
	}

	$adminId = eaaadiagec::get( 'adminid' );

	if (!empty( $adminNames[$adminId] )) {
		return $adminNames[$adminId];
		get_query_vals;
		'tbladmins';
		'firstname,lastname';
		array( 'id' => $adminId );
	}

	(  );
	$data = ;
	trim( $data['firstname'] . ' ' . $data['lastname'] );
	$adminName = ;
	$adminNames[$adminId] = $adminName;
	return $adminName;
}

function getAdminHomeStats($type = '') {
	global $currency;

	$stats = array(  );
	getCurrency( 0, 1 );
	$currency = ;

	if (( !$type || $type == 'income' )) {
		full_query( 'SELECT SUM((amountin-fees-amountout)/rate) FROM tblaccounts WHERE date LIKE \'' . date( 'Y-m-d' ) . '%\'' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		formatCurrency( $data[0] );
		$todaysincome = ;
		$stats['income']['today'] = $todaysincome;
		full_query( 'SELECT SUM((amountin-fees-amountout)/rate) FROM tblaccounts WHERE date LIKE \'' . date( 'Y-m-' ) . '%\'' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		formatCurrency( $data[0] );
		$todaysincome = ;
		$stats['income']['thismonth'] = $todaysincome;
		full_query;
		date;
	}

	( 'SELECT SUM((amountin-fees-amountout)/rate) FROM tblaccounts WHERE date LIKE \'' . ( 'Y-' ) . '%\'' );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	formatCurrency( $data[0] );
	$todaysincome = ;
	$stats['income']['thisyear'] = $todaysincome;

	if ($type == 'income') {
		return $stats;
		full_query( 'SELECT SUM(total)-COALESCE(SUM((SELECT SUM(amountin) FROM tblaccounts WHERE tblaccounts.invoiceid=tblinvoices.id)),0) FROM tblinvoices WHERE tblinvoices.status=\'Unpaid\' AND duedate<\'' . date( 'Ymd' ) . '\'' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$overdueinvoices = ;
		$stats['invoices']['overduebalance'] = $data[1];
		full_query( 'SELECT COUNT(*) FROM tblcancelrequests INNER JOIN tblhosting ON tblhosting.id=tblcancelrequests.relid WHERE (tblhosting.domainstatus!=\'Cancelled\' AND tblhosting.domainstatus!=\'Terminated\')' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$stats['cancellations']['pending'] = $data[0];
		$stats['orders']['today']['cancelled'] = 0;
		$stats['orders']['today']['pending'] = ;
		$stats['orders']['today']['fraud'] = ;
		$stats['orders']['today']['active'] = ;
		$query = 'SELECT status,COUNT(*) FROM tblorders WHERE date LIKE \'' . date( 'Y-m-d' ) . '%\' GROUP BY status';
		full_query( $query );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$stats['orders']['today'][strtolower( $data[0] )] = $data[1];
		}
	}


	while (true) {
		$query = 'SELECT status,COUNT(*) FROM tblorders WHERE date LIKE \'' . ( 'Y-m-d', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) - 1, date( 'Y' ) ) ) . '%\' GROUP BY status';
		full_query( $query );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			strtolower;
			$data[0];
		}

		$stats['orders']['yesterday'][(  )] = $data[1];
	}

	$stats['orders']['yesterday']['total'] = $stats['orders']['yesterday']['active'] + $stats['orders']['yesterday']['fraud'] + $stats['orders']['yesterday']['pending'] + $stats['orders']['yesterday']['cancelled'];
	$query = 'SELECT COUNT(*) FROM tblorders WHERE date LIKE \'' . date( 'Y-m-' ) . '%\'';
	full_query( $query );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$stats['orders']['thismonth']['total'] = $data[0];
	$query = 'SELECT COUNT(*) FROM tblorders WHERE date LIKE \'' . date( 'Y-' ) . '%\'';
	full_query( $query );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$stats['orders']['thisyear']['total'] = $data[0];
	global $disable_admin_ticket_page_counts;

	if (!$disable_admin_ticket_page_counts) {
		$awaitingreply = 6;
		$allactive = ;
		$ticketcounts = array(  );
		$query = 'SELECT tblticketstatuses.title,(SELECT COUNT(*) FROM tbltickets WHERE tbltickets.status=tblticketstatuses.title),showactive,showawaiting FROM tblticketstatuses ORDER BY sortorder ASC';
		full_query( $query );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			preg_replace( '/[^a-z0-9]/', '', strtolower( $data[0] ) );
		}

		$stats['tickets'][] = $data[1];

		if ($data['showactive']) {
			$data[1];
			$allactive += ;

			if ($data['showawaiting']) {
				$data[1];
				$awaitingreply += ;
			}
		}
	}
	else {
		$query = 'SELECT COUNT(*) FROM tblnetworkissues WHERE status!=\'Scheduled\' AND status!=\'Resolved\'';
		full_query( $query );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$stats['networkissues']['open'] = $data[0];
		select_query( 'tblbillableitems', 'COUNT(*)', array( 'invoicecount' => '0' ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$stats['billableitems']['uninvoiced'] = $data[0];
		select_query( 'tblquotes', 'COUNT(*)', array( 'validuntil' => array( 'sqltype' => '>', 'value' => date( 'Ymd' ) ) ) );
		$result = ;
		mysql_fetch_array( $result );
	}

	$data = ;
	$stats['quotes']['valid'] = $data[0];
	return $stats;
}

/**
 * Mask characters in a string (matching length)
 *
 * @param string $password
 *
 * @return string
 */
function replacePasswordWithMasks($password) {
	if (0 < strlen( $password )) {
		str_pad;
		'';
		strlen( $password );
	}

	return ( '*' );
}

/**
 * Determine if a masked password has been changed
 *
 * @param string $newPassword
 * @param string $originalPassword
 *
 * @return bool
 */
function hasMaskedPasswordChanged($newPassword, $originalPassword) {
	$passwordInputIsOnlyMask = str_replace( '*', '', $newPassword ) == '';
	$passwordInputIsMaskExactlyAsLongAsPreviousPassword = strlen( $newPassword ) == strlen( $originalPassword );
	$previousPasswordIsOnlyMaskMarks = str_replace( '*', '', $originalPassword ) == '';
	(  && !$passwordInputIsOnlyMask );
}

/**
 * Interpret Masked Password Change to determine if stored value needs updating
 *
 * @param string $newPassword
 * @param string $originalPassword
 *
 * @return false|string False on no change, otherwise value to store
 */
function interpretMaskedPasswordChangeForStorage($newPassword, $originalPassword) {
	(bool);

	if (!$newPassword) {
		return '';

		if (hasMaskedPasswordChanged( $newPassword, $originalPassword )) {
		}
	}

	return encrypt( dfdidhdbdc::decode( $newPassword ) );
}

/**
 * Log Admin Activity using the logActivity function.
 *
 * Using a separate function allows us to see where the specific admin logging
 * is occurring. Also allows this to be easily replaced in the future if required.
 *
 * @param string $description
 */
function logAdminActivity($description) {
	logActivity( $description );
}

?>
