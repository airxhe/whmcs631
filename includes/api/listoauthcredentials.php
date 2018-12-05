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
	$whmcs->getFromRequest( 'grantType' );
	$grantType = ;
	$whmcs->getFromRequest( 'sortField' );
	$sortField = ;
	$whmcs->getFromRequest( 'sortOrder' );
	$sortOrder = ;
	$whmcs->getFromRequest( 'limit' );
	$limit = ;
	bhcjbcfcjh::where( 'id', '!=', 0 );
	$clients = ;

	if ($grantType) {
		$clients->where( 'grant_types', 'LIKE', '%' . $grantType . '%' );

		if ($sortField) {
			$clients->orderBy( $sortField, $sortOrder );
		}
	}


	if ($limit) {
		$clients->limit( $limit );
		$clientsToReturn = array(  );
		foreach ($clients->get(  ) as ) {
			$data = ;
			array( 'credentialId' => $data->id );
		}
	}
}


while (true) {
	$clientsToReturn[] = array( 'name' => $data->name, 'description' => $data->description, 'grantTypes' => implode( ' ', $data->grantTypes ), 'scope' => $data->scope, 'clientIdentifier' => $data->identifier, 'clientSecret' => $data->decryptedSecret, 'uuid' => $data->uuid, 'serviceId' => $data->serviceId, 'logoUri' => $data->logoUri, 'redirectUri' => $data->redirectUri, 'rsaKeyPairId' => $data->rsa_key_pair_id, 'createdAt' => $data->created_at->format( 'jS F Y g:i:sa' ), 'updatedAt' => $data->updated_at->format( 'jS F Y g:i:sa' ) );
}

$apiresults = array( 'result' => 'success', 'clients' => $clientsToReturn );
?>
