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
new dgeegejige( 'Configure Currencies', false );
$aInt = ;
$aInt->title = $aInt->lang( 'currencies', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'income';
$aInt->helplink = 'Currencies';
$aInt->requiredFiles( array( 'currencyfunctions' ) );
$infobox = '';

if ($action == 'add') {
	check_token( 'WHMCS.admin.default' );
	strip_tags( dfdidhdbdc::decode( $prefix ) );
	$prefix = ;
	strip_tags( dfdidhdbdc::decode( $suffix ) );
	$suffix = ;
	$addInfo = array( 'code' => $code, 'prefix' => $prefix, 'suffix' => $suffix, 'format' => $format, 'rate' => $rate );

	if (!is_numeric( $rate )) {
		$action = false;
		infoBox( AdminLang::trans( 'currencies.addCurrencyFailed' ), AdminLang::trans( 'currencies.currencyConversionNotNumeric' ), 'error' );
		$infobox = ;
	}
}

( $result );
$data = ;
$data[0];
$inuse = ;

if (!$inuse) {
	dacfgegdhe::table( 'tblcurrencies' )->where( 'id', $id )->pluck( 'code' );
	$code = ;
	delete_query( 'tblcurrencies', array( 'id' => $id ) );
	delete_query( 'tblpricing', array( 'currency' => $id ) );
	$logMessage = (  . 'Currency Deleted: \'' . $code . '\'' );
	logAdminActivity( $logMessage );
	redir(  );

	if ($action == 'updaterates') {
		check_token( 'WHMCS.admin.default' );
		currencyUpdateRates(  );
		$msg = ;
		$logMessage = 'Manual Currency Exchange Rates Sync Initiated';
		logAdminActivity( $logMessage );
		eaaadiagec::set( 'CurrencyUpdateMsg', $msg );
		redir( 'updaterates=1' );

		if ($action == 'updateprices') {
			check_token( 'WHMCS.admin.default' );
			currencyUpdatePricing(  );
			$logMessage = 'Manual Mass Product Pricing Update Initiated using Currency Exchange Rates';
			logAdminActivity( $logMessage );
			redir( 'updateprices=1' );
			ob_start(  );

			if (!$action) {
				$aInt->deleteJSConfirm( 'doDelete', 'currencies', 'delsure', '?action=delete&id=' );

				if (( $updaterates && eaaadiagec::get( 'CurrencyUpdateMsg' ) )) {
					infoBox( $aInt->lang( 'currencies', 'exchrateupdate' ), eaaadiagec::get( 'CurrencyUpdateMsg' ) );
					eaaadiagec::delete( 'CurrencyUpdateMsg' );

					if ($updateprices) {
						infoBox( $aInt->lang( 'currencies', 'updatedpricing' ), $aInt->lang( 'currencies', 'updatepricinginfo' ) );
						echo $infobox;
						echo '<p>' . $aInt->lang( 'currencies', 'info' ) . '</p>';
						$aInt->sortableTableInit( 'nopagination' );
						$totalcurrencies = 4;
						select_query( 'tblcurrencies', '', '', 'code', 'ASC' );
						$result = ;
						mysql_fetch_array( $result );

						if ($data = ) {
							$data['id'];
							$id = ;
							$data['code'];
							$code = ;
							$data['prefix'];
							$prefix = ;
							$data['suffix'];
							$suffix = ;
							$data['format'];
							$format = ;
							$data['rate'];
							$rate = ;

							if ($format == 1) {
								$formatex = '1234.56';
							}
						}
					}
				}
			}
		}
	}
}
else {
	echo (  );
	echo '</td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
	echo $aInt->lang( 'currencies', 'add' );
	echo '" class="btn btn-primary" />
</div>

</form>

';
}

echo '</td><td class="fieldarea"><input type="checkbox" name="updatepricing"> ';
echo $aInt->lang( 'currencies', 'recalcpricing' );
echo '</td></tr>
</table>

<p align="center"><input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary"> <input type="button" value="';
echo $aInt->lang( 'global', 'cancelchanges' );
echo '" class="btn btn-default" onclick="window.location=\'configcurrencies.php\'" /></p>

</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
