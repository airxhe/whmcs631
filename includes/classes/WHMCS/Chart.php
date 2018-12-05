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

class WHMCS\Chart {
	var $chartcount = 0;

	function __construct() {
	}

	function drawChart($type, $data, $args = array(  ), $height = '300px', $width = '100%') {
		global $aInt;

			= 6;

		if (!( $data )) {
			$datafunc = (true ? $data : '');
				= 6;

			if (( $datafunc && !( 'json_encode' ) )) {
				return 'JSON appears to be missing from your PHP build and is required for graphs to function. Please recompile PHP with JSON included and then try again.';

				while (( $datafunc && isset( $_POST['chartdata'] ) )) {
					if ($_POST['chartdata'] == $datafunc) {
							= 6;

						if (( 'chartdata_' . $datafunc )) {
								= 6;
							( 'chartdata_' . $datafunc );
							$chartdata = ;
							foreach ($chartdata['cols'] as ) {
								$col = ;
								$k = ;

								if (isset( $chartdata['cols'][$k]['label'] )) {
										= 6;
									$chartdata['cols'][$k]['label'] = ( $chartdata['cols'][$k]['label'] );
									break;
								}

								break;
							}

								= 6;
							echo ( $chartdata );
							exit(  );
							jmp;
							exit( 'Function Not Found' );

							if ($this->chartcount == 0) {
									= 6;

								if (( $aInt->headOutput )) {
									$aInt->headOutput .= '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';
								}
							}

							if (isset( $args['xlabel'] )) = ;

							if (( isset( $args['stacked'] ) && $args['stacked'] )) {
								$options[] = 'isStacked: true';

								if ($type == 'Geo') {
									'geochart';
								}
							}

							$output = '
            <script type="text/javascript">
            google.load("visualization", "1", {packages:["' . 'corechart' . '"]});
            google.setOnLoadCallback(drawChart' . $this->chartcount . ');
            function drawChart' . $this->chartcount . '() {';

							if ($datafunc) {
								$output .= '
            var jsonData = $.ajax({
                url: "' . $_SERVER['PHP_SELF'] . '",
                type: "POST",
                data: "chartdata=' . $datafunc . '",
                dataType:"json",
                async: false
            }).responseText;
            ';
								break;
							}
						}
					}
				}
			}
		}

		$row = ;
		$k = ;

		if (isset( $data['rows'][$k]['c'] )) {
				= 6;
			$data['rows'][$k]['c'][0]['v'] = ( $data['rows'][$k]['c'][0]['v'] );
				= 6;
			$data['rows'][$k]['c'][1]['v'] = ( $data['rows'][$k]['c'][1]['v'] );

			if (!empty( $data['rows'][$k]['c'][1]['f'] )) {
					= 6;
				$data['rows'][$k]['c'][1]['f'] = ( $data['rows'][$k]['c'][1]['f'] );
			}

			jmp;
				= 6;
			$output .=  . ( $height / 2 - 10, 0 ) . 'px;text-align:center;"><img src="images/loading.gif" /> Loading...</div></div>
        ';
			$aInt->chartFunctions[] = 'drawChart' . $this->chartcount;
			return $output;
		}
	}
}

?>
