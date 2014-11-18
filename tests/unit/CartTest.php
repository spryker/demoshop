<?php

use Generated\Shared\Library\TransferLoader;
use Generated\Zed\Cart\Component\CartFactory;
use Generated\Zed\DependencyInjectionContainer;
use ProjectA\Zed\Cart\Component\CartFacade;

class CartTest extends \Codeception\TestCase\Test
{
    /**
     * @var CartFacade
     */
    private $cartFacade;

    protected function setUp()
    {
        parent::setUp();
        $cartFactory = new CartFactory();
        $this->cartFacade = new CartFacade();
        $dependencyContainer = new DependencyInjectionContainer();
        $dependencyContainer->doInjection($this->cartFacade, $cartFactory);
    }

    public function testAddToCart()
    {
        $product = Generated_Zed_Catalog_Persistence_Om_BasePacCatalogProductQuery::create()
            ->findOne();


        $cartItem = TransferLoader::loadCartItem();
        $cartItem->setSku($product->getSku());
        $cartItem->setQuantity(1);
        $cartItem->setUniqueIdentifier($product->getSku());

        $cartChange = TransferLoader::loadCartChange();
        $cartChange->addChangedCartItem($cartItem);

        $result = $this->cartFacade->addItems($cartChange);
        $this->assertTrue($result->isSuccess());

        /** @var \Generated\Shared\Sales\Transfer\Order $order */
        $order = $result->getTransfer();

        $this->assertCount(1, $order->getItems());
    }
}