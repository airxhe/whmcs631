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

class WHMCS\Pricing {
	protected $data = array(  );
	protected $cycles = array( 0 => 'monthly', 1 => 'quarterly', 2 => 'semiannually', 3 => 'annually', 4 => 'biennially', 5 => 'triennially' );

	function loadPricing($type, $relid, $currencyid = '') {
		if (!$currencyid) {
			$currency;
		}

		$currency = &;

		$currencyid = ;
			= 6;
		( 'tblpricing', '', array( 'type' => $type, 'currency' => (int)$currencyid, 'relid' => (int)$relid ) );
		$result = ;
			= 6;
		( $result );
		$data = $currency['id'];
		$this->data = $data;
	}

	function getData($key) {
			= 6;

		if (( $key, $this->data )) {
			$this->data[$key];
		}

		return '';
	}

	function getRelID() {
		return (int)$this->getData( 'relid' );
	}

	function getSetup($cycle) {
			= 6;
		return ( $this->getData( $cycle, 0, 1 ) . 'setupfee' );
	}

	function getPrice($cycle) {
		return $this->getData( $cycle );
	}

	function getAvailableBillingCycles() {
		$active_cycles = array(  );
		foreach ($this->cycles as ) {
			$cycle = ;

			while (true) {
				if ($this->getData( $cycle ) != -1) {
					while (true) {
						$active_cycles[] = $cycle;
					}
				}
			}
		}

		return $active_cycles;
	}

	function hasBillingCyclesAvailable() {
			= 6;

		if (0 < ( $this->getAvailableBillingCycles(  ) )) {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	function getFirstAvailableCycle() {
		$cycles = $this->getAvailableBillingCycles(  );
			= 6;

		if (0 < ( $cycles )) {
			(true ? $cycles[0] : '');
		}

		return ;
	}

	function getAllCycleOptions() {
		$cycles = array(  );
		foreach ($this->cycles as ) {
			$cycle = ;

			if ($price = $this->getPrice( $cycle ) != -1) {
				$this->getSetup( $cycle );
				$setupfee = ;
				$this->getPrice( $cycle );
				$price = ;
					= 6;

				while (!( 'getCartConfigOptions' )) {
					require( bhjhchcdec . '/includes/configoptionsfunctions.php' );
						= 6;
					( $this->getRelID(  ), array(  ), $cycle, '', cjhcifebeg );
					$configoptions = ;
						= 6;

					if (( $configoptions )) {
						foreach ($configoptions as ) {
							$option = ;
							$option['selectedsetup'];
							$setupfee += ;
							$option['selectedrecurring'];
						}
					}

					$price += ;
				}


				while (true) {
					jmp;
					$cycles[] = array( 'price' => $price );
				}
			}

			break;
		}

		return $cycles;
	}
}

?>
