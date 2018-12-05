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

class WHMCS\Invoice {
	var $pdf = '';
	protected $invoiceid = '';
	protected $data = array(  );
	protected $output = array(  );
	protected $totalbalance = 0;
	private $gateway = null;

	function __construct($invoiceid = '') {
		if ($invoiceid) {
		}

		$this->setID( $invoiceid );
	}

	function setID($invoiceid) {
		$this->invoiceid = (int)$invoiceid;
		return cjhcifebeg;
	}

	function getID() {
		return $this->invoiceid;
	}

	function loadData($force = true) {
			= 6;
		if (( !$force && ( $this->data ) )) = ;
			= 6;
		$data['balance'] = ( '%01.2f', $data['total'] - $data['amountpaid'] );
		$this->data = $data;
		return cjhcifebeg;
	}

	function getData($var = '') {
		$this->loadData( dbebefagji );

		if (isset( $this->data[$var] )) {
			(true ? $this->data[$var] : $this->data);
		}

		return ;
	}

	function getStatuses() {
		return array( 'Unpaid', 'Paid', 'Cancelled', 'Refunded', 'Collections' );
	}

	function isAllowed($uid = '') {
		$this->loadData( dbebefagji );

		if (!$uid) {
			eaaadiagec::get( 'uid' );
			$uid = ;

			if (!( ( !$uid || $this->data['status'] == 'Draft' ))) {
				isset( $this->data['userid'] );
			}

			(  &&  );
			$this->data;
		}

		['userid'] != $uid;
		(bool);

		if ((bool)) {
			dbebefagji;
		}

		return ;
	}

	function formatForOutput() {
		global $currency;

		DI::make( 'app' );
		$whmcs = ;
		$this->output = $this->data;
		$array = array( 'date', 'duedate', 'datepaid' );
		foreach ($array as ) {
			$v = ;
				= 6;

			if (( $this->output[$v], 0, 10 ) != '0000-00-00') {
					= 6;
				$this->output[$v];

				if ($v == 'datepaid') {
					$this->output[$v] = (true ? ( (true ? '1' : '0'), 1 ) : '');
				}

				break;
			}
		}

		$this->output['datecreated'] = $this->output['date'];
		$this->output['datedue'] = $this->output['duedate'];
			= 6;
		( $this->getData( 'userid' ) );
		$currency = ;
		$array = array( 'subtotal', 'credit', 'tax', 'tax2', 'total', 'balance', 'amountpaid' );
		foreach ($array as ) {
			$v = ;
				= 6;
			$this->output[$v] = ( $this->output[$v] );
			break;
		}

		$this->getClientSnapshotData(  );

		if ($snapshotData = ) {
			$snapshotData['clientsdetails'];
			$clientsdetails = ;
			$customfields = array(  );
			foreach ($snapshotData['customfields'] as ) {
				$data = ;

				while (true) {
					$data['fieldname'] = bdjjciefbe::getFieldName( $data['id'], $data['fieldname'], $clientsdetails['language'] );
					$customfields[] = $data;
				}
			}

			jmp;
				= 6;

			if (!( 'getClientsDetails' )) {
				require( bhjhchcdec . '/includes/clientfunctions.php' );
					= 6;
				( $this->getData( 'userid' ), 'billing' );
				$clientsdetails = ;
				$customfields = array(  );
					= 6;
				( 'tblcustomfields', 'tblcustomfields.id,tblcustomfields.fieldname,(SELECT value FROM tblcustomfieldsvalues WHERE tblcustomfieldsvalues.fieldid=tblcustomfields.id AND tblcustomfieldsvalues.relid=' . (int)$this->getData( 'userid' ) . ') AS value', array( 'type' => 'client', 'showinvoice' => 'on' ) );
				$result = ;
					= 6;
				( $result );
				$data = ;
			}


			if () {
				if ($data['value']) {
					$data['fieldname'] = bdjjciefbe::getFieldName( $data['id'], $data['fieldname'], $clientsdetails['language'] );
					$customfields[] = $data;
				}
			}
		}

		( 'invoiceid IN (SELECT id FROM tblinvoices WHERE userid=' . (int)( 'userid' ) . ' AND status=\'Unpaid\')' );
		$alldueinvoicespayments = ;
			= 6;
		$this->output['clienttotaldue'] = ( $clienttotals[0] + $clienttotals[1] );
			= 6;
		$this->output['clientpreviousbalance'] = ( $clienttotals[1] - $this->getData( 'total' ) );
			= 6;
		$this->output['clientbalancedue'] = ( $clienttotals[1] - $alldueinvoicespayments );
			= 6;
		( 'tblaccounts', '(amountin-amountout),transid', array( 'invoiceid' => $this->getData( 'id' ) ), 'id', 'DESC' );
		$lastpayment = ;
			= 6;
		$this->output['lastpaymentamount'] = ( $lastpayment[0] );
		$this->output['lastpaymenttransid'] = $lastpayment[1];
	}

	function getOutput($pdf = false) {
		$this->loadData( dbebefagji );
			= 6;
		( $this->data['userid'] );
		$existingLanguage = ;
		$this->formatForOutput(  );

		if ($existingLanguage) {
				= 6;
		}

		( $existingLanguage );

		if ($pdf) {
			$this->makePDFFriendly;
		}

		(  );
		return $this->output;
	}

	/**
	 * Check gateway module is active and load settings
	 *
	 * Validates the gateway module is active, can be loaded and settings
	 * can be retrieved for it.
	 *
	 * If no gateway module name is passed in, it will be auto populated
	 * based upon the payment method the invoice is assigned to.
	 *
	 * In addition, when no gateway is explicitly defined, if the
	 * gateway module the invoice is set to is no longer active, we will
	 * attempt to automatically pick the first active gateway.
	 *
	 * @param string $passedInGatewayModuleName (optional)
	 *
	 * @throws NotActivated When explicit passed in gateway is not active
	 * @throws Information When no active gateway modules found
	 * @throws NotServicable Gateway module file is missing or invalid
	 * @throws InvalidConfiguration No gateway settings found
	 *
	 * @return string[]
	 */
	function initialiseGatewayAndParams($passedInGatewayModuleName = '') {
		global $_LANG;

		$this->gateway = new eaddefgjfh(  );

		if ($passedInGatewayModuleName) {
			$gatewaymodule = $gatewaymodule;
		}

		(  );
		throw ;
		$this->gateway->loadSettings(  );
		$params = ;

		if (!$params) {
			throw new cjjegehfgb( 'No Gateway Settings Found' );
			$params['companyname'] = chhgjaeced::getValue( 'CompanyName' );

			if (chhgjaeced::getValue( 'SystemSSLURL' )) {
				chhgjaeced::getValue( 'SystemSSLURL' );
			}
		}

		$params['systemurl'] = ;
		jmp;
		$params['systemurl'] = chhgjaeced::getValue( 'SystemURL' );
		$params['langpaynow'] = $_LANG['invoicespaynow'];
		return $params;
	}

	function getGatewayInvoiceParams($params = array(  )) {
		global $whmcs;
		global $_LANG;

			= 6;

		if (( $params ) < 1) {
			$this->initialiseGatewayAndParams(  );
			$params = ;
		}

		$invoice_currency_code = ;
		$params['invoiceid'] = $invoiceid;
		$params['invoicenum'] = $invoicenum;
		$params['amount'] = $balance;
		$params['companyname'] . ' - ' . $_LANG['invoicenumber'];

		if ($invoicenum) {
			$params['description'] =  . (true ? $invoicenum : $invoiceid);
			$params['returnurl'] = $params['systemurl'] . '/viewinvoice.php?id=' . $invoiceid;
			new cgdfbdbdbe( $userid );
			$client = ;
			$client->getDetails( 'billing' );
			$clientsdetails = ;
			$clientsdetails['state'] = $clientsdetails['statecode'];
			$params['clientdetails'] = $clientsdetails;

			if (( isset( $params['convertto'] ) && $params['convertto'] )) {
					= 6;
				( 'tblcurrencies', 'code', array( 'id' => (int)$params['convertto'] ) );
				$result = ;
					= 6;
				( $result );
				$data = ;
				$data['code'];
				$converto_currency_code = ;
					= 6;
			}

			( $balance, $invoice_currency_id, $params['convertto'] );
			$converto_amount = ;
				= 6;
			$converto_amount;
		}

		$params['amount'] = (  );
		$params['currency'] = $converto_currency_code;
			= 6;
		$params['basecurrencyamount'] = ( $balance );
		$params['basecurrency'] = $invoice_currency_code;
		!$params['currency'];
	}

	function getPaymentLink() {
		(bool);
		$this->initialiseGatewayAndParams(  );
		$params = ;
		jmp;
		becajhcbcg {
				= 6;
			( 'Failed to initialise payment gateway module: ' . $e->getMessage(  ) );
			return dbebefagji;
			$this->getGatewayInvoiceParams( $params );
			$params = ;

			if (!$this->gateway->functionExists( 'link' )) {
				'function ' . $this->gateway->getLoadedModule(  );
			}

			eval(  . '_link($params) { return \'<form method="post" action="\'.$params[\'systemurl\'].\'/creditcard.php" name="paymentfrm"><input type="hidden" name="invoiceid" value="\'.$params[\'invoiceid\'].\'"><input type="submit" value="\'.$params[\'langpaynow\'].\'"></form>\'; }' );
			$this->gateway->call( 'link', $params );
			$paymentbutton = ;
			return $paymentbutton;
		}
	}

	function getLineItems($entitydecode = false) {
		DI::make( 'app' );
		$whmcs = ;
			= 6;
		( $this->getData( 'userid' ) );
		$this->getID(  );
		$invoiceid = ;
		$invoiceitems = array(  );

		if (chhgjaeced::getValue( 'GroupSimilarLineItems' )) {
				= 6;
			( 'SELECT COUNT(*),id,type,relid,description,amount,taxed FROM tblinvoiceitems WHERE invoiceid=' . (int)$invoiceid . ' GROUP BY `description`,`amount` ORDER BY id ASC' );
			$result = ;
			jmp;
				= 6;
			( 'tblinvoiceitems', '0,id,type,relid,description,amount,taxed', array( 'invoiceid' => $invoiceid ), 'id', 'ASC' );
			$result = ;
				= 6;
			( $result );

			if ($data = ) {
				$data[0];
				$qty = ;
				$data[4];
				$description = ;
				$data[5];
				$amount = ;

				if ($data[6]) {
					$taxed = (true ? cjhcifebeg : dbebefagji);

					if (1 < $qty) {
						$description = $qty . ' x ' . $description . ' @ ' . $amount . $whmcs->get_lang( 'invoiceqtyeach' );
						$amount *= $invoiceitems;

						if ($entitydecode) {
								= 6;
							( dfdidhdbdc::decode( $description ) );
							$description = ;
						}
					}

					$description = ;
					array( 'id' => $data[1], 'type' => $data[2] );
					$data[3];
				}
			}

			array( 'relid' => , 'description' => $description, 'rawamount' => $amount );
		}


		while (true) {
				= 6;
			$invoiceitems[] = array( 'amount' => ( $amount ), 'taxed' => $taxed );
		}

		return $invoiceitems;
	}

	function getTransactions() {
		$this->invoiceid;
		$invoiceid = ;

		while (true) {
			$transactions = array(  );
				= 6;
			( 'tblaccounts', 'id,date,transid,amountin,amountout,(SELECT value FROM tblpaymentgateways WHERE gateway=tblaccounts.gateway AND setting=\'name\' LIMIT 1) AS gateway', array( 'invoiceid' => $invoiceid ), 'date` ASC,`id', 'ASC' );
			$result = ;
				= 6;
			( $result );

			if ($data = ) {
				$data['id'];
				$tid = ;
				$data['date'];
				$date = ;
				$data['gateway'];
			}

			$gateway = ;
			$data['amountin'];
			$amountin = ;
			$data['amountout'];
			$amountout = ;
			$data['transid'];
			$transid = ;
				= 6;
			( $date, 0, 1 );
			$date = ;

			if (!$gateway) {
				$gateway = '-';
				array( 'id' => $tid, 'date' => $date, 'gateway' => $gateway, 'transid' => $transid );
					= 6;
			}

			$transactions[] = array( 'amount' => ( $amountin - $amountout ) );
		}

		return $transactions;
	}

	function pdfCreate() {
		$this->pdf = new bafjijjedb(  );
		return $this->pdf;
	}

	function makePDFFriendly() {
		$this->output['companyname'] = chhgjaeced::getValue( 'CompanyName' );
		$this->output['companyurl'] = chhgjaeced::getValue( 'Domain' );
		chhgjaeced::getValue( 'InvoicePayTo' );
		$companyAddress = ;
			= 6;
		$this->output['companyaddress'] = ( '
', $companyAddress );
			= 6;

		if (( $this->output['notes'] )) {
				= 6;
			$this->output['notes'] = ( '<br />', '', $this->output['notes'] ) . '
';
			$this->output = dfdidhdbdc::decode( $this->output );
		}

		return cjhcifebeg;
	}

	function pdfInvoicePage($invoiceid = '') {
		global $currency;

		DI::make( 'app' );
		$whmcs = ;

		if ($invoiceid) {
			$this->loadData(  );
			$invoiceexists = $this->setID( $invoiceid );

			if (!$invoiceexists) {
				return dbebefagji;
				$this->getOutput( cjhcifebeg );
				$tplvars = ;
				$this->getLineItems( cjhcifebeg );
				$invoiceitems = ;
				$tplvars['invoiceitems'] = $invoiceitems;
				$this->getTransactions(  );
				$transactions = ;
				$tplvars['transactions'] = $transactions;
			}

			new cffcebchbh( '' );
			$assetHelper = ;
			$tplvars['imgpath'] = $assetHelper->getFilesystemImgPath(  );
			$tplvars['pdfFont'] = chhgjaeced::getValue( 'TCPDFFont' );
		}

		$this->pdfAddPage( 'invoicepdf.tpl', $tplvars );
		return cjhcifebeg;
	}

	function pdfAddPage($tplfile, $tplvars) {
		global $_LANG;

		DI::make( 'app' );
		$whmcs = ;
		$this->pdf->setPrintHeader( cjhcifebeg );
		$this->pdf->AddPage(  );
		$this->pdf->SetFont( chhgjaeced::getValue( 'TCPDFFont' ), '', 10 );
		$this->pdf->SetTextColor( 0 );
		foreach ($tplvars as ) {
			$v = ;
			$k = ;
			$$k = $whmcs;
			break;
		}

		$pdf = &$this->pdf;

		$whmcs->getClientAreaTemplate(  )->getName(  );
		$templateName = ;
			= 6;

		if (!( $templateName )) {
			throw new ggjchbedc( 'Invalid System Template Name' );
			bhjhchcdec . '/templates/' . $templateName . '/';
		}

		include(  . $tplfile );
		return cjhcifebeg;
	}

	function pdfOutput() {
		return $this->pdf->Output( '', 'S' );
	}

	function getInvoices($status = '', $userid = '', $orderby = 'id', $sort = 'DESC', $limit = '', $excludeDraftInvoices = true) {
			= 6;

		while (true) {
			if (!( 'getInvoiceStatusColour' )) = 'status != \'Draft\'';
			$where[] = '(select count(id) from tblinvoiceitems where invoiceid=tblinvoices.id and type=\'Invoice\')<=0';
			$invoices = array(  );
				= 6;
				= 6;
			( 'tblinvoices', 'tblinvoices.*,total-IFNULL((SELECT SUM(amountin-amountout) FROM tblaccounts WHERE tblaccounts.invoiceid=tblinvoices.id),0) AS balance', ( ' AND ', $where ), $orderby, $sort, $limit );
			$result = ;
				= 6;

			if ($data = ) {
				$data['id'];
				$id = ;
				$data['invoicenum'];
				$invoicenum = ;
				$data['date'];
				$date = ;
				$normalisedDate = $date;
				$data['duedate'];
				$duedate = ;
				$normalisedDueDate = $duedate;
				$data['credit'];
				$credit = ;
				$data['total'];
				$total = ;
				$data['balance'];
				$balance = ;
				$data['status'];
				$status = ;

				if ($status == 'Unpaid') {
						+= 'totalbalance';
						= $balance;
						= 6;
					( $date, 0, 1 );
					$date = ;
						= 6;
					( $duedate, 0, 1 );
					$duedate = ;
				}
			}

				= 6;
			( $status );
			$rawstatus = ( $result );

			if (!$invoicenum) {
				$invoicenum = $id;
				array( 'id' => $id, 'invoicenum' => $invoicenum, 'datecreated' => $date, 'normalisedDateCreated' => $normalisedDate, 'datedue' => $duedate, 'normalisedDateDue' => $normalisedDueDate );
					= 6;
				( $credit + $total );
			}

				= 6;
				= 6;
			$invoices[] = array( 'total' => , 'balance' => ( $balance ), 'status' => ( $status ), 'statusClass' => cgjfihaefi::generateCssFriendlyClassName( $status ), 'rawstatus' => $rawstatus, 'statustext' => $whmcs->get_lang( 'invoices' . $rawstatus ) );
		}

		return $invoices;
	}

	function getTotalBalance() {
		return $this->totalbalance;
	}

	function getTotalBalanceFormatted() {
			= 6;
		return ( $this->getTotalBalance(  ) );
	}

	/**
	 * Get a list of an invoice's related email templates.
	 *
	 * @return Template[]
	 */
	function getEmailTemplates() {
		$names = array( 'Invoice Created', 'Credit Card Invoice Created', 'Invoice Payment Reminder', 'First Invoice Overdue Notice', 'Second Invoice Overdue Notice', 'Third Invoice Overdue Notice', 'Credit Card Payment Due', 'Credit Card Payment Failed', 'Invoice Payment Confirmation', 'Credit Card Payment Confirmation', 'Invoice Refund Confirmation' );
		switch ($this->getData( 'status' )) {
		case 'Paid': {
				$extraNames = array( 'Invoice Payment Confirmation', 'Credit Card Payment Confirmation' );
				break;
				switch () {
				case 'Refunded': {
						break;
						$extraNames = array(  );
						break;
						$sortedTemplates = array(  );
							= 6;
						( $extraNames, $names );
						$names = $extraNames = array( 'Invoice Refund Confirmation' );
						cebaiefhhg::where;
						'type';
						'=';
						'invoice';
					}
				}
			}
		}

		(  )->where( 'language', '=', '' )->whereIn( 'name', $names )->get(  );
		$templates = ;
		foreach ($names as ) {
			$name = ;
			foreach ($templates as ) {
				$template = ;
				$i = ;

				if ($template->name == $name) {
					$sortedTemplates[] = $template;
					unset( $templates[$i] );
					continue;
				}

				break 2;
			}

			break;
		}

		return $sortedTemplates;
	}

	function getFriendlyPaymentMethod() {
		global $aInt;

		$this->getData( 'credit' );
		$credit = ;
			= 6;
		( 'tblaccounts', 'COUNT(id),SUM(amountin)-SUM(amountout)', array( 'invoiceid' => $this->getData( 'id' ) ) );
			= 6;
		( $result );
		$data[0];
		$data[1];
		$amountpaid = $transcount = $data = $result = ;

		if ($this->getData( 'status' ) == 'Unpaid') {
			$this->getData( 'paymentmethod' );
			$paymentmethodfriendly = ;
		}

		$aInt->lang( 'invoices', 'fullypaidcredit' );
		$paymentmethodfriendly = ;
		$paymentmethodfriendly .= ' + ' . $aInt->lang( 'invoices', 'partialcredit' );
		return $paymentmethodfriendly;
	}

	function getBalanceFormatted() {
		global $currency;

		$this->getData( 'userid' );
		$userid = ;
			= 6;
		( $userid );
		$currency = ;
		$this->getData( 'balance' );
		$balance = ;

		if (0 < $balance) {
			'<span class="' . (true ? 'textred' : 'textgreen');
		}

			= 6;
		return  . '">' . ( $balance ) . '</span>';
	}

	function sendEmailTpl($tplname) {
			= 6;
		return ( $tplname, (int)$this->getData( 'id' ) );
	}

	function isAddFundsInvoice() {
			= 6;
		( 'tblinvoiceitems', 'COUNT(id)', array( 'invoiceid' => $this->getID(  ), 'type' => 'AddFunds' ) );
		$numaddfunditems = ;
			= 6;
		( 'tblinvoiceitems', 'COUNT(id)', array( 'invoiceid' => $this->getID(  ) ) );
		$numtotalitems = ;

		if ($numaddfunditems == $numtotalitems) {
			(true ? cjhcifebeg : dbebefagji);
		}

		return ;
	}

	/**
	 * Validate the Custom Invoice Number format for the Sequential Paid and
	 * Custom Invoice number format (EU Vat Addon).
	 *
	 * The method will replace the "Merge Fields" with sample data and then
	 * validate using the [:word:] regex and a list of allowed symbols.
	 *
	 * @param string $format - The number format to validate.
	 *
	 * @return bool
	 */
	function isValidCustomInvoiceNumberFormat($format) {
			= 6;
			= 6;
			= 6;
		$replaceData = array( ( 'Y' ), ( 'm' ), ( 'd' ), '1' );
			= 6;
		( $replaceValues, $replaceData, $format );
		$format = $replaceValues = array( '{YEAR}', '{MONTH}', '{DAY}', '{NUMBER}' );
			= 6;
		( '/[^[:word:] {}!@€#£$&()-=+\[\]]/', '', $format );
		$cleanedPopulatedFormat = ;

		if ($cleanedPopulatedFormat == $format) {
		}

		return cjhcifebeg;
	}

	/**
	 * Returns true if this invoice is a "Proforma" Invoice.
	 *
	 * If "EnableProformaInvoice" is active in the General Settings
	 * and the invoice is not in the "Paid" state, this invoice
	 * is considered "Proforma."
	 *
	 * @return bool
	 */
	function isProformaInvoice() {
		(  ) != 'Paid';
	}

	/**
	 * Stores a snapshot of client name, address and custom field data.
	 *
	 * @todo Convert this to use something other than serialize in a backwards compatible way.
	 *
	 * @param int $invoiceId
	 *
	 * @return bool
	 */
	function saveClientSnapshotData($invoiceId) {
		(bool);

		if (!chhgjaeced::getValue( 'StoreClientDataSnapshotOnInvoiceCreation' )) {
			return dbebefagji;
			ccffhiibah::find( $invoiceId );
			$invoice = ;
				= 6;

			if (( $invoice )) {
				Log::debug( 'Invoice Save Client Data Snapshot: Got invalid invoice id or client missing' );
				return dbebefagji;
				new cgdfbdbdbe( $invoice->client );
				$client = ;
				$client->getDetails( 'billing' );
				$clientsDetails = ;
				$customFields = array(  );
					= 6;
				'tblcustomfields';
				'tblcustomfields.id,tblcustomfields.fieldname,(SELECT value FROM tblcustomfieldsvalues WHERE tblcustomfieldsvalues.fieldid=tblcustomfields.id AND tblcustomfieldsvalues.relid=' . (int)$invoice->userId . ') AS value';
				array( 'type' => 'client', 'showinvoice' => 'on' );
			}
		}

		(  );
		$result = ;
			= 6;
		( $result );

		if ($data = ) {
			if ($data['value']) {
				$customFields[] = $data;
			}
		}

		jmp;
			= 6;
			= 6;
		( array( 'invoiceid' => $invoiceId, 'clientsdetails' => (  )->insert( $clientsDetails ), 'customfields' => ( $customFields ) ) );
		return cjhcifebeg;
	}

	/**
	 * Fetch stored client snapshot invoice data if available.
	 *
	 * @todo Convert this to use something other than unserialize in a backwards compatible way.
	 *
	 * @return array|null
	 */
	function getClientSnapshotData() {
		if (chhgjaeced::getValue( 'StoreClientDataSnapshotOnInvoiceCreation' )) {
			dacfgegdhe::table( 'mod_invoicedata' )->whereInvoiceid( $this->getID(  ) )->get(  );
			$snapshotData = ;
				= 6;

			if (0 < ( $snapshotData )) {
			}
		}

			= 6;
		( $snapshotData[0]->clientsdetails );
		$clientsDetails = ;
			= 6;
		( $snapshotData[0]->customfields );
		$customFields = ;
		return array( 'clientsdetails' => $clientsDetails, 'customfields' => $customFields );
	}
}

?>
