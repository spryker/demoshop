<?php
namespace Pyz\Yves\Catalog\Component\Model;

use ProjectA\Shared\Catalog\Code\Storage\StorageKeyGenerator;
use ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface;
use ProjectA\Yves\Catalog\Component\Model\Catalog as ProjectACatalog;
use ProjectA\Yves\Catalog\Component\Model\Exception\ProductNotFoundException;

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
}
