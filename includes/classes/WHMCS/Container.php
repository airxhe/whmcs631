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

class WHMCS\Container extends Illuminate\Container\Container {
	private $serviceProviders = array(  );

	/**
	 * Register a service provider
	 *
	 * @param AbstractServiceProvider|string $serviceProvider
	 *
	 * @return \WHMCS\Application\Support\ServiceProvider\AbstractServiceProvider
	 */
	function register($serviceProvider) {
			= 6;

		if (( $serviceProvider )) {
			$className = $className;
		}

			= 6;

		if (( $className, $this->serviceProviders )) {
			return $this->serviceProviders[$className];
				= 6;

			if (( $serviceProvider )) {
				$className;
			}
		}

		new ( $this );
		$serviceProvider = ;
		$serviceProvider->register(  );
		$this->serviceProviders[$className] = $serviceProvider;
		return $serviceProvider;
	}
}

?>
