<?php

/**
 * Assets
 */
// js
$GLOBALS['TL_JAVASCRIPT']['statistics_chart.js'] = 'system/modules/statistics/assets/vendor/Chart.js-2.1.6/dist/Chart.min.js|static';

$GLOBALS['TL_JAVASCRIPT']['statistics'] = 'system/modules/statistics/assets/js/jquery.statistics.min.js|static';


/**
 * Component support (disable/enable css & js on page layout)
 */
$GLOBALS['TL_COMPONENTS']['statistics'] = [
    'js'  => [
        'system/modules/statistics/assets/vendor/Chart.js-2.1.6/dist/Chart.min.js',
        'system/modules/statistics/assets/js/jquery.statistics.min.js'
    ]
];
