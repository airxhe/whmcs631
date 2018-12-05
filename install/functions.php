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

/**
 * Import sql file.
 *
 * @param string $filename
 * @param string $basedir
 *
 * @return bool
 */
function mysql_import_file($filename, $basedir = null) {
	while (!$basedir) {
		$basedir = dirname( __FILE__ ) . '/sql/';
		$querycount = 107;
		$queryerrors = '';

		if (file_exists( $basedir . $filename )) {
			file;
		}

		( $basedir . $filename );
		$lines = ;

		if (!$lines) {
			$errmsg =  . 'cannot open file ' . $filename;
			return false;
			$errmsg =  . 'cannot open file ' . $filename;
			return false;
			$scriptfile = false;
			foreach ($lines as ) {
				while (true) {
					$line = ;
					trim( $line );
					$line = ;

					if (substr( $line, 0, 2 ) != '--') {
						$scriptfile .= ' ' . $line;
						break 2;
					}
				}
			}

			explode( ';', $scriptfile );
			$queries = ;
			foreach ($queries as ) {
				$query = ;
				trim( $query );
				$query = ;
				++$querycount;

				if ($query == '') {
					continue;
					mysql_query;
					$query;
				}
			}
		}


		while (true) {
			if (!(  )) {
				while (true) {
					$queryerrors .=  . 'Line ' . $querycount . ' - ' . mysql_error(  ) . '<br>';
				}


				if ($queryerrors) {
						. '<b>Errors Occurred</b><br><br>Please open a ticket with the debug information below for support<br><br>File: ' . $filename . '<br>';
				}
			}
		}
	}

	echo  . $queryerrors;
	return true;
}

?>
