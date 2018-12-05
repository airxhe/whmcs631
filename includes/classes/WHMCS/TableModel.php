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

class WHMCS\TableModel extends WHMCS\TableQuery {
	private $pageObj = null;
	private $queryObj = null;

	function __construct($obj = null) {
		DI::make( 'app' );
		$whmcs = ;
		$this->pageObj = $obj;
		$whmcs->get_config( 'NumRecordstoDisplay' );
		$numrecords = ;
		$this->setRecordLimit( $numrecords );
		return $this;
	}

	function _execute($implementationData = null) {
	}

	function setPageObj($pageObj) {
		$this->pageObj = $pageObj;
	}

	function getPageObj() {
		return $this->pageObj;
	}

	function execute($implementationData = null) {
		$this->_execute( $implementationData );
		$results = ;
		$this->getPageObj(  )->setData( $results );
		return $this;
	}
}

?>
