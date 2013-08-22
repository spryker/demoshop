<?php

class Sao_Zed_Dwh_Component_Settings extends ProjectA_Zed_Dwh_Component_Settings
    implements ProjectA_Zed_Library_Dependency_FactoryInterface
{

    protected $fileDir = null;

    public function __construct(){
        $this->fileDir = __DIR__.'/../File/';
    }

    /** @var Sao_Zed_Dwh_Component_Factory */
    protected $factory;

    /** @param Sao_Component_ReportsInterface $factory */
    public function setFactory(ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory)
    {
        $this->factory = $factory;
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
//            APPLICATION_PROJECT . '/Zed/application/components/Sao/Dwh/Processes/mailchimp-data/process.xml',
            $this->fileDir . 'Processes/cubes-update/process.xml',
            $this->fileDir . 'Processes/consistency-checks/process.xml',
        );
    }

    /**
     * Returns a list of ProjectA_Zed_Dwh_Component_Model_Report_Abstract instances
     * @return array
     */
    public function getReports()
    {
        $reports = array(
            $this->factory->getModelReportSales(),
            $this->factory->getModelReportMonthlyOrderItems(),
            $this->factory->getModelReportOrderStatus(),
            $this->factory->getModelReportCampaignClicks(),
            $this->factory->getModelReportCampaigns(),
            $this->factory->getModelReportConversions(),

//            $this->factory->getModelReportNLCampaigns(),
//            $this->factory->getModelReportNLRecipients(),
            $this->factory->getModelReportAdHoc(),
            $this->factory->getModelReportEverything()
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