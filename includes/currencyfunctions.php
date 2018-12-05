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

function currencyUpdateRates() {
	global $cron;

	curlCall( 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml', array(  ) );
	$stuff = ;
	explode( '
', $stuff );
	$stuff = ;
	$exchrate = array(  );
	$exchrate[EUR] = 1;
	foreach ($stuff as ) {
		$line = ;
		trim( $line );
		$line = ;
		$matchstr = 'currency=\'';

		while (true) {
			strpos( $line, $matchstr );
			$pos1 = ;

			if ($pos1) {
				substr( $line, $pos1 + strlen( $matchstr ), 3 );
				$currencysymbol = ;
				$matchstr = 'rate=\'';
				strpos( $line, $matchstr );
				$pos2 = ;
				substr( $line, $pos2 + strlen( $matchstr ) );
				$ratestr = ;
				strpos( $ratestr, '\'' );
				$pos3 = ;
				substr( $ratestr, 0, $pos3 );
				$rate = ;
				$exchrate[$currencysymbol] = $rate;
				break 2;
			}
		}
	}

	select_query( 'tblcurrencies', '', array( '`default`' => '1' ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['code'];
	$currencycode = ;
	$exchrate[$currencycode];
	$baserate = ;
	$return = '';
	select_query( 'tblcurrencies', '', array( '`default`' => array( 'sqltype' => 'NEQ', 'value' => '1' ) ), 'code', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
	}

	$id = ;
	$data['code'];
	$code = ;
	$exchrate[$code];
	$coderate = ;
	round( 1 / ( $baserate / $coderate ), 5 );

	while (true) {
		$exchangerate = ;

		if (0 < $exchangerate) {
			update_query;
			'tblcurrencies';
			array( 'rate' => $exchangerate );
			array( 'id' => $id );
		}

		(  );

		if (is_object( $cron )) {
			$cron->logActivity( 'Updated ' . $code . ' Exchange Rate to ' . $exchangerate, true );
			$return .= 'Updated ' . $code . ' Exchange Rate to ' . $exchangerate . '<br />';
			break;
		}

		jmp;
		(  . ' Exchange Rate', true );
		$return .= 'Update Failed for ' . $code . ' Exchange Rate<br />';
	}

	return $return;
}

function currencyUpdatePricing($currencyid = '') {
	select_query( 'tblcurrencies', 'id', array( '`default`' => '1' ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$defaultcurrencyid = ;
	$where = array(  );
	$where['id'] = array( 'sqltype' => 'NEQ', 'value' => $defaultcurrencyid );

	if ($currencyid) {
		$where['id'] = $currencyid;
		$currencies = array(  );
		select_query( 'tblcurrencies', 'id,rate', $where );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$currencies[$data['id']] = $data['rate'];
		}
	}


	while (true) {
		$update_monthly = (true ? ( $monthly * $rate, 2 ) : $monthly);

		if (0 < $quarterly) {
			$update_quarterly = (true ? round( $quarterly * $rate, 2 ) : $quarterly);

			if (0 < $semiannually) {
				$update_semiannually = (true ? round( $semiannually * $rate, 2 ) : $semiannually);

				if (0 < $annually) {
					$update_annually = (true ? round( $annually * $rate, 2 ) : $annually);

					if (0 < $biennially) {
					}
				}
			}
		}

		$update_biennially = (true ? round( $biennially * $rate, 2 ) : $biennially);

		if (0 < $triennially) {
			$update_triennially = (true ? round( $triennially * $rate, 2 ) : $triennially);

			if ($domaintype) {
				array( 'type' => $type, 'currency' => $id, 'relid' => $relid );
			}
		}


		while (true) {
			$updatecriteria = array( 'tsetupfee' => $tsetupfee );
			$updatecriteria = array( 'type' => $type, 'currency' => $id, 'relid' => $relid );
			update_query( 'tblpricing', array( 'msetupfee' => $update_msetupfee, 'qsetupfee' => $update_qsetupfee, 'ssetupfee' => $update_ssetupfee, 'asetupfee' => $update_asetupfee, 'bsetupfee' => $update_bsetupfee, 'tsetupfee' => $update_tsetupfee, 'monthly' => $update_monthly, 'quarterly' => $update_quarterly, 'semiannually' => $update_semiannually, 'annually' => $update_annually, 'biennially' => $update_biennially, 'triennially' => $update_triennially ), $updatecriteria );
		}
	}

}

?>
