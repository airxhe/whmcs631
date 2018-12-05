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

class WHMCS\Invoices extends WHMCS\TableModel {
	function _execute($criteria = null) {
		return $this->getInvoices( $criteria );
	}

	function getInvoices($criteria = array(  )) {
		global $aInt;
		global $currency;

		$query = ' FROM tblinvoices INNER JOIN tblclients ON tblclients.id=tblinvoices.userid';
		$this->buildCriteria( $criteria );
		$filters = ;
			= 6;

		if (( $filters )) {
				= 6;
			$query .= (true ? ' WHERE ' . ( ' AND ', $filters ) : '');
				= 6;
			( 'SELECT COUNT(*)' . $query );
			$result = ;
				= 6;
			( $result );
			$data = ;
			$this->getPageObj(  )->setNumResults( $data[0] );
			new ddhjgidcb(  );
			$gateways = ;
			$this->getPageObj(  )->getOrderBy(  );
			$orderby = ;

			if ($orderby == 'clientname') {
				$orderby = 'firstname ' . $this->getPageObj(  )->getSortDirection(  ) . ',lastname ' . $this->getPageObj(  )->getSortDirection(  ) . ',companyname';

				if ($orderby == 'id') {
					$orderby = 'tblinvoices.invoicenum ' . $this->getPageObj(  )->getSortDirection(  ) . ',tblinvoices.id';
					$invoices = array(  );
					'SELECT tblinvoices.*,tblclients.firstname,tblclients.lastname,tblclients.companyname,tblclients.groupid,tblclients.currency' . $query . ' ORDER BY ' . $orderby;
				}

				$query =  . ' ' . $this->getPageObj(  )->getSortDirection(  ) . ' LIMIT ' . $this->getQueryLimit(  );
					= 6;
				( $query );
				$result = ;
					= 6;
				( $result );

				if ($data = ) {
					$data['id'];
					$id = ;
					$data['invoicenum'];
					$invoicenum = ;
					$data['userid'];
					$userid = ;
					$data['date'];
					$date = ;
					$data['duedate'];
					$duedate = ;
					$data['subtotal'];
					$subtotal = ;
					$data['credit'];
				}
			}
		}

		$credit = ;
		$data['total'];
		$total = ;
		$data['paymentmethod'];
		$gateway = ;
		$data['status'];
		$status = ;
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
		$aInt->outputClientLink( $userid, $firstname, $lastname, $companyname, $groupid );
		$clientname = ;
		$gateways->getDisplayName( $gateway );
		$paymentmethod = ;
			= 6;
		( '', $currency );

		while (true) {
			$currency = ;
				= 6;
			( $credit + $total );
			$totalformatted = ;
			$this->formatStatus( $status );
			$statusformatted = ;
				= 6;
			( $date );
			$date = ;
				= 6;
			( $duedate );
			$duedate = ;

			if (!$invoicenum) {
				$invoicenum = $statusformatted;
				array( 'id' => $id, 'invoicenum' => $invoicenum, 'userid' => $userid, 'clientname' => $clientname, 'date' => $date, 'duedate' => $duedate, 'subtotal' => $subtotal, 'credit' => $credit, 'total' => $total, 'totalformatted' => $totalformatted, 'gateway' => $gateway, 'paymentmethod' => $paymentmethod );
			}

			$invoices[] = array( 'status' => $status, 'statusformatted' => $statusformatted );
		}

		return $invoices;
	}

	function buildCriteria($criteria) {
		$filters = array(  );

		if ($criteria['clientid']) {
			$filters[] = 'userid=' . (int)$criteria['clientid'];

			if ($criteria['clientname']) {
					= 6;
				$filters[] = 'concat(firstname,\' \',lastname) LIKE \'%' . ( $criteria['clientname'] ) . '%\'';

				if ($criteria['invoicenum']) {
						= 6;
						= 6;
					$filters[] = '(tblinvoices.id=\'' . ( $criteria['invoicenum'] ) . '\' OR tblinvoices.invoicenum=\'' . ( $criteria['invoicenum'] ) . '\')';

					if ($criteria['lineitem']) {
							= 6;
						$filters[] = 'tblinvoices.id IN (SELECT invoiceid FROM tblinvoiceitems WHERE description LIKE \'%' . ( $criteria['lineitem'] ) . '%\')';

						if ($criteria['paymentmethod']) {
								= 6;
							$criteria['paymentmethod'];
						}
					}
				}

				$filters[] = 'tblinvoices.paymentmethod=\'' . (  ) . '\'';

				if ($criteria['invoicedate']) {
						= 6;
					$filters[] = 'tblinvoices.date=\'' . ( $criteria['invoicedate'] ) . '\'';

					if ($criteria['duedate']) {
							= 6;
						$filters[] = 'tblinvoices.duedate=\'' . ( $criteria['duedate'] ) . '\'';

						if ($criteria['datepaid']) {
								= 6;
								= 6;
							$filters[] = 'tblinvoices.datepaid>=\'' . ( $criteria['datepaid'] ) . '\' AND tblinvoices.datepaid<=\'' . ( $criteria['datepaid'] ) . '235959\'';

							if ($criteria['totalfrom']) {
									= 6;
							}

							$criteria['totalfrom'];
						}
					}

					$filters[] = 'tblinvoices.total>=\'' . (  ) . '\'';

					if ($criteria['totalto']) {
					}
				}
			}
		}

			= 6;
		$filters[] = 'tblinvoices.total<=\'' . ( $criteria['totalto'] ) . '\'';

		if ($criteria['status']) {
			if ($criteria['status'] == 'Overdue') {
					= 6;
				$filters[] = 'tblinvoices.status=\'Unpaid\' AND tblinvoices.duedate<\'' . ( 'Ymd' ) . '\'';
			}
		}

		$filters[] = 'tblinvoices.status=\'' . ( $criteria['status'] ) . '\'';
		return $filters;
	}

	function formatStatus($status) {
			= 6;

		if (( 'ADMINAREA' )) {
			global $aInt;

			if ($status == 'Draft') {
				$status = '<span class="textgrey">' . $aInt->lang( 'status', 'draft' ) . '</span>';

				if ($status == 'Unpaid') {
					$aInt->lang;
					'status';
					'unpaid';
				}
			}
		}

		$status = '<span class="textred">' . (  ) . '</span>';
		jmp;

		if ($status == 'Paid') {
			$status = '<span class="textgreen">' . $aInt->lang( 'status', 'paid' ) . '</span>';
			jmp;

			if ($status == 'Cancelled') {
				$status = '<span class="textgrey">' . $aInt->lang( 'status', 'cancelled' ) . '</span>';
			}
			else {
				$status = 'Unrecognised';
				jmp;
				global $_LANG;

				if ($status == 'Unpaid') {
					$status = '<span class="textred">' . $_LANG['invoicesunpaid'] . '</span>';
					jmp;

					if ($status == 'Paid') {
						$status = '<span class="textgreen">' . $_LANG['invoicespaid'] . '</span>';
					}
				}
			}
		}


		if () {
			$status = '<span class="textgrey">' . $_LANG['invoicescancelled'] . '</span>';
		}


		if () {
			$status = '<span class="textgold">' . $_LANG['invoicescollections'] . '</span>';
			$status = 'Unrecognised';
		}

		return $status;
	}

	function getInvoiceTotals() {
		global $currency;

		$invoicesummary = array(  );
			= 6;
		( 'SELECT currency,COUNT(tblinvoices.id),SUM(total) FROM tblinvoices INNER JOIN tblclients ON tblclients.id=tblinvoices.userid WHERE tblinvoices.status=\'Paid\' GROUP BY tblclients.currency' );
			= 6;
		( $result );

		if ($data = ) {
			$invoicesummary[$data[0]]['paid'] = $data[2];
		}

		jmp;
		(  );
		$paid = $result = ;
			= 6;
		( $vals['unpaid'] );
		$unpaid = ;
			= 6;

		while (true) {
			( $vals['overdue'] );
			$overdue = ;
			$totals[] = array( 'currencycode' => $currency['code'], 'paid' => $paid, 'unpaid' => $unpaid, 'overdue' => $overdue );
		}

		return $totals;
	}

	function duplicate($invoiceid) {
		App::self(  );
			= 6;
		$result = ;
			= 6;
		( $result );
		$data['userid'];
		$userid = $whmcs = ;
			= 6;
		( 'tblinvoices', $data );
		$newid = ( 'tblinvoices', 'userid,invoicenum,date,duedate,datepaid,subtotal,credit,tax,tax2,total,taxrate,taxrate2,status,paymentmethod,notes', array( 'id' => $invoiceid ) );
			= 6;
		( 'tblinvoiceitems', '', array( 'invoiceid' => $invoiceid ) );
		$result = $data = ;
			= 6;
		( $result );

		if ($data = self::adjustIncrementForNextInvoice( $invoiceid )) {
			unset( $data[id] );
			$data['invoiceid'] = $newid;
		}


		while (true) {
				= 6;
			( 'tblinvoiceitems', $data );
		}

			= 6;
		(  . 'Duplicated Invoice - Existing Invoice ID: ' . $invoiceid . ' - New Invoice ID: ' . $newid, $userid );
		return cjhcifebeg;
	}

	/**
	 * Get the status of sequential paid invoice numbering
	 *
	 * @return boolean
	 */
	function isSequentialPaidInvoiceNumberingEnabled() {
		iciahfajh::getInstance(  );
		$whmcs = ;

		if ($whmcs->get_config( 'SequentialInvoiceNumbering' )) {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	/**
	 * Get the next sequential paid invoice number to assign to an invoice
	 *
	 * Also increments the next number value
	 *
	 * @return string
	 */
	function getNextSequentialPaidInvoiceNumber() {
		iciahfajh::getInstance(  );
		$whmcs = ;
		$whmcs->get_config( 'SequentialInvoiceNumberFormat' );
		$numberToAssign = ;
		$whmcs->get_config( 'SequentialInvoiceNumberValue' );
		$nextNumber = ;
		$whmcs->set_config( 'SequentialInvoiceNumberValue', self::padAndIncrement( $nextNumber ) );
			= 6;
			= 6;
		( '{YEAR}', ( 'Y' ), $numberToAssign );
		$numberToAssign = ;
			= 6;
			= 6;
		( '{MONTH}', ( 'm' ), $numberToAssign );
		$numberToAssign = ;
			= 6;
			= 6;
		( '{DAY}', ( 'd' ), $numberToAssign );
			= 6;
		( '{NUMBER}', $nextNumber, $numberToAssign );
		$numberToAssign = $numberToAssign = ;
		return $numberToAssign;
	}

	/**
	 * Increment a number by a given amount preserving leading zeros
	 *
	 * @param string $number Starting number
	 * @param int $incrementAmount Increment amount (defaults to 1)
	 *
	 * @return string
	 */
	function padAndIncrement($number, $incrementAmount = 1) {
		$newNumber = $number + $incrementAmount;
			= 6;

		if (( $number, 0, 1 ) == '0') {
				= 6;
			( $number );
			$numberLength = ;
		}

			= 6;
		( $newNumber, $numberLength, '0', ebjjcgedhb );
		$newNumber = ;
		return $newNumber;
	}

	/**
	 * Use the provided invoice id to calculate and set the next invoice id
	 * that would be used based on the InvoiceIncrement value.
	 *
	 * This is a replacement to the for loop that inserted x invoices depending
	 * on the InvoiceIncrement value. Anything above 1 will insert a an item into
	 * tblinvoices using the passed invoice id + the Invoice Increment value -1.
	 *
	 * @param int $lastInvoiceId - The ID of the last invoice to be inserted
	 */
	function adjustIncrementForNextInvoice($lastInvoiceId) {
		$incrementValue = (int)chhgjaeced::getValue( 'InvoiceIncrement' );

		if (1 < $incrementValue) {
			$lastInvoiceId + ( $incrementValue - 1 );
		}

		$incrementedId = ;
			= 6;
		( 'tblinvoices', array( 'id' => $incrementedId ) );
			= 6;
		( 'tblinvoices', array( 'id' => $incrementedId ) );
	}

	/**
	 * Get the allowed invoice status list.
	 *
	 * @return array
	 */
	function getInvoiceStatusValues() {
		return $invoiceStatusValues;
	}
}

?>
