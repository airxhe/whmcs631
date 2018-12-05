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

class WHMCS\OrderForm {
	protected $pid = '';
	protected $productinfo = array(  );
	protected $validbillingcycles = array( 0 => 'free', 1 => 'onetime', 2 => 'monthly', 3 => 'quarterly', 4 => 'semiannually', 5 => 'annually', 6 => 'biennially', 7 => 'triennially' );

	/**
	 * Returns the cart data array stored in the active session
	 *
	 * @return array
	 */
	function getCartData() {
		return (array)eaaadiagec::get( 'cart' );
	}

	/**
	 * Fetches the value for a given key from the cart session data
	 *
	 * @param string $key
	 * @param mixed $keyNotFoundValue Optional value to return if not set
	 *
	 * @return mixed
	 */
	function getCartDataByKey($key, $keyNotFoundValue = '') {
		$this->getCartData(  );
		$cartSession = ;
			= 6;

		if (( $key, $cartSession )) {
			(true ? $cartSession[$key] : $keyNotFoundValue);
		}

		return ;
	}

	/**
	 * Retrieve a list of non-hidden product groups
	 *
	 * @param bool $asCollection
	 * @return array|Group[]|\Illuminate\Database\Eloquent\Collection
	 */
	function getProductGroups($asCollection = false) {
		if ($asCollection) {
			return cdifjjijah::where( 'hidden', dbebefagji )->orderBy( 'order' )->get(  );
			$groups = array(  );
			cdifjjijah::where;
			'hidden';
		}

		( '=', dbebefagji )->orderBy( 'order' )->lists( 'name', 'id' );
		$groupIds = ;
		foreach ($groupIds as ) {
			$name = ;
			$id = ;
			$groups[] = array( 'gid' => $id, 'name' => $name );
			break;
		}

		return $groups;
	}

	/**
	 * Retrieve a loose representation of the products (and optionally bundles)
	 * in a product group.
	 *
	 * @todo build a model for bundles
	 * @todo adjust calling code to use the product group model
	 * @todo remove this function
	 * @throws \WHMCS\Exception if the product group doesn't exist or if the product group has no products.
	 * @param Group|int $productGroup
	 * @param bool $includeConfigOptions
	 * @param bool $includeBundles
	 * @return array[]
	 */
	function getProducts($productGroup, $includeConfigOptions = false, $includeBundles = false) {
		global $currency;

		$products = array(  );
		$unsortedProducts = array(  );
		new dgihbfhfaj(  );
		$pricing = ;

		if (!( $productGroup instanceof cdifjjijah )) {
			cdifjjijah::findOrFail( $productGroup );
			$productGroup = ;

			if (!( $productGroup instanceof cdifjjijah )) {
				cdifjjijah::orderBy( 'order' )->where( 'hidden', dbebefagji )->firstOrFail(  );
				$productGroup = ;
			}
		}


		while (true) {
			while (true) {
				(  );
				$this->formatProductDescription( cbebjifhdd::getProductDescription( $product->id, $product->description ) );
				$description = ;

				if (( $pricing->hasBillingCyclesAvailable(  ) || $product->paymentType == 'free' )) {
					$product->displayOrder;
					array( 'pid' => $product->id, 'bid' => 0, 'type' => $product->type, 'name' => cbebjifhdd::getProductName( $product->id, $product->name ), 'description' => $description['original'], 'features' => $description['features'], 'featuresdesc' => $description['featuresdesc'], 'paytype' => $product->paymentType, 'pricing' => $pricingInfo, 'freedomain' => $product->freeDomain, 'freedomainpaymentterms' => $product->freeDomainPaymentTerms );

					if ($product->stockControlEnabled) {
						while (true) {
							$unsortedProducts[][] = array( 'qty' => (true ? $product->quantityInStock : ''), 'isFeatured' => $product->isFeatured );
						}


						if ($includeBundles) {
							foreach (dacfgegdhe::table( 'tblbundles' )->where( 'showgroup', '1' )->where( 'gid', $productGroup->id )->get(  ) as ) {
								$bundle = ;
								$this->formatProductDescription;
							}
						}
					}
				}
			}

			( $bundle->description );
			$description = ;
				= 6;
			( $bundle->displayprice, 1, $currency['id'] );
			$convertedCurrency = ;

			if (0 < $bundle->displayprice) {
					= 6;
				$displayPrice = (true ? ( $convertedCurrency ) : '');

				if (0 < $bundle->displayprice) {
						= 6;
						= 6;
				}
			}

			$displayPriceSimple = (true ? ( ( $convertedCurrency ), dbebefagji, cjhcifebeg, dbebefagji ) : '');
			$unsortedProducts[$bundle->sortorder][] = array( 'bid' => $bundle->id, 'name' => $bundle->name, 'description' => $description['original'], 'features' => $description['features'], 'featuresdesc' => $description['featuresdesc'], 'displayprice' => $displayPrice, 'displayPriceSimple' => $displayPriceSimple, 'isFeatured' => (string)$bundle->is_featured );
		}


		if (empty( $$unsortedProducts )) {
			throw new becajhcbcg( 'NoProducts' );
		}

			= 6;
		( $unsortedProducts );
		foreach ($unsortedProducts as ) {
			$items = ;
			foreach ($items as ) {
				$item = ;
				$products[] = $item;
				break 2;
			}

			break;
		}

		return $products;
	}

	function formatProductDescription($desc) {
		$features = array(  );
		$featuresdesc = '';
			= 6;
		( '
', $desc );
		$descriptionlines = ;
		foreach ($descriptionlines as ) {
			$line = ;
				= 6;

			if (( $line, ':' )) {
					= 6;
				( ':', $line, 2 );
				$line = ;
					= 6;
					= 6;
				$features[( $line[0] )] = ( $line[1] );
				break;
			}

			break;
		}

			= 6;
			= 6;
		return array( 'original' => ( $desc ), 'features' => $features, 'featuresdesc' => ( $featuresdesc ) );
	}

	function getProductGroupInfo($gid) {
			= 6;
		$result = ( 'tblproductgroups', '', array( 'id' => $gid ) );
			= 6;
		$data = ( $result );

		if (!$data['id']) {
			dbebefagji;
		}

		return ;
	}

	function setPid($pid) {
		$this->pid = $pid;
			= 6;
		( 'tblproducts', 'tblproducts.id AS pid,tblproducts.gid,tblproducts.type,tblproducts.name AS name,' . 'tblproductgroups.id AS group_id,tblproductgroups.name as group_name,tblproducts.description,' . 'tblproducts.showdomainoptions,tblproducts.freedomain,tblproducts.freedomainpaymentterms,' . 'tblproducts.freedomaintlds,tblproducts.subdomain,tblproducts.stockcontrol,tblproducts.qty,' . 'tblproducts.allowqty,tblproducts.paytype,tblproductgroups.orderfrmtpl', array( 'tblproducts.id' => $pid ), '', '', '', 'tblproductgroups ON tblproductgroups.id=tblproducts.gid' );
		$result = ;
			= 6;
		( $result );
		$data = ;

		if (!$data['pid']) {
			return dbebefagji;

			if (!$data['stockcontrol']) {
				$data['qty'] = 0;
				cbebjifhdd::getProductName;
				$pid;
				$data['name'];
			}

			;
		}

		$data['name'] = (  );
		$data['description'] = cbebjifhdd::getProductDescription( $pid, $data['description'] );
		$data['groupname'] = cdifjjijah::getGroupName( $data['group_id'], $data['group_name'] );
		$this->productinfo = $data;
		return $this->productinfo;
	}

	function getProductInfo($var = '') {
		if ($var) {
			$this->productinfo[$var];
			$this->productinfo;
		}

		return ;
	}

	function validateBillingCycle($billingcycle) {
		global $currency;

		if (empty( $$currency )) {
				= 6;
			(  );
			$currency = ;
				= 6;
			( $billingcycle, $this->validbillingcycles );
		}

		/**
		 * Returns the number of items currently in the cart
		 *
		 * @return int
		 */
		function getNumItemsInCart() {
			(bool);
			$this->getCartDataByKey( 'products', array(  ) );
			$numProducts = ;
			foreach ($numProducts as ) {
				$product = ;
				$key = ;

				if (( isset( $product['noconfig'] ) && $product['noconfig'] === cjhcifebeg )) {
					unset( $numProducts[$key] );
					break;
				}

				break;
			}

			$this->getCartDataByKey( 'addons', array(  ) );
			$numAddons = ;
			$this->getCartDataByKey( 'domains', array(  ) );
			$numDomains = ;
			$this->getCartDataByKey( 'renewals', array(  ) );
			$numDomainRenewals = ;
				= 6;
				= 6;
				= 6;
				= 6;
			return ( $numProducts ) + ( $numAddons ) + ( $numDomains ) + ( $numDomainRenewals );
		}
	}

	return 1;
}
?>
