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

function {closure}($query) {
	$servertype;
	$servertype = ;
	$query->where( 'type', '=', $servertype )->where( 'disabled', '=', 0 );
}

require( '../init.php' );
$whmcs->get_req_var( 'action' );
$action = ;
$userId = (int)$whmcs->get_req_var( 'userid' );

if ($action == 'view') {
	$reqperm = 'View Order Details';
}
else {
	$jscode =  . '";
}
function cancelRefundOrder() {
    if (confirm("' . $aInt->lang( 'orders', 'confirmcancelrefund' ) . '"))
        window.location="' . $_SERVER['PHP_SELF'] . '?action=view&id=' . $id . '&cancelrefund=true' . generate_token( 'link' ) . '";
}
function fraudOrder() {
    if (confirm("' . $aInt->lang( 'orders', 'confirmfraud' ) . '"))
        window.location="' . $_SERVER['PHP_SELF'] . '?action=view&id=' . $id . '&fraud=true' . generate_token( 'link' ) . '";
}
function pendingOrder() {
    if (confirm("' . $aInt->lang( 'orders', 'confirmpending' ) . '"))
        window.location="' . $_SERVER['PHP_SELF'] . '?action=view&id=' . $id . '&pending=true' . generate_token( 'link' ) . '";
}
function deleteOrder() {
    $.post(
        "' . $_SERVER['PHP_SELF'] . '?action=ajaxCanOrderBeDeleted&id=' . $id . '",
            { token: "' . generate_token( 'plain' ) . '" },
           function (data) {
                if (data == 1) {
                    if (confirm("' . $aInt->lang( 'orders', 'confirmdelete' ) . '")) {
                        window.location="' . $_SERVER['PHP_SELF'] . '?action=delete&id=' . $id . '' . generate_token( 'link' ) . '";
                    }
                } else {
                    alert("' . $aInt->lang( 'orders', 'noDelete' ) . '");
                }
           }
    )
}
';
	getCurrency( $userid );
	$currency = ;
	formatCurrency( $amount );
	$amount = ;
	$jquerycode .= '$("#ajaxchangeorderstatus").change(function() {
    var newstatus = $("#ajaxchangeorderstatus").val();
    $.post("' . $_SERVER['PHP_SELF'] . '?action=ajaxchangeorderstatus&id=' . $id . '",
    { status: newstatus, token: "' . generate_token( 'plain' ) . '" },
   function(data) {
     if(data == ' . $id . '){
         $("#orderstatusupdated").fadeIn().fadeOut(5000);
     }
   });
});';
	$statusoptions = '<select id="ajaxchangeorderstatus" class="form-control select-inline">';
	select_query( 'tblorderstatuses', '', '', 'sortorder', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$statusoptions .= '<option style="color:' . $data['color'] . '"';

		if ($orderstatus == $data['title']) {
			$statusoptions .= ' selected';

			if ($aInt->lang( 'status', strtolower( $data['title'] ) )) {
				$statusoptions .= '>' . (true ? $aInt->lang( 'status', strtolower( $data['title'] ) ) : $data['title']) . '</option>';
			}
		}
	}
}


while (true) {
	echo '</th><th>';
	echo $aInt->lang( 'fields', 'description' );
	echo '</th><th>';
	echo $aInt->lang( 'fields', 'billingcycle' );
	echo '</th><th>';
	echo $aInt->lang( 'fields', 'amount' );
	echo '</th><th>';
	echo $aInt->lang( 'fields', 'status' );
	echo '</th><th>';
	echo $aInt->lang( 'fields', 'paymentstatus' );
	echo '</th></tr>
';
	$orderHasASubscription = false;
	select_query( 'tblhosting', '', array( 'orderid' => $id ) );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		if (0 < strlen( $data['subscriptionid'] )) {
			$orderHasASubscription = true;
			$data['id'];
			$hostingid = ;
			$data['domain'];
			$domain = ;
			$data['billingcycle'];
			$billingcycle = ;
			$data['domainstatus'];
			$hostingstatus = ;
			formatCurrency( $data['firstpaymentamount'] );
			$firstpaymentamount = ;
			$data['amount'];
			$recurringamount = ;
			$data['packageid'];
			$packageid = ;
			$data['server'];
			$server = ;
			$data['regdate'];
			$regdate = ;
			$data['nextduedate'];
			$nextduedate = ;
			$data['username'];
			$serverusername = ;
			decrypt( $data['password'] );
			$serverpassword = ;

			if (!$serverusername) {
				createServerUsername( $domain );
				$serverusername = ;

				if (!$serverpassword) {
					createServerPassword(  );
					$serverpassword = ;
					select_query( 'tblproducts', 'tblproducts.name,tblproducts.type,tblproducts.welcomeemail,tblproducts.autosetup,tblproducts.servertype,tblproductgroups.name AS groupname', array( 'tblproducts.id' => $packageid ), '', '', '', 'tblproductgroups ON tblproducts.gid=tblproductgroups.id' );
					$result2 = ;
					mysql_fetch_array( $result2 );
					$data = ;
					$data['groupname'];
					$groupname = ;
					$data['name'];
					$productname = ;
					$data['type'];
					$producttype = ;
					$data['welcomeemail'];
					$welcomeemail = ;
					$data['autosetup'];
					$autosetup = ;
					$data['servertype'];
					$servertype = ;

					if (( $domain && $producttype != 'other' )) {
						$domain .= '<br />(<a href="http://' . $domain . '" target="_blank" style="color:#cc0000">www</a> <a href="#" onclick="$(\'#frmWhoisDomain\').val(\'' . addslashes( $domain ) . '\');$(\'#frmWhois\').submit();return false">' . $aInt->lang( 'domains', 'whois' ) . '</a> <a href="http://www.intodns.com/' . $domain . '" target="_blank" style="color:#006633">intoDNS</a>)';
						echo  . '<tr><td align="center"><a href="clientsservices.php?userid=' . $userid . '&id=' . $hostingid . '"><b>';

						if ($producttype == 'hostingaccount') {
							echo $aInt->lang( 'orders', 'sharedhosting' );
						}
					}
				}
			}
		}


		while (true) {
			break 2;
		}
	}

	$newpackagename = ;
	$newvalue[1];
	$newbillingcycle = ;
	$details = '<a href="clientshosting.php?userid=' . $userid . '&id=' . $relid . '">' . $oldpackagename . ' => ' . $newpackagename . '</a><br />';

	if ($domain) {
		$details .= $server;
		echo  . '<tr><td align="center"><a href="clientshosting.php?userid=' . $userid . '&id=' . $relid . '"><b>Product Upgrade</b></a></td><td>' . $details . '</td><td>' . $aInt->lang( 'billingcycles', $newbillingcycle ) . (  . '</td><td>' . $upgradeamount . '</td><td>' ) . $aInt->lang( 'status', strtolower( $status ) ) . (  . '</td><td><b>' . $paymentstatus . '</td></tr>' );
	}

	jmp;
	select_query( 'tblproductconfigoptionssub', '', array( 'id' => $oldoptionid ) );
	$result2 = ;
	mysql_fetch_array( $result2 );
	$data = ;
	$data['optionname'];
	$oldoptionname = ;
	select_query( 'tblproductconfigoptionssub', '', array( 'id' => $newvalue ) );
	$result2 = ;
	mysql_fetch_array( $result2 );
	$data = ;
	$data['optionname'];
	$newoptionname = ;
	jmp;

	if ($optiontype == 3) {
		if ($oldoptionid) {
			$oldoptionname = 'Yes';
			$newoptionname = 'No';
			break;
		}
	}

	echo  . $details . '</td><td>' . $upgradeamount . '</td><td>' . $aInt->lang( 'status', strtolower( $status ) ) . (  . '</td><td><b>' . $paymentstatus . '</td></tr>' );
}


if ($orderHasASubscription) {
	$cancelOrderButton = 'jQuery(\'#modalCancelOrder\').modal(\'show\')';
	$buttons = array( array( 'title' => 'Cancel' ), array( 'title' => 'OK', 'onclick' => 'window.location="' . $_SERVER['PHP_SELF'] . '?action=view&id=' . $id . '&cancel=true' . generate_token( 'link' ) . '";' ), array( 'title' => 'Also Cancel Subscription', 'onclick' => 'window.location="' . $_SERVER['PHP_SELF'] . '?action=view&id=' . $id . '&cancel=true&cancelsub=true' . generate_token( 'link' ) . '";' ) );
	echo $aInt->modal( 'CancelOrder', 'Cancel Order', $aInt->lang( 'orders', 'confirmcancel' ), $buttons );
	$fraudOrderButton = 'jQuery(\'#modalFraudOrder\').modal(\'show\')';
	$buttons = array( array( 'title' => 'Cancel' ), array( 'title' => 'OK', 'onclick' => 'window.location="' . $_SERVER['PHP_SELF'] . '?action=view&id=' . $id . '&fraud=true' . generate_token( 'link' ) . '";' ), array( 'title' => 'Also Cancel Subscription', 'onclick' => 'window.location="' . $_SERVER['PHP_SELF'] . '?action=view&id=' . $id . '&fraud=true&cancelsub=true' . generate_token( 'link' ) . '";' ) );
	echo $aInt->modal( 'FraudOrder', 'Set as Fraud', $aInt->lang( 'orders', 'confirmfraud' ), $buttons );
	jmp;
	$cancelOrderButton = 'cancelOrder()';
	$fraudOrderButton = 'fraudOrder()';
	echo '<tr><th colspan="3" style="text-align:right;">';
	echo $aInt->lang( 'fields', 'totaldue' );
	echo ':&nbsp;</th><th>';
	echo $amount;
	echo '</th><th colspan="2"></th></tr>
</table>
</div>

<div class="btn-container">
<button type="submit" class="btn btn-success"';

	if (!$showpending) {
		echo ' disabled="disabled"';
		echo '>
    <i class="fa fa-check-circle"></i>
    ';
		echo $aInt->lang( 'orders', 'accept' );
		echo '</button>
<input type="button" value="';
		echo $aInt->lang( 'orders', 'cancel' );
		echo '" onClick="';
		echo $cancelOrderButton;
		echo '" class="btn btn-default"';

		if ($orderstatus == 'Cancelled') {
			echo ' disabled="disabled"';
			echo ' />
<input type="button" value="';
			echo $aInt->lang( 'orders', 'cancelrefund' );
			echo '" onClick="cancelRefundOrder()" class="btn btn-default"';

			if (( !$invoiceid || $invoicestatus == 'Refunded' )) {
				echo ' disabled="disabled"';
				echo ' />
<input type="button" value="';
				$aInt->lang;
				'orders';
				'fraud';
			}
		}
	}
}

echo (  );
echo '" onClick="';
echo $fraudOrderButton;
echo '" class="btn btn-default"';

if ($orderstatus == 'Fraud') {
	echo ' disabled="disabled"';
	echo ' />
<input type="button" value="';
	echo $aInt->lang( 'orders', 'pending' );
	echo '" onClick="pendingOrder()" class="btn btn-default" />
<input type="button" value="';
	$aInt->lang( 'orders', 'delete' );
}

echo ;
echo '" onClick="deleteOrder()" class="btn btn-danger" />
</div>

';

if (trim( $nameservers[0] )) {
	echo '<p><b>' . $aInt->lang( 'orders', 'nameservers' ) . '</b></p><p>';
	foreach ($nameservers as ) {
		$ns = ;
		$key = ;

		if (trim( $ns )) {
			echo $aInt->lang( 'domains', 'nameserver' ) . ' ' . ( $key + 1 ) . ': ' . $ns . '<br />';
			break;
		}

		break;
	}

	echo '</p>';

	if ($notes) {
		echo '<div id="notesholder"' . (true ? '' : ' style="display:none"') . '>
<h2>' . $aInt->lang( 'orders', 'notes' ) . '</h2>
    <div class="col-sm-8 col-sm-offset-1">
        <textarea rows="4" id="notes" class="form-control">' . $notes . '</textarea>
    </div>
    <div class="col-sm-2">
        <br />
        <input type="button" value="' . $aInt->lang( 'orders', 'updateSaveNotes' ) . '" id="savenotesbtn" class="btn btn-primary btn-sm btn-block" />
    </div>
</div>';

		if ($fraudmodule) {
			new eaedaiidif(  );
			$fraud = ;

			if ($fraud->load( $fraudmodule )) {
				$fraud->processResultsForDisplay( $id, $fraudoutput );
				$fraudresults = ;
				is_array;
				$fraudresults;
			}
		}


		if ((  )) {
			if ($fraudmodule == 'maxmind') {
				echo '<table width="100%" cellspacing="0" cellpadding="0"><tr><td><p><b>' . $aInt->lang( 'orders', 'fraudcheckresults' ) . '</b></p></td><td align="right"><div id="rerunfraud"><a href="#">' . $aInt->lang( 'orders', 'fraudcheckrerun' ) . '</a></div></td></tr></table><br />';
			}
		}

		$i = 26;
		foreach ($fraudresults as ) {
			$value = ;
			$key = ;
			++$i;
			echo  . '<td class="fieldlabel" width="30%">' . $key . '</td><td class="fieldarea"';

			if ($key == 'Explanation') {
				echo ' colspan="3"';
				$i = 28;
				break;
			}

			break;
		}
	}
	else {
		echo '</tr></table></div>';
		'$("#rerunfraud").click(function () {
        $("#rerunfraud").html(\'' . DI::make( 'asset' )->imgTag( 'spinner.gif', $aInt->lang( 'global', 'loading' ), array( 'align' => 'absmiddle' ) ) . ' Performing Check...\');
        $.post("orders.php", { action: "view", rerunfraudcheck: "true", orderid: ' . $id . ', token: "';
		generate_token;
		'plain';
	}

	$jquerycode .=  . (  ) . '" },
        function(data){
            $("#fraudresults").html(data);
            $("#rerunfraud").html("' . $aInt->lang( 'orders', 'fraudCheckUpdateCompleted' ) . '");
        });
        return false;
    });';
	echo '
</form>

';
	generate_token( 'plain' );
	$token = ;
	$saveChangesCode =  . 'jQuery("#affiliatefield").html(jQuery("#affid option:selected").text());
jQuery("#modalAffiliateAssign").modal("hide");
jQuery.post(
    "orders.php",
    {
        action: "affassign",
        orderid: ' . $id . ',
        affid: jQuery("#affid").val(),
        token: "' . $token . '"
    }
);';
	echo $aInt->modal( 'AffiliateAssign', $aInt->lang( 'orders', 'affassign' ), $aInt->lang( 'global', 'loading' ), array( array( 'title' => $aInt->lang( 'global', 'savechanges' ), 'onclick' => $saveChangesCode ), array( 'title' => $aInt->lang( 'global', 'cancelchanges' ) ) ), 'small' );
	$jquerycode .= '$("#showaffassign").click(
    function() {
        $("#modalAffiliateAssign").modal("show");
        $("#modalAffiliateAssignBody").load("orders.php?action=affassign");
        return false;
    }
);
$("#togglenotesbtn").click(function() {
    $("#notesholder").slideToggle("slow", function() {
        toggletext = $("#togglenotesbtn").attr("value");

        notesVisible = $("#notes").is(":visible");

        hideNotesText = "' . $aInt->lang( 'orders', 'hideNotes' ) . '";
        addNotesText = "' . $aInt->lang( 'orders', 'addNotes' ) . '";

        $("#togglenotesbtn").fadeOut("fast",function(){ $("#togglenotesbtn").attr("value", notesVisible ? hideNotesText : addNotesText); $("#togglenotesbtn").fadeIn(); });

        $("#shownotesbtnholder").slideToggle();
    });
    return false;
});
$("#savenotesbtn").click(function() {
    $.post("?action=view&id=' . $id . '", { updatenotes: true, notes: $(\'#notes\').val(), token: "' . generate_token( 'plain' ) . '" });
    $("#savenotesbtn").attr("value","' . $aInt->lang( 'orders', 'notesSaved' ) . '");
    return false;
});
$("#notes").keyup(function() {
    $("#savenotesbtn").attr("value","' . $aInt->lang( 'orders', 'saveNotes' ) . '");
});';
	$aInt->jscode = $jscode;
}

$aInt->jquerycode = $jquerycode;
ob_get_contents(  );
$content = define( 'ADMINAREA', true );
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
