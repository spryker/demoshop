<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\NavigationNode;

use Orm\Zed\Navigation\Persistence\SpyNavigationNode;
use Orm\Zed\Navigation\Persistence\SpyNavigationNodeLocalizedAttributes;
use Orm\Zed\Navigation\Persistence\SpyNavigationNodeLocalizedAttributesQuery;
use Orm\Zed\Navigation\Persistence\SpyNavigationNodeQuery;
use Pyz\Zed\DataImport\Business\Exception\NavigationNodeByKeyNotFoundException;
use Pyz\Zed\DataImport\Business\Model\Product\LocalizedAttributesExtractorStep;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class NavigationNodeWriterStep implements DataImportStepInterface
{

    const DEFAULT_IS_ACTIVE = true;

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyNavigationNodeQuery::create();
        $navigationNodeEntity = $query
            ->filterByFkNavigation($dataSet['idNavigation'])
            ->filterByNodeKey($dataSet['node_key'])
            ->findOneOrCreate();

        $navigationNodeEntity->setPosition($this->getPosition($navigationNodeEntity, $dataSet));
        $navigationNodeEntity->setIsActive($this->getIsActive($navigationNodeEntity, $dataSet));
        $navigationNodeEntity->setNodeType($this->getNodeType($navigationNodeEntity, $dataSet));

        if (!empty($dataSet['parent_node_key'])) {
            $navigationNodeEntity->setFkParentNavigationNode(
                $this->getFkParentNavigationNode($dataSet['parent_node_key'])
            );
        }

        $navigationNodeEntity->save();

        foreach ($dataSet[LocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES] as $idLocale => $localizedAttributes) {
            $query = SpyNavigationNodeLocalizedAttributesQuery::create();
            $navigationNodeLocalizedAttributesEntity = $query
                ->filterByFkNavigationNode($navigationNodeEntity->getIdNavigationNode())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $navigationNodeLocalizedAttributesEntity->setTitle($this->getTitle($navigationNodeLocalizedAttributesEntity, $localizedAttributes));
            $navigationNodeLocalizedAttributesEntity->setLink($this->getLink($navigationNodeLocalizedAttributesEntity, $localizedAttributes));
            $navigationNodeLocalizedAttributesEntity->setCssClass($this->getCssClass($navigationNodeLocalizedAttributesEntity, $localizedAttributes));
            $navigationNodeLocalizedAttributesEntity->setExternalUrl($this->getExternalUrl($navigationNodeLocalizedAttributesEntity, $localizedAttributes));

            $navigationNodeLocalizedAttributesEntity->save();
        }
    }

    /**
     * @param string $nodeKey
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\NavigationNodeByKeyNotFoundException
     *
     * @return int
     */
    protected function getFkParentNavigationNode($nodeKey)
    {
        $query = SpyNavigationNodeQuery::create();
        $parentNavigationNodeEntity = $query->findOneByNodeKey($nodeKey);

        if (!$parentNavigationNodeEntity) {
            throw new NavigationNodeByKeyNotFoundException(sprintf(
                'NavigationNode with key "%s" not found',
                $nodeKey
            ));
        }

        return $parentNavigationNodeEntity->getIdNavigationNode();
    }

    /**
     * @param \Orm\Zed\Navigation\Persistence\SpyNavigationNode $navigationNodeEntity
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return int
     */
    protected function getPosition(SpyNavigationNode $navigationNodeEntity, DataSetInterface $dataSet)
    {
        if (isset($dataSet['position']) && !empty($dataSet['position'])) {
            return (int)$dataSet['position'];
        }

        return $navigationNodeEntity->getPosition();
    }

    /**
     * @param \Orm\Zed\Navigation\Persistence\SpyNavigationNode $navigationNodeEntity
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return int
     */
    protected function getIsActive(SpyNavigationNode $navigationNodeEntity, DataSetInterface $dataSet)
    {
        if (isset($dataSet['is_active']) && !empty($dataSet['is_active'])) {
            return (bool)$dataSet['is_active'];
        }

        if ($navigationNodeEntity->getIsActive() !== null) {
            return $navigationNodeEntity->getIsActive();
        }

        return static::DEFAULT_IS_ACTIVE;
    }

    /**
     * @param \Orm\Zed\Navigation\Persistence\SpyNavigationNode $navigationNodeEntity
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return string
     */
    protected function getNodeType(SpyNavigationNode $navigationNodeEntity, DataSetInterface $dataSet)
    {
        if (isset($dataSet['node_type']) && !empty($dataSet['node_type'])) {
            return $dataSet['node_type'];
        }

        return $navigationNodeEntity->getNodeType();
    }

    /**
     * @param \Orm\Zed\Navigation\Persistence\SpyNavigationNodeLocalizedAttributes $navigationNodeLocalizedAttributes
     * @param array $localizedAttributes
     *
     * @return string
     */
    protected function getTitle(SpyNavigationNodeLocalizedAttributes $navigationNodeLocalizedAttributes, array $localizedAttributes)
    {
        if (isset($localizedAttributes['title']) && !empty($localizedAttributes['title'])) {
            return $localizedAttributes['title'];
        }

        return $navigationNodeLocalizedAttributes->getTitle();
    }

    /**
     * @param \Orm\Zed\Navigation\Persistence\SpyNavigationNodeLocalizedAttributes $navigationNodeLocalizedAttributes
     * @param array $localizedAttributes
     *
     * @return string
     */
    protected function getLink(SpyNavigationNodeLocalizedAttributes $navigationNodeLocalizedAttributes, array $localizedAttributes)
    {
        if (isset($localizedAttributes['link']) && !empty($localizedAttributes['link'])) {
            return $localizedAttributes['link'];
        }

        return $navigationNodeLocalizedAttributes->getLink();
    }

    /**
     * @param \Orm\Zed\Navigation\Persistence\SpyNavigationNodeLocalizedAttributes $navigationNodeLocalizedAttributes
     * @param array $localizedAttributes
     *
     * @return string
     */
    protected function getExternalUrl(SpyNavigationNodeLocalizedAttributes $navigationNodeLocalizedAttributes, array $localizedAttributes)
    {
        if (isset($localizedAttributes['external_url']) && !empty($localizedAttributes['external_url'])) {
            return $localizedAttributes['external_url'];
        }

        return $navigationNodeLocalizedAttributes->getExternalUrl();
    }

    /**
     * @param \Orm\Zed\Navigation\Persistence\SpyNavigationNodeLocalizedAttributes $navigationNodeLocalizedAttributes
     * @param array $localizedAttributes
     *
     * @return string
     */
    protected function getCssClass(SpyNavigationNodeLocalizedAttributes $navigationNodeLocalizedAttributes, array $localizedAttributes)
    {
        if (isset($localizedAttributes['css_class']) && !empty($localizedAttributes['css_class'])) {
            return $localizedAttributes['css_class'];
        }

        return $navigationNodeLocalizedAttributes->getCssClass();
    }

}
