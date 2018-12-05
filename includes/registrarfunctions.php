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

function checkDomain($domain) {
	global $domainparts;

	if (preg_match( '/^[a-z0-9][a-z0-9\-]+[a-z0-9](\.[a-z]{2,4})+$/i', $domain )) {
		explode;
		'.';
		$domain;
	}

	( 2 );
	$domainparts = ;
	return true;
}

function getRegistrarsDropdownMenu($registrar, $name = 'registrar') {
	global $aInt;

	$code = '<select name="' . $name . '" class="form-control select-inline" id="registrarsDropDown"><option value="">' . $aInt->lang( 'global', 'none' ) . '</option>';
	select_query( 'tblregistrars', 'DISTINCT registrar', '', 'registrar', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
	}

	$code .= '<option value="' . $data[0] . '"';

	if ($registrar == $data[0]) {
		$code .= ' selected';
		ucfirst;
	}


	while (true) {
		$code .= '>' . ( $data[0] ) . '</option>';
	}

	$code .= '</select>';
	return $code;
}

function loadRegistrarModule($registrar) {
	if (function_exists( $registrar . '_getConfigArray' )) {
		return true;
		bjgfceddfi;
	}

	new (  );
	$module = ;
	return $module->load( $registrar );
}

function RegCallFunction($params, $function, $noarr = false) {
	$params['registrar'];
	$registrar = ;
	run_hook( 'PreRegistrar' . $function, array( 'params' => $params ) );
	$hookResults = ;

	if (processHookResults( $registrar, $function, $hookResults )) {
		return array(  );
		Exception {
			$e->getMessage;
		}
	}

	return array( 'error' => (  ) );
}

function getRegistrarConfigOptions($registrar) {
	new bjgfceddfi(  );
	$module = ;
	$module->load( $registrar );
	return $module->getSettings(  );
}

function RegGetNameservers($params) {
	return RegCallFunction( $params, 'GetNameservers' );
}

function RegSaveNameservers($params) {
	$i = 5;

	while ($i <= 5) {
		$params['ns' . $i] = trim( $params['ns' . $i] );
		++$i;
	}

	jmp;
	( 'userid', array( 'id' => $params['domainid'] ) );
	$userid = ;

	if ($values['error']) {
		logActivity( 'Domain Registrar Command: Save Nameservers - Failed: ' . $values['error'] . ' - Domain ID: ' . $params['domainid'], $userid );
		logActivity;
	}

	( 'Domain Registrar Command: Save Nameservers - Successful', $userid );
	return $values;
}

function RegGetRegistrarLock($params) {
	RegCallFunction( $params, 'GetRegistrarLock', 1 );
	$values = ;

	if (is_array( $values )) {
	}

	return '';
}

function RegSaveRegistrarLock($params) {
	RegCallFunction( $params, 'SaveRegistrarLock' );
	$values = ;

	if (!$values) {
	}

	return false;
}

function RegGetURLForwarding($params) {
	return RegCallFunction( $params, 'GetURLForwarding' );
}

function RegSaveURLForwarding($params) {
	return RegCallFunction( $params, 'SaveURLForwarding' );
}

function RegGetEmailForwarding($params) {
	return RegCallFunction( $params, 'GetEmailForwarding' );
}

function RegSaveEmailForwarding($params) {
	return RegCallFunction( $params, 'SaveEmailForwarding' );
}

function RegGetDNS($params) {
	return RegCallFunction( $params, 'GetDNS' );
}

function RegSaveDNS($params) {
	return RegCallFunction( $params, 'SaveDNS' );
}

function RegRenewDomain($params) {
	$params['domainid'];
	$domainid = ;
	select_query( 'tbldomains', '', array( 'id' => $domainid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['userid'];
	$userid = ;
	$data['domain'];
	$domain = ;
	$data['orderid'];
	$orderid = ;
	$data['registrar'];
	$registrar = ;
	$data['registrationperiod'];
	$registrationperiod = ;

	if ($data['dnsmanagement']) {
		$dnsmanagement = (true ? true : false);

		if ($data['emailforwarding']) {
			$emailforwarding = (true ? true : false);

			if ($data['idprotection']) {
				$idprotection = (true ? true : false);
				new hafgcfgag( $domain );
				$domainObj = ;
				$params['registrar'] = $registrar;
			}
		}
	}

	$params['sld'] = $domainObj->getSLD(  );
	$params['tld'] = $domainObj->getTLD(  );
	$params['regperiod'] = $registrationperiod;
	$params['dnsmanagement'] = $dnsmanagement;
	$params['emailforwarding'] = $emailforwarding;
	$params['idprotection'] = $idprotection;
	$params['domainObj'] = $domainObj;
	RegCallFunction( $params, 'RenewDomain' );
	$values = ;

	if (!is_array( $values )) {
		return false;

		if ($values['na']) {
			return array( 'error' => 'Registrar Function Not Supported' );

			if ($values['error']) {
				logActivity;
					. 'Domain Renewal Failed - Domain ID: ' . $domainid . ' - Domain: ' . $domain . ' - Error: ' . $values['error'];
			}
		}

		( $userid );
		run_hook( 'AfterRegistrarRenewalFailed', array( 'params' => $params, 'error' => $values['error'] ) );
		jmp;
		bfiifiigdh::table( 'tbldomains' )->where( 'id', '=', $domainid )->first( array( 'expirydate', 'registrationperiod' ) );
		$expiryInfo = ;
		$expiryInfo->expirydate;
		$expirydate = ;
		$expiryInfo->registrationperiod;
		$registrationperiod = ;
		substr( $expirydate, 0, 4 );
		$year = ;
		substr( $expirydate, 5, 2 );
		$month = ;
		substr( $expirydate, 8, 2 );
		$day = ;

		if (strpos( $expirydate, '0000-00-00' ) === false) {
			cbjdhjhfcb::createFromDate( $year, $month, $day );
			$newExpiryDate = ;
			jmp;
			cbjdhjhfcb::create(  );
			$newExpiryDate = ;
			$newExpiryDate->addYears( $registrationperiod )->format( 'Y-m-d' );
			$newExpiryDate = ;
			$update = array( 'expirydate' => $newExpiryDate, 'status' => 'Active', 'reminders' => '' );
			bfiifiigdh::table( 'tbldomains' )->where( 'id', '=', $domainid )->update( $update );
			logActivity(  . 'Domain Renewed Successfully - Domain ID: ' . $domainid . ' - Domain: ' . $domain, $userid );
		}
	}

	run_hook( 'AfterRegistrarRenewal', array( 'params' => $params ) );
	return $values;
}

function RegRegisterDomain($paramvars) {
	global $CONFIG;

	$paramvars['domainid'];
	$domainid = ;
	select_query( 'tbldomains', '', array( 'id' => $domainid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['userid'];
	$userid = ;
	$data['domain'];
	$domain = ;
	$data['orderid'];
	$orderid = ;
	$data['registrar'];
	$registrar = ;
	$data['registrationperiod'];
	$registrationperiod = ;

	if ($data['dnsmanagement']) {
		$dnsmanagement = (true ? true : false);

		if ($data['emailforwarding']) {
			$emailforwarding = (true ? true : false);

			if ($data['idprotection']) {
				$idprotection = (true ? true : false);
				select_query( 'tblorders', 'contactid', array( 'id' => $orderid ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				$data['contactid'];
				$contactid = ;

				if (!function_exists( 'getClientsDetails' )) {
					require( dirname( __FILE__ ) . '/clientfunctions.php' );
					getClientsDetails( $userid, $contactid );
					$clientsdetails = ;
					$clientsdetails['state'] = $clientsdetails['statecode'];
					$clientsdetails['fullphonenumber'] = $clientsdetails['phonenumberformatted'];
					$params;
				}
			}
		}
	}

	$params = &;

	array_merge( $paramvars, $clientsdetails );
	$params = ;
	new hafgcfgag( $domain );
	$domainObj = ;
	$params['registrar'] = $registrar;
	$params['sld'] = $domainObj->getSLD(  );
	$params['tld'] = $domainObj->getTLD(  );
	$params['regperiod'] = $registrationperiod;
	$params['dnsmanagement'] = $dnsmanagement;
	$params['emailforwarding'] = $emailforwarding;
	$params['idprotection'] = $idprotection;

	if ($CONFIG['RegistrarAdminUseClientDetails'] == 'on') {
		$params['adminfirstname'] = $clientsdetails['firstname'];
		$params['adminlastname'] = $clientsdetails['lastname'];
		$params['admincompanyname'] = $clientsdetails['companyname'];
		$params['adminemail'] = $clientsdetails['email'];
		$params['adminaddress1'] = $clientsdetails['address1'];
		$params['adminaddress2'] = $clientsdetails['address2'];
		$params['admincity'] = $clientsdetails['city'];
		$params['adminfullstate'] = $clientsdetails['fullstate'];
		$params['adminstate'] = $clientsdetails['state'];
		$params['adminpostcode'] = $clientsdetails['postcode'];
		$params['admincountry'] = $clientsdetails['country'];
		$params['adminphonenumber'] = $clientsdetails['phonenumber'];
		$params['adminfullphonenumber'] = $clientsdetails['phonenumberformatted'];
		jmp;
		$params['adminfirstname'] = $CONFIG['RegistrarAdminFirstName'];
		$params['adminlastname'] = $CONFIG['RegistrarAdminLastName'];
		$params['admincompanyname'] = $CONFIG['RegistrarAdminCompanyName'];
		$params['adminemail'] = $CONFIG['RegistrarAdminEmailAddress'];
		$params['adminaddress1'] = $CONFIG['RegistrarAdminAddress1'];
		$params['adminaddress2'] = $CONFIG['RegistrarAdminAddress2'];
		$params['admincity'] = $CONFIG['RegistrarAdminCity'];
		$params['adminfullstate'] = $CONFIG['RegistrarAdminStateProvince'];
		$params['adminstate'] = convertStateToCode( $CONFIG['RegistrarAdminStateProvince'], $CONFIG['RegistrarAdminCountry'] );
		$params['adminpostcode'] = $CONFIG['RegistrarAdminPostalCode'];
		$params['admincountry'] = $CONFIG['RegistrarAdminCountry'];
		$params['adminfullphonenumber'] = $CONFIG['RegistrarAdminPhone'];
		$params['adminphonenumber'] = ;

		if (( !$params['ns1'] && !$params['ns2'] )) {
			select_query( 'tblorders', 'nameservers', array( 'id' => $orderid ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['nameservers'];
			$nameservers = ;
			select_query( 'tblhosting', 'server', array( 'domain' => $domain ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['server'];
			$server = ;

			if ($server) {
				select_query( 'tblservers', '', array( 'id' => $server ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				$i = 8;

				if ($i <= 5) {
					'ns' . $i;
				}

				trim;
			}
		}

		$params[] = ( $data['nameserver' . $i] );
		++$i;
	}

	jmp;
	( array( 'error' => $values['error'] ) );
	date( 'Y-m-d', mktime( 0, 0, 0, date( 'm' ), date( 'd' ), date( 'Y' ) + $registrationperiod ) );
	$expirydate = ;
	update_query( 'tbldomains', array( 'registrationdate' => date( 'Ymd' ), 'expirydate' => $expirydate, 'status' => 'Active' ), array( 'id' => $domainid ) );
	logActivity(  . 'Domain Registered Successfully - Domain ID: ' . $domainid . ' - Domain: ' . $domain, $userid );
	run_hook( 'AfterRegistrarRegistration', array( 'params' => $params ) );
	return $values;
}

function RegTransferDomain($paramvars) {
	global $CONFIG;

	$paramvars['domainid'];
	$domainid = ;
	$paramvars['transfersecret'];
	$passedepp = ;
	select_query( 'tbldomains', '', array( 'id' => $domainid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['userid'];
	$userid = ;
	$data['domain'];
	$domain = ;
	$data['orderid'];
	$orderid = ;
	$data['registrar'];
	$registrar = ;
	$data['registrationperiod'];
	$registrationperiod = ;

	if ($data['dnsmanagement']) {
		$dnsmanagement = (true ? true : false);

		if ($data['emailforwarding']) {
			$emailforwarding = (true ? true : false);

			if ($data['idprotection']) {
				$idprotection = (true ? true : false);
				select_query( 'tblorders', 'contactid,nameservers,transfersecret', array( 'id' => $orderid ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				$data['contactid'];
				$contactid = ;
				$data['nameservers'];
				$nameservers = ;
				$data['transfersecret'];
				$transfersecret = ;

				if (!function_exists( 'getClientsDetails' )) {
					require( dirname( __FILE__ ) . '/clientfunctions.php' );
					getClientsDetails( $userid, $contactid );
					$clientsdetails = ;
					$clientsdetails['state'] = $clientsdetails['statecode'];
					$clientsdetails['fullphonenumber'] = $clientsdetails['phonenumberformatted'];
					global $params;

					array_merge( $paramvars, $clientsdetails );
					$params = ;
					new hafgcfgag( $domain );
					$domainObj = ;
					$params['registrar'] = $registrar;
					$params['sld'] = $domainObj->getSLD(  );
					$params['tld'] = $domainObj->getTLD(  );
					$params['regperiod'] = $registrationperiod;
					$params['dnsmanagement'] = $dnsmanagement;
					$params['emailforwarding'] = $emailforwarding;
					$params['idprotection'] = $idprotection;
					$CONFIG['RegistrarAdminUseClientDetails'] == 'on';
				}
			}
		}
	}

	if () = ;
	$params['adminaddress1'] = $CONFIG['RegistrarAdminAddress1'];
	$params['adminaddress2'] = $CONFIG['RegistrarAdminAddress2'];
	$params['admincity'] = $CONFIG['RegistrarAdminCity'];
	$params['adminstate'] = $CONFIG['RegistrarAdminStateProvince'];
	$params['adminpostcode'] = $CONFIG['RegistrarAdminPostalCode'];
	$params['admincountry'] = $CONFIG['RegistrarAdminCountry'];
	$params['adminfullphonenumber'] = $CONFIG['RegistrarAdminPhone'];
	$params['adminphonenumber'] = ;

	if (( !$params['ns1'] && !$params['ns2'] )) {
		select_query( 'tblorders', 'nameservers', array( 'id' => $orderid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['nameservers'];
		$nameservers = ;
		select_query( 'tblhosting', 'server', array( 'domain' => $domain ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['server'];
		$server = ;
		if ($server) = ;
		++$i;
	}

	jmp;

	if () {
		logActivity(  . 'Domain Transfer Failed - Domain ID: ' . $domainid . ' - Domain: ' . $domain . ' - Error: ' . $values['error'], $userid );
		run_hook( 'AfterRegistrarTransferFailed', array( 'params' => $params, 'error' => $values['error'] ) );
	}

	( array( 'id' => $domainid ) );
	$array = array( 'date' => 'now()', 'title' => 'Domain Pending Transfer', 'description' => 'Check the transfer status of the domain ' . $params['sld'] . '.' . $params['tld'] . '', 'admin' => '', 'status' => 'In Progress', 'duedate' => date( 'Y-m-d', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + 5, date( 'Y' ) ) ) );
	insert_query( 'tbltodolist', $array );
	logActivity(  . 'Domain Transfer Initiated Successfully - Domain ID: ' . $domainid . ' - Domain: ' . $domain, $userid );
	run_hook( 'AfterRegistrarTransfer', array( 'params' => $params ) );
	return $values;
}

function RegGetContactDetails($params) {
	return RegCallFunction( $params, 'GetContactDetails' );
}

function RegSaveContactDetails($params) {
	new hafgcfgag( $params['sld'] . '.' . $params['tld'] );
	$domainObj = ;
	get_query_val( 'tbldomains', 'id', array( 'domain' => $domainObj->getDomain(  ) ) );
	$domainid = ;
	new bfbbddjdf(  );
	$additflds = ;
	$params['additionalfields'] = $additflds->getFieldValuesFromDatabase( $domainid );
	$originaldetails = $domainid;

	if (!array_key_exists( 'original', $params )) {
		foreignChrReplace( $params );
		$params = ;
		$params['original'] = $originaldetails;
		$params['domainObj'] = $domainObj;
		RegCallFunction( $params, 'SaveContactDetails' );
		$values = ;

		if (!$values) {
			return false;
			select_query;
			'tbldomains';
			'userid';
			$params['domainid'];
		}
	}

	( array( 'id' =>  ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data[0];
	$userid = ;

	if ($values['error']) {
		logActivity;
	}

	( 'Domain Registrar Command: Update Contact Details - Failed: ' . $values['error'] . ' - Domain ID: ' . $params['domainid'], $userid );
	logActivity( 'Domain Registrar Command: Update Contact Details - Successful', $userid );
	return $values;
}

function RegGetEPPCode($params) {
	RegCallFunction( $params, 'GetEPPCode' );
	$values = ;
	if (!$values) = ;
	return $values;
}

function RegRequestDelete($params) {
	RegCallFunction( $params, 'RequestDelete' );
	$values = ;

	if (!$values) {
		return false;
		!$values['error'];
	}


	if () {
	}

	update_query( 'tbldomains', array( 'status' => 'Cancelled' ), array( 'id' => $params['domainid'] ) );
	return $values;
}

function RegReleaseDomain($params) {
	return RegCallFunction( $params, 'ReleaseDomain' );
}

function RegRegisterNameserver($params) {
	return RegCallFunction( $params, 'RegisterNameserver' );
}

function RegModifyNameserver($params) {
	return RegCallFunction( $params, 'ModifyNameserver' );
}

function RegDeleteNameserver($params) {
	return RegCallFunction( $params, 'DeleteNameserver' );
}

function RegIDProtectToggle($params) {
	$params['domainid'];
	$domainid = ;
	select_query( 'tbldomains', 'idprotection', array( 'id' => $domainid ) );
	mysql_fetch_assoc( $result );
	$data = $result = ;

	if ($data['idprotection']) {
		(true ? true : false);
	}

	$idprotection = ;
	$params['protectenable'] = $idprotection;
	return RegCallFunction( $params, 'IDProtectToggle' );
}

function RegGetDefaultNameservers($params, $domain) {
	global $CONFIG;

	get_query_val( 'tblhosting', 'server', array( 'domain' => $domain ) );
	$serverid = ;

	if ($serverid) {
		select_query( 'tblservers', '', array( 'id' => $serverid ) );
		$result = ;
		mysql_fetch_array( $result );

		while (true) {
			$data = ;
			$i = 6;

			if ($i <= 5) {
			}

			$params['ns' . $i] = trim( $data['nameserver' . $i] );
			++$i;
		}

		$i = 6;

		if ($i <= 5) {
			'ns' . $i;
			trim;
			$CONFIG['DefaultNameserver' . $i];
		}

		(  );
	}


	while (true) {
		$params[] = ;
		++$i;
	}

	return $params;
}

/**
 * Call the GetRegistrantContactEmailAddress function within a registrar module
 * and return the result.
 *
 * @param array $params
 *
 * @return array
 */
function RegGetRegistrantContactEmailAddress($params) {
	$values = RegCallFunction( $params, 'GetRegistrantContactEmailAddress' );

	if (isset( $values['registrantEmail'] )) {
		return array( 'registrantEmail' => $values['registrantEmail'] );
		array(  );
	}

	return ;
}

function RegCustomFunction($params, $func_name) {
	return RegCallFunction( $params, $func_name );
}

function RebuildRegistrarModuleHookCache() {
	$hooksarray = array(  );
	new bjgfceddfi(  );
	$registrar = ;
	foreach ($registrar->getList(  ) as ) {
		$module = ;

		while (true) {
			while (( is_file( ROOTDIR . (  . '/modules/registrars/' . $module . '/hooks.php' ) ) && get_query_val( 'tblregistrars', 'COUNT(*)', array( 'registrar' => $module ) ) )) {
				$hooksarray[] = $module;
			}
		}
	}

	iciahfajh::getInstance(  );
	$whmcs = ;
	$whmcs->set_config( 'RegistrarModuleHooks', implode( ',', $hooksarray ) );
}

function injectDomainObjectIfNecessary($params) {
	if (( !isset( $params['domainObj'] ) || !is_object( $params['domainObj'] ) )) {
		new hafgcfgag;
		'%s.%s';
		$params['sld'];
	}

	( ( $params['tld'] ) );
	$params['domainObj'] = ;
	return $params;
}

?>
