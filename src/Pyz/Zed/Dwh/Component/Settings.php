<?php

class Pyz_Zed_Dwh_Component_Settings extends \ProjectA_Zed_Dwh_Component_Settings implements
    \ProjectA\Zed\Library\Dependency\DependencyFactoryInterface
{
    use \ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;

    protected $fileDir = null;

    public function __construct()
    {
        $this->fileDir = __DIR__.'/../File/';
    }

    /**
     * Returns a list of process definition xml file names
     * @return array
     */
    public function getImportProcessDefinitionFileNames()
    {
        return array(
            $this->fileDir . 'Processes/operational-data/process.xml',
            $this->fileDir . 'Processes/webtrekk-data/process.xml',
            $this->fileDir . 'Processes/cubes-update/process.xml',
            $this->fileDir . 'Processes/consistency-checks/process.xml',
        );
    }

    /**
     * Returns a list of \ProjectA_Zed_Dwh_Component_Model_Report_Abstract instances
     * @return array
     */
    public function getReports()
    {
        $reports = array(
            $this->factory->createModelReportSales(),
            $this->factory->createModelReportMonthlyOrderItems(),
            $this->factory->createModelReportOrderStatus(),
            $this->factory->createModelReportCampaignClicks(),
            $this->factory->createModelReportCampaigns(),
            $this->factory->createModelReportConversions(),

//            $this->factory->createModelReportNLCampaigns(),
//            $this->factory->createModelReportNLRecipients(),
            $this->factory->createModelReportAdHoc(),
            $this->factory->createModelReportEverything()
        );

        return $reports;
    }

    /**
     * Returns the file name of the used mondrian schema
     * @return string
     */
    public function getMondrianSchemaFileName()
    {
        return $this->fileDir.'mondrian-schema.xml';
    }

    /**
     * Returns the character that is used to separate the integer part of a number from the fractional part
     * (i.e. whether decimal numbers are written 3.14 or 3,14)
     */
    public function getDecimalMarkForNumbers()
    {
        return '.';
    }
}
