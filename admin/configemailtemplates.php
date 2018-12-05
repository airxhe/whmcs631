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
new dgeegejige( 'View Email Templates' );
$aInt = ;
$aInt->title = $aInt->lang( 'emailtpls', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'massmail';
$aInt->helplink = 'Email Templates';
cebaiefhhg::getActiveLanguages(  );
$activelanguages = ;

if ($action == 'new') {
	check_token( 'WHMCS.admin.default' );
	checkPermission( 'Create/Edit Email Templates' );
	App::get_req_var( 'name' );
	$name = ;

	if (!empty( $$name )) {
		new cebaiefhhg(  );
		$template = ;
		$template->type = $type;
		$template->name = $name;
		$template->custom = true;
		$template->save(  );
		logAdminActivity(  . 'Email Template Created: \'' . $name . '\' - Template ID: ' . $template->id );
	}
}


while (true) {
	else {
		foreach ($activelanguages as ) {
			$lang = ;
			'<option value="' . $lang . '">' . ucfirst( $lang );
		}
	}

	echo  . '</option>';
}

echo '</select> <input type="submit" name="disablelanguage" value="';
echo $aInt->lang( 'global', 'submit' );
echo '" class="button btn btn-default" />
</div>
</form>
</div>
';
echo '
';
jmp;

if ($action == 'edit') {
	cebaiefhhg::find( $id );
	$template = ;

	if ($plaintextchange) {
		if ($template->plaintext) {
			$template->message = str_replace( '

', dfdidhdbdc::encode( '</p><p>' ), $template->message );
			$template->message = str_replace( '
', dfdidhdbdc::encode( '<br>' ), $template->message );
			$template->plaintext = false;
			$template->save(  );
		}
	}
}

$template->message = (  );
$template->message = str_replace( dfdidhdbdc::encode( '</p>' ), '

', $template->message );
$template->message = str_replace( dfdidhdbdc::encode( '<br>' ), '
', $template->message );
$template->message = str_replace( dfdidhdbdc::encode( '<br />' ), '
', $template->message );
$template->message = strip_tags( $template->message );
$template->plaintext = true;
$template->save(  );
logAdminActivity(  . 'Email Template Plain Text Toggled: \'' . $template->name . '\' - Template ID: ' . $id );

if ($template->plaintext) {
	$noeditor = true;
	$jquerycode = '$("#addfileupload").click(function () {
    $("#fileuploads").append("<input type=\"file\" name=\"attachments[]\" class=\"form-control top-margin-5\" />");
    return false;
});';
	echo '
<form method="post" action="';
	echo $whmcs->getPhpSelf(  );
	echo '?savemessage=true&id=';
	echo $template->id;
	echo '" enctype="multipart/form-data">
<input type="hidden" name="editorstate" value="';
	echo $noeditor;
	echo '" />
<p><b>';
	echo $template->name;
	echo '</b></p>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr>
    <td class="fieldlabel">
        ';
	echo $aInt->lang( 'emails', 'from' );
	echo '    </td>
    <td class="fieldarea">
        <input type="text" name="fromname" size="25" value="';

	if ($template->fromName == '') {
		echo $CONFIG['CompanyName'];
	}
}


while (true) {
	echo '<div class="email-attachment">
            <i class="fa fa-file-o"></i>
            ' . $filename . '
            &nbsp;
            <a href="configemailtemplates.php?action=delatt&id=' . $template->id . '&i=' . $i . generate_token( 'link' ) . '" title="' . $aInt->lang( 'global', 'delete' ) . '" class="btn btn-danger btn-xs">
                <i class="fa fa-remove"></i>
            </a>
        </div>';
	$hasAttachments = true;
}


if (!$hasAttachments) {
	echo '<input type="file" name="attachments[]" class="form-control" />';
	echo '        </div>
        <div class="top-margin-5">
            <a href="#" id="addfileupload" class="btn btn-default btn-xs">
                <i class="fa fa-plus-circle"></i>
                ';
	echo $aInt->lang( 'support', 'addmore' );
	echo '            </a>
        </div>
    </td></tr>
<tr>
    <td class="fieldlabel">
        ';
	echo $aInt->lang( 'emailtpls', 'plaintext' );
	echo '    </td>
    <td class="fieldarea">
        <label class="checkbox-inline">
            <input type="checkbox" name="plaintext" value="1"';

	if ($template->plaintext) {
		echo ' checked';
		echo ' onClick="window.location=\'configemailtemplates.php?action=edit&id=';
		echo $template->id;
		echo '&plaintextchange=true\'">
            ';
		echo $aInt->lang( 'emailtpls', 'plaintextinfo' );
		echo '        </label>
    </td>
</tr>
<tr>
    <td class="fieldlabel">
        ';
		echo $aInt->lang( 'global', 'disable' );
		echo '    </td>
    <td class="fieldarea">
        <label class="checkbox-inline">
            <input type="checkbox" name="disabled"';

		if ($template->disabled) {
		}
	}
}

echo ' checked';
echo ' data-enter-submit="true">
            ';
echo $aInt->lang( 'emailtpls', 'disableinfo' );
echo '        </label>
    </td>
</tr>
</table>
<br>
';
array_unique( cebaiefhhg::where( 'language', '!=', '' )->orderBy( 'type' )->get( array( 'language' ) )->fetch( 'language' )->toArray(  ) );
$activelanguages = ;
cebaiefhhg::where( 'type', '=', $template->type )->where( 'name', '=', $template->name )->where( 'language', '=', '' )->get(  )->first(  );
$noLanguageTemplate = ;
dfdidhdbdc::makeSafeForOutput( $noLanguageTemplate->subject );
$default_subject = ;
dfdidhdbdc::makeSafeForOutput( $noLanguageTemplate->message );
$default_message = ;
sprintf( $aInt->lang( 'emailtpls', 'defaultversionexp' ), ucfirst( $CONFIG['Language'] ) );
$defaultVersionExp = ;
$jquerycode .= '$("input[data-enter-submit]").keypress(function(event) {
    if ( event.which == 13 ) {
        event.preventDefault();
        $("#savechanges").click();
    }
});
';
$templateTop =  . '<div style="float:right;">
    <input type="submit" name="toggleeditor" value="' . $aInt->lang( 'emailtpls', 'rteditor' ) . '" class="btn btn-sm" />
</div>
<b>' . $aInt->lang( 'emailtpls', 'defaultversion' ) . '</b> - ' . $defaultVersionExp . '<br />
<br />
Subject: <input type="text" name="subject[' . $noLanguageTemplate->id . ']" size=80 value="' . $default_subject . '" data-enter-submit="true" /><br />
<br />';
echo $templateTop;
echo '<textarea name="message[';
echo $noLanguageTemplate->id;
echo ']" id="email_msg1" rows="25" style="width:100%" class="tinymce">';
echo $default_message;
echo '</textarea><br>
';
$i = 14;
foreach ($activelanguages as ) {
	$language = ;
	cebaiefhhg::where( 'type', '=', $template->type )->where( 'name', '=', $template->name )->where( 'language', '=', $language )->firstOrFail(  );
	$languageTemplate = ;
	dfdidhdbdc::makeSafeForOutput( $languageTemplate->subject );
	$subject = ;
	dfdidhdbdc::makeSafeForOutput( $languageTemplate->message );
	$message = ;
	$languageTemplate->id;
	$id = ;
	break;
}

$aInt->lang( 'global', 'savechanges' );
$saveChanges = ;
echo '<div class="btn-container">
    <input type="submit" id="savechanges" value="';
echo $saveChanges;
echo '" class="btn btn-primary" />
    <input type="button" value="';
echo $aInt->lang( 'global', 'cancelchanges' );
echo '" onClick="window.location=\'';
echo $whmcs->getPhpSelf(  );
echo '\'" class="btn btn-default" />
</div>
</form>

';

if (( !$plaintext && !$noeditor )) {
	$aInt->richTextEditor;
}

(  );
$template->type;
$type = ;
$template->name;
$name = ;
include( 'mergefields.php' );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jscode = $jscode;
$aInt->jquerycode = $jquerycode;
$aInt->display(  );
?>
