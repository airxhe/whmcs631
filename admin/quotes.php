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
new dgeegejige( 'Manage Quotes' );
$aInt = ;
$aInt->title = $aInt->lang( 'quotes', 'title' );
$aInt->sidebar = 'billing';
$aInt->icon = 'quotes';
$aInt->requiredFiles( array( 'clientfunctions', 'customfieldfunctions', 'invoicefunctions', 'quotefunctions', 'configoptionsfunctions', 'orderfunctions' ) );

if ($action == 'getdesc') {
	check_token( 'WHMCS.admin.default' );
	select_query( 'tblproducts', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['name'];
	$name = ;
	$data['description'];
	$description = ;
	echo $name . '
' . $description;
	exit(  );

	if ($action == 'getprice') {
		check_token( 'WHMCS.admin.default' );
		select_query( 'tblpricing', '', array( 'type' => 'product', 'currency' => $currency, 'relid' => $id ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;

		if (0 < $data['monthly']) {
			echo $data['monthly'];
		}
	}
}
else {
	( $result );

	if ($data = ) {
		echo '<option value="' . $data['id'] . '"';

		if (( ( $currencyid && $data['id'] == $currencyid ) || ( !$currencyid && $data['default'] ) )) {
			echo ' selected';
			echo '>' . $data['code'] . '</option>';
		}
	}
}

echo ( 'quotes', 'taxed' );
echo '</th>
    <th width="20"></th>
</tr>
';

if ($id) {
	select_query( 'tblquoteitems', '', array( 'quoteid' => $id ), 'id', 'ASC' );
	$result = ;
	$i = 16;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$line_id = ;
		$data['description'];
		$line_desc = ;
		$data['quantity'];
		$line_qty = ;
		$data['unitprice'];
		$line_unitprice = ;
		$data['discount'];
		$line_discount = ;
		$data['taxable'];
		$line_taxable = ;
		formatCurrency( $line_qty * $line_unitprice * ( 1 - $line_discount / 100 ) );
		$line_total = ;
		echo  . '<tr bgcolor=#ffffff style="text-align:center;"><td><input type="text" name="qty[' . $line_id . ']" value="' . $line_qty . '" class="form-control"></td><td><textarea name="desc[' . $line_id . ']" class="expanding form-control">' . $line_desc . '</textarea></td><td><input type="text" name="up[' . $line_id . ']" value="' . $line_unitprice . '" class="form-control"></td><td><input type="text" name="discount[' . $line_id . ']" value="' . $line_discount . '" class="form-control"></td><td>' . $line_total . '</td><td><input type="checkbox" name="taxable[' . $line_id . ']" value="1"';

		if ($line_taxable) {
			echo ' checked';
			echo  . '></td><td width=20 align=center><a href="#" onClick="doDeleteLine(\'' . $line_id . '\');return false"><img src="images/delete.gif" border="0"></tr>';
			++$i;
		}
	}
	else {
		if (0 < $taxlevel2['rate']) {
			echo '<tr bgcolor="#efefef" style="text-align:center;font-weight:bold"><td colspan="4" align="right">';
			echo $taxlevel2['name'];
			echo ' @ ';
			echo $taxlevel2['rate'];
			echo '%:&nbsp;</td><td width=90>';
			echo formatCurrency( $tax2 );
			echo '</td><td></td><td></td></tr>';
			echo '<tr bgcolor="#efefef" style="text-align:center;font-weight:bold"><td colspan="4" align="right">';
			echo $aInt->lang( 'quotes', 'totaldue' );
			echo '&nbsp;</td><td width=90>';
			echo formatCurrency( $total );
			echo '</td><td></td><td></td></tr>
</table>
</div>

<h2>';
			echo $aInt->lang( 'quotes', 'notes' );
			echo '</h2>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'quotes', 'proposaltext' );
			echo '<br />';
			echo $aInt->lang( 'quotes', 'proposaltextmsg' );
			echo '</td><td class="fieldarea"><textarea name="proposal" rows="5" class="form-control">';
			echo $proposal;
			echo '</textarea></td></tr>
<tr><td width="15%" class="fieldlabel">';
			echo $aInt->lang( 'quotes', 'customernotes' );
			echo '<br />';
			echo $aInt->lang( 'quotes', 'customernotesmsg' );
			echo '</td><td class="fieldarea"><textarea name="customernotes" rows="5" class="form-control">';
			echo $customernotes;
			echo '</textarea></td></tr>
<tr><td class="fieldlabel">';
			$aInt->lang;
			'quotes';
		}
	}

	echo ( 'adminonlynotes' );
	echo '<br />';
	echo $aInt->lang( 'quotes', 'adminonlynotesmsg' );
	echo '</td><td class="fieldarea"><textarea name="adminnotes" rows="5" class="form-control">';
	echo $adminnotes;
	echo '</textarea></td></tr>
</table>

<div class="btn-container"><input type="submit" value="Save Changes" class="btn btn-primary" /> <input type="button" value="Duplicate" class="button btn btn-default" onclick="window.location=\'quotes.php?action=duplicate&id=';
	echo $id . generate_token( 'link' );
	echo '\'"';

	if (!$id) {
		echo ' disabled="true"';
		echo ' /> <input type="button" value="Printable Version" class="button btn btn-default" onclick="window.open(\'../viewquote.php?id=';
		echo $id;
		echo '\',\'windowfrm\',\'menubar=yes,toolbar=yes,scrollbars=yes,resizable=yes,width=750,height=600\')" "';

		if (!$id) {
			echo ' disabled="true"';
			echo ' /> <input type="button" value="View PDF" class="button btn btn-default" onclick="window.open(\'../dl.php?type=q&id=';
			echo $id;
			echo '&viewpdf=1\',\'pdfquote\',\'\')" /> <input type="button" value="Download PDF" class="button btn btn-default" onclick="window.location=\'';
			echo $_SERVER['PHP_SELF'];
			echo '?action=dlpdf&id=';
			echo $id;
			echo '\';"';

			if (!$id) {
				echo ' disabled="true"';
				echo ' /> <input type="button" value="Email as PDF" class="button btn btn-default" onclick="window.location=\'quotes.php?action=sendpdf&id=';
				echo $id . generate_token( 'link' );
			}
		}
	}
}

echo '\';"';

if (!$id) {
}

echo ' disabled="true"';
echo ' /> <input type="button" value="Convert to Invoice" class="btn btn-default" onClick="showDialog(\'quoteconvert\')"';

if (!$id) {
	echo ' disabled="true"';
	echo ' /> <input type="button" value="Delete" class="btn btn-danger" onclick="doDelete(\'';
	echo $id;
	echo '\');"';
}


if (!$id) {
	echo ' disabled="true"';
	echo ' /></div>

</form>

';
	'<form id="convertquotefrm">
' . generate_token( 'form' ) . '
<label class="radio-inline"><input type="radio" name="invoicetype" value="single" onclick="selectSingle()" checked /> Generate a single invoice for the entire amount</label><br />
<div id="singleoptions" align="center">
<br />
Due Date of Invoice: <input type="text" name="invoiceduedate" value="' . getTodaysDate(  ) . '" class="datepick" />
<br /><br />
</div>
<label class="radio-inline"><input type="radio" name="invoicetype" value="deposit" onclick="selectDeposit()" /> Split into 2 invoices - a deposit and final payment</label><br />
<div id="depositoptions" align="center" style="display:none;">
<br />
Enter Deposit Percentage: <input type="text" name="depositpercent" value="50" size="5" />%<br />
Due Date of Deposit: <input type="text" name="depositduedate" value="' . getTodaysDate(  ) . '" class="datepick" /><br />
Due Date of Final Payment: <input type="text" name="finalduedate" value="';
	fromMySQLDate( date( 'Y-m-d', mktime( 0, 0, 0, date( 'm' ) + 1, date( 'd' ), date( 'Y' ) ) ) );
}

$content =  .  . '" class="datepick" />
</div>
<br />
<label class="checkbox-inline"><input type="checkbox" name="sendemail" checked /> Send Invoice Notification Email</label>
</form>';
echo $aInt->modal( 'QuoteConvert', 'Convert to Invoice', $content, array( array( 'title' => AdminLang::trans( 'global.submit' ), 'onclick' => 'window.location="?action=convert&id=' . $id . '&" + jQuery("#convertquotefrm").serialize();', 'class' => 'btn-primary' ), array( 'title' => AdminLang::trans( 'global.cancel' ) ) ) );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
