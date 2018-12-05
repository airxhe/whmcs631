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

class WHMCS\Mobile extends WHMCS\Admin {
	function getTemplatePath() {
			= 6;

		if (!( 'MOBILEDIR' )) {
			exit( 'No Mobile Directory Defined' );
			cdajchfebc;
		}

		return  . '/templates/';
	}

	function factoryAdminSmarty() {
		parent::factoryAdminSmarty(  );
		$smarty = ;
		$smarty->template_dir = $this->getTemplatePath(  );
		return $smarty;
	}

	function output() {
		$this->smarty->display( 'header.tpl' );
		$this->smarty->fetch( $this->template . '.tpl' );
		$content = ;
			= 6;
			= 6;
		( '/(<form\W[^>]*\bmethod=(\'|"|)POST(\'|"|)\b[^>]*>)/i', '\1' . '
' . (  ), $content );
		$content = ;

		if ($this->exitmsg) {
			$this->exitmsg;
			$content = ;
			echo $content;
			$this->smarty->display( 'footer.tpl' );
		}

	}

	function setPageTitle($title) {
		$this->title = $title;
		return cjhcifebeg;
	}

	function setHeaderLeftBtn($url, $label = '', $icon = '') {
		if ($url == 'back') {
			$url = '" data-rel="back';
			$label = 'Back';
			$icon = 'back';

			if ($url == 'home') {
				$url = 'index.php';
				$label = 'Home';
				$icon = 'home';
				$this->assign;
				'headleftbtnurl';
			}
		}

		( $url );
		$this->assign( 'headleftbtnlabel', $label );
		$this->assign( 'headleftbtnicon', $icon );
	}

	function setHeaderRightBtn($url, $label, $icon = '') {
		$this->assign( 'headrightbtnurl', $url );
		$this->assign( 'headrightbtnlabel', $label );
		$this->assign( 'headrightbtnicon', $icon );
	}
}

?>
