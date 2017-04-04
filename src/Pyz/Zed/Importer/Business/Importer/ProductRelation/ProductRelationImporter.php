<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\ProductRelation;

use Generated\Shared\Transfer\ProductRelationTransfer;
use Generated\Shared\Transfer\ProductRelationTypeTransfer;
use Generated\Shared\Transfer\PropelQueryBuilderRuleSetTransfer;
use Orm\Zed\ProductRelation\Persistence\SpyProductRelationQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Service\UtilEncoding\UtilEncodingServiceInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductRelation\Business\ProductRelationFacadeInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

class ProductRelationImporter extends AbstractImporter
{

    const COL_SKU = 'product';
    const COL_RELATION_TYPE = 'relation_type';
    const COL_RULE = 'rule';

    /**
     * @var \Spryker\Zed\ProductRelation\Business\ProductRelationFacadeInterface
     */
    protected $productRelationFacade;

    /**
     * @var \Spryker\Service\UtilEncoding\UtilEncodingServiceInterface
     */
    protected $utilEncodingService;

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\ProductRelation\Business\ProductRelationFacadeInterface $productRelationFacade
     * @param \Spryker\Service\UtilEncoding\UtilEncodingServiceInterface $utilEncodingService
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductRelationFacadeInterface $productRelationFacade,
        UtilEncodingServiceInterface $utilEncodingService,
        ProductFacadeInterface $productFacade
    ) {
        parent::__construct($localeFacade);
        $this->productRelationFacade = $productRelationFacade;
        $this->utilEncodingService = $utilEncodingService;
        $this->localeFacade = $localeFacade;
        $this->productFacade = $productFacade;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (count($data) == 0) {
            return;
        }

        $productRelationTransfer = $this->createProductRelationTransfer($data);

        $this->productRelationFacade->createProductRelation($productRelationTransfer);
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        return SpyProductRelationQuery::create()->count() > 0;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product relation';
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ProductRelationTransfer
     */
    protected function createProductRelationTransfer(array $data)
    {
        $productRelationTransfer = new ProductRelationTransfer();
        $productRelationTransfer->setIsActive(true);
        $productRelationTransfer->setIsRebuildScheduled(true);

        $productRelationQuerySet = new PropelQueryBuilderRuleSetTransfer();
        $productRelationQuerySet->fromArray($this->utilEncodingService->decodeJson($data[static::COL_RULE], true));

        $productRelationTransfer->setQuerySet($productRelationQuerySet);

        $idProductAbstract = $this->productFacade->findProductAbstractIdBySku($data[static::COL_SKU]);

        $productRelationTransfer->setFkProductAbstract($idProductAbstract);

        $productRelationTypeTransfer = new ProductRelationTypeTransfer();
        $productRelationTypeTransfer->setKey($data[static::COL_RELATION_TYPE]);
        $productRelationTransfer->setProductRelationType($productRelationTypeTransfer);

        return $productRelationTransfer;
    }

}
