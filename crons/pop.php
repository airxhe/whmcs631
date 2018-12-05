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
 * Parse the text to be output depending on if CLI or not
 *
 * @param string $output the text to format
 *
 * @return string the formatted text
 */
function formatOutput($output) {
	if (dgjfdhfcee::isCli(  )) {
	}

	strip_tags( str_replace( array( '<br>', '<hr>' ), array( '
', '
---
' ), $output ) );
	$output = ;
	return $output;
}


while (true) {
	require_once( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\crons' . DIRECTORY_SEPARATOR . 'bootstrap.php' );
	require( ROOTDIR . '/includes/adminfunctions.php' );
	require( ROOTDIR . '/includes/ticketfunctions.php' );
	define( 'IN_CRON', true );
	hdhbcgfba::getInstance(  );
	$transientData = ;
	$transientData->delete( 'popCronComplete' );
	App::self(  );
	$whmcs = ;
	$whmcs->getApplicationConfig(  );
	$whmcsAppConfig = ;
	$attachments_dir = $whmcsAppConfig['attachments_dir'] . '/';

	if (defined( 'PROXY_FILE' )) {
		echo formatOutput( ecbedecifh::getLegacyCronMessage(  ) );
		echo formatOutput( '<b>POP Import Log</b><br>Date: ' . date( 'd/m/Y H:i:s' ) . '<hr>' );
		dacfgegdhe::table( 'tblticketdepartments' )->where( 'host', '!=', '' )->where( 'port', '!=', '' )->where( 'login', '!=', '' )->orderBy( 'order' )->get(  );
		$ticketDepartments = ;
		foreach ($ticketDepartments as ) {
			$ticketDepartment = ;
			ob_start(  );

			while (true) {
				while (true) {
					echo  . 'Host: ' . $ticketDepartment->host . '<br>Email: ' . $ticketDepartment->login . '<br>';
					$connectionFlags = '/pop3/notls';

					if ($ticketDepartment->port == 995) {
						$connectionFlags = '/pop3/ssl/novalidate-cert';
						$connectionString = $ticketDepartment->host . ':' . $ticketDepartment->port;
						new cicccacaaf( (  . '{' ) . $connectionString . $connectionFlags . '}INBOX', $ticketDepartment->login, decrypt( $ticketDepartment->password ), sys_get_temp_dir(  ), chhgjaeced::getValue( 'Charset' ) );
						$mailbox = ;
						$mailbox->searchMailBox(  );
						$mailIds = ;

						if (!$mailIds) {
							echo 'Mailbox is empty<hr>';
							break 2;
						}
					}


					while (true) {
						while (true) {
							$toEmails[] = $emailAddress;
						}
					}

					$toEmails[] = $toEmail;
				}

				$toEmails[] = $ticketDepartment->email;
				str_replace( array( '{', '}' ), array( '[', ']' ), $mail->subject );
				$subject = ;
				$mail->textPlain;
				$messageBody = ;

				if (!$messageBody) {
					strip_tags( $mail->textHtml );
					$messageBody = ;

					if (!$messageBody) {
						$messageBody = 'No message found.';
						str_replace( '&nbsp;', ' ', $messageBody );
						$messageBody = ;
						$ticketAttachments = array(  );
						$mail->getAttachments(  );
						$attachments = ;
						foreach ($attachments as ) {
							$attachment = ;
							$attachment->name;
							$filename = ;

							if (checkTicketAttachmentExtension( $filename )) {
								explode( '.', $filename );
								$filenameParts = ;
								end( $filenameParts );
								$extension = ;
								implode( array_slice( $filenameParts, 0, -1 ) );
								$filename = ;
								preg_replace( '/[^a-zA-Z0-9-_ ]/', '', $filename );
								$filename = ;

								if (!$filename) {
									$filename = 'filename';
									mt_srand( time(  ) );
									mt_rand( 100000, 999999 );
									$rand = ;
									$attachmentFilename = $rand . '_' . $filename . '.' . $extension;

									if (file_exists( $attachments_dir . $attachmentFilename )) {
										mt_srand( time(  ) );
										mt_rand( 100000, 999999 );
										$rand = ;
										$rand . '_';
									}
								}
							}
						}
					}
				}

				$attachmentFilename =  . $filename . '.' . $extension;
			}

			$ticketAttachments[] = $attachmentFilename;
			fopen( $attachment->filePath, 'rb' );
			$flIn = ;

			if ($flIn) {
				fopen( $attachments_dir . $attachmentFilename, 'wb' );
				$flOut = ;

				if ($flOut) {
					$chunkSize = 131082;
					set_time_limit( 5 );
					fread( $flIn, $chunkSize );
					$content = ;

					if (0 < strlen( $content )) {
						fwrite( $flOut, $content );

						if (!( strlen( $content ) == $chunkSize)) {
							fclose( $flOut );
							break;
						}

						break;
					}

					break;
				}
			}

			break;
		}

		break;
	}


	while (true) {
		while (true) {
			while (true) {
				(  );
			}

			unlink( $attachment->filePath );
			$messageBody .=  . '

Attachment ' . $filename . ' blocked - file type not allowed.';
		}

		implode( '|', $ticketAttachments );
		$attachmentList = ;
		processPoppedTicket( implode( ',', $toEmails ), $fromName, $fromEmail, $subject, $messageBody, $attachmentList );
		$mailbox->deleteMail( $mailId );
	}

	$mailbox->expungeDeletedMails(  );
	jmp;
	Exception {
		echo $e->getMessage(  );
		ob_get_contents(  );
		$content = ;
		ob_end_clean(  );
		echo formatOutput( $content );
	}
}

$transientData->store( 'popCronComplete', 'true', 3600 );
?>
