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
new dgeegejige( 'View Credit Card Details' );
$aInt = ;
$aInt->title = AdminLang::trans( 'clients.ccdetails' );
$aInt->requiredFiles( array( 'ccfunctions', 'clientfunctions' ) );
ob_start(  );
chhgjaeced::getValue( 'CCNeverStore' );
$ccstoredisabled = ;

if ($ccstoredisabled) {
	AdminLang::trans( 'clients.ccstoredisabled' );
	$ccStoreDisabledLang = ;
	AdminLang::trans( 'addons.closewindow' );
	$closeWindow = ;
	echo  . '<div class="row client-summary-panels">
    <div class="col-lg-3">
        <div class="clientsummarybox text-center">
            <div class="title">
                <div class="fa-stack">
                    <i class="fa fa-credit-card fa-stack-1x fa-fw"></i>
                    <i class="fa fa-ban fa-stack-2x text-danger fa-fw"></i>
                </div>
                ' . $ccStoreDisabledLang . '
            </div><br />
            <div class="clearfix"></div>
            <button class="btn btn-default" onclick="window.close()">' . $closeWindow . '</button>
        </div>
    </div>
</div>';
}

echo ;
echo '</b></td></tr>
<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '">
<tr>
    <td>
        <input type="hidden" name="action" value="save">
        <input type="hidden" name="userid" value="';
echo $userid;
echo '">
        ';
generate_token(  );
echo '        ';
echo $aInt->lang( 'fields', 'cardtype' );
echo ':
    </td>
    <td>
        ';
explode( ',', chhgjaeced::getValue( 'AcceptedCardTypes' ) );
$acceptedCardTypes = ;
reset( $acceptedCardTypes );
$defaultCreditCard = ;
switch (strtolower( $defaultCreditCard )) {
case 'visa': {
		$logo = '<i class="fa fa-cc-visa fa-fw"></i>';
		break;
		switch () {
		case 'mastercard': {
				$logo = '<i class="fa fa-cc-mastercard fa-fw"></i>';
				break;
				switch () {
				case 'american express': {
						$logo = '<i class="fa fa-cc-amex fa-fw"></i>';
						break;
						switch () {
						case 'discover': {
								$logo = '<i class="fa fa-cc-discover fa-fw"></i>';
								break;
								$logo = '<i class="fa fa-credit-card fa-fw"></i>';
								break 4;
							}
						}
					}
				}
			}
		}
	}
}

$logo = '<i class="fa fa-cc-amex fa-fw"></i>';
break;
switch () {
case 'discover': {
		$logo = '<i class="fa fa-cc-discover fa-fw"></i>';
		break;
		$logo = '<i class="fa fa-credit-card fa-fw"></i>';
		break;
	}
}

echo $aInt->lang( 'clients', 'ccdeletesure' );
echo '")) {
window.location=\'';
echo $whmcs->getPhpSelf(  );
echo '?userid=';
echo $userid;
echo '&action=clear';
echo generate_token( 'link' );
echo '\';
}}
</script>
    <div class="btn-container">
        <input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary" />
        <input type="button" value="';
echo $aInt->lang( 'addons', 'closewindow' );
echo '" class="button btn btn-default" onclick="window.close()" /><br />
        <input type="button" value="';
echo $aInt->lang( 'clients', 'cleardetails' );
echo '" class="btn btn-danger btn-sm top-margin-5" onClick="confirmClear();return false;" />
    </div>
</form>

';
echo cffcebchbh::jsInclude( 'CreditCardValidation.js' );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->displayPopUp(  );
?>
