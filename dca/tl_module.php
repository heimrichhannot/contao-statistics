<?php

$arrDca = &$GLOBALS['TL_DCA']['tl_module'];

/**
 * Palettes
 */
$arrDca['palettes'][\HeimrichHannot\Statistics\Statistics::MODULE_COUNTER] =
	'{title_legend},name,headline,type;' .
	'{template_legend},customTpl;' .
	'{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$arrDca['palettes'][\HeimrichHannot\Statistics\Statistics::MODULE_DISTRIBUTION_PIE_CHART] =
	'{title_legend},name,headline,type;{config_legend};' .
	'{template_legend},customTpl;' .
	'{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';