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
new dgeegejige( 'Configure Automation Settings' );
$aInt = ;
$aInt->title = $aInt->lang( 'automation', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'autosettings';
$aInt->helplink = 'Automation Settings';
App::self(  );
$whmcs = ;
$whmcs->get_req_var( 'sub' );
$sub = ;
$whmcs->get_req_var( 'success' );
$success = ;

if ($sub == 'save') {
	check_token( 'WHMCS.admin.default' );
	$changes = array(  );
	chhgjaeced::allAsArray(  );
	$currentConfig = ;
	chhgjaeced::setValue( 'AutoSuspension', $whmcs->get_req_var( 'autosuspend' ) );
	chhgjaeced::setValue( 'AutoSuspensionDays', $whmcs->get_req_var( 'days' ) );
	chhgjaeced::setValue( 'CreateInvoiceDaysBefore', $whmcs->get_req_var( 'createinvoicedays' ) );
	chhgjaeced::setValue( 'CreateDomainInvoiceDaysBefore', $whmcs->get_req_var( 'createdomaininvoicedays' ) );
	chhgjaeced::setValue( 'SendReminder', $whmcs->get_req_var( 'invoicesendreminder' ) );
	chhgjaeced::setValue( 'SendInvoiceReminderDays', $whmcs->get_req_var( 'invoicesendreminderdays' ) );
	chhgjaeced::setValue( 'UpdateStatsAuto', $whmcs->get_req_var( 'updatestatusauto' ) );
	chhgjaeced::setValue( 'CloseInactiveTickets', $whmcs->get_req_var( 'closeinactivetickets' ) );
	chhgjaeced::setValue( 'AutoTermination', $whmcs->get_req_var( 'autotermination' ) );
	chhgjaeced::setValue( 'AutoTerminationDays', $whmcs->get_req_var( 'autoterminationdays' ) );
	chhgjaeced::setValue( 'AutoUnsuspend', $whmcs->get_req_var( 'autounsuspend' ) );
	chhgjaeced::setValue( 'AddLateFeeDays', $whmcs->get_req_var( 'addlatefeedays' ) );
	chhgjaeced::setValue( 'SendFirstOverdueInvoiceReminder', $whmcs->get_req_var( 'invoicefirstoverduereminder' ) );
	chhgjaeced::setValue( 'SendSecondOverdueInvoiceReminder', $whmcs->get_req_var( 'invoicesecondoverduereminder' ) );
	chhgjaeced::setValue( 'SendThirdOverdueInvoiceReminder', $whmcs->get_req_var( 'invoicethirdoverduereminder' ) );
	chhgjaeced::setValue( 'AutoCancellationRequests', $whmcs->get_req_var( 'autocancellationrequests' ) );
	chhgjaeced::setValue( 'CCProcessDaysBefore', $whmcs->get_req_var( 'ccprocessdaysbefore' ) );
	chhgjaeced::setValue( 'CCAttemptOnlyOnce', $whmcs->get_req_var( 'ccattemptonlyonce' ) );
	chhgjaeced::setValue( 'CCRetryEveryWeekFor', $whmcs->get_req_var( 'ccretryeveryweekfor' ) );
	chhgjaeced::setValue( 'CCDaySendExpiryNotices', $whmcs->get_req_var( 'ccdaysendexpirynotices' ) );
	chhgjaeced::setValue( 'CCDoNotRemoveOnExpiry', $whmcs->get_req_var( 'donotremovecconexpiry' ) );
	chhgjaeced::setValue( 'CurrencyAutoUpdateExchangeRates', $whmcs->get_req_var( 'currencyautoupdateexchangerates' ) );
	chhgjaeced::setValue( 'CurrencyAutoUpdateProductPrices', $whmcs->get_req_var( 'currencyautoupdateproductprices' ) );
	chhgjaeced::setValue( 'OverageBillingMethod', $whmcs->get_req_var( 'overagebillingmethod' ) );
	chhgjaeced::setValue( 'CreateInvoiceDaysBeforeMonthly', $whmcs->get_req_var( 'invoicegenmonthly' ) );
	chhgjaeced::setValue( 'CreateInvoiceDaysBeforeQuarterly', $whmcs->get_req_var( 'invoicegenquarterly' ) );
	chhgjaeced::setValue( 'CreateInvoiceDaysBeforeSemiAnnually', $whmcs->get_req_var( 'invoicegensemiannually' ) );
	chhgjaeced::setValue( 'CreateInvoiceDaysBeforeAnnually', $whmcs->get_req_var( 'invoicegenannually' ) );
	chhgjaeced::setValue( 'CreateInvoiceDaysBeforeBiennially', $whmcs->get_req_var( 'invoicegenbiennially' ) );
	chhgjaeced::setValue( 'CreateInvoiceDaysBeforeTriennially', $whmcs->get_req_var( 'invoicegentriennially' ) );
	chhgjaeced::setValue( 'AutoClientStatusChange', $whmcs->get_req_var( 'autoclientstatuschange' ) );
	foreach ($renewals as ) {
		$renewal = ;
		$count = ;

		while (( $whmcs->get_req_var( 'renewalWhen', (int)$count ) == 'after' && 0 < $renewal )) {
			$renewals *= $options = -1;
		}

		break;
	}

	chhgjaeced::setValue( 'DomainRenewalNotices', implode( ',', $renewals ) );
	chhgjaeced::allAsArray(  );
	$savedConfig = ;
	foreach ($currentConfig as ) {
		$value = ;
		$setting = ;

		if ($setting == 'DomainRenewalNotices') {
			$options = array( 'First', 'Second', 'Third', 'Fourth', 'Fifth' );
			explode( ',', $value );
			$currentSetting = ;
			foreach ($currentSetting as ) {
				$renewal = ;
				$key = ;

				if ($renewals[$key] != $renewal) {
					$newBeforeAfter = '';
					$currentBeforeAfter = ;

					if (0 < $renewal) {
						$currentBeforeAfter = ' before ';
						break 2;
					}
				}

				break 2;
			}

			break;
		}

		break;
	}

	$whmcs->get_req_var( 'autoSuspendEmail' );
	$autoSuspendEmail = ;
	if ($autoSuspendEmail) = ;
	$template->disabled = $disableSuspendEmail;
	$template->save(  );
	cebaiefhhg::where( 'type', '=', 'product' )->where( 'name', '=', 'Service Unsuspension Notification' )->get(  )->first(  );
	$template = ;

	if (!is_null( $template )) {
		if ($template->disabled != $disableUnsuspendEmail) {
			if ($disableUnsuspendEmail == '0') {
				$changes[] = 'Service Unsuspension Notification email template ' . (true ? 'Enabled' : 'Disabled');
				$template->disabled = $disableUnsuspendEmail;
				$template->save(  );

				if ($changes) {
					logAdminActivity( 'Automation Settings Changed. Changes made: ' . implode( '. ', $changes ) );
					redir( 'success=true' );
					ob_start(  );

					if ($success) {
						infoBox( $aInt->lang( 'automation', 'changesuccess' ), $aInt->lang( 'automation', 'changesuccessinfo' ) );
						echo $infobox;
						echo '
<form method="post" action="';
						echo $whmcs->getPhpSelf(  );
						echo '?sub=save">
<p>';
						echo $aInt->lang( 'automation', 'croninfo' );
						echo '</p>

<div class="alert alert-warning text-center">
    <div class="input-group">
        <span class="input-group-addon" id="cronPhp">';
						echo $aInt->lang( 'automation', 'cronphp' );
						echo '</span>
        <input type="text" id="cronPhp" value="php -q ';
						$whmcs->getCronDirectory(  );
						$cronFolder = ;
						echo $cronFolder;
						echo '/cron.php" class="form-control" onfocus="this.select()" onmouseup="return false;" />
    </div>
    ';

						if (str_replace( ROOTDIR, '', $cronFolder ) == '/crons') {
							AdminLang::trans( 'global.or' );
							$orText = ;
							AdminLang::trans( 'automation.cronget' );
							$cronGetText = ;
							$whmcs->getSystemSSLURL(  );
							$systemUrl = $whmcs->getSystemURL(  );
							echo  . '<strong>' . $orText . '</strong><br />
    <div class="input-group">
        <span class="input-group-addon" id="cronGet">' . $cronGetText . '</span>
        <input type="text" id="cronGet" value="GET ' . $systemUrl . 'crons/cron.php" class="form-control" onfocus="this.select()" onmouseup="return false;" />
    </div>';
							echo '</div>

';
							select_query( 'tblconfiguration', '', '' );
							$result = ;
							mysql_fetch_array( $result );

							if ($data = ) {
								$data['setting'];
								$setting = ;
								$data['value'];
								$value = ;
								$CONFIG[ . $setting] =  . $value;
							}
						}
					}
				}
			}
		}
	}
	else {
		if ($CONFIG['AutoTermination'] == 'on') {
			echo ' CHECKED';
			echo '> ';
			echo $aInt->lang( 'automation', 'autoterminateinfo' );
			echo '</label></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'automation', 'terminatedays' );
			echo '</td><td class="fieldarea"><input type="text" name="autoterminationdays" value="';
			echo $CONFIG['AutoTerminationDays'];
			echo '" size=3> ';
			echo $aInt->lang( 'automation', 'terminatedaysinfo' );
			echo '</td></tr>
</table>
<p><b>';
			echo $aInt->lang( 'automation', 'billingsettings' );
			echo '</b></p>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'automation', 'invoicegen' );
			echo '</td><td class="fieldarea"><input type="text" name="createinvoicedays" value="';
			echo $CONFIG['CreateInvoiceDaysBefore'];
			echo '" size=3> ';
			echo $aInt->lang( 'automation', 'invoicegeninfo' );
			echo ' (<a href="#" onclick="showadvinvoice();return false">';
			echo $aInt->lang( 'automation', 'advsettings' );
			echo '</a>)
<div id="advinvoicesettings" align="center" style="display:none;">
<br />
<b>';
			echo $aInt->lang( 'automation', 'percycle' );
			echo '</b><br />
';
			echo $aInt->lang( 'automation', 'percycleinfo' );
			echo ':<br />
<table width="650" cellspacing="1" bgcolor="#cccccc">
<tr bgcolor="#efefef" style="text-align:center;font-weight:bold"><td>';
			echo $aInt->lang( 'billingcycles', 'monthly' );
			echo '</td><td>';
			echo $aInt->lang( 'billingcycles', 'quarterly' );
			echo '</td><td>';
			echo $aInt->lang( 'billingcycles', 'semiannually' );
		}
	}
}

echo '</td><td>';
echo $aInt->lang( 'billingcycles', 'annually' );
echo '</td><td>';
echo $aInt->lang( 'billingcycles', 'biennially' );
echo '</td><td>';
echo $aInt->lang( 'billingcycles', 'triennially' );
echo '</td></tr>
<tr bgcolor="#ffffff"><td><input type="text" name="invoicegenmonthly" size="10" value="';
echo $CONFIG['CreateInvoiceDaysBeforeMonthly'];
echo '" /></td><td><input type="text" name="invoicegenquarterly" size="10" value="';
echo $CONFIG['CreateInvoiceDaysBeforeQuarterly'];
echo '" /></td><td><input type="text" name="invoicegensemiannually" size="10" value="';
echo $CONFIG['CreateInvoiceDaysBeforeSemiAnnually'];
echo '" /></td><td><input type="text" name="invoicegenannually" size="10" value="';
echo $CONFIG['CreateInvoiceDaysBeforeAnnually'];
echo '" /></td><td><input type="text" name="invoicegenbiennially" size="10" value="';
echo $CONFIG['CreateInvoiceDaysBeforeBiennially'];
echo '" /></td><td><input type="text" name="invoicegentriennially" size="10" value="';
echo $CONFIG['CreateInvoiceDaysBeforeTriennially'];
echo '" /></td></tr>
</table>
(';
echo $aInt->lang( 'automation', 'blankcycledefault' );
echo ')
<br /><br />
<b>';
echo $aInt->lang( 'automation', 'domainsettings' );
echo '</b><br />
';
echo $aInt->lang( 'automation', 'domainsettingsinfo' );
echo ':<br />
<input type="text" name="createdomaininvoicedays" value="';
echo $CONFIG['CreateDomainInvoiceDaysBefore'];
echo '" size="3"> (';
echo $aInt->lang( 'automation', 'blankdefault' );
echo ')<br /><br />
</div>
</td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'automation', 'reminderemails' );
echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="invoicesendreminder"';

if ($CONFIG['SendReminder'] == 'on') {
	echo ' CHECKED';
	echo '> ';
	echo $aInt->lang( 'automation', 'reminderemailsinfo' );
	echo '</label></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'automation', 'unpaidreminder' );
	echo '</td><td class="fieldarea"><input type="text" name="invoicesendreminderdays" value="';
	echo $CONFIG['SendInvoiceReminderDays'];
	echo '" size=3> ';
	echo $aInt->lang( 'automation', 'unpaidreminderinfo' );
	echo ' (';
	echo $aInt->lang( 'automation', 'todisable' );
	echo ')</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'automation', 'firstreminder' );
	echo '</td><td class="fieldarea"><input type="text" name="invoicefirstoverduereminder" value="';
	echo $CONFIG['SendFirstOverdueInvoiceReminder'];
	echo '" size=3> ';
	echo $aInt->lang( 'automation', 'firstreminderinfo' );
	echo ' (';
	echo $aInt->lang( 'automation', 'todisable' );
	echo ')</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'automation', 'secondreminder' );
	echo '</td><td class="fieldarea"><input type="text" name="invoicesecondoverduereminder" value="';
	echo $CONFIG['SendSecondOverdueInvoiceReminder'];
	echo '" size=3> ';
	echo $aInt->lang( 'automation', 'secondreminderinfo' );
	echo ' (';
	echo $aInt->lang( 'automation', 'todisable' );
	echo ')</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'automation', 'thirdreminder' );
	echo '</td><td class="fieldarea"><input type="text" name="invoicethirdoverduereminder" value="';
	echo $CONFIG['SendThirdOverdueInvoiceReminder'];
	echo '" size=3> ';
	echo $aInt->lang( 'automation', 'thirdreminderinfo' );
	echo ' (';
	echo $aInt->lang( 'automation', 'todisable' );
	echo ')</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'automation', 'latefeedays' );
	echo '</td><td class="fieldarea"><input type="text" name="addlatefeedays" value="';
	echo $CONFIG['AddLateFeeDays'];
	echo '" size=5> ';
	echo $aInt->lang( 'automation', 'latefeedaysinfo' );
	echo '</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'automation', 'overages' );
	echo '</td><td class="fieldarea"><label class="radio-inline"><input type="radio" name="overagebillingmethod" value="1"';

	if ($CONFIG['OverageBillingMethod'] == '1') {
		echo ' checked';
		echo '> ';
		echo $aInt->lang( 'automation', 'overageslastday' );
		echo '</label><br /><label class="radio-inline"><input type="radio" name="overagebillingmethod" value="2"';

		if ($CONFIG['OverageBillingMethod'] == '2') {
			echo ' checked';
			echo '> ';
			echo $aInt->lang( 'automation', 'overagesnextinvoice' );
			echo '</label></td></tr>
</table>
<p><b>';
			echo $aInt->lang( 'automation', 'ccsettings' );
			echo '</b></p>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'automation', 'ccdaysbeforedue' );
			echo '</td><td class="fieldarea"><input type="text" name="ccprocessdaysbefore" value="';
			echo $CONFIG['CCProcessDaysBefore'];
			echo '" size=3> ';
			echo $aInt->lang( 'automation', 'ccdaysbeforedueinfo' );
			echo '</td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'automation', 'cconlyonce' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="ccattemptonlyonce"';

			if ($CONFIG['CCAttemptOnlyOnce'] == 'on') {
				echo ' CHECKED';
				echo '> ';
				echo $aInt->lang( 'automation', 'cconlyonceinfo' );
				echo '</label></td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'automation', 'cceveryweek' );
				echo '</td><td class="fieldarea"><input type="text" name="ccretryeveryweekfor" value="';
				echo $CONFIG['CCRetryEveryWeekFor'];
				echo '" size=3> ';
				echo $aInt->lang( 'automation', 'cceveryweekinfo' );
				echo '</td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'automation', 'ccexpirynotices' );
				echo '</td><td class="fieldarea"><input type="text" name="ccdaysendexpirynotices" value="';
				echo $CONFIG['CCDaySendExpiryNotices'];
				echo '" size=3> ';
				echo $aInt->lang( 'automation', 'ccexpirynoticesinfo' );
				echo '</td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'automation', 'ccnoremove' );
				echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="donotremovecconexpiry"';

				if ($CONFIG['CCDoNotRemoveOnExpiry'] == 'on') {
					echo ' CHECKED';
					echo '> ';
					echo $aInt->lang( 'automation', 'ccnoremoveinfo' );
					echo '</label></td></tr>
</table>
<p><b>';
					echo $aInt->lang( 'automation', 'currencysettings' );
					echo '</b></p>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'automation', 'exchangerates' );
					echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="currencyautoupdateexchangerates"';

					if ($CONFIG['CurrencyAutoUpdateExchangeRates'] == 'on') {
						echo ' CHECKED';
						echo '> ';
						echo $aInt->lang( 'automation', 'exchangeratesinfo' );
						echo '</label></td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'automation', 'productprices' );
						echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="currencyautoupdateproductprices"';

						if ($CONFIG['CurrencyAutoUpdateProductPrices'] == 'on') {
							echo ' CHECKED';
							echo '> ';
							echo $aInt->lang( 'automation', 'productpricesinfo' );
							echo '</label></td></tr>
</table>
<p><b>';
							echo $aInt->lang( 'automation', 'domainremindersettings' );
							echo '</b></p>
';
							explode( ',', $CONFIG['DomainRenewalNotices'], 5 );
							$renewals = ;
							count( $renewals );
							$i = ;

							if ($i < 5) {
								$renewals[] = 0;
								++$i;
							}
						}
					}
				}
			}
		}
	}
	else {
		if () {
			$renewalData[] = array( 'value' => (true ? (int)$renewal * -1 : (int)$renewal), 'info' => sprintf( $aInt->lang( 'automation', $languageStrings[$count] . 'info' ), $selectData ) );
		}
	}


	if () {
		echo ' CHECKED';
		echo '> ';
		echo $aInt->lang( 'automation', 'cancellationinfo' );
		echo '</label></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'automation', 'usage' );
		echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="updatestatusauto"';
		$CONFIG['UpdateStatsAuto'] == 'on';
	}
}


if () {
	echo ' CHECKED';
	echo '> ';
}

echo $aInt->lang( 'automation', 'usageinfo' );
echo '</label></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'automation', 'autostatuschange' );
echo '</td><td class="fieldarea"><label class="radio-inline"><input type="radio" name="autoclientstatuschange" value="1" ';

if ($CONFIG['AutoClientStatusChange'] == '1') {
	echo ' CHECKED';
	echo '> ';
	echo $aInt->lang( 'automation', 'disableautoinactiveinfo' );
	echo '</label> <br /><label class="radio-inline"><input type="radio" name="autoclientstatuschange" value="2" ';

	if ($CONFIG['AutoClientStatusChange'] == '2') {
		echo ' CHECKED';
		echo '> ';
	}

	echo $aInt->lang( 'automation', 'defaultstatusautochange' );
	echo '</label> <br /><label class="radio-inline"><input type="radio" name="autoclientstatuschange" value="3" ';

	if ($CONFIG['AutoClientStatusChange'] == '3') {
		echo ' CHECKED';
		echo '> ';
		echo $aInt->lang( 'automation', 'setdaysforinactiveinfo' );
		echo '</label></td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
	}
}

echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary">
    <input type="reset" value="';
echo $aInt->lang( 'global', 'cancelchanges' );
echo '" class="btn btn-default" />
</div>

</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
