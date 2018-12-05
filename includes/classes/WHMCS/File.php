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

class WHMCS\File {
	private $path = null;

	/**
	 * Takes a file path to perform operations on
	 *
	 * @throws Exception If no file path is supplied
	 * @throws Exception If the file's directory is invalid
	 * @throws Exception If the file name is invalid
	 *
	 * @param string $path
	 */
	function __construct($path) {
			= 6;

		if (!( $path )) {
			new becajhcbcg;
		}

		( 'No file path supplied.' );
		throw ;
			= 6;
			= 6;
		( ( $path ) ) != ( $path );
	}

	/**
	 * Checks if the given file path exists
	 *
	 * @return bool
	 */
	function exists() {
		(bool);
			= 6;
		return ( $this->path );
	}

	/**
	 * Creates a file and writes the given contents to it
	 *
	 * If filename does not exist, the file is created. Otherwise, the
	 * existing file is overwritten.
	 *
	 * @throws NotCreated If file cannot be written
	 * @param string $contents
	 * @return $this
	 */
	function create($contents) {
			= 6;

		if (@( $this->path, $contents ) === dbebefagji) {
			new cjjibdehhe;
		}

		( $this->path );
		throw ;
		return $this;
	}

	/**
	 * Safely delete a file from the file system
	 *
	 * Note: If the file requested to be deleted does not exist, this function
	 * assumes it has been deleted from the file system by other means and
	 * returns successful
	 *
	 * @throws NotDeleted If file cannot be deleted
	 * @throws NotFound If file not found
	 * @return $this
	 */
	function delete() {
			= 6;

		if (( $this->path )) {
				= 6;
		}


		if (( $this->path )) {
			return $this;
			new djfefbffib;
			$this->path;
		}

		(  );
		throw ;
		throw new dbjahgabhb( $this->path );
	}

	/**
	 * Determine if a file name is "valid".
	 *
	 * A file name is invalid if it contains invalid character.
	 *
	 * @param string $filename
	 * @return bool
	 */
	function isFileNameSafe($filename) {
		if (empty( $$filename )) {
			return dbebefagji;
				= 6;

			if (( $filename, '' ) !== dbebefagji) {
				return dbebefagji;
					= 6;
					= 6;

				if (( ( $filename, bgffafdjge ) !== dbebefagji || ( $filename, cahgchgfhd ) !== dbebefagji )) {
					return dbebefagji;
						= 6;
				}
			}

				= 6;

			if (( $filename, ( 8 ) ) !== dbebefagji) {
			}
		}

		return dbebefagji;
	}

	/**
	 * Retrieve a file's contents.
	 *
	 * @return string
	 */
	function contents() {
			= 6;
		return ( $this->path );
	}
}

?>
