<?php

namespace Functional\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer;

use Pyz\Zed\ProductOption\Business\ProductOptionFacade;
use SprykerEngine\Zed\Kernel\AbstractFunctionalTest;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyProduct;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyAbstractProduct;
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

        $this->ensureProductFixturesExistInDb();

        $this->getFacade()->installDemoData($stub);
    }

    private function ensureProductFixturesExistInDb()
    {
        $this->loadAbstractProductsIfNotInDb(['136823', '137455']);
        $this->loadConcreteProductsIfNotInDb(['136823', '137288', '137455']);
    }

    private function loadAbstractProductsIfNotInDb(array $skus)
    {
        foreach ($skus as $sku) {
            $result = SpyAbstractProductQuery::create()->filterBySku($sku)->findOne();
            if (null === $result) {
                $abstractProduct = (new SpyAbstractProduct())
                    ->setSku($sku);
                $abstractProduct->save();
            }
        }
    }

    private function loadConcreteProductsIfNotInDb(array $skus)
    {
        foreach ($skus as $sku) {
            $result = SpyProductQuery::create()->filterBySku($sku)->findOne();
            if (null === $result) {
                $concreteProduct = (new SpyProduct())
                    ->setSku($sku);
                $concreteProduct->save();
            }
        }
    }
}
