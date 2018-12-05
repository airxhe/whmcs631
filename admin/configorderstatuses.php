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
new dgeegejige( 'Configure Order Statuses' );
$aInt = ;
$aInt->title = $aInt->lang( 'setup', 'orderstatuses' );
$aInt->sidebar = 'config';
$aInt->icon = 'clients';
$aInt->helplink = 'Order Statuses';

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	$id = (int)$whmcs->get_req_var( 'id' );
	$whmcs->get_req_var( 'title' );
	$title = ;
	$whmcs->get_req_var( 'color' );
	$color = ;
	$whmcs->get_req_var( 'showpending' );
	$showpending = ;
	$whmcs->get_req_var( 'showactive' );
	$showactive = ;
	$whmcs->get_req_var;
}

( 'showcancelled' );
$showcancelled = ;
$sortorder = (int)$whmcs->get_req_var( 'sortorder' );

if ($id) {
	dacfgegdhe::table( 'tblorderstatuses' )->find( $id );
	$orderStatus = ;
	update_query( 'tblorderstatuses', array( 'title' => $title, 'color' => $color, 'showpending' => $showpending, 'showactive' => $showactive, 'showcancelled' => $showcancelled, 'sortorder' => $sortorder ), array( 'id' => $id ) );

	if ($title != $orderStatus->title) {
		logAdminActivity(  . 'Order Status Name Changed: ' . $orderStatus->title . ' to ' . $title );

		if (( ( ( ( $color != $orderStatus->color || $showpending != $orderStatus->showpending ) || $showactive != $orderStatus->showactive ) || $showcancelled != $orderStatus->showcancelled ) || $sortorder != $orderStatus->sortorder )) {
			logAdminActivity(  . 'Order Status Modified: ' . $title );
			redir( 'update=true' );
		}
	}
}

(  );

if ($action == 'delete') {
	check_token( 'WHMCS.admin.default' );

	if (4 < $id) {
		get_query_val( 'tblorderstatuses', 'title', array( 'id' => $id ) );
		$title = ;
		update_query( 'tblorders', array( 'status' => 'Cancelled' ), array( 'status' => $title ) );
		delete_query( 'tblorderstatuses', array( 'id' => $id ) );
		logAdminActivity(  . 'Order Status Removed: ' . $title );
		redir( 'delete=true' );
		jmp;
		redir(  );
		ob_start(  );

		if ($added) {
			infoBox( $aInt->lang( 'orderstatusconfig', 'addtitle' ), $aInt->lang( 'orderstatusconfig', 'adddesc' ) );

			if ($update) {
				infoBox( $aInt->lang( 'orderstatusconfig', 'edittitle' ), $aInt->lang( 'orderstatusconfig', 'editdesc' ) );

				if ($delete) {
					infoBox( $aInt->lang( 'orderstatusconfig', 'deltitle' ), $aInt->lang( 'orderstatusconfig', 'deldesc' ) );
					echo $infobox;
					$aInt->deleteJSConfirm( 'doDelete', 'orderstatusconfig', 'delsure', '?action=delete&id=' );
					echo '
<p>';
					echo $aInt->lang( 'orderstatusconfig', 'pagedesc' );
					echo '</p>

<p><a href="';
					echo $whmcs->getPhpSelf(  );
					echo '" class="btn btn-default"><i class="fa fa-plus-square"></i> ';
					echo $aInt->lang( 'global', 'addnew' );
					echo '</a></p>

';
					$aInt->sortableTableInit( 'nopagination' );
					select_query( 'tblorderstatuses', '', '', 'sortorder', 'ASC' );
					$result = ;
					mysql_fetch_assoc( $result );
					$data = ;
				}
			}
		}


		while (true) {
			if () {
				$data['id'];
			}

			$statusid = ;
			$data['title'];
			$title = ;
			$data['color'];
			$color = ;
			$data['showpending'];
			$showpending = ;
			$data['showactive'];
			$showactive = ;
			$data['showcancelled'];
			$showcancelled = ;
			$data['sortorder'];
			$sortorder = ;

			if ($showpending) {
				$showpending = (true ? '<img src="images/icons/tick.png">' : '<img src="images/icons/disabled.png">');

				if ($showactive) {
					$showactive = (true ? '<img src="images/icons/tick.png">' : '<img src="images/icons/disabled.png">');

					if ($showcancelled) {
						$showcancelled = (true ? '<img src="images/icons/tick.png">' : '<img src="images/icons/disabled.png">');

						if (4 < $statusid) {
							$delete = '<a href="#" onClick="doDelete(\'' . $statusid . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>';
						}
					}
				}
			}

			break;
		}

		echo $aInt->sortableTable( array( $aInt->lang( 'fields', 'title' ), $aInt->lang( 'orderstatusconfig', 'includeinpending' ), $aInt->lang( 'orderstatusconfig', 'includeinactive' ), $aInt->lang( 'orderstatusconfig', 'includeincancelled' ), $aInt->lang( 'products', 'sortorder' ), '', '' ), $tabledata );
		echo cffcebchbh::jsInclude( 'jquery.miniColors.js' ) . cffcebchbh::cssInclude( 'jquery.miniColors.css' );
		$jquerycode = '$(".colorpicker").miniColors();';
		echo '
<h2>';

		if ($action == 'edit') {
			get_query_vals( 'tblorderstatuses', '', array( 'id' => $id ) );
			$data = ;
			extract( $data );
			echo $aInt->lang( 'orderstatusconfig', 'edit' );
		}
	}
}

echo (  );
echo '</td><td class="fieldarea"><input type="checkbox" name="showpending" value="1"';

if ($showpending) {
	echo ' checked';
	echo ' /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'orderstatusconfig', 'includeinactive' );
	echo '</td><td class="fieldarea"><input type="checkbox" name="showactive" value="1"';

	if ($showactive) {
		echo ' checked';
		echo ' /></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'orderstatusconfig', 'includeincancelled' );
		echo '</td><td class="fieldarea"><input type="checkbox" name="showcancelled" value="1"';

		if ($showcancelled) {
		}
	}
}

echo ' checked';
echo ' /></td></tr>
<tr><td width="25%" class="fieldlabel">';
echo $aInt->lang( 'products', 'sortorder' );
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
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
