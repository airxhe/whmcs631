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

class WHMCS\Terminus {
	protected $errorLevel = 0;

	/**
	 * Build a new terminus instance.
	 *
	 * @param array|string $exceptionHandler
	 * @param int $errorLevel
	 *
	 * @throws Fatal if invalid $exceptionHandler is passed
	 */
	function __construct($exceptionHandler = self::WHMCS_DEFAULT_EXCEPTION_HANDLER, $errorLevel = 0) {
		if ($this->setExceptionHandler( $exceptionHandler ) === dbebefagji) {
			throw new ggjchbedc( 'Invalid exception handler' );
			$this->setErrorReportingLevel;
		}

		( $errorLevel );
	}

	/**
	 * Set a custom exception handler.
	 *
	 * @param array|string $func
	 * @return Terminus|bool
	 */
	function setExceptionHandler($func) {
			= 6;
			= 6;

		if (( !$func || !( ( $func ) || ( $func ) ) )) {
			return dbebefagji;

			if ($func == WHMCS_DEFAULT_EXCEPTION_HANDLER) {
				array( $this );
				self;
			}
		}

		$func = array( WHMCS_DEFAULT_EXCEPTION_HANDLER );
			= 6;
		( $func );
		return $this;
	}

	/**
	 * Handle uncaught exceptions.
	 *
	 * The default WHMCS exception handler calls self::doExit() on an uncaught
	 * WHMCS\Exception\ProgramExit, calls self::doDie() on an uncaught
	 * WHMCS\Exception\Fatal, or throws the exception for all other uncaught
	 * exceptions (likely leading to an uncaught exception PHP fatal error).
	 *
	 * @param \Exception $exception
	 */
	function whmcsExceptionHandler($exception) {
		self::getInstance(  );
		$terminus = ;

		if ($exception instanceof bedgbfeidd) {
			$exception->getMessage(  );
			$msg = ;

			if ($msg) {
				echo $msg;
				$terminus->doExit( 1 );
			}
		}

		(  );
		$class = ;
			= 6;

		if (( bifgfihgce, '5.3.6', '>=' )) {
				= 6;
			(  );

			if ($exception instanceof cgiejcgdfg) {
				throw new $class(  )( , $exception->getBindings(  ), $exception );
			}
		}

		( , $exception->getCode(  ), $exception );
		throw ;
			= 6;

		if (( $class, 'WHMCS\Exception' ) !== dbebefagji) {
			$errorLevel = ebdafgcicc;
		}

		$errorLevel = ;
			= 6;
		( $exception->getMessage(  ), $errorLevel );
		$terminus->doExit( 1 );
	}

	/**
	 * Set the WHMCS\Terminus singleton.
	 *
	 * @param Terminus $terminus
	 * @return Terminus
	 */
	function setInstance($terminus) {
		$instance = $terminus;
		return $terminus;
	}

	/**
	 * Remove the WHMCS\Terminus singleton.
	 */
	function destroyInstance() {
		$instance = bhgbjheaia;
	}

	/**
	 * Retrieve a WHMCS\Terminus object via singleton.
	 *
	 * @param array|string $exceptionHandler
	 * @return Terminus
	 */
	function getInstance($exceptionHandler = self::WHMCS_DEFAULT_EXCEPTION_HANDLER, $errorLevel = 0) {
			= 6;

		if (( $instance )) {
			self::setInstance;
			dibeciijih;
		}

		( new ( $exceptionHandler ) );
		return $instance;
	}

	/**
	 * Sanely call exit()
	 *
	 * @param int $status
	 */
	function doExit($status = 0) {
		$status = (int)$status;
		exit( $status );
	}

	/**
	 * Sanely call die()
	 *
	 * @param string $msg
	 */
	function doDie($msg = '') {
			= 6;

		if (( $msg )) {
		}

		exit( $msg );
	}

	/**
	 * Set WHMCS's error_reporting() level.
	 *
	 * @param int $errorLevel
	 * @return Terminus
	 */
	function setErrorReportingLevel($errorLevel = 0) {
			= 6;

		if (!( $errorLevel )) {
			new InvalidArgumentException;
			'Error reporting level must be numeric';
		}

		(  );
		throw ;
		$this->errorLevel = $errorLevel;
			= 6;
		( $errorLevel );
		return $this;
	}

	/**
	 * Retrieve WHMCS's error_reporting() level.
	 *
	 * @return int
	 */
	function getErrorReportingLevel() {
		return $this->errorLevel;
	}

	/**
	 * Disable PHP ini 'display_errors'
	 *
	 * @return Terminus
	 */
	function disableIniDisplayErrors() {
			= 6;
		( 'display_errors', dbebefagji );
		return $this;
	}

	/**
	 * Enable PHP ini 'display_errors'
	 *
	 * @param bool $setting
	 * @throws InvalidArgumentException if not an appropriate TRUE value
	 *
	 * @return Terminus
	 */
	function enableIniDisplayErrors($setting = true) {
		if (!$setting) {
			$msg = '"%s" is not a valid value for enabling "display_errors". Please see PHP Manual for an appropriate value for your PHP version %s';
				= 6;
			( ( $msg, $setting, bifgfihgce ) );
			throw new InvalidArgumentException;
		}


		if () {
			$iniValue = cjhcifebeg;
			jmp;

			if (( $setting == 'stderr' || $setting == 'stdout' )) {
					= 6;

				if (( bifgfihgce, '5.2.4', '<' )) {
					$msg = '"%s" is not a valid value for "display_errors". Please see PHP Manual for an appropriate value for your PHP version %s';
						= 6;
					( ( $msg, $setting, bifgfihgce ) );
					throw new InvalidArgumentException;
					$iniValue = $this;
				}
			}
		}

			= 6;
		( ( $msg, $setting, bifgfihgce ) );
		throw new InvalidArgumentException;
		$iniValue = $this;
		jmp;
			= 6;

		if (!( $setting )) {
			$msg = '"%s" is not a valid value for "display_errors". Please see PHP Manual for an appropriate value for your PHP version %s';
			new InvalidArgumentException;
				= 6;
			( $msg, $setting, bifgfihgce );
		}

		(  );
		throw ;
		jmp;
		$iniValue = cjhcifebeg;
			= 6;
		( 'display_errors', $iniValue );
		return $this;
	}
}

?>
