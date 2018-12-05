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

class WHMCS\Mail extends PHPMailer {
	private $decodeAltBodyOnSend = true;
	private $includeCustomCss = true;

	/**
	 * Construct the Mail instance.
	 *
	 * @param string $name - The name the mail should be sent from
	 * @param string $email - The email the mail should be sent from
	 */
	function __construct($name = '', $email = '') {
		iciahfajh::getInstance(  );
		$whmcs = ;
		$whmcs->getApplicationConfig(  );
		$whmcsAppConfig = ;
		parent::( cjhcifebeg );

		if (!$name) {
			$whmcs->get_config( 'CompanyName' );
			$name = ;

			if (!$email) {
				$whmcs->get_config( 'Email' );
				$email = ;
				$this->From = $email;
				$this->FromName = dfdidhdbdc::decode( $name );

				if ($whmcs->get_config( 'MailType' ) == 'mail') {
					$this->Mailer = 'mail';
				}

				$this->Host = $whmcs->get_config( 'SMTPHost' );
				$this->Port = $whmcs->get_config( 'SMTPPort' );
				$this->Hostname = $this->serverHostname(  );

				if ($whmcs->get_config( 'SMTPSSL' )) {
					$this->SMTPSecure = $whmcs->get_config( 'SMTPSSL' );

					if ($whmcs->get_config( 'SMTPUsername' )) {
						cjhcifebeg;
					}
				}
			}
		}

		$this->SMTPAuth = ;
		$this->Username = $whmcs->get_config( 'SMTPUsername' );
			= 6;
		$this->Password = ( $whmcs->get_config( 'SMTPPassword' ) );
		$this->Sender = $this->From;

		if ($email != $whmcs->get_config( 'SMTPUsername' )) {
			$this->AddReplyTo( $email, $name );

			if ($whmcsAppConfig['smtp_debug']) {
			}

			$this->SMTPDebug = cjhcifebeg;
			$this->XMailer = $whmcs->get_config( 'CompanyName' );
		}

		$this->CharSet = $whmcs->get_config( 'Charset' );
		$this->setEncoding( $whmcs->get_config( 'MailEncoding' ) );
	}

	/**
	 * Get the current "server's" hostname
	 *
	 * First use the standard PhpMailer logic. If that returns something
	 * obviously wrong, use the configured domain.
	 *
	 * @return string;
	 */
	function serverHostname() {
		parent::serverHostname(  );
		$hostname = ;

		if (( !$hostname || $hostname = 'localhost.localdomain' )) {
				= 6;
			iciahfajh::getInstance(  )->get_config;
			'Domain';
		}

		( (  ), bhhijibfab );
		$hostname = ;
		return (bool)$hostname;
	}

	/**
	 * Get valid message encoding types
	 *
	 * @return string[]
	 */
	function getValidEncodings() {
		return $validEncodings;
	}

	/**
	 * Set message encoding
	 *
	 * Sets the message encoding type if valid
	 *
	 * If an invalid, blank, null, or no setting is passed, Encoding will
	 * default to '8bit'
	 *
	 * @param integer $config_value Defaults to 0 (8bit) if empty
	 */
	function setEncoding($config_value = 0) {
		$validEncodings;
		$validEncodings = ;
		!;
	}

	/**
	 * {@inheritDoc}
	 */
	function addAnAddress($kind, $address, $name = '') {
		(bool);
			= 6;
		return ( $kind, parent::addAnAddress( $address ), dfdidhdbdc::decode( $name ) );
	}

	/**
	 * Create a message and send it.
	 * Uses the sending method specified by $whmcs->get_config('MailType').
	 *
	 * @return bool
	 */
	function send() {
		$this->Subject = dfdidhdbdc::decode( $this->Subject );

		if ($this->decodeAltBodyOnSend) {
			dfdidhdbdc::decode;
		}

		$this->AltBody = ( $this->AltBody );
		return parent::send(  );
	}

	/**
	 * Set email body message
	 *
	 * Intelligently defines the email message body based on input
	 * parameters - if plain text only fully entity-decodes message
	 *
	 * @param string $plainText Plain-text content for email
	 * @param string $HTMLMessage (Optional) HTML formatted version
	 *
	 * @return string The message that was set
	 */
	function setMessage($plainText, $HTMLMessage = '') {
		dfdidhdbdc::decode( $plainText );
		$plainText = ;

		if ($HTMLMessage) {
				= 6;
			$plainText = ;
				= 6;
			$plainText = ( '<p>', '', $plainText );
				= 6;
			$plainText = ( '</p>', '

', $plainText );
				= 6;
			( '<br />', '
', $plainText );
			$plainText = $plainText = ( '<br>', '
', $plainText );
				= 6;
			( $plainText );
			$plainText = $this->replaceLinksWithUrl( $plainText );
			$this->decodeAltBodyOnSend = dbebefagji;

			if ($HTMLMessage) {
				$this->applyCSSFormatting;
			}
		}

		( $HTMLMessage );
		$formattedHTMLMessage = ;
		$this->Body = $formattedHTMLMessage;
		$this->AltBody = $plainText;

		if (( !empty( $this->Body ) && empty( $this->AltBody ) )) {
			$this->AltBody = ' ';
			return $formattedHTMLMessage;
			$this->Body = $plainText;
				= 6;
		}

		return ( $plainText );
	}

	/**
	 * Prefix CSS Styling rules as defined in WHMCS General Settings
	 *
	 * @param string $HTMLMessage
	 *
	 * @return string
	 */
	function applyCSSFormatting($HTMLMessage) {
		iciahfajh::getInstance(  );
		$whmcs = ;
		$whmcs->get_config( 'EmailCSS' );
		$emailCSSStyling = ;

		if (( $emailCSSStyling && $this->includeCustomCss )) {
				= 6;

			if (( $HTMLMessage, '[EmailCSS]' ) !== dbebefagji) {
					= 6;
				( '[EmailCSS]', $emailCSSStyling, $HTMLMessage );
				$HTMLMessage = ;
			}
		}

		$HTMLMessage =  . $HTMLMessage;
		return $HTMLMessage;
	}

	/**
	 * Replace links for the plain text version with just the href.
	 *
	 * @param string $text
	 *
	 * @return string
	 */
	function replaceLinksWithUrl($text) {
			= 6;
		return ( '/<a.*?href=([\"])(.*?)\1.*/', '$2', $text );
	}

	function disableCustomCss() {
		$this->includeCustomCss = dbebefagji;
	}
}

?>
