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

function saveQuote($id, $subject, $stage, $datecreated, $validuntil, $clienttype, $userid, $firstname, $lastname, $companyname, $email, $address1, $address2, $city, $state, $postcode, $country, $phonenumber, $currency, $lineitems, $proposal, $customernotes, $adminnotes, $updatepriceonly = '') {
	global $CONFIG;

	if (!$id) {
		insert_query( 'tblquotes', array( 'subject' => $subject, 'stage' => $stage, 'datecreated' => toMySQLDate( $datecreated ), 'validuntil' => toMySQLDate( $validuntil ), 'lastmodified' => 'now()' ) );
		$id = ;
		run_hook( 'QuoteCreated', array( 'quoteid' => $id, 'status' => $stage ) );
	}


	while (true) {
		(  * ( 1 -  ), 2 );
		$lineitemamount = ;
		$subtotal += $clientsdetails;

		if ($line_taxable) {
			$taxableamount += $clientsdetails;
			break;
		}
	}


	if (0 < $taxlevel1['rate']) {
		if ($CONFIG['TaxType'] == 'Inclusive') {
			format_as_currency;
			$taxableamount / ( 100 + $taxlevel1['rate'] ) * $taxlevel1['rate'];
		}

		(  );
		$tax1 = ;
		jmp;
		format_as_currency( $taxableamount * ( $taxlevel1['rate'] / 100 ) );
		$tax1 = ;

		if (0 < $taxlevel2['rate']) {
			if ($CONFIG['TaxType'] == 'Inclusive') {
				format_as_currency;
			}
		}

		( $taxableamount / ( 100 + $taxlevel2['rate'] ) * $taxlevel2['rate'] );
		$tax2 = ;
		jmp;

		if ($CONFIG['TaxL2Compound']) {
			format_as_currency( ( $taxableamount + $tax1 ) * ( $taxlevel2['rate'] / 100 ) );
			$tax2 = ;
			jmp;
			format_as_currency( $taxableamount * ( $taxlevel2['rate'] / 100 ) );
			$tax2 = ;

			if ($CONFIG['TaxType'] == 'Inclusive') {
				$total = $currency;
				$subtotal = $subtotal - $tax1 - $tax2;
			}

			array( 'validuntil' => toMySQLDate( $validuntil ), 'lastmodified' => 'now()', 'userid' => $userid, 'firstname' => $firstname, 'lastname' => $lastname );
		}

		array( 'companyname' => $companyname, 'email' => $email, 'address1' => $address1, 'address2' => $address2, 'city' => $city, 'state' => $state, 'postcode' => $postcode, 'country' => $country, 'phonenumber' => $phonenumber, 'currency' => $currency, 'subtotal' => $subtotal, 'tax1' => $tax1, 'tax2' => $tax2, 'total' => $total, 'proposal' => $proposal );
	}

	( array( 'customernotes' => $customernotes, 'adminnotes' => $adminnotes ), array( 'id' => $id ) );
	return $id;
}

function genQuotePDF($id) {
	global $whmcs;
	global $CONFIG;
	global $_LANG;
	global $currency;

	$CONFIG['CompanyName'];
	$companyname = ;
	$CONFIG['Domain'];
	$companyurl = ;
	$CONFIG['InvoicePayTo'];
	explode( '
', $companyaddress );
	$companyaddress = ;
	$quotenumber = $subject;
	select_query( 'tblquotes', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['subject'];
	$subject = ;
	$data['stage'];
	$stage = ;
	fromMySQLDate( $data['datecreated'] );
	$datecreated = ;
	fromMySQLDate( $data['validuntil'] );
	$validuntil = ;
	$data['userid'];
	$userid = ;

	if ($data['proposal']) {
		$proposal = (true ? $data['proposal'] . '
' : '');

		if ($data['customernotes']) {
			$notes = (true ? $data['customernotes'] . '
' : '');
			getCurrency( $userid, $data['currency'] );
			$currency = ;

			if ($userid) {
				getUsersLang( $userid );
				getQuoteStageLang( $stage );
				$stage = ;
				getClientsDetails( $userid );
				$clientsdetails = ;
				jmp;
				$clientsdetails['firstname'] = $data['firstname'];
				$clientsdetails['lastname'] = $data['lastname'];
				$clientsdetails['companyname'] = $data['companyname'];
				$clientsdetails['email'] = $data['email'];
				$clientsdetails['address1'] = $data['address1'];
				$clientsdetails['address2'] = $data['address2'];
				$clientsdetails['city'] = $data['city'];
				$clientsdetails['state'] = $data['state'];
				$clientsdetails['postcode'] = $data['postcode'];
				$clientsdetails['country'] = $data['country'];
				$clientsdetails['phonenumber'] = $data['phonenumber'];
				getTaxRate( 1, $clientsdetails['state'], $clientsdetails['country'] );
				$taxlevel1 = ;
				getTaxRate( 2, $clientsdetails['state'], $clientsdetails['country'] );
				$taxlevel2 = ;
				ROOTDIR . '/includes/countries.php';
			}
		}
	}

	require(  );
	$clientsdetails['country'] = $countries[$clientsdetails['country']];
	formatCurrency( $data['subtotal'] );
	$subtotal = ;
	formatCurrency( $data['tax1'] );
	$tax1 = ;
	formatCurrency( $data['tax2'] );
	$tax2 = ;
	formatCurrency( $data['total'] );
	$total = ;
	$lineitems = array(  );
	select_query( 'tblquoteitems', '', array( 'quoteid' => $id ), 'id', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$line_id = ;
		$data['description'];
		$line_desc = ;
		$data['quantity'];
		$line_qty = ;
		$data['unitprice'];
		$line_unitprice = ;
		$data['discount'];
		$line_discount = ;
		$data['taxable'];
		$line_taxable = ;
		format_as_currency( $line_qty * $line_unitprice * ( 1 - $line_discount / 100 ) );
		$line_total = ;
		$lineitems[] = array( 'id' => $line_id, 'description' => htmlspecialchars( dfdidhdbdc::decode( $line_desc ) ), 'qty' => $line_qty, 'unitprice' => $line_unitprice, 'discount' => $line_discount, 'taxable' => $line_taxable, 'total' => formatCurrency( $line_total ) );
	}

	jmp = $notes;
	$tplvars['taxlevel1'] = $taxlevel1;
	$tplvars['taxlevel2'] = $taxlevel2;
	$tplvars['subtotal'] = $subtotal;
	$tplvars['tax1'] = $tax1;
	$tplvars['tax2'] = $tax2;
	$tplvars['total'] = $total;
	dfdidhdbdc::decode( $tplvars );
	$tplvars = ;
	$tplvars['lineitems'] = $lineitems;
	$tplvars['pdfFont'] = chhgjaeced::getValue( 'TCPDFFont' );
	new cjceffhecg(  );
	$invoice = ;
	$invoice->pdfCreate( $_LANG['quotenumber'] . $id );
	$invoice->pdfAddPage( 'quotepdf.tpl', $tplvars );
	$invoice->pdfOutput(  );
	$pdfdata = $companyaddress = ;
	return $pdfdata;
}

function sendQuotePDF($id) {
	global $CONFIG;
	global $_LANG;
	global $currency;

	select_query( 'tblquotes', '', array( 'id' => $id ) );
	mysql_fetch_array( $result );
	$data = ;
	$data['subject'];
	$subject = ;
	$data['stage'];
	$stage = ;
	fromMySQLDate( $data['datecreated'] );
	$datecreated = ;
	fromMySQLDate( $data['validuntil'] );
	$validuntil = ;
	$data['userid'];
	$userid = ;
	$notes = $data['customernotes'] . '
';
	if ($userid) = ;
	$clientsdetails['email'] = $data['email'];
	$clientsdetails['address1'] = $data['address1'];
	$clientsdetails['address2'] = $data['address2'];
	$clientsdetails['city'] = $data['city'];
	$clientsdetails['state'] = $data['state'];
	$clientsdetails['postcode'] = $data['postcode'];
	$clientsdetails['country'] = $data['country'];
	$clientsdetails['phonenumber'] = $data['phonenumber'];
	genQuotePDF( $id );
	$pdfdata = ;

	if ($CONFIG['SystemSSLURL']) {
		$sysurl = (true ? $CONFIG['SystemSSLURL'] : $CONFIG['SystemURL']);
		$quote_link = '<a href="' . $sysurl . (  . '/viewquote.php?id=' . $id . '">' ) . $sysurl . (  . '/viewquote.php?id=' . $id . '</a>' );
		sendMessage;
		'Quote Delivery with PDF';
		1;
		array( 'emailquote' => true, 'quote_number' => $id, 'quote_subject' => $subject, 'quote_date_created' => $datecreated, 'quote_valid_until' => $validuntil, 'client_id' => $userid, 'client_first_name' => $clientsdetails['firstname'], 'client_last_name' => $clientsdetails['lastname'], 'client_company_name' => $clientsdetails['companyname'], 'client_email' => $clientsdetails['email'], 'client_address1' => $clientsdetails['address1'], 'client_address2' => $clientsdetails['address2'], 'client_city' => $clientsdetails['city'], 'client_state' => $clientsdetails['state'], 'client_postcode' => $clientsdetails['postcode'], 'client_country' => $clientsdetails['country'], 'client_phonenumber' => $clientsdetails['phonenumber'], 'client_language' => $clientsdetails['language'], 'quoteattachmentdata' => $pdfdata );
	}

	( array( 'quote_link' => $quote_link ) );
	$result = $result = ;

	if ($result === true) {
		update_query;
		'tblquotes';
	}

	( array( 'stage' => 'Delivered' ), array( 'id' => $id ) );
	return true;
}

function convertQuotetoInvoice($id, $invoicetype, $invoiceduedate, $depositpercent, $depositduedate, $finalduedate, $sendemail) {
	global $CONFIG;
	global $_LANG;

	select_query( 'tblquotes', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['userid'];
	$userid = ;
	$data['firstname'];
	$firstname = ;
	$data['lastname'];
	$lastname = ;
	$data['companyname'];
	$companyname = ;
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
	$data['currency'];
	$currency = ;

	if ($userid) {
		getUsersLang( $userid );
		getClientsDetails( $userid );
		$clientsdetails = ;
		$clientsdetails['state'];
		$state = ;
		$clientsdetails['country'];
		$country = ;
	}

	( ( , 0, 10 ), 0, '', 'on' );
	$userid = ;

	if ($CONFIG['TaxEnabled'] == 'on') {
		getTaxRate( 1, $state, $country );
		$taxlevel1 = ;
		getTaxRate( 2, $state, $country );
		$taxlevel2 = ;
		$taxlevel1['rate'];
		$taxrate = ;
		$taxlevel2['rate'];
		$taxrate2 = ;
		$data['subtotal'];
		$subtotal = ;
		$data['tax1'];
		$tax1 = ;
		$data['tax2'];
		$tax2 = ;
		$data['total'];
		$total = ;
		select_query( 'tblpaymentgateways', 'gateway', array( 'setting' => 'name' ), 'order', 'ASC' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['gateway'];
		$gateway = ;
		$finaldate = '';
		$duedate = ;

		if ($invoicetype == 'deposit') {
			if ($depositduedate) {
				toMySQLDate( $depositduedate );
				$duedate = ;

				if ($finalduedate) {
					$finaldate = (true ? toMySQLDate( $finalduedate ) : date( 'Y-m-d' ));
					jmp;

					if ($invoiceduedate) {
						toMySQLDate( $invoiceduedate );
						$duedate = ;

						if (!$duedate) {
							date( 'Y-m-d' );
							$duedate = ;
							insert_query;
							'tblinvoices';
							array( 'date' => 'now()', 'duedate' => $duedate, 'userid' => $userid, 'status' => 'Unpaid', 'paymentmethod' => $gateway, 'taxrate' => $taxrate, 'taxrate2' => $taxrate2 );
						}
					}

					( array( 'subtotal' => $subtotal, 'tax' => $tax1, 'tax2' => $tax2, 'total' => $total, 'notes' => $_LANG['quoteref'] . $id ) );
					$invoiceid = ;

					if ($finaldate) {
						insert_query( 'tblinvoices', array( 'date' => 'now()', 'duedate' => $finaldate, 'userid' => $userid, 'status' => 'Unpaid', 'paymentmethod' => $gateway, 'taxrate' => $taxrate, 'taxrate2' => $taxrate2, 'subtotal' => $subtotal, 'tax' => $tax1, 'tax2' => $tax2, 'total' => $total, 'notes' => $_LANG['quoteref'] . $id ) );
						$finalinvoiceid = ;
						select_query( 'tblquoteitems', '', array( 'quoteid' => $id ), 'id', 'ASC' );
						$result = ;
						mysql_fetch_array( $result );

						if ($data = ) {
							$data['id'];
							$line_id = ;
							$data['description'];
							$line_desc = ;
							$data['quantity'];
							$line_qty = ;
							$data['unitprice'];
							$line_unitprice = ;
							$data['discount'];
							$line_discount = ;
							$data['taxable'];
							$line_taxable = ;
							format_as_currency( $line_qty * $line_unitprice * ( 1 - $line_discount / 100 ) );
							$line_total = ;
								. $line_qty . ' x ' . $line_desc;
						}
					}
				}
			}
		}
	}

	$lineitemdesc =  . ' @ ' . $line_unitprice;

	if (0 < $line_discount) {
		$lineitemdesc .= ' - ' . $line_discount . '% ' . $_LANG['orderdiscount'];

		if ($finalinvoiceid) {
			$originalamount = $data;
			$line_total = $originalamount * ( $depositpercent / 100 );
			$final_amount = $originalamount - $line_total;
			insert_query( 'tblinvoiceitems', array( 'invoiceid' => $finalinvoiceid, 'userid' => $userid, 'description' => $lineitemdesc . ' (' . ( 100 - $depositpercent ) . '% ' . $_LANG['quotefinalpayment'] . ')', 'amount' => $final_amount, 'taxed' => $line_taxable ) );
			$lineitemdesc .= ' (' . $depositpercent . '% ' . $_LANG['quotedeposit'] . ')';
			insert_query( 'tblinvoiceitems', array( 'invoiceid' => $invoiceid, 'userid' => $userid, 'description' => $lineitemdesc, 'amount' => $line_total, 'taxed' => $line_taxable ) );
		}

		jmp;
		(  );

		if (defined( 'APICALL' )) {
			$source = 'api';
			eaaadiagec::get( 'adminid' );
			$user = ;
			jmp;

			if (defined( 'ADMINAREA' )) {
				$source = 'adminarea';
				eaaadiagec::get( 'adminid' );
				$user = ;
			}
		}

		( $finalinvoiceid );
		cjceffhecg::saveClientSnapshotData( $finalinvoiceid );
		run_hook( 'InvoiceCreated', $invoiceArr );
		chhjeidgjf::adjustIncrementForNextInvoice( $invoiceid );
		update_query( 'tblquotes', array( 'userid' => $userid, 'stage' => 'Accepted' ), array( 'id' => $id ) );
	}

	return $invoiceid;
}

function getQuoteStageLang($stage) {
	global $_LANG;

	$_LANG['quotestage' . strtolower( str_replace( ' ', '', $stage ) )];
	$translation = ;

	if (!$translation) {
	}

	$translation = $translation;
	return $translation;
}

?>
