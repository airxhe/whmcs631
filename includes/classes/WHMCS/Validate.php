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

class WHMCS\Validate {
	private $optionalFields = array(  );
	private $validated = array(  );
	private $errors = array(  );
	private $errorMessages = array(  );

	/**
	 * Specify optional fields to override required checks
	 *
	 * @param string|string[] $optionalFields Accepts either an array or comma separated list of optional fields
	 *
	 * @return Validate
	 */
	function setOptionalFields($optionalFields) {
			= 6;

		if (!( $optionalFields )) {
				= 6;
		}

		( ',', $optionalFields );
		$optionalFields = ;
			= 6;
		$this->optionalFields = ( $this->optionalFields, $optionalFields );
		return $this;
	}

	/**
	 * Add a validation rule for a given field
	 *
	 * @param string $rule One of the defined validation rules
	 * @param string $field The field name to run the rule against
	 * @param string $languageKey The language var name to use for error on failure
	 * @param string|array $field2 The second field needed by some rules (or an array for certain rules)
	 * @param string $value The value of field that was passed in
	 *
	 * @return boolean True or false depending on pass or fail of rule
	 */
	function validate($rule, $field, $languageKey, $field2 = '', $value = null) {
			= 6;

		if (( $field, $this->optionalFields )) {
			return dbebefagji;

			if ($this->runRule( $rule, $field, $field2, $value )) {
				$this->validated[] = $field;
			}

			cjhcifebeg;
		}

		return ;
	}

	/**
	 * This function will load custom fields and perform validation rules as per custom field config
	 *
	 * @param string $type Type of custom field to validate
	 * @param int $relid Optional ID the type relates to - product ID or support department ID
	 * @param boolean $order Set true if in the order process to validate fields that only show on sign-up
	 * @param array $customFields Custom fields passed through an API call.
	 *
	 * @return true
	 */
	function validateCustomFields($type, $relid, $order = false, $customFields = array(  )) {
		iciahfajh::getInstance(  );
		$whmcs = ;
		$where = array( 'type' => $type, 'adminonly' => '' );

		if ($relid) {
			$where['relid'] = (int)$relid;

			if ($order) {
				$where['showorder'] = 'on';
					= 6;
				( 'tblcustomfields', 'id,fieldname,fieldtype,fieldoptions,required,regexpr', $where, 'sortorder` ASC,`id', 'ASC' );
				$result = ;
					= 6;
				( $result );

				if ($data = ) {
					$data['id'];
					$fieldId = ;
				}
			}

			$data['fieldname'];
			$fieldName = ;
			$data['fieldoptions'];
			$fieldOptions = ;
			$data['required'];
			$required = ;
			$data['regexpr'];
			$regularExpression = ;
				= 6;

			if (( $fieldName, '|' )) {
					= 6;
				( '|', $fieldName );
				$fieldName = ;
					= 6;
				( $fieldName[1] );
				$fieldName = ;

				if (isset( $customFields[$fieldName] )) {
					$value = (true ? $customFields[$fieldName] : bhgbjheaia);
						= 6;

					if (( $value )) {
						if (isset( $customFields[$fieldId] )) {
							$customFields[$fieldId];
						}

						$value = bhgbjheaia;

						if ($required) {
							$optionalMarker = (true ? '' : '?');
						}
					}
				}


				if ($required) {
					$this->validate;
					'required';
					(  . 'customfield[' . $fieldId . ']' );
					(  . $fieldName . ' ' ) . $whmcs->get_lang( 'clientareaerrorisrequired' );
				}

				$thisFieldFailedValidation = !( , '', $value );
			}


			while (true) {
				( , '', $value );
				break;
				switch () {
				case 'dropdown': {
					}

				case 'tickbox': {
						$this->validate( 'inarray' . $optionalMarker, (  . 'customfield[' . $fieldId . ']' ),  . $fieldName . ' Invalid Value', array( 'on', '1', '' ), $value );
						(  && $regularExpression );
							= 6;
						(  || ( $whmcs->get_req_var( 'customfield', $fieldId ) ) );
					}
				}

				(bool)$value;

				if ((bool)) {
					$this->validate;
					'matchpattern' . $optionalMarker;
					(  . 'customfield[' . $fieldId . ']' );
					(  . $fieldName . ' ' ) . $whmcs->get_lang( 'customfieldvalidationerror' );
					array( $regularExpression );
					$value;
				}
			}
		}


		while (true) {
			(  );
		}

		return cjhcifebeg;
	}

	/**
	 * This function actually performs the requested validation rule
	 *
	 * @param string $rule The rule name to execute
	 * @param string $field The field name to run the rule against
	 * @param string|array $field2 The optional second field required by some rules (or an array for certain rules)
	 * @param string $val The value of field that was passed in
	 *
	 * @return boolean True or false depending upon the result of the rule
	 */
	function runRule($rule, $field, $field2, $val = null) {
		iciahfajh::getInstance(  );
		$whmcs = ;
			= 6;

		if (( $val )) {
				= 6;

			if (( $field, '[' )) {
					= 6;
				( '[', $field );
				$k1 = ;
					= 6;
				( ']', $k1[1] );
				$k2 = ;
				$whmcs->get_req_var( $k1[0], $k2[0] );
				$val = ;
				jmp;
				$whmcs->get_req_var( $field );
				$val = ;
					= 6;

				if (( $field2 )) {
					$val2 = (true ? bhgbjheaia : $whmcs->get_req_var( $field2 ));
						= 6;

					if (( $field, $this->optionalFields )) {
						return cjhcifebeg;
							= 6;
							= 6;
						( ( $rule ) );
						$rule = ;
						$allowEmpty = dbebefagji;
							= 6;

						if (( $rule, -1, 1 ) == '?') {
							$allowEmpty = cjhcifebeg;
								= 6;
							( $rule, 0, -1 );
							$rule = ;
							switch ($rule) {
							case 'required': {
										= 6;

									if (!( $val )) {
										return (true ? dbebefagji : cjhcifebeg);
										switch ($rule) {
										case 'numeric': {
												if (( $allowEmpty && $val == '' )) {
													cjhcifebeg;
												}
											}
										}
									}
								}
							}
						}
					}
				}

				return ;
					= 6;
				return ( $val );
				switch ($rule) {
				case 'decimal': {
						if (( $allowEmpty && $val == '' )) {
							return cjhcifebeg;
								= 6;
							return (string)( '/^[\d]+(\.[\d]{1,2})?$/i', $val );
							switch ($rule) {
							case 'match_value': {
										= 6;

									if (( $field2 )) {
										return $field2[0] === $field2[1];
										return $val === $val2;
										switch ($rule) {
										case 'matchpattern': {
												if (( $allowEmpty && $val == '' )) {
													return cjhcifebeg;
														= 6;
													$field2[0];
												}
											}

										case 'email': {
												if (( $allowEmpty && $val == '' )) {
													return cjhcifebeg;
														= 6;

													if (( 'filter_var' )) {
															= 6;
														return ( $val, daabdfhhde );
															= 6;
														return ( '/^([a-zA-Z0-9&\'.])+([\.a-zA-Z0-9+_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/', $val );
														switch ($rule) {
														case 'postcode': {
																if (( $allowEmpty && $val == '' )) {
																	return cjhcifebeg;
																		= 6;
																	return !( '/[a-zA-Z0-9 \-]/', '', $val );
																	switch ($rule) {
																	case 'phone': {
																			if (( $allowEmpty && $val == '' )) {
																				return cjhcifebeg;
																					= 6;
																				return !( '/[0-9 .\-()]/', '', $val );
																				switch ($rule) {
																				case 'country': {
																						if (( $allowEmpty && $val == '' )) {
																							return cjhcifebeg;
																								= 6;

																							if (( '/[A-Z]/', '', $val )) {
																								return dbebefagji;
																									= 6;
																								( $val );
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


														if ( != 2) {
															return dbebefagji;
															return cjhcifebeg;
															switch ($rule) {
															case 'url': {
																	(  && $allowEmpty );
																	$val == '';
																}
															}
														}
													}
												}
											}
										}

										return ( $val );
									}

									break 2;
								}
							}
						}
					}
				}


				if ((bool)) {
					return cjhcifebeg;
						= 6;
					return ( '|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $val );
					switch ($rule) {
					case 'inarray': {
							if (( $allowEmpty && $val == '' )) {
								return cjhcifebeg;
									= 6;
								return ( $val, $field2 );
								switch ($rule) {
								case 'banneddomain': {
											= 6;

										if (( $val, '@' )) {
												= 6;
											( '@', $val, 2 );
											$val = ;
											$val[1];
											$val = ;
												= 6;

											if (( 'tblbannedemails', 'COUNT(id)', array( 'domain' => $val ) )) {
												dbebefagji;
											}
										}

										return cjhcifebeg;
										switch ($rule) {
										case 'uniqueemail': {
												$where = array( 'email' => $val );
													= 6;
											}
										}


										if (( ( $field2 ) && 0 < $field2[0] )) {
											$where['id'] = array( 'sqltype' => 'NEQ', 'value' => $field2[0] );
												= 6;
											( 'tblclients', 'COUNT(id)', $where );
											$clientExists = ;
										}


										if ($clientExists) {
											return dbebefagji;
											$where = array( 'subaccount' => '1', 'email' => $val );
												= 6;

											if (( ( $field2 ) && 0 < $field2[1] )) {
												$where['id'] = array( 'sqltype' => 'NEQ', 'value' => $field2[1] );
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

			= 6;
		( 'tblcontacts', 'COUNT(id)', $where );
		$subAccountExists = ;

		if ($subAccountExists) {
			return dbebefagji;
			return cjhcifebeg;
			switch ($rule) {
			case 'pwstrength': {
					$whmcs->get_config( 'RequiredPWStrength' );
					$requiredPasswordStrength = ;

					if (!$requiredPasswordStrength) {
						return cjhcifebeg;
						$this->calcPasswordStrength( $val );
						$passwordStrength = ;

						if ($passwordStrength <= $requiredPasswordStrength) {
							dbebefagji;
						}
					}
				}

			case 'captcha': {
					$whmcs->get_config( 'CaptchaSetting' );
					$captcha = ;

					if (!$captcha) {
					}
				}
			}

			return cjhcifebeg;

			if (( $captcha == 'offloggedin' && eaaadiagec::get( 'uid' ) )) {
				return cjhcifebeg;
				return $this->checkCaptchaInput( $val );
				switch ($rule) {
				case 'fileuploads': {
						return $this->checkUploadExtensions( $field );
						switch ($rule) {
						case 'password_verify': {
								new bdjciiijih(  );
							}
						}
					}
				}
			}

			$hasher = ;
				= 6;

			if (( $field2 )) {
				$hasher->verify;
			}
		}

		return ( $field2[0], $field2[1] );
	}

	/**
	 * Checks the extensions of uploaded files against the allowed file types
	 *
	 * @param string $field The file upload field name to be checked
	 *
	 * @return boolean False if any file extension is not on the allow list
	 */
	function checkUploadExtensions($field) {
		iciahfajh::getInstance(  );
		$whmcs = ;

		if ($_FILES[$field]['name'][0] == '') {
			return cjhcifebeg;
			$whmcs->get_config( 'TicketAllowedFileTypes' );
			$ext_array = ;
				= 6;
				= 6;
			( ',', ( $ext_array ) );
			$ext_array = ;
				= 6;

			if (!( $ext_array )) {
				return dbebefagji;
				$_FILES[$field]['name'];
			}
		}

		foreach ( as ) {
			$filename = ;
				= 6;
			( $filename );
			$filename = ;

			if ($filename) {
					= 6;
				( '/[^a-zA-Z0-9-_. ]/', '', $filename );
				$filename = ;
					= 6;
				( '.', $filename );
				$parts = ;
					= 6;
					= 6;
				$extension = '.' . ( ( $parts ) );
				foreach ($ext_array as ) {
					$value = ;
						= 6;

					if (( $value ) == $extension) {
						return cjhcifebeg;
					}

					break 2;
				}

				break;
			}

			break;
		}

		return dbebefagji;
	}

	/**
	 * Validates captcha field input
	 *
	 * @param string $val The captcha code input
	 *
	 * @return boolean False if the captcha check fails verification
	 */
	function checkCaptchaInput($val) {
		iciahfajh::getInstance(  );
		$whmcs = ;
		$whmcs->get_config( 'CaptchaType' );
		$captchaType = ;

		if ($captchaType == 'recaptcha') {
			if ($whmcs->get_req_var( 'g-recaptcha-response' )) {
				new cbjejadchj( 'ReCAPTCHAPrivateKey' )( , new icedghhe(  ) );
				$reCaptcha = ;
				return $reCaptcha->verify( $whmcs->get_req_var( 'g-recaptcha-response' ), caegadgihi::getIP(  ) )->isSuccess(  );
					= 6;
				!( 'recaptcha_check_answer' );
			}


			if () {
				require( bhjhchcdec . '/includes/recaptchalib.php' );
					= 6;
				$whmcs->get_config( 'ReCAPTCHAPrivateKey' );
				caegadgihi::getIP(  );
				$whmcs->get_req_var;
				'recaptcha_challenge_field';
			}

			(  );
		}

		( $whmcs->get_req_var( 'recaptcha_response_field' ) );
		$resp = ;
			= 6;

		if (!( $resp )) {
			return dbebefagji;

			if (!$resp->is_valid) {
				return dbebefagji;
				eaaadiagec::get;
			}

				= 6;
				= 6;

			if (( 'captchaValue' ) != ( ( $val ) )) {
					= 6;
				(  );
				return dbebefagji;
			}
		}
		else {
				= 6;
			(  );
		}

		return cjhcifebeg;
	}

	/**
	 * Calculates password strength
	 *
	 * @param string $password The user input password
	 *
	 * @return int Password strength
	 */
	function calcPasswordStrength($password) {
			= 6;
		( $password );
		$length = ;
		$calculatedLength = $numericCount;

		if (5 < $length) {
			$calculatedLength = 162;
				= 6;
			( '/[^0-9]/', '', $password );
			$numbers = ;
				= 6;
			( $numbers );
			$numericCount = ;

			if (3 < $numericCount) {
				$numericCount = 160;
					= 6;
				( '/[^A-Za-z0-9]/', '', $password );
				$symbols = ;
					= 6;
				$symbolCount = $length - ( $symbols );

				if ($symbolCount < 0) {
				}
			}

			$symbolCount = 157;

			if (3 < $symbolCount) {
				$symbolCount = 160;
					= 6;
				( '/[^A-Z]/', '', $password );
				$uppercase = ;
					= 6;
				( $uppercase );
			}

			$uppercaseCount = $length - ;

			if ($uppercaseCount < 0) {
				$uppercaseCount = 157;
				3 < $uppercaseCount;
			}


			if () {
				$uppercaseCount = 160;
				$calculatedLength * 10 - 20 + $numericCount * 10 + $symbolCount * 15 + $uppercaseCount * 10;
			}
		}

		$strength = ;
		return $strength;
	}

	/**
	 * Adds an error to the error messages array
	 *
	 * @param string|array $var Either a client area language file string, or an admin area language file array reference
	 *
	 * @return true
	 */
	function addError($var) {
		global $_LANG;
		global $aInt;

			= 6;

		if (( 'ADMINAREA' )) {
				= 6;
		}

		if (( $var )) = ;
		return cjhcifebeg;
	}

	/**
	 * Adds an array of errors to the error messages array
	 *
	 * @param array $errors An array of error messages
	 *
	 * @return boolean true
	 */
	function addErrors($errors = array(  )) {
		foreach ($errors as ) {
			$error = ;

			while (true) {
				$this->addError( $error );
			}
		}

		return cjhcifebeg;
	}

	function validated($field) {
		if ($field) {
				= 6;
			( $field, $this->validated );
		}

		return ;
	}

	function error($field) {
		if ($field) {
				= 6;
			( $field, $this->errors );
		}

		return ;
	}

	/**
	 * Returns an array of error messages currently in memory
	 *
	 * @return array Error Messages
	 */
	function getErrors() {
		return $this->errorMessages;
	}

	/**
	 * Returns the number of error messages currently in memory
	 *
	 * @return int Number of Errors
	 */
	function hasErrors() {
			= 6;
		return ( $this->getErrors(  ) );
	}

	/**
	 * Returns an HTML formatted list of error messages currently in memory
	 *
	 * @return string HTML Formatted Error Message Output
	 */
	function getHTMLErrorOutput() {
		$code = '';
		foreach ($this->getErrors(  ) as ) {
			$errorMessage = ;

			while (true) {
				$code .=  . '<li>' . $errorMessage . '</li>';
			}
		}

		return $code;
	}
}

?>
