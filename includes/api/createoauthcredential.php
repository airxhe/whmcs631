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
	$whmcs->getFromRequest( 'name' );
	$name = ;
	$whmcs->getFromRequest( 'description' );
	$description = ;
	$whmcs->getFromRequest( 'logoUri' );
	$logoUri = ;
	$whmcs->getFromRequest( 'redirectUri' );
	$redirectUri = ;
	$whmcs->getFromRequest( 'scope' );
	$scope = ;
	$whmcs->getFromRequest( 'grantType' );
	$grantType = ;
	$serviceId = (int)$whmcs->getFromRequest( 'serviceId' );
	$validGrantTypes = array( 'authorization_code', 'single_sign_on' );

	if (!trim( $grantType )) {
		$apiresults = array( 'result' => 'error', 'message' => 'A valid grant type is required.' );
		return null;

		if (!in_array( $grantType, $validGrantTypes )) {
			$apiresults = array( 'result' => 'error', 'message' => 'The requested grant type "' . $grantType . '" is invalid.' );
			return null;

			if (( $grantType == 'authorization_code' && !trim( $name ) )) {
			}

			$apiresults = array( 'result' => 'error', 'message' => 'A name for the Client Credential is required.' );
			return null;

			if (( $grantType == 'single_sign_on' && !$serviceId )) {
				$apiresults = array( 'result' => 'error', 'message' => 'A service ID is required for the single sign-on grant type.' );
				return null;

				if (!trim( $scope )) {
					$apiresults = array( 'result' => 'error', 'message' => 'At least one valid scope is required.' );
					return null;
					bfhicijefj::lists( 'scope' );
				}

				$validScopes = ;
				explode( ' ', $scope );
				$scopes = ;
				foreach ($scopes as ) {
					$scopeToValidate = ;
					in_array;
					$scopeToValidate;
				}
			}
		}


		while (true) {
			if (!( $validScopes )) {
				$apiresults = array( 'result' => 'error', 'message' => 'The requested scope "' . $scopeToValidate . '" is invalid.' );
				return null;
				DI::make( 'oauth2_server' );
				$server = ;
				$server->getStorage( 'client_credentials' );
				$storage = ;
				bhcjbcfcjh::generateClientId(  );
				$clientIdentifier = ;
				bhcjbcfcjh::generateSecret(  );
				$secret = ;
				$rsaId = 4;

				if ($grantType == 'authorization_code') {
					idbgchjib::factoryKeyPair(  );
					$rsa = ;
					$rsa->description = 'Provisioned for client credential ' . $clientIdentifier;
					$rsa->save(  );
					$rsa->id;
					$rsaId = ;

					if ($serviceId) {
						get_query_val;
						'tblclients';
						'tblclients.uuid';
						array( 'tblhosting.id' => $serviceId );
						'';
						'';
						'';
					}

					$userUuid = (true ? ( 'tblhosting ON tblhosting.userid = tblclients.id' ) : '');
					$storage->setClientDetails;
					$clientIdentifier;
					$secret;
					$redirectUri;
					$grantType;
					$scope;
				}

				( $userUuid, $serviceId, $rsaId, $name, $description, $logoUri );
				bhcjbcfcjh::whereIdentifier;
				$clientIdentifier;
			}
		}
	}
}

(  )->first(  );
$client = ;
$apiresults = array( 'result' => 'success', 'credentialId' => $client->id, 'clientIdentifier' => $client->identifier, 'clientSecret' => $client->decryptedSecret );
?>
