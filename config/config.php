<?php

/**
 * Assets
 */
if (TL_MODE == 'FE')
{
	// js
	$GLOBALS['TL_JAVASCRIPT']['statistics_chart.js'] =
		'system/modules/statistics/assets/vendor/Chart.js-2.1.6/dist/Chart.min.js|static';

	$GLOBALS['TL_JAVASCRIPT']['statistics'] =
		'system/modules/statistics/assets/js/jquery.statistics.js';
}
