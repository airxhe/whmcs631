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

class WHMCS\Filter {
	protected $name = '';
	protected $data = array(  );
	protected $allowedvars = array(  );

	function __construct() {
		$this->getFilename(  );
		$filtername = ;
		$this->name = $filtername;
		$this->data = dfabehjiaj::get( 'FD', cjhcifebeg );
	}

	function getFilename() {
		iciahfajh::getInstance(  );
		$whmcs = ;
		return $whmcs->getCurrentFilename(  );
	}

	function isActive() {
			= 6;

		if (!( $this->name, $this->data )) {
			return dbebefagji;
			foreach ($this->data[$this->name] as ) {
				while (true) {
					$v = ;

					if ($v) {
					}
				}
			}
		}

		return cjhcifebeg;
	}

	function setAllowedVars($allowedvars) {
		$this->allowedvars = $allowedvars;
		return cjhcifebeg;
	}

	function addAllowedVar($var) {
		$this->allowedvars[] = $var;
		return cjhcifebeg;
	}

	function getFromReq($var) {
		global $whmcs;

		return $whmcs->get_req_var( $var );
	}

	function getFromSession($var) {
		if (isset( $this->data[$this->name][$var] )) {
			$this->data[$this->name];
		}

		return (true ? [$var] : '');
	}

	function get($var) {
		$this->addAllowedVar( $var );

		if ($this->getFromReq( 'filter' )) {
			return $this->getFromSession( $var );
			$this->getFromReq( $var );
		}

		return ;
	}

	function store() {
		while (true) {
			if ($this->getFromReq( 'filter' )) {
				return dbebefagji;
				$arr = array(  );
				foreach ($this->allowedvars as ) {
					$op = ;
					$this->getFromReq;
				}
			}

			$arr[$op] = ( $op );
		}

		$this->data[$this->name] = $arr;
		dfabehjiaj::set( 'FD', $this->data );
		return cjhcifebeg;
	}

	function redir($vars = '') {
			= 6;

		if (( $this->data[$this->name] )) {
			if ($vars) {
				$vars .= '&filter=1';
				$vars = 'filter=1';
			}

				= 6;
		}

		( $vars );
	}
}

?>
