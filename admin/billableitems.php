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

if (!$action) {
	$reqperm = 'View Billable Items';
}

echo ( 'status', 'completedrecurring' );
echo '</option>
</select></td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'global', 'searchfilter' );
echo '" class="btn btn-default">
</div>

</form>

';
echo $aInt->endAdminTabs(  );
echo '
<br />

';
$aInt->sortableTableInit( 'id', 'DESC' );
$where = array(  );

if ($status == 'Uninvoiced') {
	$where['invoicecount'] = 0;
}


while (true) {
	echo ( array( array(  ), '', '' ), $tabledata, $tableformurl, $tableformbuttons );
	jmp;

	if ($action == 'manage') {
		$jquery = '';

		if ($id) {
			$aInt->lang( 'billableitems', 'edititem' );
			$pagetitle = ;
			select_query( 'tblbillableitems', '', array( 'id' => $id ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['id'];
			$id = ;
			$data['userid'];
			$userid = ;
			$data['description'];
			$description = ;
			$data['hours'];
			$hours = ;
			$data['amount'];
			$amount = ;

			if ($hours != 0) {
				format_as_currency( $amount / $hours );
				$amount = ;
				$data['recur'];
				$recur = ;
				$data['recurcycle'];
				$recurcycle = ;
				$data['recurfor'];
				$recurfor = ;
				$data['invoiceaction'];
				$invoiceaction = ;
				$data['invoicecount'];
				$invoicecount = ;
				fromMySQLDate( $data['duedate'] );
				$duedate = ;
				jmp;
				$aInt->lang( 'billableitems', 'additem' );
				$pagetitle = ;
				get_query_val( 'tblclients', 'id', '' );
				$clientcheck = ;

				if (!$clientcheck) {
					$aInt->gracefulExit( $aInt->lang( 'billableitems', 'noclientsmsg' ) );
					$invoiceaction = 8;
					$recur = 8;
					getTodaysDate(  );
					$duedate = ;
					$hours = '0.0';
					$amount = '0.00';
					$invoicecount = 8;
					$options = '';
					new eadeihghbj(  );
					$products = ;
					$products->getProducts(  );
					$productsList = ;
					foreach ($productsList as ) {
						$data = ;
						$data['id'];
						$pid = ;
						$data['name'];
						$pname = ;
						$data['groupname'];
						$ptype = ;
						$options .= (  . '<option value="' . $pid . '"' );

						if ($package == $pid) {
							$options .= ' selected';
							$options .= (  . '>' ) . $ptype . ' - ' . $pname . '</option>';
							break 2;
						}

						break 2;
					}

					echo  . '<h2>' . $pagetitle . '</h2>';
					$jquerycode = '$(".itemselect").change(function () {
    var itemid = $(this).val();
    var userId = $("select[name=\'userid\']").val();
    $.post("clientsbillableitems.php", {
        action: "getproddesc",
        id: itemid,
        user: userId,
        token: "' . generate_token( 'plain' ) . '"
    },
    function(data){
        $("#desc").val(data);
    });
    $.post("clientsbillableitems.php", { action: "getprodprice", id: itemid, currency: "' . (int)$currency['id'] . '", token: "' . generate_token( 'plain' ) . '" },
    function(data){
        $("#rate").val(data);
    });
});';
					echo '
<form method="post" action="';
					echo $_SERVER['PHP_SELF'];
					echo '?action=save&id=';
					echo $id;
					echo '">
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'fields', 'client' );
					echo '</td><td class="fieldarea">';
					echo $aInt->clientsDropDown( $userid );
					echo '</td></tr>
';

					if (!$id) {
						echo '<tr><td width="20%" class="fieldlabel">';
						echo $aInt->lang( 'fields', 'product' );
						echo '</td><td class="fieldarea"><select name="pid[]" class="form-control select-inline itemselect" id="i\'.$i.\'"><option value="">';
						$aInt->lang( 'global', 'none' );
					}

					echo ;
					echo '</option>';
					echo $options;
					echo '</select></td></tr>';
					echo '<tr><td width="20%" class="fieldlabel">';
					echo $aInt->lang( 'fields', 'description' );
					echo '</td><td class="fieldarea"><input type="text" name="description" value="';
					echo $description;
					echo '" class="form-control input-400" id="desc" /></td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'billableitems', 'hoursqty' );
					echo '</td><td class="fieldarea"><input type="text" name="hours" value="';
					echo $hours;
					echo '" class="form-control input-100 input-inline" /> ';
					echo $aInt->lang( 'billableitems', 'hours' );
					echo '</td></tr>
<tr><td class="fieldlabel">';
					echo $aInt->lang( 'fields', 'amount' );
					echo '</td><td class="fieldarea"><input type="text" name="amount" value="';
				}

				echo $amount;
				echo '" class="form-control input-100" id="rate" /></td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'billableitems', 'invoiceaction' );
			}
		}
	}

	echo '</td><td class="fieldarea">
<input type="radio" name="invoiceaction" value="0" id="invac0"';

	if ($invoiceaction == '0') {
		echo ' checked';
		echo ' /> ';
		echo $aInt->lang( 'billableitems', 'dontinvoicefornow' );
		echo '<br />
<input type="radio" name="invoiceaction" value="1" id="invac1"';

		if ($invoiceaction == '1') {
			echo ' checked';
			echo ' /> ';
			echo $aInt->lang( 'billableitems', 'invoicenextcronrun' );
			echo '<br />
<input type="radio" name="invoiceaction" value="2" id="invac2"';

			if ($invoiceaction == '2') {
				echo ' checked';
				echo ' /> ';
				echo $aInt->lang( 'billableitems', 'addnextinvoice' );
				echo '<br />
<input type="radio" name="invoiceaction" value="3" id="invac3"';

				if ($invoiceaction == '3') {
					echo ' checked';
					echo ' /> ';
					echo $aInt->lang( 'billableitems', 'invoicenormalduedate' );
					echo '<br />
<input type="radio" name="invoiceaction" value="4" id="invac4"';

					if ($invoiceaction == '4') {
						echo ' checked';
						echo ' /> ';
						echo $aInt->lang( 'billableitems', 'recurevery' );
						echo ' <input type="text" name="recur" value="';
						echo $recur;
						echo '" class="form-control input-50 input-inline"> <select name="recurcycle" class="form-control select-inline">
<option value="">';
						echo $aInt->lang( 'billableitems', 'never' );
						echo '</option>
<option value="Days"';

						if ($recurcycle == 'Days') {
							echo ' selected';
							echo '>';
							echo $aInt->lang( 'billableitems', 'days' );
							echo '</option>
<option value="Weeks"';

							if ($recurcycle == 'Weeks') {
								echo ' selected';
								echo '>';
								echo $aInt->lang( 'billableitems', 'weeks' );
								echo '</option>
<option value="Months"';

								if ($recurcycle == 'Months') {
									echo ' selected';
									echo '>';
									echo $aInt->lang( 'billableitems', 'months' );
									echo '</option>
<option value="Years"';

									if ($recurcycle == 'Years') {
										echo ' selected';
										echo '>';
										echo $aInt->lang( 'billableitems', 'years' );
										echo '</option>
</select> ';
									}
								}
							}
						}
					}

					echo $aInt->lang( 'global', 'for' );
					echo ' <input type="text" name="recurfor" class="form-control input-50 input-inline" value="';
					echo $recurfor;
					echo '" /> ';
					$aInt->lang;
					'billableitems';
					'times';
				}
			}

			echo (  );
			echo '<br />
</td></tr>
<tr id="duedaterow"><td class="fieldlabel">';
			echo $aInt->lang( 'billableitems', 'nextduedate' );
			echo '</td><td class="fieldarea"><input type="text" name="duedate" value="';
			echo $duedate;
			echo '" class="form-control date-picker" /></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'billableitems', 'invoicecount' );
			echo '</td><td class="fieldarea"><input type="text" name="invoicecount" value="';
			echo $invoicecount;
			echo '" class="form-control input-100" /></td></tr>
</table>

';

			if ($id) {
				getCurrency( $userid );
				$currency = ;
				getGatewaysArray(  );
				$gatewaysarray = ;
				$aInt->sortableTableInit( 'nopagination' );
				select_query( 'tblinvoiceitems', 'tblinvoices.*', array( 'type' => 'Item', 'relid' => $id ), 'invoiceid', 'ASC', '', 'tblinvoices ON tblinvoices.id=tblinvoiceitems.invoiceid' );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					$data['id'];
					$invoiceid = ;
					$data['date'];
					$date = ;
				}
			}
		}
	}

	$data['duedate'];
	$duedate = ;
	$data['total'];
	$total = ;
	$data['paymentmethod'];
	$paymentmethod = ;
	$data['status'];
	$status = ;
	fromMySQLDate( $date );
	$date = ;
	fromMySQLDate( $duedate );
	$duedate = ;
	formatCurrency( $total );
	$total = ;
	$gatewaysarray[$paymentmethod];
	$paymentmethod = ;
	getInvoiceStatusColour( $status );
	$status = ;
	$invoicelink =  . '<a href="invoices.php?action=edit&id=' . $invoiceid . '">';
	$tabledata[] = array( $invoicelink . $invoiceid . '</a>', $date, $duedate, $total, $paymentmethod, $status, $invoicelink . '<img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '"></a>' );
}

echo '<h2>' . $aInt->lang( 'billableitems', 'relatedinvoices' ) . '</h2>' . $aInt->sortableTable( array( $aInt->lang( 'fields', 'invoicenum' ), $aInt->lang( 'fields', 'invoicedate' ), $aInt->lang( 'fields', 'duedate' ), $aInt->lang( 'fields', 'total' ), $aInt->lang( 'fields', 'paymentmethod' ), $aInt->lang( 'fields', 'status' ), '' ), $tabledata );
echo '
<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary" />
</div>

</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
