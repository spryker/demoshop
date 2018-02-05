<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductCustomerPermission;

use Orm\Zed\ProductCustomerPermission\Persistence\SpyProductCustomerPermissionQuery;
use Pyz\Zed\DataImport\Business\Model\Customer\Repository\CustomerRepositoryInterface;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface;
use Spryker\Shared\ProductCustomerPermission\ProductCustomerPermissionConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;

class ProductCustomerPermissionWriterStep extends TouchAwareStep implements DataImportStepInterface
{
    const BULK_SIZE = 1000;

    const KEY_PRODUCT_ABSTRACT_SKU = 'product_abstract_sku';
    const KEY_CUSTOMER_REFERENCE = 'customer_reference';

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Customer\Repository\CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Customer\Repository\CustomerRepositoryInterface $customerRepository
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface $productRepository
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     * @param null|int $bulkSize
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        ProductRepositoryInterface $productRepository,
        DataImportToTouchInterface $touchFacade,
        $bulkSize = null
    ) {
        parent::__construct($touchFacade, $bulkSize);

        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $idCustomer = $this->customerRepository
            ->getIdByCustomerReference($dataSet[static::KEY_CUSTOMER_REFERENCE]);
        $idProduct = $this->productRepository
            ->getIdProductAbstractByAbstractSku($dataSet[static::KEY_PRODUCT_ABSTRACT_SKU]);

        $productCustomerPermissionEntity = SpyProductCustomerPermissionQuery::create()
            ->filterByFkCustomer($idCustomer)
            ->filterByFkProductAbstract($idProduct)
            ->findOneOrCreate();

        if ($productCustomerPermissionEntity->isNew()) {
            $productCustomerPermissionEntity->save();

            $this->addMainTouchable(
                ProductCustomerPermissionConfig::RESOURCE_TYPE_PRODUCT_CUSTOMER_PERMISSION,
                $productCustomerPermissionEntity->getIdProductCustomerPermission()
            );
        }
    }
}
