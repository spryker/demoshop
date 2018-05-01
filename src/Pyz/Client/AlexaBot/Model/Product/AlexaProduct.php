<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\Product;

use Pyz\Client\AlexaBot\AlexaBotConfig;
use Pyz\Client\AlexaBot\Model\FileSession\FileSessionInterface;
use Pyz\Client\Catalog\CatalogClientInterface;
use Pyz\Yves\Product\Mapper\StorageProductMapperInterface;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Product\ProductClientInterface;

class AlexaProduct extends AbstractPlugin implements AlexaProductInterface
{
    const VARIANT_ATTRIBUTE_NAME = 'variant';

    /**
     * @var AlexaBotConfig
     */
    private $alexaBotConfig;

    /**
     * @var \Pyz\Client\Catalog\CatalogClientInterface
     */
    private $catalogClient;

    /**
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    private $productClient;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductMapper
     */
    private $storageProductMapper;

    /**
     * @var FileSessionInterface
     */
    private $fileSession;

    /**
     * @param AlexaBotConfig $alexaBotConfig
     * @param CatalogClientInterface $catalogClient
     * @param ProductClientInterface $productClient
     * @param StorageProductMapperInterface $storageProductMapper
     * @param FileSessionInterface $fileSession
     */
    public function __construct(
        AlexaBotConfig $alexaBotConfig,
        CatalogClientInterface $catalogClient,
        ProductClientInterface $productClient,
        StorageProductMapperInterface $storageProductMapper,
        FileSessionInterface $fileSession
    ) {
        $this->productClient = $productClient;
        $this->storageProductMapper = $storageProductMapper;
        $this->catalogClient = $catalogClient;
        $this->alexaBotConfig = $alexaBotConfig;
        $this->fileSession = $fileSession;
    }

    /**
     * @param string $productName
     *
     * @return string[]
     */
    public function getVariantsByProductName($productName)
    {
        $abstractProductId = $this->getAbstractIdByNameAndWriteToSession($productName);
        $storageProductTransfer = $this->getStorageProduct($abstractProductId);

        return $storageProductTransfer->getSuperAttributes()[static::VARIANT_ATTRIBUTE_NAME];
    }

    /**
     * @param int $abstractProductId
     * @param string $variantName
     *
     * @return string
     */
    public function getVariantSkuByAbstractProductIdAndVariantName($abstractProductId, $variantName)
    {
        $selectedAttributes = [self::VARIANT_ATTRIBUTE_NAME => $variantName];
        $storageProductTransfer = $this->getStorageProduct($abstractProductId, $selectedAttributes);

        return $storageProductTransfer->getSku();
    }

    /**
     * @param string $productName
     *
     * @return int
     */
    private function getAbstractIdByNameAndWriteToSession($productName)
    {
        $catalogResponse = $this
            ->catalogClient
            ->catalogSuggestSearch($productName);

        $abstractProductId = $catalogResponse['suggestionByType']['product_abstract'][0]['id_product_abstract'];

        $this->fileSession->write(
            $this->alexaBotConfig->getProductSessionName(),
            $abstractProductId
        );

        return $abstractProductId;
    }

    /**
     * @param int $abstractProductId
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    private function getStorageProduct($abstractProductId, $selectedAttributes = [])
    {
        $productData = $this
            ->productClient
            ->getProductAbstractFromStorageByIdForCurrentLocale($abstractProductId);

        $storageProductTransfer = $this
            ->storageProductMapper
            ->mapStorageProduct($productData, $selectedAttributes);

        return $storageProductTransfer;
    }
}
