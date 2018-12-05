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

function cleanSystemURL($url, $secure = false, $keepempty = false) {
	global $whmcs;

	if (( $url == '' || !preg_match( '/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $url ) )) {
		if ($keepempty == true) {
			return '';

			if ($secure == true) {
				$_SERVER;
			}
		}

		$url = 'https://' . ['SERVER_NAME'] . preg_replace( '#/[^/]*\.php$#simU', '/', $_SERVER['PHP_SELF'] );
	}

	$url = 'http://' .  . preg_replace( '#/[^/]*\.php$#simU', '/', $_SERVER['PHP_SELF'] );
	jmp;
	str_replace( '\', '', trim( $url ) );
		$url = ;

		if (!preg_match( '~^(?:ht)tps?://~i', $url )) {
		if ($secure == true) {
			$url = 'https://' . $url;
		}
	}


	if () {
		$url .= '/';
		str_replace;
		'/' . $whmcs->get_admin_folder_name(  );
	}

	return (  . '/', '/', $url );
}

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'Configure General Settings', false );
$aInt = ;
$aInt->title = $aInt->lang( 'general', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'config';
$aInt->helplink = 'General Settings';
$aInt->requiredFiles( array( 'clientfunctions' ) );
new ejijcahfa(  );
$promoHelper = ;
$promoHelper->hookIntoPage( $aInt );

if ($promoHelper->isPromoFetchRequest(  )) {
	$promoHelper->fetchPromoContent( $whmcs->get_req_var( 'partner' ), $whmcs->get_req_var( 'promodata' ) );
	$response = ;
	$aInt->setBodyContent( $response );
	iciahfajh::getInstance(  );
	$whmcs = ;

	if ($action == 'addWhiteListIp') {
		check_token( 'WHMCS.admin.default' );

		if (defined( 'DEMO_MODE' )) {
			exit(  );
			$whmcs->get_config( 'WhitelistedIPs' );
			$whitelistedips = ;
			unserialize( $whitelistedips );
			$whitelistedips = ;
			$whitelistedips[] = array( 'ip' => $ipaddress, 'note' => $notes );
			$whmcs->set_config( 'WhitelistedIPs', serialize( $whitelistedips ) );
			logAdminActivity( (  . 'General Settings Changed. Whitelisted IP Added: \'' . $ipaddress . '\'' ) );
			delete_query( 'tblbannedips', array( 'ip' => $ipaddress ) );
			exit(  );

			if ($action == 'deletewhitelistip') {
				check_token( 'WHMCS.admin.default' );

				if (defined( 'DEMO_MODE' )) {
					exit(  );
					explode( ' - ', $removeip );
					$removeip = ;
					$whmcs->get_config( 'WhitelistedIPs' );
					$whitelistedips = ;
					unserialize( $whitelistedips );
					$whitelistedips = ;
					foreach ($whitelistedips as ) {
						$v = ;
						$k = ;

						if ($v['ip'] == $removeip[0]) {
							unset( $whitelistedips[$k] );
							break;
						}

						break;
					}

					$whmcs->set_config( 'WhitelistedIPs', serialize( $whitelistedips ) );
					update_query( 'tblconfiguration', array( 'value' => serialize( $whitelistedips ) ), array( 'setting' => 'WhitelistedIPs' ) );
					logAdminActivity( (  . 'General Settings Changed. Whitelisted IP Removed: \'' . $removeip[0] . '\'' ) );
					exit(  );

					if ($action == 'addApiIp') {
						check_token( 'WHMCS.admin.default' );

						while (defined( 'DEMO_MODE' )) {
							exit(  );
							$whmcs->get_config( 'APIAllowedIPs' );
							$whitelistedips = ;
							unserialize( $whitelistedips );
							$whitelistedips = ;
							$whitelistedips[] = array( 'ip' => $ipaddress, 'note' => $notes );
							$whmcs->set_config( 'APIAllowedIPs', serialize( $whitelistedips ) );
							logAdminActivity( (  . 'General Settings Changed. API Allowed IP Added: \'' . $ipaddress . '\'' ) );
							exit(  );

							if ($action == 'deleteapiip') {
								check_token( 'WHMCS.admin.default' );

								if (defined( 'DEMO_MODE' )) {
									exit(  );
									explode( ' - ', $removeip );
									$removeip = ;
									$whmcs->get_config( 'APIAllowedIPs' );
									$whitelistedips = ;
									unserialize( $whitelistedips );
									$whitelistedips = ;
									foreach ($whitelistedips as ) {
										$v = ;
										$k = ;

										if ($v['ip'] == $removeip[0]) {
											unset( $whitelistedips[$k] );
											break;
										}

										break;
									}

									$whmcs->set_config( 'APIAllowedIPs', serialize( $whitelistedips ) );
									logAdminActivity( (  . 'General Settings Changed. API Allowed IP Removed: \'' . $removeip[0] . '\'' ) );
									exit(  );

									if ($action == 'addTrustedProxyIp') {
										check_token( 'WHMCS.admin.default' );
										$whmcs->get_req_var( 'ipaddress' );
										$ipaddress = ;
										$whmcs->get_req_var( 'notes' );
										$notes = ;

										if (strpos( $ipaddress, '/' ) !== false) {
											explode( '/', $ipaddress, 2 )[1];
											$netmask = ;
											[0];
											$ip = ;
											bgecdfegjg::checkIp( $ip, $ipaddress );
											$isUserInputAddressValid = ;
											break;
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}


if (( $whitelistedips )) {
	$whitelistedips = (true ? $whitelistedips : array(  ));
	$whitelistedips[] = array( 'ip' => $ipaddress, 'note' => $notes );

	if ($ipaddress == $whmcs->getRemoteIp(  )) {
		$whmcs->set_config( 'trustedProxyIps', json_encode( $whitelistedips ) );
		cbibaajdii::defineProxyTrustFromApplication( $whmcs );
		$whmcs->setRemoteIp( caegadgihi::getIP(  ) );
		new ddhiacdee(  );
		$auth = ;
		$auth->getInfobyID( eaaadiagec::get( 'adminid' ) );
		$auth->setSessionVars( $whmcs );
	}
}
else {
	array( 'AllowOwnDomain' => , 'EnableDomainRenewalOrders' => $whmcs->get_req_var( 'enabledomainrenewalorders' ), 'AutoRenewDomainsonPayment' => $whmcs->get_req_var( 'autorenewdomainsonpayment' ), 'FreeDomainAutoRenewRequiresProduct' => $freedomainautorenewrequiresproduct, 'DomainAutoRenewDefault' => $whmcs->get_req_var( 'domainautorenewdefault' ), 'DomainToDoListEntries' => $whmcs->get_req_var( 'domaintodolistentries' ), 'DomainSyncEnabled' => $whmcs->get_req_var( 'domainsyncenabled' ), 'DomainSyncNextDueDate' => $whmcs->get_req_var( 'domainsyncnextduedate' ), 'DomainSyncNextDueDateDays' => (int)$whmcs->get_req_var( 'domainsyncnextduedatedays' ), 'DomainSyncNotifyOnly' => $whmcs->get_req_var( 'domainsyncnotifyonly' ), 'AllowIDNDomains' => $allowidndomains, 'DefaultNameserver1' => $ns1, 'DefaultNameserver2' => $ns2, 'DefaultNameserver3' => $ns3, 'DefaultNameserver4' => $ns4, 'DefaultNameserver5' => $ns5, 'RegistrarAdminUseClientDetails' => $domuseclientsdetails, 'RegistrarAdminFirstName' => $domfirstname, 'RegistrarAdminLastName' => $domlastname, 'RegistrarAdminCompanyName' => $domcompanyname, 'RegistrarAdminEmailAddress' => $domemail, 'RegistrarAdminAddress1' => $domaddress1, 'RegistrarAdminAddress2' => $domaddress2, 'RegistrarAdminCity' => $domcity, 'RegistrarAdminStateProvince' => $domstate, 'RegistrarAdminPostalCode' => $dompostcode, 'RegistrarAdminCountry' => $domcountry, 'RegistrarAdminPhone' => $domphone, 'MailType' => $whmcs->get_req_var( 'mailtype' ), 'MailEncoding' => $mailencoding, 'SMTPPort' => $smtpport, 'SMTPHost' => $smtphost, 'SMTPUsername' => $smtpusername, 'SMTPSSL' => $smtpssl, 'EmailCSS' => $whmcs->get_req_var( 'emailcss' ), 'Signature' => $whmcs->get_req_var( 'signature' ), 'EmailGlobalHeader' => $emailglobalheader, 'EmailGlobalFooter' => $emailglobalfooter, 'SystemEmailsFromName' => $whmcs->get_req_var( 'systememailsfromname' ), 'SystemEmailsFromEmail' => $whmcs->get_req_var( 'systememailsfromemail' ), 'BCCMessages' => $bccmessages, 'ContactFormDept' => $whmcs->get_req_var( 'contactformdept' ), 'ContactFormTo' => $contactformto, 'SupportModule' => $whmcs->get_req_var( 'supportmodule' ), 'TicketMask' => $ticketmask, 'SupportTicketOrder' => $whmcs->get_req_var( 'supportticketorder' ), 'TicketEmailLimit' => $ticketEmailLimit, 'ShowClientOnlyDepts' => $showclientonlydepts, 'RequireLoginforClientTickets' => $whmcs->get_req_var( 'requireloginforclienttickets' ), 'SupportTicketKBSuggestions' => $whmcs->get_req_var( 'supportticketkbsuggestions' ), 'AttachmentThumbnails' => $attachmentthumbnails, 'TicketRatingEnabled' => $whmcs->get_req_var( 'ticketratingenabled' ), 'TicketFeedback' => $ticketfeedback );

	if ((string)$whmcs->get_req_var( 'preventEmailReopening' )) {
		array( 'PreventEmailReopening' => (true ? 1 : 0), 'UpdateLastReplyTimestamp' => $lastreplyupdate, 'DisableSupportTicketReplyEmailsLogging' => $whmcs->get_req_var( 'disablesupportticketreplyemailslogging' ), 'SEOFriendlyUrls' => $whmcs->get_req_var( 'seofriendlyurls' ), 'TicketAllowedFileTypes' => $whmcs->get_req_var( 'allowedfiletypes' ), 'NetworkIssuesRequireLogin' => $whmcs->get_req_var( 'networkissuesrequirelogin' ), 'DownloadsIncludeProductLinked' => $dlinclproductdl, 'ContinuousInvoiceGeneration' => $whmcs->get_req_var( 'continuousinvoicegeneration' ), 'EnablePDFInvoices' => $whmcs->get_req_var( 'enablepdfinvoices' ), 'PDFPaperSize' => $pdfpapersize, 'TCPDFFont' => $tcpdffont, 'StoreClientDataSnapshotOnInvoiceCreation' => $invoiceclientdatasnapshot, 'EnableMassPay' => $whmcs->get_req_var( 'enablemasspay' ), 'AllowCustomerChangeInvoiceGateway' => $whmcs->get_req_var( 'allowcustomerchangeinvoicegateway' ), 'GroupSimilarLineItems' => $whmcs->get_req_var( 'groupsimilarlineitems' ), 'NoAutoApplyCredit' => $whmcs->get_req_var( 'noautoapplycredit' ), 'CancelInvoiceOnCancellation' => $cancelinvoiceoncancel, 'AutoCancelSubscriptions' => $autoCancelSubscriptions, 'EnableProformaInvoicing' => $enableProformaInvoicing, 'SequentialInvoiceNumbering' => $whmcs->get_req_var( 'sequentialinvoicenumbering' ), 'SequentialInvoiceNumberFormat' => $whmcs->get_req_var( 'sequentialinvoicenumberformat' ), 'SequentialInvoiceNumberValue' => $whmcs->get_req_var( 'sequentialinvoicenumbervalue' ), 'LateFeeType' => $whmcs->get_req_var( 'latefeetype' ), 'InvoiceLateFeeAmount' => $whmcs->get_req_var( 'invoicelatefeeamount' ), 'LateFeeMinimum' => $whmcs->get_req_var( 'latefeeminimum' ), 'AcceptedCardTypes' => $acceptedcardtypes, 'ShowCCIssueStart' => $whmcs->get_req_var( 'showccissuestart' ), 'InvoiceIncrement' => (int)$whmcs->get_req_var( 'invoiceincrement' ), 'AddFundsEnabled' => $addfundsenabled, 'AddFundsMinimum' => $addfundsminimum, 'AddFundsMaximum' => $addfundsmaximum, 'AddFundsMaximumBalance' => $addfundsmaximumbalance, 'AddFundsRequireOrder' => $whmcs->get_req_var( 'addfundsrequireorder' ), 'AffiliateEnabled' => $affiliateenabled, 'AffiliateEarningPercent' => $affiliateearningpercent, 'AffiliateBonusDeposit' => $affiliatebonusdeposit, 'AffiliatePayout' => $affiliatepayout, 'AffiliatesDelayCommission' => $affiliatesdelaycommission, 'AffiliateDepartment' => $affiliatedepartment, 'AffiliateLinks' => $affiliatelinks, 'CaptchaSetting' => $whmcs->get_req_var( 'captchasetting' ), 'CaptchaType' => $captchatype, 'ReCAPTCHAPublicKey' => $recaptchapublickey, 'ReCAPTCHAPrivateKey' => $recaptchaprivatekey, 'EnableEmailVerification' => (int)$whmcs->get_req_var( 'enable_email_verification' ), 'RequiredPWStrength' => (int)$whmcs->get_req_var( 'requiredpwstrength' ), 'InvalidLoginBanLength' => (int)$whmcs->get_req_var( 'invalidloginsbanlength' ) );

		if ($sendFailedLoginWhitelist != '') {
			array( 'sendFailedLoginWhitelist' => (true ? 1 : 0), 'AdminForceSSL' => $adminforcessl, 'DisableAdminPWReset' => $disableadminpwreset, 'CCNeverStore' => $ccneverstore );
		}
	}
}

$save_arr = array( 'CCAllowCustomerDelete' => $whmcs->get_req_var( 'ccallowcustomerdelete' ), 'DisableSessionIPCheck' => $whmcs->get_req_var( 'disablesessionipcheck' ), 'AllowSmartyPhpTags' => $allowsmartyphptags, 'proxyHeader' => (bool)$whmcs->get_req_var( 'proxyheader' ), 'LogAPIAuthentication' => (int)$logapiauthentication, 'TwitterUsername' => $twitterusername, 'AnnouncementsTweet' => $announcementstweet, 'AnnouncementsFBRecommend' => $announcementsfbrecommend, 'AnnouncementsFBComments' => $announcementsfbcomments, 'GooglePlus1' => $googleplus1, 'ClientDisplayFormat' => $whmcs->get_req_var( 'clientdisplayformat' ), 'ClientDropdownFormat' => $whmcs->get_req_var( 'clientdropdownformat' ), 'DefaultToClientArea' => $whmcs->get_req_var( 'defaulttoclientarea' ), 'AllowClientRegister' => $whmcs->get_req_var( 'allowclientregister' ), 'ClientsProfileOptionalFields' => $clientsprofoptional, 'ClientsProfileUneditableFields' => $clientsprofuneditable, 'SendEmailNotificationonUserDetailsChange' => $whmcs->get_req_var( 'sendemailnotificationonuserdetailschange' ), 'AllowClientsEmailOptOut' => $whmcs->get_req_var( 'allowclientsemailoptout' ), 'ShowCancellationButton' => $whmcs->get_req_var( 'showcancel' ), 'CreditOnDowngrade' => $whmcs->get_req_var( 'creditondowngrade' ), 'SendAffiliateReportMonthly' => $whmcs->get_req_var( 'affreport' ), 'BannedSubdomainPrefixes' => $bannedsubdomainprefixes, 'DisplayErrors' => $displayerrors, 'SQLErrorReporting' => $sqlerrorreporting, 'HooksDebugMode' => $hooksdebugmode );
$booleanKeys = array( 'MaintenanceMode', 'AllowLanguageChange', 'CutUtf8Mb4', 'EnableTOSAccept', 'ShowNotesFieldonCheckout', 'ProductMonthlyPricingBreakdown', 'AllowDomainsTwice', 'NoInvoiceEmailOnOrder', 'SkipFraudForExisting', 'AutoProvisionExistingOnly', 'GenerateRandomUsername', 'ProrataClientsAnniversaryDate', 'EnableTranslations', 'BulkDomainSearchEnabled', 'AllowRegister', 'AllowTransfer', 'AllowOwnDomain', 'EnableDomainRenewalOrders', 'AutoRenewDomainsonPayment', 'FreeDomainAutoRenewRequiresProduct', 'DomainAutoRenewDefault', 'DomainToDoListEntries', 'DomainSyncEnabled', 'DomainSyncNextDueDate', 'DomainSyncNotifyOnly', 'AllowIDNDomains', 'RegistrarAdminUseClientDetails', 'ShowClientOnlyDepts', 'RequireLoginforClientTickets', 'SupportTicketKBSuggestions', 'TicketRatingEnabled', 'TicketFeedback', 'PreventEmailReopening', 'DisableSupportTicketReplyEmailsLogging', 'SEOFriendlyUrls', 'NetworkIssuesRequireLogin', 'DownloadsIncludeProductLinked', 'ContinuousInvoiceGeneration', 'EnablePDFInvoices', 'StoreClientDataSnapshotOnInvoiceCreation', 'EnableMassPay', 'AllowCustomerChangeInvoiceGateway', 'GroupSimilarLineItems', 'NoAutoApplyCredit', 'CancelInvoiceOnCancellation', 'AutoCancelSubscriptions', 'EnableProformaInvoicing', 'SequentialInvoiceNumbering', 'ShowCCIssueStart', 'AddFundsEnabled', 'AddFundsRequireOrder', 'AffiliateEnabled', 'EnableEmailVerification', 'sendFailedLoginWhitelist', 'AdminForceSSL', 'DisableAdminPWReset', 'CCNeverStore', 'CCAllowCustomerDelete', 'DisableSessionIPCheck', 'AllowSmartyPhpTags', 'LogAPIAuthentication', 'AnnouncementsTweet', 'AnnouncementsFBRecommend', 'AnnouncementsFBComments', 'GooglePlus1', 'DefaultToClientArea', 'AllowClientRegister', 'SendEmailNotificationonUserDetailsChange', 'AllowClientsEmailOptOut', 'ShowCancellationButton', 'CreditOnDowngrade', 'SendAffiliateReportMonthly', 'DisplayErrors', 'SQLErrorReporting', 'HooksDebugMode' );
$basicLoggingKeys = array( 'InvoicePayTo', 'MaintenanceModeMessage', 'EmailCSS', 'Signature', 'EmailGlobalHeader', 'EmailGlobalFooter', 'AffiliateLinks', 'ReCAPTCHAPublicKey', 'ReCAPTCHAPrivateKey', 'BannedSubdomainPrefixes' );
$secureKeys = array( 'SMTPPassword' );
$changes = array(  );
trim( $whmcs->get_req_var( 'smtppassword' ) );
$newPassword = ;
decrypt( $whmcs->get_config( 'SMTPPassword' ) );
$originalPassword = ;
interpretMaskedPasswordChangeForStorage( $newPassword, $originalPassword );
$valueToStore = ;

if ($valueToStore !== false) {
	$save_arr['SMTPPassword'] = $valueToStore;

	if ($newPassword != $originalPassword) {
		$changes[] = 'SMTP Password Changed';
		foreach ($save_arr as ) {
			$v = ;
			$k = ;
			chhgjaeced::setValue( $k, trim( $v ) );

			if (( $existingConfig[$k] != trim( $v ) && !in_array( $k, $secureKeys ) )) {
				$regEx = '/(?<=[a-z])(?=[A-Z])|(?<=[A-Z])(?=[A-Z][a-z])/x';
				preg_split( $regEx, $k );
				$friendlySettingParts = ;
				implode( ' ', $friendlySettingParts );
				$friendlySetting = ;

				if (in_array( $k, $booleanKeys )) {
					if (( ( !$v || $v === false ) || $v == 'off' )) {
						$changes[] =  . $friendlySetting . ' Disabled';
						break;
					}

					break;
				}
			}

			break;
		}


		if (( $continuousinvoicegeneration == 'on' && !$CONFIG['ContinuousInvoiceGeneration'] )) {
			full_query( 'UPDATE tblhosting SET nextinvoicedate = nextduedate' );
			full_query( 'UPDATE tbldomains SET nextinvoicedate = nextduedate' );
			full_query( 'UPDATE tblhostingaddons SET nextinvoicedate = nextduedate' );
			$token_manager = &getTokenManager(  );

			$token_manager->processAdminHTMLSave( $whmcs );
			chhgjaeced::getValue( 'token_namespaces' );
			$tokenNamespaces = ;

			if ($existingConfig['token_namespaces'] != $tokenNamespaces) {
				$changes[] = 'CSRF Token Settings changed';
				$invoicestartnumber = (int)$whmcs->get_req_var( 'invoicestartnumber' );

				if (0 < $invoicestartnumber) {
					get_query_val( 'tblinvoiceitems', 'invoiceid', '', 'invoiceid', 'DESC', '0,1' );
					$maxinvnum = ;

					if ($invoicestartnumber < $maxinvnum) {
						if ($changes) {
							logAdminActivity( 'General Settings Modified. Changes made: ' . implode( '. ', $changes ) . '.' );
							redir(  . 'tab=' . $tab . '&error=invnumtoosml' );
							full_query( 'ALTER TABLE tblinvoices AUTO_INCREMENT = ' . (int)$invoicestartnumber );
							$changes[] =  . 'Invoice Starting Number Changed to ' . $invoicestartnumber;

							if ($changes) {
								logAdminActivity( 'General Settings Modified. Changes made: ' . implode( '. ', $changes ) . '.' );
								redir(  . 'tab=' . $tab . '&success=true' );
								eaaadiagec::release(  );
								ob_start(  );
								$jquerycode .= '
$("#enableProformaInvoicing").click(function() {
    if ($("#enableProformaInvoicing").is(":checked")) {
        $("#sequentialpaidnumbering").prop("checked", true);
        $("#sequentialpaidnumbering").prop("disabled", true);
    } else {
        $("#sequentialpaidnumbering").prop("disabled", false);
    }
});
$("#saveChanges").click(function() {
     $("#sequentialpaidnumbering").prop("disabled", false);
});

$("#removewhitelistedip").click(function () {
    var removeip = $(\'#whitelistedips option:selected\').text();
    $(\'#whitelistedips option:selected\').remove();
    $.post("configgeneral.php", { action: "deletewhitelistip", removeip: removeip, token: "' . generate_token( 'plain' ) . '" });
    return false;
});
function checkToDisplayAccessDeniedMessage($box, responseText)
{
    var errorResponse;
    var errorResponseHtml;

    // Check if access was denied.  If so, load the error page.
    if (responseText.toLowerCase().indexOf("error-page") !== -1) {
        // Create a jQuery object from the page\'s response,
        // so it can be traversed.
        errorResponse = jQuery("<div>", { html: responseText });

        // Remove the "Access Denied" <h1> tag.
        errorResponse.find("h1").remove();
        // Remove the "Go Back" button.
        errorResponse.find(".error-footer").remove();

        // Find the markup for the error page.
        errorResponseHtml = errorResponse.find("#contentarea")
            .html();

        // Load the error page\'s markup.
        $box.html(errorResponseHtml);
    }
}

$("#removetrustedproxyip").click(function () {
    var removeip = $(\'#trustedproxyips option:selected\').text();
    $(\'#trustedproxyips option:selected\').remove();
    $.post("configgeneral.php", { action: "deletetrustedproxyip", removeip: removeip, token: "' . generate_token( 'plain' ) . '" });
    return false;
});
$("#removeapiip").click(function () {
    var removeip = $(\'#apiallowedips option:selected\').text();
    $(\'#apiallowedips option:selected\').remove();
    $.post("configgeneral.php", { action: "deleteapiip", removeip: removeip, token: "' . generate_token( 'plain' ) . '" });
    return false;
});
';
								echo $aInt->modal( 'AddTrustedProxyIp', $aInt->lang( 'general', 'addtrustedproxy' ), '<table id="add-trusted-proxy-ip-table"><tr><td>' . $aInt->lang( 'fields', 'ipaddressorrange' ) . ':</td><td><input type="text" id="ipaddress3" class="form-control" /></td></tr>' . '<tr><td></td><td>' . $aInt->lang( 'fields', 'ipaddressorrangeinfo' ) . ' <a href="http://docs.whmcs.com/Security_Tab#Trusted Proxies" target="_blank">' . $aInt->lang( 'help', 'contextlink' ) . '?</a></td></tr><tr><td>' . $aInt->lang( 'fields', 'adminnotes' ) . ':</td><td><input type="text" id="notes3" class="form-control" /></td></tr></table>', array( array( 'title' => $aInt->lang( 'general', 'addip' ), 'onclick' => 'addTrustedProxyIp(jQuery("#ipaddress3").val(),jQuery("#notes3").val());' ), array( 'title' => $aInt->lang( 'global', 'cancel' ) ) ) );
								echo $aInt->modal( 'AddWhiteListIp', $aInt->lang( 'general', 'addwhitelistedip' ), '<table id="add-white-listed-ip-table"><tr><td>' . $aInt->lang( 'fields', 'ipaddress' ) . ':</td><td><input type="text" id="ipaddress" class="form-control" /></td></tr>' . '<tr><td>' . $aInt->lang( 'fields', 'reason' ) . ':</td><td><input type="text" id="notes" class="form-control" />' . '</td></tr></table>', array( array( 'title' => $aInt->lang( 'general', 'addip' ), 'onclick' => 'addWhiteListedIp(jQuery("#ipaddress").val(), jQuery("#notes").val());' ), array( 'title' => $aInt->lang( 'global', 'cancel' ) ) ), 'small' );
								echo $aInt->modal( 'AddApiIp', $aInt->lang( 'general', 'addwhitelistedip' ), '<table><tr><td>' . $aInt->lang( 'fields', 'ipaddress' ) . ':</td><td><input type="text" id="ipaddress2" class="form-control" /></td></tr>' . '<tr><td>' . $aInt->lang( 'fields', 'notes' ) . ':</td><td><input type="text" id="notes2" class="form-control" />' . '</td></tr></table>', array( array( 'title' => $aInt->lang( 'general', 'addip' ), 'onclick' => 'addApiIp(jQuery("#ipaddress2").val(), jQuery("#notes2").val());' ), array( 'title' => $aInt->lang( 'global', 'cancel' ) ) ), 'small' );
								generate_token( 'plain' );
								$token = ;
								$jsCode =  . 'function addTrustedProxyIp(ipaddress, note) {
    jQuery.post(
        "configgeneral.php",
        {
            action: "addTrustedProxyIp",
            ipaddress: ipaddress,
            notes: note,
            token: "' . $token . '"
        },
        function (data) {
            if (data) {
                alert(data);
            } else {
                jQuery(\'#trustedproxyips\').append(\'<option>\' + ipaddress + \' - \' + note + \'</option>\');
                jQuery(\'#modalAddTrustedProxyIp\').modal(\'hide\');
            }
        }
    );
    return false;
}

function addWhiteListedIp(ipaddress, note) {
    jQuery(\'#whitelistedips\').append(\'<option>\' + ipaddress + \' - \' + note + \'</option>\');
    jQuery.post(
        "configgeneral.php",
        {
            action: "addWhiteListIp",
            ipaddress: ipaddress,
            notes: note,
            token: "' . $token . '"
        }
    );
    jQuery(\'#modalAddWhiteListIp\').modal(\'hide\');
    return false;
}

function addApiIp(ipaddress, note) {
    jQuery(\'#apiallowedips\').append(\'<option>\' + ipaddress + \' - \' + note + \'</option>\');
    jQuery.post(
        "configgeneral.php",
        {
            action: "addApiIp",
            ipaddress: ipaddress,
            notes: note,
            token: "' . $token . '"
        }
    );
    jQuery(\'#modalAddApiIp\').modal(\'hide\');
    return false;
}';
								$infobox = '';

								if (defined( 'DEMO_MODE' )) {
									infoBox( 'Demo Mode', 'Actions on this page are unavailable while in demo mode. Changes will not be saved.' );

									if ($success) {
										infoBox( $aInt->lang( 'general', 'changesuccess' ), $aInt->lang( 'general', 'changesuccessinfo' ) );

										if ($error == 'invnumtoosml') {
											infoBox( $aInt->lang( 'global', 'validationerror' ), $aInt->lang( 'general', 'errorinvnumtoosml' ), 'error' );
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
else {
	echo '> ';
	echo $aInt->lang( 'general', 'domainsyncnotifyonlyinfo' );
	echo '</label></td></tr>
<tr>
    <td class="fieldlabel">';
	echo $aInt->lang( 'general', 'allowidndomains' );
	echo '</td>
    <td class="fieldarea">
        <label class="checkbox-inline"><input type="checkbox" name="allowidndomains"';

	if ($CONFIG['AllowIDNDomains']) {
		echo ' checked';
		echo ' ';

		if ($hasMbstring === false) {
			echo (true ? 'disabled="disabled"' : '');
			echo ' /> ';
			echo $aInt->lang( 'general', 'allowidndomainsinfo' );
			echo '        </label>
';

			if ($hasMbstring === false) {
				echo '        <div id="warnIDN" style="background: #FCFCFC; border: 1px solid red; padding: 2px; max-width: 50em">';
				echo $aInt->lang( 'general', 'idnmbstringwarning' );
				echo '</td></div>
';
				echo '    </td>
</tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'general', 'bulkdomainsearch' );
				echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="BulkDomainSearchEnabled"';

				if ($CONFIG['BulkDomainSearchEnabled']) {
					echo ' checked';
					echo '> ';
					echo $aInt->lang( 'general', 'bulkdomainsearchinfo' );
					echo '</label></td></tr>
    ';
					$aInt->lang( 'global', 'configure' );
					$langConfigure = ;
					$aInt->lang( 'global', 'activateandconfigure' );
					$langActivateAndConfigure = ;
					$providersJs = '$("#configureStdWhoisLookupProvider").click(
    function(e) {
        e.preventDefault();
        box = jQuery("#modalConfigureDialogWhmcsWhois");
        jQuery("#modalConfigureDialogWhmcsWhois #modalConfigureDialogWhmcsWhoisBody").load(
            "configdomainlookup.php?action=configure&domainLookupProvider=WhmcsWhois #containerProviderSettingsWhmcsWhois",
            function(responseText, textStatus, XMLHttpRequest) {
                checkToDisplayAccessDeniedMessage(box, responseText);
            }
        );
        box.modal(\'show\');
        return false;
    }
);

$("#configureEnomLookupProvider").click(
    function(e) {
        e.preventDefault();
        box = jQuery("#modalConfigureDialogEnom");
        jQuery("#modalConfigureDialogEnom #modalConfigureDialogEnomBody").load(
            "configdomainlookup.php?action=configure&domainLookupProvider=Enom #containerProviderSettingsEnom",
            function(responseText, textStatus, XMLHttpRequest) {
                checkToDisplayAccessDeniedMessage(box, responseText);
            }
        );
        box.modal(\'show\');
        return false;
    }
);
';
					$aInt->addHeadJqueryCode( $providersJs );
					$aInt->addHeadJsCode(  . '
function toggleProviders(data) {
    if (data.domainLookupProvider == \'Enom\') {
        $(\'#providerBoxEnom\').removeClass(\'providerBoxInactive\');
        $(\'#providerBoxEnom\').addClass(\'providerBoxActive\');
        $(\'#providerActiveBadgeEnom\').removeClass(\'hidden\');
        $(\'#configureEnomLookupProvider\').attr(\'value\', \'' . $langConfigure . '\');
        $(\'#configureEnomLookupProvider\').addClass(\'btn-default\');
        $(\'#configureEnomLookupProvider\').removeClass(\'btn-primary\');

        $(\'#providerBoxStdWhois\').removeClass(\'providerBoxActive\');
        $(\'#providerBoxStdWhois\').addClass(\'providerBoxInactive\');
        $(\'#providerActiveBadgeStdWhois\').addClass(\'hidden\');
        $(\'#configureStdWhoisLookupProvider\').attr(\'value\', \'' . $langActivateAndConfigure . '\');
        $(\'#configureStdWhoisLookupProvider\').addClass(\'btn-primary\');
        $(\'#configureStdWhoisLookupProvider\').removeClass(\'btn-default\');
    } else {
        $(\'#providerBoxEnom\').removeClass(\'providerBoxActive\');
        $(\'#providerBoxEnom\').addClass(\'providerBoxInactive\');
        $(\'#providerActiveBadgeEnom\').addClass(\'hidden\');
        $(\'#configureEnomLookupProvider\').attr(\'value\', \'' . $langActivateAndConfigure . '\');
        $(\'#configureEnomLookupProvider\').addClass(\'btn-primary\');
        $(\'#configureEnomLookupProvider\').removeClass(\'btn-default\');

        $(\'#providerBoxStdWhois\').addClass(\'providerBoxActive\');
        $(\'#providerBoxStdWhois\').removeClass(\'providerBoxInactive\');
        $(\'#providerActiveBadgeStdWhois\').removeClass(\'hidden\');
        $(\'#configureStdWhoisLookupProvider\').attr(\'value\', \'' . $langConfigure . '\');
        $(\'#configureStdWhoisLookupProvider\').addClass(\'btn-default\');
        $(\'#configureStdWhoisLookupProvider\').removeClass(\'btn-primary\');
    }
}' );
					$ajax = 'jQuery.ajax({
    url: "configdomainlookup.php",
    type: "post",
    dataType: "json",
    data: jQuery("#providerSettingsWhmcsWhois").serialize(),
    success: function(data) {
        if (data.status) {
                jQuery.ajax({
                    url: "configdomainlookup.php",
                    type: "post",
                    dataType: "json",
                    data: "action=whichDomainLookupProvider",
                    success: function(data) { toggleProviders(data); }
                });
                jQuery("#modalConfigureDialogWhmcsWhois").modal("hide");
        } else {
            jQuery("div#settingSaveStatusWhmcsWhois").html(data.errorMsg);
        }
    }
});';
					$ajaxEnom = 'jQuery.ajax({
    url: "configdomainlookup.php",
    type: "post",
    dataType: "json",
    data: jQuery("#providerSettingsEnom").serialize(),
    success: function(data) {
        if (data.status) {
            if (data.doSettings) {
                jQuery("#modalConfigureDialogEnom #modalConfigureDialogEnomBody").load(
                    "configdomainlookup.php?skipAccountCheck=1&action=configure&domainLookupProvider=Enom #containerProviderSettingsEnom"
                );
            } else {
                jQuery.ajax({
                    url: "configdomainlookup.php",
                    type: "post",
                    dataType: "json",
                    data: "action=whichDomainLookupProvider",
                    success: function(data) { toggleProviders(data); }
                });
                jQuery("#modalConfigureDialogEnom").modal("hide");
            }
        } else {
            jQuery("div#settingSaveStatusEnom").html(data.errorMsg);
        }
    }
});';
					echo $aInt->modal( 'ConfigureDialogWhmcsWhois', 'Configure TLD Suggestions', $aInt->lang( 'global', 'loading' ), array( array( 'title' => $aInt->lang( 'global', 'close' ) ), array( 'title' => $aInt->lang( 'global', 'save' ), 'onclick' => $ajax ) ) );
					echo $aInt->modal( 'ConfigureDialogEnom', 'Configure NameSpinner', $aInt->lang( 'global', 'loading' ), array( array( 'title' => $aInt->lang( 'global', 'close' ) ), array( 'title' => $aInt->lang( 'global', 'save' ), 'onclick' => $ajaxEnom ) ) );
					echo '<tr><td class="fieldlabel">';
					echo $aInt->lang( 'domainregistrars', 'defaultns1' );
					echo '</td><td class="fieldarea"><input type="text" name="ns1" size="40" value="';
					echo $CONFIG['DefaultNameserver1'];
					echo '"></td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'domainregistrars', 'defaultns2' );
					echo '</td><td class="fieldarea"><input type="text" name="ns2" size="40" value="';
					echo $CONFIG['DefaultNameserver2'];
					echo '"></td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'domainregistrars', 'defaultns3' );
					echo '</td><td class="fieldarea"><input type="text" name="ns3" size="40" value="';
					echo $CONFIG['DefaultNameserver3'];
					echo '"></td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'domainregistrars', 'defaultns4' );
					echo '</td><td class="fieldarea"><input type="text" name="ns4" size="40" value="';
					echo $CONFIG['DefaultNameserver4'];
					echo '"></td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'domainregistrars', 'defaultns5' );
					echo '</td><td class="fieldarea"><input type="text" name="ns5" size="40" value="';
					echo $CONFIG['DefaultNameserver5'];
					echo '"></td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'domainregistrars', 'useclientsdetails' );
					echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="domuseclientsdetails"';

					if ($CONFIG['RegistrarAdminUseClientDetails'] == 'on') {
						echo ' checked';
						echo '> ';
						echo $aInt->lang( 'domainregistrars', 'useclientsdetailsdesc' );
						echo '</label></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'fields', 'firstname' );
						echo '</td><td class="fieldarea"><input type="text" name="domfirstname" size="30" value="';
						echo $CONFIG['RegistrarAdminFirstName'];
						echo '"> ';
						echo $aInt->lang( 'domainregistrars', 'defaultcontactdetails' );
						echo '</td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'fields', 'lastname' );
						echo '</td><td class="fieldarea"><input type="text" name="domlastname" size="30" value="';
						echo $CONFIG['RegistrarAdminLastName'];
						echo '"></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'fields', 'companyname' );
						echo '</td><td class="fieldarea"><input type="text" name="domcompanyname" size="30" value="';
						echo $CONFIG['RegistrarAdminCompanyName'];
						echo '"></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'fields', 'email' );
						echo '</td><td class="fieldarea"><input type="text" name="domemail" size="30" value="';
						echo $CONFIG['RegistrarAdminEmailAddress'];
						echo '"></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'fields', 'address1' );
						echo '</td><td class="fieldarea"><input type="text" name="domaddress1" size="30" value="';
						echo $CONFIG['RegistrarAdminAddress1'];
						echo '"></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'fields', 'address2' );
						echo '</td><td class="fieldarea"><input type="text" name="domaddress2" size="30" value="';
						echo $CONFIG['RegistrarAdminAddress2'];
						echo '"></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'fields', 'city' );
						echo '</td><td class="fieldarea"><input type="text" name="domcity" size="30" value="';
					}
				}
			}
		}
	}

	echo $CONFIG['RegistrarAdminCity'];
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'state' );
	echo '</td><td class="fieldarea"><input type="text" name="domstate" size="30" value="';
	echo $CONFIG['RegistrarAdminStateProvince'];
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'postcode' );
	echo '</td><td class="fieldarea"><input type="text" name="dompostcode" size="30" value="';
	echo $CONFIG['RegistrarAdminPostalCode'];
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'country' );
	echo '</td><td class="fieldarea">';
	echo getCountriesDropDown( $CONFIG['RegistrarAdminCountry'], 'domcountry' );
	echo '</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'phonenumber' );
	echo '</td><td class="fieldarea"><input type="text" name="domphone" size="30" value="';
	echo $CONFIG['RegistrarAdminPhone'];
	echo '"></td></tr>
</table>

';
	echo $aInt->nextAdminTab(  );
	echo '
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'general', 'mailtype' );
	echo '</td><td class="fieldarea">
    <select name="mailtype" class="form-control select-inline">
        <option value="mail"';

	if ($CONFIG['MailType'] == 'mail') {
		echo ' selected';
		echo '>';
		echo $aInt->lang( 'general', 'phpmail' );
		echo '</option>
        <option value="smtp"';

		if ($CONFIG['MailType'] == 'smtp') {
			echo ' selected';
			echo '>';
			echo $aInt->lang( 'general', 'smtp' );
			echo '</option>
    </select></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'mailencoding' );
			echo '</td><td class="fieldarea">';
			echo $frm1->dropdown( 'mailencoding', $validMailEncodings, $whmcs->get_config( 'MailEncoding' ) );
			echo '</td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'smtpport' );
			echo '</td><td class="fieldarea"><input type="text" name="smtpport" size="5" value="';
			echo $CONFIG['SMTPPort'];
			echo '"> ';
			echo $aInt->lang( 'general', 'smtpportinfo' );
			echo '</td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'smtphost' );
			echo '</td><td class="fieldarea"><input type="text" name="smtphost" size="40" value="';
			echo $CONFIG['SMTPHost'];
			echo '"></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'smtpusername' );
			echo '</td><td class="fieldarea"><input type="text" name="smtpusername" size="35" value="';
			echo $CONFIG['SMTPUsername'];
			echo '"></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'smtppassword' );
			echo '</td><td class="fieldarea"><input type="password" name="smtppassword" size="20" value="';
			echo replacePasswordWithMasks( decrypt( $CONFIG['SMTPPassword'] ) );
			echo '"></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'smtpssltype' );
			echo '</td><td class="fieldarea">
<label class="radio-inline"><input type="radio" name="smtpssl" id="mail-smtp-nossl" value="" ';

			if ($CONFIG['SMTPSSL'] == '') {
				echo ' CHECKED';
				echo '> ';
				echo $aInt->lang( 'global', 'none' );
				echo '</label>
<label class="radio-inline"><input type="radio" name="smtpssl" id="mail-smtp-ssl" value="ssl" ';

				if ($CONFIG['SMTPSSL'] == 'ssl') {
					echo ' CHECKED';
					echo '> ';
					echo $aInt->lang( 'general', 'smtpssl' );
					echo '</label>
<label class="radio-inline"><input type="radio" name="smtpssl" id="mail-smtp-tls" value="tls" ';

					if ($CONFIG['SMTPSSL'] == 'tls') {
						echo ' CHECKED';
						echo '> ';
						echo $aInt->lang( 'general', 'smtptls' );
						echo '</label></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'general', 'mailsignature' );
						echo '</td><td class="fieldarea"><div class="row"><div class="col-sm-8"><textarea name="signature" rows="4" class="form-control">';
						echo $CONFIG['Signature'];
						echo '</textarea></div></div></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'general', 'emailcsscode' );
						echo '</td><td class="fieldarea"><textarea name="emailcss" rows="4" class="form-control">';
						echo $CONFIG['EmailCSS'];
						echo '</textarea></td></tr>
<tr>
    <td class="fieldlabel">
        ';
						echo $aInt->lang( 'general', 'emailClientHeader' );
						echo '    </td>
    <td class="fieldarea">
        <textarea name="emailglobalheader" rows="5" class="form-control bottom-margin-5">
            ';
						echo dfdidhdbdc::makeSafeForOutput( $CONFIG['EmailGlobalHeader'] );
						echo '        </textarea>
        ';
						echo $aInt->lang( 'general', 'emailClientHeaderInfo' );
						echo '    </td>
</tr>
<tr>
    <td class="fieldlabel">
        ';
						echo $aInt->lang( 'general', 'emailClientFooter' );
						echo '    </td>
    <td class="fieldarea">
        <textarea name="emailglobalfooter" rows="5" class="form-control bottom-margin-5">
            ';
						echo dfdidhdbdc::makeSafeForOutput( $CONFIG['EmailGlobalFooter'] );
						echo '        </textarea>
        ';
						echo $aInt->lang( 'general', 'emailClientFooterInfo' );
						echo '    </td>
</tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'general', 'systemfromname' );
						echo '</td><td class="fieldarea"><input type="text" name="systememailsfromname" size="35" value="';
						echo dfdidhdbdc::makeSafeForOutput( $CONFIG['SystemEmailsFromName'] );
						echo '"></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'general', 'systemfromemail' );
						echo '</td><td class="fieldarea"><input type="text" name="systememailsfromemail" size="50" value="';
						echo $CONFIG['SystemEmailsFromEmail'];
						echo '"></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'general', 'bccmessages' );
						echo '</td><td class="fieldarea"><input type="text" name="bccmessages" size="60" value="';
						echo $CONFIG['BCCMessages'];
						echo '"><br>';
						echo $aInt->lang( 'general', 'bccmessagesinfo' );
						echo '</td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'general', 'presalesdest' );
						echo '</td><td class="fieldarea"><select name="contactformdept" class="form-control select-inline"><option value="">';
						echo $aInt->lang( 'general', 'presalesdept' );
						echo '</option>';
						select_query( 'tblticketdepartments', 'id, name', '' );
						$dept_query = ;
						mysql_fetch_assoc( $dept_query );

						if ($dept_result = ) {
							$selected = '';

							if ($CONFIG['ContactFormDept'] == $dept_result['id']) {
								$selected = ' selected';
								echo '<option value="' . $dept_result['id'] . '"' . $selected . '>' . $dept_result['name'] . '</option>';
							}
						}
					}
				}
			}
		}
	}
}


if ((bool)) {
	echo ' checked';
	echo ' /> ';
	$aInt->lang( 'general', 'supportlastreplyupdatealways' );
}

echo ;
echo '        </label>
        <label class="radio-inline">
            <input type="radio" name="lastreplyupdate" value="statusonly"';

if ($whmcs->get_config( 'UpdateLastReplyTimestamp' ) == 'statusonly') {
	echo ' checked';
	echo ' /> ';
	echo $aInt->lang( 'general', 'supportlastreplyupdateonlystatuschange' );
	echo '        </label>
    </td>
</tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'general', 'disablereplylogging' );
	echo '</td><td class="fieldarea"><input type="checkbox" name="disablesupportticketreplyemailslogging"';

	if ($CONFIG['DisableSupportTicketReplyEmailsLogging']) {
		echo ' checked';
		echo '> ';
		echo $aInt->lang( 'general', 'disablereplylogginginfo' );
		echo '</td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'general', 'kbseourls' );
		echo '</td><td class="fieldarea"><input type="checkbox" name="seofriendlyurls"';

		if ($CONFIG['SEOFriendlyUrls']) {
			echo ' checked';
			echo '> ';
			echo $aInt->lang( 'general', 'kbseourlsinfo' );
			echo '</td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'allowedattachments' );
		}
	}
}

echo '</td><td class="fieldarea"><input type="text" name="allowedfiletypes" value="';
echo $CONFIG['TicketAllowedFileTypes'];
echo '" size="50"> ';
echo $aInt->lang( 'general', 'allowedattachmentsinfo' );
echo '</td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'general', 'networklogin' );
echo '</td><td class="fieldarea"><input type="checkbox" name="networkissuesrequirelogin"';

if ($CONFIG['NetworkIssuesRequireLogin']) {
	echo ' checked';
	echo '> ';
	echo $aInt->lang( 'general', 'networklogininfo' );
	echo '</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'general', 'incproductdls' );
	echo '</td><td class="fieldarea"><input type="checkbox" name="dlinclproductdl"';

	if ($CONFIG['DownloadsIncludeProductLinked']) {
		echo ' checked';
		echo '> ';
		echo $aInt->lang( 'general', 'incproductdlsinfo' );
		echo '</td></tr>
</table>

';
		echo $aInt->nextAdminTab(  );
		echo '
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'general', 'continvgeneration' );
		echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="continuousinvoicegeneration"';

		if ($CONFIG['ContinuousInvoiceGeneration'] == 'on') {
			echo ' checked';
			echo '> ';
			echo $aInt->lang( 'general', 'continvgenerationinfo' );
			echo '</label></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'enablepdf' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="enablepdfinvoices"';

			if ($CONFIG['EnablePDFInvoices'] == 'on') {
				echo ' checked';
				echo '> ';
				echo $aInt->lang( 'general', 'enablepdfinfo' );
				echo '</label></td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'general', 'pdfpapersize' );
				echo '</td><td class="fieldarea"><select name="pdfpapersize" class="form-control select-inline">
<option value="A4"';

				if ($whmcs->get_config( 'PDFPaperSize' ) == 'A4') {
					echo ' selected';
					echo '>A4</option>
<option value="Letter"';

					if ($whmcs->get_config( 'PDFPaperSize' ) == 'Letter') {
						echo ' selected';
						echo '>Letter</option>
</select> ';
						echo $aInt->lang( 'general', 'pdfpapersizeinfo' );
						echo '</td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'general', 'tcpdffont' );
						echo '</td><td class="fieldarea">
';
						foreach ($tcpdfDefaultFonts as ) {
							$font = ;
							echo '<label class="radio-inline"><input type="radio" name="tcpdffont" value="' . $font . '"';

							if ($font == $activeFontName) {
								echo ' checked';
								$defaultFont = true;
								$activeFontName = '';
								echo ' /> ' . ucfirst( $font ) . '</label> ';
								break;
							}

							break;
						}

						echo '<label class="radio-inline"><input type="radio" name="tcpdffont" value="custom"';

						if (!$defaultFont) {
							echo ' checked';
							echo ' /> Custom</label> <input type="text" name="tcpdffontcustom" size="15" value="' . $activeFontName . '" />';
							echo '</td></tr>
<tr><td class="fieldlabel">';
							echo $aInt->lang( 'general', 'storeClientDataSnapshot' );
							echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="invoiceclientdatasnapshot"';

							if ($CONFIG['StoreClientDataSnapshotOnInvoiceCreation']) {
								echo ' checked';
								echo '> ';
								echo $aInt->lang( 'general', 'storeClientDataSnapshotInfo' );
								echo '</label></td></tr>
<tr><td class="fieldlabel">';
								echo $aInt->lang( 'general', 'enablemasspay' );
								echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="enablemasspay"';

								if ($CONFIG['EnableMassPay'] == 'on') {
									echo ' checked';
									echo '> ';
									echo $aInt->lang( 'general', 'enablemasspayinfo' );
									echo '</label></td></tr>
<tr><td class="fieldlabel">';
									echo $aInt->lang( 'general', 'clientsgwchoose' );
									echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="allowcustomerchangeinvoicegateway"';

									if ($CONFIG['AllowCustomerChangeInvoiceGateway'] == 'on') {
										echo ' checked';
										echo '> ';
										echo $aInt->lang( 'general', 'clientsgwchooseinfo' );
										echo '</label></td></tr>
<tr><td class="fieldlabel">';
										echo $aInt->lang( 'general', 'groupsimilarlineitems' );
										echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="groupsimilarlineitems"';

										if ($CONFIG['GroupSimilarLineItems']) {
											echo ' checked';
											echo '> ';
											echo $aInt->lang( 'general', 'groupsimilarlineitemsinfo' );
											echo '</label></td></tr>
<tr><td class="fieldlabel">';
											echo $aInt->lang( 'general', 'disableautocreditapply' );
											echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="noautoapplycredit"';

											if ($CONFIG['NoAutoApplyCredit']) {
												echo ' checked';
												echo '> ';
												echo $aInt->lang( 'general', 'disableautocreditapplyinfo' );
												echo '</label></td></tr>
<tr><td class="fieldlabel">';
												echo $aInt->lang( 'general', 'cancelinvoiceoncancel' );
												echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="cancelinvoiceoncancel"';

												if ($CONFIG['CancelInvoiceOnCancellation']) {
													echo ' checked';
													echo '> ';
													echo $aInt->lang( 'general', 'cancelinvoiceoncancelinfo' );
													echo '</label></td></tr>
<tr><td class="fieldlabel">';
													echo $aInt->lang( 'general', 'autoCancelSubscriptions' );
													echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="autoCancelSubscriptions"';

													if ($CONFIG['AutoCancelSubscriptions']) {
														echo ' checked';
														echo '> ';
														$aInt->lang( 'general', 'autoCancelSubscriptionsInfo' );
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

echo ;
echo '</label></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'general', 'enableProformaInvoicing' );
echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" id="enableProformaInvoicing" name="enableProformaInvoicing"';

if (chhgjaeced::getValue( 'EnableProformaInvoicing' )) {
	echo ' checked';
	echo '> ';
	echo $aInt->lang( 'general', 'enableProformaInvoicingInfo' );
	echo '</label></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'general', 'sequentialpaidnumbering' );
	echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" id="sequentialpaidnumbering" name="sequentialinvoicenumbering"';

	if (chhgjaeced::getValue( 'SequentialInvoiceNumbering' ) == 'on') {
		echo ' checked';

		if (chhgjaeced::getValue( 'EnableProformaInvoicing' )) {
			echo ' disabled';
			echo '> ';
			echo $aInt->lang( 'general', 'sequentialpaidnumberinginfo' );
			echo '</label></td></tr>
<tr>
    <td class="fieldlabel">
        ';
			echo $aInt->lang( 'general', 'sequentialpaidformat' );
			echo '    </td>
    <td class="fieldarea">
        <input type="text" name="sequentialinvoicenumberformat" value="';
			echo $CONFIG['SequentialInvoiceNumberFormat'];
			echo '" size="25" />
        ';
			echo $aInt->lang( 'general', 'sequentialpaidformatinfo' );
			echo ' {YEAR} {MONTH} {DAY} {NUMBER}
    </td>
</tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'nextpaidnumber' );
			echo '</td><td class="fieldarea"><input type="text" name="sequentialinvoicenumbervalue" value="';
			echo $CONFIG['SequentialInvoiceNumberValue'];
			echo '" size="5"> ';
			echo $aInt->lang( 'general', 'nextpaidnumberinfo' );
			echo '</td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'latefeetype' );
			echo '</td><td class="fieldarea"><label class="radio-inline"><input type="radio" name="latefeetype" value="Percentage"';

			if ($CONFIG['LateFeeType'] == 'Percentage') {
				echo ' checked';
				echo '> ';
				echo $aInt->lang( 'affiliates', 'percentage' );
				echo '</label> <label class="radio-inline"><input type="radio" name="latefeetype" value="Fixed Amount"';

				if ($CONFIG['LateFeeType'] == 'Fixed Amount') {
					echo ' checked';
					echo '> ';
					echo $aInt->lang( 'affiliates', 'fixedamount' );
					echo '</label></td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'general', 'latefeeamount' );
					echo '</td><td class="fieldarea"><input type="text" name="invoicelatefeeamount" value="';
					echo $CONFIG['InvoiceLateFeeAmount'];
					echo '" size="8"> ';
					echo $aInt->lang( 'general', 'latefeeamountinfo' );
					echo '</td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'general', 'latefeemin' );
					echo '</td><td class="fieldarea"><input type="text" name="latefeeminimum" value="';
					echo $CONFIG['LateFeeMinimum'];
					echo '" size="8"> ';
					echo $aInt->lang( 'general', 'latefeemininfo' );
					echo '</td></tr>
';
					$CONFIG['AcceptedCardTypes'];
					$acceptedcctypes = ;
					explode( ',', $acceptedcctypes );
					$acceptedcctypes = ;
					echo '<tr>
    <td class="fieldlabel">';
					echo $aInt->lang( 'general', 'acceptedcardtype' );
					echo '</td>
    <td class="fieldarea">
        <select name="acceptedcctypes[]" size="5" multiple class="form-control select-inline bottom-margin-5">
';
					$cardTypes = array( 'Visa', 'MasterCard', 'Discover', 'American Express', 'JCB', 'EnRoute', 'Diners Club', 'Solo', 'Switch', 'Maestro', 'Visa Debit', 'Visa Electron', 'Laser' );
					foreach ($cardTypes as ) {
						$cardType = ;
						$aInt->lang( 'general', str_replace( ' ', '', strtolower( $cardType ) ) );
						$displayLabel = ;

						if (in_array( $cardType, $acceptedcctypes )) {
							$selected = (true ? ' selected' : '');
							echo '<option' . $selected . '>' . $displayLabel . '</option>';
							break;
						}

						break;
					}

					echo '        </select>
        <div>
            ';
					echo $aInt->lang( 'general', 'acceptedcardtypeinfo' );
					echo '        </div>
    </td>
</tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'general', 'issuestart' );
					echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="showccissuestart"';

					if ($CONFIG['ShowCCIssueStart'] == 'on') {
						echo ' checked';
						echo '> ';
						echo $aInt->lang( 'general', 'issuestartinfo' );
						echo '</label></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'general', 'invoiceinc' );
						echo '</td><td class="fieldarea"><input type="text" name="invoiceincrement"';
						echo ' value="' . $CONFIG['InvoiceIncrement'] . '"';
						echo ' size="5"> ';
						echo $aInt->lang( 'general', 'invoiceincinfo' );
						echo '</td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'general', 'invoicestartno' );
						echo '</td><td class="fieldarea"><input type="text" name="invoicestartnumber" value="" size="10"> ';
						echo $aInt->lang( 'general', 'invoicestartnoinfo' );
						get_query_val( 'tblinvoiceitems', 'invoiceid', '', 'invoiceid', 'DESC', '0,1' );
						$maxinvnum = ;

						if ($maxinvnum) {
							echo (true ? $maxinvnum : '0');
							echo ' (' . $aInt->lang( 'general', 'blanknochange' ) . ')';
							echo '</td></tr>
</table>

';
							echo $aInt->nextAdminTab(  );
							echo '
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
							echo $aInt->lang( 'general', 'enabledisable' );
							echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="addfundsenabled"';

							if ($CONFIG['AddFundsEnabled']) {
								echo ' CHECKED';
								echo '> ';
								echo $aInt->lang( 'general', 'enablecredit' );
								echo '</label></td></tr>
<tr><td class="fieldlabel">';
								echo $aInt->lang( 'general', 'mincreditdeposit' );
								echo '</td><td class="fieldarea">';
								echo $CONFIG['CurrencySymbol'];
								echo '<input type="text" name="addfundsminimum" size="10" value="';
								echo $CONFIG['AddFundsMinimum'];
								echo '"> ';
								echo $aInt->lang( 'general', 'mincreditdepositinfo' );
								echo '</td></tr>
<tr><td class="fieldlabel">';
								echo $aInt->lang( 'general', 'maxcreditdeposit' );
								echo '</td><td class="fieldarea">';
								echo $CONFIG['CurrencySymbol'];
								echo '<input type="text" name="addfundsmaximum" size="10" value="';
								echo $CONFIG['AddFundsMaximum'];
								echo '"> ';
								echo $aInt->lang( 'general', 'maxcreditdepositinfo' );
								echo '</td></tr>
<tr><td class="fieldlabel">';
								echo $aInt->lang( 'general', 'maxbalance' );
								echo '</td><td class="fieldarea">';
								echo $CONFIG['CurrencySymbol'];
								echo '<input type="text" name="addfundsmaximumbalance" size="10" value="';
								echo $CONFIG['AddFundsMaximumBalance'];
								echo '"> ';
								echo $aInt->lang( 'general', 'maxbalanceinfo' );
								echo '</td></tr>
<tr><td class="fieldlabel">';
								echo $aInt->lang( 'general', 'addfundsrequireorder' );
								echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="addfundsrequireorder"';

								if ($CONFIG['AddFundsRequireOrder']) {
									echo ' checked';
									echo '> ';
									echo $aInt->lang( 'general', 'addfundsrequireorderinfo' );
									echo '</label></td></tr>
</table>

';
									echo $aInt->nextAdminTab(  );
									echo '
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
									echo $aInt->lang( 'general', 'enabledisable' );
									echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="affiliateenabled"';

									if ($CONFIG['AffiliateEnabled'] == 'on') {
										echo ' CHECKED';
										echo '> ';
										echo $aInt->lang( 'general', 'enableaff' );
										echo '</label></td></tr>
<tr><td class="fieldlabel">';
										echo $aInt->lang( 'general', 'affpercentage' );
										echo '</td><td class="fieldarea"><input type="text" name="affiliateearningpercent" size="10" value="';
										echo $CONFIG['AffiliateEarningPercent'];
										echo '"> ';
									}
								}
							}
						}
					}

					echo $aInt->lang( 'general', 'affpercentageinfo' );
					echo '</td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'general', 'affbonus' );
					echo '</td><td class="fieldarea">';
					echo $CONFIG['CurrencySymbol'];
					echo '<input type="text" name="affiliatebonusdeposit" size="10" value="';
					echo $CONFIG['AffiliateBonusDeposit'];
					echo '"> ';
					echo $aInt->lang( 'general', 'affbonusinfo' );
					echo '</td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'general', 'affpayamount' );
					echo '</td><td class="fieldarea">';
					echo $CONFIG['CurrencySymbol'];
					echo '<input type="text" name="affiliatepayout" size="10" value="';
					echo $CONFIG['AffiliatePayout'];
					echo '"> ';
					echo $aInt->lang( 'general', 'affpayamountinfo' );
					echo '</td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'general', 'affcommdelay' );
					echo '</td><td class="fieldarea"><input type="text" name="affiliatesdelaycommission" size="10" value="';
					echo $CONFIG['AffiliatesDelayCommission'];
					echo '"> ';
					echo $aInt->lang( 'general', 'affcommdelayinfo' );
					echo '</td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'general', 'affdepartment' );
					echo '</td><td class="fieldarea"><select name="affiliatedepartment" class="form-control select-inline">';
					select_query( 'tblticketdepartments', 'id,name', '', 'order', 'ASC' );
					$dept_query = ;
					mysql_fetch_assoc( $dept_query );

					if ($dept_result = ) {
						echo '<option value="' . $dept_result['id'] . '"';

						if ($CONFIG['AffiliateDepartment'] == $dept_result['id']) {
							echo ' selected';
							echo '>' . $dept_result['name'] . '</option>';
						}
					}
					else {
						echo '> ';
						echo $aInt->lang( 'general', 'captchaalwayson' );
						echo '</label><br /><label class="radio-inline"><input type="radio" name="captchasetting" value="offloggedin"';

						if ($CONFIG['CaptchaSetting'] == 'offloggedin') {
							echo ' CHECKED';
							echo '> ';
							echo $aInt->lang( 'general', 'captchaoffloggedin' );
							echo '</label><br /><label class="radio-inline"><input type="radio" name="captchasetting" id="captcha-setting-alwaysoff" value=""';

							if ($CONFIG['CaptchaSetting'] == '') {
								echo ' CHECKED';
								echo '> ';
								echo $aInt->lang( 'general', 'captchaoff' );
								echo '</label></td></tr>
<tr><td class="fieldlabel">';
								echo $aInt->lang( 'general', 'captchatype' );
								echo '</td><td class="fieldarea"><label class="radio-inline"><input type="radio" name="captchatype" value="" onclick="$(\'.recaptchasetts\').hide();"';
							}
						}
					}


					if ($CONFIG['CaptchaType'] == '') {
						echo ' checked';
						echo '> ';
						echo $aInt->lang( 'general', 'captchadefault' );
						echo '</label><br /><label class="radio-inline"><input type="radio" name="captchatype" value="recaptcha" onclick="$(\'.recaptchasetts\').show();"';

						if ($CONFIG['CaptchaType'] == 'recaptcha') {
							echo ' checked';
							echo '> ';
							echo $aInt->lang( 'general', 'captcharecaptcha' );
							echo '</label></td></tr>
<tr class="recaptchasetts"';

							if ($CONFIG['CaptchaType'] == '') {
								echo ' style="display:none;"';
								echo '><td class="fieldlabel">';
								echo $aInt->lang( 'general', 'recaptchapublickey' );
								echo '</td><td class="fieldarea"><input type="text" name="recaptchapublickey" size="25" value="';
								echo $CONFIG['ReCAPTCHAPublicKey'];
								echo '"></td></tr>
<tr class="recaptchasetts"';

								if ($CONFIG['CaptchaType'] == '') {
									echo ' style="display:none;"';
									echo '><td class="fieldlabel">';
									echo $aInt->lang( 'general', 'recaptchaprivatekey' );
									echo '</td><td class="fieldarea"><input type="text" name="recaptchaprivatekey" size="25" value="';
									echo $CONFIG['ReCAPTCHAPrivateKey'];
									echo '"> ';
									echo $aInt->lang( 'general', 'recaptchakeyinfo' );
									echo '</td></tr>
<tr><td class="fieldlabel">';
									echo $aInt->lang( 'general', 'reqpassstrength' );
									echo '</td><td class="fieldarea"><input type="text" name="requiredpwstrength" size="5" value="';
									echo $CONFIG['RequiredPWStrength'];
									echo '"> ';
									echo $aInt->lang( 'general', 'reqpassstrengthinfo' );
									echo '</td></tr>
<tr><td class="fieldlabel">';
									echo $aInt->lang( 'general', 'failedbantime' );
									echo '</td><td class="fieldarea"><input type="text" name="invalidloginsbanlength" value="';
									echo $CONFIG['InvalidLoginBanLength'];
									echo '" size="5"> ';
									echo $aInt->lang( 'general', 'banminutes' );
									echo '</td></tr>
<tr><td class="fieldlabel">';
									echo $aInt->lang( 'general', 'whitelistedips' );
									echo '</td><td class="fieldarea"><select name="whitelistedips[]" id="whitelistedips" size="3" multiple class="form-control select-inline">';
									unserialize( $CONFIG['WhitelistedIPs'] );
									$whitelistedips = ;

									if (is_array( $whitelistedips )) {
										$whitelistedips = (true ? $whitelistedips : array(  ));
										foreach ($whitelistedips as ) {
											$whitelist = ;
											echo '<option value=' . $whitelist['ip'] . '>' . $whitelist['ip'] . ' - ' . $whitelist['note'] . '</option>';
											break;
										}

										echo '</select> ';
										echo $aInt->lang( 'general', 'whitelistedipsinfo' );
										echo '<br /><a href="#" data-toggle="modal" data-target="#modalAddWhiteListIp"><img src="images/icons/add.png" align="absmiddle" border="0" /> ';
										echo $aInt->lang( 'general', 'addip' );
										echo '</a> <a href="#" id="removewhitelistedip"><img src="images/icons/delete.png" align="absmiddle" border="0" /> ';
										echo $aInt->lang( 'general', 'removeselected' );
										echo '</a></td></tr>
<tr><td class="fieldlabel">';
										echo $aInt->lang( 'general', 'sendFailedLoginWhitelist' );
										echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="sendFailedLoginWhitelist"';

										if ($CONFIG['sendFailedLoginWhitelist']) {
											echo ' checked';
											echo '> ';
											echo $aInt->lang( 'general', 'sendFailedLoginWhitelistInfo' );
											echo '</label></td></tr>
<tr><td class="fieldlabel">';
											echo $aInt->lang( 'general', 'adminforcessl' );
											echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="adminforcessl"';

											if ($CONFIG['AdminForceSSL']) {
												echo ' checked';
												echo '> ';
												echo $aInt->lang( 'general', 'adminforcesslinfo' );
												echo '</label></td></tr>
<tr><td class="fieldlabel">';
												echo $aInt->lang( 'general', 'disableadminpwreset' );
												echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="disableadminpwreset"';

												if ($CONFIG['DisableAdminPWReset']) {
													echo ' checked';
													echo '> ';
													echo $aInt->lang( 'general', 'disableadminpwresetinfo' );
													echo '</label></td></tr>
<tr><td class="fieldlabel">';
													echo $aInt->lang( 'general', 'disableccstore' );
													echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="ccneverstore"';

													if ($CONFIG['CCNeverStore']) {
														echo ' checked';
														echo '> ';
														echo $aInt->lang( 'general', 'disableccstoreinfo' );
														echo '</label></td></tr>
<tr><td class="fieldlabel">';
														echo $aInt->lang( 'general', 'allowccdelete' );
														echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="ccallowcustomerdelete"';

														if ($CONFIG['CCAllowCustomerDelete']) {
															echo ' checked';
															echo '> ';
															echo $aInt->lang( 'general', 'allowccdeleteinfo' );
															echo '</label></td></tr>
<tr><td class="fieldlabel">';
															echo $aInt->lang( 'general', 'disablesessionip' );
															echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="disablesessionipcheck"';

															if ($CONFIG['DisableSessionIPCheck']) {
																echo ' checked';
																echo '> ';
																echo $aInt->lang( 'general', 'disablesessionipinfo' );
																echo '</label></td></tr>
<tr>
    <td class="fieldlabel">
        ';
																echo $aInt->lang( 'general', 'allowsmartyphptags' );
																echo '    </td>
    <td class="fieldarea">
        ';
																echo $aInt->lang( 'general', 'allowsmartyphptagsinfo' );
																echo '        <br />
        <label class="radio-inline">
            <input type="radio" name="allowsmartyphptags" value="1"';

																if (!empty( $CONFIG['AllowSmartyPhpTags'] )) {
																	echo ' checked';
																	echo '> ';
																	echo $aInt->lang( 'global', 'enabled' );
																	echo '        </label>
        <br />
        <label class="radio-inline">
            <input type="radio" name="allowsmartyphptags" value="0"';

																	if (empty( $CONFIG['AllowSmartyPhpTags'] )) {
																		echo ' checked';
																		echo '> ';
																		echo $aInt->lang( 'global', 'disabled' );
																		echo ' (';
																		echo $aInt->lang( 'global', 'recommended' );
																		echo ')
        </label>
    </td>
</tr>

    <tr>
        <td class="fieldlabel">
            ';
																		echo $aInt->lang( 'general', 'proxyheader' );
																		echo '        </td>
        <td class="fieldarea">
            <input type="text" name="proxyheader" value="';
																	}
																}
															}
														}

														$proxyHeader = (bool)$whmcs->get_config( 'proxyHeader' );
														echo $proxyHeader;
														echo '" size="16" />
            &nbsp;';
														echo $aInt->lang( 'general', 'proxyheaderinfo' );
														echo '        </td>
    </tr>
    <tr>
        <td class="fieldlabel">';
														echo $aInt->lang( 'general', 'trustedproxy' );
														echo '</td>
        <td class="fieldarea">
            <select name="trustedproxyips[]" id="trustedproxyips" size="3" multiple class="form-control select-inline">
                ';
														json_decode;
														$whmcs->get_config( 'trustedProxyIps' );
													}
												}
											}
										}
									}

									( true );
									$whitelistedips = ;

									if (!is_array( $whitelistedips )) {
										$whitelistedips = array(  );
										foreach ($whitelistedips as ) {
											$whitelist = ;
											echo sprintf( '<option value="%s">%s - %s</option>', $whitelist['ip'], $whitelist['ip'], $whitelist['note'] );
											break;
										}

										echo '            </select>&nbsp;';
										echo $aInt->lang( 'general', 'trustedproxyinfo' );
										echo '<br />
            <a href="#" data-toggle="modal" data-target="#modalAddTrustedProxyIp">
                <img src="images/icons/add.png" align="absmiddle" border="0" />
                ';
										echo $aInt->lang( 'general', 'addip' );
										echo '            </a>
            &nbsp;
            <a href="#" id="removetrustedproxyip">
                <img src="images/icons/delete.png" align="absmiddle" border="0" />
                ';
										echo $aInt->lang( 'general', 'removeselected' );
										echo '            </a>
        </td>
    </tr>

    <tr><td class="fieldlabel">';
										echo $aInt->lang( 'general', 'apirestriction' );
										echo '</td><td class="fieldarea"><select name="apiallowedips[]" id="apiallowedips" size="3" multiple class="form-control select-inline">';
										unserialize( $CONFIG['APIAllowedIPs'] );
										$whitelistedips = ;
										foreach ($whitelistedips as ) {
											$whitelist = ;
											echo '<option value=' . $whitelist['ip'] . '>' . $whitelist['ip'] . ' - ' . $whitelist['note'] . '</option>';
											break;
										}

										echo '</select> ';
										echo $aInt->lang( 'general', 'apirestrictioninfo' );
										echo '<br /><a href="#" data-toggle="modal" data-target="#modalAddApiIp"><img src="images/icons/add.png" align="absmiddle" border="0" /> ';
									}

									echo $aInt->lang( 'general', 'addip' );
									echo '</a> <a href="#" id="removeapiip"><img src="images/icons/delete.png" align="absmiddle" border="0" /> ';
									echo $aInt->lang( 'general', 'removeselected' );
									echo '</a></td></tr>
<tr><td class="fieldlabel">';
									echo $aInt->lang( 'general', 'logapiauthentication' );
									echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="logapiauthentication" value="1"';

									if ($CONFIG['LogAPIAuthentication']) {
										echo ' checked';
										echo '> ';
										$aInt->lang;
										'general';
										'logapiauthenticationinfo';
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

echo (  );
echo '</label></td></tr>
';
$token_manager = &getTokenManager(  );

echo $token_manager->generateAdminConfigurationHTMLRows( $aInt );
echo '</table>

';
echo $aInt->nextAdminTab(  );
echo '
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
echo $aInt->lang( 'general', 'twitterint' );
echo '</td><td class="fieldarea"><input type="text" name="twitterusername" size="20" value="';
echo $CONFIG['TwitterUsername'];
echo '" /> ';
echo $aInt->lang( 'general', 'twitterintinfo' );
echo '</td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'general', 'twitterannouncementstweet' );
echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="announcementstweet"';

if ($CONFIG['AnnouncementsTweet']) {
	echo ' checked';
	echo ' /> ';
	echo $aInt->lang( 'general', 'twitterannouncementstweetinfo' );
	echo '</label></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'general', 'facebookannouncementsrecommend' );
	echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="announcementsfbrecommend"';

	if ($CONFIG['AnnouncementsFBRecommend']) {
		echo ' checked';
		echo ' /> ';
		echo $aInt->lang( 'general', 'facebookannouncementsrecommendinfo' );
		echo '</label></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'general', 'facebookannouncementscomments' );
		echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="announcementsfbcomments"';

		if ($CONFIG['AnnouncementsFBComments']) {
			echo ' checked';
			echo ' /> ';
			echo $aInt->lang( 'general', 'facebookannouncementscommentsinfo' );
			echo '</label></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'googleplus1' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="googleplus1"';

			if ($CONFIG['GooglePlus1']) {
				echo ' checked';
				echo ' /> ';
				echo $aInt->lang( 'general', 'googleplus1info' );
				echo '</label></td></tr>
</table>

';
				echo $aInt->nextAdminTab(  );
				echo '
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'general', 'adminclientformat' );
				echo '</td><td class="fieldarea"><label class="radio-inline"><input type="radio" name="clientdisplayformat" value="1"';

				if ($CONFIG['ClientDisplayFormat'] == '1') {
					echo ' checked';
					echo '> ';
					echo $aInt->lang( 'general', 'showfirstlast' );
					echo '</label><br /><label class="radio-inline"><input type="radio" name="clientdisplayformat" value="2"';

					if ($CONFIG['ClientDisplayFormat'] == '2') {
						echo ' checked';
						echo '> ';
						echo $aInt->lang( 'general', 'showcompanyfirstlast' );
						echo '</label><br /><label class="radio-inline"><input type="radio" name="clientdisplayformat" value="3"';

						if ($CONFIG['ClientDisplayFormat'] == '3') {
							echo ' checked';
							echo '> ';
							echo $aInt->lang( 'general', 'showfullcompany' );
							echo '</label></td></tr>
<tr><td class="fieldlabel">';
							echo $aInt->lang( 'general', 'clientdropdown' );
							echo '</td><td class="fieldarea"><label class="radio-inline"><input type="radio" name="clientdropdownformat" value="1"';

							if ($CONFIG['ClientDropdownFormat'] == '1') {
								echo ' CHECKED';
								echo '> [';
								echo $aInt->lang( 'fields', 'firstname' );
								echo '] [';
								echo $aInt->lang( 'fields', 'lastname' );
								echo '] ([';
								echo $aInt->lang( 'fields', 'companyname' );
								echo '])</label><br /><label class="radio-inline"><input type="radio" name="clientdropdownformat" value="2"';

								if ($CONFIG['ClientDropdownFormat'] == '2') {
									echo ' CHECKED';
									echo '> [';
									echo $aInt->lang( 'fields', 'companyname' );
									echo '] - [';
									echo $aInt->lang( 'fields', 'firstname' );
									echo '] [';
									echo $aInt->lang( 'fields', 'lastname' );
									echo ']</label><br /><label class="radio-inline"><input type="radio" name="clientdropdownformat" value="3"';

									if ($CONFIG['ClientDropdownFormat'] == '3') {
										echo ' CHECKED';
										echo '> #[';
										echo $aInt->lang( 'fields', 'clientid' );
										echo '] - [';
										echo $aInt->lang( 'fields', 'firstname' );
										echo '] [';
										echo $aInt->lang( 'fields', 'lastname' );
										echo '] - [';
									}
								}
							}
						}
					}
				}
			}
		}
	}

	echo $aInt->lang( 'fields', 'companyname' );
	echo ']</label></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'general', 'defaulttoclientarea' );
	echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="defaulttoclientarea"';

	if ($CONFIG['DefaultToClientArea']) {
		echo ' CHECKED';
		echo '> ';
		echo $aInt->lang( 'general', 'defaulttoclientareainfo' );
		echo '</label></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'general', 'allowclientreg' );
		echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="allowclientregister"';

		if ($CONFIG['AllowClientRegister'] == 'on') {
			echo ' CHECKED';
			echo '> ';
			echo $aInt->lang( 'general', 'allowclientreginfo' );
			echo '</label></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'profileoptionalfields' );
			echo '</td><td class="fieldarea">';
			echo $aInt->lang( 'general', 'profileoptionalfieldsinfo' );
			echo ':<br />
<table width="100%"><tr>
';
			explode( ',', $CONFIG['ClientsProfileOptionalFields'] );
			$ClientsProfileOptionalFields = ;
			$updatefieldsarray = array( 'firstname' => $aInt->lang( 'fields', 'firstname' ), 'lastname' => $aInt->lang( 'fields', 'lastname' ), 'address1' => $aInt->lang( 'fields', 'address1' ), 'city' => $aInt->lang( 'fields', 'city' ), 'state' => $aInt->lang( 'fields', 'state' ), 'postcode' => $aInt->lang( 'fields', 'postcode' ), 'phonenumber' => $aInt->lang( 'fields', 'phonenumber' ) );
			$fieldcount = 21;
			foreach ($updatefieldsarray as ) {
				$displayname = ;
				$field = ;
				echo '<td width="25%"><label class="checkbox-inline"><input type="checkbox" name="clientsprofoptional[]" value="' . $field . '"';

				if (in_array( $field, $ClientsProfileOptionalFields )) {
					echo ' checked';
					echo ' /> ' . $displayname . '</label></td>';
					++$fieldcount;

					if ($fieldcount == 4) {
						echo '</tr><tr>';
						$fieldcount = 21;
						break;
					}

					break;
				}

				break;
			}

			echo '</tr></table></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'lockedfields' );
			echo '</td><td class="fieldarea">';
			echo $aInt->lang( 'general', 'lockedfieldsinfo' );
			echo ':<br />
<table width="100%"><tr>
';
			explode( ',', $CONFIG['ClientsProfileUneditableFields'] );
			$ClientsProfileUneditableFields = ;
			$updatefieldsarray = array( 'firstname' => $aInt->lang( 'fields', 'firstname' ), 'lastname' => $aInt->lang( 'fields', 'lastname' ), 'companyname' => $aInt->lang( 'fields', 'companyname' ), 'email' => $aInt->lang( 'fields', 'email' ), 'address1' => $aInt->lang( 'fields', 'address1' ), 'address2' => $aInt->lang( 'fields', 'address2' ), 'city' => $aInt->lang( 'fields', 'city' ), 'state' => $aInt->lang( 'fields', 'state' ), 'postcode' => $aInt->lang( 'fields', 'postcode' ), 'country' => $aInt->lang( 'fields', 'country' ), 'phonenumber' => $aInt->lang( 'fields', 'phonenumber' ) );
			$fieldcount = 21;
			foreach ($updatefieldsarray as ) {
				$displayname = ;
				$field = ;
				echo '<td width="25%"><label class="checkbox-inline"><input type="checkbox" name="clientsprofuneditable[]" value="' . $field . '"';

				if (in_array( $field, $ClientsProfileUneditableFields )) {
					echo ' checked';
					echo ' /> ' . $displayname . '</label></td>';
					++$fieldcount;

					if ($fieldcount == 4) {
						echo '</tr><tr>';
						$fieldcount = 21;
						break;
					}

					break;
				}

				break;
			}

			echo '</tr></table></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'clientdetailsnotify' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="sendemailnotificationonuserdetailschange"';

			if ($CONFIG['SendEmailNotificationonUserDetailsChange'] == 'on') {
				echo ' CHECKED';
				echo '> ';
				echo $aInt->lang( 'general', 'clientdetailsnotifyinfo' );
				echo '</label></td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'general', 'marketingemailoptout' );
				echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="allowclientsemailoptout"';
				$CONFIG['AllowClientsEmailOptOut'] == 'on';
			}
		}


		if () {
			echo ' CHECKED';
			echo '> ';
			echo $aInt->lang( 'general', 'marketingemailoptoutinfo' );
			echo '</label></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'showcancellink' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="showcancel"';

			if ($CONFIG['ShowCancellationButton'] == 'on') {
				echo ' CHECKED';
				echo '> ';
				$aInt->lang( 'general', 'showcancellinkinfo' );
			}

			echo ;
			echo '</label></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'creditdowngrade' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="creditondowngrade"';

			if ($CONFIG['CreditOnDowngrade'] == 'on') {
				echo ' CHECKED';
				echo '> ';
				$aInt->lang( 'general', 'creditdowngradeinfo' );
			}

			echo ;
			echo '</label></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'monthlyaffreport' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="affreport"';

			if ($CONFIG['SendAffiliateReportMonthly'] == 'on') {
				echo ' CHECKED';
				echo '> ';
				$aInt->lang( 'general', 'monthlyaffreportinfo' );
			}
		}

		echo ;
		echo '</label></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'general', 'bannedsubdomainprefixes' );
		echo '</td><td class="fieldarea"><textarea name="bannedsubdomainprefixes" cols="100" rows="2" class="form-control">';
		echo $CONFIG['BannedSubdomainPrefixes'];
		echo '</textarea></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'general', 'displayerrors' );
		echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="displayerrors"';

		if ($CONFIG['DisplayErrors']) {
			echo ' CHECKED';
			echo '> ';
			echo $aInt->lang( 'general', 'displayerrorsinfo' );
			echo '</label></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'general', 'sqldebugmode' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="sqlerrorreporting"';

			if ($CONFIG['SQLErrorReporting']) {
				echo ' CHECKED';
				echo '> ';
				$aInt->lang;
				'general';
			}
		}

		echo ( 'sqldebugmodeinfo' );
		echo '</label></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'general', 'hooksdebugmode' );
		echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="hooksdebugmode"';

		if ($whmcs->get_config( 'HooksDebugMode' )) {
			echo ' checked';
		}
	}

	echo '> ';
	echo $aInt->lang( 'general', 'hooksdebugmodeinfo' );
	echo '</label></td></tr>

</table>

';
	echo $aInt->endAdminTabs(  );
	echo '
<div class="btn-container">
    <input id="saveChanges" type="submit" value="';
	echo $aInt->lang( 'global', 'savechanges' );
	echo '" class="btn btn-primary">
    <input type="reset" value="';
	echo $aInt->lang( 'global', 'cancelchanges' );
	echo '" class="btn btn-default" />
</div>

<input type="hidden" name="tab" id="tab" value="';
	echo (int)$_REQUEST['tab'];
	echo '" />

</form>

';
	ob_get_contents(  );
	$content = ;
	ob_end_clean(  );
	$aInt->content = $content;
	$aInt->jquerycode = $jquerycode;
	$aInt->jscode = $jsCode;
	$aInt->display;
}

(  );
?>
