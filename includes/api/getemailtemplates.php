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

if (!defined( 'WHMCS' )) {
	exit( 'This file cannot be accessed directly' );
	cebaiefhhg::query(  );
	$query = ;

	if ($type) {
		$query->where;
		'type';
		'=';
		$type;
	}

	(  );

	if ($language) {
	}
}

$query->where( 'language', '=', $language );
$query->orderBy( 'name' )->get(  );
$templates = ;
$apiresults = array( 'result' => 'success', 'totalresults' => $templates->count(  ), 'emailtemplates' => array( 'emailtemplate' => array(  ) ) );
foreach ($templates as ) {
	$template = ;

	while (true) {
		$apiresults['emailtemplates']['emailtemplate'][] = array( 'id' => $template->id, 'name' => $template->name, 'subject' => $template->subject, 'custom' => (int)$template->custom );
	}
}

$responsetype = 'xml';
?>
