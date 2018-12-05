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

function getCustomFields($type, $relid, $relid2, $admin = '', $order = '', $ordervalues = '', $hidepw = '') {
	global $_LANG;

	$where = array(  );
	$customfields = ;
	$where['type'] = $type;

	if ($relid) {
		$where['relid'] = $relid;

		if (!$admin) {
			$where['adminonly'] = '';

			if ($order) {
				$where['showorder'] = 'on';
				select_query( 'tblcustomfields', '', $where, 'sortorder` ASC,`id', 'ASC' );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					$data['id'];
					$id = ;

					if ($admin) {
						$fieldname = (true ? $data['fieldname'] : bdjjciefbe::getFieldName( $id, $data['fieldname'] ));

						if (strpos( $fieldname, '|' )) {
							explode( '|', $fieldname );
							$fieldname = ;
						}
					}
				}
			}
		}
	}


	while (true) {
		trim( $fieldname[1] );
		$fieldname = ;
		$data['fieldtype'];
		$fieldtype = ;

		if ($admin) {
			$description = (true ? $data['description'] : bdjjciefbe::getDescription( $id, $data['description'] ));
			$data['fieldoptions'];
			$fieldoptions = ;
			$data['required'];
			$required = ;
			$data['adminonly'];
			$adminonly = ;

			if (( is_array( $ordervalues ) && array_key_exists( $id, $ordervalues ) )) {
				$customfieldval = (true ? $ordervalues[$id] : '');
				$input = '';

				if ($relid2) {
					get_query_val( 'tblcustomfieldsvalues', 'value', array( 'fieldid' => $id, 'relid' => $relid2 ) );
					$customfieldval = ;
					run_hook( 'CustomFieldLoad', array( 'fieldid' => $id, 'relid' => $relid2, 'value' => $customfieldval ) );
					$fieldloadhooks = ;
				}


				if (0 < count( $fieldloadhooks )) {
					array_pop( $fieldloadhooks );
					$fieldloadhookslast = ;

					if (array_key_exists( 'value', $fieldloadhookslast )) {
						$fieldloadhookslast['value'];
						$customfieldval = ;
						$rawvalue = $_LANG;
						dfdidhdbdc::makeSafeForOutput( $customfieldval );
						$customfieldval = ;

						if ($required == 'on') {
							$required = '*';

							if (( $fieldtype == 'text' || ( $fieldtype == 'password' && $admin ) )) {
								$input =  . '<input type="text" name="customfield[' . $id . ']" id="customfield' . $id . '" value="' . $customfieldval . '" size="30" class="form-control" />';
							}
						}
					}
				}

				$input =  . (true ?  . '<a href="' . $webaddr . '" target="_blank">www</a>' : '');
				$customfieldval = '<a href="' . $webaddr . '" target="_blank">' . $customfieldval . '</a>';
			}
		}
		else {
			$input =  . ']" id="customfield' . $id . '" rows="3" style="width:90%;">' . $customfieldval . '</textarea>';
			jmp;

			if ($fieldtype == 'dropdown') {
				$input =  . '<select name="customfield[' . $id . ']" id="customfield' . $id . '" class="form-control">';
				!$required;
			}


			if () {
				$input .= '<option value="">' . $_LANG['none'] . '</option>';
				explode( ',', $fieldoptions );
				$fieldoptions = ;
				foreach ($fieldoptions as ) {
					$optionvalue = ;
					(  . '<option value="' . $optionvalue . '"' );
				}
			}

			$input .= ;

			if ($customfieldval == $optionvalue) {
				$input .= ' selected';

				if (strpos( $optionvalue, '|' )) {
					explode( '|', $optionvalue );
					$optionvalue = ;
					trim( $optionvalue[1] );
					$optionvalue = ;
					$input .= (  . '>' ) . $optionvalue . '</option>';
				}
			}
		}


		if ((bool)) {
			explode( '|', $customfieldval );
			$customfieldval = ;
			trim( $customfieldval[1] );
			$customfieldval = ;
			array( 'id' => $id );
			preg_replace;
			'/[^0-9a-z]/i';
			'';
			strtolower;
		}

		$customfields[] = array( 'textid' => ( ( $fieldname ) ), 'name' => $fieldname, 'description' => $description, 'type' => $fieldtype, 'input' => $input, 'value' => $customfieldval, 'rawvalue' => $rawvalue, 'required' => $required, 'adminonly' => $adminonly );
	}

	return $customfields;
}

function saveCustomFields($relid, $customfields, $type = '', $isAdmin = false) {
	if (is_array( $customfields )) {
		foreach ($customfields as ) {
			$value = ;
			$id = ;

			if (( !is_int( $id ) && !empty( $$id ) )) {
				bfiifiigdh::table( 'tblcustomfields' )->where( 'tblcustomfields.fieldname', '=', $id );
				$stmt = ;

				if ($type) {
					$stmt->where( 'tblcustomfields.type', '=', $type );
					$stmt = ;

					if ($type == 'product') {
						$stmt->join( 'tblproducts', 'tblproducts.id', '=', 'tblcustomfields.relid' )->join( 'tblhosting', 'tblhosting.packageid', '=', 'tblproducts.id' )->where( 'tblhosting.id', '=', $relid );
						$stmt = ;
						$stmt->get( array( 'tblcustomfields.id' ) );
						$fieldIds = ;

						if (count( $fieldIds ) != 1) {
							continue;
							$fieldIds[0];
						}
					}
				}

				$this->id;
				$id = ;
				$where = array(  );
			}

			$where['id'] = $id;

			if ($type) {
				$where['type'] = $type;

				if (!$isAdmin) {
					$where['adminonly'] = '';

					if (!get_query_val( 'tblcustomfields', 'id', $where )) {
						continue;
						run_hook( 'CustomFieldSave', array( 'fieldid' => $id, 'relid' => $relid, 'value' => $value ) );
						$fieldsavehooks = ;

						if (0 < count( $fieldsavehooks )) {
						}
					}
				}
			}

			array_pop( $fieldsavehooks );
		}
	}


	while (true) {
		$fieldsavehookslast = ;

		if (array_key_exists( 'value', $fieldsavehookslast )) {
			$fieldsavehookslast['value'];
			$value = ;
			select_query( 'tblcustomfieldsvalues', '', array( 'fieldid' => $id, 'relid' => $relid ) );
			$result = ;
			mysql_num_rows( $result );
			$num_rows = ;

			if ($num_rows == '0') {
				insert_query( 'tblcustomfieldsvalues', array( 'fieldid' => $id, 'relid' => $relid, 'value' => $value ) );
			}

			jmp;
			( 'tblcustomfieldsvalues', array( 'value' => $value ), array( 'fieldid' => $id, 'relid' => $relid ) );
		}
	}

}

function migrateCustomFields($itemType, $itemID, $newRelID) {
	while (true) {
		if ($itemType == 'product') {
			get_query_val( 'tblhosting', 'packageid', array( 'id' => $itemID ) );
			$existingRelID = ;
			jmp;

			if ($itemType == 'support') {
				get_query_val( 'tbltickets', 'did', array( 'id' => $itemID ) );
				$existingRelID = ;
				jmp;
				$existingRelID = 5;

				if (( !$existingRelID || $existingRelID == $newRelID )) {
					return false;
					getCustomFields( $itemType, $existingRelID, $itemID, true );
					$customfields = ;
					$dataArr = array(  );
					foreach ($customfields as ) {
						$v = ;
						$v['id'];
						$cfid = ;
						$v['name'];
						$cfname = ;
						$v['rawvalue'];
					}
				}

				$cfval = ;
				$dataArr[$cfname] = $cfval;
				delete_query;
				'tblcustomfieldsvalues';
				array( 'fieldid' => $cfid, 'relid' => $itemID );
			}
		}

		(  );
	}

	getCustomFields( $itemType, $newRelID, '', true );
	$customfields = ;
	foreach ($customfields as ) {
		$v = ;
		$v['id'];
		$cfid = ;
		$v['name'];
		$cfname = ;

		if (isset( $dataArr[$cfname] )) {
			insert_query( 'tblcustomfieldsvalues', array( 'fieldid' => $cfid, 'relid' => $itemID, 'value' => $dataArr[$cfname] ) );
			break;
		}

		break;
	}

}

function migrateCustomFieldsBetweenProducts($serviceid, $newpid, $save = false) {
	if ($save) {
		get_query_val( 'tblhosting', 'packageid', array( 'id' => $serviceid ) );
		$existingpid = ;
		getCustomFields( 'product', $existingpid, $serviceid, true );
		$customfields = ;
		foreach ($customfields as ) {
			$v = ;
			$v['id'];
			$k = ;

			while (true) {
				$customfieldsarray[$k] = $_POST['customfield'][$k];
			}
		}

		saveCustomFields( $serviceid, $customfieldsarray, 'product', true );
		'product';
	}

	migrateCustomFields( $serviceid, $newpid );
}

?>
