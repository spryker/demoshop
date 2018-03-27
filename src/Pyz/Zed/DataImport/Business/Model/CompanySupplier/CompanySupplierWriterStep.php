<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CompanySupplier;

use Orm\Zed\Company\Persistence\SpyCompanyTypeQuery;
use Orm\Zed\CompanySupplier\Persistence\SpyCompanySupplierToProductQuery;
use Pyz\Zed\DataImport\Business\Model\Company\Repository\CompanyRepository;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CompanySupplierWriterStep implements DataImportStepInterface
{
    protected const KEY_COMPANY_NAME = 'company_name';
    protected const KEY_PRODUCT_SKU = 'product_sku';

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var CompanyRepository
     */
    protected $companyRepository;

    /**
     * @param ProductRepository $productRepository
     * @param CompanyRepository $companyRepository
     */
    public function __construct(ProductRepository $productRepository, CompanyRepository $companyRepository)
    {
        $this->productRepository = $productRepository;
        $this->companyRepository = $companyRepository;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $idProduct = $this->productRepository->getIdProductByConcreteSku($dataSet[static::KEY_PRODUCT_SKU]);
        $idCompany = $this->companyRepository->getIdCompanyByName($dataSet[static::KEY_COMPANY_NAME]);

        $companySupplier = SpyCompanySupplierToProductQuery::create()
            ->filterByFkCompany($idCompany)
            ->filterByFkProduct($idProduct)
            ->findOneOrCreate();

        $companySupplier->save();
    }
}
