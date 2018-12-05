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

class WHMCS\MobileListTable extends WHMCS\ListTable {
	protected $tableheadoutput = '';
	protected $sortableTableCount = 0;

	function addTableHeadOutput($html) {
		$this->tableheadoutput .= $html . ' ';
	}

	function outputTableHeader() {
		global $aInt;

		$this->getPageObj(  )->getPage(  );
		$page = ;
		$this->getPageObj(  )->getTotalPages(  );
		$pages = ;
		$this->getPageObj(  )->getNumResults(  );
		$numResults = ;
		$content = '<div style="margin:5px 0 0 5px;float:left;">' . $this->tableheadoutput . '</div><div style="margin:13px 0 0 5px;float:left;">' . $numResults . ' ' . $aInt->lang( 'global', 'recordsfound' ) . ', ' . $aInt->lang( 'global', 'page' ) . ' ' . $page . ' ' . $aInt->lang( 'global', 'of' ) . ' ' . $pages . '</div>';
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
<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke ui-body-d table-stripe">
  <thead>
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

							if (isset( $column[3] )) {
								$priority = (true ? $column[3] : '');

								if (!$columnid) {
									$sortableheader = dbebefagji;
									break;
								}
							}
						}
					}


					if ($priority) {
						$priority = (true ? ' data-priority="' . $priority . '"' : '');
						$content .= '<th' . $width . $priority . '>';

						if ($sortableheader) {
							$content .= '<a href="' . $_SERVER['PHP_SELF'] . '?orderby=' . $columnid . '" data-ajax="false">';
							$content .= $sortDirection;

							if ($sortableheader) {
								$content .= '</a>';

								if ($orderby == $columnid) {
										= 6;
									$content .= ' <img src="images/' . ( $sortDirection ) . '.gif" class="absmiddle" />';
								}
							}
						}
					}
				}
			}
		}


		while (true) {
			$content .= '</th>';
		}

		$content .= '</tr>
  </thead>
  <tbody>
';
			= 6;
		( $columns );
		$totalcols = ;
		$this->getRows(  );
		$rows = ;
			= 6;

		if (( $rows )) {
			foreach ($rows as ) {
				$vals = ;

				if ($vals[0] == 'dividingline') {
					$content .= '<tr><td colspan="' . $totalcols . '" style="background-color:#efefef;"><div align="left"><b>' . $vals[1] . '</b></div></td></tr>';
					break;
				}

				break;
			}

			jmp;
			$content .= '<tr><td colspan="' . $totalcols . '">' . $aInt->lang( 'global', 'norecordsfound' ) . '</td></tr>';
			$content .= '  </tbody>
</table>
';

			if ($this->getMassActionBtns(  )) {
				$this->getMassActionBtns(  );
			}
		}

		$content .= '<div data-role="controlgroup" data-type="horizontal">' .  . '</div>
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
		$content = '<div class="tablepagenav" data-role="controlgroup" data-type="horizontal">';

		if ($prevPage) {
			$content .= '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . $prevPage . '&filter=1" data-role="button" data-icon="arrow-l" data-iconpos="left" data-mini="true">';
			$content .= 'Prev Page';
			$content .= '</a>';
			jmp;
			$content .= '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . $prevPage . '&filter=1" data-role="button" data-icon="arrow-l" data-iconpos="left" data-mini="true" class="ui-disabled">';
			$content .= 'Prev Page';
			$content .= '</a>';

			if ($nextPage) {
				$content .= '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . $nextPage . '&filter=1" data-role="button" data-icon="arrow-r" data-iconpos="right" data-mini="true">';
				$content .= 'Next Page';
				$content .= '</a>';
			}

			$content .= '<a href="' . ['PHP_SELF'] . '?page=' . $nextPage . '&filter=1" data-role="button" data-icon="arrow-r" data-iconpos="right" data-mini="true" class="ui-disabled">';
			$content .= 'Next Page';
			$content .= '</a>';
			$content .= '</div>';
			$this->addOutput( $content );
		}

	}
}

?>
