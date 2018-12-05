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

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'View Reports' );
$aInt = ;
$aInt->title = 'Reports';
$aInt->sidebar = 'reports';
$aInt->icon = 'reports';
$aInt->requiredFiles( array( 'reportfunctions' ) );
$aInt->helplink = 'Reports';
$whmcs->get_req_var( 'report' );
$report = ;
$whmcs->get_req_var( 'displaygraph' );
$displaygraph = ;
$whmcs->get_req_var( 'print' );
$print = ;
$whmcs->get_req_var( 'currencyid' );
$currencyid = ;
$whmcs->get_req_var( 'month' );
$month = ;
$whmcs->get_req_var( 'year' );
$year = ;

if ($displaygraph) {
	preg_replace( '/[^0-9a-z-_]/i', '', $displaygraph );
	$displaygraph = ;
	$graphfile = '../modules/reports/' . $displaygraph . '.php';

	if (file_exists( $graphfile )) {
		require( $graphfile );
	}
}
else {
	if (!$month) {
		date( 'm' );
		$month = ;

		if (!$year) {
			date( 'Y' );
			$year = ;
			$months[(int)$month];
			$currentmonth = ;
			$currentyear = $dh;
			str_pad( $month, 2, '0', STR_PAD_LEFT );
			$month = ;
			$requeststr = '?' . http_build_query( $_REQUEST );
			new WHMCSChart(  );
			$chart = ;
			new ddhjgidcb(  );
			$gateways = ;
			$args = array(  );
			$chartsdata = ;
			$reportdata = ;
			$data = ;

			if ($month == '1') {
				$prevMonthLink = 'month=12&year=' . ( $year - 1 );
				$prevMonthText = '&laquo; December ' . ( $year - 1 );
			}
		}
	}
}

require( $reportPath );
jmp;
redir(  );

if (!is_array( $reportdata )) {
	exit( '$reportdata must be returned as an array' );
	run_hook( 'ReportViewPreOutput', array( 'report' => $report, 'moduleType' => $moduleType, 'moduleName' => $moduleName ) );
	http_build_query( $_REQUEST );
	$requestString = ;

	if (!$print) {
		if ($whmcs->get_req_var( 'report' ) != 'pdf_batch') {
			echo '<div class="pull-right btn-group btn-group-sm">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-cogs"></i> ' . $aInt->lang( 'reports', 'tools' ) . ' <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="csvdownload.php?' . $requestString . '"><i class="fa fa-download"></i> ' . $aInt->lang( 'reports', 'exportcsv' ) . '</a></li>
                    <li><a href="' . $whmcs->getPhpSelf(  ) . '?' . $requestString . '&print=true"><i class="fa fa-print"></i> ' . $aInt->lang( 'reports', 'printableversion' ) . '</a></li>
                    </ul>
                  </div>';
		}
	}
}

(  );

if ((bool)) {
	echo '<td>Drill Down</td>';
	echo '</tr>';

	if (( array_key_exists( 'tablesubheadings', $reportdata ) && is_array( $reportdata['tablesubheadings'] ) )) {
		echo '<tr bgcolor="#efefef" style="text-align:center;font-weight:bold;">';
		foreach ($reportdata['tablesubheadings'] as ) {
			$heading = ;
			echo  . '<td>' . $heading . '</td>';
			break;
		}


		if (is_array( $reportdata['drilldown'] )) {
			echo '<td>Drill Down</td>';
			echo '</tr>';
			count( $reportdata['tableheadings'] );
			$columncount = ;

			if (( array_key_exists( 'drilldown', $reportdata ) && is_array( $reportdata['drilldown'] ) )) {
				++$columncount;

				if (( array_key_exists( 'tablevalues', $reportdata ) && is_array( $reportdata['tablevalues'] ) )) {
					foreach ($reportdata['tablevalues'] as ) {
						$values = ;
						$num = ;

						if (( isset( $values[0] ) && $values[0] == 'HEADER' )) {
							echo '<tr bgcolor="#efefef" style="text-align:center;font-weight:bold;">';
							foreach ($values as ) {
								$value = ;
								$k = ;

								if (0 < $k) {
									echo  . '<td>' . $value . '</td>';
									break 2;
								}

								break 2;
							}

							echo '</tr>';
							break;
						}

						break;
					}
				}
			}
		}
	}
}
else {
	echo  . '<tr bgcolor="' . $rowbgcolor . '" style="text-align:center;">';
	foreach ($values as ) {
		$value = ;

		if (substr( $value, 0, 2 ) == '**') {
			echo  . '<td bgcolor="#efefef" colspan="' . $columncount . '" align="left">&nbsp;' . substr( $value, 2 ) . '</td>';
			break;
		}

		break;
	}


	if (( array_key_exists( 'drilldown', $reportdata ) && is_array( $reportdata['drilldown'][$num]['tableheadings'] ) )) {
		echo '<td><a href="#" onclick="$(\'#drilldown' . $num . '\').fadeToggle();return false">Drill Down</a></td>';
		echo '</tr>';

		if (( array_key_exists( 'drilldown', $reportdata ) && is_array( $reportdata['drilldown'][$num]['tableheadings'] ) )) {
			echo '<tr bgcolor="#FFFFCC" id="drilldown' . $num . (  . '" style="display:none;"><td colspan="' . $columncount . '" style="padding:20px;">' );
			echo '<table width=100% ';

			if ($print == 'true') {
				echo 'border=1 cellspacing=0';
			}


			if ((  && array_key_exists( 'footertext', $data ) )) {
				echo '<p>' . $data['footertext'] . '</p>';

				if (array_key_exists( 'footertext', $reportdata )) {
					echo $reportdata['footertext'];
					run_hook;
					'ReportViewPostOutput';
					array( 'report' => $report, 'moduleType' => $moduleType, 'moduleName' => $moduleName );
				}

				(  );
			}

			$btnclass = 'btn-inverse';
			foreach ($reports_array as ) {
				$report_name = ;

				if (isset( $text_reports[$report_name] )) {
					$reps[] = '<input type="button" value="' . $text_reports[$report_name] . '" class="btn ' . $btnclass . '" onclick="window.location=\'reports.php?report=' . $report_name . '\'" />';
					unset( $text_reports[$report_name] );
					break;
				}

				break;
			}

			echo '<div>' . implode( ' ', $reps ) . '</div>';
		}
	}
}

echo '</div>';

if ($report) {
	echo '<p class="text-right text-muted">' . $aInt->lang( 'reports', 'generatedon' ) . ' ' . fromMySQLDate( date( 'Y-m-d H:i:s' ), 'time' ) . '</p>
<p align="center">';
}


if ($print == 'true') {
	echo '<a href="javascript:window.close()">' . $aInt->lang( 'reports', 'closewindow' ) . '</a>';
	echo '</p>';

	if ($print) {
		echo '
</div>
</body>
</html>';
		return 1;
		ob_get_contents(  );
		$content = ;
		ob_end_clean;
	}
}

(  );
$aInt->content = $content;
$aInt->display(  );
?>
