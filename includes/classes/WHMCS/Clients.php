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

class WHMCS\Clients extends WHMCS\TableModel {
	protected $groups = null;
	protected $customfieldsfilter = false;

	function _execute($criteria = null) {
		return $this->getClients( $criteria );
	}

	function getClients($criteria = array(  )) {
		global $disable_clients_list_services_summary;

		$this->getGroups(  );
		$filters = ;

		while (true) {
				= 6;

			if (( $filters )) {
					= 6;
				$where = (true ? ' WHERE ' . ( ' AND ', $filters ) : '');

				if ($this->customfieldsfilter) {
					$customfieldjoin = (true ? ' INNER JOIN tblcustomfieldsvalues ON tblcustomfieldsvalues.relid=tblclients.id' : '');
						= 6;
					( 'SELECT COUNT(*) FROM tblclients' . $customfieldjoin . $where );
					$result = ;
				}

					= 6;
				( $result );
				$data = ;
				$this->getPageObj(  )->setNumResults( $data[0] );
				$clients = array(  );
				$query = 'SELECT id,firstname,lastname,companyname,email,datecreated,groupid,status FROM tblclients' . $customfieldjoin . $where . ' ORDER BY ' . $this->getPageObj(  )->getOrderBy(  ) . ' ' . $this->getPageObj(  )->getSortDirection(  ) . ' LIMIT ' . $this->getQueryLimit(  );
					= 6;
				( $query );
				$result = ;
					= 6;
				( $result );

				if ($data = ) {
					$data['id'];
					$id = ;
					$data['firstname'];
					$firstname = ;
					$data['lastname'];
					$lastname = ;
					$data['companyname'];
					$companyname = ;
					$data['email'];
					$email = ;
					$data['datecreated'];
					$datecreated = ;
					$data['groupid'];
					$groupid = ;
					$data['status'];
					$status = ;
						= 6;
					( $datecreated );
					$datecreated = ;

					if (isset( $clientgroups[$groupid]['colour'] )) {
						$groupcolor = (true ? $clientgroups[$groupid]['colour'] . '"' : '');
						$totalservices = '-';
						$services = ;

						if (!$disable_clients_list_services_summary) {
								= 6;
						}
					}
				}

				( 'SELECT (SELECT COUNT(*) FROM tblhosting WHERE userid=tblclients.id AND domainstatus IN (\'Active\',\'Suspended\'))+(SELECT COUNT(*) FROM tblhostingaddons WHERE hostingid IN (SELECT id FROM tblhosting WHERE userid=tblclients.id) AND status IN (\'Active\',\'Suspended\'))+(SELECT COUNT(*) FROM tbldomains WHERE userid=tblclients.id AND status IN (\'Active\')) AS services,(SELECT COUNT(*) FROM tblhosting WHERE userid=tblclients.id)+(SELECT COUNT(*) FROM tblhostingaddons WHERE hostingid IN (SELECT id FROM tblhosting WHERE userid=tblclients.id))+(SELECT COUNT(*) FROM tbldomains WHERE userid=tblclients.id) AS totalservices FROM tblclients WHERE tblclients.id=' . (int)$id . ' LIMIT 1' );
				$result2 = ;
					= 6;
				( $result2 );
				$data = ;
				$data['services'];
			}

			$services = $clientgroups = ;
			$data['totalservices'];
			$totalservices = $this->buildCriteria( $criteria );
			$clients[] = array( 'id' => $id, 'firstname' => $firstname, 'lastname' => $lastname, 'companyname' => $companyname, 'groupid' => $groupid, 'groupcolor' => $groupcolor, 'email' => $email, 'services' => $services, 'totalservices' => $totalservices, 'datecreated' => $datecreated, 'status' => $status );
		}

		return $clients;
	}

	function buildCriteria($criteria) {
		$filters = array(  );

		if ($criteria['userid']) {
			$filters[] = 'id=' . (int)$criteria['userid'];

			if ($criteria['clientname']) {
					= 6;
			}

			$filters[] = 'concat(firstname,\' \',lastname) LIKE \'%' . ( $criteria['clientname'] ) . '%\'';

			if ($criteria['address']) {
					= 6;
				$filters[] = 'concat(address1,\' \',address2,\' \',city,\' \',state,\' \',postcode) LIKE \'%' . ( $criteria['address'] ) . '%\'';

				if ($criteria['state']) {
						= 6;
					$filters[] = 'state LIKE \'%' . ( $criteria['state'] ) . '%\'';

					if ($criteria['country']) {
							= 6;
						$filters[] = 'country=\'' . ( $criteria['country'] ) . '\'';

						if ($criteria['companyname']) {
								= 6;
							$filters[] = 'companyname LIKE \'%' . ( $criteria['companyname'] ) . '%\'';

							if ($criteria['email']) {
									= 6;
							}
						}
					}
				}
			}


			while (true) {
				$filters[] = 'email LIKE \'%' . ( $criteria['email'] ) . '%\'';

				if ($criteria['phonenumber']) {
						= 6;
					$filters[] = 'phonenumber LIKE \'%' . ( $criteria['phonenumber'] ) . '%\'';

					if ($criteria['status']) {
							= 6;
						$filters[] = 'status=\'' . ( $criteria['status'] ) . '\'';

						if ($criteria['clientgroup']) {
								= 6;
							$filters[] = 'groupid=\'' . ( $criteria['clientgroup'] ) . '\'';

							if ($criteria['cardlastfour']) {
									= 6;
								'cardlastfour=\'' . ( $criteria['cardlastfour'] );
							}
						}
					}

					$filters[] =  . '\'';

					if ($criteria['currency']) {
							= 6;
						$filters[] = 'currency=\'' . ( $criteria['currency'] ) . '\'';
						$cfquery = array(  );
					}
				}

					= 6;

				if (( $criteria['customfields'] )) {
					foreach ($criteria['customfields'] as ) {
					}
				}

				$fieldvalue = ;
				$fieldid = ;
					= 6;
				( $fieldvalue );
				$fieldvalue = ;

				if ($fieldvalue) {
						= 6;
				}
			}
		}


		while (true) {
				= 6;
			$cfquery[] = '(tblcustomfieldsvalues.fieldid=\'' . ( $fieldid ) . '\' AND tblcustomfieldsvalues.value LIKE \'%' . ( $fieldvalue ) . '%\')';
			$this->customfieldsfilter = cjhcifebeg;
		}

			= 6;

		if (( $cfquery )) {
				= 6;
			' OR ';
			$cfquery;
		}

		$filters[] = (  );
		return $filters;
	}

	function getGroups() {
			= 6;

		if (( $this->groups )) {
			return $this->groups;
			$this->groups = array(  );
		}

			= 6;
		( 'tblclientgroups', '', '' );
		$result = ;
			= 6;
		( $result );

		if ($data = ) {
			$this->groups[$data['id']] = array( 'name' => $data['groupname'], 'colour' => $data['groupcolour'], 'discountpercent' => $data['discountpercent'], 'susptermexempt' => $data['susptermexempt'], 'separateinvoices' => $data['separateinvoices'] );
		}


		while (true) {
		}

		return $this->groups;
	}
}

?>
