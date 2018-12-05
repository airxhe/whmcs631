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

class WHMCS\Orders extends WHMCS\TableModel {
	protected $orderid = 0;
	protected $orderdata = null;
	protected $statusoutputs = null;

	function _execute($criteria = null) {
		return $this->getOrders( $criteria );
	}

	function getOrders($criteria = array(  )) {
		global $aInt;
		global $currency;

		$query = 'FROM tblorders INNER JOIN tblclients ON tblclients.id=tblorders.userid';

		if (!empty( $criteria['paymentstatus'] )) {
			$query .= ' INNER JOIN tblinvoices ON tblinvoices.id=tblorders.invoiceid';
			$this->buildCriteria( $criteria );
			$filters = ;
				= 6;

			if (( $filters )) {
					= 6;
				$query .= ' WHERE ' . ( ' AND ', $filters );
					= 6;
				( 'SELECT COUNT(tblorders.id) ' . $query );
				$result = ;
					= 6;
				( $result );
				$data = ;
				$this->getPageObj(  )->setNumResults( $data[0] );
				$query .= ' ORDER BY tblorders.' . $this->getPageObj(  )->getOrderBy(  ) . ' ' . $this->getPageObj(  )->getSortDirection(  );
				new ddhjgidcb(  );
				$gateways = ;
			}
		}

		new chhjeidgjf(  );
		$invoices = ;
		$orders = array(  );
		$query = 'SELECT tblorders.id,tblorders.ordernum,tblorders.userid,tblorders.date,tblorders.amount,tblorders.paymentmethod,tblorders.status,tblorders.invoiceid,tblorders.ipaddress,tblclients.firstname,tblclients.lastname,tblclients.companyname,tblclients.groupid,tblclients.currency,(SELECT status FROM tblinvoices WHERE id=tblorders.invoiceid) AS invoicestatus ' . $query . ' LIMIT ' . $this->getQueryLimit(  );
			= 6;
		( $query );
		$result = ;
			= 6;
		( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['ordernum'];
			$ordernum = ;
			$data['userid'];
			$userid = ;
			$data['date'];
			$date = ;
			$data['amount'];
			$amount = ;
			$data['paymentmethod'];
			$gateway = ;
			$data['status'];
			$status = ;
			$data['invoiceid'];
			$invoiceid = ;
			$data['firstname'];
			$firstname = ;
			$data['lastname'];
			$lastname = ;
			$data['companyname'];
			$companyname = ;
			$data['groupid'];
			$groupid = ;
			$data['currency'];
			$currency = ;
			$data['ipaddress'];
			$ipaddress = ;
			$data['invoicestatus'];
			$invoicestatus = ;
				= 6;
			( $date, 1 );
			$date = ;
			$gateways->getDisplayName( $gateway );
			$paymentmethod = ;
			$this->formatStatus( $status );
			$statusformatted = ;

			if ($invoiceid == '0') {
				$paymentstatus = '<span class="textgreen">' . $aInt->lang( 'orders', 'noinvoicedue' ) . '</span>';
			}

			$paymentstatus = '<span class="textgreen">' . ( 'status', 'complete' ) . '</span>';
			jmp;

			if ($invoicestatus == 'Unpaid') {
				$paymentstatus = '<span class="textred">' . $aInt->lang( 'status', 'incomplete' ) . '</span>';
			}

			(  );
		}


		while (true) {
			$clientname = ;
				= 6;
			$orders[] = array( 'id' => $id, 'ordernum' => $ordernum, 'date' => $date, 'clientname' => $clientname, 'gateway' => $gateway, 'paymentmethod' => $paymentmethod, 'amount' => $amount, 'paymentstatus' => ( $paymentstatus ), 'paymentstatusformatted' => $paymentstatus, 'status' => $status, 'statusformatted' => $statusformatted );
		}

		return $orders;
	}

	function buildCriteria($criteria = array(  )) {
		$filters = array(  );

		if (!empty( $criteria['status'] )) {
			if (( ( $criteria['status'] == 'Pending' || $criteria['status'] == 'Active' ) || $criteria['status'] == 'Cancelled' )) {
				$statusfilter = '';
					= 6;
				$where = array( 'show' . ( $criteria['status'] ) => '1' );
					= 6;
				( 'tblorderstatuses', 'title', $where );
				$result = ;
					= 6;
				( $result );

				if ($data = ) {
					$statusfilter .= '\'' . $data[0] . '\',';
				}

				jmp;
			}
		}


		if (!) {
				= 6;
			$filters[] = 'tblorders.amount=\'' . ( $criteria['amount'] ) . '\'';

			if (!empty( $criteria['orderid'] )) {
					= 6;
				$filters[] = 'tblorders.id=\'' . ( $criteria['orderid'] ) . '\'';

				if (!empty( $criteria['ordernum'] )) {
						= 6;
					$filters[] = 'tblorders.ordernum=\'' . ( $criteria['ordernum'] ) . '\'';

					if (!empty( $criteria['orderip'] )) {
							= 6;
						$criteria['orderip'];
					}
				}

				$filters[] = 'tblorders.ipaddress=\'' . (  ) . '\'';

				if (!empty( $criteria['orderdate'] )) {
				}
			}
		}

			= 6;
			= 6;
		( ( $criteria['orderdate'] ) );
		$tempdate = ;
			= 6;
		$filters[] = 'tblorders.date LIKE \'' . ( $tempdate ) . '%\'';

		if (!empty( $criteria['clientname'] )) {
				= 6;
			$criteria['clientname'];
		}

		$filters[] = 'concat(firstname,\' \',lastname) LIKE \'%' . (  ) . '%\'';

		if (!empty( $criteria['paymentstatus'] )) {
				= 6;
			'tblinvoices.status=\'' . ( $criteria['paymentstatus'] );
		}

		$filters[] =  . '\'';
		return $filters;
	}

	function getStatuses() {
		$statuses = array(  );
			= 6;
		( 'tblorderstatuses', 'title,color', '', 'sortorder', 'ASC' );
		$result = ;
			= 6;
		( $result );

		if ($data = ) {
			$data['title'];
			'<span style="color:' . $data['color'] . '">';
			$data['title'];
		}


		while (true) {
			$statuses[] =  .  . '</span>';
		}

		$this->statusoutputs = $statuses;
		return $statuses;
	}

	function formatStatus($status) {
		if (!$this->statusoutputs) {
			$this->getStatuses(  );
				= 6;
			$status;
			$this->statusoutputs;
		}


		if ((  )) {
			(true ? $this->statusoutputs[$status] : $status);
		}

		return ;
	}

	function setID($orderid) {
		$this->orderid = (int)$orderid;
		$this->loadData(  );
		$data = ;
			= 6;

		if (( $data )) {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	function loadData() {
			= 6;
		( 'tblorders', '', array( 'id' => $this->orderid ) );
		$result = ;
			= 6;
		$this->orderdata = ( $result );
		return $this->orderdata;
	}

	function getData($var = '') {
			= 6;

		if (( ( $this->orderdata ) && $var )) {
			if (isset( $this->orderdata[$var] )) {
				(true ? $this->orderdata[$var] : '');
			}
		}

		return ;
	}

	function getFraudResults() {
		$this->getData( 'fraudmodule' );
		$fraudmodule = ;
		new eaedaiidif(  );
		$fraud = ;

		if ($fraud->load( $fraudmodule )) {
			$fraud->processResultsForDisplay;
			$this->orderid;
		}

		return ( $this->getData( 'fraudoutput' ) );
	}

	function delete($orderid = 0) {
		if (empty( $$orderid )) {
			if (empty( $this->orderid )) {
				return dbebefagji;
				$this->orderid;
				$orderid = ;
				$orderid = (int)$orderid;
					= 6;
				( 'tblorders', 'userid,invoiceid', array( 'id' => $orderid ) );
				$result = ;
					= 6;
				( $result );
				$data = ;

				if (empty( $$data )) {
					return dbebefagji;
					$data['userid'];
					$userid = ;
					$data['invoiceid'];
					$invoiceid = ;
						= 6;
					( 'DeleteOrder', array( 'orderid' => $orderid ) );
						= 6;
					( 'tblhostingconfigoptions', (  . 'relid IN (SELECT id FROM tblhosting WHERE orderid=' . $orderid . ')' ) );
						= 6;
					( 'tblaffiliatesaccounts', (  . 'relid IN (SELECT id FROM tblhosting WHERE orderid=' . $orderid . ')' ) );
						= 6;
					( 'tblhosting', array( 'orderid' => $orderid ) );
						= 6;
					( 'tblhostingaddons', array( 'orderid' => $orderid ) );
						= 6;
				}
			}
		}

		( 'tbldomains', array( 'orderid' => $orderid ) );
			= 6;
		( 'tblupgrades', array( 'orderid' => $orderid ) );
			= 6;
		( 'tblorders', array( 'id' => $orderid ) );
			= 6;
		( 'tblinvoices', array( 'id' => $invoiceid ) );
			= 6;
		( 'tblinvoiceitems', array( 'invoiceid' => $invoiceid ) );
			= 6;
		(  . 'Deleted Order - Order ID: ' . $orderid, $userid );
		return cjhcifebeg;
	}

	function setCancelled($orderid = 0) {
		if (empty( $$orderid )) {
			$this->orderid;
			$orderid = ;
			$this->changeStatus;
			$orderid;
			'Cancelled';
		}

		return (  );
	}

	function setFraud($orderid = 0) {
		if (empty( $$orderid )) {
			$this->orderid;
			$orderid = ;
			$this->changeStatus;
			$orderid;
			'Fraud';
		}

		return (  );
	}

	function setPending($orderid = 0) {
		if (empty( $$orderid )) {
			$this->orderid;
			$orderid = ;
			$this->changeStatus;
			$orderid;
			'Pending';
		}

		return (  );
	}

	function changeStatus($orderid, $status) {
		if (empty( $$orderid )) {
			return dbebefagji;
			$orderid = (int)$orderid;
				= 6;

			while (!( 'tblorders', 'id', array( 'id' => $orderid ) )) {
				return dbebefagji;

				if ($status == 'Cancelled') {
						= 6;
					( 'CancelOrder', array( 'orderid' => $orderid ) );
					jmp;

					if ($status == 'Fraud') {
							= 6;
						( 'FraudOrder', array( 'orderid' => $orderid ) );
					}

					(  );

					while (( $status == 'Cancelled' || $status == 'Fraud' )) {
							= 6;
						( 'tblhosting', 'tblhosting.id,tblhosting.domainstatus,tblproducts.servertype,tblhosting.packageid,tblproducts.stockcontrol,tblproducts.qty', array( 'orderid' => $orderid ), '', '', '', 'tblproducts ON tblproducts.id=tblhosting.packageid' );
						$result = ;
							= 6;
						( $result );

						if ($data = ) {
							$data['id'];
							$productid = ;
							$data['domainstatus'];
							$prodstatus = ;
							$data['servertype'];
							$module = ;
							$data['packageid'];
							$packageid = ;
							$data['stockcontrol'];
							$stockcontrol = ;
							$data['qty'];
							$qty = ;

							if (( $module && ( $prodstatus == 'Active' || $prodstatus == 'Suspended' ) )) {
									= 6;
								( 'Running Module Terminate on Order Cancel' );
									= 6;
									= 6;

								if (( !( $module ) || !( bhjhchcdec . ( (  . '/modules/servers/' . $module . '/' ) . $module . '.php' ) ) )) {
									throw new ggjchbedc( 'Invalid Server Module Name' );
									bhjhchcdec;
										. '/modules/servers/';
								}
							}
						}

						require_once(  . ( (  . $module . '/' ) . $module . '.php' ) );
							= 6;

						if (!( 'ServerTerminateAccount' )) {
							require( bhjhchcdec . '/includes/modulefunctions.php' );
								= 6;
							( $productid );

							while (true) {
								$moduleresult = ;

								if ($moduleresult == 'success') {
										= 6;
									( 'tblhosting', array( 'domainstatus' => $status ), array( 'id' => $productid ) );

									if ($stockcontrol) {
											= 6;
										( 'tblproducts', array( 'qty' => '+1' ), array( 'id' => $packageid ) );
										break;
									}

									break;
								}
							}
						}

							= 6;
						( 'tblhosting', array( 'domainstatus' => $status ), array( 'id' => $productid ) );

						if ($stockcontrol) {
								= 6;
							( 'tblproducts', array( 'qty' => '+1' ), array( 'id' => $packageid ) );
						}

						break;
					}

					break;
				}
			}
		}
		else {
			( 'tbldomains', array( 'status' => $status ), array( 'orderid' => $orderid ) );
				= 6;
			( 'tblorders', 'userid,invoiceid', array( 'id' => $orderid ) );
			$result = ;
				= 6;
			( $result );
			$data = ;
			$data['userid'];
			$userid = ;
			$data['invoiceid'];
			$invoiceid = ;

			if ($status == 'Pending') {
					= 6;
				( 'tblinvoices', array( 'status' => 'Unpaid' ), array( 'id' => $invoiceid, 'status' => 'Cancelled' ) );
			}
		}

		( 'tblinvoices', array( 'status' => 'Cancelled' ), array( 'id' => $invoiceid, 'status' => 'Unpaid' ) );
			= 6;
		( 'InvoiceCancelled', array( 'invoiceid' => $invoiceid ) );
			= 6;
		(  . 'Order Status set to ' . $status . ' - Order ID: ' . $orderid, $userid );
		return cjhcifebeg;
	}

	function getItems() {
		global $aInt;

		$this->orderid;
		$orderid = ;
		$items = array(  );

		if (empty( $$orderid )) {
			return $items;
				= 6;
			( 'tblhosting', '', array( 'orderid' => $orderid ) );
			$result = ;
				= 6;
			( $result );

			if ($data = ) {
				$data['id'];
				$hostingid = ;
				$data['domain'];
				$domain = ;
				$data['billingcycle'];
				$billingcycle = ;
				$data['domainstatus'];
				$hostingstatus = ;
					= 6;
				( $data['firstpaymentamount'] );
				$firstpaymentamount = ;
				$data['amount'];
				$recurringamount = ;
				$data['packageid'];
				$packageid = ;
				$data['server'];
				$server = ;
				$data['regdate'];
				$regdate = ;
				$data['nextduedate'];
				$nextduedate = ;
				$data['username'];
				$serverusername = ;
					= 6;
				( $data['password'] );
				$serverpassword = ;
					= 6;
				( 'tblproducts', 'tblproducts.name,tblproducts.type,tblproducts.welcomeemail,tblproducts.autosetup,' . 'tblproducts.servertype,tblproductgroups.id AS group_id,tblproductgroups.name as group_name', array( 'tblproducts.id' => $packageid ), '', '', '', 'tblproductgroups ON tblproducts.gid=tblproductgroups.id' );
				$result2 = ;
					= 6;
				( $result2 );
				$data = ;
				cdifjjijah::getGroupName( $data['group_id'], $data['group_name'] );
				$groupname = ;
				cbebjifhdd::getProductName( $packageid, $data['name'] );
				$productname = ;
				$data['type'];
				$producttype = ;
				$data['welcomeemail'];
				$welcomeemail = ;
				$data['autosetup'];
				$autosetup = ;
				$data['servertype'];
				$servertype = ;
				switch ($producttype) {
				case 'reselleraccount': {
						$aInt->lang( 'orders', 'resellerhosting' );
						$type = ;
						break;
						switch ($producttype) {
						case 'server': {
								$aInt->lang( 'orders', 'server' );
								$type = ;
								break;
								switch ($producttype) {
								case 'other': {
										$aInt->lang( 'orders', 'other' );
										$type = ;
										break;
										switch ($producttype) {
										case 'hostingaccount': {
												break 4;
											}
										}
									}
								}
							}
						}
					}
				}
			}


			while (true) {
				while (true) {
					( '' );
					$result = ;
						= 6;
					( $result );

					if ($data = ) {
						$data['id'];
						$addon_id = ;
						$data['name'];
						$addon_name = ;
						$data['welcomeemail'];
						$addon_welcomeemail = ;
						$predefinedaddons[$addon_id] = array( 'name' => $addon_name, 'welcomeemail' => $addon_welcomeemail );
						break 2;
					}

					break;
				}


				if ($type == 'configoptions') {
						= 6;
					( '=>', $originalvalue );
					$tempvalue = ;
					$tempvalue[0];
					$configid = ;
					$tempvalue[1];
					$oldoptionid = ;
						= 6;
					( 'tblproductconfigoptions', '', array( 'id' => $configid ) );
					$result2 = ;
						= 6;
					( $result2 );
					$data = ;
					$data['optionname'];
					$configname = ;
					$data['optiontype'];
					$optiontype = ;

					if (( $optiontype == 1 || $optiontype == 2 )) {
							= 6;
						( 'tblproductconfigoptionssub', '', array( 'id' => $oldoptionid ) );
						$result2 = ;
							= 6;
						( $result2 );
						$data = ;
						$data['optionname'];
						$oldoptionname = ;
							= 6;
						( 'tblproductconfigoptionssub', '', array( 'id' => $newvalue ) );
						$result2 = ;
							= 6;
						( $result2 );
						$data = ;
						$data['optionname'];
						$newoptionname = ;
						jmp;

						if ($optiontype == 3) {
							if ($oldoptionid) {
								$oldoptionname = 'Yes';
								$newoptionname = 'No';
								break;
							}
						}

							= 6;
						( $result2 );
						$data = ;
						$data['optionname'];
						$optionname = ;
						$oldoptionname = $nextduedate;
						$newoptionname = $newvalue . ' x ' . $optionname;
						$details = '<a href="clientshosting.php?userid=' . $userid . '&id=' . $relid . '">' . $productname;
						$details .=  . ' - ' . $domain;
							. '</a><br />' . $configname . ': ' . $oldoptionname;
					}
				}
			}
		}


		while (true) {
			$details .=  . ' => ' . $newoptionname . '<br>';
				= 6;
			$items[] = array( 'type' => 'upgrade', 'producttype' => 'Options Upgrade', 'description' => $details, 'domain' => '', 'billingcycle' => '', 'amount' => $upgradeamount, 'status' => ( 'status', $aInt->lang( $status ) ) );
		}

		return $items;
	}
}

?>
