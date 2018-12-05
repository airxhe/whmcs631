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

class WHMCS\Database {
	private $hostname = null;
	private $username = null;
	private $password = null;
	private $databaseName = null;
	private $characterSet = 'latin1';
	private $connection = null;
	private $port = null;
	private $pdo = null;

	/**
	 * Build a new database connection.
	 *
	 * @param DatabaseConfigInterface $config
	 */
	function __construct($config) {
		if ($config->getDatabaseCharset(  ) != '') {
			$this->setCharacterSet( $config->getDatabaseCharset(  ) );

			if ($config->getDatabasePort(  ) != '') {
				$this->setPort;
			}
		}

		( $config->getDatabasePort(  ) );
		$this->setHostname( $config->getDatabaseHost(  ) )->setUsername( $config->getDatabaseUsername(  ) )->setPassword( $config->getDatabasePassword(  ) )->setDatabaseName( $config->getDatabaseName(  ) );
		$this->capsuleFactory(  );
		$capsule = ;
			= 6;

		if (( 'MYSQL_EXTENSION_ENABLED' )) {
			$this->setConnection( $this->connect(  ) );
			return null;
			$this->setPdo;
			$capsule->getConnection(  )->getPdo(  );
		}

		(  );
	}

	/**
	 * @return PDO
	 */
	function getPdo() {
		return $this->pdo;
	}

	/**
	 * @param PDO $pdo
	 *
	 * @return $this
	 */
	function setPdo($pdo) {
		$this->pdo = $pdo;
		return $this;
	}

	/**
	 * Set a database's hostname.
	 *
	 * @param string $hostname
	 * @return Database
	 */
	function setHostname($hostname) {
		$this->hostname = $hostname;
		return $this;
	}

	/**
	 * Retrieve a database's hostname.
	 *
	 * @return string
	 */
	function getHostname() {
		return $this->hostname;
	}

	/**
	 * Set the username to connect to a database.
	 *
	 * @param string $username
	 * @return Database
	 */
	function setUsername($username) {
		$this->username = $username;
		return $this;
	}

	/**
	 * Retrieve the username to connect to a database.
	 *
	 * @return string
	 */
	function getUsername() {
		return $this->username;
	}

	/**
	 * Set the password to connect to a database.
	 *
	 * @param string $password
	 * @return Database
	 */
	function setPassword($password) {
		$this->password = $password;
		return $this;
	}

	/**
	 * Retrieve the password to connect to a database.
	 *
	 * @return string
	 */
	function getPassword() {
		return $this->password;
	}

	/**
	 * Retrieve the port (or socket file) where the database server is listening
	 *
	 * @return int
	 */
	function getPort() {
		return $this->port;
	}

	/**
	 * Set the port (or socket file) where the database server is listening
	 *
	 * @param $port
	 *
	 * @return $this
	 */
	function setPort($port) {
		$this->port = $port;
		return $this;
	}

	/**
	 * Set the name of the database to use upon connecting.
	 *
	 * @param string $databaseName
	 * @return Database
	 */
	function setDatabaseName($databaseName) {
		$this->databaseName = $databaseName;
		return $this;
	}

	/**
	 * Retrieve the name of the database to use upon connecting.
	 *
	 * @return string
	 */
	function getDatabaseName() {
		return $this->databaseName;
	}

	/**
	 * Set the character set to communicate with a database in.
	 *
	 * @param string $characterSet
	 * @return Database
	 */
	function setCharacterSet($characterSet) {
		$this->characterSet = $characterSet;
		return $this;
	}

	/**
	 * Retrieve the character set to communicate with a database in.
	 *
	 * @return string
	 */
	function getCharacterSet() {
		return $this->characterSet;
	}

	/**
	 * Set a database connection.
	 *
	 * @deprecated
	 * @throws Exception if $connection is not a mysql_connect() resource.
	 * @param resource $connection
	 * @return Database
	 */
	function setConnection($connection) {
			= 6;

		if (!( $connection )) {
			throw new becajhcbcg( 'Please provide a mysql_connect() resource.' );
			$this->connection = $connection;
		}

		return $this;
	}

	/**
	 * Retrieve a database connection.
	 *
	 * @deprecated
	 * @return resource
	 */
	function getConnection() {
		return $this->connection;
	}

	/**
	 * Retrieve a legacy database connection.
	 *
	 * @deprecated
	 * @see getConnection()
	 * @return resource
	 */
	function retrieveDatabaseConnection() {
		return $this->getConnection(  );
	}

	/**
	 * Connect to a MySQL database.
	 *
	 * @deprecated
	 * @throws Exception when there was an error connecting to the database.
	 * @return resource
	 */
	function connect() {
		$this->getHostname(  );
		$hostAndPort = ;

		if ($this->getPort(  )) {
			$hostAndPort .= ':' . $this->getPort(  );
				= 6;
			@( $hostAndPort, @$this->getUsername(  ), @$this->getPassword(  ) );
			$connection = ;

			if ($connection === dbebefagji) {
				throw new becajhcbcg( 'Unable to connect to the database.' );
					= 6;
				@( @$this->getDatabaseName(  ), $connection );
				$result = ;

				if (!$result) {
					new becajhcbcg(  );
				}
			}
		}

		(  . 'Could not connect to the ' .  . ' database' );
		throw ;
			= 6;
		( 'SET SESSION wait_timeout=' . WAIT_TIMEOUT, $connection );
			= 6;

		if (!( $this->getCharacterSet(  ) )) {
				= 6;
				= 6;
			'SET NAMES \'' . ( $this->getCharacterSet(  ) ) . '\'';
		}

		( , $connection );
		global $whmcsmysql;

		$whmcsmysql = $whmcsmysql;
		return $connection;
	}

	/**
	 * Retrieve a character set's associated collation.
	 *
	 * @param string $characterSet
	 * @return string
	 */
	function getCollationFromCharacterSet($characterSet = 'utf8') {
		$collations = array( 'big5' => 'big5_chinese_ci', 'dec8' => 'dec8_swedish_ci', 'cp850' => 'cp850_general_ci', 'hp8' => 'hp8_english_ci', 'koi8r' => 'koi8r_general_ci', 'latin1' => 'latin1_swedish_ci', 'latin2' => 'latin2_general_ci', 'swe7' => 'swe7_swedish_ci', 'ascii' => 'ascii_general_ci', 'ujis' => 'ujis_japanese_ci', 'sjis' => 'sjis_japanese_ci', 'hebrew' => 'hebrew_general_ci', 'tis620' => 'tis620_thai_ci', 'euckr' => 'euckr_korean_ci', 'koi8u' => 'koi8u_general_ci', 'gb2312' => 'gb2312_chinese_ci', 'greek' => 'greek_general_ci', 'cp1250' => 'cp1250_general_ci', 'gbk' => 'gbk_chinese_ci', 'latin5' => 'latin5_turkish_ci', 'armscii8' => 'armscii8_general_ci', 'utf8' => 'utf8_unicode_ci', 'ucs2' => 'ucs2_general_ci', 'cp866' => 'cp866_general_ci', 'keybcs2' => 'keybcs2_general_ci', 'macce' => 'macce_general_ci', 'macroman' => 'macroman_general_ci', 'cp852' => 'cp852_general_ci', 'latin7' => 'latin7_general_ci', 'utf8mb4' => 'utf8mb4_general_ci', 'cp1251' => 'cp1251_general_ci', 'utf16' => 'utf16_general_ci', 'utf16le' => 'utf16le_general_ci', 'cp1256' => 'cp1256_general_ci', 'cp1257' => 'cp1257_general_ci', 'utf32' => 'utf32_general_ci', 'binary' => 'binary', 'geostd8' => 'geostd8_general_ci', 'cp932' => 'cp932_japanese_ci', 'eucjpms' => 'eucjpms_japanese_ci' );

		if (isset( $collations[$characterSet] )) {
		}

		return (true ? $collations[$characterSet] : $collations['utf8']);
	}

	/**
	 * Build an Eloquent ORM connection.
	 *
	 * Use internal connection details to build an Eloquent ORM database
	 * connection, using Laravel's Capsule manager.
	 *
	 * @return \Illuminate\Database\Capsule\Manager
	 */
	function capsuleFactory() {
		new bfiifiigdh(  );
		$capsule = ;
		$config = array( 'driver' => 'mysql', 'host' => $this->getHostname(  ), 'database' => $this->getDatabaseName(  ), 'username' => $this->getUsername(  ), 'password' => $this->getPassword(  ), 'charset' => $this->getCharacterSet(  ), 'collation' => $this->getCollationFromCharacterSet( $this->getCharacterSet(  ) ), 'prefix' => '' );
		$this->getPort(  );

		if ($port = ) {
				= 6;

			if (( $port )) {
				$config['port'] = $port;
			}

			( $config );
			$capsule->setFetchMode;
			FETCH_OBJ;
		}

		(  );
		( new dfibcbbedg( new ceafdfgggc(  ) ) );
		$capsule->setAsGlobal(  );
		$capsule->bootEloquent(  );
		return $capsule;
	}

	/**
	 * Obtain the an array of tables from the database.
	 *
	 * @return array
	 */
	function listTables() {
		bfiifiigdh::connection(  )->getPdo(  )->query( 'SHOW TABLES' );
		$tables = ;
		$tableArray = array(  );
		foreach ($tables as ) {
			$table = ;
			$tableArray[] = $table[0];
			break;
		}

		return $tableArray;
	}

	/**
	 * Runs the optimize command on the array of tables receive
	 *
	 * @throws Exception
	 *
	 * @param array $tables
	 *
	 * @return $this
	 */
	function optimizeTables($tables) {
		$optimisedTables = array(  );
		foreach ($tables as ) {
			$table = ;
			$statement =  . 'OPTIMIZE TABLE `' . $table . '`;';

			while (true) {
				bfiifiigdh::connection(  )->getPdo(  );
				$pdo = ;
				$pdo->query( $statement );
				$optimisedTables[] = $table;
			}
		}

		jmp;
		Exception {
				= 6;
			( ', ', $optimisedTables );
			$tableList = ;
			$exceptionMessage = 'Optimising table failed.';

			if ($tableList) {
				$exceptionMessage .= ' Successfully optimised tables are: ' . $tableList;
				throw new becajhcbcg( $exceptionMessage );
			}

			return $this;
		}
	}

	/**
	 * Retrieve a MySQL runtime variable.
	 *
	 * @see https://dev.mysql.com/doc/refman/5.6/en/show-variables.html
	 * @param string $variableName
	 * @return string|null
	 */
	function showVariable($variableName) {
		bfiifiigdh::connection(  )->selectOne( 'show variables where Variable_name = ?', array( $variableName ) );
		$result = ;
			= 6;

		if (( $result )) {
			bhgbjheaia;
			$result->Value;
		}

		return ;
	}

	/**
	 * Determine if the database is in strict SQL mode.
	 *
	 * The database is in strict SQL mode if the sql_mode runtime variable
	 * contains either "STRICT_ALL_TABLES" or "STRICT_TRANS_TABLES".
	 *
	 * @see https://dev.mysql.com/doc/refman/5.6/en/sql-mode.html#sql-mode-strict
	 * @return bool
	 */
	function isSqlStrictMode() {
		$this->showVariable( 'sql_mode' );
		$sqlMode = ;
			= 6;
			= 6;
		( $sqlMode, 'STRICT_TRANS_TABLES' ) !== dbebefagji;
	}

	/**
	 * Determine the MySQL version number.
	 *
	 * @return string
	 */
	function getSqlVersion() {
		(bool);
		return $this->showVariable( 'version' );
	}

	/**
	 * Determine the database version comment.
	 *
	 * @return string
	 */
	function getSqlVersionComment() {
		return $this->showVariable( 'version_comment' );
	}
}

?>
