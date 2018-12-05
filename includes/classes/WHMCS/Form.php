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

class WHMCS\Form {
	protected $frmname = '';

	/**
	 * Constructor of class
	 *
	 * @param string $name Form name
	 *
	 * @return Form
	 */
	function __construct($name = 'frm1') {
		$this->name( $name );
		return $this;
	}

	/**
	 * Function to set form name used to handle multiple forms on the same page
	 *
	 * @param string $name Form name
	 *
	 * @return Form
	 */
	function name($name) {
		$this->frmname = $name;
		return $this;
	}

	function getname() {
		return $this->frmname;
	}

	/**
	 * Opens new form for adding elements to, requires closing later
	 *
	 * @param string $url URL to submit to (defaults to PHP_SELF)
	 * @param boolean $files Set true if this form requires file submissions
	 * @param string $target Target for the submission (excluding _ prefix)
	 * @param string $method Form post method eg. post, get (defaults to post)
	 * @param boolean $nosubmitvar Set true to not include hidden input used in form submission check
	 *
	 * @return string Valid HTML Form Element
	 */
	function form($url = '', $files = false, $target = '', $method = 'post', $nosubmitvar = false) {
		if (!$url) {
			$_SERVER;
		}

		['PHP_SELF'];
		$url = ;
		$code = '<form method="' . $method . '" action="' . $url . '" name="' . $this->frmname . '" id="' . $this->frmname . '"';

		if ($files) {
			$code .= ' enctype="multipart/form-data"';

			if ($target) {
			}
		}

		$code .= ' target="_' . $target . '"';
		$code .= '>';

		if (!$nosubmitvar) {
		}

		$this->hidden( '__fp' . $this->frmname, '1' );
		$code .= ;
		return $code;
	}

	/**
	 * Validates form submission by checking for hidden input field and validating token
	 *
	 * @param boolean $skiptoken Set true to skip token checking for this form submission
	 *
	 * @return boolean form submit true/false
	 */
	function issubmitted($skiptoken = false) {
		if (isset( $_POST['__fp' . $this->frmname] )) {
		}


		if (!$skiptoken) {
				= 6;
			(  );
			return cjhcifebeg;
			dbebefagji;
		}

		return ;
	}

	/**
	 * Generates a text input field
	 *
	 * @param string $name Field name
	 * @param string $value Optional default field value
	 * @param int $size Width of the field (defaults to 30)
	 * @param boolean $disabled Set true to disable
	 * @param string $class Optional class name to apply
	 * @param string $type Optional field type attribute
	 *
	 * @return string Valid HTML Form Element
	 */
	function text($name, $value = '', $size = 30, $disabled = false, $class = '', $type = 'text') {
		$code = '<input type="' . $type . '" name="' . $name . '" value="' . $value . '" size="' . $size . '"';

		if ($disabled) {
			$code .= ' disabled="disabled"';

			if ($class) {
				' class="' . $class;
			}
		}

		$code .=  . '"';
		$code .= ' />';
		return $code;
	}

	/**
	 * Generates a password input field
	 *
	 * @param string $name Field name
	 * @param string $value Optional default field value
	 * @param int $size Width of the field (defaults to 30)
	 * @param boolean $disabled Set true to disable
	 * @param string $class The class for the field
	 *
	 * @return string Valid HTML Form Element
	 */
	function password($name, $value = '', $size = 30, $disabled = false, $class = '') {
		return $this->text( $name, $value, $size, $disabled, $class, 'password' );
	}

	/**
	 * Generates a date text input field
	 *
	 * @param string $name Field name
	 * @param string $value Optional default field value
	 * @param int $size Width of the field (defaults to 12)
	 * @param boolean $disabled Set true to disable
	 * @param string $class The class for the field - defaults to datepick
	 *
	 * @return string Valid HTML Form Element
	 */
	function date($name, $value = '', $size = 12, $disabled = false, $class = 'datepick') {
		return $this->text( $name, $value, $size, $disabled, $class );
	}

	/**
	 * Generates a textarea input field
	 *
	 * @param string $name Field name
	 * @param string $value Optional default field value
	 * @param int $rows Number of rows (defaults to 3)
	 * @param int $cols Number of columns (defaults to 50) supports fixed or percentage
	 * @param string $class The class to assign to the textarea.
	 *
	 * @return string Valid HTML Form Element
	 */
	function textarea($name, $value, $rows = 3, $cols = 50, $class = '') {
		$code = '<textarea name="' . $name . '" rows="' . $rows . '"';
			= 6;

		if (( $cols, -1, 1 ) == '%') {
			$code .= ' style="width:' . $cols . '"';
		}

		$code .=  . '"';
		$code .= '>' . $value . '</textarea>';
		return $code;
	}

	/**
	 * Generates a checkbox input field with optional label
	 *
	 * @param string $name Field name
	 * @param string $label Optional label to follow checkbox
	 * @param boolean $checked Set true to check by default
	 * @param string $value Field value when checked (defaults to 1)
	 *
	 * @return string Valid HTML Form Element
	 */
	function checkbox($name, $label = '', $checked = false, $value = '1', $class = '') {
		$code = '';

		if ($label) {
			$code .= '<label class="checkbox-inline">';
			'<input type="checkbox" name="' . $name . '" value="' . $value . '"';

			if ($checked) {
					. (true ? ' checked="checked"' : '');

				if ($class) {
					' class="' . $class;
				}
			}
		}

		$code .=  . (true ?  . '"' : '') . ' />';

		if ($label) {
			' ' . $label . '</label>';
		}

		$code .= ;
		return $code;
	}

	/**
	 * Generates a select dropdown input field
	 *
	 * @param string $name Field name
	 * @param array $values An array of dropdown options
	 * @param string $selected Optionally the default selected value
	 * @param string $onchange Optional onchange js action
	 * @param boolean $anyopt Set true to display any as first option
	 * @param boolean $noneopt Set true to display none as first option
	 * @param int $size Optional size of select field (defaults to 1)
	 * @param string $id Optional id selector name for select field
	 * @param string $cssClass Optional override default css class
	 *
	 * @return string Valid HTML Form Element
	 */
	function dropdown($name, $values = array(  ), $selected = '', $onchange = '', $anyopt = '', $noneopt = '', $size = '1', $id = '', $cssClass = 'form-control select-inline') {
		global $aInt;

		$code = '<select name="' . $name . '"';

		if (1 < $size) {
			$code .= ' size="' . $size . '"';

			if ($onchange) {
				$code .= ' onchange="' . $onchange . '"';

				if ($cssClass) {
					$code .= ' class="' . $cssClass . '"';

					if ($id) {
						$code .= ' id="' . $id . '"';
						$code .= '>';

						if ($anyopt) {
							$code .= '<option value="0">' . $aInt->lang( 'global', 'any' ) . '</option>';

							if ($noneopt) {
								$code .= '<option value="0">' . $aInt->lang( 'global', 'none' ) . '</option>';
									= 6;

								if (( $values )) {
									foreach ($values as ) {
										$v = ;
									}
								}
							}
						}
					}
				}
			}
		}

		$k = ;
		$color = '';
			= 6;

		if (( $v )) {
			$v[0];
			$color = ;
			$v[1];
			$v = ;
			'<option value="' . $k . '"';
			$k == $selected;
		}


		if () {
			if ($color) {
				(true ? ' style="background-color:' . $color . '"' : '');
			}


			while (true) {
				$code .=  . (true ? ' selected="selected"' : '') .  . '>' . $v . '</option>';
			}

			$code .= $cssClass;
		}

		$code .= '</select>';
		return $code;
	}

	/**
	 * Generates a group of radio input fields
	 *
	 * @param string $name Field name
	 * @param array $values An array of radio button options
	 * @param string $selected The option to select by default
	 * @param string $spacer Option spacer (defaults to line break)
	 *
	 * @return string Valid HTML Form Element
	 */
	function radio($name, $values = array(  ), $selected = '', $spacer = '<br />') {
		$code = '';
		foreach ($values as ) {
			$v = ;
			$k = ;

			while (true) {
				'<label class="radio-inline"><input type="radio" name="' . $name . '" value="' . $k . '"';

				if ($k == $selected) {
						. (true ? ' checked="checked"' : '') . ' /> ';
				}

				$code .=  . $v . '</label>' . $spacer;
			}
		}

		return $code;
	}

	/**
	 * Generates a hidden input field
	 *
	 * @param string $name Field name
	 * @param string $value Field value
	 *
	 * @return string Valid HTML Form Element
	 */
	function hidden($name, $value) {
		$code = '<input type="hidden" name="' . $name . '" value="' . $value . '" />';
		return $code;
	}

	/**
	 * Generates a submit button
	 *
	 * @param string $text Button display text
	 * @param string $class Button class (defaults to btn)
	 *
	 * @return string Valid HTML Form Element
	 */
	function submit($text, $class = 'btn btn-primary') {
		$code = '<input type="submit" value="' . $text . '" class="' . $class . '" />';
		return $code;
	}

	/**
	 * Generates a regular button
	 *
	 * @param string $text Button display text
	 * @param string $onclick Optional javascript onclick action
	 * @param string $class Button class (defaults to btn)
	 *
	 * @return string Valid HTML Form Element
	 */
	function button($text, $onclick = '', $class = 'btn btn-default') {
		if ($onclick) {
			(true ? ' onclick="' . $onclick . '"' : '');
		}

		$onclick = ;
		cgjfihaefi::generateCssFriendlyId( 'btn' . $text );
		$buttonIDName = ;
		$code = '<button type="button" class="' . $class . '"' . $onclick . 'id="' . $buttonIDName . '">' . $text . '</button>';
		return $code;
	}

	/**
	 * Generate a button to be used to display a bootstrap modal popup.
	 *
	 * @param string $text - The text to display on the button.
	 * @param string $dataTarget - The modal form to open.
	 * @param string $class - The class of the button defaults to 'btn btn-default'.
	 *
	 * @return string Valid HTML Form Element
	 */
	function modalButton($text, $dataTarget, $class = 'btn btn-default') {
		$buttonCode =  . '<button id=\'btn' . $dataTarget . '\' type=\'button\' class=\'' . $class . '\' data-toggle=\'modal\' data-target=\'#' . $dataTarget . '\'>
    ' . $text . '
</button>';
		return $buttonCode;
	}

	/**
	 * Generates a reset button
	 *
	 * @param string $text Button display text
	 * @param string $class Button class (defaults to btn)
	 *
	 * @return string Valid HTML Form Element
	 */
	function reset($text, $class = 'btn btn-default') {
		$code = '<input type="reset" value="' . $text . '" class="' . $class . '" />';
		return $code;
	}

	function savereset() {
		global $aInt;

		$code = '<p align="center">' . $this->submit( $aInt->lang( 'global', 'savechanges' ), 'btn btn-primary' ) . ' ' . $this->reset( $aInt->lang( 'global', 'cancelchanges' ) ) . '</p>';
		return $code;
	}

	/**
	 * Closes form
	 *
	 * @return string Valid HTML Form Element
	 */
	function close() {
		$code = '</form>';
		return $code;
	}
}

?>
