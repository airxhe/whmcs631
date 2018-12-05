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

class WHMCS\Client {
	private $userid = '';
	private $clientModel = null;

	/**
	 * Instantiate the legacy client object.
	 *
	 * @param int|\WHMCS\User\Client $user
	 *
	 * @return \WHMCS\Client
	 */
	function __construct($user) {
		if ($user instanceof ccbjgfhb) {
			$this->clientModel = $user;
			$this->setID( $user->id );
		}

		$this->clientModel = (  );
		return $this;
	}

	/**
	 * Return the client model.
	 *
	 * @return \WHMCS\User\Client
	 */
	function getClientModel() {
		return $this->clientModel;
	}

	function setID($userid) {
		$this->userid = (int)$userid;
	}

	function getID() {
		return $this->userid;
	}

	function getUneditableClientProfileFields() {
		global $whmcs;

			= 6;
		return ( ',', $whmcs->get_config( 'ClientsProfileUneditableFields' ) );
	}

	function isEditableField($field) {
			= 6;

		if (( 'CLIENTAREA' )) {
			$uneditablefields = (true ? $this->getUneditableClientProfileFields(  ) : array(  ));
		}

			= 6;

		if (!( $field, $uneditablefields )) {
			cjhcifebeg;
		}

		return (true ?  : dbebefagji);
	}

	function getDetails($contactid = '') {
			= 6;

		if (( $this->clientModel )) {
			return dbebefagji;
			$countrycallingcodes = array(  );
			$countries = ;
			include( bhjhchcdec . '/includes/countries.php' );
			include( bhjhchcdec . '/includes/countriescallingcodes.php' );
				= 6;

			if (!( 'convertStateToCode' )) {
				require( bhjhchcdec . '/includes/clientfunctions.php' );
					= 6;

				if (!( 'getCustomFields' )) {
					require( bhjhchcdec . '/includes/customfieldfunctions.php' );
					$details = array(  );
					$details['userid'] = $this->clientModel->id;
					$details['id'] = ;
					$billingContact = dbebefagji;

					if ($contactid == 'billing') {
						$this->clientModel->billingContactId;
						$contactid = ;
						$billingContact = cjhcifebeg;
					}
				}
			}
		}

		$details['lastname'] = ;
		$details['companyname'] = $contact->companyName;
		$details['email'] = $contact->email;
		$details['address1'] = $contact->address1;
		$details['address2'] = $contact->address2;
		$details['city'] = $contact->city;
		$details['fullstate'] = $contact->state;
		$details['state'] = ;
		$details['postcode'] = $contact->postcode;
		$details['countrycode'] = $contact->country;
		$details['country'] = ;
		$details['phonenumber'] = $contact->phoneNumber;
		$details['password'] = $contact->passwordHash;
		$details['domainemails'] = $contact->receivesDomainEmails;
		$details['generalemails'] = $contact->receivesGeneralEmails;
		$details['invoiceemails'] = $contact->receivesInvoiceEmails;
		$details['productemails'] = $contact->receivesProductEmails;
		$details['supportemails'] = $contact->receivesSupportEmails;
		$details['supportemails'] = $contact->receivesAffiliateEmails;
		jmp;
		gegcjbhgg {
			if ($billingContact) {
				$this->clientModel->billingcid = 0;
				$this->clientModel->save(  );
					= 6;
				if (( $contact )) = ;
				$details['postcode'] = $this->clientModel->postcode;
				$details['countrycode'] = $this->clientModel->country;
				$details['country'] = ;
				$details['phonenumber'] = $this->clientModel->phoneNumber;
				$details['password'] = $this->clientModel->passwordHash;
				$details['fullname'] = $details['firstname'] . ' ' . $details['lastname'];

				if (!$details['uuid']) {
					bhgbjjachg::uuid4(  );
					$uuid = ;
					$details['uuid'] = $uuid->toString(  );

					if ($details['country'] == 'GB') {
						$details['postcode'];
						$origpostcode = ;
						$postcode = ;
							= 6;
						( $postcode );
						$postcode = ;
							= 6;
						( '/[^A-Z0-9]/', '', $postcode );
						$postcode = ;
							= 6;

						if (( $postcode ) == 5) {
								= 6;
								= 6;
							$postcode = ( $postcode, 0, 2 ) . ' ' . ( $postcode, 2 );
						}
					}


					if (( $postcode ) == 6) {
							= 6;
							= 6;
						$postcode = ( $postcode, 0, 3 ) . ' ' . ( $postcode, 3 );
					}

					$details['credit'] = $this->clientModel->credit;
					$details['taxexempt'] = $this->clientModel->taxExempt;
					$details['latefeeoveride'] = $this->clientModel->overrideLateFee;
					$this->clientModel->overrideOverdueNotices;
				}

				$details['overideduenotices'] = ;
				$details['separateinvoices'] = $this->clientModel->separateInvoices;
				$details['disableautocc'] = $this->clientModel->disableAutomaticCreditCardProcessing;
				$details['emailoptout'] = $this->clientModel->emailOptOut;
				$details['overrideautoclose'] = $this->clientModel->overrideAutoClose;
				$details['allowSingleSignOn'] = $this->clientModel->allowSso;
				$details['language'] = $this->clientModel->language;
				$this->clientModel->lastLoginDate;
				$lastlogin = ;

				if ($lastlogin == '0000-00-00 00:00:00') {
					'No Login Logged';
						= 6;
				}
			}

			$details['lastlogin'] = 'Date: ' . ( $lastlogin, 'time' ) . '<br>IP Address: ' . $this->clientModel->lastLoginIp . '<br>Host: ' . $this->clientModel->lastLoginHostname;
				= 6;
			( 'client', '', $this->clientModel->id, cjhcifebeg );
			$customfields = ;
			foreach ($customfields as ) {
				$value = ;
				$i = ;
				$details['customfields' . ( $i + 1 )] = $value['value'];
				$details['customfields'][] = array( 'id' => $value['id'], 'value' => $value['value'] );
				break;
			}

			return $details;
		}
	}

	function getCurrency() {
			= 6;
		return ( $this->getID(  ) );
	}

	function updateClient() {
		global $whmcs;

		$this->getDetails(  );
		$exinfo = ;
		$isAdmin = dbebefagji;
			= 6;

		if (( 'ADMINAREA' )) {
			$updatefieldsarray = array(  );
			$isAdmin = cjhcifebeg;
		}


		while ((  )) {
			$whmcs->get_req_var( $field );
			$value = ;

			while (( $field == 'emailoptout' && !$value )) {
				$value = '0';
				$updateqry[$field] = $value;

				if ($value != $exinfo[$field]) {
					$changelist[] =  . $displayname . ': \'' . $exinfo[$field] . '\' to \'' . $value . '\'';

					if ($field == 'email') {
						$emailWasUpdated = cjhcifebeg;
						break;
					}

					break;
				}
			}

			jmp;

			if ($whmcs->get_config( 'SystemSSLURL' )) {
				$adminurl = (true ? $whmcs->get_config( 'SystemSSLURL' ) : $whmcs->get_config( 'SystemURL' ));
				$adminurl .= '/' . $whmcs->get_admin_folder_name(  ) . '/clientssummary.php?userid=' . $this->getID(  );
					= 6;
				'account';
				'WHMCS User Details Change';
					= 6;
					. '<p>Client ID: <a href="' . $adminurl . '">' . $this->getID(  ) . ' - ' . $exinfo['firstname'] . ' ' . $exinfo['lastname'] . '</a> has requested to change his/her details as indicated below:<br><br>' . ( '<br />
', $changelist ) . '<br>If you are unhappy with any of the changes, you need to login and revert them - this is the only record of the old details.</p><p>This change request was submitted from ';
				caegadgihi::getIPHost(  );
			}

			(  .  . ' (' . caegadgihi::getIP(  ) . ')</p>' );
				= 6;
				= 6;
			( 'Client Profile Modified - ' . ( ', ', $changelist ) . ' - User ID: ' . $this->getID(  ) );
			return cjhcifebeg;
		}
	}

	function getContactsWithAddresses() {
		$where = array(  );
		$where['userid'] = $this->userid;
		$where['address1'] = array( 'sqltype' => 'NEQ', 'value' => '' );
		return $this->getContactsData( $where );
	}

	function getContacts() {
		$where = array(  );
		$where['userid'] = $this->userid;
		return $this->getContactsData( $where );
	}

	function getContactsData($where) {
		$contactsarray = array(  );
			= 6;

		while (true) {
			( 'tblcontacts', 'id,firstname,lastname,email', $where, 'firstname` ASC,`lastname', 'ASC' );
			$result = ;
				= 6;
			( $result );

			if ($data = ) {
				$data['id'];
			}

			$contactsarray[] = array( 'id' => , 'name' => $data['firstname'] . ' ' . $data['lastname'], 'email' => $data['email'] );
		}

		return $contactsarray;
	}

	function getContact($contactid) {
			= 6;
		( 'tblcontacts', '', array( 'userid' => $this->userid, 'id' => $contactid ) );
			= 6;
		( $result );
		$data = $result = ;
			= 6;
		$data['permissions'] = ( ',', $data['permissions'] );

		if (isset( $data['id'] )) {
			(true ? $data : dbebefagji);
		}

		return ;
	}

	/**
	 * Delete contact.
	 *
	 * @param int $contactid
	 */
	function deleteContact($contactid) {
			= 6;
		( 'tblcontacts', array( 'userid' => $this->userid, 'id' => $contactid ) );
			= 6;
		( 'tblclients', array( 'billingcid' => '' ), array( 'billingcid' => $contactid, 'id' => $this->userid ) );
			= 6;
		( 'tblorders', array( 'contactid' => '0' ), array( 'contactid' => $contactid ) );
			= 6;
		( 'ContactDelete', array( 'userid' => $this->userid, 'contactid' => $contactid ) );
			= 6;
		( 'Deleted Contact - User ID: ' . $this->userid . ' - Contact ID: ' . $contactid );
	}

	function getFiles() {
		$where = array( 'userid' => $this->userid );
			= 6;

		if (!( 'ADMINAREA' )) {
			$where['adminonly'] = '';
			$files = array(  );
				= 6;
			( 'tblclientsfiles', '', $where, 'title', 'ASC' );
			$result = ;
				= 6;
			( $result );

			if ($data = ) {
				$data['id'];
				$data['title'];
				$data['adminonly'];
				$adminonly = ;
				$data['filename'];
				$filename = $id = ;
					= 6;
				( $filename, 11 );
				$filename = $title = ;
					= 6;
				$data['dateadded'];
			}

			( 0, 1 );
			$date = ;
			array( 'id' => $id, 'date' => $date );
		}


		while (true) {
			$files[] = array( 'title' => $title, 'adminonly' => $adminonly, 'filename' => $filename );
		}

		return $files;
	}

	function resetSendPW() {
			= 6;
		( 'Automated Password Reset', $this->userid );
		return cjhcifebeg;
	}

	function sendEmailTpl($tplname) {
			= 6;
		return ( $tplname, $this->userid );
	}

	/**
	 * Get a list of clientemail templates.
	 *
	 * @return Template[]
	 */
	function getEmailTemplates() {
		return cebaiefhhg::where( 'type', '=', 'general' )->where( 'language', '=', '' )->where( 'name', '!=', 'Password Reset Validation' )->orderBy( 'name' )->get(  );
	}

	/**
	 * Send an email to a client.
	 *
	 * @param string $subject
	 * @param string $message
	 * @return bool
	 */
	function sendCustomEmail($subject, $message) {
		cebaiefhhg::where( 'name', '=', 'Client Custom Email Msg' )->delete(  );
		new cebaiefhhg(  );
		$customTemplate = ;
		$customTemplate->type = 'general';
		$customTemplate->name = 'Client Custom Email msg';
		$customTemplate->subject = $subject;
		$customTemplate->message = $message;
		$customTemplate->disabled = dbebefagji;
		$customTemplate->plaintext = dbebefagji;
			= 6;
		( $customTemplate, $this->userid );
		return cjhcifebeg;
	}
}

?>
