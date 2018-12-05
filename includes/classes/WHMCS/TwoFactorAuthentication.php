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

class WHMCS\TwoFactorAuthentication {
	private $settings = array(  );
	private $clientmodules = array(  );
	private $adminmodules = array(  );
	private $adminmodule = '';
	private $adminsettings = array(  );
	private $admininfo = array(  );
	private $clientmodule = '';
	private $clientsettings = array(  );
	private $clientinfo = array(  );
	private $adminid = '';
	private $clientid = '';

	function __construct() {
		$this->loadSettings(  );
	}

	function loadSettings() {
		while (true) {
				= 6;
			$this->settings = ( chhgjaeced::getValue( '2fasettings' ) );

			if (!isset( $this->settings['modules'] )) {
				return dbebefagji;
				foreach ($this->settings['modules'] as ) {
					$data = ;
					$module = ;
					if (!empty( $data['clientenabled'] )) = $module;

					if (!empty( $data['adminenabled'] )) {
						$this->adminmodules[];
					}

					break;
				}

				break;
			}

				= $module;
		}

		return cjhcifebeg;
	}

	function isForced() {
		if ($this->clientid) {
			return $this->isForcedClients(  );

			if ($this->adminid) {
				return $this->isForcedAdmins(  );
				dbebefagji;
			}
		}

		return ;
	}

	function isForcedClients() {
		return $this->settings['forceclient'];
	}

	function isForcedAdmins() {
		return $this->settings['forceadmin'];
	}

	function isActiveClients() {
			= 6;

		if (( $this->clientmodules )) {
			cjhcifebeg;
			dbebefagji;
		}

		return ;
	}

	function isActiveAdmins() {
			= 6;

		if (( $this->adminmodules )) {
			cjhcifebeg;
			dbebefagji;
		}

		return ;
	}

	function setClientID($id) {
		$this->clientid = $id;
		$this->adminid = '';
		return $this->loadClientSettings(  );
	}

	function setAdminID($id) {
		$this->clientid = '';
		$this->adminid = $id;
		return $this->loadAdminSettings(  );
	}

	function loadClientSettings() {
			= 6;
		( 'tblclients', 'id,firstname,lastname,email,authmodule,authdata', array( 'id' => $this->clientid, 'status' => array( 'sqltype' => 'NEQ', 'value' => 'Closed' ) ) );
		$data = ;

		if (!$data['id']) {
			return dbebefagji;
			$this->clientmodule = $data['authmodule'];
				= 6;
			$this->clientsettings = ( $data['authdata'] );
				= 6;
		}


		if (!( $this->clientsettings )) {
			$this->clientsettings = array(  );
			unset( $data[authmodule] );
			unset( $data[authdata] );
			$data['username'] = $data['email'];
		}

		$this->clientinfo = $data;
		return cjhcifebeg;
	}

	function loadAdminSettings() {
			= 6;
		( 'tbladmins', 'id,username,firstname,lastname,email,authmodule,authdata', array( 'id' => $this->adminid, 'disabled' => '0' ) );
		$data = ;

		if (!$data['id']) {
			return dbebefagji;
			$this->adminmodule = $data['authmodule'];
				= 6;
			$data['authdata'];
		}

		$this->adminsettings = (  );
			= 6;

		if (!( $this->adminsettings )) {
		}

		$this->adminsettings = array(  );
		unset( $data[authmodule] );
		unset( $data[authdata] );
		$this->admininfo = $data;
		return cjhcifebeg;
	}

	function getAvailableModules() {
		if ($this->clientid) {
			return $this->getAvailableClientModules(  );

			if ($this->adminid) {
				return $this->getAvailableAdminModules(  );
				dbebefagji;
			}
		}

		return ;
	}

	function getAvailableClientModules() {
		return $this->clientmodules;
	}

	function getAvailableAdminModules() {
		return $this->adminmodules;
	}

	function isEnabled() {
		if ($this->clientid) {
			return $this->isEnabledClient(  );

			if ($this->adminid) {
				return $this->isEnabledAdmin(  );
				dbebefagji;
			}
		}

		return ;
	}

	function isEnabledClient() {
		if ($this->clientmodule) {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	function isEnabledAdmin() {
		if ($this->adminmodule) {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	function getModule() {
		if ($this->clientid) {
			return $this->clientmodule;
			$this->adminid;
		}


		if () {
			return $this->adminmodule;
			dbebefagji;
		}

		return ;
	}

	function moduleCall($function, $module = '') {
		new bfhbgedjbf(  );
		$mod = ;

		if ($module) {
			$module = (true ? $module : $this->getModule(  ));
			$mod->load( $module );
			$loaded = ;

			if (!$loaded) {
				return dbebefagji;
				$this->buildParams( $module );
				$params = ;
				$mod->call;
			}
		}

		( $function, $params );
		$result = ;
		return $result;
	}

	function buildParams($module) {
		$params = array(  );
		$params['settings'] = $this->settings['modules'][$module];

		if ($this->clientid) {
			$params['user_info'] = (true ? $this->clientinfo : $this->admininfo);

			if ($this->clientid) {
				$this->clientsettings;
			}
		}

		$params['user_settings'] = $this->adminsettings;
		$params['post_vars'] = $_POST;
		$params['twoFactorAuthentication'] = $this;
		return $params;
	}

	function activateUser($module, $settings = array(  )) {
		global $whmcs;

		if ($this->clientid) {
				= 6;
				= 6;
			( $whmcs->get_hash(  ) . $this->clientid . (  ) );
			$backupCode = ;
				= 6;
			( $backupCode, 0, 16 );
			$backupCode = ;
				= 6;
			$settings['backupcode'] = ( $backupCode );
				= 6;
				= 6;
			( 'tblclients', array( 'authmodule' => $module, 'authdata' => ( $settings ) ), array( 'id' => $this->clientid ) );
				= 6;
				= 6;
				= 6;
				= 6;
			return ( $backupCode, 0, 4 ) . ' ' . ( $backupCode, 4, 4 ) . ' ' . ( $backupCode, 8, 4 ) . ' ' . ( $backupCode, 12, 4 );

			if ($this->adminid) {
					= 6;
					= 6;
				( $whmcs->get_hash(  ) . $this->adminid . (  ) );
				$backupCode = ;
					= 6;
				( $backupCode, 0, 16 );
				$backupCode = ;
					= 6;
				$settings['backupcode'] = ( $backupCode );
					= 6;
					= 6;
				( 'tbladmins', array( 'authmodule' => $module, 'authdata' => ( $settings ) ), array( 'id' => $this->adminid ) );
					= 6;
					= 6;
					= 6;
				( $backupCode, 0, 4 ) . ' ' . ( $backupCode, 4, 4 ) . ' ' . ( $backupCode, 8, 4 ) . ' ';
					= 6;
				$backupCode;
			}
		}

		return  . ( 12, 4 );
	}

	function disableUser() {
		if ($this->clientid) {
				= 6;
			( 'tblclients', array( 'authmodule' => '', 'authdata' => '' ), array( 'id' => $this->clientid ) );
			return cjhcifebeg;

			if ($this->adminid) {
			}
		}

			= 6;
		( 'tbladmins', array( 'authmodule' => '', 'authdata' => '' ), array( 'id' => $this->adminid ) );
		return cjhcifebeg;
	}

	function saveUserSettings($arr) {
			= 6;

		if (!( $arr )) {
			return dbebefagji;

			if ($this->clientid) {
					= 6;
				$this->clientsettings = ( $this->clientsettings, $arr );
					= 6;
					= 6;
				( 'tblclients', array( 'authdata' => ( $this->clientsettings ) ), array( 'id' => $this->clientid ) );
				return cjhcifebeg;

				if ($this->adminid) {
						= 6;
					$this->adminsettings;
				}
			}
		}

		$this->adminsettings = ( , $arr );
			= 6;
			= 6;
		( 'tbladmins', array( 'authdata' => ( $this->adminsettings ) ), array( 'id' => $this->adminid ) );
		return cjhcifebeg;
	}

	function getUserSetting($var) {
		if ($this->clientid) {
			if (isset( $this->clientsettings[$var] )) {
				return (true ? $this->clientsettings[$var] : '');
				$this->adminid;
			}


			if () {
			}
		}


		if (isset( $this->adminsettings[$var] )) {
			(true ? $this->adminsettings[$var] : '');
		}

		return ;
	}

	function verifyBackupCode($code) {
		$this->getUserSetting( 'backupcode' );
		$backupCode = ;

		if (!$backupCode) {
			return dbebefagji;
				= 6;
			'/[^a-z0-9]/';
			'';
				= 6;
			$code;
		}

		( (  ) );
			= 6;
		( $code );
		$code = $code = ;
		return $backupCode == $code;
	}

	function generateNewBackupCode() {
		global $whmcs;

		if ($this->clientid) {
			$uid = (true ? $this->clientid : $this->adminid);
				= 6;
				= 6;
			( $whmcs->get_hash(  ) . $uid . (  ) );
			$backupCode = ;
		}

			= 6;
		( $backupCode, 0, 16 );
		$backupCode = ;
			= 6;
		( array( 'backupcode' => $this->saveUserSettings( $backupCode ) ) );
			= 6;
			= 6;
			= 6;
			= 6;
		return ( $backupCode, 0, 4 ) . ' ' . ( $backupCode, 4, 4 ) . ' ' . ( $backupCode, 8, 4 ) . ' ' . ( $backupCode, 12, 4 );
	}
}

?>
