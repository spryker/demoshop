<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Controller;

use ArrayObject;
use Generated\Shared\Transfer\StorageProductOptionGroupCollectionTransfer;
use Generated\Shared\Transfer\StorageProductOptionGroupTransfer;
use Generated\Shared\Transfer\StorageProductOptionValueTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;
use Pyz\Yves\Application\Controller\AbstractController;
use Spryker\Shared\Storage\StorageConstants;

/**
 * @method \Spryker\Client\Product\ProductClientInterface getClient()
 * @method \Pyz\Yves\Product\ProductFactory getFactory()
 */
class ProductController extends AbstractController
{
    const AMOUNT = 'amount';

    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INCREMENTAL;

    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return array
     */
    public function detailAction(StorageProductTransfer $storageProductTransfer)
    {
        $categories = $storageProductTransfer->getCategories();

        $productOptionGroupsTransfer = $this
            ->getFactory()
            ->getProductOptionClient()
            ->getProductOptions($storageProductTransfer->getIdProductAbstract(), $this->getLocale());

        $this->localizePrices(
            $productOptionGroupsTransfer,
            $this->getCurrentCurrencyCode(),
            $this->getCurrentPriceMode()
        );

        $productData = [
            'product' => $storageProductTransfer,
            'productCategories' => $categories,
            'category' => count($categories) ? end($categories) : null,
            'page_keywords' => $storageProductTransfer->getMetaKeywords(),
            'page_description' => $storageProductTransfer->getMetaDescription(),
            'productOptionGroups' => $productOptionGroupsTransfer,
        ];

        return $productData;
    }

    /**
     * @return string
     */
    protected function getCurrentCurrencyCode()
    {
        return $this->getFactory()
            ->getCurrencyClient()
            ->getCurrent()
            ->getCode();
    }

    /**
     * @return string
     */
    protected function getCurrentPriceMode()
    {
        return $this->getFactory()
            ->getPriceClient()
            ->getCurrentPriceMode();
    }

    /**
     * @param \Generated\Shared\Transfer\StorageProductOptionGroupCollectionTransfer $productOptionGroupCollection
     * @param string $currencyCode
     * @param string $priceMode
     *
     * @return void
     */
    protected function localizePrices(StorageProductOptionGroupCollectionTransfer $productOptionGroupCollection, $currencyCode, $priceMode)
    {
        foreach ($productOptionGroupCollection->getProductOptionGroups() as $productOptionGroupTransfer) {
            $this->localizeGroupPrices($productOptionGroupTransfer, $currencyCode, $priceMode);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\StorageProductOptionGroupTransfer $productOptionGroupTransfer
     * @param string $currencyCode
     * @param string $priceMode
     *
     * @return void
     */
    protected function localizeGroupPrices(StorageProductOptionGroupTransfer $productOptionGroupTransfer, $currencyCode, $priceMode)
    {
        foreach ($productOptionGroupTransfer->getValues() as $productOptionValueTransfer) {
            $this->localizeOptionValuePrice($productOptionValueTransfer, $currencyCode, $priceMode);
        }

        $productOptionGroupTransfer->setValues(
            $this->filterOptionValuesWithEmptyPrice($productOptionGroupTransfer->getValues())
        );
    }

    /**
     * @param \Generated\Shared\Transfer\StorageProductOptionValueTransfer $productOptionValueTransfer
     * @param string $currencyCode
     * @param string $priceMode
     *
     * @return void
     */
    protected function localizeOptionValuePrice(StorageProductOptionValueTransfer $productOptionValueTransfer, $currencyCode, $priceMode)
    {
        $prices = $productOptionValueTransfer->getPrices();

        $productOptionValueTransfer->setPrice(
            isset($prices[$currencyCode]) ?
            $prices[$currencyCode][$priceMode][static::AMOUNT] :
            null
        );
    }

    /**
     * @param \ArrayObject|\Generated\Shared\Transfer\StorageProductOptionValueTransfer[] $productOptionValueCollection
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\StorageProductOptionValueTransfer[]
     */
    protected function filterOptionValuesWithEmptyPrice(ArrayObject $productOptionValueCollection)
    {
        return new ArrayObject(
            array_filter((array)$productOptionValueCollection, function (StorageProductOptionValueTransfer $productOptionValueTransfer) {
                return $productOptionValueTransfer->getPrice() === null ? false : true;
            })
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->getApplication()['request'];
    }
}
