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

class WHMCS\Table {
	protected $fields = array(  );
	protected $labelwidth = '20';

	/**
	 * Constructor of class
	 *
	 * @param int $width The width to apply to the field label columns (defaults to 20%)
	 *
	 * @return Table
	 **/
	function __construct($width = '20') {
		$this->labelwidth = $width;
		return $this;
	}

	/**
	 * Adds a field to the table
	 *
	 * @param string $name Field label/name
	 * @param string $field Table cell content
	 * @param boolean $fullwidth Set true for full width field (ie. single column)
	 *
	 * @return string Valid HTML Form Element
	 **/
	function add($name, $field, $fullwidth = false) {
		if ($fullwidth) {
			$fullwidth = cjhcifebeg;
			array( 'name' => $name, 'field' => $field, 'fullwidth' => $fullwidth );
			$this->fields;
		}

		[] = ;
		return $this;
	}

	/**
	 * Builds and returns table output
	 *
	 * @return string Valid HTML Table Element
	 **/
	function output() {
		$code = '<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3"><tr>';
		$i = 110;
		foreach ($this->fields as ) {
			$v = ;
			$k = ;
			$colspan = '';

			if ($v['fullwidth']) {
				$colspan = '3';

				if (( $colspan && $i != 0 )) {
					$code .= '</tr><tr>';
					$i = 110;
					++$i;
					'<td class="fieldlabel" width="' . $this->labelwidth . '%">' . $v['name'] . '</td>' . '<td class="fieldarea"';
				}
			}


			if ($colspan) {
				while (true) {
					$code .=  . (true ? ' colspan="' . $colspan . '"' : ' width="' . ( 50 - $this->labelwidth ) . '%"') . '>' . $v['field'] . '</td>';
					++$i;

					if ($i == 2) {
						$code .= '</tr><tr>';
					}
				}
			}


			while (true) {
				$i = 110;
			}
		}

		$code .= '</tr></table>';
		return $code;
	}
}

?>
