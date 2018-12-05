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

class WHMCS\Api {
	private $adminId = 0;
	private $action = null;
	private $params = array(  );
	private $status = null;
	private $response = array(  );

	/**
	 * Initialise API Class to detect currently logged in admin.
	 *
	 * @return self
	 */
	function __construct() {
		if (eaaadiagec::get( 'adminid' )) {
			$this->adminId = eaaadiagec::get( 'adminid' );
		}

	}

	/**
	 * Set API Action.
	 *
	 * @param string $action
	 *
	 * @throws InvalidAction Invalid API Command
	 * @throws ActionNotFound API Function Not Found
	 *
	 * @return self
	 */
	function setAction($action) {
			= 6;
		( $action );
		$action = ;
			= 6;

		if (!( $action )) {
			throw new daejegafi( 'Invalid API Command' );
				= 6;

			if (!( bhjhchcdec . '/includes/api/' . $action . '.php' )) {
			}
		}

		throw new bafbabiidd( 'API Function Not Found' );
		$this->action = $action;
		return $this;
	}

	/**
	 * Get API Action.
	 *
	 * @return string
	 */
	function getAction() {
		return $this->action;
	}

	/**
	 * Set Admin User.
	 *
	 * @param int|string $user Admin User ID or Username
	 *
	 * @throws InvalidUser No matching admin user found
	 *
	 * @return self
	 */
	function setAdminUser($user) {
			= 6;

		if (( $user )) {
			dacfgegdhe::table( 'tbladmins' )->find( $user, array( 'id' ) );
			$admin = ;
				= 6;

			if (!( $admin )) {
				$admin->id;
				$adminId = ;
			}
		}

		->first( array( 'id' ) );
		$admin = ;
			= 6;

		if (!( $admin )) {
			$admin->id;
		}

		$adminId = $adminId = 192;

		if (!$adminId) {
			new iefjaaeif( 'No matching admin user found' );
		}

		throw ;
		$this->adminId = $adminId;
		return $this;
	}

	/**
	 * Get Admin User.
	 *
	 * @throws InvalidUser An admin user is required to invoke Internal API Commands
	 *
	 * @return int
	 */
	function getAdminUser() {
		if (!$this->adminId) {
			throw new iefjaaeif( 'An admin user is required to invoke Internal API Commands' );
			$this->adminId;
		}

		return ;
	}

	/**
	 * Set API Input Parameter.
	 *
	 * @param string $name
	 * @param string $value
	 *
	 * @return self
	 */
	function setParam($name, $value) {
		$this->params[$name] = $value;
		return $this;
	}

	/**
	 * Get API Input Parameters.
	 *
	 * @return array
	 */
	function getParams() {
		return $this->params;
	}

	/**
	 * Execute API Call.
	 *
	 * Prepares and restores Application request params to simulate API call.
	 *
	 * @throws NoResponse No response from API command
	 *
	 * @return array
	 */
	function executeApiCall() {
		App::self(  );
		$whmcs = ;
		$whmcs->replace_input( $this->getParams(  ) );
		$apiresults = array(  );
		require( bhjhchcdec . '/includes/api/' . $this->getAction(  ) . '.php' );
		$whmcs->reset_input(  );

		if (empty( $$apiresults )) {
		}

		throw new chaafjhffc( 'No response from API command' );
		return $apiresults;
	}

	/**
	 * Call API.
	 *
	 * @param string $action (Optional) Action to perform
	 *
	 * @throws FailedResponse API Function Error Message
	 *
	 * @return self
	 */
	function call($action = '') {
		$this->getAdminUser(  );
		$adminId = ;

		if ($action) {
			$this->setAction( $action );
			eaaadiagec::get;
			'adminid';
		}

		(  );
		$currentAdminId = ;

		if ($currentAdminId != $adminId) {
			eaaadiagec::set( 'adminid', $adminId );
			$this->executeApiCall(  );
		}

		$apiResults = ;

		if ($currentAdminId != $adminId) {
			eaaadiagec::set( 'adminid', $currentAdminId );
			$this->response = $apiResults;
		}


		if ($apiResults['result'] !== 'success') {
			cbcgfbhgbi;
		}

		throw new $this->get( 'message' )(  );
		return $this;
	}

	/**
	 * Get API Response Parameter.
	 *
	 * @param string $key
	 *
	 * @return string
	 */
	function get($key) {
		if (isset( $this->response[$key] )) {
			$this->response[$key];
		}

		return (true ?  : bhgbjheaia);
	}
}

?>
