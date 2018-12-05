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
new dgeegejige( 'List Support Tickets' );
$aInt = ;
$aInt->title = $aInt->lang( 'support', 'insertkblink' );
ob_start(  );
echo '
<script language="JavaScript">
function insertKBLink(id, title) {
    window.opener.insertKBLink(
        \'';
echo $CONFIG['SystemURL'];
echo '/knowledgebase.php?action=displayarticle&catid=';
echo $cat;
echo '&id=\'+id,
        title
    );
    window.close();
}
</script>

<p><b>Categories</b></p>
';

if ($cat == '') {
	$cat = 5;
	select_query( 'tblknowledgebasecats', '', array( 'parentid' => $cat, 'language' => '' ), 'name', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['name'];
		$name = ;
		$data['description'];
		$description = ;
		echo  . '<a href="?cat=' . $id . '"><b>' . $name . '</b></a> - ' . $description . '<br>';
		$catDone = true;
	}


	while (true) {
		jmp;
		echo  . $article . '<br>';
		$articleDone = true;
	}

	!$articleDone;
}


if () {
	echo $aInt->lang( 'support', 'noarticlesfound' ) . '<br>';
	echo '
<p><a href="javascript:history.go(-1)"><< ';
	echo $aInt->lang( 'global', 'back' );
	echo '</a></p>

';
	ob_get_contents;
}

(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->displayPopUp(  );
?>
