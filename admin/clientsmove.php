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
new dgeegejige( 'Edit Clients Products/Services' );
$aInt = ;
$aInt->title = $aInt->lang( 'clients', 'transferownership' );
ob_start(  );

if ($action == '') {
	echo '<script type="text/javascript">
$(document).ready(function(){
    $("#clientsearchval").keyup(function () {
        var useridsearchlength = $("#clientsearchval").val().length;
        if (useridsearchlength>2) {
        $.post("search.php", { clientsearch: 1, value: $("#clientsearchval").val(), token: "' . generate_token( 'plain' ) . '" },
            function(data){
                if (data) {
                    $("#clientsearchresults").html(data);
                    $("#clientsearchresults").slideDown("slow");
                }
            });
        }
    });
});
function searchselectclient(userid,name,email) {
    $("#newuserid").val(userid);
    $("#clientsearchresults").slideUp();
}
</script>
';

	if ($error) {
		echo '<div class="errorbox">' . $aInt->lang( 'clients', 'invalidowner' ) . '</div><br />';
		echo '
<form method="post" action="';
		echo $whmcs->getPhpSelf(  );
		echo '?action=transfer&type=';
		echo $type;
		echo '&id=';
		echo $id;
		echo '">
';
		echo $aInt->lang( 'clients', 'transferchoose' );
		echo '<br /><br />
<div align="center">
';
		echo $aInt->lang( 'fields', 'clientid' );
		echo ': <input type="text" name="newuserid" id="newuserid" size="10" /> <input type="submit" value="';
		echo $aInt->lang( 'domains', 'transfer' );
		echo '" class="button btn btn-default" /><br /><br />
';
		echo $aInt->lang( 'global', 'clientsintellisearch' );
		echo ': <input type="text" id="clientsearchval" size="25" />
</div>
<br />
<div id="clientsearchresults">
<div class="searchresultheader">Search Results</div>
<div class="searchresult" align="center">Matches will appear here as you type</div>
</div>
</form>

';
		jmp;
		check_token( 'WHMCS.admin.default' );
		trim( $newuserid );
		$newuserid = ;
		select_query( 'tblclients', 'id', array( 'id' => $newuserid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$newuserid = ;

		if (!$newuserid) {
			redir(  . 'type=' . $type . '&id=' . $id . '&error=1' );

			if ($type == 'hosting') {
				select_query( 'tblhosting', 'userid', array( 'id' => $id ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				$data['userid'];
				$userid = ;
				logActivity;
					. 'Moved Service ID: ' . $id . ' from User ID: ';
			}
		}

		(  . $userid . ' to User ID: ' . $newuserid, $newuserid );
		update_query( 'tblhosting', array( 'userid' => $newuserid ), array( 'id' => $id ) );
		dacfgegdhe::table( 'tblsslorders' )->where( 'serviceid', '=', $id )->update( array( 'userid' => $newuserid ) );
		echo '<script language="javascript">
window.opener.location.href = "clientshosting.php?userid=';
		echo $newuserid;
		echo '&id=';
		echo $id;
		echo '";
window.close();
</script>
';
		jmp;

		if ($type == 'domain') {
			select_query( 'tbldomains', 'userid', array( 'id' => $id ) );
			$result = ;
			mysql_fetch_array;
			$result;
		}

		(  );
		$data = ;
		$data['userid'];
		$userid = ;
		logActivity(  . 'Moved Domain ID: ' . $id . ' from User ID: ' . $userid . ' to User ID: ' . $newuserid, $newuserid );
		update_query;
		'tbldomains';
		array( 'userid' => $newuserid );
		array( 'id' => $id );
	}

	(  );
	echo '<script language="javascript">
window.opener.location.href = "clientsdomains.php?userid=';
	echo $newuserid;
	echo '&id=';
	echo $id;
	echo '";
window.close();
</script>
';
	ob_get_contents(  );
	$content = ;
	ob_end_clean(  );
	$aInt->content = $content;
}

$aInt->displayPopUp(  );
?>
