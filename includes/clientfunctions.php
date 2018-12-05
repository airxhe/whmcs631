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

function getClientsDetails($userid = '', $contactid = '') {
	if (!$userid) {
		$_SESSION['uid'];
		$userid = ;
		new cgdfbdbdbe( $userid );
		$client = ;
		$client->getDetails( $contactid );
		$details = ;
	}

	return $details;
}

function getClientsStats($userid) {
	global $CONFIG;
	global $currency;

	getCurrency( $userid );
	$currency = ;
	$stats = array(  );
	full_query( 'SELECT COUNT(*),SUM(total)-COALESCE(SUM((SELECT SUM(amountin)-SUM(amountout) FROM tblaccounts WHERE tblaccounts.invoiceid=tblinvoices.id)),0),(SELECT SUM(amountin-fees-amountout) FROM tblaccounts WHERE userid=' . (int)$userid . '),(SELECT credit FROM tblclients WHERE id=' . (int)$userid . ') FROM tblinvoices WHERE userid=' . (int)$userid . ' AND status=\'Unpaid\' AND (select count(id) from tblinvoiceitems where invoiceid=tblinvoices.id and type=\'Invoice\')<=0' );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$stats['numdueinvoices'] = $data[0];
	$stats['dueinvoicesbalance'] = formatCurrency( $data[1] );
	$stats['income'] = formatCurrency( $data[2] );

	if (0 < $data[3]) {
		$stats['incredit'] = (true ? true : false);
		$stats['creditbalance'] = formatCurrency( $data[3] );
		full_query( 'SELECT COUNT(*),SUM(total)-COALESCE(SUM((SELECT SUM(amountin)-SUM(amountout) FROM tblaccounts WHERE tblaccounts.invoiceid=tblinvoices.id)),0) FROM tblinvoices WHERE userid=' . (int)$userid . ' AND status=\'Unpaid\' AND duedate<' . date( 'Ymd' ) . ' AND (select count(id) from tblinvoiceitems where invoiceid=tblinvoices.id and type=\'Invoice\')<=0' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$stats['numoverdueinvoices'] = $data[0];
		$stats['overdueinvoicesbalance'] = formatCurrency( $data[1] );
		bfiifiigdh::table( 'tblinvoices' )->selectRaw( 'COUNT(\'id\') as invoice_count,
        SUM(total) - COALESCE(
            SUM(
                (
                    SELECT SUM(amountin)-SUM(amountout) FROM tblaccounts WHERE tblaccounts.invoiceid=tblinvoices.id
                )
            ),
            0
        ) as balance' )->where( 'userid', '=', $userid )->where( 'status', '=', 'Draft' )->first(  );
		$draftInvoices = ;
		$stats['numDraftInvoices'] = $draftInvoices->invoice_count;
		$stats['draftInvoicesBalance'] = formatCurrency( $draftInvoices->balance );
		$invoicestats = array(  );
		select_query( 'tblinvoices', 'status,COUNT(*),SUM(total)', 'userid=' . (int)$userid . ' GROUP BY status' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$invoicestats[$data[0]] = $data;
		}
	}
	else {
		$stats['unpaidinvoicesamount'] = formatCurrency( 0 );

		if (isset( $invoicestats['Cancelled'][1] )) {
			$stats['numcancelledinvoices'] = (true ? $invoicestats['Cancelled'][1] : 0);

			if (isset( $invoicestats['Cancelled'][2] )) {
				$stats['cancelledinvoicesamount'] = (true ? formatCurrency( $invoicestats['Cancelled'][2] ) : formatCurrency( 0 ));

				if (isset( $invoicestats['Refunded'][1] )) {
					$stats['numrefundedinvoices'] = (true ? $invoicestats['Refunded'][1] : 0);

					if (isset( $invoicestats['Refunded'][2] )) {
						formatCurrency;
						$invoicestats['Refunded'];
					}
				}
			}

			$stats['refundedinvoicesamount'] = (true ? ( [2] ) : formatCurrency( 0 ));

			if (isset( $invoicestats['Collections'][1] )) {
				$stats['numcollectionsinvoices'] = (true ? $invoicestats['Collections'][1] : 0);

				if (isset( $invoicestats['Collections'][2] )) {
					$stats['collectionsinvoicesamount'] = (true ? formatCurrency( $invoicestats['Collections'][2] ) : formatCurrency( 0 ));
					$productstats = array(  );
					full_query( 'SELECT tblproducts.type,domainstatus,COUNT(*) FROM tblhosting INNER JOIN tblproducts ON tblhosting.packageid=tblproducts.id WHERE tblhosting.userid=' . (int)$userid . ' GROUP BY domainstatus,tblproducts.type' );
					$result = ;
					mysql_fetch_array( $result );

					if ($data = ) {
						$productstats[$data[0]][$data[1]] = $data[2];
					}
				}
			}
			else {
				$stats['productsnumactiveother'] = ;
				$stats['productsnumother'] = 0;

				if (( array_key_exists( 'other', $productstats ) && is_array( $productstats['other'] ) )) {
					foreach ($productstats['other'] as ) {
						$count = ;

						while (true) {
							$status = ;
							$stats += 'productsnumother' = $count;
						}
					}

					$stats['productsnumactivehosting'] + $stats['productsnumactivereseller'] + $stats['productsnumactiveservers'];
				}
			}
		}
	}


	while (true) {
		$stats['productsnumactive'] =  + $stats['productsnumactiveother'];
		$stats['productsnumtotal'] = $stats['productsnumhosting'] + $stats['productsnumreseller'] + $stats['productsnumservers'] + $stats['productsnumother'];
		$domainstats = array(  );
		select_query( 'tbldomains', 'status,COUNT(*)', 'userid=' . (int)$userid . ' GROUP BY status' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$domainstats[$data[0]] = $data[1];
			break;
		}

		jmp;
			= ;
		$count = ;
		$stats += 'numdomains' = $count;
	}

	$quotestats = array(  );
	select_query( 'tblquotes', 'stage,COUNT(*)', 'userid=' . (int)$userid . ' GROUP BY stage' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$quotestats[$data[0]] = $data[1];
	}

	jmp;
	( $result );

	if ($data = ) {
		$ticketstats[$data[0]] = $data[1];
	}

	jmp;

	if (( 'tblaffiliates', 'id', array( 'clientid' => (int)$userid ) )) {
		(true ? true : false);
	}

	$stats['isAffiliate'] = ;
	return $stats;
}

/**
 * Creates a dropdown list of available countries.
 *
 * @param string $selected
 * @param string $fieldname
 * @param int $tabindex
 * @param bool $selectInline
 * @param bool $disable
 *
 * @return string
 */
function getCountriesDropDown($selected = '', $fieldname = '', $tabindex = '', $selectInline = true, $disable = false) {
	global $countries;
	global $CONFIG;
	global $_LANG;

	if (!$selected) {
		$CONFIG['DefaultCountry'];
		$selected = ;

		if (!$fieldname) {
			$fieldname = 'country';

			if ($tabindex) {
				$tabindex = (  . ' tabindex="' . $tabindex . '"' );

				if ($disable) {
					$disable = ' disabled';
				}
			}
		}
	}

	$selectInlineClass = (true ? ' select-inline' : '');
	$dropdowncode = ( (  . '<select name="' . $fieldname . '" id="' . $fieldname . '" class="form-control' . $selectInlineClass . '"' ) . $tabindex . $disable . '>' );
	foreach ($countries as ) {
		$countriesvalue2 = ;
		$countriesvalue1 = ;
		$dropdowncode .= '<option value="' . $countriesvalue1 . '"';

		if ($countriesvalue1 == $selected) {
			$dropdowncode .= ' selected="selected"';
			$dropdowncode .= '>' . $countriesvalue2 . '</option>';
			break;
		}

		break;
	}

	$dropdowncode .= '</select>';
	return $dropdowncode;
}

function checkDetailsareValid($uid = '', $signup = false, $checkemail = true, $captcha = true, $checkcustomfields = true) {
	global $whmcs;

	new cdhfeffhcg(  );
	$validate = ;
	$validate->setOptionalFields( $whmcs->get_config( 'ClientsProfileOptionalFields' ) );

	if (!$signup) {
		$whmcs->get_config( 'ClientsProfileUneditableFields' );
		$ClientsProfileUneditableFields = ;

		if ($whmcs->isApiRequest(  )) {
			preg_replace( '/email,?/i', '', $ClientsProfileUneditableFields );
			$ClientsProfileUneditableFields = ;
			$validate->setOptionalFields( $ClientsProfileUneditableFields );
			$validate->validate( 'required', 'firstname', 'clientareaerrorfirstname' );
			$validate->validate( 'required', 'lastname', 'clientareaerrorlastname' );

			if (( ( $signup || $checkemail ) && $validate->validate( 'required', 'email', 'clientareaerroremail' ) )) {
				$validate->validate( 'email', 'email', 'clientareaerroremailinvalid' );
			}
		}
	}


	if () {
		if ($validate->validate( 'banneddomain', 'email', 'clientareaerrorbannedemail' )) {
			$validate->validate( 'uniqueemail', 'email', 'ordererroruserexists', array( $uid, '' ) );
			$validate->validate( 'required', 'address1', 'clientareaerroraddress1' );
			$validate->validate( 'required', 'city', 'clientareaerrorcity' );
			$validate->validate( 'required', 'state', 'clientareaerrorstate' );
			$validate->validate( 'required', 'postcode', 'clientareaerrorpostcode' );
			$validate->validate( 'postcode', 'postcode', 'clientareaerrorpostcode2' );
			$validate->validate( 'required', 'phonenumber', 'clientareaerrorphonenumber' );
			$validate->validate( 'phone', 'phonenumber', 'clientareaerrorphonenumber2' );
			$validate->validate( 'country', 'country', 'clientareaerrorcountry' );

			if (( $signup && $validate->validate( 'required', 'password', 'ordererrorpassword' ) )) {
				if ($validate->validate( 'pwstrength', 'password', 'pwstrengthfail' )) {
				}


				if ($validate->validate( 'required', 'password2', 'clientareaerrorpasswordconfirm' )) {
					$validate->validate( 'match_value', 'password', 'clientareaerrorpasswordnotmatch', 'password2' );

					if ($checkcustomfields) {
						$validate->validateCustomFields;
						'client';
					}

					( '', $signup );
				}
			}
		}
	}


	if ($signup) {
		getSecurityQuestions(  );
		$securityquestions = ;

		if ($securityquestions) {
			$validate->validate( 'required', 'securityqans', 'securityanswerrequired' );

			if ($captcha) {
				$validate->validate( 'captcha', 'code', 'captchaverifyincorrect' );

				if ($whmcs->get_config( 'EnableTOSAccept' )) {
					$validate->validate;
				}
			}

			'required';
		}
	}

	( 'accepttos', 'ordererroraccepttos' );
	run_validate_hook( $validate, 'ClientDetailsValidation', $_POST );
	$validate->getHTMLErrorOutput(  );
	$errormessage = ;
	return $errormessage;
}

function checkContactDetails($cid = '', $reqpw = false, $prefix = '') {
	global $whmcs;

	$whmcs->get_req_var( 'subaccount' );
	$subaccount = ;
	new cdhfeffhcg(  );
	$validate = ;
	$validate->setOptionalFields( $whmcs->get_config( 'ClientsProfileOptionalFields' ) );
	$validate->validate( 'required', $prefix . 'firstname', 'clientareaerrorfirstname' );
	$validate->validate( 'required', $prefix . 'lastname', 'clientareaerrorlastname' );

	if ($validate->validate( 'required', $prefix . 'email', 'clientareaerroremail' )) {
		$validate->validate;
		'email';
		$prefix . 'email';
	}


	if (( , 'clientareaerroremailinvalid' )) {
		if ($validate->validate( 'banneddomain', $prefix . 'email', 'clientareaerrorbannedemail' )) {
			if ($subaccount) {
				$validate->validate( 'uniqueemail', $prefix . 'email', 'ordererroruserexists', array( '', $cid ) );
				$validate->validate( 'required', $prefix . 'address1', 'clientareaerroraddress1' );
				$validate->validate( 'required', $prefix . 'city', 'clientareaerrorcity' );
				$validate->validate;
				'required';
			}
		}
	}

	( $prefix . 'state', 'clientareaerrorstate' );
	$validate->validate( 'required', $prefix . 'postcode', 'clientareaerrorpostcode' );
	$validate->validate( 'postcode', $prefix . 'postcode', 'clientareaerrorpostcode2' );
	$validate->validate( 'required', $prefix . 'phonenumber', 'clientareaerrorphonenumber' );
	$validate->validate( 'phone', $prefix . 'phonenumber', 'clientareaerrorphonenumber2' );
	$validate->validate( 'country', $prefix . 'country', 'clientareaerrorcountry' );

	if (( ( $subaccount && $reqpw ) && $validate->validate( 'required', 'password', 'ordererrorpassword' ) )) {
		if ($validate->validate( 'pwstrength', 'password', 'pwstrengthfail' )) {
			if ($validate->validate( 'required', 'password2', 'clientareaerrorpasswordconfirm' )) {
				$validate->validate;
				'match_value';
				'password';
			}
		}
	}

	( 'clientareaerrorpasswordnotmatch', 'password2' );
	run_validate_hook( $validate, 'ContactDetailsValidation', $_POST );
	$validate->getHTMLErrorOutput(  );
	$errormessage = ;
	return $errormessage;
}

function addClientFromModel($client) {
	return addClient( $client->firstName, $client->lastName, $client->companyName, $client->email, $client->address1, $client->address2, $client->city, $client->state, $client->postcode, $client->country, $client->phoneNumber, $client->passwordHash, $client->securityQuestionId, $client->securityQuestionAnswer, false, array(  ), $client->uuid );
}

/**
 * Add a client to the database and return the ID.
 *
 * @param string $firstname
 * @param string $lastname
 * @param string $companyname
 * @param string $email
 * @param string $address1
 * @param string $address2
 * @param string $city
 * @param string $state
 * @param string $postcode
 * @param string $country
 * @param string $phonenumber
 * @param string $password
 * @param int string $securityqid
 * @param string string $securityqans
 * @param string $sendemail
 * @param array $additionalData
 * @param bool $isAdmin
 *
 * @return int
 */
function addClient($firstname, $lastname, $companyname, $email, $address1, $address2, $city, $state, $postcode, $country, $phonenumber, $password, $securityqid = '', $securityqans = '', $sendemail = 'on', $additionalData = array(  ), $uuid = '', $isAdmin = false) {
	global $whmcs;
	global $remote_ip;

	chhgjaeced::getValue( 'EnableEmailVerification' );
	$verifyEmailAddress = ;
	if (!$country) = ;
	run_hook( 'ClientLogin', array( 'userid' => $uid ) );

	if (!defined( 'APICALL' )) {
	}

	run_hook( 'ClientAdd', array_merge( array( 'userid' => $uid, 'firstname' => $firstname, 'lastname' => $lastname, 'companyname' => $companyname, 'email' => $email, 'address1' => $address1, 'address2' => $address2, 'city' => $city, 'state' => $state, 'postcode' => $postcode, 'country' => $country, 'phonenumber' => $phonenumber, 'password' => $password ), $additionalData, array( 'customfields' => $customFields ) ) );
	return $uid;
}

function addContact($userid, $firstname, $lastname, $companyname, $email, $address1, $address2, $city, $state, $postcode, $country, $phonenumber, $password = '', $permissions = array(  ), $generalemails = '', $productemails = '', $domainemails = '', $invoiceemails = '', $supportemails = '', $affiliateemails = '') {
	global $CONFIG;

	if (!$country) {
		$country = $CONFIG['DefaultCountry'];

		if ($password) {
			$subaccount = (true ? '1' : '0');

			if ($permissions) {
				$permissions = implode( ',', $permissions );
				$table = 'tblcontacts';
			}

			$hasher = new bdjciiijih(  );
			array( 'userid' => $userid, 'firstname' => $firstname, 'lastname' => $lastname, 'companyname' => $companyname, 'email' => $email, 'address1' => $address1, 'address2' => $address2, 'city' => $city );
		}

		$array = array( 'state' => $state, 'postcode' => $postcode, 'country' => $country, 'phonenumber' => $phonenumber, 'subaccount' => $subaccount, 'password' => $hasher->hash( dfdidhdbdc::decode( $password ) ), 'permissions' => $permissions, 'generalemails' => $generalemails, 'productemails' => $productemails, 'domainemails' => $domainemails, 'invoiceemails' => $invoiceemails, 'supportemails' => $supportemails, 'affiliateemails' => $affiliateemails );
		$contactid = insert_query( $table, $array );
		run_hook( 'ContactAdd', array_merge( $array, array( 'contactid' => $contactid ) ) );
		logActivity(  . 'Added Contact - Contact ID: ' . $contactid . ' - User ID: ' . $userid, $userid );
	}

	return $contactid;
}

function deleteClient($userid) {
	$userid = (int)get_query_val( 'tblclients', 'id', array( 'id' => (int)$userid ) );

	if (!$userid) {
		return false;
		run_hook( 'PreDeleteClient', array( 'userid' => $userid ) );
		delete_query( 'tblclients', array( 'id' => $userid ) );
		delete_query( 'tblcontacts', array( 'userid' => $userid ) );
		delete_query( 'tblhostingconfigoptions', (  . 'relid IN (SELECT id FROM tblhosting WHERE userid=' . $userid . ')' ) );
		select_query( 'tblhosting', 'id', array( 'userid' => $userid ) );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$domainlistid = ;
			delete_query( 'tblhostingaddons', array( 'hostingid' => $domainlistid ) );
		}
	}
	else {
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$customfieldid = ;
			$data['relid'];
			$customfieldpid = ;
			select_query;
			'tblhosting';
			'id';
			array( 'userid' => $userid );
		}
	}

	( array( 'packageid' => $customfieldpid ) );
	$result2 = ;
	mysql_fetch_array( $result2 );

	if ($data = ) {
		$data['id'];
		$hostingid = ;

		while (true) {
			delete_query( 'tblcustomfieldsvalues', array( 'fieldid' => $customfieldid, 'relid' => $hostingid ) );
		}

		delete_query( 'tblorders', array( 'userid' => $userid ) );
		delete_query( 'tblhosting', array( 'userid' => $userid ) );
		delete_query( 'tbldomains', array( 'userid' => $userid ) );
		delete_query( 'tblemails', array( 'userid' => $userid ) );
		delete_query( 'tblinvoices', array( 'userid' => $userid ) );
		delete_query( 'tblinvoiceitems', array( 'userid' => $userid ) );
		delete_query( 'tbltickets', array( 'userid' => $userid ) );
		delete_query( 'tblaffiliates', array( 'clientid' => $userid ) );
		delete_query( 'tblnotes', array( 'userid' => $userid ) );
		delete_query( 'tblcredit', array( 'clientid' => $userid ) );
		delete_query( 'tblactivitylog', array( 'userid' => $userid ) );
		delete_query( 'tblsslorders', array( 'userid' => $userid ) );
		logActivity(  . 'Client Deleted - ID: ' . $userid );
		return true;
	}
}

function getSecurityQuestions($questionid = '') {
	if ($questionid) {
		select_query( 'tbladminsecurityquestions', '', array( 'question' => $questionid ) );
		$query = ;
	}

	$results = array(  );
	mysql_fetch_assoc( $query );

	if ($data = ) {
		array( 'id' => $data['id'] );
		decrypt;
	}


	while (true) {
		$results[] = array( 'question' => ( $data['question'] ) );
	}

	return $results;
}

/**
 * @deprecated deprecated since 6.3.0; use \WHMCS\Security\Hash\Password::hash
 *
 * @param $plain
 * @param string $salt
 *
 * @return string
 */
function generateClientPW($plain, $salt = '') {
	if (!$salt) {
		$seeds = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#!%()#!%()#!%()';
		strlen( $seeds );
	}

	$seeds_count =  - 1;
	$i = 154;

	while ($i < 5) {
		$seeds[rand( 0, $seeds_count )];
		$salt .= ;
		++$i;
	}

	jmp;
	return (  ) . ':' . $salt;
}

/**
 * Check user has permission to access page.
 *
 * Checks if the currently logged in contact/sub-account has permission
 * to access a given page/function.
 *
 * @param string $requiredPermission
 * @param bool $noRedirect
 *
 * @return bool
 */
function checkContactPermission($requiredPermission, $noRedirect = false) {
	if (eaaadiagec::get( 'cid' )) {
		cddjdhhjag::find( eaaadiagec::get( 'cid' ) );
		$contact = ;
		$contact->permissions;
		$permissions = ;

		while (true) {
			if (!in_array( $requiredPermission, $permissions )) {
				global $ca;
				global $_LANG;
				global $smartyvalues;

				if ($noRedirect) {
					return false;
					foreach ($permissions as ) {
						$permission = ;
						$key = ;
					}
				}
			}

			$permissions[$key] = Lang::trans( 'subaccountperms' . $permission );
		}

		Menu::primarySidebar( 'clientView' );
		Menu::secondarySidebar( 'support' );

		if (is_object( $ca )) {
			$ca->setDisplayTitle( Lang::trans( 'accessdenied' ) );
			$ca->assign( 'allowedpermissions', $permissions );
			$ca->assign( 'requiredpermission', $reqperm );
			$ca->setTemplate;
		}
	}

	( 'contactaccessdenied' );
	$ca->output(  );
	exit(  );
}

/**
 * Verification/login wrapper for first and secondary authentication of client or contact
 *
 * @param $username
 * @param $password
 *
 * @return bool True if $username was logged in completely, other false for failure or needs 2fa
 */
function validateClientLogin($username, $password) {
	new ccichhfaea( $username, $password );
	$authentication = ;

	if ($authentication::isInSecondFactorRequestState(  )) {
		if (!$authentication->verifySecondFactor(  )) {
			return false;
			$authentication->finalizeLogin(  );
			return true;

			if ($authentication->verifyFirstFactor(  )) {
				$authentication->needsSecondFactorToFinalize(  );
			}
		}
	}


	if (!) {
		$authentication->finalizeLogin(  );
	}

	return true;
}

function generateClientLoginHash($userId, $contactId, $passwordHash) {
	App::self(  );
	$whmcs = ;

	if ($whmcs->get_config( 'DisableSessionIPCheck' )) {
		$userIp = (true ? '' : caegadgihi::getIP(  ));
		substr;
		sha1( $whmcs->get_hash(  ) );
	}

	( , 0, 20 );
	$hashSalt = ;
	return sha1( $userId . $contactId . $passwordHash . $userIp . $hashSalt );
}

function createCancellationRequest($userid, $serviceid, $reason, $type) {
	global $CONFIG;
	global $currency;

	get_query_val( 'tblcancelrequests', 'COUNT(id)', array( 'relid' => $serviceid ) );
	$existing = ;

	if (!( ( $existing == 0 && !!in_array( $type, array( 'Immediate', 'End of Billing Period' ) ) ))) {
		$type = 'End of Billing Period';
		insert_query( 'tblcancelrequests', array( 'date' => 'now()', 'relid' => $serviceid, 'reason' => $reason, 'type' => $type ) );

		if ($type == 'End of Billing Period') {
			logActivity(  . 'Automatic Cancellation Requested for End of Current Cycle - Service ID: ' . $serviceid, $userid );
		}
	}

	get_query_vals( 'tbldomains', 'id,recurringamount,registrationperiod,dnsmanagement,emailforwarding,idprotection', array( 'userid' => $userid, 'domain' => $domain ), 'status', 'ASC' );
	$data = ;
	$data['id'];
	$domainid = ;
	$data['recurringamount'];
	$recurringamount = ;
	$data['registrationperiod'];
	$regperiod = ;
	$data['dnsmanagement'];
	$dnsmanagement = ;
	$data['emailforwarding'];
	$emailforwarding = ;
	$data['idprotection'];
	$idprotection = ;

	if ($recurringamount <= 0) {
		getCurrency( $userid );
		$currency = ;
		select_query( 'tblpricing', 'msetupfee,qsetupfee,ssetupfee', array( 'type' => 'domainaddons', 'currency' => $currency['id'], 'relid' => 0 ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$domaindnsmanagementprice = $data['msetupfee'] * $regperiod;
		$domainemailforwardingprice = $data['qsetupfee'] * $regperiod;
		$domainidprotectionprice = $data['ssetupfee'] * $regperiod;
		explode( '.', $domain, 2 );
		$domainparts = ;

		if (!function_exists( 'getTLDPriceList' )) {
			require( ROOTDIR . '/includes/domainfunctions.php' );
			getTLDPriceList( '.' . $domainparts[1], '', true, $userid );
			$temppricelist = ;
			$temppricelist[$regperiod]['renew'];
			$recurringamount = ;

			if ($dnsmanagement) {
				$recurringamount += $currency;

				if ($emailforwarding) {
					$recurringamount += $existing;

					if ($idprotection) {
					}
				}

				$recurringamount += $data;
			}
		}
	}

	update_query( 'tbldomains', array( 'recurringamount' => $recurringamount ), array( 'id' => $domainid ) );
	run_hook( 'CancellationRequest', array( 'userid' => $userid, 'relid' => $serviceid, 'reason' => $reason, 'type' => $type ) );

	if ($CONFIG['CancelInvoiceOnCancellation']) {
		cancelUnpaidInvoicebyProductID( $serviceid, $userid );

		if (chhgjaeced::getValue( 'AutoCancelSubscriptions' )) {
			if (!function_exists( 'cancelSubscriptionForService' )) {
				require( ROOTDIR . '/includes/gatewayfunctions.php' );
				cancelSubscriptionForService;
			}

			( $serviceid, $userid );
		}
	}
	else {
		return ;
		return 'success';
	}

	return 'Existing Cancellation Request Exists';
}

function recalcRecurringProductPrice($serviceid, $userid = '', $pid = '', $billingcycle = '', $configoptionsrecurring = 'empty', $promoid = 0, $includesetup = false) {
	if (( ( !$userid || !$pid ) || !$billingcycle )) {
		select_query( 'tblhosting', 'userid,packageid,billingcycle', array( 'id' => $serviceid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;

		if (!$userid) {
			$data['userid'];

			if (!$pid) {
				$data['packageid'];
				$pid = ;

				if (!$billingcycle) {
					$data['billingcycle'];
					$billingcycle = ;
					global $currency;

					getCurrency( $userid );
					$currency = ;
					select_query;
					'tblpricing';
					'';
				}
			}

			( array( 'type' => 'product', 'currency' => $currency['id'], 'relid' => $pid ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;

			if ($billingcycle == 'Monthly') {
				$data['monthly'];
				$amount = ;
			}

			( ( $billingcycle ), 0, 1 );
			$setupvar = $userid = ;

			if (0 < $data[$setupvar . 'setupfee']) {
				$setupvar . 'setupfee';
			}

			$data[];
			$amount += ;

			if ($configoptionsrecurring == 'empty') {
				function_exists;
			}


			if (!( 'getCartConfigOptions' )) {
				require( ROOTDIR . '/includes/configoptionsfunctions.php' );
			}
		}
	}

	getCartConfigOptions( $pid, '', $billingcycle, $serviceid );
	$configoptions = ;
	foreach ($configoptions as ) {
		$configoption = ;
		$configoption['selectedrecurring'];
		$amount += ;

		if ($includesetup === true) {
			$configoption['selectedsetup'];
			$amount += ;
			break;
		}

		break;
	}

	jmp;
	$amount += $configoption;

	if ($promoid) {
		recalcPromoAmount;
		$pid;
	}

	( $userid, $serviceid, $billingcycle, $amount, $promoid );
	$amount -= ;
	return $amount;
}

function closeClient($userid) {
	update_query( 'tblclients', array( 'status' => 'Closed' ), array( 'id' => $userid ) );
	update_query( 'tblhosting', array( 'domainstatus' => 'Cancelled', 'termination_date' => date( 'Y-m-d' ) ), array( 'userid' => $userid, 'domainstatus' => 'Pending' ) );
	update_query( 'tblhosting', array( 'domainstatus' => 'Cancelled', 'termination_date' => date( 'Y-m-d' ) ), array( 'userid' => $userid, 'domainstatus' => 'Active' ) );
	update_query( 'tblhosting', array( 'domainstatus' => 'Terminated', 'termination_date' => date( 'Y-m-d' ) ), array( 'userid' => $userid, 'domainstatus' => 'Suspended' ) );
	select_query( 'tblhosting', 'id', array( 'userid' => $userid ) );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$domainlistid = ;
		update_query( 'tblhostingaddons', array( 'status' => 'Cancelled', 'termination_date' => date( 'Y-m-d' ) ), array( 'hostingid' => $domainlistid, 'status' => 'Pending' ) );
		update_query( 'tblhostingaddons', array( 'status' => 'Cancelled', 'termination_date' => date( 'Y-m-d' ) ), array( 'hostingid' => $domainlistid, 'status' => 'Active' ) );
		update_query( 'tblhostingaddons', array( 'status' => 'Terminated', 'termination_date' => date( 'Y-m-d' ) ), array( 'hostingid' => $domainlistid, 'status' => 'Suspended' ) );
	}

	jmp;
	( , array( 'userid' => $userid, 'status' => 'Active' ) );
	update_query( 'tbldomains', array( 'status' => 'Cancelled' ), array( 'userid' => $userid, 'status' => 'Pending-Transfer' ) );
	update_query( 'tblinvoices', array( 'status' => 'Cancelled' ), array( 'userid' => $userid, 'status' => 'Unpaid' ) );
	update_query( 'tblbillableitems', array( 'invoiceaction' => '0' ), array( 'userid' => $userid ) );
	logActivity(  . 'Client Status changed to Closed - User ID: ' . $userid, $userid );
	run_hook( 'ClientClose', array( 'userid' => $userid ) );
}

function convertStateToCode($ostate, $country) {
	$sc = '';
	strtolower( $ostate );
	$state = ;
	strtoupper( $country );
	$country = ;

	if ($country == 'US') {
		if ($state == 'alabama') {
			$sc = 'AL';
		}
		else {
			if ($state == 'iowa') {
				$sc = 'IA';
			}
		}


		if () {
			$sc = 'KY';
		}


		if () {
			$sc = 'NM';
		}

		jmp;

		if ($state == 'north dakota') {
			$sc = 'ND';
		}


		if () {
			$sc = 'NB';
		}
	}
	else {
		if ($state == 'saskatchewan') {
		}

		$sc = 'SK';
		jmp;

		if ($state == 'yukon territory') {
			$sc = 'YT';

			if (!$sc) {
			}
		}

		$sc = $ostate;
	}

	return $sc;
}

function getClientsPaymentMethod($userid) {
	new ddhjgidcb(  );
	$gatewayclass = ;
	get_query_val( 'tblclients', 'defaultgateway', array( 'id' => $userid ) );

	if (!$gatewayclass->isActiveGateway( $paymentmethod )) {
		$paymentmethod = '';

		if (!$paymentmethod) {
			get_query_val;
			'tblinvoices';
			'paymentmethod';
			array( 'userid' => $userid );
			'id';
		}
	}

	( 'DESC', '0,1' );
	$paymentmethod = ;

	if (!$gatewayclass->isActiveGateway( $paymentmethod )) {
		$paymentmethod = '';
		!$paymentmethod;
	}


	if () {
		$gatewayclass->getFirstAvailableGateway(  );
	}

	$paymentmethod = $paymentmethod = ;
	return $paymentmethod;
}

/**
 * Change clients default payment method.
 *
 * Updates client profile as well as all products, addons, domains,
 * and unpaid invoices to the new payment method.
 *
 * @param int $userid
 * @param string $paymentmethod
 */
function clientChangeDefaultGateway($userid, $paymentmethod) {
	get_query_val( 'tblclients', 'defaultgateway', array( 'id' => $userid ) );
	$defaultgateway = ;

	if (( ( eaaadiagec::get( 'adminid' ) && !$paymentmethod ) && $defaultgateway )) {
		update_query( 'tblclients', array( 'defaultgateway' => '' ), array( 'id' => $userid ) );

		if (( $paymentmethod && $paymentmethod != $defaultgateway )) {
			if ($paymentmethod == 'none') {
				update_query( 'tblclients', array( 'defaultgateway' => '' ), array( 'id' => $userid ) );
				get_query_val( 'tblpaymentgateways', 'gateway', array( 'gateway' => $paymentmethod ) );
				$paymentmethod = ;

				if (!$paymentmethod) {
					return false;
					update_query;
					'tblclients';
					array( 'defaultgateway' => $paymentmethod );
					array( 'id' => $userid );
				}
			}

			(  );
			update_query( 'tblhosting', array( 'paymentmethod' => $paymentmethod ), array( 'userid' => $userid ) );
			update_query( 'tblhostingaddons', array( 'paymentmethod' => $paymentmethod ), 'hostingid IN (SELECT id FROM tblhosting WHERE userid=' . (int)$userid . ')' );
			update_query;
			'tbldomains';
			array( 'paymentmethod' => $paymentmethod );
		}

		( array( 'userid' => $userid ) );
	}

	update_query( 'tblinvoices', array( 'paymentmethod' => $paymentmethod ), array( 'userid' => $userid, 'status' => 'Unpaid' ) );
}

function recalcPromoAmount($pid, $userid, $serviceid, $billingcycle, $recurringamount, $promoid) {
	global $currency;

	getCurrency( $userid );
	$currency = ;
	$recurringdiscount = ;
	select_query( 'tblpromotions', '', array( 'id' => $promoid ) );
	mysql_fetch_array( $result );
	$data['id'];
	$data['type'];
	$data['recurring'];
	$recurring = $id = $result = $used = '';
	$data['value'];
	$value = $type = $data = ;

	if ($recurring) {
		if ($type == 'Percentage') {
			$recurringdiscount = $recurringamount * ( $value / 100 );
			jmp;

			if ($type == 'Fixed Amount') {
				if ($currency['id'] != 1) {
					convertCurrency;
					$value;
					1;
					$currency['id'];
				}
			}
		}
	}

	(  );
	$value = ;

	if ($recurringamount < $value) {
		$recurringdiscount = $data;
		jmp;
		$recurringdiscount = $promoid;

		if ($type == 'Price Override') {
			$currency['id'] != 1;
		}


		if () {
			convertCurrency;
			$value;
			1;
			$currency['id'];
		}
	}

	(  );
	$value = ;
	$recurringdiscount = $recurringamount - $value;
	return $recurringdiscount;
}

function doResetPWEmail($email, $answer = '') {
	global $CONFIG;
	global $_LANG;
	global $securityquestion;

	if (!$email) {
		return $_LANG['pwresetemailrequired'];
		select_query( 'tblclients', 'id,password,securityqid,securityqans', array( 'email' => $email, 'status' => array( 'sqltype' => 'NEQ', 'value' => 'Closed' ) ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$userid = ;
		$contactid = 3;
		$data['password'];
		$password = ;
		$data['securityqid'];
		$securityqid = ;
		$data['securityqans'];
		$securityqans = ;

		if (!$userid) {
			select_query( 'tblcontacts', 'tblcontacts.id,tblcontacts.userid,tblcontacts.password', array( 'tblcontacts.email' => $email, 'tblcontacts.subaccount' => '1', 'tblclients.status' => array( 'sqltype' => 'NEQ', 'value' => 'Closed' ) ), '', '', '', 'tblclients ON tblclients.id=tblcontacts.userid' );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['id'];
			$contactid = ;
			$data['userid'];
			$userid = ;
			$data['password'];
		}
	}

	$password = ;

	if (!$userid) {
		return $_LANG['pwresetemailnotfound'];

		if ($securityqid) {
			select_query( 'tbladminsecurityquestions', '', array( 'id' => $securityqid ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			decrypt( $data['question'] );
			$securityquestion = ;

			if (!$answer) {
				return '';
				decrypt( $securityqans );
			}
		}
	}


	if ($answer != ) {
		return $_LANG['pwresetsecurityquestionincorrect'];
		md5( $userid . rand( 100000, 999999 ) . $password );
		$resetkey = ;

		if ($contactid) {
			update_query( 'tblcontacts', array( 'pwresetkey' => $resetkey, 'pwresetexpiry' => time(  ) + 2 * 60 * 60 ), array( 'id' => $contactid ) );
		}
	}

	jmp;
	update_query( 'tblclients', array( 'pwresetkey' => $resetkey, 'pwresetexpiry' => date( 'Y-m-d H:i:s', time(  ) + 2 * 60 * 60 ) ), array( 'id' => $userid ) );

	if ($CONFIG['SystemSSLURL']) {
		$reseturl = (true ? $CONFIG['SystemSSLURL'] : $CONFIG['SystemURL']);
		$reseturl .=  . '/pwreset.php?key=' . $resetkey;
		sendMessage;
		'Password Reset Validation';
		$userid;
		array( 'pw_reset_url' => $reseturl );
	}

	( array( 'contactid' => $contactid ) );
	logActivity( 'Password Reset Requested', $userid );
}

function doResetPWKeyCheck($key) {
	global $_LANG;

	select_query( 'tblclients', 'id,pwresetexpiry', array( 'pwresetkey' => $key ) );
	mysql_fetch_array( $result );
	$data = ;
	$userid = $result = ;
	new cbjdhjhfcb( $data['pwresetexpiry'] );
	if (!$userid) {
		select_query;
		'tblcontacts';
		'id,userid,pwresetexpiry';
		array( 'pwresetkey' => $key );
	}

	(  );
	mysql_fetch_array( $result );
	$data = ;
	$userid = $result = $pwresetexpiry = $data['id'];
	new cbjdhjhfcb( $data['pwresetexpiry'] );
	$pwresetexpiry = $data['userid'];

	if (!$userid) {
		return $_LANG['pwresetkeyinvalid'];
		(  && $pwresetexpiry->year != -1 );
		$pwresetexpiry->isPast(  );
	}

	$expired = (bool);

	if ($expired) {
	}

	return $_LANG['pwresetkeyexpired'];
}

function doResetPW($key, $newpw, $confirmpw) {
	global $_LANG;

	dfdidhdbdc::decode( $newpw );
	$newpw = ;
	dfdidhdbdc::decode( $confirmpw );
	$confirmpw = ;

	if (!$key) {
		return $_LANG['pwresetemailrequired'];
		select_query( 'tblclients', 'id,email,pwresetexpiry', array( 'pwresetkey' => $key ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$userid = ;
		$data['email'];
		$email = ;
		new cbjdhjhfcb( $data['pwresetexpiry'] );
		$pwresetexpiry = ;

		if (!$userid) {
			select_query;
			'tblcontacts';
			'id,email,userid,pwresetexpiry';
			array( 'pwresetkey' => $key );
		}

		(  );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$contactid = ;
		$data['userid'];
		$userid = ;
	}

	new cbjdhjhfcb( $data['pwresetexpiry'] );
	$pwresetexpiry = ;
	$data['email'];
	$email = ;

	if (!$userid) {
		return $_LANG['pwresetemailnotfound'];
		$expired = ( $pwresetexpiry->year != -1 && $pwresetexpiry->isPast(  ) );

		if ($expired) {
			return $_LANG['pwresetkeyexpired'];
			new cdhfeffhcg(  );
			$validate = ;

			if ($validate->validate( 'required', 'newpw', 'ordererrorpassword' )) {
				if ($validate->validate( 'pwstrength', 'newpw', 'pwstrengthfail' )) {
					if ($validate->validate( 'required', 'confirmpw', 'clientareaerrorpasswordconfirm' )) {
						$validate->validate;
						'match_value';
						'newpw';
						'clientareaerrorpasswordnotmatch';
					}
				}
			}
		}

		( 'confirmpw' );

		if (!$validate->hasErrors(  )) {
			new bdjciiijih(  );
			$hasher = ;

			if ($contactid) {
				update_query;
				'tblcontacts';
			}
		}

		( array( 'password' => $hasher->hash( dfdidhdbdc::decode( $newpw ) ), 'pwresetkey' => '', 'pwresetexpiry' => '' ), array( 'id' => $contactid ) );
	}

	(  );
	logActivity( 'Password Reset Completed', $userid );
	sendMessage( 'Password Reset Confirmation', $userid, array( 'contactid' => $contactid ) );
	validateClientLogin( $email, $newpw );
	redir( 'success=true', 'pwreset.php' );
	return $validate->getHTMLErrorOutput(  );
}

function cancelUnpaidInvoicebyProductID($serviceid, $userid = '') {
	$userid = (int)$userid;
	$serviceid = (int)$serviceid;

	if (!$userid) {
		$userid = (int)get_query_val( 'tblhosting', 'userid', array( 'id' => $serviceid ) );
		bfiifiigdh::table( 'tblhostingaddons' )->where( 'hostingid', '=', $serviceid )->get( array( 'id' ) );
		$addons = ;
		$addonIds = array(  );
		foreach ($addons as ) {
			$addon = ;
			$addonIds[] = $addon->id;
			break;
		}

		select_query( 'tblinvoiceitems', 'tblinvoiceitems.id,tblinvoiceitems.invoiceid', array( 'type' => 'Hosting', 'relid' => $serviceid, 'status' => 'Unpaid', 'tblinvoices.userid' => $userid ), '', '', '', 'tblinvoices ON tblinvoices.id=tblinvoiceitems.invoiceid' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$itemid = ;
			$data['invoiceid'];
			$invoiceid = ;
			select_query( 'tblinvoiceitems', 'COUNT(*)', array( 'invoiceid' => $invoiceid ) );
			$result2 = ;
			mysql_fetch_array( $result2 );
			$data = ;
			$data[0];
			$itemcount = ;

			if (( 1 < $itemcount && $itemcount <= 4 )) {
				get_query_val( 'tblinvoiceitems', 'COUNT(*)', array( 'invoiceid' => $invoiceid, 'type' => 'PromoHosting', 'relid' => $serviceid ) );
				$itemcount -= ;
				get_query_val( 'tblinvoiceitems', 'COUNT(*)', array( 'invoiceid' => $invoiceid, 'type' => 'GroupDiscount' ) );
				$itemcount -= ;
				get_query_val( 'tblinvoiceitems', 'COUNT(*)', array( 'invoiceid' => $invoiceid, 'type' => 'LateFee' ) );
				$itemcount -= ;

				if ($addonIds) {
					bfiifiigdh::table( 'tblinvoiceitems' )->where( 'invoiceid', '=', $invoiceid )->where;
					'type';
					'=';
					'Addon';
				}
			}
		}
	}

	(  )->whereIn( 'relid', $addonIds )->count(  );
	$itemcount -= ;

	if ($itemcount == 1) {
		update_query( 'tblinvoices', array( 'status' => 'Cancelled' ), array( 'id' => $invoiceid ) );
		logActivity(  . 'Cancelled Outstanding Product Renewal Invoice - Invoice ID: ' . $invoiceid . ' - Service ID: ' . $serviceid, $userid );
		run_hook( 'InvoiceCancelled', array( 'invoiceid' => $invoiceid ) );
	}

	jmp;
	( 'tblinvoiceitems', array( 'invoiceid' => $invoiceid, 'type' => 'PromoHosting', 'relid' => $serviceid ) );
	delete_query( 'tblinvoiceitems', array( 'invoiceid' => $invoiceid, 'type' => 'GroupDiscount' ) );

	if (!function_exists( 'updateInvoiceTotal' )) {
		require_once( ROOTDIR . '/includes/invoicefunctions.php' );
		updateInvoiceTotal( $invoiceid );
		logActivity(  . 'Removed Outstanding Product Renewal Invoice Line Item - Invoice ID: ' . $invoiceid . ' - Service ID: ' . $serviceid, $userid );
	}

	jmp;
	(  )->get( array( 'tblinvoiceitems.id', 'tblinvoiceitems.relid', 'tblinvoiceitems.invoiceid' ) );
	$invoiceItems = ;
	foreach ($invoiceItems as ) {
		$invoiceItem = ;
		bfiifiigdh::table( 'tblinvoiceitems' )->where( 'invoiceid', '=', $invoiceItem->invoiceid )->count(  );
		$itemCount = ;

		if (( 1 < $itemCount && $itemCount <= 3 )) {
			bfiifiigdh::table( 'tblinvoiceitems' )->where( 'invoiceid', '=', $invoiceItem->invoiceid )->where( 'type', '=', 'GroupDiscount' )->count(  );
			$itemCount -= ;
			bfiifiigdh::table( 'tblinvoiceitems' )->where( 'invoiceid', '=', $invoiceItem->invoiceid )->where( 'type', '=', 'LateFee' )->count(  );
			$itemCount -= ;

			if ($itemCount == 1) {
				bfiifiigdh::table( 'tblinvoices' )->where( 'id', '=', $invoiceItem->invoiceid )->update( array( 'status' => 'Cancelled' ) );
				logActivity;
			}
		}

		(  . 'Cancelled Outstanding Product Addon Invoice - Invoice ID: ' . $invoiceItem->invoiceid . ' - Service Addon ID: ' . $invoiceItem->relid, $userid );
		run_hook( 'InvoiceCancelled', array( 'invoiceid' => $invoiceItem->invoiceid ) );
		break;
	}

	jmp;
	return true;
}

?>
