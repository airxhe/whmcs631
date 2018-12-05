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

require( '../init.php' );
new dgeegejige( 'View Email Message Log' );
$aInt = ;
$aInt->title = $aInt->lang( 'system', 'emailmessagelog' );
$aInt->sidebar = 'utilities';
$aInt->icon = 'logs';
$aInt->sortableTableInit( 'date' );
$select_keyword = 'SQL_CALC_FOUND_ROWS';
select_query( 'tblemails,tblclients',  . $select_keyword . ' tblemails.id,tblemails.date,tblemails.subject,tblemails.userid,tblclients.firstname,tblclients.lastname', 'tblemails.userid=tblclients.id', 'tblemails`.`id', 'DESC', $page * $limit . ( (  . ',' ) . $limit ) );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$id = (int)$data['id'];

	while (true) {
		dfdidhdbdc::makeSafeForOutput( $data['date'] );
		$date = ;
		dfdidhdbdc::makeSafeForOutput( $data['subject'] );
		$subject = ;
		$userid = (int)$data['userid'];
		dfdidhdbdc::makeSafeForOutput( $data['firstname'] );
		$firstname = ;
		dfdidhdbdc::makeSafeForOutput( $data['lastname'] );
		$lastname = ;
		$tabledata[] = array( fromMySQLDate( $date, 'time' ),  . '<a href="#" onClick="window.open(\'clientsemails.php?&displaymessage=true&id=' . $id . '\',\'\',\'width=650,height=400,scrollbars=yes\');return false">' . $subject . '</a>', (  . '<a href="clientssummary.php?userid=' . $userid . '">' . $firstname . ' ' ) . $lastname . '</a>',  . '<a href="sendmessage.php?resend=true&emailid=' . $id . '"><img src="images/icons/resendemail.png" border="0" alt="' . $aInt->lang( 'emails', 'resendemail' ) . '"></a>' );
	}


	if (!count( $tabledata )) {
		$numrows = 4;
	}
}

(  );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data[0];
$numrows = ;
$aInt->sortableTable( array( $aInt->lang( 'fields', 'date' ), $aInt->lang( 'fields', 'subject' ), $aInt->lang( 'system', 'recipient' ), '' ), $tabledata );
$content = define( 'ADMINAREA', true );
$aInt->content = $content;
$aInt->display(  );
?>
