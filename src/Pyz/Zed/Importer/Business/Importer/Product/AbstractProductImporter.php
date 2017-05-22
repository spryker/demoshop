<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Generated\Shared\Transfer\ProductImageSetTransfer;
use Generated\Shared\Transfer\ProductImageTransfer;
use Pyz\Shared\Product\ProductConfig;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

abstract class AbstractProductImporter extends AbstractImporter
{

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductFacadeInterface $productFacade
    ) {
        parent::__construct($localeFacade);

        $this->productFacade = $productFacade;
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

    /**
     * @param string $key
     * @param string $localeCode
     *
     * @return string
     */
    protected function getLocalizedKeyName($key, $localeCode)
    {
        return $key . '.' . $localeCode;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function getAttributes(array $data)
    {
        $attributes = [];
        foreach ($data as $key => $value) {
            if (!preg_match('/^attribute_key_(\d+)$/', $key, $match)) {
                continue;
            }

            $attributeKey = trim($value);
            $attributeValue = trim($data['value_' . $match[1]]);

            if ($attributeKey !== '') {
                $attributes[$attributeKey] = $attributeValue;
            }
        }

        return $attributes;
    }

    /**
     * @param array $data
     * @param string $localeName
     *
     * @return array
     */
    protected function getLocalizedAttributes(array $data, $localeName)
    {
        $attributes = [];
        foreach ($data as $key => $value) {
            if (!preg_match('/^attribute_key_(\d+).' . $localeName . '$/', $key, $match)) {
                continue;
            }

            $attributeKey = trim($value);
            $attributeValue = trim($data['value_' . $match[1] . '.' . $localeName]);

            if ($attributeKey !== '') {
                $attributes[$attributeKey] = $attributeValue;
            }
        }

        return $attributes;
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ProductImageTransfer[]
     */
    protected function buildProductImageSets(array $data)
    {
        $productImage = (new ProductImageTransfer())
            ->setSortOrder(0)
            ->setExternalUrlLarge($data['image_big'])
            ->setExternalUrlSmall($data['image_small']);

        $result = [];
        foreach ($this->localeFacade->getLocaleCollection() as $localeTransfer) {
            $productImageSet = (new ProductImageSetTransfer())
                ->setName(ProductConfig::DEFAULT_IMAGE_SET_NAME)
                ->setLocale($localeTransfer)
                ->addProductImage(clone $productImage);

            $result[] = $productImageSet;
        }

        return $result;
    }

}
