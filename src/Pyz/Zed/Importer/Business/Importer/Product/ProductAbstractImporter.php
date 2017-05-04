<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use ArrayObject;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;

class ProductAbstractImporter extends AbstractProductImporter
{

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Abstract';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductAbstractQuery::create();

        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    public function importOne(array $data)
    {
        if (!$data) {
            return;
        }

        $productAbstractTransfer = $this->buildProductAbstractTransfer($data);

        $idProductAbstract = $this->productFacade->createProductAbstract($productAbstractTransfer);

        $this->productFacade->touchProductActive($idProductAbstract);
        $this->productFacade->createProductUrl($productAbstractTransfer);
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected function buildProductAbstractTransfer(array $data)
    {
        $productAbstractTransfer = new ProductAbstractTransfer();
        $productAbstractTransfer
            ->setSku($data['abstract_sku'])
            ->setAttributes($this->getAttributes($data))
            ->setIsFeatured($data['is_featured'])
            ->setColorCode($data['color_code'] ?: null);

        foreach ($this->localeFacade->getLocaleCollection() as $localeTransfer) {
            $localizedAttributesTransfer = $this->buildLocalizedAttributesTransfer($data, $localeTransfer);

            $productAbstractTransfer->addLocalizedAttributes($localizedAttributesTransfer);
        }

        $imageSets = $this->buildProductImageSets($data);
        $productAbstractTransfer->setImageSets(new ArrayObject($imageSets));

        return $productAbstractTransfer;
    }

    /**
     * @param array $data
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\LocalizedAttributesTransfer
     */
    protected function buildLocalizedAttributesTransfer(array $data, LocaleTransfer $localeTransfer)
    {
        $localizedAttributesData = $this->getLocalizedAttributes($data, $localeTransfer->getLocaleName());

        $localizedAttributesTransfer = new LocalizedAttributesTransfer();
        $localizedAttributesTransfer
            ->setLocale($localeTransfer)
            ->setName($this->getProductName($data, $localeTransfer->getLocaleName()))
            ->setAttributes($localizedAttributesData)
            ->setDescription($data[$this->getLocalizedKeyName('description', $localeTransfer->getLocaleName())])
            ->setMetaTitle($data[$this->getLocalizedKeyName('meta_title', $localeTransfer->getLocaleName())])
            ->setMetaKeywords($data[$this->getLocalizedKeyName('meta_keywords', $localeTransfer->getLocaleName())])
            ->setMetaDescription($data[$this->getLocalizedKeyName('meta_description', $localeTransfer->getLocaleName())]);

        return $localizedAttributesTransfer;
    }

    /**
     * @param array $data
     * @param string $localeCode
     *
     * @return string
     */
    protected function getProductName(array $data, $localeCode)
    {
        $localizedKeyName = $this->getLocalizedKeyName('name', $localeCode);

        return $data[$localizedKeyName];
    }

}
