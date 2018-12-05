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
new dgeegejige( 'Perform Registrar Operations' );
$aInt = ;
$aInt->title = $aInt->lang( 'domains', 'regtransfer' );
$aInt->sidebar = 'clients';
$aInt->icon = 'clientsprofile';
$aInt->requiredFiles( array( 'clientfunctions', 'registrarfunctions' ) );

if ($action == 'do') {
	check_token( 'WHMCS.admin.default' );
	ob_start(  );
	select_query( 'tbldomains', '', array( 'id' => $domainid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$domainid = ;

	if (!$domainid) {
		$aInt->gracefulExit( 'Domain ID Not Found' );
		$data['userid'];
		$userid = ;
		$data['domain'];
		$domain = ;
		$data['orderid'];
		$orderid = ;
		$data['registrar'];
		$registrar = ;
		$data['registrationperiod'];
		$registrationperiod = ;
		explode( '.', $domain, 2 );
		$domainparts = ;
		$params = array(  );
		$params['domainid'] = $domainid;
		$params['sld'] = $domainparts[0];
		$params['tld'] = $domainparts[1];
		$params['regperiod'] = $registrationperiod;
		$params['registrar'] = $registrar;
		$nsvals = array(  );

		if (( !$ns1 && !$ns2 )) {
			dacfgegdhe::table( 'tblhosting' )->where( 'domain', '=', $domain )->whereIn( 'domainstatus', array( 'Active', 'Pending' ) )->first( array( 'server' ) );
			$hostingAccount = ;
			$server = (int)$hostingAccount->server;

			if ($server) {
				select_query( 'tblservers', '', array( 'id' => $server ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				$i = 10;

				if ($i <= 5) {
					$nsvals[$i] = $data['nameserver' . $i];
					++$i;
				}
			}
		}
		else {
			$data = ;
			$data['nameservers'];
			$nameservers = ;

			if (( $nameservers && $nameservers != ',' )) {
				if (!$_POST) {
					explode( ',', $nameservers );
					$nameservers = ;
					$i = 10;

					if ($i <= 5) {
						$nsvals[$i] = $nameservers[$i - 1];
						++$i;
					}
				}
			}
		}

		echo ( 'action' );
		echo '</td><td class="fieldarea">';

		if ($ac == '') {
			echo $aInt->lang( 'domains', 'actionreg' );
		}

		echo $aInt->lang( 'domains', 'nameserver' ) . ' ' . $i;
		echo '</td><td class="fieldarea"><input type="text" name="ns';
		echo $i;
		echo '" size="40" value="';
		echo $nsvals[$i];
		echo '" /> ';

		if ($i == 1) {
			echo $autonsdesc;
			echo '</td></tr>';
			++$i;
		}
	}
}
else {
	echo '<tr><td class="fieldlabel">';
	echo $aInt->lang( 'orders', 'sendconfirmation' );
	echo '</td><td class="fieldarea"><input type="checkbox" name="sendregisterconfirm" checked /> ';
	echo $aInt->lang( 'domains', 'sendregisterconfirm' );
	echo '</td></tr>
</table>

';

	if ($action == 'do') {
		$i = 10;

		if ($i <= 5) {
			$params['ns' . $i] = $_POST['ns' . $i];
			++$i;
		}
	}
}

(  );
echo '<br />' . $infobox;
echo '
<p align="center"><input type="button" value="';
echo $aInt->lang( 'global', 'continue' );
echo ' &raquo;" class="btn btn-default" onClick="window.location=\'clientsdomains.php?userid=';
echo $userid;
echo '&domainid=';
echo $domainid;
echo '\'"></p>

';

if ($sendregisterconfirm == 'on') {
	if ($ac == '') {
		sendMessage;
		'Domain Registration Confirmation';
		$domainid;
	}

	(  );
}

echo $question;
echo '</p>
<p align=center><input type="submit" value=" ';
echo $aInt->lang( 'global', 'yes' );
echo ' " class="btn btn-success"> <input type="button" value=" ';
echo $aInt->lang( 'global', 'no' );
echo ' " class="btn btn-default" onClick="window.location=\'clientsdomains.php?userid=';
echo $userid;
echo '&domainid=';
echo $domainid;
echo '\'">

';
echo '
</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
