<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use ArrayObject;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Orm\Zed\Product\Persistence\SpyProductQuery;

class ProductConcreteImporter extends AbstractProductImporter
{

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Concrete';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductQuery::create();

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

        $productConcreteTransfer = $this->buildProductConcreteTransfer($data);
        $idProductConcrete = $this->productFacade->createProductConcrete($productConcreteTransfer);
        $this->productFacade->touchProductConcreteActive($idProductConcrete);
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected function buildProductConcreteTransfer(array $data)
    {
        $abstractProduct = $this->productFacade->findProductAbstractIdBySku($data['abstract_sku']);

        $productConcreteTransfer = new ProductConcreteTransfer();
        $productConcreteTransfer
            ->setSku($data['concrete_sku'])
            ->setFkProductAbstract($abstractProduct)
            ->setAttributes($this->getAttributes($data))
            ->setIsActive(true);

        foreach ($this->localeFacade->getLocaleCollection() as $localeTransfer) {
            $localizedAttributesTransfer = $this->buildLocalizedAttributesTransfer($data, $localeTransfer);

            $productConcreteTransfer->addLocalizedAttributes($localizedAttributesTransfer);
        }

        $imageSets = $this->buildProductImageSets($data);
        $productConcreteTransfer->setImageSets(new ArrayObject($imageSets));

        return $productConcreteTransfer;
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
            ->setIsSearchable((bool)(int)$data[$this->getLocalizedKeyName('is_searchable', $localeTransfer->getLocaleName())]);

        return $localizedAttributesTransfer;
    }

}
