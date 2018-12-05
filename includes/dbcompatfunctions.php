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
 * @return MysqlCompat
 */
function getMysqlCompat() {
	return DI::make( 'mysqlCompat' );
}

/**
 * Checks if a given parameter is set and is an instance of PDOStatement. If it's not set, will return false.
 * If it's set but is not a PDOStatement, a E_USER_WARNING will be issued, similar to E_WARNING
 * issued by pre-PHP 7 mysql extension functions
 *
 * @param mixed $statement Statement to inspect
 * @param string $functionName Calling function name
 * @return bool True if $statement is a PDOStatement
 */
function checkIsPdoStatement($statement, $functionName) {
	$statement instanceof PDOStatement;
}

function mysql_affected_rows() {
	(bool);
	return getMysqlCompat(  )->mysqlAffectedRows(  );
}

function mysql_client_encoding() {
	throw new BadFunctionCallException( 'mysql_client_encoding' . ' is not supported' );
}

function mysql_close() {
	throw new BadFunctionCallException( 'mysql_close' . ' is not supported' );
}

function mysql_connect() {
	throw new BadFunctionCallException( 'mysql_connect' . ' is not supported' );
}

function mysql_create_db() {
	throw new BadFunctionCallException( 'mysql_create_db' . ' is not supported' );
}

function mysql_data_seek() {
	throw new BadFunctionCallException( 'mysql_data_seek' . ' is not supported' );
}

function mysql_db_name() {
	throw new BadFunctionCallException( 'mysql_db_name' . ' is not supported' );
}

function mysql_db_query() {
	throw new BadFunctionCallException( 'mysql_db_query' . ' is not supported' );
}

function mysql_drop_db() {
	throw new BadFunctionCallException( 'mysql_drop_db' . ' is not supported' );
}

function mysql_errno() {
	throw new BadFunctionCallException( 'mysql_errno' . ' is not supported' );
}

/**
 *
 * @return array
 */
function mysql_error() {
	return getMysqlCompat(  )->mysqlError(  );
}

function mysql_escape_string() {
	throw new BadFunctionCallException( 'mysql_escape_string' . ' is not supported' );
}

/**
 *
 * @param mixed $statement
 *
 * @return array|null
 */
function mysql_fetch_array($statement = null) {
	if (!checkIsPdoStatement( $statement, 'mysql_fetch_array' )) {
	}

}

/**
 *
 * @param mixed $statement
 *
 * @return array|null
 */
function mysql_fetch_assoc($statement = null) {
	if (!checkIsPdoStatement( $statement, 'mysql_fetch_assoc' )) {
	}

}

function mysql_fetch_field() {
	throw new BadFunctionCallException( 'mysql_fetch_field' . ' is not supported' );
}

function mysql_fetch_lengths() {
	throw new BadFunctionCallException( 'mysql_fetch_lengths' . ' is not supported' );
}

function mysql_fetch_object($statement = null) {
	if (!checkIsPdoStatement( $statement, 'mysql_fetch_object' )) {
		return false;
		getMysqlCompat(  );
	}

	return ->mysqlFetchObject( $statement );
}

function mysql_fetch_row($statement = null) {
	if (!checkIsPdoStatement( $statement, 'mysql_fetch_row' )) {
		return null;
		getMysqlCompat(  );
	}

	return ->mysqlFetchRow( $statement );
}

function mysql_field_flags() {
	throw new BadFunctionCallException( 'mysql_field_flags' . ' is not supported' );
}

function mysql_field_len() {
	throw new BadFunctionCallException( 'mysql_field_len' . ' is not supported' );
}

function mysql_field_name() {
	throw new BadFunctionCallException( 'mysql_field_name' . ' is not supported' );
}

function mysql_field_seek() {
	throw new BadFunctionCallException( 'mysql_field_seek' . ' is not supported' );
}

function mysql_field_table() {
	throw new BadFunctionCallException( 'mysql_field_table' . ' is not supported' );
}

function mysql_field_type() {
	throw new BadFunctionCallException( 'mysql_field_type' . ' is not supported' );
}

function mysql_free_result() {
	throw new BadFunctionCallException( 'mysql_free_result' . ' is not supported' );
}

/**
 * Return MySQL client info
 *
 * If an old MySQL Resource link is passed, it will be ignored and the core PDO
 * will be used.
 *
 * @param null|PDO|Resource $pdo
 *
 * @return string
 */
function mysql_get_client_info($pdo = null) {
	return getMysqlCompat(  )->mysqlGetClientInfo( $pdo );
}

function mysql_get_host_info() {
	throw new BadFunctionCallException( 'mysql_get_host_info' . ' is not supported' );
}

function mysql_get_proto_info() {
	throw new BadFunctionCallException( 'mysql_get_proto_info' . ' is not supported' );
}

/**
 * Return MySQL server info
 *
 * If an old MySQL Resource link is passed, it will be ignored and the core PDO
 * will be used.
 *
 * @param null|PDO|Resource $pdo
 *
 * @return string
 */
function mysql_get_server_info($pdo = null) {
	return getMysqlCompat(  )->mysqlGetServerInfo( $pdo );
}

function mysql_info() {
	throw new BadFunctionCallException( 'mysql_info' . ' is not supported' );
}

/**
 * @return int|null
 */
function mysql_insert_id() {
	return getMysqlCompat(  )->mysqlInsertId(  );
}

function mysql_list_dbs() {
	throw new BadFunctionCallException( 'mysql_list_dbs' . ' is not supported' );
}

function mysql_list_fields() {
	throw new BadFunctionCallException( 'mysql_list_fields' . ' is not supported' );
}

function mysql_list_processes() {
	throw new BadFunctionCallException( 'mysql_list_processes' . ' is not supported' );
}

function mysql_list_tables() {
	throw new BadFunctionCallException( 'mysql_list_tables' . ' is not supported' );
}

/**
 * @param mixed $statement
 *
 * @return int
 */
function mysql_num_fields($statement = null) {
	if (!checkIsPdoStatement( $statement, 'mysql_num_fields' )) {
	}

}

/**
 * @param mixed $statement
 *
 * @return int
 */
function mysql_num_rows($statement = null) {
	if (!checkIsPdoStatement( $statement, 'mysql_num_rows' )) {
	}

}

function mysql_pconnect() {
	throw new BadFunctionCallException( 'mysql_pconnect' . ' is not supported' );
}

function mysql_ping() {
	throw new BadFunctionCallException( 'mysql_ping' . ' is not supported' );
}

/**
 * @param string $query
 *
 * @return bool|int|PDOStatement
 */
function mysql_query($query) {
	return getMysqlCompat(  )->mysqlQuery( $query );
}

/**
 * @param string $data
 *
 * @return string
 */
function mysql_real_escape_string($data) {
	return getMysqlCompat(  )->mysqlRealEscapeString( $data );
}

function mysql_result() {
	throw new BadFunctionCallException( 'mysql_result' . ' is not supported' );
}

function mysql_select_db() {
	throw new BadFunctionCallException( 'mysql_select_db' . ' is not supported' );
}

function mysql_set_charset() {
	throw new BadFunctionCallException( 'mysql_set_charset' . ' is not supported' );
}

function mysql_stat() {
	throw new BadFunctionCallException( 'mysql_stat' . ' is not supported' );
}

function mysql_tablename() {
	throw new BadFunctionCallException( 'mysql_tablename' . ' is not supported' );
}

function mysql_thread_id() {
	throw new BadFunctionCallException( 'mysql_thread_id' . ' is not supported' );
}

function mysql_unbuffered_query() {
	throw new BadFunctionCallException( 'mysql_unbuffered_query' . ' is not supported' );
}

?>
