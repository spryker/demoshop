<?php
namespace Pyz\Yves\Catalog\Business\Model;

use ProjectA\Shared\Catalog\Code\Storage\StorageKeyGenerator;
use ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface;
use ProjectA\Yves\Catalog\Business\Model\Catalog as ProjectACatalog;
use ProjectA\Yves\Catalog\Business\Model\Exception\ProductNotFoundException;

class Catalog extends ProjectACatalog
{

    /**
     * @param $url
     * @param ReadInterface $storage
     * @return mixed
     * @throws ProductNotFoundException
     */
    public function getProductDataByUrl($url, ReadInterface $storage)
    {
        $productKey = StorageKeyGenerator::getProductUrlKey($url);
        $productId = $storage->get($productKey);

        if (!$productId) {
            throw new ProductNotFoundException($url);
        }

        $productKey = StorageKeyGenerator::getProductKey($productId);
        $product = $storage->get($productKey);

        if (!$product) {
            throw new ProductNotFoundException($productId);
        }

        return $product;
    }

    /**
     * @param array $ids
     * @param ReadInterface $storage
     * @param null $indexByKey
     * @return \array[]
     */
    public function getProductDataByIds(array $ids, ReadInterface $storage, $indexByKey = null)
    {
        $productsFromStorage = parent::getProductDataByIds($ids, $storage, $indexByKey);

        if (!$indexByKey) {
            array_walk($productsFromStorage, function(&$product) {
                $product = json_decode($product, true);
            });
        }

        return $productsFromStorage;
    }

    /**
     * @param string $key
     * @param array $productsFromStorage
     * @return array
     */
    protected function mapKeysToValue($key, array $productsFromStorage)
    {
        $productsIndexedById = [];
        foreach ($productsFromStorage as $product) {
            $product = json_decode($product, true);
            $productsIndexedById[$product[$key]] = $product;
        }
        return $productsIndexedById;
    }
}
