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

function getSSLWebServerTypes() {
	$t = array(  );
	$t['1001'] = 'AOL';
	$t['1002'] = 'Apache +ModSSL';
	$t['1003'] = 'Apache-SSL (Ben-SSL, not Stronghold)';
	$t['1004'] = 'C2Net Stronghold';
	$t['1005'] = 'Cobalt Raq';
	$t['1006'] = 'Covalent Server Software';
	$t['1031'] = 'cPanel / WHM';
	$t['1029'] = 'Ensim';
	$t['1032'] = 'H-Sphere';
	$t['1007'] = 'IBM HTTP Server';
	$t['1008'] = 'IBM Internet Connection Server';
	$t['1009'] = 'iPlanet';
	$t['1010'] = 'Java Web Server (Javasoft / Sun)';
	$t['1011'] = 'Lotus Domino';
	$t['1012'] = 'Lotus Domino Go!';
	$t['1013'] = 'Microsoft IIS 1.x to 4.x';
	$t['1014'] = 'Microsoft IIS 5.x and later';
	$t['1015'] = 'Netscape Enterprise Server';
	$t['1016'] = 'Netscape FastTrack';
	$t['1017'] = 'Novell Web Server';
	$t['1018'] = 'Oracle';
	$t['1030'] = 'Plesk';
	$t['1019'] = 'Quid Pro Quo';
	$t['1020'] = 'R3 SSL Server';
	$t['1021'] = 'Raven SSL';
	$t['1022'] = 'RedHat Linux';
	$t['1023'] = 'SAP Web Application Server';
	$t['1024'] = 'Tomcat';
	$t['1025'] = 'Website Professional';
	$t['1026'] = 'WebStar 4.x and later';
	$t['1027'] = 'WebTen (from Tenon)';
	$t['1028'] = 'Zeus Web Server';
	$t['1000'] = 'Other (not listed)';
	return $t;
}

define( 'CLIENTAREA', true );
require( 'init.php' );
require( 'includes/modulefunctions.php' );
$_LANG['sslconfsslcertificate'];
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="clientarea.php">' . $_LANG['clientareatitle'] . '</a> > <a href="clientarea.php?action=products">' . $_LANG['clientareaproducts'] . '</a> > <a href="#">' . $_LANG['clientareaproductdetails'] . (  . '</a> > <a href="configuressl.php?cert=' . $cert . '">' ) . $_LANG['sslconfsslcertificate'] . '</a>';
$templatefile = 'configuressl-stepone';
Lang::trans( 'sslconfsslcertificate' );
$displayTitle = ;
$tagline = '';
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
$additionalData = array(  );

if (isset( $_SESSION['uid'] )) {
	$whmcs->get_req_var( 'step' );
	$step = ;

	if (in_array( $step, array( 2, 3 ) )) {
		$step = (true ? $step : 1);
		select_query( 'tblsslorders', '', array( 'userid' => $_SESSION['uid'], 'MD5(id)' => $cert ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$id = ;

		if (!$id) {
			$templatefile = 'configuressl-stepone';
			$smartyvalues['status'] = '';
			outputClientArea( $templatefile );
			$data['orderid'];
			$orderid = ;
			$data['serviceid'];
			$serviceid = ;
			$data['remoteid'];
			$remoteid = ;
			$data['module'];
			$module = ;
			$data['certtype'];
			$certtype = ;
			$data['domain'];
			$domain = ;
			$data['configdata'];
			$configdata = ;
			unserialize( $configdata );
			$configdata = ;
			$data['provisiondate'];
			$provisiondate = ;
			$data['completiondate'];
			$completiondate = ;
			$data['status'];
			$status = ;
			select_query( 'tblhosting', 'packageid,regdate,domain,firstpaymentamount', array( 'id' => $serviceid ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['packageid'];
			$productid = ;
			$data['regdate'];
			$regdate = ;
			$data['domain'];
			$domain = ;
			$data['firstpaymentamount'];
			$firstpaymentamount = ;
			fromMySQLDate( $regdate );
			$regdate = ;
			cbebjifhdd::getProductName( $productid );
			$certificatename = ;
			$smartyvalues['cert'] = $cert;
			$smartyvalues['serviceid'] = $serviceid;
			$smartyvalues['certtype'] = $certificatename;
			$smartyvalues['date'] = $regdate;
			$smartyvalues['domain'] = $domain;
			$smartyvalues['price'] = formatCurrency( $firstpaymentamount );
			$smartyvalues['status'] = $status;

			if (!isValidforPath( $module )) {
				exit( 'Invalid SSL Module Name' );
				$modulepath = (  . 'modules/servers/' . $module . '/' ) . $module . '.php';

				if (file_exists( $modulepath )) {
					include( $modulepath );
					$params = array(  );
					ModuleBuildParams( $serviceid );
					$params = ;
					$params['remoteid'] = $remoteid;
					$params['certtype'] = $certtype;
					$params['domain'] = $domain;
					$params['configdata'] = $configdata;

					if (!$_POST) {
						select_query( 'tblclients', '', array( 'id' => $_SESSION['uid'] ) );
						$result = ;
						mysql_fetch_array( $result );
						$data = ;
						$data['firstname'];
						$firstname = ;
						$data['lastname'];
						$lastname = ;
						$data['companyname'];
						$orgname = ;
						$data['email'];
						$email = ;
						$data['address1'];
						$address1 = ;
						$data['address2'];
						$address2 = ;
						$data['city'];
						$city = ;
						$data['state'];
						$state = ;
						$data['postcode'];
						$postcode = ;
						$data['country'];
						$country = ;
						$data['phonenumber'];
						$phonenumber = ;

						if ($step == '2') {
							check_token(  );
							$errormessage = '';

							if (!$servertype) {
								$errormessage .= '<li>' . $_LANG['sslerrorselectserver'];

								if (( !$csr || nl2br( $csr ) == '-----BEGIN CERTIFICATE REQUEST-----<br />
<br />
-----END CERTIFICATE REQUEST-----' )) {
									$errormessage .= '<li>' . $_LANG['sslerrorentercsr'];
									call_user_func( $module . '_SSLStepOne', $params );
									$result = ;

									if (is_array( $result['additionalfields'] )) {
										foreach ($result['additionalfields'] as ) {
										}
									}
								}
							}
						}
					}

					$fieldsconfig = ;
					$heading = ;
					foreach ($fieldsconfig as ) {
						$configoption = ;
						$key = ;
						$_POST['fields'][$key];
						$fieldvalue = ;

						if (( $configoption['Required'] && !$fieldvalue )) {
							$errormessage .= '<li>' . $configoption['FriendlyName'] . ' ' . $_LANG['clientareaerrorisrequired'];
							break;
						}

						break;
					}


					while (true) {
					}


					if (!$firstname) {
						$errormessage .= '<li>' . $_LANG['clientareaerrorfirstname'];

						if (!$lastname) {
							$errormessage .= '<li>' . $_LANG['clientareaerrorlastname'];

							if (!$email) {
								$errormessage .= '<li>' . $_LANG['clientareaerroremail'];

								if (!$address1) {
									$errormessage .= '<li>' . $_LANG['clientareaerroraddress1'];

									if (!$city) {
										$errormessage .= '<li>' . $_LANG['clientareaerrorcity'];

										if (!$state) {
											$errormessage .= '<li>' . $_LANG['clientareaerrorstate'];

											if (!$postcode) {
												$errormessage .= '<li>' . $_LANG['clientareaerrorpostcode'];

												if (!$phonenumber) {
													$errormessage .= '<li>' . $_LANG['clientareaerrorphonenumber'];

													if (!$errormessage) {
														$configdata = array( 'servertype' => $servertype, 'csr' => $csr, 'firstname' => $firstname, 'lastname' => $lastname, 'orgname' => $orgname, 'jobtitle' => $jobtitle, 'email' => $email, 'address1' => $address1, 'address2' => $address2, 'city' => $city, 'state' => $state, 'postcode' => $postcode, 'country' => $country, 'phonenumber' => $phonenumber );

														if (is_array( $fields )) {
															$configdata['fields'] = $fields;
															update_query( 'tblsslorders', array( 'configdata' => serialize( $configdata ) ), array( 'userid' => $_SESSION['uid'], 'MD5(id)' => $cert ) );
															array_merge( $params, $configdata );
														}
													}

													$params = ;

													if (function_exists( $module . '_SSLStepTwo' )) {
														call_user_func( $module . '_SSLStepTwo', $params );
														$result = ;

														if ($result['error']) {
															$errormessage .= '<li>' . $result['error'];

															if ($result['remoteid']) {
																update_query( 'tblsslorders', array( 'remoteid' => $result['remoteid'] ), array( 'id' => $id ) );

																if ($result['domain']) {
																	update_query( 'tblhosting', array( 'domain' => $result['domain'] ), array( 'id' => $serviceid ) );

																	if ($result['provisioned']) {
																		update_query( 'tblsslorders', array( 'provisiondate' => 'now()' ), array( 'id' => $id ) );

																		if ($result['expirydate']) {
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
				}
			}
		}
	}
}

update_query( 'tblsslorders', array( 'expirydate' => $expirydate ), array( 'id' => $id ) );

if ($errormessage) {
	$smartyvalues['errormessage'] = $errormessage;
	$step = '1';

	if ($step == '3') {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			check_token(  );
		}
	}

	(  );
	array_merge( $params, $configdata );
	$params = ;
	call_user_func( $module . '_SSLStepThree', $params );
	$result = ;

	if ($result['error']) {
		$errormessage .= '<li>' . $result['error'];

		if ($result['remoteid']) {
			update_query( 'tblsslorders', array( 'remoteid' => $result['remoteid'] ), array( 'id' => $id ) );

			if ($result['domain']) {
				update_query( 'tblhosting', array( 'domain' => $result['domain'] ), array( 'id' => $serviceid ) );

				if ($result['provisioned']) {
					update_query;
					'tblsslorders';
					array( 'provisiondate' => 'now()' );
					array( 'id' => $id );
				}
			}
		}

		(  );

		if ($result['expirydate']) {
			update_query( 'tblsslorders', array( 'expirydate' => $expirydate ), array( 'id' => $id ) );

			if ($errormessage) {
				$smartyvalues['errormessage'] = $errormessage;
			}
		}

		$smartyvalues['jobtitle'] = $jobtitle;
		$smartyvalues['email'] = $email;
		$smartyvalues['address1'] = $address1;
		$smartyvalues['address2'] = $address2;
		$smartyvalues['city'] = $city;
	}
}

$smartyvalues['state'] = $state;
$smartyvalues['postcode'] = $postcode;
$smartyvalues['country'] = $country;
$smartyvalues['phonenumber'] = $phonenumber;
$smartyvalues['faxnumber'] = $faxnumber;
$smartyvalues['countriesdropdown'] = getCountriesDropDown( $country );
$smartyvalues['clientcountries'] = $countries;

if ($step == '2') {
	if (count( $result['approveremails'] )) {
		if (is_array( $result['displaydata'] )) {
			$additionalData = (true ? $result['displaydata'] : array(  ));
			$smartyvalues['displaydata'] = $additionalData;
			$smartyvalues['approveremails'] = $result['approveremails'];
			$templatefile = 'configuressl-steptwo';
			jmp;
			eaaadiagec::set( 'sslNoApproverEmails', 1 );
			redir(  . 'cert=' . $cert . '&step=3' );

			if ($step == '3') {
				$templatefile = 'configuressl-complete';
			}
		}
	}
}

( 'displayData', $additionalData );
Menu::addContext( 'orderStatus', $status );
Menu::addContext( 'step', $step );
Menu::primarySidebar( 'sslCertificateOrderView' );
Menu::secondarySidebar( 'sslCertificateOrderView' );
outputClientArea( $templatefile, false, array( 'ClientAreaPageConfigureSSL' ) );
?>
