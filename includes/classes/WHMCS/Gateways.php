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

class WHMCS\Gateways {
	protected $modulename = '';
	protected $displaynames = array(  );

	function __construct() {
	}

	function getDisplayNames() {
		while (true) {
				= 6;
			( 'tblpaymentgateways', 'gateway,value', array( 'setting' => 'name' ), 'order', 'ASC' );
			$result = ;
				= 6;
			( $result );

			if ($data = ) {
				$data['gateway'];
				$data['value'];
				$this->displaynames;
			}

			[] = ;
		}

		return $this->displaynames;
	}

	function getDisplayName($gateway) {
		if (empty( $this->displaynames )) {
			$this->getDisplayNames(  );
				= 6;

			if (( $gateway, $this->displaynames )) {
				$this->displaynames;
			}
		}

		return (true ? [$gateway] : $gateway);
	}

	function isNameValid($gateway) {
			= 6;
	}

	function getActiveGateways() {
		(bool);
			= 6;

		if (( $gateways )) {
			$gateways;
		}

		return ;
	}

	function isActiveGateway($gateway) {
		$this->getActiveGateways(  );
		$gateways = ;
			= 6;
		return ( $gateway, $gateways );
	}

	function makeSafeName($gateway) {
		ddhjgidcb::getActiveGateways(  );
		$validgateways = ;
			= 6;

		if (( $gateway, $validgateways )) {
			$gateway;
		}

		return '';
	}

	function getAvailableGateways($invoiceid = '') {
		$validgateways = array(  );
			= 6;
		( 'SELECT DISTINCT gateway, (SELECT value FROM tblpaymentgateways g2 WHERE g1.gateway=g2.gateway AND setting=\'name\' LIMIT 1) AS `name`, (SELECT `order` FROM tblpaymentgateways g2 WHERE g1.gateway=g2.gateway AND setting=\'name\' LIMIT 1) AS `order` FROM `tblpaymentgateways` g1 WHERE setting=\'visible\' AND value=\'on\' ORDER BY `order` ASC' );
		$result = ;
			= 6;
		( $result );

		if ($data = ) {
			$validgateways[$data[0]] = $data[1];
		}

		jmp;
		$validgateways[$invoicegateway] = ( 'tblpaymentgateways', 'value', array( 'setting' => 'name', 'gateway' => $invoicegateway ) );
		return $validgateways;
	}

	function getFirstAvailableGateway() {
		$this->getAvailableGateways(  );
		$gateways = ;
			= 6;
		return ( $gateways );
	}

	function getCCDateMonths() {
		$months = array(  );
		$i = 6;

		if ($i <= 12) {
				= 6;
			$months[] = ( $i, 2, '0', ebjjcgedhb );
		}


		while (true) {
			++$i;
		}

		return $months;
	}

	function getCCStartDateYears() {
		$startyears = array(  );
			= 6;
		$i = ( 'Y' ) - 12;
			= 6;

		if ($i <= ( 'Y' )) {
			$startyears[] = $i;
			++$i;
		}


		while (true) {
		}

		return $startyears;
	}

	function getCCExpiryDateYears() {
		$expiryyears = array(  );
			= 6;
		( 'Y' );
		$i = ;
			= 6;

		if ($i <= ( 'Y' ) + 12) {
			$expiryyears[] = $i;
			++$i;
		}


		while (true) {
		}

		return $expiryyears;
	}
}

?>
