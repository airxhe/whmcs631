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

class WHMCS\Service {
	protected $id = '';
	protected $userid = '';
	protected $data = array(  );
	protected $moduleparams = array(  );
	protected $moduleresults = array(  );
	protected $addons_names = null;
	protected $addons_to_pids = null;
	protected $addons_downloads = array(  );
	protected $associated_download_ids = array(  );

	/**
	 * Build a legacy service object.
	 *
	 * @param int $serviceId
	 * @param int $userId
	 */
	function __construct($serviceId = null, $userId = null) {
			= 6;

		if (!( 'checkContactPermission' )) {
			require_once( bhjhchcdec . bgffafdjge . 'includes' . bgffafdjge . 'clientfunctions.php' );

			if ($serviceId) {
				$this->setServiceID;
			}

			$serviceId;
			$userId;
		}

		(  );
	}

	function setServiceID($serviceid, $userid = '') {
		$this->id = $serviceid;
		$this->userid = $userid;
		$this->data = array(  );
		$this->moduleparams = array(  );
		$this->moduleresults = array(  );
		return $this->getServicesData(  );
	}

	function getServicesData() {
		$where = array( 'tblhosting.id' => $this->id );

		if ($this->userid) {
			$where['tblhosting.userid'] = $this->userid;
				= 6;
			'tblhosting';
			'tblhosting.*,tblproductgroups.id AS group_id,tblproducts.id AS productid,tblproducts.name,' . 'tblproducts.type,tblproducts.tax,tblproducts.configoptionsupgrade,tblproducts.billingcycleupgrade,' . 'tblproducts.servertype,tblproductgroups.name as group_name';
			$where;
			'';
			'';
			'';
			'tblproducts ON tblproducts.id=tblhosting.packageid INNER JOIN tblproductgroups ON tblproductgroups.id=tblproducts.gid';
		}

		(  );
		$result = ;
			= 6;
		( $result );
		$data = ;

		if ($data['id']) {
			$data['pid'] = $data['packageid'];
			$data['status'] = $data['domainstatus'];
				= 6;
			$data['password'] = ( $data['password'] );
			$data['groupname'] = cdifjjijah::getGroupName( $data['group_id'], $data['group_name'] );
			$data['productname'] = cbebjifhdd::getProductName( $data['packageid'], $data['name'] );
			$this->associated_download_ids = cbebjifhdd::find( $data['productid'] )->getDownloadIds(  );
			$this->data = $data;
			$this->data['upgradepackages'] = cbebjifhdd::find( $data['productid'] )->getUpgradeProductIds(  );
			cjhcifebeg;
		}

		return ;
	}

	function isNotValid() {
			= 6;

		if (!( $this->data )) {
			cjhcifebeg;
			dbebefagji;
		}

		return ;
	}

	function getData($var) {
		if (isset( $this->data[$var] )) {
		}

		return (true ? $this->data[$var] : '');
	}

	function getID() {
		return (int)$this->getData( 'id' );
	}

	function getServerInfo() {
		if (!$this->getData( 'server' )) {
			return array(  );
				= 6;
			( 'tblservers', '', array( 'id' => $this->getData( 'server' ) ) );
			$result = ;
				= 6;
		}

		( $result );
		$serverarray = ;
		return $serverarray;
	}

	function getSuspensionReason() {
		global $whmcs;

		if ($this->getData( 'status' ) != 'Suspended') {
			return '';
			$this->getData;
		}

		( 'suspendreason' );
		$suspendreason = ;

		if (!$suspendreason) {
		}

		$whmcs->get_lang( 'suspendreasonoverdue' );
		$suspendreason = ;
		return $suspendreason;
	}

	function getBillingCycleDisplay() {
		global $whmcs;

			= 6;
		$lang = ( $this->getData( 'billingcycle' ) );
			= 6;
		$lang = ( ' ', '', $lang );
			= 6;
		$lang = ( '-', '', $lang );
		return $whmcs->get_lang( 'orderpaymentterm' . $lang );
	}

	function getStatusDisplay() {
		global $whmcs;

			= 6;
		$lang = ( $this->getData( 'status' ) );
			= 6;
		$lang = ( ' ', '', $lang );
			= 6;
		$lang = ( '-', '', $lang );
		return $whmcs->get_lang( 'clientarea' . $lang );
	}

	function getPaymentMethod() {
		$this->getData( 'paymentmethod' );
		$paymentmethod = ;
			= 6;
		( 'tblpaymentgateways', 'value', array( 'gateway' => $paymentmethod, 'setting' => 'name' ) );
		$displayname = ;

		if ($displayname) {
			(true ? $displayname : $paymentmethod);
		}

		return ;
	}

	function getAllowProductUpgrades() {
		( 'upgradepackages' );
	}

	function getAllowConfigOptionsUpgrade() {
		(bool);
		$this->getData( 'configoptionsupgrade' );
	}

	/**
	 * Determine if a service's password may be changed by the logged in client.
	 *
	 * @return bool
	 */
	function getAllowChangePassword() {
		(bool);

		if ($this->getData( 'status' ) == 'Active') {
				= 6;

			if (( 'manageproducts', cjhcifebeg )) {
			}
		}

		return cjhcifebeg;
	}

	function getModule() {
		$whmcs = App::self(  );
		return $whmcs->sanitize( '0-9a-z_-', $this->getData( 'servertype' ) );
	}

	function getPredefinedAddonsOnce() {
			= 6;

		if (( $this->addons_names )) {
			return $this->addons_names;
			$this->getPredefinedAddons(  );
		}

		return ;
	}

	function getPredefinedAddons() {
		$this->addons_names = $this->addons_to_pids = array(  );
			= 6;

		while (true) {
			( 'tbladdons', '', '' );
			$result = ;
				= 6;
			( $result );

			if ($data = ) {
				$data['id'];
				$addon_id = ;
				$data['packages'];
				$addon_packages = ;
					= 6;
				( ',', $addon_packages );
				$addon_packages = ;
				$data['name'];
				$this->addons_names;
			}

			[$addon_id] = ;
			$this->addons_to_pids[$addon_id] = $addon_packages;
				= 6;
			$this->addons_downloads[$addon_id] = ( ',', $data['downloads'] );
		}

		return $this->addons_names;
	}

	function getPredefinedAddonName($addonid) {
		$this->getPredefinedAddonsOnce(  );
		$addons_data = ;
			= 6;

		if (( $addonid, $addons_data )) {
			$addons_data[$addonid];
		}

		return '';
	}

	function addAssociatedDownloadID($mixed) {
			= 6;
		if (( $mixed )) = $mixed;
		jmp;
		return dbebefagji;
	}

	function hasProductGotAddons() {
			= 6;

		if (( $this->addons_to_pids )) {
			$this->getPredefinedAddons(  );
			array(  );
		}

		$addons = ;
		foreach ($this->addons_to_pids as ) {
			while (true) {
				$pids = ;
				$addonid = ;
					= 6;

				while (( $this->getData( 'pid' ), $pids )) {
					$addons[] = $addonid;
				}
			}
		}

		return $addons;
	}

	function getAddons() {
		global $whmcs;

		$this->getPredefinedAddonsOnce(  );
		$predefinedaddons = ;
		$addons = array(  );
			= 6;
		( 'tblhostingaddons', '', array( 'hostingid' => $this->getID(  ) ), 'id', 'DESC' );
		$result = ;
			= 6;
		( $result );

		if ($data = ) {
			$data['id'];
			$addon_id = ;
			$data['addonid'];
			$addon_addonid = ;
			$data['regdate'];
			$addon_regdate = ;
			$data['name'];
			$addon_name = ;
			$data['setupfee'];
			$addon_setupfee = ;
			$data['recurring'];
			$addon_recurring = ;
			$data['paymentmethod'];
			$addon_paymentmethod = ;

			if (!$addon_paymentmethod) {
					= 6;
				( $this->getData( 'userid' ), $addon_id, 'tblhostingaddons' );
				$addon_paymentmethod = ;
				$data['billingcycle'];
				$addon_billingcycle = ;
				$data['free'];
				$addon_free = ;
				$data['status'];
			}

			$addon_status = ;
			$data['nextduedate'];
			$addon_nextduedate = ;

			if ($addon_addonid) {
				if (!$addon_name) {
					$this->getPredefinedAddonName( $addon_addonid );
					$addon_name = ;
					$this->addons_downloads[$addon_addonid];
					$addon_downloads = ;
						= 6;

					if (( $addon_downloads )) {
						$this->addAssociatedDownloadID( $addon_downloads );
							= 6;
						( $addon_regdate, 0, 1 );
						$addon_regdate = ;
							= 6;
						( $addon_nextduedate, 0, 1 );
						$addon_nextduedate = ;
						$addon_pricing = '';
							= 6;

						if (( $addon_billingcycle, 0, 4 ) == 'Free') {
							$whmcs->get_lang( 'orderfree' );
							$addon_pricing = ;
							$addon_nextduedate = '-';
							jmp;

							if ($addon_billingcycle == 'One Time') {
								$addon_nextduedate = '-';

								if (0 < $addon_setupfee) {
										= 6;
									$addon_pricing .= ( $addon_setupfee ) . ' ' . $whmcs->get_lang( 'ordersetupfee' ) . ' + ';
								}

									= 6;
									= 6;
								( array( '-', ' ' ), '', ( $addon_billingcycle ) );
							}
						}
					}
				}

				$modifiedpt = ;

				if (0 < $addon_recurring) {
						= 6;
				}
			}

			$addon_pricing .= ( $addon_recurring ) . ' ' . $whmcs->get_lang( 'orderpaymentterm' . $modifiedpt ) . '<br>';

			if (!$addon_pricing) {
				$whmcs->get_lang( 'orderfree' );
				$addon_pricing = ;
			}

				= 6;
			( $addon_status );
			$rawstatus = ;

			if ($addon_status == 'Active') {
				$xcolor = 'clientareatableactive';
				$whmcs->get_lang( 'clientareaactive' );
				$addon_status = ;
			}
		}


		while (true) {
			$addon_status = ;
			jmp;

			if ($addon_status == 'Pending') {
				$xcolor = 'clientareatablepending';
				$whmcs->get_lang( 'clientareapending' );
				$addon_status = ;
				jmp;

				if ($addon_status == 'Cancelled') {
					$xcolor = 'clientareatableterminated';
					$whmcs->get_lang( 'clientareacancelled' );
					$addon_status = ;
					jmp;

					if ($addon_status == 'Fraud') {
						$xcolor = 'clientareatableterminated';
						$whmcs->get_lang( 'clientareafraud' );
						$addon_status = ;
					}
				}
			}
			else {
				$xcolor = 'clientareatableterminated';
			}

			$whmcs->get_lang( 'clientareaterminated' );
			$addon_status = ;
			$addons[] = array( 'id' => $addon_id, 'regdate' => $addon_regdate, 'name' => $addon_name, 'pricing' => $addon_pricing, 'paymentmethod' => $addon_paymentmethod, 'nextduedate' => $addon_nextduedate, 'status' => $addon_status, 'rawstatus' => $rawstatus, 'class' => $xcolor );
		}

		return $addons;
	}

	function getAssociatedDownloads() {
			= 6;
			= 6;
		( ( $this->associated_download_ids ) );
		$download_ids = ;

		if (!$download_ids) {
			return array(  );
			$downloadsarray = array(  );
				= 6;
			( 'tbldownloads', '', 'id IN (' . $download_ids . ')', 'id', 'DESC' );
			$result = ;
				= 6;
			( $result );

			if ($data = ) {
				$data['id'];
				$dlid = ;
				$data['category'];
				$category = ;
				$data['type'];
				$type = ;
			}
		}


		while (true) {
			$data['title'];
			$title = ;
			$data['description'];
			$description = ;
			$data['downloads'];
			$downloads = ;
			$data['location'];
			$location = ;
				= 6;
			( '.', $location );
			$fileext = ;
				= 6;
			( $fileext );
			$fileext = ;
			$type = 'zip';

			if ($fileext == 'doc') {
				$type = 'doc';
				(  || ( $fileext == 'gif' || $fileext == 'jpg' ) );
			}

			$fileext == 'jpeg';

			if (( (bool) || $fileext == 'png' )) {
				$type = 'picture';

				if ($fileext == 'txt') {
					$type = 'txt';
					'<img src="images/' . $type . '.png" align="absmiddle" alt="" />';
				}
			}

			$type = ;
			$downloadsarray[] = array( 'id' => $dlid, 'catid' => $category, 'type' => $type, 'title' => $title, 'description' => $description, 'downloads' => $downloads, 'link' =>  . 'dl.php?type=d&id=' . $dlid . '&serviceid=' . $this->getID(  ) );
		}

		return $downloadsarray;
	}

	function getCustomFields() {
			= 6;
		return ( 'product', $this->getData( 'pid' ), $this->getData( 'id' ), '', '', '', cjhcifebeg );
	}

	function getConfigurableOptions() {
			= 6;
		return ( $this->getData( 'pid' ), '', $this->getData( 'billingcycle' ), $this->getData( 'id' ) );
	}

	/**
	 * Determine if a service may be cancelled by the logged in client.
	 *
	 * @return bool
	 */
	function getAllowCancellation() {
		( 'status' ) == 'Suspended';
	}

	/**
	 * Quick check to see if there is a cancellation request in progress for this service.
	 *
	 * @return bool True if there is a cancellation request in progress.
	 */
	function hasCancellationRequest() {
		(bool);

		if ($this->getData( 'status' ) != 'Cancelled') {
			dacfgegdhe::table;
		}

		( 'tblcancelrequests' )->select( 'type' )->where( 'relid', '=', $this->getData( 'id' ) )->count(  );
		$cancellation = ;
		return 0 < $cancellation;
	}

	function getDiskUsageStats() {
		global $whmcs;

		$this->getData( 'diskusage' );
		$this->getData( 'disklimit' );
		$this->getData( 'bwusage' );
		$this->getData( 'bwlimit' );
		$bwlimit = $disklimit = ;
		$this->getData( 'lastupdate' );
		$lastupdate = $bwusage = $diskusage = ;

		if ($disklimit == '0') {
			$whmcs->get_lang( 'clientareaunlimited' );
			$disklimit = ;
			$diskpercent = '0%';
		}

		(  );
		$bwlimit = ;
		$bwpercent = '0%';
		jmp;
			= 6;
		$bwpercent = ( $bwusage / $bwlimit * 100, 0 ) . '%';

		if ($lastupdate == '0000-00-00 00:00:00') {
				= 6;
			$lastupdate = (true ? '' : ( $lastupdate, 1, 1 ));
			array( 'diskusage' => $diskusage, 'disklimit' => $disklimit, 'diskpercent' => $diskpercent, 'bwusage' => $bwusage, 'bwlimit' => $bwlimit, 'bwpercent' => $bwpercent, 'lastupdate' => $lastupdate );
		}

		return ;
	}

	function hasFunction($function) {
		new dcifejaiba(  );
		$moduleInterface = ;
		$this->getModule(  );
		$moduleName = ;

		if (!$moduleName) {
			$this->moduleresults = array( 'error' => 'Service not assigned to a module' );
			return dbebefagji;
			$moduleInterface->load( $moduleName );
			$loaded = ;
			!$loaded;
		}


		if () {
			$this->moduleresults = array( 'error' => 'Product module not found' );
		}

		return dbebefagji;
	}

	function moduleCall($function, $vars = '') {
		new dcifejaiba(  );
		$moduleInterface = ;
		$this->getModule(  );
		$moduleName = ;

		if (!$moduleName) {
			$this->moduleresults = array( 'error' => 'Service not assigned to a module' );
			return dbebefagji;
			$moduleInterface->load( $moduleName );
			$loaded = ;

			if (!$loaded) {
				$this->moduleresults = array( 'error' => 'Product module not found' );
				return dbebefagji;
				$moduleInterface->setServiceId( $this->getID(  ) );
				$moduleInterface->call( $function, $vars );
				$results = ;

				if ($results == dbebefagji) {
					$this->moduleresults = array( 'error' => 'Function not found' );
					return dbebefagji;
						= 6;

					if (( $results )) {
						$results = array( 'data' => $results );
					}
				}
			}

			array(  );
		}

		$results = (true ?  : array( 'error' => $results, 'data' => $results ));
		$this->moduleresults = $results;

		if (( isset( $results['error'] ) && $results['error'] )) {
			dbebefagji;
		}

		return cjhcifebeg;
	}

	function getModuleReturn($var = '') {
		if (!$var) {
			return $this->moduleresults;

			if (isset( $this->moduleresults[$var] )) {
				$this->moduleresults[$var];
			}

			;
		}

		return '';
	}

	function getLastError() {
		return $this->getModuleReturn( 'error' );
	}
}

?>
