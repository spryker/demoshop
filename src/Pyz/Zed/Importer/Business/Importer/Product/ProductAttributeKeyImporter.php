<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Generated\Shared\Transfer\ProductAttributeKeyTransfer;
use Orm\Zed\Product\Persistence\Base\SpyProductAttributeKeyQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

class ProductAttributeKeyImporter extends AbstractImporter
{

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     * @param string $dataDirectory
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductFacadeInterface $productFacade,
        $dataDirectory
    ) {
        parent::__construct($localeFacade);

        $this->productFacade = $productFacade;
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Attribute';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        return SpyProductAttributeKeyQuery::create()
            ->count() > 0;
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

        $attributeKey = $this->format($data);

        $attributeName = $attributeKey['attribute_key'];
        $isSuper = $attributeKey['is_super'];

        if (!$this->productFacade->hasProductAttributeKey($attributeName)) {
            $productAttributeKeyTransfer = new ProductAttributeKeyTransfer();
            $productAttributeKeyTransfer->setKey($attributeName);
            $productAttributeKeyTransfer->setIsSuper($isSuper);

            $this->productFacade->createProductAttributeKey($productAttributeKeyTransfer);
        }
    }

}
