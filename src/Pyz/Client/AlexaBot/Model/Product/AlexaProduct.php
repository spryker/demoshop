<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\Product;

use Pyz\Client\Catalog\CatalogClientInterface;
use Pyz\Yves\Product\Mapper\StorageProductMapperInterface;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Product\ProductClientInterface;

class AlexaProduct extends AbstractPlugin implements AlexaProductInterface
{
    const PRODUCT_SESSION_NAME = 'alexa-product.session';

    /**
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    private $productClient;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductMapper
     */
    private $storageProductMapper;

    /**
     * @var \Pyz\Client\Catalog\CatalogClientInterface
     */
    private $catalogClient;

    /**
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     * @param \Pyz\Yves\Product\Mapper\StorageProductMapperInterface $storageProductMapper
     * @param \Pyz\Client\Catalog\CatalogClientInterface $catalogClient
     */
    public function __construct(
        ProductClientInterface $productClient,
        StorageProductMapperInterface $storageProductMapper,
        CatalogClientInterface $catalogClient
    ) {
        $this->productClient = $productClient;
        $this->storageProductMapper = $storageProductMapper;
        $this->catalogClient = $catalogClient;
    }

    /**
     * @param int $abstractId
     *
     * @return array
     */
    public function getConcreteListByAbstractId($abstractId)
    {
        $storageProductTransfer = $this->getStorageProduct($abstractId);

        return $storageProductTransfer->getSuperAttributes()['variant'];
    }

    /**
     * @param int $abstractId
     * @param string $variantName
     *
     * @return string
     */
    public function getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName)
    {
        $selectedAttributes = ['variant' => $variantName];

        $storageProductTransfer = $this->getStorageProduct($abstractId, $selectedAttributes);

        return $storageProductTransfer->getSku();
    }

    /**
     * @param string $abstractName
     *
     * @return int
     */
    public function getAbstractIdByName($abstractName)
    {
        $catalogResponse = $this->catalogClient->catalogSuggestSearch($abstractName);
        $abstractId = $catalogResponse['suggestionByType']['product_abstract'][0]['id_product_abstract'];

        $filePath = getcwd() . DIRECTORY_SEPARATOR . self::PRODUCT_SESSION_NAME;
        $fp = fopen($filePath, "w");
        fwrite($fp, $abstractId);
        fclose($fp);

        return $abstractId;
    }

    public function getAbstractIdBySession()
    {
        $filePath = getcwd() . DIRECTORY_SEPARATOR . self::PRODUCT_SESSION_NAME;
        $abstractId = file_get_contents($filePath);

        return $abstractId;
    }

    /**
     * @param $abstractId
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function getStorageProduct($abstractId, $selectedAttributes = [])
    {
        $productData = $this
            ->productClient
            ->getProductAbstractFromStorageByIdForCurrentLocale($abstractId);

        $storageProductTransfer = $this
            ->storageProductMapper
            ->mapStorageProduct($productData, $selectedAttributes);

        return $storageProductTransfer;
    }
}
