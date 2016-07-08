<?php

namespace HeimrichHannot\Statistics;

abstract class ModuleDistributionPieChart extends \Module
{
	protected $strTemplate = 'mod_distribution_pie_chart';
	protected $strWrapperId = 'statistics_distribution_pie_chart_';
	protected $strWrapperClass = 'statistics_distribution_pie_chart';

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### STATISTICS DISTRIBUTION PIE CHART ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		$this->strWrapperId .= $this->id;

		return parent::generate();
	}

	protected function compile()
	{
		// add properties
		$objReflection = new \ReflectionClass($this);

		foreach ($objReflection->getProperties() as $objProperty)
		{
			$this->Template->{$objProperty->name} = $this->{$objProperty->name};
		}

		$arrValues = $this->getValues();

		$this->Template->labels = $this->transformLabels($arrValues['labels']);
		$this->Template->data = $arrValues['data'];
	}

	abstract protected function getValues();
	
	protected function transformLabels($arrLabels)
	{
		return $arrLabels;
	}
}
