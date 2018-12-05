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
new dgeegejige( 'Configure OpenID Connect' );
$aInt = ;
$aInt->title = AdminLang::trans( 'setup.openIdConnect' );
$aInt->sidebar = 'config';
$aInt->icon = 'otherconfig';
$aInt->helplink = 'OpenID Connect';
$whmcs->get_req_var( 'action' );
$action = ;
$id = (int)$whmcs->get_req_var( 'id' );
$whmcs->get_req_var( 'orderby' );
$orderby = ;
$content = '';

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'name' );
	$name = ;
	$whmcs->get_req_var( 'description' );
	$description = ;
	$whmcs->get_req_var( 'logo_uri' );
	$logo_uri = ;
	$whmcs->get_req_var( 'authorized_uris' );
	$authorized_uris = ;
	new ieccfgdde(  );
	$api = ;

	if ($id) {
		$api->setAction( 'UpdateOAuthCredential' )->setParam( 'credentialId', $id )->setParam( 'name', $name )->setParam( 'description', $description )->setParam( 'logoUri', $logo_uri )->setParam( 'redirectUri', $authorized_uris )->call(  );
		$aInt->flash( AdminLang::trans( 'global.changesuccess' ), AdminLang::trans( 'global.changesuccessdesc' ), 'success' );
		redir(  );
	}

	( 'success' );
	redir( 'action=manage&id=' . $credentialId );
}

(  );
redir( 'action=manage&id=' . $id );
jmp;

if ($action == 'reset') {
	check_token( 'WHMCS.admin.default' );
	new ieccfgdde(  );
	$api = ;
	$api->setAction( 'UpdateOAuthCredential' )->setParam( 'credentialId', $id )->setParam( 'resetSecret', true )->call(  )->get( 'credentialId' );
	$credentialId = ;
	$aInt->flash( AdminLang::trans( 'global.success' ), AdminLang::trans( 'openid.newSecretSuccess' ), 'success' );
	redir( 'action=manage&id=' . $credentialId );
}

$content .=  . AdminLang::trans( 'openid.applicationName' ) . '" value="' . dfdidhdbdc::makeSafeForOutput( $client->name ) . '" />
            </td>
        </tr>
        <tr>
            <td width="20%" class="fieldlabel">
                ' . AdminLang::trans( 'global.description' ) . '
            </td>
            <td class="fieldarea">
                <input type="text" name="description" id="inputDescription" class="form-control input-600" placeholder="' . AdminLang::trans( 'openid.descriptionPlaceholder' ) . '" value="' . dfdidhdbdc::makeSafeForOutput( $client->description ) . '" />
            </td>
        </tr>
        <tr>
            <td width="20%" class="fieldlabel">
                ' . AdminLang::trans( 'openid.clientApiCreds' ) . '
            </td>
            <td class="fieldarea">';

if ($id) {
	'
                <div style="margin:15px 20px;background-color:#fff;border-radius:4px;padding:10px;max-width:900px;">
                    <table width="100%">
                        <tr>
                            <td width="140" class="text-right">' . AdminLang::trans( 'fields.clientid' ) . '</td>
                            <td><input type="text" id="inputClientId" class="form-control input-700" value="' . dfdidhdbdc::makeSafeForOutput( $client->identifier ) . '" readonly="readonly" /></td>
                        </tr>
                        <tr>
                            <td class="text-right">' . AdminLang::trans( 'openid.clientSecret' ) . '</td>
                            <td>
                                <div class="input-group input-700">
                                    <input type="text" id="inputClientSecret" class="form-control input-700" value="' . dfdidhdbdc::makeSafeForOutput( $client->decryptedSecret ) . '" readonly="readonly" />
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default" style="width:180px;" onclick="doReset(\'' . $id . '\')" id="btnDelete">
                                            ' . AdminLang::trans( 'openid.resetClientSecret' ) . '
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">' . AdminLang::trans( 'openid.creationDate' ) . '</td>
                            <td><input type="text" class="form-control input-400" value="' . $client->createdAt->format( 'l, F jS, Y g:i:sa' );
}

$content .=  . '" readonly="readonly" /></td>
                        </tr>
                    </table>
                </div>';
jmp;
$content .= '
                <div class="alert alert-warning" style="margin:15px 20px">
                    <i class="fa fa-warning"></i>
                    ' . AdminLang::trans( 'openid.creationOnFirstSave' ) . '
                </div>';
$content .= '
            </td>
        </tr>';
$content .= '
        <tr>
            <td width="20%" class="fieldlabel">
                ' . AdminLang::trans( 'openid.logoUrl' ) . '
            </td>
            <td class="fieldarea">
                <div class="bottom-margin-5">
                    ' . AdminLang::trans( 'openid.logoUrlMsg' ) . '
                </div>
                <input type="text" name="logo_uri" id="inputLogoUri" class="form-control input-700" placeholder="' . AdminLang::trans( 'openid.logoUrlEg' ) . '" value="' . dfdidhdbdc::makeSafeForOutput( $client->logo_uri ) . '" />
            </td>
        </tr>
        <tr>
            <td width="20%" class="fieldlabel">
                ' . AdminLang::trans( 'openid.authorizedRedirectUris' ) . '
            </td>
            <td class="fieldarea">
                <div class="bottom-margin-5">
                    ' . AdminLang::trans( 'openid.authorizedRedirectUrisMsg' ) . '
                </div>
                <div id="containerAuthorizedUris">';

if (count( $client->redirectUri ) == 0) {
	$content .= '
                    <span style="display:block;">
                        <input type="text" name="authorized_uris[]" class="form-control input-inline input-600 bottom-margin-5" placeholder="' . AdminLang::trans( 'openid.exampleUrl' ) . '" />
                        <button type="button" class="btn btn-danger btn-xs input-inline btn-remove-uri" disabled="disabled">
                            <i class="fa fa-times"></i>
                            ' . AdminLang::trans( 'global.remove' ) . '
                        </button>
                    </span>';
	foreach ($client->redirectUri as ) {
		$redirectUri = ;
		$i = ;
		$content .= '
                    <span style="display:block;">
                        <input type="text" name="authorized_uris[]" class="form-control input-inline input-600 bottom-margin-5" placeholder="' . AdminLang::trans( 'openid.exampleUrl' ) . '" value="' . dfdidhdbdc::makeSafeForOutput( $redirectUri ) . '" />
                        <button type="button" class="btn btn-danger btn-xs input-inline btn-remove-uri">
                            <i class="fa fa-times"></i>
                            ' . AdminLang::trans( 'global.remove' ) . '
                        </button>
                    </span>';
		break;
	}

	'
                </div>
                <button type="button" class="btn btn-default btn-sm" id="btnAddAuthorizedUri">
                    <i class="fa fa-plus"></i>
                    ' . AdminLang::trans( 'global.addAnother' ) . '
                </button>
            </td>
        </tr>
    </table>

    <div class="btn-container">
        <input type="submit" value="';

	if ($id) {
			. (true ? AdminLang::trans( 'global.savechanges' ) : AdminLang::trans( 'openid.generateCreds' )) . '" class="btn btn-primary" id="btnSubmit" />
        <a href="' . $whmcs->getPhpSelf(  ) . '" class="btn btn-default" id="btnCancel">';
		AdminLang::trans;
	}
}

	. ( 'global.cancelchanges' ) . '</a>
        ';

if ($id) {
	$content .=  . (true ? '<button type="button" value="Delete" class="btn btn-danger" onclick="doDelete(\'' . $id . '\')" id="btnDelete">' . AdminLang::trans( 'openid.deleteCreds' ) . '</button>' : '') . '
    </div>

</form>

    ';
	$aInt->jquerycode = '
jQuery("body").on("click", "#containerAuthorizedUris .btn-remove-uri", function() {
    jQuery(this).parents("span").remove();
    if (jQuery(".btn-remove-uri").size() <= 1) {
        jQuery(".btn-remove-uri").attr("disabled", "disabled");
    } else {
        jQuery(".btn-remove-uri").removeAttr("disabled");
    }
});
jQuery("#btnAddAuthorizedUri").click(function() {
    var $row = jQuery("#containerAuthorizedUris span:first").clone();
    $row.find("input").val("");
    jQuery("#containerAuthorizedUris").append($row);
    jQuery(".btn-remove-uri").removeAttr("disabled");
});
    ';
	$content .= $aInt->modalWithConfirmation( 'doDelete', AdminLang::trans( 'openid.doDeleteWarning' ) . '<br /><em>' . AdminLang::trans( 'openid.doDeleteWarningMsg' ) . '</em>', '?action=delete&id=' ) . $aInt->modalWithConfirmation( 'doReset', AdminLang::trans( 'openid.doResetWarning' ) . '<br /><em>' . AdminLang::trans( 'openid.doResetWarningMsg' ) . '</em>', '?action=reset&id=' );
	$aInt->content = $content;
	$aInt->display(  );
}

?>
