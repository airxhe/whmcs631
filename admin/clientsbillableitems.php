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


while (true) {
	else {
		( 'tblbillableitems', 'COUNT(*)', array( 'userid' => $userid, 'invoicecount' => '0' ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$numrows = ;
		$tabledata = '';
		select_query( 'tblbillableitems', '', array( 'userid' => $userid, 'invoicecount' => '0' ), $orderby, $order, $page * $limit . ( (  . ',' ) . $limit ) );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['label'];
			$label = ;
			$data['description'];
			$description = ;
			$data['hours'];
			$hours = ;
			$data['amount'];
			$amount = ;
			$data['invoiceaction'];
			$invoiceaction = ;
			$data['invoicecount'];
			$invoicecount = ;
			formatCurrency( $amount );
			$amount = ;

			if ($invoiceaction == '0') {
				$aInt->lang( 'billableitems', 'dontinvoice' );
				$invoiceaction = ;
			}

			$tabledata[] = array(  . '</a>', $managelink . $description . '</a>', $hours, $amount, $invoiceaction, $managelink . '<img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '"></a>',  . '<a href="#" onClick="doDelete(\'' . $id . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
		}

		jmp;
		$tableformurl = ['PHP_SELF'] . '?userid=' . $userid;
		$tableformbuttons = '<input type="submit" name="invoice" value="' . $aInt->lang( 'billableitems', 'invoiceselected' ) . '" class="btn btn-default" onclick="return confirm(\'' . $aInt->lang( 'billableitems', 'invoiceselectedconfirm', '1' ) . '\')" /> <input type="submit" name="delete" value="' . $aInt->lang( 'global', 'delete' ) . '" class="btn btn-danger" onclick="return confirm(\'' . $aInt->lang( 'global', 'deleteconfirm', '1' ) . '\')" />';
		echo $aInt->sortableTable( array( 'checkall', array( 'id', $aInt->lang( 'fields', 'id' ) ), array( 'description', $aInt->lang( 'fields', 'description' ) ), array( 'hours', $aInt->lang( 'fields', 'hours' ) ), array( 'amount', $aInt->lang( 'fields', 'amount' ) ), array( 'invoiceaction', $aInt->lang( 'billableitems', 'invoiceaction' ) ), '', '' ), $tabledata, $tableformurl, $tableformbuttons );
		echo '<h2>' . $aInt->lang( 'billableitems', 'invoiced' ) . '</h2>';
		$aInt->sortableTableInit( 'id', 'DESC' );
		select_query( 'tblbillableitems', 'COUNT(*)', array( 'userid' => $userid, 'invoicecount' => array( 'sqltype' => '>', 'value' => '0' ) ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$numrows = ;
		$tabledata = '';
		select_query( 'tblbillableitems', '', array( 'userid' => $userid, 'invoicecount' => array( 'sqltype' => '>', 'value' => '0' ) ), $orderby, $order, $page * $limit . ( (  . ',' ) . $limit ) );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['label'];
			$label = ;
			$data['description'];
			$description = ;
			$data['hours'];
			$hours = ;
			$data['amount'];
			$amount = ;
			$data['invoiceaction'];
			$invoiceaction = ;
			$data['invoicecount'];
			$invoicecount = ;
			formatCurrency( $amount );
			$amount = ;

			if ($invoiceaction == '0') {
				$aInt->lang( 'billableitems', 'dontinvoice' );
				$invoiceaction = ;
				break;
			}
		}
	}

	( 'relid', '=', $id )->orderBy( 'tblinvoiceitems.invoiceid', 'ASC' )->get( array( 'tblinvoiceitems.invoiceid AS linkedid', 'tblinvoices.id AS existingid' ) );
	$invoiceData = ;
	foreach ($invoiceData as ) {
		$data = ;

		if ($data->existingid) {
			$invoicesnumbers[] = (true ? '<a href="invoices.php?action=edit&id=' . $data->linkedid . '">' . $data->linkedid . '</a>' : '<span class="textgrey">' . $data->linkedid . '</span>');
			break;
		}

		break;
	}

	implode( ', ', $invoicesnumbers );
	$invoicesnumbers = ;
	$tabledata[] = array( $managelink . $id . '</a>', $managelink . $description . '</a>', $hours, $amount, $invoicesnumbers, $managelink . '<img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '"></a>',  . '<a href="#" onClick="doDelete(\'' . $id . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
}

$tableformbuttons = '';
echo $aInt->sortableTable( array( array( 'id', $aInt->lang( 'fields', 'id' ) ), array( 'description', $aInt->lang( 'fields', 'description' ) ), array( 'hours', $aInt->lang( 'fields', 'hours' ) ), array( 'amount', $aInt->lang( 'fields', 'amount' ) ), $aInt->lang( 'billableitems', 'invoicenumbers' ), '', '' ), $tabledata, $tableformurl, $tableformbuttons );
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
		}
	}
}

echo (  );
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
			echo '" size="5"> <select name="recurcycle" class="form-control select-inline">
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
				}
			}
		}
	}
}

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
		echo $aInt->lang( 'global', 'for' );
		echo ' <input type="text" name="recurfor" value="';
		echo $recurfor;
		echo '" size="5"> Times<br />
</td></tr>
<tr id="duedaterow"><td class="fieldlabel">';
		$aInt->lang( 'billableitems', 'nextduedate' );
	}
}

echo ;
echo '</td><td class="fieldarea"><input type="text" name="duedate" value="';
echo $duedate;
echo '" class="datepick" /></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'billableitems', 'invoicecount' );
echo '</td><td class="fieldarea"><input type="text" name="invoicecount" value="';
echo $invoicecount;
echo '" size="10" /></td></tr>
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
		$data['duedate'];
		$duedate = ;
		$data['total'];
		$total = ;
		$data['paymentmethod'];
		$paymentmethod = ;
		$data['status'];
		$status = ;
	}

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

jmp;
$jquerycode =  .  . '"
    },
    function(data){
        $("#desc_"+rowid).val(data);
    });
    $.post("clientsbillableitems.php", { action: "getprodprice", id: itemid, currency: "' . (int)$currency['id'] . '", token: "' . generate_token( 'plain' ) . '" },
    function(data){
        $("#rate_"+rowid).val(data);
    });
});';
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
		break;
	}

	break;
}

echo '<h2>' . $aInt->lang( 'billableitems', 'addtimebilling' ) . '</h2>
<form method="post" action="' . $_SERVER['PHP_SELF'] . '?action=addtime&userid=' . $userid . '">';
$aInt->sortableTableInit( 'nopagination' );
$tabledata = array(  );
$i = 13;

if ($i <= 10) {
	$tabledata[] = array( '<select name="pid[]" class="itemselect" id="i' . $i . '" style="width:280px;"><option value="">' . $aInt->lang( 'global', 'none' ) . '</option>' . $options . '</select>', '<input type="text" name="description[]" size="75" id="desc_i' . $i . '" />', '<input type="text" name="hours[]" size="10" value="0" />', '<input type="text" name="rate[]" size="10" value="0.00" id="rate_i' . $i . '" />' );
	++$i;
}

jmp;
echo ( array( , $aInt->lang( 'fields', 'rate' ) ), $tabledata );
echo '<p align="center"><input type="submit" value="' . $aInt->lang( 'billableitems', 'addentries' ) . '" /></p>
</form>';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
