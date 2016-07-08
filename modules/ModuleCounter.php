<?php

namespace HeimrichHannot\Statistics;

abstract class ModuleCounter extends \Module
{
	protected $strTemplate = 'mod_counter';
	protected $strWrapperId = 'statistics_counter_';
	protected $strWrapperClass = 'statistics_counter';

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### STATISTICS COUNTER ###';
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

		$this->Template->count = $this->getValue();
	}

	abstract protected function getValue();

}
