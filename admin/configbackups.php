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
new dgeegejige( 'Configure Database Backups' );
$aInt = ;
$aInt->title = $aInt->lang( 'backups', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'dbbackups';
$aInt->helplink = 'Backups';

if ($sub == 'save') {
	check_token( 'WHMCS.admin.default' );
	$changes = array(  );
	$save_arr = array( 'DailyEmailBackup' => $dailyemailbackup, 'FTPBackupHostname' => $ftpbackuphostname, 'FTPBackupPort' => (int)$ftpbackupport, 'FTPBackupUsername' => $ftpbackupusername, 'FTPBackupDestination' => $ftpbackupdestination, 'FTPPassiveMode' => $ftppassivemode );
	trim( $whmcs->get_req_var( 'ftpbackuppassword' ) );
	$newPassword = ;
	decrypt( $CONFIG['FTPBackupPassword'] );
	$originalPassword = ;
	interpretMaskedPasswordChangeForStorage( $newPassword, $originalPassword );
	$valueToStore = ;

	if ($valueToStore !== false) {
		$save_arr['FTPBackupPassword'] = $valueToStore;

		if ($newPassword != $originalPassword) {
			$changes[] = 'FTP Backup Password Changed';
			foreach ($save_arr as ) {
				$v = ;
				$k = ;
				chhgjaeced::getValue( $k );
				$currentSetting = ;

				if (( $v != $currentSetting && $k != 'FTPBackupPassword' )) {
					$regEx = '/(?<=[a-z])(?=[A-Z])|(?<=[A-Z])(?=[A-Z][a-z])/x';
					preg_split( $regEx, $k );
					$friendlySettingParts = ;
					implode( ' ', $friendlySettingParts );
					$friendlySetting = ;
					$newSetting = $newSetting;

					if ($k == 'FTPPassiveMode') {
						if ($currentSetting == 'on') {
							$newSetting = 'off';

							if ($newSetting == 'on') {
								$currentSetting = 'off';
								$changes[] = (  . $friendlySetting . ' changed from \'' . $currentSetting . '\' to \'' . $newSetting . '\'' );

								if (!isset( $CONFIG[$k] )) {
									insert_query( 'tblconfiguration', array( 'setting' => $k, 'value' => trim( $v ) ) );
									break;
								}

								break;
							}
						}
					}
				}
			}


			if ($changes) {
				logAdminActivity( 'Database Backup Settings Changed. ' . implode( '. ', $changes ) );
				redir( 'success=true' );

				if (!isset( $CONFIG['FTPBackupPort'] )) {
					insert_query;
					'tblconfiguration';
					array( 'setting' => 'FTPBackupPort', 'value' => '21' );
				}
			}
		}
	}
}

(  );
$CONFIG['FTPBackupPort'] = '21';
ob_start(  );

if ($success) {
	infoBox( $aInt->lang( 'backups', 'changesuccess' ), $aInt->lang( 'backups', 'changesuccessinfo' ) );
	echo $infobox;
	echo '<form method="post" action="';
	echo $whmcs->getPhpSelf(  );
	echo '?sub=save">

<p>';
	echo $aInt->lang( 'backups', 'description' );
	echo '</p>

<p><b>';
	echo $aInt->lang( 'backups', 'dailyemail' );
	echo '</b></p>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'fields', 'email' );
	echo '</td><td class="fieldarea"><input type="text" name="dailyemailbackup" value="';
	echo $CONFIG['DailyEmailBackup'];
	echo '" size="40"> ';
	echo $aInt->lang( 'backups', 'emailinfo' );
	echo ' (';
	echo $aInt->lang( 'backups', 'blanktodisable' );
	echo ')</td></tr>
</table>

<p><b>';
	echo $aInt->lang( 'backups', 'dailyftp' );
	echo '</b></p>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%"  class="fieldlabel">';
	echo $aInt->lang( 'backups', 'ftphost' );
	echo '</td><td class="fieldarea"><input type="text" name="ftpbackuphostname" value="';
	echo $CONFIG['FTPBackupHostname'];
	echo '" size="30"> ';
	echo $aInt->lang( 'backups', 'hostnameinfo' );
	echo ' (';
	echo $aInt->lang( 'backups', 'blanktodisable' );
	echo ')</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'backups', 'ftpport' );
	echo '</td><td class="fieldarea"><input type="text" name="ftpbackupport" value="';
	echo $CONFIG['FTPBackupPort'];
}

echo '" size="6"></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'backups', 'ftpuser' );
echo '</td><td class="fieldarea"><input type="text" name="ftpbackupusername" value="';
echo $CONFIG['FTPBackupUsername'];
echo '" size="30"></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'backups', 'ftppass' );
echo '</td><td class="fieldarea"><input type="password" name="ftpbackuppassword" value="';
echo replacePasswordWithMasks( decrypt( $CONFIG['FTPBackupPassword'] ) );
echo '" size="30" autocomplete="off"></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'backups', 'ftppath' );
echo '</td><td class="fieldarea"><input type="text" name="ftpbackupdestination" value="';
echo $CONFIG['FTPBackupDestination'];
echo '" size="30"> ';
echo $aInt->lang( 'backups', 'relativepath' );
echo '</td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'backups', 'ftppassivemode' );
echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="ftppassivemode"';

if ($CONFIG['FTPPassiveMode']) {
	echo ' checked';
	echo ' /> ';
	echo $aInt->lang( 'global', 'ticktoenable' );
	echo '</label></td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
	echo $aInt->lang( 'global', 'savechanges' );
	echo '" class="btn btn-primary" />
    <input type="reset" value="';
	echo $aInt->lang( 'global', 'cancelchanges' );
	echo '" class="btn btn-default" />
</div>

</form>

';
	ob_get_contents(  );
	$content = ;
	ob_end_clean;
}

(  );
$aInt->content = $content;
$aInt->display(  );
?>
