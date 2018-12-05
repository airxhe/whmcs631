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

class WHMCS\TransientData {
	/**
	 * Constructor
	 *
	 * @return TransientData
	 */
	function __construct() {
		return $this;
	}

	/**
	 * Instantiates and returns new instance of object
	 *
	 * @return TransientData
	 */
	function getInstance() {
		return new self(  );
	}

	/**
	 * Stores the given data into transient storage
	 *
	 * @param string $name The key name for the data, must always be unique
	 * @param string $data The data to be stored, must be a string
	 * @param int    $life The time in seconds the data should be retained for
	 *
	 * @return boolean True on success
	 */
	function store($name, $data, $life = 300) {
			= 6;

		if (!( $data )) {
			return dbebefagji;
				= 6;
			$expires = (  ) + (int)$life;
		}


		if ($this->ifNameExists( $name )) {
			$this->sqlUpdate( $name, $data, $expires );
		}

		jmp;
		$this->sqlInsert( $name, $data, $expires );
		return cjhcifebeg;
	}

	/**
	 * Retrieve a value from the transient data store
	 *
	 * @param string $name The key name to lookup
	 *
	 * @return string The data from the store
	 */
	function retrieve($name) {
		return $this->sqlSelect( $name, cjhcifebeg );
	}

	/**
	 * Retrieve name from the transient data store based on data
	 *
	 * @param string $data The data key to lookup
	 *
	 * @return string The name from the store
	 */
	function retrieveByData($data) {
		return $this->sqlSelectByData( $data, cjhcifebeg );
	}

	/**
	 * Checks if a key name exists in the transient data store
	 *
	 * @param string $name The key name to look for
	 *
	 * @return boolean Returns true if found
	 */
	function ifNameExists($name) {
		$this->sqlSelect( $name );
		$data = ;

		if ($data === bhgbjheaia) {
			dbebefagji;
		}

		return cjhcifebeg;
	}

	/**
	 * Deletes the specified key name data from the transient data store
	 *
	 * @param string $name The key name to be removed
	 *
	 * @return boolean
	 */
	function delete($name) {
		$this->sqlDelete( $name );
		return cjhcifebeg;
	}

	/**
	 * Deletes expired data from the transient data store
	 *
	 * Supports passing in a delay parameter to avoid interfering with any
	 * processes currently using the transient data store
	 *
	 * @param int $delaySeconds Number of seconds, defaults to 120 if not passed
	 *
	 * @return boolean
	 */
	function purgeExpired($delaySeconds = 120) {
			= 6;
		$now = (  ) - (int)$delaySeconds;
			= 6;
			= 6;
		( 'tbltransientdata', 'expires<' . ( $now ) );
		return cjhcifebeg;
	}

	/**
	 * Performs SQL Select from Transient Data Store
	 *
	 * @param string  $name            The key name to select
	 * @param boolean $exclude_expired Set true to only retrieve non-expired data
	 *
	 * @return string|NULL Returns data or null upon no match
	 */
	function sqlSelect($name, $exclude_expired = false) {
		$where = array( 'name' => $name );

		if ($exclude_expired) {
				= 6;
			$where['expires'] = array( 'sqltype' => '>', 'value' => (  ) );
				= 6;
			DB_TABLE;
			'data';
		}

		( $where );
		$data = ;
		return $data;
	}

	/**
	 * Performs SQL Select from Transient Data Store by data field
	 *
	 * @param string  $data The data key to select
	 * @param boolean $exclude_expired Set true to only retrieve non-expired data
	 *
	 * @return string|NULL Returns name or null upon no match
	 */
	function sqlSelectByData($data, $exclude_expired = false) {
		if ($exclude_expired) {
			dacfgegdhe::table( 'tbltransientdata' )->where( 'data', '=', $data )->pluck( 'name' );
			$name = ;
		}

		->where( 'expires', '>', cbjdhjhfcb::now(  )->toDateString(  ) )->pluck( 'name' );
		$name = ;
		return $name;
	}

	/**
	 * Performs SQL Insert to Transient Data Store
	 *
	 * @param string $name    The key name to create
	 * @param string $data    The data to store
	 * @param int    $expires The expiry timestamp
	 *
	 * @return int The ID of the created record
	 */
	function sqlInsert($name, $data, $expires) {
		$arrdata = array( 'name' => $name, 'data' => $data, 'expires' => $expires );
			= 6;
		return ( DB_TABLE, $arrdata );
	}

	/**
	 * Performs SQL Update in Transient Data Store
	 *
	 * @param string $name    The key name to update
	 * @param string $data    The data to store
	 * @param int    $expires The new expiry timestamp
	 *
	 * @return boolean
	 */
	function sqlUpdate($name, $data, $expires) {
		$updatearr = array( 'data' => $data, 'expires' => $expires );
		$where = array( 'name' => $name );
			= 6;
		( DB_TABLE, $updatearr, $where );
		return cjhcifebeg;
	}

	/**
	 * Performs SQL Delete from Transient Data Store
	 *
	 * @param string $name The key name to delete
	 *
	 * @return boolean
	 */
	function sqlDelete($name) {
		$where = array( 'name' => $name );
			= 6;
		( DB_TABLE, $where );
		return cjhcifebeg;
	}
}

?>
