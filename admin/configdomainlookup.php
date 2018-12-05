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
require( dirname( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\admin' ) . DIRECTORY_SEPARATOR . 'init.php' );
new dgeegejige( 'Configure Domain Pricing' );
$aInt = ;
require( ROOTDIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'domainfunctions.php' );
getCurrency(  );
$currency = ;
ob_start(  );
App::self(  );
$whmcs = ;
$whmcs->get_req_var( 'action' );
$action = ;
$response = '';
$responseType = null;

if ($action == 'whichDomainLookupProvider') {
	$responseType = 'JSON';
	$response = array( 'status' => 0, 'errorMsg' => '' );
	cfhfdfeahc::getDomainLookupProvider(  );
	$providerName = ;
	$response['status'] = 1;
	$response['domainLookupProvider'] = $providerName;
	jmp;
	Exception {
		$response['errorMsg'] = $aInt->lang( 'general', 'couldNotProcessRequest' ) . ' ' . $e->getMessage(  );
		logActivity( 'Error processing request: ' . $e->getMessage(  ) );
	}
}


if () {
	badijeecfj::all(  );
	$EnomSetting = ;

	if ($model->value) {
		chhgjaeced::setValue( 'domainLookupProvider', 'WhmcsWhois' );
		$EnomSetting->useEnomForGeneralAvailability = false;
		$EnomSetting->saveAll(  );

		if ($providerName == 'Enom') {
			$loggedName = (true ? 'eNom' : 'Standard Whois');

			if ($providerName != $existingProvider) {
				logAdminActivity( (  . 'Domain Lookup Provider Activated: \'' . $loggedName . '\'' ) );
			}
		}
	}
}

$maxResults = 100;

if ($providerSettings->suggestAdultDomains) {
	$adultDomains = (true ? ' checked' : '');
	$providerSettings->suggestOnlyGeneralAvailability;
}


if () {
	$onlyGa = (true ? ' checked' : '');

	if ($providerSettings->useEnomForGeneralAvailability) {
		$useEnomCheckSearch = (true ? ' checked' : '');
		'
    <div id="containerProviderSettingsEnom">
        <div id="settingSaveStatusEnom"></div>

        <div style="background-color:#fff;padding:15px;border-radius:8px;text-align:center;">
            <img src="images/enomnamespinner.jpg"/>
        </div>

        <br/>

        <form action="#" method="POST" name="providerSettingsEnom" id="providerSettingsEnom">
            <input type="hidden" name="domainLookupProvider" value="Enom"/>
            <input type="hidden" name="providerSettings[Enom][useEnomForGeneralAvailability]" value="1" />
            <input type="hidden" name="action" value="save" />
            <div align="center">
            ' . $aInt->lang( 'general', 'maxsuggestions' ) . '<br />
            <select name="providerSettings[Enom][suggestMaxResultCount]">
                <option value="10"';

		if ($maxResults == 10) {
				. (true ? ' selected' : '') . '>10</option>
                <option value="25"';
		}
	}
}


if ($maxResults == 25) {
		. (true ? ' selected' : '') . '>25</option>
                <option value="50"';

	if ($maxResults == 50) {
			. (true ? ' selected' : '') . '>50</option>
                <option value="75"';

		if ($maxResults == 75) {
				. (true ? ' selected' : '') . '>50</option>
                <option value="100"';

			if ($maxResults == 100) {
					. (true ? ' selected' : '') . '>100 (' . $aInt->lang( 'global', 'recommended' ) . ')</option>
                <option value="200"';

				if ($maxResults == 200) {
					$form =  . (true ? ' selected' : '') . '>200</option>
            </select>
            <br/><br/>
            ' . $aInt->lang( 'general', 'onlygtlds' ) . '<br/>
            <label class="checkbox-inline">
                <input type="checkbox" name="providerSettings[Enom][suggestOnlyGeneralAvailability]"' . $onlyGa . '>
                ' . $aInt->lang( 'global', 'ticktoenable' ) . ' (' . $aInt->lang( 'global', 'recommended' ) . ')
            </label>
            <br/><br/>
            ' . $aInt->lang( 'general', 'suggestadultdomains' ) . '<br/>
            <label class="checkbox-inline">
                <input type="checkbox" name="providerSettings[Enom][suggestAdultDomains]"' . $adultDomains . '>
                ' . $aInt->lang( 'global', 'ticktoenable' ) . '
            </label>
            <br/>
            </div>
        </form>
    </div>';
				}
			}
		}
	}
}

echo '" name="createEmail"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">';
echo $aInt->lang( 'fields', 'desiredUsername' );
echo '</td>
                                        <td>
                                            <input type="text" size="20" name="createUsername"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">';
echo $aInt->lang( 'fields', 'desiredPassword' );
echo '</td>
                                        <td>
                                            <input type="password" size="20" name="createPassword" autocomplete="off" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">';
echo $aInt->lang( 'eNomNameSpinner', 'securityQuestion' );
echo '</td>
                                        <td>
                                            <select name="securityQuestion">
                                                <option>';
echo $aInt->lang( 'eNomNameSpinner', 'cityOfBirth' );
echo '</option>
                                                <option>';
echo $aInt->lang( 'eNomNameSpinner', 'mothersMaidenName' );
echo '</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">';
echo $aInt->lang( 'eNomNameSpinner', 'securityAnswer' );
echo '</td>
                                        <td>
                                            <input type="text" size="20" name="securityQuestionAnswer"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <p>
                                <label>
                                    <input type="radio" name="accounttype" value="existing" onclick="$(\'#divCreateAcct\').slideUp(\'slow\', function() {$(\'#divEnomLogin\').slideDown(\'slow\'); })" checked/>
                                    ';
echo $aInt->lang( 'eNomNameSpinner', 'iAlreadyHaveAnAccount' );
echo '                                </label>
                            </p>

                            <div id="divEnomLogin">
                                <table>
                                    <tr>
                                        <td align="right">';
echo $aInt->lang( 'eNomNameSpinner', 'existingUsername' );
echo '</td>
                                        <td>
                                            <input type="text" size="20" name="existingUsername"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">';
echo $aInt->lang( 'eNomNameSpinner', 'existingPassword' );
echo '</td>
                                        <td>
                                            <input type="password" size="20" name="existingPassword" autocomplete="off" />
                                        </td>
                                    </tr>
                                </table>

                                <div style="width:90%;padding:10px;background-color:#f9f9f9;border-radius:6px;">
                                    ';
echo $aInt->lang( 'eNomNameSpinner', 'ensureAuthorizedIp' );
echo '                                </div>

                            </div>
                        </div>

                        <div id="enomStep2" style="display:none;">
                            <br/>

                            <div style="width:90%;padding:10px;background-color:#D9E6C3;color:#69990F;border-radius:6px;text-align:center;">
                                <strong>';
echo $aInt->lang( 'eNomNameSpinner', 'validatedApiLogin' );
echo '</strong>
                            </div>

                            <p>';
echo $aInt->lang( 'eNomNameSpinner', 'validatedApiLoginDetails' );
echo '</p>
                            <p>
                                <strong>';
echo $aInt->lang( 'eNomNameSpinner', 'optionalConfigurationSettings' );
echo '</strong>
                            </p>

                            <p>
                                <label>
                                    <input type="checkbox" name="includeAdultDomains"/> ';
echo $aInt->lang( 'eNomNameSpinner', 'includeAdultDomains' );
echo '                                </label>
                            </p>

                            <p>';
echo $aInt->lang( 'eNomNameSpinner', 'excludeTldFromSuggestions' );
echo '</p>

                            <p>
                                <textarea style="width:90%;color:#777;" rows="3" name="excludeTldFromSuggestionsExample">';
echo $aInt->lang( 'eNomNameSpinner', 'excludeTldFromSuggestionsExample' );
echo '</textarea>
                            </p>
                        </div>

                        <input type="hidden" name="configureStep" value="accountDetails"/>
                        <input type="hidden" name="domainLookupProvider" value="Enom"/>
                        <input type="hidden" name="action" value="save" />
                    </form>
                </div>
';
ob_get_clean(  );
$form = ;
$response = $CONFIG;
jmp;

if ($provider instanceof effbibeed) {
	$providerSettings->suggestTlds;
	$suggestTlds = ;

	if ($providerSettings->useWhmcsWhoisForSuggestions) {
		$useStdWhoisCheck = (true ? 'checked' : '');

		if (!function_exists( 'getTLDList' )) {
			require_once( ROOTDIR . '/includes/domainfunctions.php' );
			dacfgegdhe::table( 'tbldomainpricing' )->orderBy( 'order', 'ASC' )->lists( 'extension' );
			$allConfiguredTlds = ;
		}
	}

	$tldsList = '';
	foreach ($allConfiguredTlds as ) {
		$tld = ;
		substr( $tld, 1 );
		$tld = ;
		$tldsList .= '<option';

		if (in_array( $tld, $suggestTlds )) {
			$tldsList .= ' selected';
			$tldsList .= '>' . $tld . '</option>';
			break;
		}

		break;
	}

	'
<div id="containerProviderSettingsWhmcsWhois">
    <div id="settingSaveStatusWhmcsWhois"></div>

    <div style="background-color:#fff;padding:15px;border-radius:8px;text-align:center;">
        <img src="images/standardwhois.jpg"/>
    </div>

    <form action="#" method="POST" name="providerSettingsWhmcsWhois" id="providerSettingsWhmcsWhois">
        <br />
        <div align="center">
        ' . $aInt->lang( 'general', 'suggesttlds' ) . '<br />
        <span style="font-size:0.9em">';
	$aInt->lang;
	'general';
}

$form =  . ( 'suggesttldsinfo' ) . '</span><br />
        <br />
        <select name="providerSettings[WhmcsWhois][suggestTlds][]" size="6" multiple>
            ' . $tldsList . '
        </select>
        </div>
        <br />
        <p class="text-muted text-center">
            <small>' . $aInt->lang( 'global', 'ctrlclickmultiselection' ) . '</small>
        </p>
        <input type="hidden" name="domainLookupProvider" value="WhmcsWhois"/>
        <input type="hidden" name="providerSettings[WhmcsWhois][useWhmcsWhoisForSuggestions]" value="on" />
        <input type="hidden" name="action" value="save" />

    </form>
</div>';
$response = $CONFIG;
jmp;
throw new cdjbhjfhda( (  . 'Invalid Domain Lookup Provider \'' . $providerName . '\'' ) );
jmp;
Exception {
	logActivity( 'Error processing request: ' . $e->getMessage(  ) );
	$response = '<div id="containerProviderSettings' . $providerName . '" >' . infoBox( $aInt->lang( 'general', 'couldNotProcessRequest' ), 'error' ) . '</div>';
	ob_end_clean(  );

	if ($responseType == 'JSON') {
		header( 'Content-Type: application/json' );
		echo json_encode( $response );
	}

	$aInt->display(  );
	exit(  );
	return 1;
}
?>
