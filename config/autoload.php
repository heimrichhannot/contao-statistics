<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'HeimrichHannot\Statistics\ModuleDistributionPieChart' => 'system/modules/statistics/modules/ModuleDistributionPieChart.php',
	'HeimrichHannot\Statistics\ModuleCounter'              => 'system/modules/statistics/modules/ModuleCounter.php',

	// Classes
	'HeimrichHannot\Statistics\Chart'                      => 'system/modules/statistics/classes/Chart.php',
	'HeimrichHannot\Statistics\PieChart'                   => 'system/modules/statistics/classes/PieChart.php',
	'HeimrichHannot\Statistics\Statistics'                 => 'system/modules/statistics/classes/Statistics.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_distribution_pie_chart' => 'system/modules/statistics/templates',
	'mod_counter'                => 'system/modules/statistics/templates',
	'statistics_pie_chart'       => 'system/modules/statistics/templates/charts',
));
