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

class WHMCS\Order {
	protected $orderid = '';
	protected $data = array(  );

	function __construct() {
	}

	function setID($orderid) {
		$this->orderid = (int)$orderid;
		return $this->loadData(  );
	}

	function loadData() {
			= 6;
		$result = ( 'tblorders', 'tblorders.*,tblclients.firstname,tblclients.lastname,tblclients.email,tblclients.companyname,tblclients.address1,tblclients.address2,tblclients.city,tblclients.state,tblclients.postcode,tblclients.country,tblclients.groupid,(SELECT status FROM tblinvoices WHERE id=tblorders.invoiceid) AS invoicestatus', array( 'tblorders.id' => $this->orderid ), '', '', '', 'tblclients ON tblclients.id=tblorders.userid' );
			= 6;
		$data = ( $result );

		if (!$data['id']) {
			dbebefagji;
		}

		return ;
	}

	function getData($var = '') {
			= 6;

		if (( $var, $this->data )) {
			$this->data[$var];
		}

		return '';
	}

	function createOrder($userid, $paymentmethod, $contactid = '') {
		global $whmcs;

			= 6;
		(  );
		$order_number = ;
			= 6;
		$this->orderid = ( 'tblorders', array( 'ordernum' => $order_number, 'userid' => $userid, 'contactid' => $contactid, 'date' => 'now()', 'status' => 'Pending', 'paymentmethod' => $paymentmethod, 'ipaddress' => caegadgihi::getIP(  ) ) );
			= 6;
		(  . 'New Order Created - Order ID: ' . $orderid . ' - User ID: ' . $userid );
		return $this->orderid;
	}

	function updateOrder($data) {
	}
}

?>
