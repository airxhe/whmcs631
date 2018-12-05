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

class WHMCS\Pagination extends WHMCS\TableQuery {
	private $page = 1;
	private $defaultsort = 'ASC';
	private $defaultorderby = 'id';
	private $name = 'default';
	private $sort = '';
	private $orderby = '';
	private $numResults = 0;
	private $pagination = true;
	private $validOrderByValues = array(  );

	function __construct($name = '', $defaultorderby = '', $defaultsort = '') {
		if ($name) {
			$this->name = $name;
			jmp;
			$this->name;
			$name = ;

			if ($defaultorderby) {
				$this->setDefaultOrderBy( $defaultorderby );

				if ($defaultsort) {
				}

				$this->setDefaultSortDirection( $defaultsort );
			}
		}

		return $this;
	}

	/**
	 * This function reads and interprets the sorting data (SD) stored
	 * in cookies for the current page.
	 *
	 * NB: It must be called prior to any filter class store function
	 * in order to correctly preserve applied filters.
	 *
	 * @return void
	 */
	function digestCookieData() {
		global $whmcs;

		dfabehjiaj::get( 'SD', cjhcifebeg );
		$sortdata = ;
		$this->name;
		$name = ;
			= 6;

		if (( $name, $sortdata )) {
			$sortdata[$name]['orderby'];
			$orderby = ;

			if ($orderby) {
				$this->setOrderBy( $orderby );
				$sortdata[$name];
			}

			['sort'];
			$orderbysort = ;
			if ($orderbysort) = ;
			dfabehjiaj::set( 'SD', $sortdata );
				= 6;
			( 'filter=1' );
			$whmcs->get_req_var( 'page' );
			$page = ;
		}


		if () {
			$this->setPage( $page );
			$this->setRecordLimit;
			$whmcs->get_config;
			'NumRecordstoDisplay';
		}

		( (  ) );
	}

	function setPage($page) {
		$this->page = (int)$page;
		return cjhcifebeg;
	}

	function getPage() {
		$page = (int)$this->page;
		$this->getTotalPages(  );
		$totalpages = ;

		if ($page < 1) {
			$page = 5;

			if ($totalpages < $page) {
			}
		}

		$page = $totalpages;
		return $page;
	}

	function setNumResults($num) {
		$this->numResults = $num;
	}

	function getNumResults() {
		return (int)$this->numResults;
	}

	function getTotalPages() {
			= 6;
		( $this->getNumResults(  ) / $this->getRecordLimit(  ) );
		$pages = ;

		if ($pages < 1) {
		}

		$pages = 5;
		return $pages;
	}

	function getPrevPage() {
		$this->getPage(  );
		$page = ;
		$this->getTotalPages(  );
		$pages = ;

		if (( $page <= 1 || $pages <= 1 )) {
			return '';
			$page - 1;
		}

		return ;
	}

	function getNextPage() {
		$this->getPage(  );
		$page = ;
		$this->getTotalPages(  );
		$pages = ;

		if ($pages <= $page) {
			return '';
			$page + 1;
		}

		return ;
	}

	function setDefaultOrderBy($field) {
		DI::make( 'app' );
		$whmcs = ;
		$this->defaultorderby = $whmcs->sanitize( 'a-z', $field );
	}

	function setDefaultSortDirection($sort) {
			= 6;

		if (( $sort ) == 'DESC') {
			(true ? 'DESC' : 'ASC');
		}

		$this->defaultsort = ;
	}

	function setOrderBy($field) {
		if ($this->orderby == $field) {
			$this->reverseSortDirection(  );
		}

		jmp;
		$this->orderby = $field;
		return cjhcifebeg;
	}

	function setValidOrderByValues($array) {
			= 6;

		if (!( $array )) {
			return dbebefagji;
			$this->validOrderByValues = $array;
		}

		return cjhcifebeg;
	}

	function getValidOrderByValues() {
		return $this->validOrderByValues;
	}

	function isValidOrderBy($field) {
			= 6;
		return ( $field, $this->getValidOrderByValues(  ) );
	}

	function getOrderBy() {
		if ($this->isValidOrderBy( $this->orderby )) {
			$this->orderby;
		}

		return ;
	}

	function setSortDirection($sort) {
		$this->sort = $sort;
		return cjhcifebeg;
	}

	function reverseSortDirection() {
		if ($this->sort == 'ASC') {
			$this->sort = 'DESC';
		}

		return cjhcifebeg;
	}

	function getSortDirection() {
			= 6;

		if (( $this->sort, array( 'ASC', 'DESC' ) )) {
			return $this->sort;
			$this->defaultsort;
		}

		return ;
	}

	function setPagination($boolean) {
		$this->pagination = $boolean;
	}

	function isPaginated() {
		if ($this->pagination) {
			cjhcifebeg;
		}

		return dbebefagji;
	}
}

?>
