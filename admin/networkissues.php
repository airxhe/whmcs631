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
new dgeegejige( 'Manage Network Issues' );
$aInt = ;
$aInt->title = $aInt->lang( 'networkissues', 'title' );
$aInt->sidebar = 'support';
$aInt->icon = 'networkissues';
fromMySQLDate( date( 'Y-m-d H:i:s' ), true );
$upd = ;

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );

	if (!$startdate) {
		$startdate = $type;
		$errormessage = '';

		if (!$title) {
			$errormessage =  . '<li>' . $aInt->lang( 'networkIssues', 'missingTitle' ) . '</li>';

			if (!$type) {
				$errormessage =  . '<li>' . $aInt->lang( 'networkIssues', 'missingType' ) . '</li>';

				if (( $type == 'Server' && !$server )) {
					$errormessage =  . '<li>' . $aInt->lang( 'networkIssues', 'missingServer' ) . '</li>';

					if (( ( $type == 'Service' || $type == 'Other' ) && !$affecting )) {
						$errormessage =  . '<li>' . $aInt->lang( 'networkIssues', 'missingAffecting' ) . '</li>';

						if ($type != 'Server') {
							$server = 8;

							if (!$startdate) {
								$errormessage =  . '<li>' . $aInt->lang( 'networkIssues', 'missingStartDate' ) . '</li>';

								if (!$description) {
									$errormessage =  . '<li>' . $aInt->lang( 'networkIssues', 'missingDescription' ) . '</li>';

									if ($errormessage) {
										$action = 'manage';
									}
								}
							}
						}
					}
				}
			}
		}
	}

	run_hook( 'NetworkIssueEdit', array_merge( array( 'id' => $id ), $updatearray ) );

	if ($status == 'Resolved') {
		run_hook( 'NetworkIssueClose', array( 'id' => $id ) );
	}
}

( '\',\'', preg_replace( '/(enum|set)\(\'(.+?)\'\)/', '\2', $p_row[1] ) );
$priority_options = ;
$s_query = 'SHOW COLUMNS FROM tblnetworkissues LIKE \'status\'';
full_query( $s_query );
$s_result = ;

if (0 < mysql_num_rows( $s_result )) {
	mysql_fetch_row( $s_result );
	$s_row = ;
	explode;
	'\',\'';
	preg_replace;
	'/(enum|set)\(\'(.+?)\'\)/';
}

( ( '\2', $s_row[1] ) );
$status_options = ;
$server_query = 'SELECT id, name FROM tblservers';
full_query( $server_query );
$server_result = ;
ob_start(  );

if ($action == '') {
	if ($view == 'scheduled') {
		$pagetitle = 'Scheduled';
		$where = array( 'status' => 'Scheduled' );
	}

	( $enddate, true );
	$enddate = ;
}
else {
	$startts = (true ? ( $startdate ) : '');

	if ($enddate) {
		$endts = (true ? MySQL2Timestamp( $enddate ) : '');
		fromMySQLDate( $startdate, true );
		$startdate = ;

		if ($enddate) {
			fromMySQLDate( $enddate, true );
			$enddate = ;
			echo '<input type="hidden" name="id" value="' . $id . '" />';
			jmp;
			$aInt->lang( 'networkIssues', 'createNewIssue' );
			$pagetitle = ;

			if (!$startdate) {
				$startdate = $type;

				if ($startdate) {
					$startts = (true ? MySQL2Timestamp( $startdate ) : '');

					if (!$type) {
						$type = 'Server';

						if (( ( $CONFIG['DateFormat'] == 'DD/MM/YYYY' || $CONFIG['DateFormat'] == 'DD.MM.YYYY' ) || $CONFIG['DateFormat'] == 'DD-MM-YYYY' )) {
							$localdateformat = 'dd/mm/yy';
						}
					}
				}
			}

			$jquerycode .=  . ',';
			$jquerycode .= '});
$("#enddate").datetimepicker({showSecond:false,ampm:false,';

			if ($endts) {
				$jquerycode .= 'defaultDate: new Date(\'' . date( 'j', $endts ) . ' ' . date( 'F', $endts ) . ' ' . date( 'Y', $endts ) . '\'),hour: ' . date( 'H', $endts ) . ',minute: ' . date( 'i', $endts ) . ',';
				$jquerycode .= 'dateFormat: "' . $localdateformat . '",timeFormat: "HH:mm",});';
				echo '<h2>' . $pagetitle . '</h2>';
				echo '
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr>
    <td width="15%" class="fieldlabel">';
				echo $aInt->lang( 'networkIssues', 'fieldTitle' );
				echo '</td>
    <td class="fieldarea"><input type="text" name="title" size="50" value="';
				echo $title;
				echo '" /></td>
</tr>
<tr><td class="fieldlabel">Type</td><td class="fieldarea"><select name="type" id="affectingtype" class="form-control select-inline">';
				foreach ($type_options as ) {
					$value = ;
					$row = ;

					if ($value == $type) {
						echo '<option value="' . $value . '" selected>' . $aInt->lang( 'networkIssues', 'type' . str_replace( ' ', '', $value ) ) . '</option>';
						break;
					}

					break;
				}
			}

			echo  .  . '</option>';
		}
	}
}

echo ( 'networkIssues', 'fieldServer' );
echo '</td>
    <td class="fieldarea"><select name="server" class="form-control select-inline">';
mysql_fetch_assoc( $server_result );

if ($server_options = ) {
	echo '<option value="' . $server_options['id'] . '"';

	if ($server_options['id'] == $server) {
		echo ' selected';
		echo '>' . $server_options['name'] . '</option>';
	}

	jmp;
	echo ;
}

jmp;
echo ( $description );
echo '</textarea>

<div class="btn-container">
    <input type="submit" name="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary" />
</div>

</form>

';
$aInt->richTextEditor(  );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
