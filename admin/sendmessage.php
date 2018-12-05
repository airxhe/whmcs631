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
new dgeegejige( 'Mass Mail', false );
$aInt = ;
$aInt->title = $aInt->lang( 'sendmessage', 'sendmessagetitle' );
$aInt->sidebar = 'clients';
$aInt->icon = 'massmail';
ob_start(  );
$token = null;
$queryMadeFromEmailType = ;
$safeStoredQuery = ;
$query = ;
$massmailquery = ;
$whmcs->get_req_var( 'massmailquery' );
$userInput_massmailquery = ;
new becjgcgcge( 'Admin.Massmail' );
$queryMgr = ;
$whmcs->getInstance(  )->get_req_var( 'preaction' );
$preaction = ;

if (!$queryMgr->isValidTokenFormat( $userInput_massmailquery )) {
	$userInput_massmailquery = null;

	if ($preaction == 'preview') {
		$action = '';
		check_token( 'WHMCS.admin.default' );
		$email_preview = true;
		cebaiefhhg::where( 'name', '=', 'Mass Mail Template' )->delete(  );

		if ($type == 'addon') {
			$type = 'product';
			new cebaiefhhg(  );
			$template = ;
			$template->type = $type;
			$template->name = 'Mass Mail Template';
			$template->subject = $subject;
			$template->message = $message;
			$template->fromName = '';
			$template->fromEmail = '';
			$template->copyTo = '';
			$template->disabled = false;
			$template->custom = false;
			$template->plainText = false;
			$queryMgr->getQuery( $queryMgr->getTokenValue(  ) );
			$safeStoredQuery = ;

			if (( $massmail && $safeStoredQuery )) {
				$massmailquery = $queryMgr;
				full_query( $massmailquery );
				$result = ;
				mysql_num_rows( $result );
				$totalemails = ;
				ceil( $totalemails / $massmailamount );
				$totalsteps = ;
				$esttotaltime = ( $totalsteps - ( $step + 1 ) ) * $massmailinterval;
				full_query( $massmailquery . ' LIMIT 0,1' );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					sendMessage( $template, $data['id'], '', true, $_SESSION['massmail']['attachments'] );
				}
			}
		}
	}
}
else {
	while ($clientlanguage) {
		$query .= ' AND tblclients.language IN (' . $clientlanguage . ')';

		if (is_array( $customfield )) {
			foreach ($customfield as ) {
				$v = ;
				$k = ;

				if ($v) {
					$query .= ' AND (SELECT value FROM tblcustomfieldsvalues WHERE fieldid=\'' . db_escape_string( $k ) . '\' AND relid=tblclients.id LIMIT 1)=\'' . db_escape_string( $v ) . '\'';
					break;
				}

				break;
			}

			$queryMadeFromEmailType = $whmcs;

			if (( $queryMadeFromEmailType || $userInput_massmailquery )) {
				if ($queryMadeFromEmailType) {
					$massmailquery = $preaction;
				}

				jmp;

				if (( !$queryMadeFromEmailType && $queryMgr->isValidTokenFormat( $userInput_massmailquery ) )) {
					$queryMgr->getQuery( $userInput_massmailquery );
					$massmailquery = ;
				}
				else {
					$temptodata = (  . ' ' ) . $data['lastname'];

					if ($data['domain']) {
						$temptodata .= ' - ' . $data['domain'];
						$temptodata .=  . ' &lt;' . $data['email'] . '&gt;';
						$todata[] = $temptodata;
						$data['userid'];
					}
				}
			}

			$useridsdone[] = ;
			continue;
		}

		break;
	}
}


while (true) {
	$todata[] =  . $data['email'] . '&gt;';
}

jmp;

if ($type == 'affiliate') {
	foreach ($selectedclients as ) {
		$id = ;
		select_query( 'tblaffiliates', 'tblclients.firstname,tblclients.lastname,tblclients.email', array( 'tblaffiliates.id' => $id ), '', '', '', 'tblclients ON tblclients.id=tblaffiliates.clientid' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$todata[] = (  . $data['firstname'] . ' ' ) . $data['lastname'] . ' - ' . $data['domain'] . ' &lt;' . $data['email'] . '&gt;';
		break;
	}

	jmp;
	$id = (int)App::get_req_var( 'id' );

	if ($resend) {
		select_query( 'tblemails', '', array( 'id' => $emailid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['userid'];
		$id = ;
		$data['subject'];
		$subject = ;
		$data['message'];
		$message = ;
		str_replace;
		$CONFIG['Domain'];
	}

	( '<p><a href="' .  . '" target="_blank"><img src="' . $CONFIG['LogoURL'] . '" alt="' . $CONFIG['CompanyName'] . '" border="0"></a></p>', '', $message );
	$message = ;
	str_replace( '<p><a href="' . $CONFIG['Domain'] . '" target="_blank"><img src="' . $CONFIG['LogoURL'] . '" alt="' . $CONFIG['CompanyName'] . '" border="0" /></a></p>', '', $message );
	$message = ;
	str_replace( dfdidhdbdc::decode( $CONFIG['EmailGlobalHeader'] ), '', $message );
	$message = ;
	str_replace( dfdidhdbdc::decode( $CONFIG['EmailGlobalFooter'] ), '', $message );
	$message = ;
	$styleend = strpos( $message, '</style>' ) + 8;
	trim( substr( $message, $styleend ) );
	$message = ;
	$type = 'general';

	if ($type == 'general') {
		select_query( 'tblclients', '', array( 'id' => $id ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;

		if ($data['email']) {
			$todata[] = (  . $data['firstname'] . ' ' ) . $data['lastname'] . ' &lt;' . $data['email'] . '&gt;';
		}
	}
	else {
		echo (  );
		echo '<br /> &nbsp; ';
		echo $aInt->lang( 'sendmessage', 'emailsentindividually2' );
		echo '</td>

                </table></td>
            </td>
        </tr>
        <tr>
            <td class="fieldlabel">CC</td>
            <td class="fieldarea"><input type="text" name="cc" size="80" value=""> ';
		echo $aInt->lang( 'sendmessage', 'commaseparateemails' );
		echo '</td>
        </tr>
        <tr>
            <td class="fieldlabel">Subject</td>
            <td class="fieldarea"><input type="text" name="subject" size="90"
                value="';
		echo $subject;
		echo '" id="subject"></td>
        </tr>
    </table>

    <br>

    <script langauge="javascript">
frmmessage.subject.select();
</script>

    <textarea name="message" id="email_msg1" rows="25" style="width: 100%;margin: 0 0 20px 0;" class="tinymce">
        ';
		echo $message;
		echo '    </textarea>

    <br />

    <table class="form" width="100%" border="0" cellspacing="2"
        cellpadding="3">
        <tr>
            <td width="140" class="fieldlabel">';
		echo $aInt->lang( 'support', 'attachments' );
		echo '</td>
            <td class="fieldarea"><div style="float: right;">
                    <input type="button"
                        value="';
		echo $aInt->lang( 'emailtpls', 'rteditor' );
		echo '"
                        class="btn btn-default" onclick="toggleEditor()" />
                </div>
                <input type="file" name="attachments[]" style="width: 60%;" /> <a
                href="#" id="addfileupload"><img src="images/icons/add.png"
                    align="absmiddle" border="0" /> ';
		echo $aInt->lang( 'support', 'addmore' );
		echo '</a><br />
            <div id="fileuploads"></div></td>
        </tr>
';

		if (( $massmailquery || $multiple )) {
			echo '<tr>
            <td class="fieldlabel">';
			echo $aInt->lang( 'sendmessage', 'marketingemail' );
			echo '</td>
            <td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" id="emailoptout"
                    name="emailoptout"> ';
			echo $aInt->lang( 'sendmessage', 'dontsendemailunsubscribe' );
			echo '</label></td>
        </tr>
';

			if (checkPermission( 'Create/Edit Email Templates', true )) {
				echo '<tr>
            <td class="fieldlabel">';
				echo $aInt->lang( 'sendmessage', 'savemesasge' );
				echo '</td>
            <td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="save"> ';
				echo $aInt->lang( 'sendmessage', 'entersavename' );
				echo ':</label>
                <input type="text" name="savename" size="30"></td>
        </tr>';

				if ($massmailquery) {
					echo '<tr>
            <td class="fieldlabel">';
					echo $aInt->lang( 'sendmessage', 'massmailsettings' );
					echo '</td>
            <td class="fieldarea">';
					echo $aInt->lang( 'sendmessage', 'massmailsetting1' );
					echo ' <input
                type="text" name="massmailamount" size="5" value="25" /> ';
					echo $aInt->lang( 'sendmessage', 'massmailsetting2' );
					echo ' <input
                type="text" name="massmailinterval" size="5" value="30" /> ';
					echo $aInt->lang( 'sendmessage', 'massmailsetting3' );
					echo '</td>
        </tr>';
					echo '</table>

    <div class="btn-container">
        <input type="button"
            value="';
					echo $aInt->lang( 'sendmessage', 'preview' );
					echo '"
            onclick="previewMsg()" class="btn btn-default" /> <input type="submit"
            value="';
					echo $aInt->lang( 'global', 'sendmessage' );
					echo ' &raquo;"
            class="btn btn-primary" />
    </div>

</form>

';
					$aInt->richTextEditor(  );
					echo '<div id="emailoptoutinfo">';
					infoBox;
					$aInt->lang( 'sendmessage', 'marketingemail' );
					sprintf;
					$aInt->lang;
				}

				( ( ( 'sendmessage', 'marketingemaildesc' ), '{$unsubscribe_url}' ) );
				echo $infobox;
				echo '</div>';
				$i = 24;
				include( 'mergefields.php' );
				echo '
<form method="post" action="';
				echo $_SERVER['PHP_SELF'];
				echo '">
    <input type="hidden" name="sub" value="loadmessage"> <input
        type="hidden" name="type" value="';
				echo $type;
				echo '">
';

				if ($massmailquery) {
					if ($queryMgr->isValidTokenFormat( $massmailquery )) {
						$queryMgr->getQuery( $massmailquery );
						$queryToStore = ;
						jmp;
						$queryToStore = $userInput_massmailquery;
						$queryMgr->generateToken(  );
						$token = ;
						$queryMgr->setQuery( $token, $queryToStore );
						echo  . '<input type="hidden" name="massmailquery" value="' . $token . '">';

						if ($sendforeach) {
							echo  . '<input type="hidden" name="sendforeach" value="' . $sendforeach . '">';
						}
					}
				}
			}

			(  )->where( 'language', '=', '' )->orderBy( 'custom' )->orderby( 'name' )->get(  );
			$templates = ;
			foreach ($templates as ) {
				$template = ;
				echo '<option style="background-color: #ffffff">' . $template->name . '</option>';
				break;
			}


			if ($type != 'general') {
				cebaiefhhg::where( 'type', '=', $type )->where( 'language', '=', '' )->orderBy( 'custom' )->orderby( 'name' )->get(  );
				$templates = ;
				foreach ($templates as ) {
					$template = ;
					echo '<option';

					if (!$template->custom) {
						echo ' style="background-color: #efefef"';
						echo (  . '>' ) . $template->name . '</option>';
						break;
					}

					break;
				}

				echo '</select> <input type="submit" class="btn btn-default"
            value="';
				echo $aInt->lang( 'sendmessage', 'loadMessage' );
				echo '">
    </div>
</form>

';
				$aInt->modal;
				'PreviewWindow';
				$aInt->lang( 'sendmessage', 'preview' );
				'<div id="previewwndcontent">' . $aInt->lang( 'global', 'loading' );
			}
		}

		echo (  . '</div>', array( array( 'title' => $aInt->lang( 'global', 'ok' ), 'onclick' => 'jQuery("#modalPreviewWindow").modal("hide");jQuery("#previewwndcontent").html("<div id=\"previewwndcontent\">' . $aInt->lang( 'global', 'loading', true ) . '</div>");' ) ), 'large' );
		$jquerycode .= '$("#addfileupload").click(function () {
    $("#fileuploads").append("<input type=\"file\" name=\"attachments[]\" style=\"width:70%;\" /><br />");
    return false;
});
$("#emailoptoutinfo").hide();
$("#emailoptout").click(function(){
    if (this.checked) {
        $("#emailoptoutinfo").slideDown("slow");
    } else {
        $("#emailoptoutinfo").slideUp("slow");
    }
});';
	}

	$jscode = 'function previewMsg() {
    if ($("#email_msg1").tinymce() === undefined) {
        alert("Cannot preview message while the rich-text editor is disabled - please re-enable and then try again");
    } else {
        jQuery("#modalPreviewWindow").modal("show");
        jQuery.post("sendmessage.php", jQuery("#sendmsgfrm").serialize()+"&preaction=preview",
        function(data){
            if (data) {
                jQuery("#previewwndcontent").html(data);}
            else {
                jQuery("#previewwndcontent").html("Syntax Error - Please check your email message for invalid template syntax or missing closing tags");
            }
        });
        return false;
    }
}';
	ob_get_contents;
}

(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
