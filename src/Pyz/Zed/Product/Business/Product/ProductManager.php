<?php

namespace Pyz\Zed\Product\Business\Product;

use Generated\Shared\Locale\LocaleInterface;
use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\ConcreteProductTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\UrlTransfer;
use Orm\Zed\Locale\Persistence\SpyLocale;
use Orm\Zed\Product\Persistence\SpyAbstractProduct;
use Orm\Zed\Product\Persistence\SpyLocalizedAbstractProductAttributes;
use Orm\Zed\Product\Persistence\SpyLocalizedProductAttributes;
use Orm\Zed\Product\Persistence\SpyProduct;
use Propel\Runtime\Collection\Collection;
use Pyz\SprykerBugfixInterface;
use Pyz\Zed\Cms\Business\CmsFacade;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Product\Persistence\ProductQueryContainer;
use Pyz\Zed\Product\ProductConfig;
use Pyz\Zed\Url\Business\UrlFacade;
use SprykerFeature\Zed\Product\Business\Exception\MissingProductException;
use SprykerFeature\Zed\Product\Business\Product\ProductManager as SprykerProductManager;
use SprykerFeature\Zed\Product\Dependency\Facade\ProductToTouchInterface;


class ProductManager extends SprykerProductManager implements ProductManagerInterface, SprykerBugfixInterface
{

    /** @var LocaleFacade $localFacade */
    protected $localeFacade;

    /** @var  UrlFacade $urlFacade */
    protected $urlFacade;

    protected $cmsFacade;

    /**
     * @var ProductQueryContainer
     */
    protected $productQueryContainer;

    const COL_ATTRIBUTES_ABSTRACT_PRODUCT = 'SpyAbstractProduct.Attributes';

    /**
     * @param ProductQueryContainer $productQueryContainer
     * @param ProductToTouchInterface $touchFacade
     * @param UrlFacade $urlFacade
     * @param LocaleFacade $localeFacade
     * @param CmsFacade $cmsFacade
     */
    public function __construct(
        ProductQueryContainer $productQueryContainer,
        ProductToTouchInterface $touchFacade,
        UrlFacade $urlFacade,
        LocaleFacade $localeFacade,
        CmsFacade $cmsFacade
    ) {
        parent::__construct($productQueryContainer, $touchFacade, $urlFacade, $localeFacade);
        $this->cmsFacade = $cmsFacade;
    }

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
            $localeAttributeTransfer = new LocalizedAttributesTransfer();
            $localeAttributeTransfer
                ->setName($entry->getName())
                ->setLocale($this->convertLocaleToTransfer($entry->getLocale()))
                ->setAttributes($this->decodeAttributes($entry->getAttributes()));

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
        $entity = $this->productQueryContainer->queryAbstractProductBySku($sku)->findOneOrCreate();
        $entity = $this->updateAbstractProductEntity($abstractProductTransfer, $entity);
        $entity->save();

        $idAbstractProduct = $entity->getPrimaryKey();
        $abstractProductTransfer->setIdAbstractProduct($idAbstractProduct);

        $this->saveUrlToAbstractProduct($abstractProductTransfer);
        $this->touchProductActive($idAbstractProduct);

        return $idAbstractProduct;
    }

    /**
     * @param ConcreteProductInterface $concreteProductTransfer
     * @return int|void
     */
    public function saveConcreteProduct(ConcreteProductInterface $concreteProductTransfer)
    {
        $sku = $concreteProductTransfer->getSku();
        if ($this->hasConcreteProduct($sku)) {
            $entity = $this->productQueryContainer->queryConcreteProductBySku($sku)->findOne();
        } else {
            $entity = new SpyProduct();
        }
        $entity = $this->updateConcreteProductEntity($concreteProductTransfer, $entity);
        $entity->save();

        $idConcreteProduct = $entity->getPrimaryKey();
        $concreteProductTransfer->setIdConcreteProduct($idConcreteProduct);


        return $idConcreteProduct;
    }

    protected function convertLocaleToTransfer(SpyLocale $localeEntity)
    {
        $localeTransfer = new LocaleTransfer();
        $localeTransfer->fromArray($localeEntity->toArray());
        return $localeTransfer;
    }

    protected function decodeAttributes($attributes)
    {
        return json_decode($attributes, true);
    }

    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @param SpyAbstractProduct $entity
     * @return SpyAbstractProduct
     */
    protected function updateAbstractProductEntity(AbstractProductInterface $abstractProductTransfer, SpyAbstractProduct $entity)
    {
        $entity->setSku($abstractProductTransfer->getSku());
        $entity->setType($abstractProductTransfer->getType());
        $entity->setAttributes($this->encodeAttributes($abstractProductTransfer->getAttributes()));

        $localizedAttributeCollection = [];


        foreach ($abstractProductTransfer->getLocalizedAttributes() as $localizedAttribute) {

            $locale = $this->fillLocaleId($localizedAttribute->getLocale());

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
                ->setName($localizedAttribute->getName());

            $localizedAttributeCollection[] = $localizedAttributeEntity;
        }
        $entity->setSpyLocalizedAbstractProductAttributess(new Collection($localizedAttributeCollection));

        $entity->setFkTaxSet($abstractProductTransfer->getTaxSet()->getIdTaxSet());
        return $entity;
    }


    /**
     * @param ConcreteProductInterface $concreteProductTransfer
     * @param SpyProduct $entity
     * @return SpyProduct
     */
    protected function updateConcreteProductEntity(ConcreteProductInterface $concreteProductTransfer, SpyProduct $entity)
    {
        $entity
            ->setIsActive($concreteProductTransfer->getIsActive())
            ->setSku($concreteProductTransfer->getSku())
            ->setFkAbstractProduct($concreteProductTransfer->getIdAbstractProduct())
            ->setAttributes($this->encodeAttributes($concreteProductTransfer->getAttributes()));

        $localizedAttributeCollection = [];


        foreach ($concreteProductTransfer->getLocalizedAttributes() as $localizedAttribute) {

            $locale = $this->fillLocaleId($localizedAttribute->getLocale());

            $localizedAttributeEntity = false;
            foreach ($entity->getSpyLocalizedProductAttributess() as $localizedProductAttributesEntity) {
                if ($localizedProductAttributesEntity->getFkLocale() == $locale->getIdLocale()) {
                    $localizedAttributeEntity = $localizedProductAttributesEntity;
                    break;
                }
            }
            if (!$localizedAttributeEntity) {
                $localizedAttributeEntity = new SpyLocalizedProductAttributes();
                $localizedAttributeEntity->setFkLocale($locale->getIdLocale());
            }

            $localizedAttributeEntity
                ->setAttributes($this->encodeAttributes($localizedAttribute->getAttributes()))
                ->setName($localizedAttribute->getName());

            $localizedAttributeCollection[] = $localizedAttributeEntity;
        }
        $entity->setSpyLocalizedProductAttributess(new Collection($localizedAttributeCollection));
        return $entity;

    }

    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @throws MissingProductException
     */
    protected function saveUrlToAbstractProduct(AbstractProductInterface $abstractProductTransfer)
    {

        if (!$abstractProductTransfer->getIdAbstractProduct()) {
            throw new MissingProductException();
        }

        foreach ($abstractProductTransfer->getLocalizedAttributes() as $localizedAttribute) {
            $attributes = $localizedAttribute->getAttributes();

            $locale = $this->fillLocaleId($localizedAttribute->getLocale());


            $pageTransfer = $this->cmsFacade->getOrCreatePageByAbstractProduct($abstractProductTransfer);

            if (!$pageTransfer->getIdCmsPage()) {

                $pageTransfer
                    ->setFkAbstractProduct($abstractProductTransfer->getIdAbstractProduct())
                    ->setFkTemplate(1)
                    ->setIsActive(true)
                    ;

                $pageTransfer = $this->cmsFacade->savePage($pageTransfer);
                $this->cmsFacade->touchPageActive($pageTransfer);
                $urlTransfer = new UrlTransfer();
                $urlTransfer
                    // need to set the ResourceId here because the value from ->setFkAbstractProduct() is overwritten
                    // in the save url function
                    ->setResourceType(\SprykerFeature\Shared\Cms\CmsConfig::RESOURCE_TYPE_PAGE)
                    ->setResourceId($pageTransfer->getIdCmsPage())
                    ->setFkLocale($locale->getIdLocale())
                    ->setUrl($attributes[ProductConfig::ABSTRACT_URL_ATTRIBUTES_KEY]);

            }
            else {
                $urlTransfer = $this->urlFacade->getOrCreateUrlByIdPage($pageTransfer->getIdCmsPage(), $locale->getIdLocale());
                $urlTransfer
                    // need to set the ResourceId here because the value from ->setFkAbstractProduct() is overwritten
                    // in the save url function
                    ->setResourceType(\SprykerFeature\Shared\Cms\CmsConfig::RESOURCE_TYPE_PAGE)
                    ->setUrl($attributes[ProductConfig::ABSTRACT_URL_ATTRIBUTES_KEY]);
            }

            $this->urlFacade->saveUrlAndTouch($urlTransfer);

            // TODO: add deletion of urls and pages if the product does not have locale entry anymore
        }
    }

    protected function fillLocaleId(LocaleInterface $locale)
    {
        if (!$locale->getIdLocale()) {
            $dbLocale = $this->localeFacade->getLocale($locale->getLocaleName());
            $locale->setIdLocale($dbLocale->getIdLocale());
        }
        return $locale;
    }

    /**
     * @param $idConcreteProduct
     * @return ConcreteProductInterface $concreteProductTransfer
     */
    public function getConcreteProductById($idConcreteProduct)
    {
        $entity = $this->productQueryContainer->queryConcreteProductById($idConcreteProduct)->findOne();
        $transfer = new ConcreteProductTransfer();
        $transfer->fromArray($entity->toArray(), true);
        return $transfer;
    }

    /**
     * @param string $concreteSku
     * @return ConcreteProductInterface
     */
    public function getConcreteProductByConcreteSku($concreteSku)
    {
        $entity = $this->productQueryContainer->queryConcreteProductByConcreteSku($concreteSku)->findOne();
        $transfer = new ConcreteProductTransfer();
        $transfer->fromArray($entity->toArray(), true);

        $attributes = (array) json_decode($entity->getAttributes());
        $transfer->setAttributes($attributes);

        return $transfer;
    }
}
