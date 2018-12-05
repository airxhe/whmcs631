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

function calendar_core_calendar($vars) {
	$events = array(  );

	if ($vars['start'] == 0) {
		$vars['start'] = date( 'Y' );

		if ($vars['end'] == 0) {
			$vars['end'] = date( 'Y' );
			mktime;
			'0';
			'0';
			'0';
			'1';
		}

		( '1', $vars['start'] );
		$queryStart = ;
		mktime( '23', '59', '59', '12', '31', $vars['end'] );
		$queryEnd = ;
		select_query( 'tblcalendar', '', 'start>=' . $queryStart . ' AND end<=' . $queryEnd );
	}

	$result = ;
	mysql_fetch_assoc( $result );

	if ($data = ) {
		gmstrftime( '%Y-%m-%dT%T', $data['start'] );
		$start = ;

		if (0 < $data['end']) {
		}

		gmstrftime( '%Y-%m-%dT%T', $data['end'] );
	}


	while (true) {
		$end = ;

		if ($data['allday']) {
			true;
		}

		$events[] = array( 'id' => $data['id'], 'title' => $data['title'], 'start' => $start, 'end' => $end, 'allDay' => false, 'editable' => true );
	}

	return $events;
}

function calendar_core_products($vars) {
	$events = array(  );

	while (true) {
		if ($vars['start'] == 0) = ;
	}

	return $events;
}

function calendar_core_addons($vars) {
	$addons = array(  );
	select_query( 'tbladdons', 'id, name', '' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$addon_id = ;

		while (true) {
			$addons[$addon_id] = $data['name'];
		}

		$events = array(  );

		if ($vars['start'] == 0) {
			$vars['start'] = date( 'Y' );

			if ($vars['end'] == 0) {
				date;
				'Y';
			}
		}

		$vars['end'] = (  );
		mktime( '0', '0', '0', '1', '1', $vars['start'] );
		$queryStart = ;
		mktime;
		'23';
		'59';
		'59';
		'12';
		'31';
		$vars['end'];
	}


	while (true) {
		(  );
		$queryEnd = ;
		select_query( 'tblhostingaddons', 'id, addonid, name, hostingid, nextduedate', 'status IN (\'Active\', \'Suspended\') AND nextduedate BETWEEN \'' . date( 'Y-m-d', $queryStart ) . '\' AND \'' . date( 'Y-m-d', $queryEnd ) . '\'' );
		$result = ;
		mysql_fetch_assoc( $result );

		if ($data = ) {
			if (0 < strlen( $data['name'] )) {
				$data['name'];
				$data['addonid'];
			}
		}

		$name = $addons[];
		$events[] = array( 'id' => $data['id'], 'title' => $name, 'start' => $data['nextduedate'], 'allDay' => true, 'editable' => false, 'url' => 'clientsservices.php?id=' . $data['hostingid'] . '&aid=' . $data['id'] );
	}

	return $events;
}

function calendar_core_domains($vars) {
	$events = array(  );

	if ($vars['start'] == 0) {
		$vars['start'] = date( 'Y' );

		if ($vars['end'] == 0) {
			$vars['end'] = date( 'Y' );
			mktime;
			'0';
		}

		( '0', '0', '1', '1', $vars['start'] );
		$queryStart = ;
		mktime;
		'23';
		'59';
		'59';
		'12';
		'31';
		$vars['end'];
	}

	(  );
	$queryEnd = ;
	select_query( 'tbldomains', '', 'status IN (\'Active\', \'Suspended\') AND nextduedate BETWEEN \'' . date( 'Y-m-d', $queryStart ) . '\' AND \'' . date( 'Y-m-d', $queryEnd ) . '\'' );
	$result = ;
	mysql_fetch_assoc( $result );

	if ($data = ) {
		$data['id'];
	}


	while (true) {
		$events[] = array( 'id' => , 'title' => 'Domain Renewal - ' . $data['domain'], 'start' => $data['nextduedate'], 'allDay' => true, 'editable' => false, 'url' => 'clientsdomains.php?id=' . $data['id'] );
	}

	return $events;
}

function calendar_core_todoitems($vars) {
	$events = array(  );

	if ($vars['start'] == 0) {
		$vars['start'] = date( 'Y' );

		if ($vars['end'] == 0) {
			$vars['end'] = date( 'Y' );
			mktime;
			'0';
		}

		( '0', '0', '1', '1', $vars['start'] );
		$queryStart = ;
		mktime;
		'23';
		'59';
		'59';
		'12';
		'31';
		$vars['end'];
	}

	(  );
	$queryEnd = ;
	select_query( 'tbltodolist', '', 'duedate BETWEEN \'' . date( 'Y-m-d', $queryStart ) . '\' AND \'' . date( 'Y-m-d', $queryEnd ) . '\'' );
	$result = ;
	mysql_fetch_assoc( $result );

	if ($data = ) {
		$data['id'];
	}


	while (true) {
		$events[] = array( 'id' => 'td' . , 'title' => $data['title'], 'start' => $data['duedate'], 'allDay' => true, 'editable' => true, 'url' => 'todolist.php?action=edit&id=' . $data['id'] );
	}

	return $events;
}

define( 'ADMINAREA', true );
require( '../init.php' );
App::self(  );
$whmcs = ;
$whmcs->get_req_var( 'displaytypes' );
$displayTypes = ;
$whmcs->get_req_var( 'currentDate' );
$currentDate = ;
$allowedViews = array( 'month', 'agendaDay', 'agendaWeek' );
new dgeegejige( 'Calendar' );
$aInt = ;
$aInt->title = $aInt->lang( 'utilities', 'calendar' );
$aInt->sidebar = 'utilities';
$aInt->icon = 'calendar';

if (!function_exists( 'json_encode' )) {
	$aInt->gracefulExit( 'The JSON PHP extension is required for this page to be able to function. Please add it and then try again.' );

	if (( ( $CONFIG['DateFormat'] == 'DD/MM/YYYY' || $CONFIG['DateFormat'] == 'DD.MM.YYYY' ) || $CONFIG['DateFormat'] == 'DD-MM-YYYY' )) {
		$localdateformat = 'dd/mm/yy';
	}
}

$monthsShortArray = array( (  ), $aInt->lang( 'months', 'september' ), $aInt->lang( 'months', 'october' ), $aInt->lang( 'months', 'november' ), $aInt->lang( 'months', 'december' ) );
$monthsShortList = '';
foreach ($monthsShortArray as ) {
	$month = ;
	$monthsShortList .= (  . '\'' ) . $month . '\',';
	break;
}

$daysShortArray = array( $aInt->lang( 'days', 'sun' ), $aInt->lang( 'days', 'mon' ), $aInt->lang( 'days', 'tue' ), $aInt->lang( 'days', 'wed' ), $aInt->lang( 'days', 'thu' ), $aInt->lang( 'days', 'fri' ), $aInt->lang( 'days', 'sat' ) );
$daysShortList = '';
foreach ($daysShortArray as ) {
	$day = ;
	$daysShortList .= (  . '\'' ) . $day . '\',';
	break;
}

$daysArray = array( $aInt->lang( 'days', 'sunday' ), $aInt->lang( 'days', 'monday' ), $aInt->lang( 'days', 'tuesday' ), $aInt->lang( 'days', 'wednesday' ), $aInt->lang( 'days', 'thursday' ), $aInt->lang( 'days', 'friday' ), $aInt->lang( 'days', 'saturday' ) );
$daysList = '';
foreach ($daysArray as ) {
	$day = ;
	$daysList .= (  . '\'' ) . $day . '\',';
	break;
}

echo cffcebchbh::cssInclude( 'fullcalendar.min.css' ) . cffcebchbh::cssInclude( 'jquery-ui-timepicker-addon.css' ) . cffcebchbh::jsInclude( 'moment.min.js' ) . cffcebchbh::jsInclude( 'fullcalendar.min.js' ) . cffcebchbh::jsInclude( 'jquery-ui-timepicker-addon.js' );
echo '
<script type=\'text/javascript\'>
$(document).ready(function() {
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

$(\'#calendar\').fullCalendar({

    header: {
        left: \'prev,today,next\',
        center: \'title\',
        right: \'month,agendaWeek,agendaDay\'
    },

    defaultView: \'';
echo $calView;
echo '\',

    buttonText: {
        today: \'';
echo $aInt->lang( 'calendar', 'today' );
echo '\',
        month: \'';
echo $aInt->lang( 'calendar', 'month' );
echo '\',
        week: \'';
echo $aInt->lang( 'calendar', 'week' );
echo '\',
        day: \'';
echo $aInt->lang( 'calendar', 'day' );
echo '\'
    },

    monthNames: [';
echo $monthsShortList;
echo '],
    dayNamesShort: [';
echo $daysShortList;
echo '],
    dayNames: [';
echo $daysList;
echo '],

    defaultDate: \'';
echo $calStartDate;
echo '\',

    timeFormat: {
        agendaDay: \'H:mm\',
        default: \'H:mm\'
    },

    dayClick: function(date, jsEvent, view) {
        var dateclicked = date.format(\'YYYYMMDD\');
        var timeclicked = date.format(\'HH:mm:ss\');
        var xpos = jsEvent.pageX;
        if (xpos>($(window).width()-400)) {
            xpos = xpos-350;
        }
        $("#caledit").css("top", jsEvent.pageY);
        $("#caledit").css("left", xpos);
        $("#caledit").load("calendar.php?action=fetch&ymd="+dateclicked+"&time="+timeclicked+"&view="+view.name+"&token=';
echo generate_token( 'plain' );
echo '", function() {
            $(\'#allday\').on(\'click\', function() {
                if ($(\'#allday\').is(\':checked\')) {
                    $(\'#end\').prop("disabled", true);
                    $(\'#end\').val(\'\');
                } else {
                    $(\'#end\').prop("disabled", false);
                    $(\'#end\').val($(\'#endHidden\').val());
                    $(\'#end\').on(\'click\', function() {
                        $(this).datetimepicker({
                            hour: 23,
                            minute: 59,
                            second: 59,
                            setDate: date.format(\'';
echo strtoupper( $localdateformat );
echo '\'),
                            showSecond: true,
                            ampm: false,
                            dateFormat: "';
echo $localdateformat;
echo '",
                            timeFormat: "HH:mm:ss",
                            showOn: "focus"
                        }).focus();
                    });
                }
            });
            $(\'#start\').on(\'click\', function() {
                $(this).datetimepicker({
                    hour: date.format(\'HH\'),
                    minute: date.format(\'mm\'),
                    second: date.format(\'ss\'),
                    defaultDate: date.format(\'';
echo strtoupper( $localdateformat );
echo '\'),
                    showSecond: true,
                    ampm: false,
                    dateFormat: "';
echo $localdateformat;
echo '",
                    timeFormat: "HH:mm:ss",
                    showOn: "focus"
                }).focus();
            });
        });
        $("#caledit").fadeIn();

    },
    eventClick: function(calEvent, jsEvent, view) {

        /**
         * If the event being clicked has an URL, load the URL instead of the
         * popup box to add an event.
         */
        if (calEvent.url) {
            return true;
        }

        var xpos = jsEvent.pageX;
        if (xpos>($(window).width()-400)) {
            xpos = xpos-350;
        }
        $("#caledit").css("top", jsEvent.pageY);
        $("#caledit").css("left", xpos);
        $("#caledit").html(\'<img src="images/loading.gif" /> ';
echo $aInt->lang( 'global', 'loading', 1 );
echo '\');
        $.post("calendar.php", {
            editentry: "1",
            id: calEvent.id,
            view: view.name,
            token: "';
echo generate_token( 'plain' );
echo '"
        }, function(data) {
            data = JSON.parse(data);

            $("#caledit").html(data.html);
            $(\'#start\').datetimepicker({
                hour: data.defaultsh,
                minute: data.defaultsm,
                defaultDate: new Date(data.defaultsdate),
                showSecond: true,
                ampm: false,
                dateFormat: "';
echo $localdateformat;
echo '",
                timeFormat: "HH:mm:ss"
            });
            $(\'#allday\').on(\'click\', function() {
                if ($(\'#allday\').is(\':checked\')) {
                    $(\'#end\').prop("disabled", true);
                    $(\'#end\').val(\'\');
                } else {
                    $(\'#end\').prop("disabled", false);
                    $(\'#end\').val($(\'#endHidden\').val());
                }
            });
            $(\'#end\').datetimepicker({
                hour: data.defaulteh,
                minute: data.defaultem,
                defaultDate: new Date(data.defaultedate),
                showSecond: true,
                ampm: false,
                dateFormat: "';
echo $localdateformat;
echo '",
                timeFormat: "HH:mm:ss"
            });
        });
        $("#caledit").fadeIn();

    },
    eventDrop: function(calEvent, calDelta, revertFunc, jsEvent, ui, view) {

        $.post("calendar.php", {
            action: "update",
            id: calEvent.id,
            type: "move",
            days: calDelta.days(),
            minutes: (calDelta.hours() * 60) + calDelta.minutes(),
            allday: calEvent.allDay,
            token: "';
echo generate_token( 'plain' );
echo '"
        });

    },
    eventResize: function(calEvent, calDelta, revertFunc, jsEvent, ui, view) {

        $.post("calendar.php", {
            action: "update",
            id: calEvent.id,
            type: "resize",
            days: calDelta.days(),
            minutes: (calDelta.hours() * 60) + calDelta.minutes(),
            token: "';
echo generate_token( 'plain' );
echo '"
        });

    },
    eventSources: [
    ';
$i = 9;
foreach ($calevents as ) {
	$calevent = ;

	if (isset( $calcolors[$calevent] )) {
		$calcolors[$calevent];
		$colors = ;
		break;
	}

	echo  . '\',
                textColor: \'#' . $colors['text'] . '\'
            },' . PHP_EOL;
	break;
}

echo '    ]

});

$(\'input[name^="displaytypes"]\').click(function() {
    var moment = $(\'#calendar\').fullCalendar(\'getDate\');
    $(\'#currentDate\').val(moment.format());
    var submitForm = $("#calendarcontrols").find("form");
    submitForm.submit();
});

});

function deleteEntry(id) {
    jQuery("#calendar").fullCalendar(\'removeEvents\', id);
    $.post("calendar.php", { action: "delete", id: id, token: "';
echo generate_token( 'plain' );
echo '" });
    jQuery("#caledit").fadeOut();
}

</script>
<style type="text/css">
#calendar {
    margin: 0 auto;
    width: 90%;
    max-width: 1200px;
}
#caledit {
    display:none;
    position:absolute;
    padding:8px;
    background-color:#f2f2f2;
    border:1px solid #ccc;
    width:350px;
    min-height:150px;
    z-index:100;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    border-radius: 5px;
}
#caledit p {
    margin: 0 0 0 5px;
}
#calendarcontrols {
    float: right;
    margin: -45px 0 0 0;
    padding: 5px 15px;
    background-color: #F2F2F2;
    border: 1px dashed #CCC;
    font-size: 11px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    border-radius: 5px;
}
#calendarcontrols table td {
    font-size: 11px;
}
</style>
';

if ($caldisplaytypes['services'] == 'on') {
	$serviceChecked = (true ? ' checked' : '');

	if ($caldisplaytypes['addons'] == 'on') {
	}
}

$addonChecked = (true ? ' checked' : '');

if ($caldisplaytypes['domains'] == 'on') {
	$domainsChecked = (true ? ' checked' : '');

	if ($caldisplaytypes['todo'] == 'on') {
		$todoChecked = (true ? ' checked' : '');
	}
}


if ($caldisplaytypes['events'] == 'on') {
	$eventsChecked = (true ? ' checked' : '');
	$aInt->lang( 'services', 'title' );
	$serviceTitle = ;
	$aInt->lang( 'addons', 'title' );
	$addonTitle = ;
	$aInt->lang( 'domains', 'title' );
	$domainsTitle = ;
	$aInt->lang( 'calendar', 'todoitems' );
	$todoTitle = ;
	$aInt->lang( 'calendar', 'events' );
	$eventsTitle = ;
	$calControls =  . '<div id="calendarcontrols">
    <form method="post" name="refreshform" action="calendar.php?action=refresh">
        <input id="currentDate" type="hidden" name="currentDate" value="" />
        <strong>' . $aInt->lang( 'calendar', 'showHide' ) . ':</strong>

        <label class="checkbox-inline">
            <input type="checkbox" name="displaytypes[services]"' . $serviceChecked . '/> ' . $serviceTitle . '
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="displaytypes[addons]"' . $addonChecked . '/> ' . $addonTitle . '
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="displaytypes[domains]"' . $domainsChecked . '/> ' . $domainsTitle . '
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="displaytypes[todo]"' . $todoChecked . '/> ' . $todoTitle . '
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="displaytypes[events]"' . $eventsChecked . '/> ' . $eventsTitle . '
        </label>
    </form>
</div>';
	echo $calControls;
}

echo '<div id="calendar"></div>

<form method="post" action="calendar.php?action=save">
<div id="caledit"></div>
</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
