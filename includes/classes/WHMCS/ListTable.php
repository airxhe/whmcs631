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

class WHMCS\ListTable {
	protected $pagination = true;
	protected $columns = array(  );
	protected $rows = array(  );
	protected $output = array(  );
	protected $showmassactionbtnstop = false;
	protected $massactionurl = '';
	protected $massactionbtns = '';
	protected $sortableTableCount = 0;
	protected $pageObj = null;

	function __construct($obj, $tableCount = 0) {
		$this->pageObj = $obj;
		$this->sortableTableCount = $tableCount;
	}

	function getPageObj() {
		return $this->pageObj;
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

	function setMassActionURL($url) {
		$this->massactionurl = $url;
		return cjhcifebeg;
	}

	function getMassActionURL() {
		$this->massactionurl;
		$url = ;

		if (!$url) {
		}

		$_SERVER['PHP_SELF'];
		$url = ;
			= 6;

		if (( $url, '?' )) {
			$url .= '&';
		}

		$url .= '?';
		$url .= 'filter=1';
		return $url;
	}

	function setMassActionBtns($btns) {
		$this->massactionbtns = $btns;
		return cjhcifebeg;
	}

	function getMassActionBtns() {
		return $this->massactionbtns;
	}

	function setShowMassActionBtnsTop($boolean) {
		$this->showmassactionbtnstop = $boolean;
		return cjhcifebeg;
	}

	function getShowMassActionBtnsTop() {
		if ($this->showmassactionbtnstop) {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	function setColumns($array) {
			= 6;

		if (!( $array )) {
			return dbebefagji;
			$this->columns = $array;
			$orderbyvals = array(  );
			foreach ($array as ) {
				$vals = ;
					= 6;
				$vals;
			}
		}


		while (true) {
			if (( (  ) && $vals[0] )) {
				$orderbyvals[] = $vals[0];
				break;
			}
		}

		$this->getPageObj(  )->setValidOrderByValues( $orderbyvals );
		return cjhcifebeg;
	}

	function getColumns() {
		return $this->columns;
	}

	function addRow($array) {
			= 6;
		if (!( $array )) = $array;
		return cjhcifebeg;
	}

	function getRows() {
		return $this->rows;
	}

	function outputTableHeader() {
		global $aInt;

		$this->getPageObj(  )->getPage(  );
		$page = ;
		$this->getPageObj(  )->getTotalPages(  );
		$pages = ;
		$this->getPageObj(  )->getNumResults(  );
		$numResults = ;
		$content = '<form method="post" action="' . $_SERVER['PHP_SELF'] . '?filter=1">
<table width="100%" border="0" cellpadding="3" cellspacing="0"><tr>
<td width="50%" align="left">' . $numResults . ' ' . $aInt->lang( 'global', 'recordsfound' ) . ', ' . $aInt->lang( 'global', 'page' ) . ' ' . $page . ' ' . $aInt->lang( 'global', 'of' ) . ' ' . $pages . '</td>
<td width="50%" align="right">' . $aInt->lang( 'global', 'jumppage' ) . ': <select name="page" onchange="submit()">';
		$newpage = 6;

		if ($newpage <= $pages) {
			$content .= '<option value="' . $newpage . '"';

			if ($page == $newpage) {
				$content .= ' selected';
				'>' . $newpage . '</option>';
			}
		}


		while (true) {
			$content .= ;
			++$newpage;
		}

		$content .= '</select> <input type="submit" value="' . $aInt->lang( 'global', 'go' ) . '" class="btn btn-xs btn-default" /></td>
</tr></table>
</form>
';
		$this->addOutput( $content );
	}

	function outputTable() {
		global $aInt;

		$this->getPageObj(  )->getOrderBy(  );
		$orderby = ;
		$this->getPageObj(  )->getSortDirection(  );
		$sortDirection = ;
		$content = '';

		if ($this->getMassActionURL(  )) {
			$content .= '<form method="post" action="' . $this->getMassActionURL(  ) . '">';

			if ($this->getShowMassActionBtnsTop(  )) {
				$content .= '<div style="padding-bottom:2px;">' . $aInt->lang( 'global', 'withselected' ) . ': ' . $this->getMassActionBtns(  ) . '</div>';
				$content .= '
<div class="tablebg">
<table id="sortabletbl' . $this->sortableTableCount . '" class="datatable" width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>';
				$this->getColumns(  );
				$columns = ;
				foreach ($columns as ) {
					$column = ;
						= 6;

					if (( $column )) {
						$sortableheader = cjhcifebeg;
						$column[0];
						$columnid = ;
						$column[1];
						$columnname = ;

						if (isset( $column[2] )) {
							$width = (true ? $column[2] : '');

							if (!$columnid) {
								$sortableheader = dbebefagji;
							}

							$columnname = $vals;

							if (!$columnname) {
								$content .= '<th width="20"></th>';
								break;
							}

							break;
						}

						break;
					}
				}
			}
		}
		else {
			$width = (true ?  . '"' : '');
			$content .= '<th' . $width . '>';

			if ($sortableheader) {
				while (true) {
					$content .= '<a href="' . $_SERVER['PHP_SELF'] . '?orderby=' . $columnid . '">';
					$content .= $trValue;

					if ($sortableheader) {
						$content .= '</a>';

						if ($orderby == $columnid) {
								= 6;
							$content .= ' <img src="images/' . ( $sortDirection ) . '.gif" class="absmiddle" />';
							$content .= '</th>';
							break;
						}
					}
					else {
						$this->getRows(  );
						$rows = ;
							= 6;

						if (( $rows )) {
							foreach ($rows as ) {
								$vals = ;
							}
						}
					}


					if ($vals[0] == 'dividingline') {
						$content .= '<tr><td colspan="' . $totalcols . '" style="background-color:#efefef;"><div align="left"><b>' . $vals[1] . '</b></div></td></tr>';
						break;
					}

					jmp;
					$content .=  . '</td>';
				}

				$content .= '</tr>';
			}

			jmp;
			$content .= ;
		}

		$content .= '</table>
</div>';

		if ($this->getMassActionBtns(  )) {
			'' . $aInt->lang( 'global', 'withselected' ) . ': ';
			$this->getMassActionBtns;
		}

		$content .=  . (  ) . '
</form>
';
		$this->addOutput( $content );
	}

	function outputTablePagination() {
		global $aInt;

		$this->getPageObj(  )->getPrevPage(  );
		$prevPage = ;
		$this->getPageObj(  )->getNextPage(  );
		$nextPage = ;
		$content = '<ul class="pager">';

		if ($prevPage) {
			'<li class="previous"><a href="' . $_SERVER['PHP_SELF'] . '?page=' . $prevPage;
		}

		$content .=  . '&filter=1">';
		jmp;
		$content .= '<li class="previous disabled"><a href="#">';
		$content .= '&laquo; ' . $aInt->lang( 'global', 'previouspage' );
		$content .= '</a></li>';

		if ($nextPage) {
			$content .= '<li class="next"><a href="' . $_SERVER['PHP_SELF'] . '?page=' . $nextPage . '&filter=1">';
			jmp;
			$content .= '<li class="next disabled"><a href="#">';
			$aInt->lang;
			'global';
		}

		$content .= ( 'nextpage' ) . ' &raquo;';
		$content .= '</a></li>';
		$content .= '</ul>';
		$this->addOutput( $content );
	}

	function addOutput($content) {
		$this->output[] = $content;
	}

	function output() {
		if ($this->isPaginated(  )) {
			$this->outputTableHeader(  );
			$this->outputTable(  );

			if ($this->isPaginated(  )) {
				$this->outputTablePagination(  );
			}
		}

			= 6;
		return ( '
', $this->output );
	}
}

?>
