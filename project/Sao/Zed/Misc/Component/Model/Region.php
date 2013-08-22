<?php

class Sao_Zed_Misc_Component_Model_Region
{

    /**
     * @return ProjectA_Zed_Library_Propel_LazyCollection
     */
    public function getRegions()
    {
        $query = Sao_Zed_Misc_Persistence_SaoMiscRegionQuery::create()->orderByName();

        return new ProjectA_Zed_Library_Propel_LazyCollection($query);
    }

    /**
     * @param string $shortName
     * @return Sao_Zed_Misc_Persistence_MiscRegion
     */
    public function getRegionByShortName($shortName)
    {
        $query = new Sao_Zed_Misc_Persistence_SaoMiscRegionQuery();
        return $query->findOneByShortName($shortName);
    }

    /**
     * @param string $name
     * @return Sao_Zed_Misc_Persistence_MiscRegion
     */
    public function getRegionByName($name)
    {
        $query = new Sao_Zed_Misc_Persistence_SaoMiscRegionQuery();
        return $query->findOneByName($name);
    }

}