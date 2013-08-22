<?php

/**
 * @property Sao_Zed_Misc_Component_Factory $factory
 */
class Sao_Zed_Misc_Component_Facade extends ProjectA_Zed_Misc_Component_Facade
{

    /**
     * @return ProjectA_Zed_Library_Propel_LazyCollection
     */
    public function getRegions()
    {
        return $this->factory->getModelRegion()->getRegions();
    }

    /**
     * @param string $shortName
     * @return Sao_Zed_Misc_Persistence_MiscRegion
     */
    public function getRegionByShortName($shortName)
    {
        return $this->factory->getModelRegion()->getRegionByShortName($shortName);
    }

    /**
     * @param string $name
     * @return Sao_Zed_Misc_Persistence_MiscRegion
     */
    public function getRegionByName($name)
    {
        return $this->factory->getModelRegion()->getRegionByName($name);
    }

}
