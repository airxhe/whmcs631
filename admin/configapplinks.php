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

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'Configure Application Links' );
$aInt = ;
$aInt->title = AdminLang::trans( 'setup.applicationLinks' );
$aInt->sidebar = 'config';
$aInt->icon = 'autosettings';
$aInt->helplink = 'Application Links';
$whmcs->get_req_var( 'action' );
$action = ;

if ($action == 'toggle') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'state' );
	$state = ;
	explode( '_', $whmcs->get_req_var( 'module' ) );
	$module = ;
	$module[1];
	$moduleName = ;

	if ($state == 'true') {
		new dcifejaiba(  );
		$moduleInterface = ;
		$moduleInterface->load( $moduleName );
		$moduleInterface->enableApplicationLinks(  );
		logActivity(  . 'Application Links Enabled for ' . $moduleInterface->getDisplayName(  ) );
	}
	else {
		0 < ;

		if ((bool)) {
			$configureLink = '<a href="#" class="btn btn-link" id="btn' . $uCFirstModuleName . 'Configure" data-toggle="modal" data-target="#modalConfigure' . $uCFirstModuleName . 'Settings">Configure</a>';
		}
	}
}

( 'status.active' );
$activeString = ;
AdminLang::trans( 'global.viewLog' );
$viewLogString = ;
AdminLang::trans( 'global.warnings' );
$warningsString = ;
echo ( (  . '<div class="inset-element-container">
    <div class="row">
        <div class="col-sm-3 bottom-xs-margin">
            <img src="' . $logo . '" class="img-responsive center-block" alt="' . $moduleInterface->getDisplayName(  ) . '" />
        </div>
        <div class="col-sm-6 bottom-xs-margin">
            <div class="bottom-margin-5">' . $moduleInterface->getApplicationLinkDescription(  ) . $noServersMsg . '</div>
            <div id="status' . $uCFirstModuleName . '">
                <span id="status' . $uCFirstModuleName . 'Disabled" class="label label-default app-link-status' . $disabledStatus . '">
                    <i class="fa fa-times"></i>
                    ' . $disabledString . '
                </span>
                <span id="status' . $uCFirstModuleName . 'Initialising" class="label label-warning app-link-status hidden">
                    <i class="fa fa-spinner fa-spin"></i>
                    ' . $initAppLinksString . '
                </span>
                <span id="status' . $uCFirstModuleName . 'Updating" class="label label-warning app-link-status hidden">
                    <i class="fa fa-spinner fa-spin"></i>
                    ' . $savingConfigString . '
                </span>
                <span id="status' . $uCFirstModuleName . 'Disabling" class="label label-warning app-link-status hidden">
                    <i class="fa fa-spinner fa-spin"></i>
                    ' . $disablingString . '
                </span>
                <span id="status' . $uCFirstModuleName . 'Active" class="label label-success app-link-status' . $activeStatus . '">
                    <i class="fa fa-check-circle"></i>
                    ' . $activeString . '
                </span>
                &nbsp;
                <button id="btn' . $uCFirstModuleName . 'ViewLog" class="btn btn-default btn-xs" onclick="showLogModal(\'' . $moduleInterface->getType(  ) . '\', \'' . $moduleInterface->getLoadedModule(  ) . '\')">
                    <i class="fa fa-file-text-o"></i>
                    ' . $viewLogString . ' (<span id="btn' . $uCFirstModuleName . 'ViewLogWarningCount">' . $logWarningCount . '</span> ' . $warningsString . ')
                </button>
            </div>
        </div>
        <div class="col-sm-3 text-center">
            <input id="input' . $uCFirstModuleName . 'Status" type="checkbox" name="' . $moduleInterface->getType(  ) . '_' ) . $module . '"' ) . $appLinkStatus . ' class="app-toggle-switch"><br />
            ' . $configureLink . '
        </div>
    </div>
</div>';
AdminLang::trans( 'appLinks.configureWhichLinks' );
$configureWhichLinksString = ;
AdminLang::trans( 'appLinks.dragAndDrop' );
$dragAndDropString = ;
AdminLang::trans( 'appLinks.linkDescription' );
$linkDescString = ;
AdminLang::trans( 'appLinks.displayLabel' );
$displayLabelString = ;
generate_token(  );
$configToken = ;
$modalContent =  . '<p>' . $configureWhichLinksString . '<br /><em>' . $dragAndDropString . '</em></p>
<form id=\'frmConfigure' . $uCFirstModuleName . '\'>
    ' . $configToken . '
    <table class=\'table table-striped applink-links\' id=\'tbl' . $uCFirstModuleName . 'Links\'>
        <thead>
            <tr>
                <td></td>
                <td>' . $linkDescString . '</td>
                <td class=\'text-center\'>' . $displayLabelString . '</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
';

if (is_array( $availableAppLinks )) {
	biiiejbdgg::firstOrNew( array( 'module_type' => $moduleInterface->getType(  ), 'module_name' => $moduleInterface->getLoadedModule(  ) ) );
	$appLink = ;
	$sortedTableRows = array(  );
	$unsortedTableRows = array(  );
	foreach ($availableAppLinks as ) {
		$link = ;
		$scope = ;
		$isEnabled = true;
		$link['label'];
		$displayLabel = ;
		$order = 8;
		$appLink->links(  )->whereScope( $scope )->first(  );
		$dbLink = ;

		if (!is_null( $dbLink )) {
			$dbLink->isEnabled;
			$isEnabled = ;
			$dbLink->displayLabel;
			$displayLabel = ;
			$dbLink->order;
			$order = ;
			str_replace( ':', '.', $scope );
			$postScope = ;
			'
                            <tr id="' . $postScope . '">
                                <td class="applink-link-input-offset"><input type="checkbox" name="enabled[' . $postScope . ']" value="1"';

			if ($isEnabled) {
				$row =  . (true ? ' checked' : '') . ' class="toggle-switch" data-size="small" /></td>
                                <td><strong>' . $link['label'] . '</strong><br />' . $link['description'] . '</td>
                                <td class="applink-link-input-offset"><input type="text" name="label[' . $postScope . ']" value="' . $displayLabel . '" class="form-control input-sm" /></td>
                                <td class="sortcol">&nbsp;</td>
                            </tr>
                        ';

				if (0 < $order) {
					$sortedTableRows[$order] = $row;
					break;
				}

				break;
			}
		}
	}
}

ksort( $sortedTableRows );
ksort( $unsortedTableRows );
$modalContent .= implode( $sortedTableRows ) . implode( $unsortedTableRows );

while (true) {
	$modalContent .= '
        </tbody>
    </table>
</form>';

	while (true) {
		$aInt->modal( 'Configure' . $uCFirstModuleName . 'Settings', AdminLang::trans( 'appLinks.configAppLinks' ), $modalContent, array( array( 'title' => AdminLang::trans( 'global.savechanges' ), 'class' => 'btn-primary', 'onclick' => 'configurationSubmit("' . $uCFirstModuleName . '");' ), array( 'title' => AdminLang::trans( 'global.cancel' ) ) ), 'large' );
		$modalOutput .= ;
	}
}

echo '
</div>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->modal( 'LogView', 'Viewing Log', AdminLang::trans( 'global.loading' ), array( array( 'title' => 'Dismiss' ) ), '', 'default' );
$modalOutput .= ;
$content .= $modalOutput . cffcebchbh::jsInclude( 'jqueryro.js' );
$jsCode = '
function configurationSubmit(moduleName) {
    jQuery("#modalConfigure" + moduleName + "Settings").modal("hide");

    if (jQuery("#input" + moduleName + "Status").is(":checked")) {
        jQuery("#status" + moduleName + " .app-link-status").addClass("hidden");
        jQuery("#status" + moduleName + "Updating").removeClass("hidden");
        jQuery("#btn" + moduleName + "Configure").addClass("disabled");
        jQuery("#btn" + moduleName + "ViewLog").hide();
    }

    jQuery.post(
        "configapplinks.php",
        "action=savemoduleconfig&" + jQuery("#frmConfigure" + moduleName).serialize() + "&" + jQuery("#tbl" + moduleName + "Links").tableDnDSerialize(),
        function(data) {
            if (jQuery("#input" + moduleName + "Status").is(":checked")) {
                jQuery(".app-link-status").addClass("hidden");
                jQuery("#status" + moduleName + "Active").removeClass("hidden");
                jQuery("#btn" + moduleName + "Configure").removeClass("disabled");
                jQuery("#btn" + moduleName + "ViewLogWarningCount").html(data);
                jQuery("#btn" + moduleName + "ViewLog").fadeIn();
            }
        }
    );
}
function showLogModal(moduleType, moduleName) {
    jQuery("#modalLogView").modal("show");
    jQuery.post("configapplinks.php", "action=getlog&moduletype=" + moduleType + "&modulename=" + moduleName,
        function( data ) {
            jQuery("#modalLogView .modal-body").html(data);
        });
}
';
generate_token( 'plain' );
$token = ;
$jQueryCode =  . 'jQuery(".toggle-switch").bootstrapSwitch();
jQuery(".app-toggle-switch").bootstrapSwitch(
    {
        \'onColor\': \'success\',
        \'onSwitchChange\': function(event, state)
        {
            var moduleName;
            var regex;
            var match;

            // Will be in the form \'type_module\'
            regex = /^[^_]+_(.+)$/;
            match = regex.exec(this.name);
            moduleName = match[1];

            // ucfirst on the module name;
            moduleName = moduleName.charAt(0).toUpperCase() + moduleName.substring(1).toLowerCase();

            if (state) {
                jQuery(".app-link-status").addClass("hidden");
                jQuery("#status" + moduleName + "Initialising").removeClass("hidden");
            } else {
                jQuery(".app-link-status").addClass("hidden");
                jQuery("#status" + moduleName + "Disabling").removeClass("hidden");
            }
            jQuery("#btn" + moduleName + "Configure").addClass("disabled");
            jQuery("#btn" + moduleName + "ViewLog").hide();

            jQuery.post(
                \'configapplinks.php\',
                {
                    action: \'toggle\',
                    state: state,
                    module: event.target[\'name\'],
                    token: \'' . $token . '\'
                },
                function(data) {
                    if (state) {
                        jQuery(".app-link-status").addClass("hidden");
                        jQuery("#status" + moduleName + "Active").removeClass("hidden");
                    } else {
                        jQuery(".app-link-status").addClass("hidden");
                        jQuery("#status" + moduleName + "Disabled").removeClass("hidden");
                    }
                    jQuery("#btn" + moduleName + "Configure").removeClass("disabled");
                    jQuery("#btn" + moduleName + "ViewLogWarningCount").html(data);
                    jQuery("#btn" + moduleName + "ViewLog").fadeIn();
                }
            );
        }
    }
);';
$jQueryCode .= '
$(".applink-links tbody").tableDnD({
    dragHandle: "sortcol"
});
jQuery("#modalLogView").on("hidden.bs.modal", function () {
    jQuery("#modalLogView .modal-body").html("' . AdminLang::trans( 'global.loading' ) . '");
});
';
$aInt->content = $content;
$aInt->jquerycode = $jQueryCode;
$aInt->jscode = $jsCode;
$aInt->display(  );
?>
