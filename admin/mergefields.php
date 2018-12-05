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

if (!defined( 'WHMCS' )) {
	exit( 'This file cannot be accessed directly' );
	echo '
<h2 id="mergefieldstoggle">';
	echo $aInt->lang( 'mergefields', 'title' );
	echo '</h2>

<div id="mergefields" style="border:1px solid #8FBCE9;background:#ffffff;color:#000000;padding:5px;height:300px;overflow:auto;font-size:10px;z-index:10;">

<table width="100%" cellspacing="0" cellpadding="0"><tr><td width="50%" valign="top">

';
	run_hook( 'EmailTplMergeFields', array( 'type' => $type ) );
	$customfields = ;

	if (count( $customfields )) {
		echo '<b>Custom Defined Merge Fields</b><br /><table>';
		foreach ($customfields as ) {
			$fields = ;
			foreach ($fields as ) {
				$v = ;
				$k = ;
				echo '<tr><td width="150"><a href="#" onclick="insertMergeField(\'' . $k . '\');return false">' . $v . '</a></td><td>{$' . $k . '}</td></tr>';
				break 2;
			}

			break;
		}

		echo '</table><br />';

		if ($type == 'support') {
			echo '<b>';
			echo $aInt->lang( 'mergefields', 'support' );
			echo '</b><br />
<table>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'ticket_id\');return false">';
			echo $aInt->lang( 'fields', 'id' );
			echo '</a></td><td>{$ticket_id}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_department\');return false">';
			echo $aInt->lang( 'support', 'department' );
			echo '</a></td><td>{$ticket_department}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_date_opened\');return false">';
			echo $aInt->lang( 'mergefields', 'dateopened' );
			echo '</a></td><td>{$ticket_date_opened}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_subject\');return false">';
			echo $aInt->lang( 'fields', 'subject' );
			echo '</a></td><td>{$ticket_subject}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_message\');return false">';
			echo $aInt->lang( 'mergefields', 'message' );
			echo '</a></td><td>{$ticket_message}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_status\');return false">';
			echo $aInt->lang( 'fields', 'status' );
			echo '</a></td><td>{$ticket_status}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_priority\');return false">';
			echo $aInt->lang( 'support', 'priority' );
			echo '</a></td><td>{$ticket_priority}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_url\');return false">';
			echo $aInt->lang( 'mergefields', 'ticketurl' );
			echo '</a></td><td>{$ticket_url}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_link\');return false">';
			echo $aInt->lang( 'mergefields', 'ticketlink' );
			echo '</a></td><td>{$ticket_link}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_auto_close_time\');return false">';
			echo $aInt->lang( 'mergefields', 'autoclosetime' );
			echo '</a></td><td>{$ticket_auto_close_time}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_kb_auto_suggestions\');return false">';
			echo $aInt->lang( 'mergefields', 'kbautosuggestions' );
			echo '</a></td><td>{$ticket_kb_auto_suggestions}</td></tr>
</table><br />
';
			jmp;

			if ($type == 'affiliate') {
				echo '<b>';
				echo $aInt->lang( 'mergefields', 'affiliate' );
				echo '</b><br />
<table>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'affiliate_total_visits\');return false">';
				echo $aInt->lang( 'mergefields', 'noreferrals' );
				echo '</a></td><td>{$affiliate_total_visits}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'affiliate_balance\');return false">';
				echo $aInt->lang( 'mergefields', 'earnbalance' );
				echo '</a></td><td>{$affiliate_balance}</td></tr>
<tr><td nowrap><a href="#" onclick="insertMergeField(\'affiliate_withdrawn\');return false">';
				echo $aInt->lang( 'mergefields', 'withdrawnamount' );
				echo '</a></td><td>{$affiliate_withdrawn}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'affiliate_referrals_table\');return false">';
				echo $aInt->lang( 'mergefields', 'refdetails' );
				echo '</a></td><td>{$affiliate_referrals_table}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'affiliate_referral_url\');return false">';
				echo $aInt->lang( 'mergefields', 'refurl' );
				echo '</a></td><td>{$affiliate_referral_url}</td></tr>
</table><br />
';
			}
		}
	}
}

jmp;

if ($type == 'domain') {
	echo '<b>';
	echo $aInt->lang( 'mergefields', 'domain' );
	echo '</b><br />
<table>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'domain_order_id\');return false">';
	echo $aInt->lang( 'fields', 'orderid' );
	echo '</a></td><td>{$domain_order_id}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_reg_date\');return false">';
	echo $aInt->lang( 'fields', 'signupdate' );
	echo '</a></td><td>{$domain_reg_date}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_name\');return false">';
	echo $aInt->lang( 'fields', 'domain' );
	echo '</a></td><td>{$domain_name}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_sld\');return false">';
	echo $aInt->lang( 'mergefields', 'sld' );
	echo '</a></td><td>{$domain_sld}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_tld\');return false">';
	echo $aInt->lang( 'mergefields', 'tld' );
	echo '</a></td><td>{$domain_tld}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_reg_period\');return false">';
	echo $aInt->lang( 'fields', 'regperiod' );
	echo '</a></td><td>{$domain_reg_period}</td></tr>
<tr><td nowrap><a href="#" onclick="insertMergeField(\'domain_first_payment_amount\');return false">';
	echo $aInt->lang( 'fields', 'firstpaymentamount' );
	echo '</a></td><td>{$domain_first_payment_amount}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_recurring_amount\');return false">';
	echo $aInt->lang( 'fields', 'recurringamount' );
	echo '</a></td><td>{$domain_recurring_amount}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_next_due_date\');return false">';
	echo $aInt->lang( 'fields', 'nextduedate' );
	echo '</a></td><td>{$domain_next_due_date}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_expiry_date\');return false">';
	echo $aInt->lang( 'fields', 'expirydate' );
	echo '</a></td><td>{$domain_expiry_date}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_registrar\');return false">';
	echo $aInt->lang( 'fields', 'registrar' );
	echo '</a></td><td>{$domain_registrar}</td></tr>
<tr>
    <td colspan="2">
        <strong>';
	echo $aInt->lang( 'mergefields', 'daysUntilInformation' );
	echo '</strong><br />
        ';
	echo $aInt->lang( 'mergefields', 'daysUntilInformation2' );
	echo '    </td>
</tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_days_until_expiry\');return false">';
	echo $aInt->lang( 'mergefields', 'daysexpiry' );
	echo '</a></td><td>{$domain_days_until_expiry}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_days_until_nextdue\');return false">';
	echo $aInt->lang( 'mergefields', 'daysnextdue' );
	echo '</a></td><td>{$domain_days_until_nextdue}</td></tr>
<tr>
    <td colspan="2">
        <strong>';
	echo $aInt->lang( 'mergefields', 'daysAfterInformation' );
	echo '</strong>
    </td>
</tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_days_after_expiry\');return false">';
	echo $aInt->lang( 'mergefields', 'daysAfterExpiry' );
	echo '</a></td><td>{$domain_days_after_expiry}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_days_after_nextdue\');return false">';
	echo $aInt->lang( 'mergefields', 'daysAfterNextDue' );
	echo '</a></td><td>{$domain_days_after_nextdue}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_status\');return false">';
	echo $aInt->lang( 'fields', 'status' );
	echo '</a></td><td>{$domain_status}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_dns_management\');return false">';
	echo $aInt->lang( 'domains', 'dnsmanagement' );
	echo '</a></td><td>{$domain_dns_management}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_email_forwarding\');return false">';
	echo $aInt->lang( 'domains', 'emailforwarding' );
	echo '</a></td><td>{$domain_email_forwarding}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_id_protection\');return false">';
	echo $aInt->lang( 'domains', 'idprotection' );
	echo '</a></td><td>{$domain_id_protection}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_do_not_renew\');return false">';
	echo $aInt->lang( 'mergefields', 'donotrenew' );
	echo '</a></td><td>{$domain_do_not_renew}</td></tr>
</table><br />
';
	jmp;

	if ($type == 'invoice') {
		echo '<b>';
		echo $aInt->lang( 'mergefields', 'invoice' );
		echo '</b><br />
<table>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'invoice_id\');return false">';
		echo $aInt->lang( 'fields', 'invoiceid' );
		echo '</a></td><td>{$invoice_id}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_num\');return false">';
		echo $aInt->lang( 'fields', 'invoicenum' );
		echo '</a></td><td>{$invoice_num}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_date_created\');return false">';
		echo $aInt->lang( 'mergefields', 'datecreated' );
		echo '</a></td><td>{$invoice_date_created}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_date_due\');return false">';
		echo $aInt->lang( 'fields', 'duedate' );
		echo '</a></td><td>{$invoice_date_due}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_date_paid\');return false">';
		echo $aInt->lang( 'fields', 'datepaid' );
		echo '</a></td><td>{$invoice_date_paid}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_items\');return false">';
		echo $aInt->lang( 'mergefields', 'invoiceitems' );
		echo '</a></td><td>{$invoice_items}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_html_contents\');return false">';
		echo $aInt->lang( 'mergefields', 'invoiceitemshtml' );
		echo '</a></td><td>{$invoice_html_contents}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_subtotal\');return false">';
		echo $aInt->lang( 'fields', 'subtotal' );
		echo '</a></td><td>{$invoice_subtotal}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_tax\');return false">';
		echo $aInt->lang( 'fields', 'tax' );
		echo '</a></td><td>{$invoice_tax}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_tax_rate\');return false">';
		echo $aInt->lang( 'fields', 'taxrate' );
		echo '</a></td><td>{$invoice_tax_rate}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_credit\');return false">';
		echo $aInt->lang( 'fields', 'credit' );
		echo '</a></td><td>{$invoice_credit}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_total\');return false">';
		echo $aInt->lang( 'fields', 'total' );
		echo '</a></td><td>{$invoice_total}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_amount_paid\');return false">';
		echo $aInt->lang( 'mergefields', 'amountpaid' );
		echo '</a></td><td>{$invoice_amount_paid}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_balance\');return false">';
		echo $aInt->lang( 'fields', 'balance' );
		echo '</a></td><td>{$invoice_balance}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_last_payment_amount\');return false">';
		echo $aInt->lang( 'mergefields', 'lastpaymentamount' );
		echo '</a></td><td>{$invoice_last_payment_amount}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_last_payment_transid\');return false">';
		echo $aInt->lang( 'mergefields', 'lastpaymenttransid' );
		echo '</a></td><td>{$invoice_last_payment_transid}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_payment_method\');return false">';
		echo $aInt->lang( 'fields', 'paymentmethod' );
		echo '</a></td><td>{$invoice_payment_method}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_payment_link\');return false">';
		echo $aInt->lang( 'mergefields', 'paymentlink' );
		echo '</a></td><td>{$invoice_payment_link}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_subscription_id\');return false">';
		echo $aInt->lang( 'fields', 'subscriptionid' );
		echo '</a></td><td>{$invoice_subscription_id}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_status\');return false">';
		echo $aInt->lang( 'fields', 'status' );
		echo '</a></td><td>{$invoice_status}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_link\');return false">';
		echo $aInt->lang( 'mergefields', 'invoicelink' );
		echo '</a></td><td>{$invoice_link}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_previous_balance\');return false">';
		echo $aInt->lang( 'mergefields', 'prevbalance' );
		echo '</a></td><td>{$invoice_previous_balance}</td></tr>
<tr><td nowrap><a href="#" onclick="insertMergeField(\'invoice_total_balance_due\');return false">';
		echo $aInt->lang( 'mergefields', 'invoicesbalance' );
		echo '</a></td><td>{$invoice_total_balance_due}</td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'invoice_notes\');return false">';
		echo $aInt->lang( 'fields', 'notes' );
		echo '</a></td><td>{$invoice_notes}</td></tr>
</table><br />
';
	}
}

echo ( 'fields', 'id' );
echo '</td><td>{$client_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_first_name\');return false">';
echo $aInt->lang( 'fields', 'firstname' );
echo '</td><td>{$client_first_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_last_name\');return false">';
echo $aInt->lang( 'fields', 'lastname' );
echo '</td><td>{$client_last_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_company_name\');return false">';
echo $aInt->lang( 'fields', 'companyname' );
echo '</td><td>{$client_company_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_email\');return false">';
echo $aInt->lang( 'fields', 'email' );
echo '</td><td>{$client_email}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_address1\');return false">';
echo $aInt->lang( 'fields', 'address1' );
echo '</td><td>{$client_address1}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_address2\');return false">';
echo $aInt->lang( 'fields', 'address2' );
echo '</td><td>{$client_address2}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_city\');return false">';
echo $aInt->lang( 'fields', 'city' );
echo '</td><td>{$client_city}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_state\');return false">';
echo $aInt->lang( 'fields', 'state' );
echo '</td><td>{$client_state}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_postcode\');return false">';
echo $aInt->lang( 'fields', 'postcode' );
echo '</td><td>{$client_postcode}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_country\');return false">';
echo $aInt->lang( 'fields', 'country' );
echo '</td><td>{$client_country}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_phonenumber\');return false">';
echo $aInt->lang( 'fields', 'phonenumber' );
echo '</td><td>{$client_phonenumber}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_customfields\');return false">';
echo $aInt->lang( 'customfields', 'clienttitle' );
echo '</td><td>{$client_customfields}</a></td></tr>
</table><br />
';
jmp;

if (( ( ( $name == 'Automatic Setup Successful' || $name == 'Automatic Setup Failed' ) || $name == 'Service Unsuspension Failed' ) || $name == 'Service Unsuspension Successful' )) {
	echo '<b>';
	echo $aInt->lang( 'mergefields', 'service' );
	echo '</b><br />
<table>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'client_id\');return false">';
	echo $aInt->lang( 'fields', 'clientid' );
	echo '</td><td>{$client_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'service_id\');return false">';
	echo $aInt->lang( 'mergefields', 'serviceid' );
	echo '</td><td>{$service_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'service_product\');return false">';
	echo $aInt->lang( 'fields', 'product' );
	echo '</td><td>{$service_product}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'service_domain\');return false">';
	echo $aInt->lang( 'fields', 'domain' );
	echo '</td><td>{$service_domain}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'error_msg\');return false">';
	echo $aInt->lang( 'mergefields', 'errormsg' );
	echo '</td><td>{$error_msg}</a></td></tr>
</table><br />
<b>';
	echo $aInt->lang( 'mergefields', 'domain' );
	echo '</b><br />
<table>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'client_id\');return false">';
	echo $aInt->lang( 'fields', 'clientid' );
	echo '</td><td>{$client_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_id\');return false">';
	echo $aInt->lang( 'mergefields', 'domainid' );
	echo '</td><td>{$domain_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_type\');return false">';
	echo $aInt->lang( 'domains', 'regtype' );
	echo '</td><td>{$domain_type}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'domain_name\');return false">';
	echo $aInt->lang( 'mergefields', 'domainname' );
	echo '</td><td>{$domain_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'error_msg\');return false">';
	echo $aInt->lang( 'mergefields', 'errormsg' );
	echo '</td><td>{$error_msg}</a></td></tr>
</table><br />
';
	jmp;

	if ($name == 'Support Ticket Change Notification') {
		echo '<b>';
		echo $aInt->lang( 'mergefields', 'support' );
		echo '</b><br />
<table>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'ticket_id\');return false">';
		echo $aInt->lang( 'fields', 'id' );
		echo '</td><td>{$ticket_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_tid\');return false">';
		echo $aInt->lang( 'support', 'ticketid' );
		echo '</td><td>{$ticket_tid}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_id\');return false">';
		echo $aInt->lang( 'fields', 'clientid' );
		echo '</td><td>{$client_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_name\');return false">';
		echo $aInt->lang( 'fields', 'clientname' );
		echo '</td><td>{$client_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_department\');return false">';
		echo $aInt->lang( 'support', 'department' );
		echo '</td><td>{$ticket_department}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_subject\');return false">';
		echo $aInt->lang( 'fields', 'subject' );
		echo '</td><td>{$ticket_subject}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'ticket_priority\');return false">';
		echo $aInt->lang( 'support', 'priority' );
		echo '</td><td>{$ticket_priority}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'changer\');return false">';
		echo $aInt->lang( 'mergefields', 'changer' );
		echo '</td><td>{$changer}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'changes\');return false">';
		echo $aInt->lang( 'mergefields', 'ticketChanges' );
		echo '</td><td>{$changes} (array)</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'newTicket\');return false">';
		echo $aInt->lang( 'mergefields', 'newTicket' );
		echo '</td><td>{$newTicket}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'newReply\');return false">';
		echo $aInt->lang( 'mergefields', 'newReply' );
		echo '</td><td>{$newReply}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'newNote\');return false">';
		echo $aInt->lang( 'mergefields', 'newNote' );
		echo '</td><td>{$newNote}</a></td></tr>
</table><br />
';

		if (( $type != 'support' && $type != 'admin' )) {
			echo '<b>';
			echo $aInt->lang( 'mergefields', 'client' );
			echo '</b><br />
<table>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'client_id\');return false">';
			echo $aInt->lang( 'fields', 'id' );
			echo '</td><td>{$client_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_name\');return false">';
			echo $aInt->lang( 'fields', 'clientname' );
			echo '</td><td>{$client_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_first_name\');return false">';
			echo $aInt->lang( 'fields', 'firstname' );
			echo '</td><td>{$client_first_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_last_name\');return false">';
			echo $aInt->lang( 'fields', 'lastname' );
			echo '</td><td>{$client_last_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_company_name\');return false">';
			echo $aInt->lang( 'fields', 'companyname' );
			echo '</td><td>{$client_company_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_email\');return false">';
			echo $aInt->lang( 'fields', 'email' );
			echo '</td><td>{$client_email}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_address1\');return false">';
			echo $aInt->lang( 'fields', 'address1' );
			echo '</td><td>{$client_address1}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_address2\');return false">';
			echo $aInt->lang( 'fields', 'address2' );
			echo '</td><td>{$client_address2}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_city\');return false">';
			echo $aInt->lang( 'fields', 'city' );
			echo '</td><td>{$client_city}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_state\');return false">';
			echo $aInt->lang( 'fields', 'state' );
			echo '</td><td>{$client_state}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_postcode\');return false">';
			$aInt->lang( 'fields', 'postcode' );
		}

		echo ;
		echo '</td><td>{$client_postcode}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_country\');return false">';
		echo $aInt->lang( 'fields', 'country' );
		echo '</td><td>{$client_country}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_phonenumber\');return false">';
		echo $aInt->lang( 'fields', 'phonenumber' );
		echo '</td><td>{$client_phonenumber}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_password\');return false">';
		echo $aInt->lang( 'fields', 'password' );
		echo '</td><td>{$client_password}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_signup_date\');return false">';
		echo $aInt->lang( 'fields', 'signupdate' );
		echo ' </td><td>{$client_signup_date}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_credit\');return false">';
		echo $aInt->lang( 'clients', 'creditbalance' );
		echo '</td><td>{$client_credit}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_cc_type\');return false">';
		echo $aInt->lang( 'fields', 'cardtype' );
		echo '</td><td>{$client_cc_type}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_cc_number\');return false">';
		echo $aInt->lang( 'fields', 'cardlast4' );
		echo '</td><td>{$client_cc_number}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_cc_expiry\');return false">';
		echo $aInt->lang( 'fields', 'expdate' );
		echo '</td><td>{$client_cc_expiry}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_gateway_id\');return false">';
		echo $aInt->lang( 'fields', 'gatewayid' );
		echo '</td><td>{$client_gateway_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_group_id\');return false">';
	}

	echo $aInt->lang( 'mergefields', 'clientgroupid' );
	echo '</td><td>{$client_group_id}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_group_name\');return false">';
	echo $aInt->lang( 'mergefields', 'clientgroupname' );
	echo ' </td><td>{$client_group_name}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_due_invoices_balance\');return false">';
	echo $aInt->lang( 'mergefields', 'invoicesbalance' );
	echo ' </td><td>{$client_due_invoices_balance}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_custom_fields\');return false">';
	echo $aInt->lang( 'mergefields', 'customfieldsarray' );
	echo '</td><td>{$client_custom_fields.1}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'client_status\');return false">';
	echo $aInt->lang( 'fields', 'status' );
	echo '</td><td>{$client_status}</a></td></tr>
</table><br />
';
	echo '<b>';
	echo $aInt->lang( 'mergefields', 'other' );
	echo '</b><br />
<table>

<tr><td width="150"><a href="#" onclick="insertMergeField(\'company_name\');return false">';
	echo $aInt->lang( 'fields', 'companyname' );
	echo '</td><td>{$company_name}</a></td></tr>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'company_domain\');return false">';
	echo $aInt->lang( 'fields', 'domain' );
	echo '</td><td>{$company_domain}</a></td></tr>
<tr><td width="150"><a href="#" onclick="insertMergeField(\'company_logo_url\');return false">';
	$aInt->lang;
	'general';
	'logourl';
}

echo (  );
echo '</td><td>{$company_logo_url}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'whmcs_url\');return false">';
echo $aInt->lang( 'mergefields', 'whmcsurl' );
echo '</td><td>{$whmcs_url}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'whmcs_link\');return false">';
echo $aInt->lang( 'mergefields', 'whmcslink' );
echo '</td><td>{$whmcs_link}</a></td></tr>
';

if ($type == 'admin') {
	echo '<tr><td><a href="#" onclick="insertMergeField(\'whmcs_admin_url\');return false">';
	echo $aInt->lang( 'mergefields', 'whmcsadminurl' );
	echo '</td><td>{$whmcs_admin_url}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'whmcs_admin_link\');return false">';
	echo $aInt->lang( 'mergefields', 'whmcsadminlink' );
	echo '</td><td>{$whmcs_admin_link}</a></td></tr>
';
	echo '<tr><td><a href="#" onclick="insertMergeField(\'unsubscribe_url\');return false">';
	echo $aInt->lang( 'mergefields', 'unsubscribeurl' );
	echo '</td><td>{$unsubscribe_url}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'signature\');return false">';
	echo $aInt->lang( 'mergefields', 'signature' );
	echo '</td><td>{$signature}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'date\');return false">';
	echo $aInt->lang( 'mergefields', 'date' );
	echo '</td><td>{$date}</a></td></tr>
<tr><td><a href="#" onclick="insertMergeField(\'time\');return false">';
	echo $aInt->lang( 'mergefields', 'time' );
	echo '</td><td>{$time}</a></td></tr>
</table><br />

</td><td width="50%" valign="top">

<b>';
	echo $aInt->lang( 'mergefields', 'condisplay' );
	echo '</b><br />
';
	echo $aInt->lang( 'mergefields', 'condisplay1' );
	echo ':<br /><br />
{if $ticket_department eq "';
}

echo $aInt->lang( 'supportreq', 'sales' );
echo '"}<br />
';
echo $aInt->lang( 'mergefields', 'condisplay2' );
echo '<br />
{else}<br />
';
echo $aInt->lang( 'mergefields', 'condisplay3' );
echo '<br />
{/if}<br /><br />

<b>';
echo $aInt->lang( 'mergefields', 'looping' );
echo '</b><br />
';
echo $aInt->lang( 'mergefields', 'looping1' );
echo ':<br /><br />
{foreach from=$array_data item=data}<br />
{$data.option}: {$data.value}<br />
{/foreach}

</td></tr></table>

</div>

<br />
';
?>
