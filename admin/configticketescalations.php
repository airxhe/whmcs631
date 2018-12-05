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
new dgeegejige( 'Configure Support Departments' );
$aInt = ;
$aInt->title = $aInt->lang( 'supportticketescalations', 'supportticketescalationstitle' );
$aInt->sidebar = 'config';
$aInt->icon = 'todolist';
$aInt->helplink = 'Support Ticket Escalations';
$whmcs->get_req_var( 'action' );
$action = ;
$id = (int)$whmcs->get_req_var( 'id' );

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'name' );
	$name = ;
	$whmcs->get_req_var( 'departments' );
	$departments = array(  );
	$whmcs->get_req_var( 'statuses' );
	$statuses = array(  );
	$whmcs->get_req_var( 'priorities' );
	$priorities = array(  );
	$whmcs->get_req_var( 'timeelapsed' );
	$timeelapsed = ;
	$newdepartment = (int)$whmcs->get_req_var( 'newdepartment' );
	$whmcs->get_req_var( 'newstatus' );
	$newstatus = ;
	$whmcs->get_req_var( 'newpriority' );
	$newpriority = ;
	$flagto = (int)$whmcs->get_req_var( 'flagto' );
	$whmcs->get_req_var( 'notify' );
	$notify = array(  );
	$whmcs->get_req_var( 'addreply' );
	$addreply = ;

	if (is_array( $departments )) {
		implode( ',', $departments );
		$departments = ;

		if (is_array( $statuses )) {
			implode( ',', $statuses );
			$statuses = ;

			if (is_array( $priorities )) {
				implode( ',', $priorities );
				$priorities = ;

				if (is_array( $notify )) {
					implode( ',', $notify );
					$notify = ;

					if ($id) {
						dacfgegdhe::table( 'tblticketescalations' )->find( $id );
						$ticketEscalation = ;

						if ($ticketEscalation->name != $name) {
							logAdminActivity( 'Ticket Escalation Modified: Name Changed: ' . ( (  . '\'' ) . $ticketEscalation->name . '\' to \'' . $name . '\' - Escalation ID: ' . $id ) );

							if (( ( ( ( ( ( ( ( ( $ticketEscalation->departments != $departments || $ticketEscalation->statuses != $statuses ) || $ticketEscalation->priorities != $priorities ) || $ticketEscalation->timeelapsed != $timeelapsed ) || $ticketEscalation->newdepartment != $newdepartment ) || $ticketEscalation->newstatus != $newstatus ) || $ticketEscalation->newpriority != $newpriority ) || $ticketEscalation->flagto != $flagto ) || $ticketEscalation->notify != $notify ) || $ticketEscalation->addreply != $addreply )) {
								logAdminActivity(  . 'Ticket Escalation Modified: \'' . $name . '\' - Escalation ID: ' . $id );
								update_query( 'tblticketescalations', array( 'name' => $name, 'departments' => $departments, 'statuses' => $statuses, 'priorities' => $priorities, 'timeelapsed' => $timeelapsed, 'newdepartment' => $newdepartment, 'newstatus' => $newstatus, 'newpriority' => $newpriority, 'flagto' => $flagto, 'notify' => $notify, 'addreply' => $addreply ), array( 'id' => $id ) );
								redir( 'saved=true' );
							}
						}
					}
				}
			}
		}
	}
	else {
		$departments = ;
		$data['statuses'];
		$statuses = ;
		$data['priorities'];
		$priorities = ;
		$data['timeelapsed'];
		$timeelapsed = ;
		$data['newdepartment'];
		$newdepartment = ;
		$data['newstatus'];
		$newstatus = ;
		$data['newpriority'];
		$newpriority = ;
		$data['flagto'];
		$flagto = ;
		$data['notify'];
		$notify = ;
		$data['addreply'];
		$addreply = ;
		explode;
	}

	( ',', $departments );
	$departments = ;
	explode( ',', $statuses );
	$statuses = ;
	explode( ',', $priorities );
	$priorities = ;
	explode( ',', $notify );
	$notify = ;
}

select_query( 'tblticketdepartments', '', '', 'name', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
	$departmentid = ;
	$data['name'];
	$departmentname = ;
	echo (  . '<option value="' . $departmentid . '"' );

	if (in_array( $departmentid, $departments )) {
		echo ' selected';
		echo (  . '>' ) . $departmentname . '</option>';
	}

	jmp;
	( '', '', 'sortorder', 'ASC' );
	$result = ;
	mysql_fetch_assoc( $result );

	if ($data = ) {
		$data['title'];
		$title = ;
		echo '<option';

		if (in_array( $title, $statuses )) {
			echo ' selected';
			echo '>' . $title . '</option>';
		}
	}
	else {
		echo ;

		if ($newdepartment == $departmentid) {
			echo ' selected';
			echo (  . '>' ) . $departmentname . '</option>';
		}
	}

	echo ;
	echo ' -</option>
';
	select_query( 'tblticketstatuses', '', '', 'sortorder', 'ASC' );
	$result = ;
	mysql_fetch_assoc( $result );

	if ($data = ) {
		$data['title'];
		$title = ;
		echo '<option';

		if ($title == $newstatus) {
			echo ' selected';
			echo '>' . $title . '</option>';
		}
	}
	else {
		if ((  )) {
			echo ' checked';
			echo ' /> ';
			echo $aInt->lang( 'supportticketescalations', 'notifyadminsdesc' );
		}

		echo '</label>
<div style="padding:5px;">';
		echo $aInt->lang( 'supportticketescalations', 'alsonotify' );
		echo ':</div>
';
		select_query;
		'tbladmins';
		'';
		'';
		'username';
	}

	( 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		echo '<label class="checkbox-inline"><input type="checkbox" name="notify[]" value="' . $data['id'] . '"';

		if (in_array( $data['id'], $notify )) {
			echo ' checked';
			echo ' /> ';

			if ($data['disabled'] == 1) {
				echo '<span class="disabledtext">';
				echo $data['username'] . ' (' . $data['firstname'] . ' ' . $data['lastname'] . ')';

				if ($data['disabled'] == 1) {
				}
			}
		}

		echo ' - ' . $aInt->lang( 'global', 'disabled' ) . '</span> ';
		echo '</label>';
	}
}

jmp;
	= $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
