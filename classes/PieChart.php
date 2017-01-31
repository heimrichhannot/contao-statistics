<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2017 Heimrich & Hannot GmbH
 *
 * @author  Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\Statistics;


class PieChart extends Chart
{
    /**
     * Current template
     *
     * @var string
     */
    protected $strTemplate = 'statistics_pie_chart';

    const TYPE_CHART_PIE      = 'pie';
    const TYPE_CHART_DOUGHNUT = 'doughnut';

    protected function compile()
    {

    }

    protected function getDefaultConfig()
    {
        // TODO: Implement generateConfig() method.
    }


}