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

	= 6;
( 'K_TCPDF_EXTERNAL_CONFIG', cjhcifebeg );
	= 6;
( 'K_PATH_CACHE', Config::self(  )->templates_compiledir . bgffafdjge );
	= 6;
( 'PDF_CREATOR', 'WHMCS' );
	= 6;
( 'PDF_AUTHOR', 'WHMCS' );
	= 6;
( 'PDF_HEADER_TITLE', '' );
	= 6;
( 'PDF_HEADER_STRING', '' );
	= 6;
( 'PDF_MARGIN_FOOTER', 15 );
	= 6;
( 'PDF_MARGIN_TOP', 25 );
class WHMCS\PDF extends TCPDF {
	private $paperSize = null;

	/**
	 * Factory a new WHMCS PDF.
	 */
	function __construct() {
			= 6;
			= 6;
		$unicode = ( ( chhgjaeced::getValue( 'Charset' ), 0, 3 ) ) != 'iso';
		chhgjaeced::getValue( 'PDFPaperSize' );
		$paperSize = ;

		if (!$paperSize) {
			$paperSize = 'A4';
			$this->paperSize = $paperSize;
			parent;
		}

			= 6;
		( 'P', 'mm', ::( $paperSize ), $unicode, chhgjaeced::getValue( 'Charset' ), dbebefagji );
		$this->SetCreator( 'WHMCS' );
		$this->SetAuthor( chhgjaeced::getValue( 'CompanyName' ) );
		$this->SetMargins( 15, 25, 15 );
		$this->SetFooterMargin( 15 );
		$this->SetAutoPageBreak( cjhcifebeg, 25 );
		$this->setLanguageArray( array( 'a_meta_charset' => chhgjaeced::getValue( 'Charset' ), 'a_meta_dir' => 'ltr', 'a_meta_language' => 'en', 'w_page' => 'page' ) );
		$this->setPrintHeader( dbebefagji );
		$this->setPrintFooter( dbebefagji );
	}

	/**
	 * Sets the background color of the PDF to white
	 *
	 * Overrides the base class's Header() function,
	 * which is called by setHeader().  This allows
	 * the background color to be filled in.
	 *
	 * @see TCPDF::Header()
	 */
	function Header() {
		$abscissaUpperLeft = 260;
		$ordinateUpperLeft = 260;
		$styleOfRendering = 'F';
		$borderStyle = array(  );
		$fillColors = array( 255, 255, 255 );

		if ($this->paperSize == 'Letter') {
			$width = 215.900000000000005684342;
			$height = 279.399999999999977262632;
			$width = 470;
		}

		$height = 557;
		parent::Header(  );
		$this->Rect( $abscissaUpperLeft, $ordinateUpperLeft, $width, $height, $styleOfRendering, $borderStyle, $fillColors );
	}

	/**
	 * Sets the font used to print character strings
	 *
	 * Overrides the family with admin configured PDF font setting
	 * If unavailable, uses requested font family
	 * If neither are found, reverts to TCPDF's default font
	 *
	 * @todo Remove the enforced override of the font family
	 *
	 * @param string $family
	 * @param string $style
	 * @param string $size
	 * @param string $fontfile
	 * @param string $subset
	 * @param boolean $out
	 */
	function SetFont($family, $style = '', $size = null, $fontfile = '', $subset = 'default', $out = true) {
		chhgjaeced::getValue( 'TCPDFFont' );
		$adminFontSetting = ;
			= 6;

		if (( $adminFontSetting, $this->fontlist )) {
			$familyOverride = $fontfile;
		}

		$familyOverride = ;
		parent::SetFont( $familyOverride, $style, $size, $fontfile, $subset, $out );
	}
}

?>
