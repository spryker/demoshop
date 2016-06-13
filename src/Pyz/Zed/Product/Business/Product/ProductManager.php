<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Product\Business\Product;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductAbstract;
use Orm\Zed\Product\Persistence\SpyProductAbstractLocalizedAttributes;
use Orm\Zed\Product\Persistence\SpyProductLocalizedAttributes;
use Spryker\Zed\Product\Business\Exception\MissingProductException;
use Spryker\Zed\Product\Business\Exception\ProductAbstractAttributesExistException;
use Spryker\Zed\Product\Business\Exception\ProductAbstractExistsException;
use Spryker\Zed\Product\Business\Exception\ProductConcreteAttributesExistException;
use Spryker\Zed\Product\Business\Exception\ProductConcreteExistsException;
use Spryker\Zed\Product\Business\Product\ProductManagerInterface;
use Spryker\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use Spryker\Zed\Product\Dependency\Facade\ProductToTouchInterface;
use Spryker\Zed\Product\Dependency\Facade\ProductToUrlInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;

class ProductManager implements ProductManagerInterface
{

    const COL_ID_PRODUCT_CONCRETE = 'SpyProduct.IdProduct';

    const COL_ABSTRACT_SKU = 'SpyProductAbstract.Sku';

    const COL_ID_PRODUCT_ABSTRACT = 'SpyProductAbstract.IdProductAbstract';

    const COL_NAME = 'SpyProductLocalizedAttributes.Name';

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Spryker\Zed\Product\Dependency\Facade\ProductToTouchInterface
     */
    protected $touchFacade;

    /**
     * @var \Spryker\Zed\Product\Dependency\Facade\ProductToUrlInterface
     */
    protected $urlFacade;

    /**
     * @var \Spryker\Zed\Product\Dependency\Facade\ProductToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var \Orm\Zed\Product\Persistence\SpyProductAbstract[]
     */
    protected $productAbstractCollectionBySkuCache = [];

    /**
     * @var \Orm\Zed\Product\Persistence\SpyProduct[]
     */
    protected $productConcreteCollectionBySkuCache = [];

    /**
     * @var array
     */
    protected $productAbstractsBySkuCache;

    /**
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     * @param \Spryker\Zed\Product\Dependency\Facade\ProductToTouchInterface $touchFacade
     * @param \Spryker\Zed\Product\Dependency\Facade\ProductToUrlInterface $urlFacade
     * @param \Spryker\Zed\Product\Dependency\Facade\ProductToLocaleInterface $localeFacade
     */
    public function __construct(
        ProductQueryContainerInterface $productQueryContainer,
        ProductToTouchInterface $touchFacade,
        ProductToUrlInterface $urlFacade,
        ProductToLocaleInterface $localeFacade
    ) {
        $this->productQueryContainer = $productQueryContainer;
        $this->touchFacade = $touchFacade;
        $this->urlFacade = $urlFacade;
        $this->localeFacade = $localeFacade;
    }

    /**
     * @param string $sku
     *
     * @return bool
     */
    public function hasProductAbstract($sku)
    {
        $productAbstractQuery = $this->productQueryContainer->queryProductAbstractBySku($sku);

        return $productAbstractQuery->count() > 0;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductAbstractExistsException
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return int
     */
    public function createProductAbstract(ProductAbstractTransfer $productAbstractTransfer)
    {
        $sku = $productAbstractTransfer->getSku();

        $encodedAttributes = $this->encodeAttributes($productAbstractTransfer->getAttributes());

        $productAbstract = new SpyProductAbstract();
        $productAbstract
            ->setAttributes($encodedAttributes)
            ->setSku($sku);

        $productAbstract->save();

        $idProductAbstract = $productAbstract->getPrimaryKey();
        $productAbstractTransfer->setIdProductAbstract($idProductAbstract);
        $this->createProductAbstractAttributes($productAbstractTransfer);

        return $idProductAbstract;
    }

    /**
     * @param string $sku
     *
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return int
     */
    public function getProductAbstractIdBySku($sku)
    {
        if (!isset($this->productAbstractsBySkuCache[$sku])) {
            $productAbstract = $this->productQueryContainer->queryProductAbstractBySku($sku)->findOne();

            if (!$productAbstract) {
                throw new MissingProductException(
                    sprintf(
                        'Tried to retrieve an product abstract with sku %s, but it does not exist.',
                        $sku
                    )
                );
            }

            $this->productAbstractsBySkuCache[$sku] = $productAbstract;
        }

        return $this->productAbstractsBySkuCache[$sku]->getPrimaryKey();
    }

    /**
     * @param string $sku
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductAbstractExistsException
     *
     * @return void
     */
    protected function checkProductAbstractDoesNotExist($sku)
    {
        if ($this->hasProductAbstract($sku)) {
            throw new ProductAbstractExistsException(
                sprintf(
                    'Tried to create an product abstract with sku %s that already exists',
                    $sku
                )
            );
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductAbstractAttributesExistException
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return void
     */
    protected function createProductAbstractAttributes(ProductAbstractTransfer $productAbstractTransfer)
    {
        $idProductAbstract = $productAbstractTransfer->getIdProductAbstract();

        foreach ($productAbstractTransfer->getLocalizedAttributes() as $localizedAttributes) {
            $locale = $localizedAttributes->getLocale();
            if ($this->hasProductAbstractAttributes($idProductAbstract, $locale)) {
                continue;
            }
            $encodedAttributes = $this->encodeAttributes($localizedAttributes->getAttributes());

            $productAbstractAttributesEntity = new SpyProductAbstractLocalizedAttributes();
            $productAbstractAttributesEntity
                ->setFkProductAbstract($idProductAbstract)
                ->setFkLocale($locale->getIdLocale())
                ->setName($localizedAttributes->getName())
                ->setAttributes($encodedAttributes);

            $productAbstractAttributesEntity->save();
        }
    }

    /**
     * @param int $idProductAbstract
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @deprecated Use hasProductAbstractAttributes() instead.
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductAbstractAttributesExistException
     *
     * @return void
     */
    protected function checkProductAbstractAttributesDoNotExist($idProductAbstract, $locale)
    {
        if ($this->hasProductAbstractAttributes($idProductAbstract, $locale)) {
            throw new ProductAbstractAttributesExistException(
                sprintf(
                    'Tried to create abstract attributes for product abstract %s, locale id %s, but it already exists',
                    $idProductAbstract,
                    $locale->getIdLocale()
                )
            );
        }
    }

    /**
     * @param int $idProductAbstract
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return bool
     */
    protected function hasProductAbstractAttributes($idProductAbstract, LocaleTransfer $locale)
    {
        $query = $this->productQueryContainer->queryProductAbstractAttributeCollection(
            $idProductAbstract,
            $locale->getIdLocale()
        );

        return $query->count() > 0;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     * @param int $idProductAbstract
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductConcreteExistsException
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return int
     */
    public function createProductConcrete(ProductConcreteTransfer $productConcreteTransfer, $idProductAbstract)
    {
        $sku = $productConcreteTransfer->getSku();

        $this->checkProductConcreteDoesNotExist($sku);
        $encodedAttributes = $this->encodeAttributes($productConcreteTransfer->getAttributes());

        $productConcreteEntity = new SpyProduct();
        $productConcreteEntity
            ->setSku($sku)
            ->setFkProductAbstract($idProductAbstract)
            ->setAttributes($encodedAttributes)
            ->setIsActive($productConcreteTransfer->getIsActive());

        $productConcreteEntity->save();

        $idProductConcrete = $productConcreteEntity->getPrimaryKey();
        $productConcreteTransfer->setIdProductConcrete($idProductConcrete);
        $this->createProductConcreteAttributes($productConcreteTransfer);

        return $idProductConcrete;
    }

    /**
     * @param string $sku
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductConcreteExistsException
     *
     * @return void
     */
    protected function checkProductConcreteDoesNotExist($sku)
    {
        if ($this->hasProductConcrete($sku)) {
            throw new ProductConcreteExistsException(
                sprintf(
                    'Tried to create a product concrete with sku %s, but it already exists',
                    $sku
                )
            );
        }
    }

    /**
     * @param string $sku
     *
     * @return bool
     */
    public function hasProductConcrete($sku)
    {
        return $this->productQueryContainer->queryProductConcreteBySku($sku)->count() > 0;
    }

    /**
     * @param string $sku
     *
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return int
     */
    public function getProductConcreteIdBySku($sku)
    {
        if (!isset($this->productConcreteCollectionBySkuCache[$sku])) {
            $productConcrete = $this->productQueryContainer->queryProductConcreteBySku($sku)->findOne();

            if (!$productConcrete) {
                throw new MissingProductException(
                    sprintf(
                        'Tried to retrieve a product concrete with sku %s, but it does not exist',
                        $sku
                    )
                );
            }

            $this->productConcreteCollectionBySkuCache[$sku] = $productConcrete;
        }

        return $this->productConcreteCollectionBySkuCache[$sku]->getPrimaryKey();
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductConcreteAttributesExistException
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return void
     */
    protected function createProductConcreteAttributes(ProductConcreteTransfer $productConcreteTransfer)
    {
        $idProductConcrete = $productConcreteTransfer->getIdProductConcrete();

        foreach ($productConcreteTransfer->getLocalizedAttributes() as $localizedAttributes) {
            $locale = $localizedAttributes->getLocale();
            $this->checkProductConcreteAttributesDoNotExist($idProductConcrete, $locale);
            $encodedAttributes = $this->encodeAttributes($localizedAttributes->getAttributes());

            $productAttributeEntity = new SpyProductLocalizedAttributes();
            $productAttributeEntity
                ->setFkProduct($idProductConcrete)
                ->setFkLocale($locale->getIdLocale())
                ->setName($localizedAttributes->getName())
                ->setAttributes($encodedAttributes);

            $productAttributeEntity->save();
        }
    }

    /**
     * @param int $idProductConcrete
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductConcreteAttributesExistException
     *
     * @return void
     */
    protected function checkProductConcreteAttributesDoNotExist($idProductConcrete, LocaleTransfer $locale)
    {
        if ($this->hasProductConcreteAttributes($idProductConcrete, $locale)) {
            throw new ProductConcreteAttributesExistException(
                sprintf(
                    'Tried to create product concrete attributes for product id %s, locale id %s, but they exist',
                    $idProductConcrete,
                    $locale->getIdLocale()
                )
            );
        }
    }

    /**
     * @param int $idProductConcrete
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return bool
     */
    protected function hasProductConcreteAttributes($idProductConcrete, LocaleTransfer $locale)
    {
        $query = $this->productQueryContainer->queryProductConcreteAttributeCollection(
            $idProductConcrete,
            $locale->getIdLocale()
        );

        return $query->count() > 0;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return void
     */
    public function touchProductActive($idProductAbstract)
    {
        $this->touchFacade->touchActive('product_abstract', $idProductAbstract);
    }

    /**
     * @param string $sku
     * @param string $url
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Url\Business\Exception\UrlExistsException
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return \Generated\Shared\Transfer\UrlTransfer
     */
    public function createProductUrl($sku, $url, LocaleTransfer $locale)
    {
        $idProductAbstract = $this->getProductAbstractIdBySku($sku);

        return $this->createProductUrlByIdProduct($idProductAbstract, $url, $locale);
    }

    /**
     * @param int $idProductAbstract
     * @param string $url
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Url\Business\Exception\UrlExistsException
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return \Generated\Shared\Transfer\UrlTransfer
     */
    public function createProductUrlByIdProduct($idProductAbstract, $url, LocaleTransfer $locale)
    {
        return $this->urlFacade->createUrl($url, $locale, 'product_abstract', $idProductAbstract);
    }

    /**
     * @param string $sku
     * @param string $url
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Url\Business\Exception\UrlExistsException
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return \Generated\Shared\Transfer\UrlTransfer
     */
    public function createAndTouchProductUrl($sku, $url, LocaleTransfer $locale)
    {
        $url = $this->createProductUrl($sku, $url, $locale);
        $this->urlFacade->touchUrlActive($url->getIdUrl());

        return $url;
    }

    /**
     * @param int $idProductAbstract
     * @param string $url
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return \Generated\Shared\Transfer\UrlTransfer
     */
    public function createAndTouchProductUrlByIdProduct($idProductAbstract, $url, LocaleTransfer $locale)
    {
        $urlTransfer = $this->createProductUrlByIdProduct($idProductAbstract, $url, $locale);
        $this->urlFacade->touchUrlActive($urlTransfer->getIdUrl());

        return $urlTransfer;
    }

    /**
     * @param string $sku
     *
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return float
     */
    public function getEffectiveTaxRateForProductConcrete($sku)
    {
        $productConcrete = $this->productQueryContainer->queryProductConcreteBySku($sku)->findOne();

        if (!$productConcrete) {
            throw new MissingProductException(
                sprintf(
                    'Tried to retrieve a product concrete with sku %s, but it does not exist.',
                    $sku
                )
            );
        }

        $productAbstract = $productConcrete->getSpyProductAbstract();

        $taxSetEntity = $productAbstract->getSpyTaxSet();
        if ($taxSetEntity === null) {
            return 0;
        }

        $effectiveTaxRate = $this->getEffectiveTaxRate($taxSetEntity->getSpyTaxRates());

        return $effectiveTaxRate;
    }

    /**
     * @param string $concreteSku
     *
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    public function getProductConcrete($concreteSku)
    {
        $localeTransfer = $this->localeFacade->getCurrentLocale();

        $productConcreteQuery = $this->productQueryContainer->queryProductWithAttributesAndProductAbstract(
            $concreteSku,
            $localeTransfer->getIdLocale()
        );

        $productConcreteQuery->select([
            self::COL_ID_PRODUCT_CONCRETE,
            self::COL_ABSTRACT_SKU,
            self::COL_ID_PRODUCT_ABSTRACT,
            self::COL_NAME,
        ]);

        $productConcrete = $productConcreteQuery->findOne();

        if (!$productConcrete) {
            throw new MissingProductException(
                sprintf(
                    'Tried to retrieve a product concrete with sku %s, but it does not exist.',
                    $concreteSku
                )
            );
        }

        $productConcreteTransfer = new ProductConcreteTransfer();
        $productConcreteTransfer->setSku($concreteSku)
            ->setIdProductConcrete($productConcrete[self::COL_ID_PRODUCT_CONCRETE])
            ->setProductAbstractSku($productConcrete[self::COL_ABSTRACT_SKU])
            ->setIdProductAbstract($productConcrete[self::COL_ID_PRODUCT_ABSTRACT])
            ->setName($productConcrete[self::COL_NAME]);

        $this->addTaxRate($productConcreteTransfer);

        return $productConcreteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return void
     */
    protected function addTaxRate(ProductConcreteTransfer $productConcreteTransfer)
    {
        $taxSetEntity = $this->productQueryContainer
            ->queryTaxSetForProductAbstract($productConcreteTransfer->getIdProductAbstract())
            ->findOne();

        if ($taxSetEntity === null) {
            return;
        }

        $effectiveTaxRate = $this->getEffectiveTaxRate($taxSetEntity->getSpyTaxRates());
        $productConcreteTransfer->setTaxRate($effectiveTaxRate);
    }

    /**
     * @param string $sku
     *
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return int
     */
    public function getProductAbstractIdByConcreteSku($sku)
    {
        $productConcrete = $this->productQueryContainer->queryProductConcreteBySku($sku)->findOne();

        if (!$productConcrete) {
            throw new MissingProductException(
                sprintf(
                    'Tried to retrieve a product concrete with sku %s, but it does not exist.',
                    $sku
                )
            );
        }

        return $productConcrete->getFkProductAbstract();
    }

    /**
     * @param string $sku
     *
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return string
     */
    public function getAbstractSkuFromProductConcrete($sku)
    {
        $productConcrete = $this->productQueryContainer->queryProductConcreteBySku($sku)->findOne();

        if (!$productConcrete) {
            throw new MissingProductException(
                sprintf(
                    'Tried to retrieve a product concrete with sku %s, but it does not exist.',
                    $sku
                )
            );
        }

        return $productConcrete->getSpyProductAbstract()->getSku();
    }

    /**
     * @param array $attributes
     *
     * @return string
     */
    protected function encodeAttributes(array $attributes)
    {
        $result = json_encode($attributes);
        dump($result);

        return $result;
    }

    /**
     * @param \Orm\Zed\Tax\Persistence\SpyTaxRate[] $taxRates
     *
     * @return int
     */
    protected function getEffectiveTaxRate($taxRates)
    {
        $taxRate = 0;
        foreach ($taxRates as $taxRateEntity) {
            $taxRate += $taxRateEntity->getRate();
        }

        return $taxRate;
    }

}
