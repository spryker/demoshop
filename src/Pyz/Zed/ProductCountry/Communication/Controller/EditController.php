<?php

namespace Pyz\Zed\ProductCountry\Communication\Controller;

use Generated\Shared\Transfer\ProductCountryTransfer;
use Pyz\Zed\ProductCountry\Business\ProductCountryFacade;
use Pyz\Zed\ProductCountry\Communication\ProductCountryDependencyContainer;
use SprykerFeature\Zed\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method ProductCountryFacade getFacade
 * @method ProductCountryDependencyContainer getDependencyContainer
 */
class EditController extends AbstractController
{

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $form = $this->getDependencyContainer()->createProductCountryForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $productCountryTransfer = new ProductCountryTransfer();
            $productCountryTransfer->fromArray($form->getData(), true);

            $this->getFacade()->saveProductCountry($productCountryTransfer);

            return $this->redirectResponse('/product-country');
        }

        return [
            'form' => $form->createView(),
        ];
    }
}
