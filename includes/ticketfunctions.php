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

/**
 * This function will make a UTF-8 string compatible with MySQL standard UTF-8 encoding
 * by stripping out emojis and certain other 4 byte characters.
 *
 * This will not be required with MySQL 5.5.3+ using utf8mb4 charset.
 *
 * @param string $message UTF-8 string to clean up
 */
function processUtf8Mb4($message) {
	global $whmcs;

	$whmcs->get_config( 'CutUtf8Mb4' );
	$cutUtf8Mb4 = ;

	if (!$cutUtf8Mb4) {
		return $message;
		$emojis = array( '/[\x{1F600}\x{1F601}]/u' => ':)', '/[\x{1F603}-\x{1F606}]/u' => ':D', '/[\x{1F609}\x{1F60A}]/u' => ';)', '/\x{1F610}/u' => ':|', '/[\x{1F612}\x{1F61E}\x{1F61F}]/u' => ':(', '/\x{1F61B}/u' => ':P', '/\x{1F622}/u' => ':\'(' );
		$cleanText = $message;
		preg_replace;
		array_keys;
	}

	( ( $emojis ), array_values( $emojis ), $cleanText );
	$cleanText = ;
	$removePatterns = array( '/[\x{1F600}-\x{1F64F}]/u', '/[\x{1F300}-\x{1F5FF}]/u', '/[\x{1F680}-\x{1F6FF}]/u', '/[\x{2600}-\x{26FF}]/u', '/[\x{2700}-\x{27BF}]/u' );
	preg_replace( $removePatterns, '', $cleanText );
	$cleanText = ;
	return $cleanText;
}

function getTimeBetweenDates($lastreply, $from = 'now') {
	strtotime( $from );
	$datetime = ;
	strtotime( $lastreply );
	$date2 = ;
	$holdtotsec = $datetime - $date2;
	$holdtotmin = ( $datetime - $date2 ) / 60;
	$holdtothr = ( $datetime - $date2 ) / 3600;
	intval( ( $datetime - $date2 ) / 86400 );
	$holdtotday = ;
	intval( $holdtothr - $holdtotday * 24 );
	$holdhr = ;
	intval( $holdtotmin - ( $holdhr * 60 + $holdtotday * 1440 ) );
	$holdmr = ;
	intval( $holdtotsec - ( $holdhr * 3600 + $holdmr * 60 + 86400 * $holdtotday ) );
	$holdsr = ;
	return array( 'days' => $holdtotday, 'hours' => $holdhr, 'minutes' => $holdmr, 'seconds' => $holdsr );
}

function getShortLastReplyTime($lastreply) {
	getTimeBetweenDates( $lastreply );
	$timeparts = ;
	$str = '';

	if (0 < $timeparts['days']) {
	}

	$str .= $timeparts['days'] . 'd ';
	$str .= $timeparts['hours'] . 'h ';
	$str .= $timeparts['minutes'] . 'm';
	return $str;
}

function getLastReplyTime($lastreply) {
	getTimeBetweenDates( $lastreply );
	$timeparts = ;
	$str = '';

	if (0 < $timeparts['days']) {
		$str .= $timeparts['days'] . ' Days ';
		$timeparts['hours'] . ' Hours ';
	}

	$str .= ;
	$str .= $timeparts['minutes'] . ' Minutes ';
	$str .= $timeparts['seconds'] . ' Seconds ';
	$str .= 'Ago';
	return $str;
}

function getTicketDuration($start, $end) {
	getTimeBetweenDates( $start, $end );
	$timeparts = ;
	$str = '';

	if (0 < $timeparts['days']) {
		$str .= $timeparts['days'] . ' ' . Lang::trans( 'days' ) . ' ';

		if (0 < $timeparts['hours']) {
			$str .= $timeparts['hours'] . ' ' . Lang::trans( 'hours' ) . ' ';
			0 < $timeparts['minutes'];
		}


		if () {
		}

		$timeparts['minutes'];
	}

	$str .=  . ' ' . Lang::trans( 'minutes' ) . ' ';
	$str .= $timeparts['seconds'] . ' ' . Lang::trans( 'seconds' ) . ' ';
	return $str;
}

function getStatusColour($tstatus, $htmlOutput = true) {
	global $_LANG;
	static $ticketcolors = array(  );

	if (!array_key_exists( $tstatus, $ticketcolors )) {
		get_query_val( 'tblticketstatuses', 'color', array( 'title' => $tstatus ) );
		$ticketcolors[$tstatus] = $color = ;
		jmp;
		$ticketcolors[$tstatus];
		$color = ;

		if ($htmlOutput) {
		}

		preg_replace( '/[^a-z]/i', '', strtolower( $tstatus ) );
		$langstatus = ;

		if ($_LANG['supportticketsstatus' . $langstatus]) {
			$_LANG['supportticketsstatus' . $langstatus];
			$tstatus = ;
			$statuslabel = '';
		}


		if ($color) {
		}

		'<span style="color:' . $color;
	}

	$statuslabel .=  . '">';
	$statuslabel .= $ticketcolors;

	if ($color) {
		$statuslabel .= '</span>';
		return $statuslabel;
	}

	return $color;
}

function ticketAutoHyperlinks($message) {
	return autoHyperLink( $message );
}

/**
 * Add an admin note to the ticket.
 *
 * @param int $tid
 * @param string $message
 * @param bool $markdown
 */
function AddNote($tid, $message, $markdown = false) {
	if (!function_exists( 'getAdminName' )) {
		require( ROOTDIR . '/includes/adminfunctions.php' );
		uploadTicketAttachments( true );
		$attachments = ;
		processUtf8Mb4( $message );
		$message = ;
		'tblticketnotes';
		array( 'ticketid' => $tid, 'date' => 'now()', 'admin' => getAdminName(  ), 'message' => $message, 'attachments' => '' );

		if ($markdown) {
			( array( 'editor' => (true ? 'markdown' : 'plain') ) );
			addTicketLog;
		}

		insert_query( $tid, 'Ticket Note Added' );
		run_hook;
		'TicketAddNote';
		array( 'ticketid' => $tid );
	}

	( array( 'message' => $message, 'adminid' => $_SESSION['adminid'], 'attachments' => $attachments ) );
}

function AdminRead($tid) {
	$result = ;
	$data = select_query( 'tbltickets', 'adminunread', array( 'id' => $tid ) );
	$data['adminunread'];
	$adminread = mysql_fetch_assoc( $result );

	if ($adminread) {
		$adminreadarray = (true ? explode( ',', $adminread ) : array(  ));

		if (!in_array( $_SESSION['adminid'], $adminreadarray )) {
			$adminreadarray[] = $_SESSION['adminid'];
			update_query;
		}

		'tbltickets';
		array( 'adminunread' => implode( ',', $adminreadarray ) );
	}

	( , array( 'id' => $tid ) );
}

function ClientRead($tid) {
	update_query( 'tbltickets', array( 'clientunread' => '' ), array( 'id' => $tid ) );
}

function addTicketLog($tid, $action) {
	if (isset( $_SESSION['adminid'] )) {
		function_exists;
		'getAdminName';
	}


	if (!(  )) {
	}

	require( ROOTDIR . '/includes/adminfunctions.php' );
	$action .= ' (by ' . getAdminName(  ) . ')';
	insert_query( 'tblticketlog', array( 'date' => 'now()', 'tid' => $tid, 'action' => $action ) );
}

function AddtoLog($tid, $action) {
	addTicketLog( $tid, $action );
}

function getDepartmentName($deptid) {
	select_query( 'tblticketdepartments', 'name', array( 'id' => $deptid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['name'];
	$department = ;
	return $department;
}

function ticketGenerateAttachmentsListFromString($attachmentsString) {
	trim( $attachmentsString );
	$attachmentsString = ;

	if ($attachmentsString) {
		$attachmentsOutput .= '<br /><br /><strong>Attachments</strong><br />';
		explode( '|', $attachmentsString );
		$attachments = ;
		foreach ($attachments as ) {
		}
	}


	while (true) {
		$attachment = $attachmentsOutput = '';
		$i = ;
		$attachmentsOutput .= $i + 1 . '. ' . substr( $attachment, 7 ) . '<br />';
	}

	return $attachmentsOutput;
}

function openNewTicket($userid, $contactid, $deptid, $tickettitle, $message, $urgency, $attachmentsString = '', $from = '', $relatedservice = '', $ccemail = '', $noemail = '', $admin = '', $markdown = false) {
	global $CONFIG;

	select_query( 'tblticketdepartments', '', array( 'id' => $deptid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$deptid = ;
	$data['noautoresponder'];
	$noautoresponder = ;

	if (!$deptid) {
		exit( 'Department Not Found. Exiting.' );
		trim( $ccemail );
		$ccemail = ;
		processUtf8Mb4( $tickettitle );
		$tickettitle = ;
		processUtf8Mb4( $message );
		$message = ;

		if ($userid) {
			$email = '';
			$name = ;

			if (0 < $contactid) {
				get_query_vals( 'tblcontacts', 'firstname,lastname,email', array( 'id' => $contactid, 'userid' => $userid ) );
				$data = ;

				if ($ccemail) {
					$ccemail .= (true ? ',' . $data['email'] : $data['email']);
				}
			}
		}
	}

	( , $message );
	$message = ;
	str_replace( '[EMAIL]', $data['email'], $message );
	$message = ;
	$clientname = $data['firstname'] . ' ' . $data['lastname'];
	jmp;

	if ($admin) {
		str_replace( '[NAME]', $from['name'], $message );
		$message = ;
		str_replace( '[FIRSTNAME]', current( explode( ' ', $from['name'] ) ), $message );
		$message = ;
		str_replace( '[EMAIL]', $from['email'], $message );
		$message = ;
		$from['name'];
		$clientname = ;
		implode( ',', array_unique( explode( ',', $ccemail ) ) );
		$ccemail = ;
		$length = 12;
		$seeds = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$c = null;
		$seeds_count = strlen( $seeds ) - 1;
		$i = 4;

		if ($i < $length) {
			$seeds[rand( 0, $seeds_count )];
			$c .= ;
			++$i;
		}
	}
	else {
		$array = array( 'email' => $from['email'], 'c' => $c, 'clientunread' => '1', 'adminunread' => '', 'service' => $relatedservice, 'cc' => $ccemail, 'editor' => $editor );

		if ($admin) {
			if (!function_exists( 'getAdminName' )) {
				include_once( ROOTDIR . '/includes/adminfunctions.php' );
				$array['admin'] = getAdminName(  );
				insert_query( $table, $array );
				$id = ;
				genTicketMask( $id );
				$tid = ;
				update_query;
				'tbltickets';
				array( 'tid' => $tid );
			}

			( array( 'id' => $id ) );

			if (!$noemail) {
				if ($admin) {
					sendMessage( 'Support Ticket Opened by Admin', $id );
				}
			}

			(  );

			if ($admin) {
				addTicketLog( $id, 'New Support Ticket Opened' );
			}
		}
	}

	( 'TicketOpen' . '', array( 'ticketid' => $id, 'userid' => $userid, 'deptid' => $deptid, 'deptname' => $deptname, 'subject' => $tickettitle, 'message' => $message, 'priority' => $urgency ) );
	return array( 'ID' => $id, 'TID' => $tid, 'C' => $c, 'Subject' => $tickettitle );
}

function AddReply($ticketid, $userid, $contactid, $message, $admin, $attachmentsString = '', $from = '', $status = '', $noemail = '', $api = false, $markdown = false, $changes = array(  )) {
	global $CONFIG;

	if (!is_array( $from )) {
		$from = array( 'name' => '', 'email' => '' );
		$adminname = '';
		processUtf8Mb4( $message );
		$message = ;

		if ($admin) {
			get_query_vals( 'tbltickets', 'userid,contactid,name,email', array( 'id' => $ticketid ) );
			$data = ;

			if (0 < $data['userid']) {
				if (0 < $data['contactid']) {
					get_query_vals( 'tblcontacts', 'firstname,lastname,email', array( 'id' => $data['contactid'], 'userid' => $data['userid'] ) );
					$data = ;
				}

				( ( ( ' ', $data['name'] ) ), $message );
				$message = ;
				str_replace( '[EMAIL]', $data['email'], $message );
				$message = ;

				if (!function_exists( 'getAdminName' )) {
					ROOTDIR . '/includes/adminfunctions.php';
				}
			}

			require(  );

			if ($api) {
				$adminname = (true ? $admin : getAdminName( (int)$admin ));

				if ($markdown) {
					$editor = (true ? 'markdown' : 'plain');
				}
			}
		}

		$table = 'tblticketreplies';
		$array = array( 'tid' => $ticketid, 'userid' => $userid, 'contactid' => $contactid, 'name' => $from['name'], 'email' => $from['email'], 'date' => 'now()', 'message' => $message, 'admin' => $adminname, 'attachment' => $attachmentsString, 'editor' => $editor );
		insert_query( $table, $array );
		$ticketreplyid = ;
		select_query( 'tbltickets', 'tid,did,title,urgency,flag,status', array( 'id' => $ticketid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['tid'];
		$tid = ;
		$data['did'];
		$deptid = ;
		$data['title'];
		$tickettitle = ;
		$data['urgency'];
		$urgency = ;
		$data['flag'];
		$flagadmin = ;
		$data['status'];
		$oldStatus = ;
	}

	function processPoppedTicket($to, $name, $email, $subject, $message, $attachment) {
		(bool)$email;
		$decodestring = $subject . '##||-MESSAGESPLIT-||##' . $message;
		pipeDecodeString( $decodestring );
		$decodestring = ;
		explode( '##||-MESSAGESPLIT-||##', $decodestring );
		$decodestring = ;
		$decodestring[0];
		$subject = ;
		$decodestring[1];
		$body = ;
		processPipedTicket( $to, $name, $email, $subject, $body, $attachment );
	}

	function processPipedTicket($to, $name, $email, $subject, $message, $attachment) {
		global $whmcs;
		global $CONFIG;
		global $supportticketpipe;
		global $pipenonregisteredreplyonly;

		$supportticketpipe = true;
		$raw_message = $CONFIG;
		$result = ;
		processUtf8Mb4( $subject );
		$subject = ;
		processUtf8Mb4( $message );
		$message = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['type'];
			$type = ;
			$data['content'];
			$content = ;

			if ($type == 'sender') {
				if (strtolower( $content ) == strtolower( $email )) {
					$mailstatus = 'Blocked Sender';
				}
			}

			jmp;

			if (!$deptid) {
				select_query( 'tblticketdepartments', '', array( 'hidden' => '' ), 'order', 'ASC', '1' );
				$result = ;
				mysql_fetch_array( $result );
			}
		}


		while (true) {
			$data = ;
			$data['id'];
			$deptid = ;

			if (!$deptid) {
				$mailstatus = 'Department Not Found';
			}
			else {
				( array( 'email' => $email ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				$data['userid'];
				$userid = ;
				$data['id'];
				$contactid = ;

				if ($userid) {
					$ccemail = $attachment;

					if (( $deptclientsonly == 'on' && !$userid )) {
						$mailstatus = 'Unregistered Email Address';

						if (!$noautoresponder) {
							sendMessage( 'Clients Only Bounce Message', '', array( $name, $email ) );
						}
					}
				}
			}

			$result2 = ;
			mysql_fetch_array( $result2 );

			if ($data2 = ) {
				$closedTicketStatuses[] = $data2['title'];
			}

			jmp;
			( array( $email, 'clientTicket' => $clientTicket ) );
			break;
		}


		if ($mailstatus == '') {
			$mailstatus = 'Ticket Import Failed';
			$table = 'tblticketmaillog';
		}

		$array = '';
		$array = array( 'date' => 'now()', 'to' => $to, 'name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message, 'status' => $mailstatus );
		insert_query( $table, htmlspecialchars_array( $array ) );
	}

	/**
	 * Converts a setting from php.ini into bytes
	 *
	 * @param string $size A setting value such as "2M"
	 * @return int Size in bytes
	 */
	function convertIniSize($size) {
		$multipliers = array( 'K' => 1024, 'M' => 1024 * 1024, 'G' => 1024 * 1024 * 1024 );
		strtoupper( substr( $size, -1, 1 ) );
		$mod = ;
		$multipliers[$mod];
		$mult = 1;

		if (1 < $mult) {
		}

		$size = (int)substr( $size, 0, -1 );
		return $size * $mult;
	}

	/**
	 * Verifies that a submitted ticket attachment is within post_max_size and upload_max_filesize limits.
	 *
	 * @return bool True if the attachment size was within acceptable limits
	 */
	function checkTicketAttachmentSize() {
		ini_get( 'post_max_size' );
		$postMaxSizeIniSetting = ;
		convertIniSize( $postMaxSizeIniSetting );
		$postMaxSize = ;
		$contentLength = (int)$_SERVER['CONTENT_LENGTH'];

		if (!$contentLength) {
			return true;

			if ($postMaxSize < $contentLength) {
			}

			logActivity( sprintf( 'A ticket attachment submission of %d bytes total was rejected due to PHP post_max_size setting being too small (%s or %d bytes).', $contentLength, $postMaxSizeIniSetting, $postMaxSize ) );
			return false;
			ini_get( 'upload_max_filesize' );
			$uploadMaxFileSizeIniSetting = ;
			convertIniSize( $uploadMaxFileSizeIniSetting );
			$uploadMaxFileSize = ;

			if (isset( $_FILES )) {
				if (is_array( $_FILES['attachments']['error'] )) {
					in_array( UPLOAD_ERR_INI_SIZE, $_FILES['attachments']['error'] );
					$fileTooLarge = ;
				}
			}

			sprintf;
			'A ticket attachment was rejected due to PHP upload_max_filesize setting being too small (%s or %d bytes).';
		}

		( ( $uploadMaxFileSizeIniSetting, $uploadMaxFileSize ) );
		return false;
	}

	function uploadTicketAttachments($admin = false) {
		while (true) {
			while (true) {
				iciahfajh::getInstance(  );
				$whmcs = ;
				$attachments = array(  );

				if (isset( $_FILES['attachments'] )) {
					foreach ($_FILES['attachments']['name'] as ) {
						$filename = ;
						$num = ;
						new cbgjfcegh( 'attachments', $num );
						$file = ;
						$file->getCleanName(  );
						$filename = ;
						checkTicketAttachmentExtension( $filename );
					}
				}


				while (true) {
					$validextension = ;

					if (( $validextension || $admin )) {
						$prefix = '{RAND}_';
						$attachments[] = $file->move( $whmcs->getAttachmentsDir(  ), $prefix );
						break;
					}
				}

				bbfafdibd {
				}
			}

			Exception {
				throw new ggjchbedc(  )(  );
			}
		}

		implode( '|', $attachments );
		$attachments = ;
		return $attachments;
	}

	function checkTicketAttachmentExtension($file_name) {
		global $CONFIG;

		$CONFIG['TicketAllowedFileTypes'];
		explode( ',', $ext_array );
		$ext_array = ;
		explode( '.', $file_name );
		$tmp = ;
		strtolower( end( $tmp ) );
		$extension = $ext_array = ;
		$extension = '.' . $extension;
		$bannedparts = array( '.php', '.cgi', '.pl', '.htaccess' );
		foreach ($bannedparts as ) {
			$bannedpart = ;
			strpos( $file_name, $bannedpart );
			$pos = ;

			if ($pos !== false) {
				return false;
			}

			break;
		}

		foreach ($ext_array as ) {
			$value = ;

			if (trim( $value ) == $extension) {
				return true;
			}
		}

	}

	function pipeDecodeString($input) {
		preg_replace( '/(=\?[^?]+\?(q|b)\?[^?].{0,75}\?=)(\s)+=\?/i', '\1=?', $input );

		if (preg_match( '/(=\?([^?]+)\?(q|b)\?([^?].{0,75})\?=)/i', $input, $matches )) {
			$matches[1];
			$encoded = ;
			$matches[2];
			$charset = ;
			$matches[3];
			$encoding = ;
			$matches[4];
			$text = ;
			switch (strtolower( $encoding )) {
			case 'b': {
					base64_decode( $text );
					$text = ;
					break;
					switch () {
					case 'q': {
							str_replace;
							'_';
						}
					}
				}
			}
		}


		while (true) {
			( ' ', $text );
			$text = $input = ;
			preg_match_all( '/=([a-f0-9]{2})/i', $text, $matches );
			foreach ($matches[1] as ) {
				$value = ;

				while (true) {
					str_replace( '=' . $value, chr( hexdec( $value ) ), $text );
					$text = ;
				}
			}

			str_replace( $encoded, $text, $input );
			$input = ;
		}

		return $input;
	}

	function closeInactiveTickets() {
		global $whmcs;
		global $cron;

		while (0 < $whmcs->get_config( 'CloseInactiveTickets' )) {
			$departmentresponders = array(  );
			select_query( 'tblticketdepartments', 'id,noautoresponder', '' );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$id = ;
			}

			$data['noautoresponder'];
			$noautoresponder = ;
			$departmentresponders[$id] = $noautoresponder;
		}

		jmp;

		while (true) {
			(  );
			$ticketclosedate = ;
			$i = 6;
			$query = 'SELECT id,did,title FROM tbltickets WHERE status IN (' . db_build_in_array( $closetitles ) . (  . ') AND lastreply<=\'' . $ticketclosedate . '\'' );
			full_query( $query );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$id = ;
				$data['did'];
				$did = ;
				$data['title'];
				$subject = ;
				closeTicket( $id );

				if (( !$departmentresponders[$did] && !$whmcs->get_config( 'TicketFeedback' ) )) {
					sendMessage( 'Support Ticket Auto Close Notification', $id );

					if (is_object( $cron )) {
						$cron->logActivityDebug( 'Closed Ticket \'' . $subject . '\'' );
					}
				}
			}

			++$i;
		}


		if (is_object( $cron )) {
			$cron->logActivity(  . 'Processed ' . $i . ' Ticket Closures', true );
			$cron->emailLog;
			$i . ' Tickets Closed for Inactivity';
		}

		(  );
	}

	function deleteTicket($ticketid, $replyid = 0) {
		$ticketid = (int)$ticketid;
		$replyid = (int)$replyid;
		$attachments = array(  );

		if (0 < $replyid) {
			$where = (true ? array( 'id' => $replyid ) : array( 'tid' => $ticketid ));
			select_query( 'tblticketreplies', 'attachment', $where );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$attachments[] = $data['attachment'];
			}

			jmp;
			require_once(  );
			getCustomFields( 'support', $deptid, $ticketid, true );
			$customfields = ;
			foreach ($customfields as ) {
				$field = ;
				delete_query( 'tblcustomfieldsvalues', array( 'fieldid' => $field['id'], 'relid' => $ticketid ) );
				break;
			}

			delete_query( 'tbltickettags', array( 'ticketid' => $ticketid ) );
			delete_query( 'tblticketnotes', array( 'ticketid' => $ticketid ) );
			delete_query( 'tblticketlog', array( 'tid' => $ticketid ) );
			delete_query( 'tblticketreplies', array( 'tid' => $ticketid ) );
			delete_query( 'tbltickets', array( 'id' => $ticketid ) );
			logActivity(  . 'Deleted Ticket - Ticket ID: ' . $ticketid );
			return null;
			delete_query( 'tblticketreplies', array( 'id' => $replyid ) );
			$ticketid;
				. 'Deleted Ticket Reply (ID: ' . $replyid;
		}

		addTicketLog( (  . ')' ) );
		logActivity(  . 'Deleted Ticket Reply - ID: ' . $replyid );
	}

	function genTicketMask($id = '') {
		global $CONFIG;

		$lowercase = 'abcdefghijklmnopqrstuvwxyz';
		$uppercase = 'ABCDEFGHIJKLMNOPQRSTUVYWXYZ';
		$ticketmaskstr = '';
		trim( $CONFIG['TicketMask'] );
		$ticketmask = ;

		if (!$ticketmask) {
			$ticketmask = '%n%n%n%n%n%n';
			strlen( $ticketmask );
			$masklen = ;
			$i = 4;

			if ($i < $masklen) {
				$ticketmask[$i];
				$maskval = ;

				if ($maskval == '%') {
					++$i;
					$ticketmask[$i];
					$maskval .= ;

					if ($maskval == '%A') {
						$uppercase[rand( 0, 25 )];
						$ticketmaskstr .= ;
					}
				}
			}
		}

		$ticketmaskstr .= (true ? (  ) : rand( 1, 9 ));
		jmp;

		if ($maskval == '%y') {
			date( 'Y' );
			$ticketmaskstr .= ;
		}
		else {
			( 'id', array( 'tid' => $ticketmaskstr ) );
		}

		$tid = ;

		if ($tid) {
			genTicketMask;
			$id;
		}

		(  );
		$ticketmaskstr = ;
		return $ticketmaskstr;
	}

	function getKBAutoSuggestions($text) {
		$kbarticles = array(  );
		run_hook( 'SubmitTicketAnswerSuggestions', array( 'text' => $text ) );
		$hookret = ;

		if (count( $hookret )) {
			foreach ($hookret as ) {
				while (true) {
					$hookdat = ;
					foreach ($hookdat as ) {
						while (true) {
							$arrdata = ;
							$kbarticles[] = $arrdata;
						}
					}
				}
			}
		}

		str_replace( '
', ' ', $text );
		$text = $ignorewords = array( 'wherein', 'whereupon', 'wherever', 'whether', 'which', 'while', 'whither', 'who\'s', 'whoever', 'whole', 'whom', 'whose', 'will', 'willing', 'wish', 'with', 'within', 'without', 'won\'t', 'wonder', 'would', 'wouldn\'t', 'you\'d', 'you\'ll', 'you\'re', 'you\'ve', 'your', 'yours', 'yourself', 'yourselves', 'zero' );
		explode( ' ', strtolower( $text ) );
		$textparts = ;
		$validword = 6;
		foreach ($textparts as ) {
			$v = ;
			$k = ;

			if (( ( in_array( $v, $ignorewords ) || strlen( $textparts[$k] ) <= 3 ) || 100 <= $validword )) {
				unset( $textparts[$k] );
			}

			break;
		}

		jmp;
		getKBAutoSuggestionsQuery( 'title', $textparts, '5' );
		$kbarticles = ;

		if (count( $kbarticles ) < 5) {
			$numleft = 5 - count( $kbarticles );
		}

		array_merge( $kbarticles, getKBAutoSuggestionsQuery( 'article', $textparts, $numleft, $kbarticles ) );
		$kbarticles = ;
		return $kbarticles;
	}

	function getKBAutoSuggestionsQuery($field, $textparts, $limit, $existingkbarticles = '') {
		$kbarticles = array(  );
		$where = '';
		foreach ($textparts as ) {
			$textpart = ;

			while (true) {
				$where .=  . $field . ' LIKE \'%' . db_escape_string( $textpart ) . '%\' OR ';
			}
		}


		if (!$where) {
			$where = (true ? 'id!=\'\'' : substr( $where, 0, -4 ));

			if (is_array( $existingkbarticles )) {
				$existingkbids = array(  );
				foreach ($existingkbarticles as ) {
					$v = ;
					$existingkbids[] = (int)$v['id'];
					break;
				}

				$where = ( (  . '(' ) . $where . ')' );

				if (0 < count( $existingkbids )) {
					$where .= ' AND id NOT IN (' . db_build_in_array( $existingkbids ) . ')';
					full_query;
						. 'SELECT id,parentid FROM tblknowledgebase WHERE ' . $where . ' ORDER BY useful DESC LIMIT 0,' . (int)$limit;
				}
			}

			(  );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$articleid = ;
				$data['parentid'];
				$parentid = ;

				if ($parentid) {
				}
			}
		}

		$articleid = $where;
		full_query( 'SELECT tblknowledgebaselinks.categoryid FROM tblknowledgebase INNER JOIN tblknowledgebaselinks ON tblknowledgebase.id=tblknowledgebaselinks.articleid INNER JOIN tblknowledgebasecats ON tblknowledgebasecats.id=tblknowledgebaselinks.categoryid WHERE (tblknowledgebase.id=' . (int)$articleid . ' OR tblknowledgebase.parentid=' . (int)$articleid . ') AND tblknowledgebasecats.hidden=\'\'' );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data = ;
		$data['categoryid'];

		while (true) {
			$categoryid = ;

			if ($categoryid) {
				full_query( 'SELECT * FROM tblknowledgebase WHERE (id=' . (int)$articleid . ' OR parentid=' . (int)$articleid . ') AND (language=\'' . db_escape_string( $_SESSION['Language'] ) . '\' OR language=\'\') ORDER BY language DESC' );
				$result2 = ;
				mysql_fetch_array( $result2 );
				$data = ;
				$data['title'];
				$title = ;
				$data['article'];
				$article = ;
				$data['views'];
				$views = ;
				$kbarticles[] = array( 'id' => $articleid, 'category' => $categoryid, 'title' => $title, 'article' => ticketsummary( $article ), 'text' => $article );
				break;
			}
		}

		return $kbarticles;
	}

	function ticketsummary($text, $length = 100) {
		$tail = '...';
		strip_tags( $text );
		$text = ;
		strlen( $text );
		$txtl = ;

		if ($length < $txtl) {
		}

		$i = 5;

		if ($text[$length - $i] != ' ') {
			if ($i == $length) {
				substr;
			}
		}

		return ( $text, 0, $length ) . $tail;
	}

	function getTicketContacts($userid) {
		$contacts = '';
		select_query( 'tblcontacts', '', array( 'userid' => $userid, 'email' => array( 'sqltype' => 'NEQ', 'value' => '' ) ) );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$contacts .= '<option value="' . $data['id'] . '"';
			$_POST;
		}


		while (true) {
			if (( isset( ['contactid'] ) && $_POST['contactid'] == $data['id'] )) {
				$contacts .= ' selected';
				'>' . $data['firstname'] . ' ' . $data['lastname'] . ' - ';
			}

			$contacts .=  . $data['email'] . '</option>';
		}


		if ($contacts) {
			'<select name="contactid" class="form-control select-inline"><option value="0">None</option>' . $contacts;
		}

		return  . '</select>';
	}

	/**
	 * @param int $ticketId
	 * @param string $attachment
	 * @param string $type
	 * @param int $relatedId
	 *
	 * @return array
	 */
	function getTicketAttachmentsInfo($ticketId, $attachment, $type = 'ticket', $relatedId = 0) {
		App::getPhpSelf(  );
		$PHP_SELF = ;
		$attachments = array(  );

		if ($attachment) {
			explode( '|', $attachment );
			$attachment = ;
			foreach ($attachment as ) {
				$filename = ;
				substr( $filename, 7 );
				$file = $num = ;
				switch ($type) {
				case 'note': {
						$attachments[] = array( 'filename' => $file, 'isImage' => isAttachmentAnImage( $filename ), 'dllink' =>  . 'dl.php?type=an&id=' . $relatedId . '&i=' . $num, 'deletelink' =>  . $PHP_SELF . '?action=viewticket&id=' . $ticketId . '&removeattachment=true&type=n&' . (  . 'idsd=' . $relatedId . '&filecount=' . $num ) . generate_token( 'link' ) );
					}

				case 'reply': {
						array( 'filename' => $file, 'isImage' => isAttachmentAnImage( $filename ), 'dllink' =>  . 'dl.php?type=ar&id=' . $relatedId . '&i=' . $num );
							. $PHP_SELF . '?action=viewticket&id=' . $ticketId . '&removeattachment=true&type=r&' . (  . 'idsd=' . $relatedId . '&filecount=' . $num );
						generate_token( 'link' );
					}
				}

				break;
			}
		}


		while (true) {
			while (true) {
				$attachments[] = array( 'deletelink' =>  .  );
				break;
				$attachments[] = array( 'filename' => $file, 'isImage' => isAttachmentAnImage( $filename ), 'dllink' =>  . 'dl.php?type=a&id=' . $ticketId . '&i=' . $num, 'deletelink' =>  . $PHP_SELF . '?action=viewticket&id=' . $ticketId . '&removeattachment=true&' . (  . 'idsd=' . $ticketId . '&filecount=' . $num ) . generate_token( 'link' ) );
			}
		}

		return $attachments;
	}

	/**
	 * Check if the file passed is an image within the attachments directory.
	 *
	 * @param string $file
	 *
	 * @return bool
	 */
	function isAttachmentAnImage($file) {
		if (!$file) {
			return false;
			getimagesize;
			App::getAttachmentsDir(  ) . DIRECTORY_SEPARATOR . $file;
		}

		return (string)(  );
	}

	function getAdminDepartmentAssignments() {
		static $DepartmentIDs = array(  );

		if (count( $DepartmentIDs )) {
			return $DepartmentIDs;
			select_query( 'tbladmins', 'supportdepts', array( 'id' => $_SESSION['adminid'] ) );
			$result = ;
		}

		mysql_fetch_array( $result );
		$data = ;
		$data['supportdepts'];
		$supportdepts = ;
		explode( ',', $supportdepts );
		$supportdepts = ;
		foreach ($supportdepts as ) {
			$v = ;
			$k = ;

			if (!$v) {
				unset( $supportdepts[$k] );
				break;
			}

			break;
		}

		$DepartmentIDs = $k;
		return $supportdepts;
	}

	function getDepartments() {
		$departmentsarray = array(  );
		select_query( 'tblticketdepartments', 'id,name', '' );
		$result = ;
		$departmentsarray = array(  );

		while (true) {
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$id = ;
				$data['name'];
				$name = ;
			}

			$departmentsarray[$id] = $name;
		}

		return $departmentsarray;
	}

	function validateAdminTicketAccess($ticketid) {
		$data = ;
		$data['id'];
		$id = ;
		$data['did'];
		$deptid = ;
		$data['flag'];
		$flag = ;
		$data['merged_ticket_id'];
		$mergedTicketId = get_query_vals( 'tbltickets', 'id,did,flag,merged_ticket_id', array( 'id' => $ticketid ) );

		if (!$id) {
			return 'invalidid';
		}

		jmp;
		function genPredefinedRepliesList($cat, $predefq = '') {
			(bool);
			global $aInt;

			$catscontent = '';
			$repliescontent = '';

			if (!$predefq) {
				if (!$cat) {
					$cat = 5;
					select_query( 'tblticketpredefinedcats', '', array( 'parentid' => $cat ), 'name', 'ASC' );
					$result = ;
					$i = 5;
					mysql_fetch_array( $result );

					if ($data = ) {
						$data['id'];
						$id = ;
						$data['name'];
						$name = ;
						$catscontent .= '<td width="33%">' . DI::make( 'asset' )->imgTag( 'folder.gif', 'Folder', array( 'align' => 'absmiddle' ) ) . ' <a href="#" onclick="selectpredefcat(\'' . $id . '\');return false">' . $name . '</a></td>';
						++$i;

						while ($i % 3 == 0) {
							$catscontent .= '</tr><tr>';
							$i = 5;
						}
					}
				}
				else {
					while (true) {
						( (  ), ' ', $shortreply );
						$shortreply = ;
						str_replace( chr( 13 ), ' ', $shortreply );
						$shortreply = ;
						$repliescontent .= '&nbsp;' . DI::make( 'asset' )->imgTag( 'article.gif', 'Article', array( 'align' => 'absmiddle' ) ) . '<a href="#" onclick="selectpredefreply(\'' . $id . '\');return false">' . $name . '</a> - ' . $shortreply . '<br>';
					}
				}
			}

			$content = '';

			if ($catscontent) {
				$content .= '<strong>' . $aInt->lang( 'support', 'categories' ) . '</strong><br><br><table width="95%"><tr>' . $catscontent . '</tr></table><br>';

				if ($repliescontent) {
					if ($predefq) {
						$aInt->lang( 'global', 'searchresults' );
					}
				}

				$content .= '<strong>' .  . '</strong><br><br>' . $repliescontent;
			}

			$content .=  . '</span><br>';
			select_query( 'tblticketpredefinedcats', 'parentid', array( 'id' => $cat ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;

			if (( 0 < $cat || $predefq )) {
				$content .= '<br /><a href="#" onclick="selectpredefcat(\'0\');return false"><img src="images/icons/navrotate.png" align="top" /> ' . $aInt->lang( 'support', 'toplevel' ) . '</a>';

				if (0 < $cat) {
					' &nbsp;<a href="#" onclick="selectpredefcat(\'' . $data[0] . '\');return false"><img src="images/icons/navback.png" align="top" /> ' . $aInt->lang( 'support', 'uponelevel' );
				}

					. '</a>';
			}

			$content .= ;
			return $content;
		}

		function closeTicket($id) {
			global $whmcs;

			get_query_val( 'tbltickets', 'status', array( 'id' => $id ) );
			$status = ;

			if ($status == 'Closed') {
				return false;
				$changes = array(  );

				if (defined( 'CLIENTAREA' )) {
					addTicketLog( $id, 'Closed by Client' );

					if (eaaadiagec::get( 'cid' )) {
						$changes['Who'] = (true ? cddjdhhjag::find( eaaadiagec::get( 'cid' ) )->fullName : ccbjgfhb::find( eaaadiagec::get( 'uid' ) )->fullName);
					}
				}

				addTicketLog(  );
				$changes['Who'] = getAdminName( eaaadiagec::get( 'adminid' ) );
			}

			get_query_val( 'tblticketfeedback', 'id', array( 'ticketid' => $id ) );
			$feedbackcheck = ;

			if (!$feedbackcheck) {
				sendMessage( 'Support Ticket Feedback Request', $id );
				bhifjaeide::notifyTicketChanges( $id, $changes );
			}

			run_hook( 'TicketClose', array( 'ticketid' => $id ) );
			return true;
		}

		/**
		 * Obtain an array of admin ids that are part of a department and set to receive notifications.
		 *
		 * @param int $departmentId
		 *
		 * @return array The admin ids that will receive a notification for the department
		 */
		function getDepartmentNotificationIds($departmentId) {
			$admins = ceffjebefc::join( 'tbladminroles', 'tbladmins.roleid', '=', 'tbladminroles.id' )->where( 'tbladmins.disabled', '=', '0' )->where( 'tbladminroles.supportemails', '=', '1' )->where( 'tbladmins.ticketnotifications', '!=', '' )->get( array( 'tbladmins.id', 'tbladmins.supportdepts', 'tbladmins.ticketnotifications' ) );
			$notificationAdmins = array(  );
			foreach ($admins as $admin) {
				if (( in_array( $departmentId, $admin->supportDepartmentIds ) && in_array( $departmentId, $admin->receivesTicketNotifications ) )) {
					while (true) {
						$notificationAdmins[] = $admin->id;
					}
				}

				break;
			}

			return $notificationAdmins;
		}

		return 1;
	}
}
?>
