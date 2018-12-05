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
new dgeegejige( 'Add New Order', false );
$aInt = ;
$aInt->title = $aInt->lang( 'orders', 'addnew' );
$aInt->sidebar = 'orders';
$aInt->icon = 'orders';
$aInt->requiredFiles( array( 'orderfunctions', 'domainfunctions', 'whoisfunctions', 'configoptionsfunctions', 'customfieldfunctions', 'clientfunctions', 'invoicefunctions', 'processinvoices', 'gatewayfunctions', 'modulefunctions', 'cartfunctions' ) );
$whmcs->get_req_var( 'action' );
$action = ;
$whmcs->get_req_var( 'userid' );
$userid = ;
getCurrency( $userid );
$currency = ;

if ($action == 'getcontacts') {
	$contacts = array(  );
	select_query( 'tblcontacts', 'id,firstname,lastname,companyname,email', array( 'userid' => (int)$whmcs->get_req_var( 'userid' ) ), 'firstname', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$contacts[$data['id']] = $data['firstname'] . ' ' . $data['lastname'];
	}
}
else {
	echo '<tr class="subtotal"><td>' . ( 'subtotal' ) . '</td><td class="alnright">' . $ordervals['subtotal'] . '</td></tr>';

	if ($ordervals['promotype']) {
		'<tr class="promo"><td>' . $aInt->lang( 'orders', 'promoDiscount' );
	}
}

echo  . '</td><td class="alnright">' . $ordervals['discount'] . '</td></tr>';

if ($ordervals['taxrate']) {
	echo '<tr class="tax"><td>' . $ordervals['taxname'] . ' @ ' . $ordervals['taxrate'] . '%</td><td class="alnright">' . $ordervals['taxtotal'] . '</td></tr>';

	if ($ordervals['taxrate2']) {
		echo '<tr class="tax"><td>' . $ordervals['taxname2'] . ' @ ' . $ordervals['taxrate2'] . '%</td><td class="alnright">' . $ordervals['taxtotal2'] . '</td></tr>';
		'<tr class="total"><td width="140">' . $aInt->lang( 'fields', 'total' ) . '</td><td class="alnright">' . $ordervals['total'] . '</td></tr>';
	}

	echo ;

	if (( ( ( ( ( $ordervals['totalrecurringmonthly'] || $ordervals['totalrecurringquarterly'] ) || $ordervals['totalrecurringsemiannually'] ) || $ordervals['totalrecurringannually'] ) || $ordervals['totalrecurringbiennially'] ) || $ordervals['totalrecurringtriennially'] )) {
		echo '<tr class="recurring"><td>Recurring</td><td class="alnright">';

		if ($ordervals['totalrecurringmonthly']) {
			echo '' . $ordervals['totalrecurringmonthly'] . ' Monthly<br />';

			if ($ordervals['totalrecurringquarterly']) {
				echo '' . $ordervals['totalrecurringquarterly'] . ' Quarterly<br />';

				if ($ordervals['totalrecurringsemiannually']) {
					echo '' . $ordervals['totalrecurringsemiannually'] . ' Semi-Annually<br />';

					if ($ordervals['totalrecurringannually']) {
						echo '' . $ordervals['totalrecurringannually'] . ' Annually<br />';

						if ($ordervals['totalrecurringbiennially']) {
							echo '' . $ordervals['totalrecurringbiennially'] . ' Biennially<br />';

							if ($ordervals['totalrecurringtriennially']) {
								echo '' . $ordervals['totalrecurringtriennially'] . ' Triennially<br />';
								echo '</td></tr>';
								echo '</table>
</div>';
								exit(  );
								$cartitems = count( $_SESSION['cart']['products'] ) + count( $_SESSION['cart']['addons'] ) + count( $_SESSION['cart']['domains'] ) + count( $_SESSION['cart']['renewals'] );

								if (!$cartitems) {
									redir( 'noselections=1' );
									calcCartTotals( true );
									unset( $_SESSION[uid] );

									if ($orderstatus == 'Active') {
										update_query( 'tblorders', array( 'status' => 'Active' ), array( 'id' => $_SESSION['orderdetails']['OrderID'] ) );

										if (is_array( $_SESSION['orderdetails']['Products'] )) {
											foreach ($_SESSION['orderdetails']['Products'] as ) {
												$productid = ;
												update_query( 'tblhosting', array( 'domainstatus' => 'Active' ), array( 'id' => $productid ) );
												break;
											}


											if (is_array( $_SESSION['orderdetails']['Domains'] )) {
												foreach ($_SESSION['orderdetails']['Domains'] as ) {
													$domainid = ;
													update_query( 'tbldomains', array( 'status' => 'Active' ), array( 'id' => $domainid ) );
													break;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}

		getUsersLang( 0 );
		redir( 'action=view&id=' . $_SESSION['orderdetails']['OrderID'], 'orders.php' );
		eaaadiagec::release(  );
		$regperiodss = '';
		$regperiods = ;
		$regperiod = 25;

		if ($regperiod <= 10) {
			'<option value="' . $regperiod . '">' . $regperiod . ' ';
		}
	}

	$regperiods .=  . $aInt->lang( 'domains', 'year' . $regperiodss ) . '</option>';
	$regperiodss = 's';
	++$regperiod;
}

jmp;
echo (  );
$jscode .= 'function savePromo() {
    jQuery.post("ordersadd.php", "action=createpromo&"+jQuery("#createpromofrm").serialize(),
    function(data){
        if (data.substr(0,1)=="<") {
            $("#promodd").append(data);
            $("#promodd").val($("#promocode").val());
            $("#modalCreatePromo").modal("hide");
        } else {
            alert(data);
        }
    });
}';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
