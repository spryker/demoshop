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
 * @method ProductOptionFacade getFacade()
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
     * @return \PHPUnit_Framework_MockObject_MockObject|ConsoleMessenger
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
            $abstractProductEntity = SpyProductAbstractQuery::create()
                ->filterBySku($sku)
                ->findOneOrCreate();

            $abstractProductEntity
                ->setSku($sku)
                ->setAttributes('{}');

            if ($abstractProductEntity->isNew()) {
                $abstractProductEntity->save();
            }

            $productConcreteEntity = SpyProductQuery::create()
                ->filterBySku($sku)
                ->filterByFkProductAbstract($abstractProductEntity->getIdProductAbstract())
                ->findOneOrCreate();

            $productConcreteEntity
                ->setSku($sku)
                ->setAttributes('{}')
                ->setSpyProductAbstract($abstractProductEntity);

            if ($productConcreteEntity->isNew()) {
                $productConcreteEntity->save();
            }
        }
    }

}
