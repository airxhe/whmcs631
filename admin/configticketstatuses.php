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
new dgeegejige( 'Configure Ticket Statuses' );
$aInt = ;
$aInt->title = $aInt->lang( 'setup', 'ticketstatuses' );
$aInt->sidebar = 'config';
$aInt->icon = 'clients';
$aInt->helplink = 'Support Ticket Statuses';
$whmcs->get_req_var( 'action' );
$action = ;
$id = (int)$whmcs->get_req_var( 'id' );

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'title' );
	$title = ;
	$whmcs->get_req_var( 'color' );
	$color = ;
	$sortorder = (int)$whmcs->get_req_var( 'sortorder' );
	$showactive = (int)(string)$whmcs->get_req_var( 'showactive' );
	$showawaiting = (int)(string)$whmcs->get_req_var( 'showawaiting' );
	$autoclose = (int)(string)$whmcs->get_req_var( 'autoclose' );

	if ($id) {
		dacfgegdhe::table( 'tblticketstatuses' )->find( $id );
		$ticketStatus = ;

		if ($ticketStatus->title != $title) {
			logAdminActivity( 'Support Ticket Status Modified: ' . (  . 'Title Changed: \'' . $ticketStatus->title . '\' to \'' . $title . '\' - Ticket Status ID: ' . $id ) );
			( $ticketStatus->color != $color || $ticketStatus->sortorder != $sortorder );
		}
	}
}


if (( ( (  || $ticketStatus->showactive != $showactive ) || $ticketStatus->showawaiting != $showawaiting ) || $ticketStatus->autoclose != $autoclose )) {
	logAdminActivity(  . 'Support Ticket Status Modified: \'' . $title . '\' - Ticket Status ID: ' . $id );
	update_query( 'tblticketstatuses', array( 'title' => trim( $title ), 'color' => $color, 'sortorder' => $sortorder, 'showactive' => $showactive, 'showawaiting' => $showawaiting, 'autoclose' => $autoclose ), array( 'id' => $id ) );
	redir( 'update=true' );
}


while (true) {
	if ($data = ) {
		$data['id'];
		$statusid = ;
		$data['title'];
		$title = ;
		$data['color'];
		$color = ;
		$data['showactive'];
		$showactive = ;
		$data['showawaiting'];
		$showawaiting = ;
		$data['autoclose'];
		$autoclose = ;
		$data['sortorder'];
		$sortorder = ;

		if ($showactive) {
			$showactive = (true ? '<img src="images/icons/tick.png">' : '<img src="images/icons/disabled.png">');

			if ($showawaiting) {
				$showawaiting = (true ? '<img src="images/icons/tick.png">' : '<img src="images/icons/disabled.png">');

				if ($autoclose) {
					$autoclose = (true ? '<img src="images/icons/tick.png">' : '<img src="images/icons/disabled.png">');

					if (4 < $statusid) {
						'<a href="#" onClick="doDelete(\'' . $statusid . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' );
					}
				}
			}
		}
	}

	$delete =  . '"></a>';
	jmp;
	$delete = '';
	$tabledata[] = array( '<span style="font-weight:bold;color:' . $color . '">' . $title . '</span>', $showactive, $showawaiting, $autoclose, $sortorder, '<a href="' . $_SERVER['PHP_SELF'] . '?action=edit&id=' . $statusid . '"><img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '"></a>', $delete );
}

echo $aInt->sortableTable( array( $aInt->lang( 'fields', 'title' ), $aInt->lang( 'ticketstatusconfig', 'includeinactivetickets' ), $aInt->lang( 'ticketstatusconfig', 'includeinawaitingreply' ), $aInt->lang( 'ticketstatusconfig', 'autoclose' ), $aInt->lang( 'products', 'sortorder' ), '', '' ), $tabledata );
echo cffcebchbh::jsInclude( 'jquery.miniColors.js' ) . cffcebchbh::cssInclude( 'jquery.miniColors.css' );
$jquerycode = '$(".colorpicker").miniColors();';
echo '
<h2>';

if ($action == 'edit') {
	select_query( 'tblticketstatuses', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['title'];
	$title = ;
	$data['color'];
	$color = ;
	$data['sortorder'];
	$sortorder = ;
	$data['showactive'];
	$showactive = ;
	$data['showawaiting'];
	$showawaiting = ;
	$data['autoclose'];
	$autoclose = ;
	echo $aInt->lang( 'ticketstatusconfig', 'edit' );
}


if ((bool)) {
	echo ' readonly="true"';
	echo ' /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'ticketstatusconfig', 'statuscolor' );
	echo '</td><td class="fieldarea"><input type="text" name="color" size="10" value="';
	echo $color;
	echo '" class="colorpicker" /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'ticketstatusconfig', 'includeinactivetickets' );
	echo '</td><td class="fieldarea"><input type="checkbox" name="showactive" value="1"';
}


if ($showactive) {
	echo ' checked';
	echo ' /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'ticketstatusconfig', 'includeinawaitingreply' );
	echo '</td><td class="fieldarea"><input type="checkbox" name="showawaiting" value="1"';

	if ($showawaiting) {
		echo ' checked';
		echo ' /></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'ticketstatusconfig', 'autoclose' );
		echo '</td><td class="fieldarea"><input type="checkbox" name="autoclose" value="1"';

		if ($autoclose) {
			echo ' checked';
			echo ' /></td></tr>
<tr><td width="25%" class="fieldlabel">';
		}

		echo $aInt->lang( 'products', 'sortorder' );
	}

	echo '</td><td class="fieldarea"><input type="text" name="sortorder" size="10" value="';
	echo $sortorder;
	echo '" /></td></tr>
</table>
<div class="btn-container">
    <input type="submit" value="';
	echo $aInt->lang( 'global', 'savechanges' );
	echo '" class="btn btn-primary" />
</div>
</form>

';
	ob_get_contents(  );
	$content = ;
}

ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
