<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Legacy_Component_Model_Inbound_Frames extends Sao_Zed_Legacy_Component_Model_Share_Adapter_Db implements
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    const LEGACY_TABLE_OFFERING = 'print_offering_framings';
    const LEGACY_TABLE_FRAMEING_TYPES = 'framing_types';

    /**
     * @return array
     */
    protected function getAllFramings()
    {
        return $this->getAdapter()->select()
            ->from(['p'=>static::LEGACY_TABLE_OFFERING], ['id', 'price'])
            ->joinInner(['f'=>static::LEGACY_TABLE_FRAMEING_TYPES], 'p.framing_type_id = f.id', ['name', 'description'])
            ->where('f.deleted = 0')
            ->where('p.deleted = 0')
            ->query()
            ->fetchAll();
    }

    public function synchronizeFrames()
    {
        $frames = $this->getAllFramings();
        $optionType = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypeQuery::create()->findOneByName(ProjectA_Shared_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_FRAME);

        if (ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery::create()->filterByOptionType($optionType)->findOne()) {
            throw new Exception('migration was already executed.');
        }

        if (empty($optionType)) {
            throw new Exception('Option type frame does not exist');
        }

        foreach ($frames as $frame) {
            $identifier = 'F' . $frame['id'];
            $option = $this->facadeCatalog->getProductOptionByIdentifier($identifier);
            if (empty($option)) {
                $option = Generated_Zed_EntityLoader::getPacCatalogOption();
            }
            $option->setName($frame['name']);
            $option->setIdentifier($identifier);
            $option->setOptionType($optionType);
            $option->setDescription($frame['description']);
            $option->setPrice($frame['price'] * 100); // in cent
            $option->setTaxPercentage(0);
            $option->save();
            $option->clearAllReferences();
        }
    }

}
