<?php

/**
 * Skeleton subclass for representing a row from the 'sao_misc_region' table.
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.project/Zed/application/components/Sao/Misc/Entity
 */
class Sao_Zed_Misc_Persistence_SaoMiscRegion extends Generated_Zed_Misc_Persistence_Om_BaseSaoMiscRegion implements ProjectA_Zed_Yves_Component_Interface_TouchEntity, ProjectA_Zed_Yves_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Yves_Component_Trait_TouchEntity;
    use ProjectA_Zed_Yves_Component_Dependency_Facade_Trait;

    public function __construct()
    {
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($this);
        parent::__construct();
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return true;
    }

    public function touch()
    {
        $this->facadeYves->touch(
            $this, Sao_Zed_Yves_Component_Interface_ItemConstants::ITEM_TYPE_REGIONS,
            Sao_Zed_Yves_Component_Interface_ItemConstants::ITEM_EVENT_UPDATE
        );
    }

}
