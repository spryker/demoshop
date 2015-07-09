<?php

namespace Functional\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer;

use Pyz\Zed\ProductOption\Business\ProductOptionFacade;
use SprykerEngine\Zed\Kernel\AbstractFunctionalTest;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyAbstractProduct;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyProduct;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyProductQuery;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyAbstractProductQuery;

/**
 * @group Pyz
 * @group Zed
 * @group ProductOption
 * @group ProductOptionInstallerTest
 *
 * @method ProductOptionFacade getFacade()
 */
class ProductOptionInstallerTest extends AbstractFunctionalTest
{

    public function testImportXmlOptions()
    {
        $stub = $this->getMockBuilder('SprykerFeature\Zed\Console\Business\Model\ConsoleMessenger')
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
            $abstractProductEntity = SpyAbstractProductQuery::create()
                ->filterBySku($sku)
                ->findOne()
            ;

            if (!$abstractProductEntity) {
                $abstractProductEntity = new SpyAbstractProduct();
            }
            $abstractProductEntity
                ->setSku($sku)
                ->setAttributes('{}')
            ;

            if ($abstractProductEntity->isNew()) {
                $abstractProductEntity->save();
            }

            $concreteProductEntity = SpyProductQuery::create()
                ->filterBySku($sku)
                ->filterByFkAbstractProduct($abstractProductEntity->getIdAbstractProduct())
                ->findOne()
            ;

            if (!$concreteProductEntity) {
                $concreteProductEntity = new SpyProduct();
            }
            $concreteProductEntity
                ->setSku($sku)
                ->setAttributes('{}')
                ->setSpyAbstractProduct($abstractProductEntity)
            ;

            if ($concreteProductEntity->isNew()) {
                $concreteProductEntity->save();
            }
        }
    }
}
