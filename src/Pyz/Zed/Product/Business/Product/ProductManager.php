<?php

namespace Pyz\Zed\Product\Business\Product;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Orm\Zed\Locale\Persistence\SpyLocale;
use Orm\Zed\Product\Persistence\SpyAbstractProduct;
use Orm\Zed\Product\Persistence\SpyLocalizedAbstractProductAttributes;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Map\TableMap;
use Pyz\SprykerBugfixInterface;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Product\Persistence\ProductQueryContainer;
use SprykerFeature\Zed\Product\Business\Exception\MissingProductException;
use SprykerFeature\Zed\Product\Business\Product\ProductManager as SprykerProductManager;


class ProductManager extends SprykerProductManager implements ProductManagerInterface, SprykerBugfixInterface
{

    /** @var LocaleFacade $localFacade */
    protected $localeFacade;

    /**
     * @var ProductQueryContainer
     */
    protected $productQueryContainer;

    const COL_ATTRIBUTES_ABSTRACT_PRODUCT = 'SpyAbstractProduct.Attributes';




    /**
     * @param $abstractSku
     * @return AbstractProductTransfer
     * @throws MissingProductException
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getAbstractProduct($abstractSku)
    {
        $abstractProduct = $this->productQueryContainer->queryAbstractProductBySku($abstractSku)->findOne();

        if (!$abstractProduct) {
            throw new MissingProductException(
                sprintf(
                    'Tried to retrieve an abstract product with sku %s, but it does not exist.',
                    $abstractSku
                )
            );
        }

        $abstractProductTransfer = new AbstractProductTransfer();
        $abstractProductTransfer->fromArray($abstractProduct->toArray(), true);


        $result = $abstractProduct->getSpyLocalizedAbstractProductAttributess();

        $localizedAttributeCollection = [];
        foreach ($result as $entry) {

            echo '<pre>';
            var_dump($entry->toArray(TableMap::TYPE_CAMELNAME));

            $localeAttributeTransfer = new LocalizedAttributesTransfer();
            $localeAttributeTransfer
                ->setName($entry->getName())
                ->setLocale($this->convertLocaleToTransfer($entry->getLocale()))
                ->setAttributes($this->decodeAttributes($entry->getAttributes()))
                ;

            $localizedAttributeCollection[] = $localeAttributeTransfer;
        }
        $abstractProductTransfer->setLocalizedAttributes(new \ArrayObject($localizedAttributeCollection));
        return $abstractProductTransfer;
    }


    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @return int
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveAbstractProduct(AbstractProductInterface $abstractProductTransfer)
    {

        $sku = $abstractProductTransfer->getSku();
        if ($this->hasAbstractProduct($sku)) {
            $entity = $this->productQueryContainer->queryAbstractProductBySku($sku)->findOne();
        } else {
            $entity = new SpyAbstractProduct();
            $entity->setSku($sku);
        }

        $entity->setAttributes($this->encodeAttributes($abstractProductTransfer->getAttributes()));

        $localizedAttributeCollection = [];

        foreach ($abstractProductTransfer->getLocalizedAttributes() as $localizedAttribute) {

            $locale = $localizedAttribute->getLocale();
            if (!$locale->getIdLocale()) {
                $dbLocale = $this->localeFacade->getLocale($locale->getLocaleName());
                $locale->setIdLocale($dbLocale->getIdLocale());
            }

            $localizedAttributeEntity = false;
            foreach ($entity->getSpyLocalizedAbstractProductAttributess() as $localizedAbstractProductAttributesEntity) {
                if ($localizedAbstractProductAttributesEntity->getFkLocale() == $locale->getIdLocale()) {
                    $localizedAttributeEntity = $localizedAbstractProductAttributesEntity;
                    break;
                }
            }
            if (!$localizedAttributeEntity) {
                $localizedAttributeEntity = new SpyLocalizedAbstractProductAttributes();
                $localizedAttributeEntity->setFkLocale($locale->getIdLocale());
            }

            $localizedAttributeEntity
                ->setAttributes($this->encodeAttributes($localizedAttribute->getAttributes()))
                ->setName($localizedAttribute->getName())
                ;

            $localizedAttributeCollection[] = $localizedAttributeEntity;
        }
        $entity->setSpyLocalizedAbstractProductAttributess(new Collection($localizedAttributeCollection));

        $entity->setFkTaxSet($abstractProductTransfer->getTaxSet()->getIdTaxSet());
        $entity->save();

        $idAbstractProduct = $entity->getPrimaryKey();
        $abstractProductTransfer->setIdAbstractProduct($idAbstractProduct);
        return $idAbstractProduct;
    }

    private function convertLocaleToTransfer(SpyLocale $localeEntity)
    {
        $localeTransfer = new LocaleTransfer();
        $localeTransfer->fromArray($localeEntity->toArray());
        return $localeTransfer;
    }

    private function decodeAttributes($attributes)
    {
        return json_decode($attributes, true);
    }
}
