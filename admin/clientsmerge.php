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
new dgeegejige( 'Edit Clients Details' );
$aInt = ;
$aInt->requiredFiles( array( 'clientfunctions' ) );
$aInt->title = $aInt->lang( 'clients', 'mergeclient' );
ob_start(  );

if (!$newuserid) {
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
    $("#clientsearchresults").slideUp("slow");
}
</script>
';

	if ($error) {
		$aInt->lang;
		'clients';
	}
}

echo '<div class="errorbox">' . ( 'invalidid' ) . '</div><br />';
echo '
<p>';
echo $aInt->lang( 'clients', 'mergeexplain' );
echo '</p>

<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '?userid=';
echo $userid;
echo '">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
echo $aInt->lang( 'clients', 'firstclient' );
echo '</td><td class="fieldarea">';
select_query( 'tblclients', '', array( 'id' => $userid ) );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['id'];
$useridselect = ;
$data['firstname'];
$firstname = ;
$data['lastname'];
$lastname = ;
echo ( (  . $firstname . ' ' ) . $lastname . ' (' . $useridselect . ')' );
echo '</td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'clients', 'secondclient' );
echo '</td><td class="fieldarea"><table cellspacing="0" cellpadding="0"><tr><td><input type="text" name="newuserid" id="newuserid" size="10" /></td><td>&nbsp;&nbsp; <input type="submit" value="';
echo $aInt->lang( 'invoices', 'merge' );
echo '" class="button btn btn-default" /></td></tr></table></td></tr>
<tr><td class="fieldarea" colspan="2"><div align="center"><input type="radio" name="mergemethod" value="to1" id="to1" /> <label for="to1">';
echo $aInt->lang( 'clients', 'tofirst' );
echo '</label> <input type="radio" name="mergemethod" value="to2" id="to2" checked /> <label for="to2">';
echo $aInt->lang( 'clients', 'tosecond' );
echo '</label></div></td></tr>
</table>

<br />
<div align="center">';
echo $aInt->lang( 'global', 'clientsintellisearch' );
echo ': <input type="text" id="clientsearchval" size="25" /></div>
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
	redir(  . 'userid=' . $userid . '&error=1' );

	if ($mergemethod == 'to1') {
		trim( $userid );
		$resultinguserid = ;
		trim( $newuserid );
		$deleteuser = ;
	}
}

( array( 'visitors' => '+=' . (int)$visitors, 'balance' => '+=' . $balance, 'withdrawn' => '+=' . $withdrawn ), array( 'id' => (int)$newaffid ) );
update_query( 'tblaffiliatesaccounts', array( 'affiliateid' => $newaffid ), array( 'affiliateid' => $affid ) );
update_query( 'tblaffiliateshistory', array( 'affiliateid' => $newaffid ), array( 'affiliateid' => $affid ) );
update_query( 'tblaffiliateswithdrawals', array( 'affiliateid' => $newaffid ), array( 'affiliateid' => $affid ) );
delete_query( 'tblaffiliates', array( 'clientid' => $deleteuser ) );
logActivity(  . 'Merged User ID: ' . $deleteuser . ' with User ID: ' . $resultinguserid, $resultinguserid );
run_hook( 'AfterClientMerge', array( 'toUserID' => $resultinguserid, 'fromUserID' => $deleteuser ) );

if ($resultinguserid != $deleteuser) {
	deleteClient( $deleteuser );
	echo '<script language="javascript">
window.opener.location.href = "clientssummary.php?userid=';
	echo $resultinguserid;
}

echo '";
window.close();
</script>
';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->displayPopUp(  );
?>
