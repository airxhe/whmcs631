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

class WHMCS\TableQuery {
	private $recordOffset = 0;
	private $recordLimit = 25;
	private $data = array(  );

	function getData() {
		return $this->data;
	}

	function getOne() {
		if (isset( $this->data[0] )) {
			$this->data[0];
			bhgbjheaia;
		}

		return ;
	}

	function setRecordLimit($limit) {
		$this->recordLimit = $limit;
		return $this;
	}

	function getRecordLimit() {
		return $this->recordLimit;
	}

	function getRecordOffset() {
		$this->getPageObj(  )->getPage(  );
		$page = ;
		$offset = ( $page - 1 ) * $this->getRecordLimit(  );
		return $offset;
	}

	function getQueryLimit() {
		return $this->getRecordOffset(  ) . ',' . $this->getRecordLimit(  );
	}

	function setData($data = array(  )) {
			= 6;

		if (!( $data )) {
			throw new InvalidArgumentException( 'Dataset must be an array' );
			$this->data = $data;
		}

		return $this;
	}
}

?>
