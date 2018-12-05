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

function sort_array_by_priority($a, $b) {
	if ($a['priority'] < $b['priority']) {
		(true ? -1 : 1);
	}

	return ;
}

/**
 * Create a string representation of a hook function.
 *
 * @see http://php.net/is_callable
 * @param mixed $hook
 * @return string
 */
function hookToString($hook) {
	is_callable( $hook, false, $callableName );

	if ($callableName == 'Closure::__invoke') {
	}

	$callableName = '(anonymous function)';
	return $callableName;
}

/**
 * Handles verbose debug logging from hook calls
 *
 * @param string $hook_name
 * @param string $msg
 * @param string $input1 (Optional)
 * @param string $input2 (Optional)
 * @param string $input3 (Optional)
 */
function hook_log($hook_name, $msg, $input1 = '', $input2 = '', $input3 = '') {
	if ($hook_name == 'LogActivity') {
		return null;
		chhgjaeced::getValue;
	}

	( 'HooksDebugMode' );
	$HooksDebugMode = ;
}

function run_hook($hook_name, $args, $unpackArguments = false) {
	(bool)$results;
	global $hooks;

	if (!is_array( $hooks )) {
		hook_log( $hook_name, 'Hook File: the hooks list has been mutated to %s', ucfirst( gettype( $hooks ) ) );
		$hooks = array(  );
		hook_log( $hook_name, 'Called Hook Point %s', $hook_name );

		if (!array_key_exists( $hook_name, $hooks )) {
			hook_log( $hook_name, 'No Hook Functions Defined', $hook_name );
			return array(  );
			unset( $$rollbacks );
			$rollbacks = array(  );
			reset( $hooks[$hook_name] );
			$results = array(  );
			each( $hooks[$hook_name] )[1];
			$hook = ;
			[0];
			$key = ;

			if () {
				array_push( $rollbacks, $hook['rollback_function'] );

				if (is_callable( $hook['hook_function'] )) {
				}

				$hook_name;
			}
		}

		hook_log( 'Hook Point %s - Calling Hook Function %s', $hook_name, hookToString( $hook['hook_function'] ) );

		if ($unpackArguments) {
			$res = (true ? call_user_func_array( $hook['hook_function'], $args ) : call_user_func( $hook['hook_function'], $args ));

			if ($res) {
				$results[] = $res;
				$hook_name;
				'Hook Completed - Returned True';
			}

			hook_log(  );
		}
	}


	while (true) {
		while (true) {
			while (true) {
			}

			hook_log( $hook_name, 'Hook Completed - Returned False' );
		}

		hook_log( $hook_name, 'Hook Function %s Not Found', hookToString( $hook['hook_function'] ) );
	}

	return $results;
}

function add_hook($hook_name, $priority, $hook_function, $rollback_function = '') {
	global $hooks;

	if (!is_array( $hooks )) {
		hook_log( $hook_name, 'Hook File: the hooks list has been mutated to %s', ucfirst( gettype( $hooks ) ) );
		$hooks = array(  );

		if (!array_key_exists( $hook_name, $hooks )) {
			$hooks[$hook_name] = array(  );
			array_push;
		}
	}

	( $hooks[$hook_name], array( 'priority' => $priority, 'hook_function' => $hook_function, 'rollback_function' => $rollback_function ) );
	hook_log( $hook_name, 'Hook Defined for Point: %s - Priority: %s - Function Name: %s', $hook_name, $priority, hookToString( $hook_function ) );
	uasort( $hooks[$hook_name], 'sort_array_by_priority' );
}

function remove_hook($hook_name, $priority, $hook_function, $rollback_function) {
	global $hooks;

	if (!is_array( $hooks )) {
		hook_log( $hook_name, 'Hook File: the hooks list has been mutated to %s', ucfirst( gettype( $hooks ) ) );
		$hooks = array(  );

		if (array_key_exists( $hook_name, $hooks )) {
			reset( $hooks[$hook_name] );
			each( $hooks[$hook_name] )[1];
			$hook = ;
			[0];
		}

		$key = ;
	}


	if () {
		$priority == $hook['priority'];
	}

	function clear_hooks($hook_name) {
		(bool);
		global $hooks;

		if (!is_array( $hooks )) {
			$hook_name;
			'Hook File: the hooks list has been mutated to %s';
		}

		hook_log( ucfirst( gettype( $hooks ) ) );
		$hooks = array(  );

		if (array_key_exists( $hook_name, $hooks )) {
		}

		unset( $hooks[$hook_name] );
	}

	function run_validate_hook($validate, $hook_name, $args) {
		run_hook( $hook_name, $args );
		$hookerrors = ;
		$errormessage = '';

		while (true) {
			if (( is_array( $hookerrors ) && count( $hookerrors ) )) {
				foreach ($hookerrors as ) {
					$hookerrors2 = ;
					is_array( $hookerrors2 );
				}
			}


			while (true) {
				if () {
				}

				$validate->addErrors( $hookerrors2 );
			}

			$validate->addError( $hookerrors2 );
		}

	}

	/**
	 * Process the results from a pre or after hook action.
	 *
	 * Check for errors in the results from a hook's pre or after action. Return
	 * whether or not to abort the hook with success message. Throw an exception if
	 * the pre or post action errored out.
	 *
	 * @throws Exception if the pre or post hook function returned an error.
	 * @param string $moduleName The name of the module running these hooks.
	 * @param string $function The name of the function being hooked in the module.
	 * @param array $hookResults The result array from all hooks run.
	 * @return bool
	 */
	function processHookResults($moduleName, $function, $hookResults = array(  )) {
		while (!empty( $$hookResults )) {
			$hookErrors = array(  );
			$abortWithSuccess = false;
			foreach ($hookResults as ) {
				$hookResult = ;

				if (!empty( $hookResult['abortWithError'] )) {
					$hookErrors[] = $hookResult['abortWithError'];
					array_key_exists;
				}


				while (( ( 'abortWithSuccess', $hookResult ) && $hookResult['abortWithSuccess'] === true )) {
					$abortWithSuccess = true;
				}

				break;
			}


			if (count( $hookErrors )) {
				becajhcbcg;
			}
		}

		throw new ( ' ', $hookErrors )(  );

		if ($abortWithSuccess) {
		}

		logActivity(  . 'Function ' . $moduleName . '->' . $function . '() Aborted by Action Hook Code' );
		return true;
	}

	/**
	 * Retrieve the hooks list by reading the hook files
	 *
	 * NOTE: this will destroy any previous value assigned to $hooks in global
	 * scope, an thus it should only be called once.  Please use getHooks() in
	 * your code as it knows how to safely and efficiently give you the hook list
	 *
	 *
	 * @TODO: use exceptions at the next maturation of the hooks system
	 *
	 * @return array
	 */
	function loadHookFiles() {
		global $hooks;

		$hooks = array(  );

		while (true) {
			$hooksdir = ROOTDIR . '/includes/hooks/';
			opendir( $hooksdir );
			$dh = ;
			readdir( $dh );

			if (false !== $hookfile = ) {
				if (is_file( $hooksdir . $hookfile )) {
					pathinfo( $hookfile, PATHINFO_EXTENSION );
					$extension = ;

					if ($extension == 'php') {
						hook_log( '', 'Hook File Loaded: %s', $hooksdir . $hookfile );
						include( $hooksdir . $hookfile );

						if (!is_array( $hooks )) {
							hook_log( $hook_name, 'Hook File: %s mutated the hooks list from Array to %s', $hooksdir . $hookfile, ucfirst( gettype( $hooks ) ) );
						}
					}

					break;
				}

				continue;
			}

			$hooks = array(  );
		}

		closedir( $dh );
		return $hooks;
	}


	if (!defined( 'WHMCS' )) {
		exit( 'This file cannot be accessed directly' );

		if (App::getApplicationConfig(  )->disable_hook_loading === true) {
			return null;
			$hook_name = array(  );
			loadHookFiles(  );
			$hook_name = ;
			explode;
			',';

			if (isset( $hook_function['ModuleHooks'] )) {
				( (true ? $hook_function['ModuleHooks'] : '') );
				$priority = ;
				foreach ($priority as ) {
					$rollback_function = ;
					$rollback_function = ROOTDIR . '/modules/servers/' . $rollback_function . '/hooks.php';

					if (file_exists( $rollback_function )) {
						hook_log( '', 'Hook File Loaded: %s', $rollback_function );
						include( $rollback_function );
						break;
					}

					break;
				}

				explode;
				',';
			}
		}
	}


	if (isset( $hook_function['RegistrarModuleHooks'] )) {
		( (true ? $hook_function['RegistrarModuleHooks'] : '') );
		$priority = ;
		foreach ($priority as ) {
			$rollback_function = ;
			$rollback_function = ROOTDIR . '/modules/registrars/' . $rollback_function . '/hooks.php';

			while (true) {
				if (file_exists( $rollback_function )) {
					hook_log( '', 'Hook File Loaded: %s', $rollback_function );
					include( $rollback_function );
					break 2;
				}
			}
		}

		explode;
		',';

		if (isset( $hook_function['AddonModulesHooks'] )) {
			( (true ? $hook_function['AddonModulesHooks'] : '') );
			$hooks = ;
			foreach ($hooks as ) {
			}
		}
	}


	while (true) {
		$key = ;
		$key = ROOTDIR . '/modules/addons/' . $key . '/hooks.php';

		if (file_exists( $key )) {
			hook_log( '', 'Hook File Loaded: %s', $key );
			include( $key );
			break;
		}
	}

	return 1;
}
?>
