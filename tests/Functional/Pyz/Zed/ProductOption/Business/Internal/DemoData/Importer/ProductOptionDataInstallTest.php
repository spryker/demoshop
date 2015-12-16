<?php

namespace Functional\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer;

use Pyz\Zed\ProductOption\Business\ProductOptionFacade;
use Spryker\Zed\Kernel\AbstractFunctionalTest;
use Orm\Zed\Product\Persistence\SpyProductAbstract;
use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;

/**
 * @group Pyz
 * @group Zed
 * @group ProductOption
 * @group ProductOptionInstallerTest
 *
 * @method ProductOptionFacade getFacade()
 */
class ProductOptionDataInstallTest extends AbstractFunctionalTest
{

    public function testImportXmlOptions()
    {
        $stub = $this->getMockBuilder('Spryker\Zed\Console\Business\Model\ConsoleMessenger')
            ->disableOriginalConstructor()
            ->getMock();

        $this->loadProductsIfNotInDb(['136823', '137288', '137455']);

        $this->getFacade()->installDemoData($stub);
    }

    /**
     * @param array $skus
     */
    private function loadProductsIfNotInDb(array $skus)
    {
        foreach ($skus as $sku) {
            $abstractProductEntity = SpyProductAbstractQuery::create()
                ->filterBySku($sku)
                ->findOne();

            if (!$abstractProductEntity) {
                $abstractProductEntity = new SpyProductAbstract();
            }
            $abstractProductEntity
                ->setSku($sku)
                ->setAttributes('{}');

            if ($abstractProductEntity->isNew()) {
                $abstractProductEntity->save();
            }

            $concreteProductEntity = SpyProductQuery::create()
                ->filterBySku($sku)
                ->filterByFkProductAbstract($abstractProductEntity->getIdProductAbstract())
                ->findOne();

            if (!$concreteProductEntity) {
                $concreteProductEntity = new SpyProduct();
            }
            $concreteProductEntity
                ->setSku($sku)
                ->setAttributes('{}')
                ->setSpyProductAbstract($abstractProductEntity);

            if ($concreteProductEntity->isNew()) {
                $concreteProductEntity->save();
            }
        }
    }

}
