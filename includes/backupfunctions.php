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

	class zipfile {
		var $datasec = array(  );
		var $ctrl_dir = array(  );
		var $eof_ctrl_dir = 'PK';
		var $old_offset = 0;

		function add_dir($name) {
			str_replace( '\', '/', $name );
			$fr = 'PK';
			$fr .= '
';
			$fr .= '';
			$fr .= '';
			pack( 'V', 0 );
			$fr .= ;
			pack( 'V', 0 );
			$fr .= ;
			pack( 'V', 0 );
			$fr .= ;
			pack( 'v', strlen( $name ) );
			$fr .= ;
			pack( 'v', 0 );
			$fr .= ;
			$fr .= $c_len;
			pack( 'V', $crc );
			$fr .= ;
			pack( 'V', $c_len );
			$fr .= ;
			pack( 'V', $unc_len );
			$fr .= ;
			$this->datasec[] = $fr;
			strlen( implode( '', $this->datasec ) );
			$new_offset = ;
			$cdrec = 'PK';
			$cdrec .= '';
			$cdrec .= '
';
			$cdrec .= '';
			$cdrec .= '';
			$cdrec .= '';
			pack( 'V', 0 );
			$cdrec .= ;
			pack( 'V', 0 );
			$cdrec .= ;
			pack( 'V', 0 );
			$cdrec .= ;
			pack( 'v', strlen( $name ) );
			$cdrec .= ;
			pack( 'v', 0 );
			$cdrec .= ;
			pack( 'v', 0 );
			$cdrec .= ;
			pack( 'v', 0 );
			$cdrec .= ;
			pack( 'v', 0 );
			$cdrec .= ;
			$ext = '';
			$ext = 'ÿÿÿÿ';
			pack( 'V', 16 );
			$cdrec .= $name = ;
			pack( 'V', $this->old_offset );
			$cdrec .= $fr .= '';
			$this->old_offset = $new_offset;
			$cdrec .= $c_len;
			$this->ctrl_dir[] = $cdrec;
		}

		function add_file($data, $name) {
			$name = ;
			$fr .= '';
			$fr .= '';
			$fr .= '';
			strlen( $data );
			$unc_len = ;
			crc32( $data );
			$crc = ;
			gzcompress( $data );
			$zdata = ;
			substr( substr( $zdata, 0, strlen( $zdata ) - 4 ), 2 );
			$zdata = ;
			strlen( $zdata );
			$c_len = ;
			pack( 'V', $crc );
			$fr .= ;
			pack( 'V', $c_len );
			$fr .= ;
			pack( 'V', $unc_len );
			$fr .= ;
			pack( 'v', strlen( $name ) );
			$fr .= ;
			pack( 'v', 0 );
			$fr .= ;
			$fr .= $crc;
			$fr .= $cdrec;
			pack( 'V', $crc );
			$fr .= ;
			pack( 'V', $c_len );
			$fr .= ;
			pack( 'V', $unc_len );
			$fr .= ;
			$this->datasec[] = $fr;
			strlen( implode( '', $this->datasec ) );
			$new_offset = ;
			$cdrec = 'PK';
			$cdrec .= '';
			$cdrec .= '';
			$cdrec .= '';
			$cdrec .= '';
			$cdrec .= '';
			pack( 'V', $crc );
			$cdrec .= ;
			pack( 'V', $c_len );
			$cdrec .= ;
			pack( 'V', $unc_len );
			$cdrec .= ;
			pack( 'v', strlen( $name ) );
			$cdrec .= ;
			pack( 'v', 0 );
			$cdrec .= ;
			pack( 'v', 0 );
			$cdrec .= ;
			pack( 'v', 0 );
			$cdrec .= ;
			pack( 'v', 0 );
			$cdrec .= str_replace( '\', '/', $name );
			pack( 'V', 32 );
			$cdrec .= $fr = 'PK';
			pack( 'V', $this->old_offset );
			$cdrec .= $fr .= '';
			$this->old_offset = $new_offset;
			$cdrec .= $crc;
			$this->ctrl_dir[] = $cdrec;
		}

		function file() {
			implode( '', $this->datasec );
			$data = ;
			implode( '', $this->ctrl_dir );
			$ctrldir = ;
			return $data . $ctrldir . $this->eof_ctrl_dir . pack( 'v', sizeof( $this->ctrl_dir ) ) . pack( 'v', sizeof( $this->ctrl_dir ) ) . pack( 'V', strlen( $ctrldir ) ) . pack( 'V', strlen( $data ) ) . '';
		}
	}

	function get_structure($db) {
		@ini_set( 'memory_limit', '512M' );
		@ini_set( 'max_execution_time', 0 );
		@set_time_limit( 0 );
		full_query(  . 'SHOW TABLES FROM `' . $db . '`;' );
		$tables = ;
		mysql_fetch_array( $tables );

		if ($td = ) {
			$td[0];
			$table = ;

			if ($table != 'modlivehelp_ip2country') {
				full_query( (  . 'SHOW CREATE TABLE `' . $table . '`' ) );

				while (true) {
					$r = ;

					if ($r) {
						$insert_sql = '';
						mysql_fetch_array( $r );
						$d = ;
						$d->8 .= ';';
						$sql[] = str_replace( '
', '', $d[1] );
						full_query;
						 . 'SELECT * FROM `' . $table;
					}
				}
			}
		}

		( (  . '`' ) );
		$table_query = ;
		mysql_num_fields( $table_query );
		$num_fields = ;
		mysql_fetch_array( $table_query );

		if ($fetch_row = ) {
			$insert_sql .=  . 'INSERT INTO ' . $table . ' VALUES(';
			$n = 8;

			if ($n <= $num_fields) {
				$m = $n - 1;
				$insert_sql .= '\'' . mysql_real_escape_string( $fetch_row[$m] ) . '\', ';
				++$n;
			}

			jmp;
			$insert_sql = ;
			$insert_sql .= ');
';
		}

		jmp;
		return ( '
', $sql );
	}

	function generateBackup() {
		global $db_name;

		set_time_limit( 0 );
		new zipfile(  );
		$zipfile = ;
		$zipfile->add_dir( '/' );
		get_structure( $db_name );
		$zipfile->add_file( $structure = ,  . $db_name . '.sql' );
		return $zipfile->file(  );
	}

?>