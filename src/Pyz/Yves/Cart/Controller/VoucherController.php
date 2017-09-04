<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Controller;

use Pyz\Yves\Application\Controller\AbstractController;
use Pyz\Yves\Cart\Form\VoucherForm;
use Pyz\Yves\Cart\Plugin\Provider\CartControllerProvider;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Cart\CartFactory getFactory()
 */
class VoucherController extends AbstractController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction(Request $request)
    {
        $form = $this->getFactory()
            ->getVoucherForm()
            ->handleRequest($request);

        if ($form->isValid()) {
            $code = $form->get(VoucherForm::FIELD_VOUCHER_CODE)->getData();

            $this->getFactory()
                ->createCartCodeHandler()
                ->add($code);

        }

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction(Request $request)
    {
        $voucherCode = $request->query->get('code');
        if (!empty($voucherCode)) {
            $this->getFactory()
                ->createCartCodeHandler()
                ->remove($voucherCode);
        }

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function clearAction()
    {
        $this->getFactory()->createCartCodeHandler()->clear();

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

}
