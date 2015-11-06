<?php

namespace Pyz\Zed\CmsBlock\Dependency\Facade;

interface CmsBlockToTouchInterface
{

    /**
     * @param string $itemType
     * @param int $idItem
     * @param bool $keyChange
     *
     * @return bool
     */
    public function touchActive($itemType, $idItem, $keyChange = false);

}
