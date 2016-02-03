<?php

namespace Functional\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer;

use Codeception\TestCase\Test;
use Pyz\Zed\ProductOption\Business\ProductOptionFacade;
use Spryker\Zed\Console\Business\Model\ConsoleMessenger;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;

/**
 * @group Pyz
 * @group Zed
 * @group ProductOption
 * @group ProductOptionInstallerTest
 *
 * @method \Pyz\Zed\ProductOption\Business\ProductOptionFacade getFacade()
 */
class ProductOptionDataInstallTest extends Test
{

    /**
     * @return void
     */
    public function testImportXmlOptions()
    {
        $messengerMock = $this->getMessengerMock();

        $this->loadProductsIfNotInDb(['136823', '137288', '137455']);

        $productOptionFacade = new ProductOptionFacade();
        $productOptionFacade->installDemoData($messengerMock);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Zed\Console\Business\Model\ConsoleMessenger
     */
    protected function getMessengerMock()
    {
        $messengerMock = $this->getMockBuilder(ConsoleMessenger::class)
            ->disableOriginalConstructor()
            ->getMock();

        return $messengerMock;
    }

    /**
     * @param array $skuCollection
     */
    private function loadProductsIfNotInDb(array $skuCollection)
    {
        foreach ($skuCollection as $sku) {
            $productAbstractEntity = SpyProductAbstractQuery::create()
                ->filterBySku($sku)
                ->findOneOrCreate();

            $productAbstractEntity
                ->setSku($sku)
                ->setAttributes('{}');

            if ($productAbstractEntity->isNew()) {
                $productAbstractEntity->save();
            }

            $productConcreteEntity = SpyProductQuery::create()
                ->filterBySku($sku)
                ->filterByFkProductAbstract($productAbstractEntity->getIdProductAbstract())
                ->findOneOrCreate();

            $productConcreteEntity
                ->setSku($sku)
                ->setAttributes('{}')
                ->setSpyProductAbstract($productAbstractEntity);

            if ($productConcreteEntity->isNew()) {
                $productConcreteEntity->save();
            }
        }
    }

}
