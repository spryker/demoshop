<?php

/**
 * Class Sao_Zed_Yves_Component_Model_Export_Exporter_Memcache_Regions
 *
 * @property Sao_Zed_Misc_Component_Facade $facadeMisc
 */
class Sao_Zed_Yves_Component_Model_Export_Exporter_Memcache_Regions implements
    ProjectA_Zed_Yves_Component_Interface_Exporter_Memcache,
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Misc_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Generated_Zed_Yves_Component_Factory
     */
    protected $factory;

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Task_Entity
     */
    public function getExportTask()
    {
        $task = $this->factory->getModelExportTaskEntity();
        $task->setItemType(Sao_Zed_Yves_Component_Interface_ItemConstants::ITEM_TYPE_REGIONS);
        $task->setItemEvent(Sao_Zed_Yves_Component_Interface_ItemConstants::ITEM_EVENT_UPDATE);
        $task->setLazyCollection($this->facadeMisc->getRegions());
        $task->setPrimaryKeyColumnName(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION);

        return $task;
    }

    /**
     * @param Traversable $regionCollection
     * @param ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel
     * @param ArrayIterator $reporter
     */
    public function exportData(
        Traversable $regionCollection, ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel, ArrayIterator $reporter
    )
    {
        /* @var $regionCollection ProjectA_Zed_Library_Propel_LazyCollection */
        $regionsByCountry = $this->groupRegionsByCountry($regionCollection);

        $data = array();
        foreach ($regionsByCountry as $iso2 => $regions) {
            $data[Sao_Shared_Library_Storage::getRegionsKey($iso2)] = $regions;
        }

        $allRegions = $this->getAllRegions();

        $data[Sao_Shared_Library_Storage::getCountriesWithRegionsKey()] = $allRegions;
        $data[Sao_Shared_Library_Storage::getCountriesWithRegionsAsJSONKey()] = json_encode($allRegions);

        $exportModel->write($data);
        $reporter['Regions exported'] = array_sum(array_map('count', $regionsByCountry));
    }

    protected function getAllRegions()
    {
        return $this->groupRegionsByCountry($this->facadeMisc->getRegions());
    }

    /**
     * @param ProjectA_Zed_Library_Propel_LazyCollection $regionCollection
     *
     * @return array
     */
    protected function groupRegionsByCountry(ProjectA_Zed_Library_Propel_LazyCollection $regionCollection)
    {
        $regionsByCountry = array();
        /* @var $region Generated_Zed_Misc_Persistence_Om_BaseSaoMiscRegion */
        foreach ($regionCollection as $region) {
            $countryIso2 = $region->getCountry()->getIso2Code();
            if (!isset($regionsByCountry[$countryIso2])) {
                $regionsByCountry[$countryIso2] = array();
            }
            $regionsByCountry[$countryIso2][$region->getShortName()] = $region->getName();
        }

        return $regionsByCountry;

    }
}
