<?php

namespace Pyz\Client\Catalog\Service\Storage;

use SprykerFeature\Client\Storage\Service\StorageClientInterface;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface;

class CatalogStorage
{
    /**
     * @var StorageClientInterface
     */
    protected $storage;

    /**
     * @var KeyBuilderInterface
     */
    protected $keyBuilder;

    /**
     * @param StorageClientInterface $storage
     * @param KeyBuilderInterface $keyBuilder
     */
    public function __construct(
        StorageClientInterface $storage,
        KeyBuilderInterface $keyBuilder
    ) {
        $this->storage = $storage;
        $this->keyBuilder = $keyBuilder;
    }

    /**
     * @param int $idCategoryNode
     * @param string $localeName
     *
     * @return mixed
     */
    public function getCategoryNodeById($idCategoryNode, $localeName)
    {
        $categoryNodeKey = $this->keyBuilder->generateKey($idCategoryNode, $localeName);
        $categoryNode = $this->storage->get($categoryNodeKey);

        return $categoryNode;
    }
}
