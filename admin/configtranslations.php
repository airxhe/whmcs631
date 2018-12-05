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

function {closure}($value) {
	$defaultLanguage;
	$defaultLanguage = ;

	if ($value == $defaultLanguage) {
	}

	return false;
}

define( 'ADMINAREA', true );
require( '../init.php' );
$whmcs->get_req_var( 'type' );
$type = ;
$relatedId = (int)$whmcs->get_req_var( 'id' );
$whmcs->get_req_var( 'action' );
$action = ;
$whmcs->get_req_var( 'origvalue' );
$defaultTranslation = ;

if (!$type) {
	new dgeegejige( 'loginonly' );
	$aInt = ;
	$aInt->setBodyContent( array( 'body' => 'This page cannot be accessed directly' ) );
	$aInt->output(  );
	dibeciijih::getInstance(  )->doExit(  );
	switch ($type) {
	case 'configurable_option.name': {
			break;
		}
	}
}

jmp;
switch ($type) {
case 'product.description': {
	}

case 'product_bundle.description': {
		break;
	}
}


if ($action == 'save') {
	$aInt->setBodyContent( array( 'dismiss' => true, 'successMsgTitle' => AdminLang::trans( 'global.success' ), 'successMsg' => AdminLang::trans( 'global.changesuccessdesc' ) ) );
}

( '.{id}', '', $type );
$type = ;
AdminLang::trans( 'dynamicTranslation.instructions' );
$instructions = ;
AdminLang::trans( 'dynamicTranslation.defaultValue' );
$defaultValue = ;
switch ($inputType) {
case 'text': {
		$readOnlyInput =  . '<input type="text" name="this_will_not_save" readonly class="form-control input-sm" value="' . $defaultTranslation . '" />';
		break;
		$readOnlyInput = '<textarea name="this_will_not_save" readonly class="form-control" rows="' . count( explode( '
', $defaultTranslation ) ) . (  . '">' . $defaultTranslation . '</textarea>' );
		break;
	}
}

$body =  . '&action=save" class="form">
    <p class="font-size-sm">' . $instructions . '</p>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-info font-size-sm translate-value">
                <div class="panel-heading">' . $defaultValue . '</div>
                <div class="panel-body">
                    ' . $readOnlyInput . '
                </div>
            </div>
        </div>
    </div>
    <div class="row font-size-sm">
        ' . $body . '
    </div>
</form>';
$aInt->setBodyContent( array( 'body' => $body ) );
$aInt->output(  );
?>
