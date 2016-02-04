<?php

namespace Pyz\Yves\Cart\Controller;

use Spryker\Yves\Application\Controller\AbstractController;
use Pyz\Yves\Cart\Plugin\Provider\CartControllerProvider;

/**
 * @method \Pyz\Yves\Cart\CartFactory getFactory()
 */
class VoucherController extends AbstractController
{

    /**
     * @param string $voucherCode
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction($voucherCode)
    {
        $this->getFactory()->createCartVoucherHandler()->add($voucherCode);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $voucherCode
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction($voucherCode)
    {
        $this->getFactory()->createCartVoucherHandler()->remove($voucherCode);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function clearAction()
    {
        $this->getFactory()->createCartVoucherHandler()->clear();

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }


}
