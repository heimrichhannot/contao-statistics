<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2016 Heimrich & Hannot GmbH
 * @package statistics
 * @author Dennis Patzer
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\Statistics;


use HeimrichHannot\FieldPalette\FieldPaletteModel;
use HeimrichHannot\Haste\Database\QueryHelper;

class Statistics
{
	const MODULE_COUNTER = 'statistics_counter';
	const MODULE_DISTRIBUTION_TABLE = 'statistics_distribution_table';
	const MODULE_DISTRIBUTION_PIE_CHART = 'statistics_distribution_pie_chart';

	public static function getStatisticConditions($arrConditions)
	{
		$arrResultConditions = array();
		$arrValues = array();

		if (($objConditions = FieldPaletteModel::findPublishedByIds($arrConditions)) !== null)
		{
			while ($objConditions->next())
			{
				$strOperator = QueryHelper::transformVerboseOperator($objConditions->statistics_conditions_operator);

				if ($strOperator !== false)
				{
					$arrCondition = QueryHelper::computeCondition(
						$objConditions->statistics_conditions_field, $strOperator,
						$objConditions->statistics_conditions_value
					);

					$arrResultConditions[] = $arrCondition[0];

					$arrValues = array_merge($arrValues, $arrCondition[1]);
				}
			}
		}

		return array($arrResultConditions, $arrValues);
	}
}