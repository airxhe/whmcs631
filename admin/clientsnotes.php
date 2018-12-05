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

if (( $action == 'edit' || $action == 'parseMarkdown' )) {
	$reqperm = 'Add/Edit Client Notes';
}
else {
	echo $aInt->lang( 'global', 'savechanges' );
	echo '" class="btn btn-primary"><br />
    <div class="text-left top-margin-5">
        <label class="checkbox-inline">
            <input type="checkbox" class="checkbox" name="sticky" value="1"';
}

echo $importantnote;
echo ' />
            ';
echo $aInt->lang( 'clientsummary', 'stickynotescheck' );
echo '        </label>
    </div>
</td></tr>
</table>
</form>
';
jmp;
echo '<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '?userid=';
echo $userId;
echo '&sub=add" data-no-clear="false">
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldarea"><textarea id="note" name="note" rows="6" class="form-control"></textarea></td><td width="150" class="text-center">
    <input type="submit" value="';
echo $aInt->lang( 'global', 'addnew' );
echo '" class="btn btn-primary" /><br />
    <div class="text-left top-margin-5">
        <label class="checkbox-inline">
            <input type="checkbox" class="checkbox" name="sticky" value="1" />
            ';
echo $aInt->lang( 'clientsummary', 'stickynotescheck' );
echo '        </label>
    </div>
</td></tr>
</table>
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
