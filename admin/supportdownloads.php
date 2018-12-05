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
require( dirname( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\admin' ) . DIRECTORY_SEPARATOR . 'init.php' );
App::self(  );
$whmcs = ;
new dgeegejige( 'Manage Downloads' );
$aInt = ;
$aInt->title = $aInt->lang( 'support', 'downloads' );
$aInt->sidebar = 'support';
$aInt->icon = 'downloads';
$catid = (int)$whmcs->get_req_var( 'catid' );
$whmcs->get_req_var( 'adddownload' );
$adddownload = ;
$whmcs->get_req_var( 'action' );
$action = ;
$whmcs->get_req_var( 'sub' );
$sub = ;
$whmcs->get_req_var( 'addcategory' );
$addcategory = ;
$whmcs->get_req_var( 'remoteDownload' );
$remoteDownload = ;
$defaultTabOpen = false;

if ($adddownload == 'true') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'filename' );
	$filename = ;
	$whmcs->get_req_var( 'filetype' );
	$filetype = ;
	$whmcs->get_req_var( 'title' );
	$title = ;
	$whmcs->get_req_var( 'type' );
	$type = ;

	if ($filetype == 'upload') {
		new cbgjfcegh( 'uploadfile' );
		$file = ;
		$file->move( $whmcs->getDownloadsDir(  ) );
		$filename = ;
	}


	while (true) {
		echo  . ;
	}

	echo '            </tr>
        </table>
    ';
	jmp;
	echo '        <p>
            <b>';
	echo $aInt->lang( 'support', 'nodlfiles' );
	echo '</b>
        </p>
    ';
}

$description = ;
$data['downloads'];
$downloads = ;
$data['location'];
$location = ;
$hidden = (int)(string)$data['hidden'];
$clientsonly = (int)(string)$data['clientsonly'];
$productdownload = (int)(string)$data['productdownload'];

if ($remoteDownload) {
	infoBox( AdminLang::trans( 'support.invalidFilename' ), AdminLang::trans( 'support.invalidFilenameDownloadDescription' ), 'error' );
	echo $infobox;
	echo '
    <form method="post" action="';
	echo $whmcs->getPhpSelf(  );
	echo '?catid=';
	echo $category;
	echo '&sub=save&id=';
	echo $id;
	echo '">
        <table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
            <tr>
                <td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'support', 'category' );
	echo '</td>
                <td class="fieldarea">
                    <select name="category">
                        ';
	select_query( 'tbldownloadcats', '', '', 'parentid` ASC,`name', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$catid = ;
		$data['name'];
		$category2 = ;
		echo (  . '<option value="' . $catid . '"' );

		if ($catid == $category) {
			echo ' selected';
			echo (  . '>' ) . $category2;
		}

		jmp;
		echo $aInt->lang( 'support', 'filename' );
		echo '</td>
                <td class="fieldarea"><input type="text" name="location" value="';
		echo $location;
		echo '" size=60></td>
            </tr>
            <tr>
                <td class="fieldlabel">';
		echo $aInt->lang( 'support', 'downloads' );
		echo '</td>
                <td class="fieldarea"><input type="text" name="downloads" value="';
		echo $downloads;
		echo '" size=6></td>
            </tr>
            <tr>
                <td class="fieldlabel">';
		echo $aInt->lang( 'support', 'clientsonly' );
		echo '</td>
                <td class="fieldarea">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="clientsonly"';

		if ($clientsonly) {
			echo 'checked';
			echo '> ';
			echo $aInt->lang( 'support', 'clientsonlyinfo' );
			echo '                    </label>
                </td>
            </tr>
            <tr>
                <td class="fieldlabel">';
			echo $aInt->lang( 'support', 'productdl' );
			echo '</td>
                <td class="fieldarea">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="productdownload"';

			if ($productdownload) {
				echo 'checked';
				echo '> ';
				echo $aInt->lang( 'support', 'productdlinfo' );
				echo '                    </label>
                </td>
            </tr>
            <tr>
                <td class="fieldlabel">';
				echo $aInt->lang( 'global', 'hidden' );
				echo '</td>
                <td class="fieldarea">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="hidden"';

				if ($hidden) {
					echo 'checked';
					echo ' /> ';
					echo $aInt->lang( 'support', 'hiddeninfo' );
					echo '                    </label>
                </td>
            </tr>
            <tr>
                <td class="fieldlabel">';
					echo $aInt->lang( 'support', 'downloadlink' );
					echo '</td>
                <td class="fieldarea"><input type="text" size="100" value="';
					echo $CONFIG['SystemURL'];
					echo '/dl.php?type=d&id=';
					echo $id;
					echo '" readonly></td>
            </tr>
        </table>

        <p align="center">
            <input type="submit" value="';
					echo $aInt->lang( 'global', 'savechanges' );
					echo '" class="btn btn-primary"> <input type="button" value="';
					echo $aInt->lang( 'global', 'cancelchanges' );
					echo '" class="btn btn-default" onclick="history.go(-1)" />
        </p>
    </form>
';
					jmp;

					if ($action == 'editcat') {
						select_query( 'tbldownloadcats', '', array( 'id' => $id ) );
						$result = ;
						mysql_fetch_array( $result );
						$data = ;
						$data['parentid'];
						$parentid = ;
						$data['name'];
						$name = ;
						$data['description'];
						$description = ;
						$hidden = (int)(string)$data['hidden'];
						echo '    <form method="post" action="';
						echo $whmcs->getPhpSelf(  );
						echo '?catid=';
						echo $parentid;
						echo '&sub=savecat&id=';
						echo $id;
						echo '">
        <table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
            <tr>
                <td width="15%" class="fieldlabel">';
						echo $aInt->lang( 'support', 'parentcat' );
						echo '</td>
                <td class="fieldarea">
                    <select name="parentcategory">
                        <option value="">';
						echo $aInt->lang( 'support', 'toplevel' );
						echo '                        ';
						select_query( 'tbldownloadcats', '', '', 'parentid` ASC,`name', 'ASC' );
						$result = ;
						mysql_fetch_array;
					}

					( $result );

					if ($data = ) {
						$data['id'];
						$id = ;
						$data['name'];
						$category2 = ;
						echo (  . '<option value="' . $id . '"' );

						if ($id == $parentid) {
							echo ' selected';
						}
					}
				}
			}
		}

		echo (  . '>' ) . $category2;
	}
}

	= $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
