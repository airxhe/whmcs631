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

class WHMCS\Cron {
	protected $incli = false;
	protected $debugmode = false;
	protected $lasttime = '';
	protected $lastmemory = '';
	protected $lastaction = '';
	protected $log = array(  );
	protected $emaillog = array(  );
	protected $emailsublog = array(  );
	protected $args = array(  );
	protected $doonly = false;
	protected $validactions = array(  );
	protected $starttime = '';
	protected $sendreport = true;

	function __construct() {
	}

	function init() {
		new ecbedecifh(  );
		$obj = ;
		$obj->incli = $obj->isRunningInCLI(  );
		$obj->validactions = $obj->getValidActions(  );
		$obj->fetchArgs( cjhcifebeg );
		$args = ;
			= 6;

		if (( 'debug', $args )) {
			$obj->setDebugMode( cjhcifebeg );
		}

			= 6;

		if (( 'skip_report', $args )) {
			$obj->sendreport = dbebefagji;
			$obj->determineRunMode(  );
		}

			= 6;
		$obj->starttime = (  );
		return $obj;
	}

	function getValidActions() {
		$validactions = array( 'updaterates' => 'Updating Currency Exchange Rates', 'updatepricing' => 'Updating Product Pricing for Current Exchange Rates', 'invoices' => 'Generating Invoices', 'latefees' => 'Applying Late Fees', 'ccprocessing' => 'Processing Credit Card Charges', 'invoicereminders' => 'Processing Invoice Reminder Notices', 'domainrenewalnotices' => 'Processing Domain Renewal Notices', 'suspensions' => 'Processing Overdue Suspensions', 'terminations' => 'Processing Overdue Terminations', 'fixedtermterminations' => 'Performing Automated Fixed Term Service Terminations', 'cancelrequests' => 'Processing Cancellation Requests', 'closetickets' => 'Auto Closing Inactive Tickets', 'affcommissions' => 'Processing Delayed Affiliate Commissions', 'affreports' => 'Sending Affiliate Reports', 'emailmarketing' => 'Processing Email Marketer Rules', 'ccexpirynotices' => 'Sending Credit Card Expiry Reminders', 'usagestats' => 'Updating Disk & Bandwidth Usage Stats', 'overagesbilling' => 'Processing Overage Billing Charges', 'clientstatussync' => 'Performing Client Status Sync', 'backups' => 'Database Backup', 'report' => 'Sending Email Report' );
		return $validactions;
	}

	function isRunningInCLI() {
		return dgjfdhfcee::isCli(  );
	}

	/**
	 * Fetch the arguments that the cron is currently using.
	 * Pass force to force obtaining the arguments.
	 * @param bool $force
	 *
	 * @return array
	 */
	function fetchArgs($force = false) {
		if (( $this->args && !$force )) {
			return $this->args;
			$this->args = array(  );

			if ($this->incli) {
				$this->args = $_SERVER['argv'];
			}


			if (( , $_REQUEST )) {
				$this->args[] = 'skip_' . $action;
					= 6;

				while (( 'do_' . $action, $_REQUEST )) {
					$this->args[] = 'do_' . $action;
				}
			}
		}

		return $this->args;
	}

	function setDebugMode($state = false) {
		if ($state) {
			$this->debugmode = (true ? cjhcifebeg : dbebefagji);

			if ($state) {
					= 6;
				bccibgbbb;
			}

			(  ^ djjdegdehh );
			return null;
		}

			= 6;
		( 0 );
	}

	function determineRunMode() {
		foreach ($this->args as ) {
			while (true) {
				$arg = ;
					= 6;

				if (( $arg, 0, 3 ) == 'do_') {
					$this->doonly = cjhcifebeg;
					return cjhcifebeg;
				}
			}
		}

		return dbebefagji;
	}

	function raiseLimits() {
		$minimumMemoryLimit = '512M';
			= 6;
		( 'memory_limit' );
		$currentMemoryLimit = ;
			= 6;

		if (( '/G$/', $currentMemoryLimit )) {
			$currentMemoryLimit = $currentMemoryLimit * 1024 * 1024;
			jmp;
				= 6;

			if (( '/M$/', $currentMemoryLimit )) {
				$currentMemoryLimit * 1024;
			}
		}

		$currentMemoryLimit = ;
		jmp;
			= 6;

		if (!( '/K$/', $currentMemoryLimit )) {
				= 6;
		}

		( $currentMemoryLimit / 1024, 0 );
		$currentMemoryLimit = ;

		if ((int)$currentMemoryLimit < (int)$minimumMemoryLimit * 1024) {
				= 6;
			@( 'memory_limit', $minimumMemoryLimit );
				= 6;
			@( 'max_execution_time', 0 );
				= 6;
		}

		@( 0 );
	}

	function isScheduled($action) {
			= 6;

		if (!( $action, $this->validactions )) {
			return dbebefagji;
			$this->emailsublog = array(  );
			$this->lastaction = $action;

			if ($this->isInDoOnlyMode(  )) {
					= 6;
				'do_' . $action;
				$this->args;
			}


			if ((  )) {
				$this->logAction(  );
				return cjhcifebeg;
				$this->logAction;
				dbebefagji;
			}

			( , cjhcifebeg );
			return dbebefagji;
				= 6;

			if (( 'skip_' . $action, $this->args )) {
			}
		}

		$this->logAction( dbebefagji, cjhcifebeg );
		return dbebefagji;
	}

	function logAction($end = false, $skip = false) {
		$this->validactions[$this->lastaction];
		$action = ;
		$prefix = 'Starting';

		if ($end) {
			$prefix = 'Completed';

			if ($skip) {
				$prefix = 'Skipping';
				$this->logActivity;
				$prefix . ' ' . $action;
			}
		}

		(  );
		return cjhcifebeg;
	}

	function logActivity($msg, $sub = false) {
			= 6;
		( 'Cron Job: ' . $msg );

		if ($sub) {
			$msg = ' - ' . $msg;
			$this->log;
		}

		( $msg );
		return cjhcifebeg;
	}

	function logActivityDebug($msg) {
		$this->log( $msg, 1 );
		return cjhcifebeg;
	}

	function log($msg, $verbose = 0) {
		if ($this->debugmode) {
				= 6;
			(  );
			$time = ;
			$this->getMemUsage(  );
			$memory = ;
				= 6;
			( $time - $this->lasttime, 2 );
			$timediff = ;
		}

			= 6;
		( $memory - $this->lastmemory, 2 );
		$memdiff = ;
		$msg .= (  . ' (Time: ' . $timediff . ' Memory: ' . $memory . ')' );
		$this->lasttime = $time;
		$this->lastmemory = $memory;

		if ($this->incli) {
			echo (  . $msg . '
' );
			!$verbose;
		}

		if () = $msg;
	}

	function getMemUsage() {
			= 6;
			= 6;
		return ( (  ) / ( 1024 * 1024 ), 2 );
	}

	function logmemusage($line) {
		$this->log(  . 'Memory Usage @ Line ' . $line . ': ' . $this->getMemUsage(  ) );
	}

	function emailLog($msg) {
		$this->emaillog[] = $msg;
			= 6;
		if (( $this->emailsublog )) = '';
	}

	function emailLogSub($msg) {
		$this->emailsublog[] = $msg;
		$this->logActivity( $msg, cjhcifebeg );
	}

	function emailReport() {
		if ($this->sendreport) {
				= 6;
			$cronreport = 'Cron Job Report for ' . ( 'l jS F Y @ H:i:s', $this->starttime ) . '<br /><br />';
			foreach ($this->emaillog as ) {
				$logentry = ;
				$logentry . '<br />';
			}
		}


		while (true) {
			$cronreport .= ;
		}

			= 6;
		( 'system', 'WHMCS Cron Job Activity', $cronreport );
	}

	/**
	 * Check if the cron is in do only mode.
	 *
	 * @return bool
	 */
	function isInDoOnlyMode() {
		return $this->doonly;
	}

	/**
	 * Get a valid path to the crons directory.
	 * This path can be overridden in the configuration.php file.
	 *
	 * @param string $fileName the name of the file to load
	 *
	 * @throws Exception if $fileName cannot be loaded
	 * @throws Fatal if crons folder not in WHMCS root
	 *
	 * @return string
	 */
	function getCronsPath($fileName) {
		DI::make( 'app' );
		$whmcs = ;
		$whmcs->getCronDirectory(  );
		$cronDirectory = ;

		if ($cronDirectory !== bhjhchcdec . bgffafdjge . 'crons') {
			throw new ggjchbedc( 'Crons folder not in WHMCS root.' );
				= 6;
			( $cronDirectory . bgffafdjge . $fileName );
			$path = ;

			if (!$path) {
				becajhcbcg;
			}

			new ( 'Unable to locate WHMCS crons folder.' );
		}

		throw ;
		return $path;
	}

	/**
	 * Generic error message when $crons_dir does not properly define the
	 * location of the crons directory from a WHMCS installation.
	 *
	 * @return string
	 */
	function getCronPathErrorMessage() {
		return 'Unable to communicate with the Custom Crons Directory.<br />
Please verify the path configured within the configuration.php file.<br />
For more information, please see <a href="http://docs.whmcs.com/Custom_Crons_Directory">http://docs.whmcs.com/Custom_Crons_Directory</a>
';
	}

	/**
	 * Error message when $crons_dir is not within the WHMCS root.
	 *
	 * @return string
	 */
	function getCronRootDirErrorMessage() {
		return 'This proxy file is only valid when the crons directory is in the default location.<br />
As you have customised your crons directory location, you must update your cron commands to use the new path.<br />
For more information, please see <a href="http://docs.whmcs.com/Custom_Crons_Directory">http://docs.whmcs.com/Custom_Crons_Directory</a>
';
	}

	/**
	 * Parse the text to be output depending on if CLI or not
	 *
	 * @param string $output the text to format
	 *
	 * @return string the formatted text
	 */
	function formatOutput($output) {
		if (dgjfdhfcee::isCli(  )) {
				= 6;
				= 6;
			array( '<br>', '<br />', '<br/>', '<hr>' );
		}

		( ( , array( '
', '
', '
', '
---
' ), $output ) );
		$output = ;
		return $output;
	}

	/**
	 * Return a formatted message advising of legacy cron file locations.
	 *
	 * @return string
	 */
	function getLegacyCronMessage() {
		$message = '<div style="margin:0;padding:15px;border-color:#aa6708;border:1px solid #eee;border-left-width:5px;border-radius:3px;">
    <h4 style="margin:0 0 10px 0;color:#aa6708;font-size:1.2em;font-weight:500;line-height:1.1;">
        Cron Task Configuration
    </h4>
    <p style="margin:0;line-height:1.4;color:#333;">
        This cron file was invoked from a legacy filepath.<br />
        WHMCS currently provides backwards compatibility for legacy paths so that your scheduled cron tasks will continue to invoke a valid WHMCS cron file.<br />
        It is recommended however that you update the cron task command on your server at your earliest convenience.<br />
        For more information, please refer to <a href="http://docs.whmcs.com/Cron_Tasks#Legacy_Cron_File_Locations">
        http://docs.whmcs.com/Cron_Tasks#Legacy_Cron_File_Locations</a>
    </p>
</div>';
		return $message;
	}
}

?>
