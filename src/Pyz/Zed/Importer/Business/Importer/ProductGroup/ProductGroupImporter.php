<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\ProductGroup;

use Generated\Shared\Transfer\ProductGroupTransfer;
use Orm\Zed\ProductGroup\Persistence\SpyProductGroupQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductGroup\Business\ProductGroupFacadeInterface;

class ProductGroupImporter extends AbstractImporter
{

    const FIELD_GROUP_KEY = 'group_key';
    const FIELD_ID_PRODUCT_ABSTRACT = 'id_product_abstract';

    /**
     * @var \Spryker\Zed\ProductGroup\Business\ProductGroupFacadeInterface
     */
    protected $productGroupFacade;

    /**
     * @var array
     */
    protected static $productGroupCache = [];

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\ProductGroup\Business\ProductGroupFacadeInterface $productGroupFacade
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductGroupFacadeInterface $productGroupFacade
    ) {
        parent::__construct($localeFacade);

        $this->productGroupFacade = $productGroupFacade;
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductGroupQuery::create();

        return $query->count() > 0;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Group';
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (!$data) {
            return;
        }

        $productGroupTransfer = new ProductGroupTransfer();
        $productGroupTransfer->addIdProductAbstract($data[static::FIELD_ID_PRODUCT_ABSTRACT]);

        if ($this->isGroupKeyCached($data)) {
            $this->extendProductGroup($this->getCachedIdProductGroup($data), $productGroupTransfer);
        } else {
            $this->createProductGroup($data[static::FIELD_GROUP_KEY], $productGroupTransfer);
        }
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    protected function isGroupKeyCached(array $data)
    {
        return isset(static::$productGroupCache[$data[static::FIELD_GROUP_KEY]]);
    }

    /**
     * @param array $data
     *
     * @return int
     */
    protected function getCachedIdProductGroup(array $data)
    {
        return static::$productGroupCache[$data[static::FIELD_GROUP_KEY]];
    }

    /**
     * @param int $idProductGroup
     * @param \Generated\Shared\Transfer\ProductGroupTransfer $productGroupTransfer
     *
     * @return void
     */
    protected function extendProductGroup($idProductGroup, $productGroupTransfer)
    {
        $productGroupTransfer->setIdProductGroup($idProductGroup);
        $this->productGroupFacade->extendProductGroup($productGroupTransfer);
    }

    /**
     * @param string $groupKey
     * @param \Generated\Shared\Transfer\ProductGroupTransfer $productGroupTransfer
     *
     * @return void
     */
    protected function createProductGroup($groupKey, $productGroupTransfer)
    {
        $productGroupTransfer = $this->productGroupFacade->createProductGroup($productGroupTransfer);

        static::$productGroupCache[$groupKey] = $productGroupTransfer->getIdProductGroup();
    }

}
