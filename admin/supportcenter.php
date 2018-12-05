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
new dgeegejige( 'Support Center Overview' );
$aInt = ;
$aInt->title = $aInt->lang( 'support', 'supportoverview' );
$aInt->sidebar = 'support';
$aInt->icon = 'support';
$aInt->helplink = 'Support Center';
$aInt->requiredFiles( array( 'ticketfunctions', 'reportfunctions' ) );
ob_start(  );
'
<form method="post" action="' . $_SERVER['PHP_SELF'] . '">
<div style="background-color:#f6f6f6;padding:5px 15px;">Displaying Overview For: <select name="period" class="form-control select-inline" onchange="submit()"><option>Today</option><option';

if ($period == 'Yesterday') {
		. (true ? ' selected' : '') . '>Yesterday</option><option';

	if ($period == 'This Week') {
			. (true ? ' selected' : '') . '>This Week</option><option';

		if ($period == 'This Month') {
				. (true ? ' selected' : '') . '>This Month</option><option';

			if ($period == 'Last Month') {
				echo  . (true ? ' selected' : '') . '>Last Month</option></select></div>
</form>

<div style="border:2px solid #f6f6f6;border-top:0;">';
				new WHMCSChart(  );
				$chart = ;

				if ($period == 'Yesterday') {
					$date = 'date LIKE \'' . date( 'Y-m-d', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) - 1, date( 'Y' ) ) ) . '%\'';
					jmp;

					if ($period == 'This Week') {
						strtotime( 'last monday' );
						$last_monday = ;
						strtotime( 'next sunday' );
						$next_sunday = ;
						$date = 'date>=\'' . date( 'Y-m-d', $last_monday ) . '\' AND date<=\'' . date( 'Y-m-d', $next_sunday ) . ' 23:59:59\'';
					}

					$date = 'date LIKE \'' . ( ( date( 'Y' ) ) ) . '%\'';
				}
			}
		}
	}
}
else {
	if (0 < $replytimes[2]) {
		$avereplieschartdata['rows'][] = array( 'c' => array( array( 'v' => '1-4 Hours' ), array( 'v' => $replytimes[2], 'f' => $replytimes[2] ) ) );

		if (0 < $replytimes[4]) {
			array( array( 'v' => '4-8 Hours' ), array( 'v' => $replytimes[4], 'f' => $replytimes[2] ) );
		}
	}

	$avereplieschartdata['rows'][] = array( 'c' =>  );

	if (0 < $replytimes[8]) {
		$avereplieschartdata['rows'][] = array( 'c' => array( array( 'v' => '8-16 Hours' ), array( 'v' => $replytimes[8], 'f' => $replytimes[8] ) ) );

		if (0 < $replytimes[16]) {
			$avereplieschartdata['rows'][] = array( 'c' => array( array( 'v' => '16-24 Hours' ), array( 'v' => $replytimes[16], 'f' => $replytimes[16] ) ) );

			if (0 < $replytimes[24]) {
				$avereplieschartdata['rows'][] = array( 'c' => array( array( 'v' => '24+ Hours' ), array( 'v' => $replytimes[24], 'f' => $replytimes[24] ) ) );
				$averepliesargs = array(  );
			}
		}

		$averepliesargs['title'] = 'Average First Reply Time';
		$averepliesargs['legendpos'] = 'right';
		$hourschartdata = array(  );
		$hourschartdata['cols'][] = array( 'label' => 'Timeframe', 'type' => 'string' );
		$hourschartdata['cols'][] = array( 'label' => 'Number of Tickets', 'type' => 'number' );
		foreach ($hours as ) {
			$count = ;
			$hour = ;
			$hourschartdata['rows'][] = array( 'c' => array( array( 'v' => $hour ), array( 'v' => $count, 'f' => $count ) ) );
			break;
		}

		$hoursargs = array(  );
		$hoursargs['title'] = 'Tickets Submitted by Hour';
		$hoursargs['xlabel'] = 'Number of Tickets Submitted';
		$hoursargs['ylabel'] = 'Hour';
		$hoursargs['legendpos'] = 'none';
		echo '<style>
.ticketstatbox {
    margin: 20px 10px 0;
    width: 150px;
    padding: 20px;
    font-size: 14px;
    text-align: center;
    background-color: #FEFAEB;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    -o-border-radius: 10px;
    border-radius: 10px;
}
.ticketstatbox .stat {
    font-size: 24px;
    color: #000066;
}
</style>
<table align="center">
<tr>
<td>
<div class="ticketstatbox">
New Tickets
<div class="stat">' . $newtickets . '</div>
</div>
</td>
<td>
<div class="ticketstatbox">
Client Replies
<div class="stat">' . $clientreplies . '</div>
</div>
</td>
<td>
<div class="ticketstatbox">
Staff Replies
<div class="stat">' . $staffreplies . '</div>
</div>
</td>
<td>
<div class="ticketstatbox">
Tickets Without Reply
<div class="stat">' . $opennoreply . '</div>
</div>
</td><td>
<div class="ticketstatbox">
Average First Response
<div class="stat">' . $avefirstresponse . ' Hours</div>
</div>
</td>
</tr>
</table>';
		echo '<table width="100%"><tr><td width="40%">';
		echo $chart->drawChart( 'Pie', $avereplieschartdata, $averepliesargs, '500px', '100%' );
		echo '</td><td width="60%">';
		echo $chart->drawChart( 'Bar', $hourschartdata, $hoursargs, '600px', '100%' );
		echo '</td></tr></table>';
		echo '</div>';
		ob_get_contents(  );
		$content = ;
		ob_end_clean(  );
		$aInt->content = $content;
	}

	$aInt->display;
}

(  );
?>
