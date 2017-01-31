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


abstract class Chart
{
    /**
     * Current template
     *
     * @var string
     */
    protected $strTemplate;

    /**
     * Current Template object
     *
     * @var \FrontendTemplate
     */
    protected $objTemplate;

    /**
     * Current context
     *
     * @var
     */
    protected $varContext;


    /**
     * Current context data
     *
     * @var
     */
    protected $arrData;

    /**
     * Chart values
     *
     * @var array
     */
    protected $arrValues;

    /**
     * Chart labels
     *
     * @var
     */
    protected $arrLabels;

    /**
     * Chart config
     *
     * @var
     */
    protected $arrConfig;

    /**
     * Chart type
     *
     * @var
     */
    protected $strType;

    public function __construct($varContext)
    {
        $this->varContext = $varContext;

        if ($varContext instanceof \Model || $varContext instanceof \Model\Collection)
        {
            /** @var \ModuleModel $objModel */
            $objModel = $varContext;

            if ($objModel instanceof \Model\Collection)
            {
                $objModel = $objModel->current();
            }

            $this->arrData = $objModel->row();
        }
    }

    public function generate()
    {
        $this->objTemplate = new \FrontendTemplate($this->strTemplate);
        $this->objTemplate->setData($this->arrData);
        $this->objTemplate->strWrapperClass = $this->strWrapperClass;

        $this->objTemplate->values = htmlentities(json_encode($this->getValues()));
        $this->objTemplate->labels = htmlentities(json_encode($this->getLabels()));
        $this->objTemplate->config = htmlentities(json_encode(array_merge($this->getConfig(), $this->getDefaults())));
        $this->objTemplate->type   = $this->getType();

        $this->compile();

        return $this->objTemplate->parse();
    }

    abstract protected function compile();

    protected function getDefaults()
    {
        return array();
    }

    /**
     * @return \FrontendTemplate
     */
    public function getTemplate()
    {
        return $this->objTemplate;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->varContext;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->arrData;
    }

    /**
     * @param mixed $arrData
     */
    public function setData($arrData)
    {
        $this->arrData = $arrData;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->arrValues;
    }

    /**
     * @param array $arrValues
     */
    public function setValues(array $arrValues)
    {
        $this->arrValues = $arrValues;
    }

    /**
     * @return mixed
     */
    public function getLabels()
    {
        return $this->arrLabels;
    }

    /**
     * @param mixed $arrLabels
     */
    public function setLabels(array $arrLabels)
    {
        $this->arrLabels = $arrLabels;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->arrConfig;
    }

    /**
     * @param mixed $arrConfig
     */
    public function setConfig($arrConfig)
    {
        $this->arrConfig = $arrConfig;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->strType;
    }

    /**
     * @param mixed $strType
     */
    public function setType($strType)
    {
        $this->strType = $strType;
    }
}