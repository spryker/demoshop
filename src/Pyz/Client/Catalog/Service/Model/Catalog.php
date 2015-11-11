<?php

namespace Pyz\Client\Catalog\Service\Model;

use SprykerFeature\Client\Catalog\Service\Model\Catalog as SprykerFeatureCatalog;

class Catalog extends SprykerFeatureCatalog
{

    /**
     * @param array $ids
     * @param bool $indexByKey
     *
     * @return array
     */
    public function getProductDataByIds(array $ids, $indexByKey = null)
    {
        $idKeys = [];
        foreach ($ids as $id) {
            $idKeys[] = $this->productKeyBuilder->generateKey($id, $this->locale);
        }
        $productsFromStorage = $this->storageReader->getMulti($idKeys);
        foreach ($productsFromStorage as $key => $product) {
            if ($product === null) {
                unset($productsFromStorage[$key]);
                continue;
            }

            $productsFromStorage[$key] = $this->mergeAttributes(json_decode($product, true));
        }

        if ($indexByKey) {
            return $this->mapKeysToValue($indexByKey, $productsFromStorage);
        }

        return $productsFromStorage;
    }

}
