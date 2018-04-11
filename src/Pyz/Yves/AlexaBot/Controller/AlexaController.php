<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\AlexaBot\Controller;

use Pyz\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Client\AlexaBot\AlexaBotClient getClient()
 */
class AlexaController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return JsonResponse
     */
    public function productAction(Request $request)
    {
        $productName = $request->get('snack');
        $variants = $this->getClient()->getVariantsByProductName($productName);

        $response = !empty($variants)
            ? $response = "Would you like " . $variants[0] . " or " . $variants[1] . " " . $productName . "?"
            : "Sorry, I could not find any " . $productName . "s. Try again!";

        return new JsonResponse(
            [
                'response' => $response
            ],
            200
        );
    }

    /**
     * @param Request $request
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return JsonResponse
     */
    public function cartAction(Request $request)
    {
        $variantName = $request->get('variant');
        $isSuccess = $this->getClient()->addVariantToCart($variantName);

        $response = $isSuccess
            ? "Your order will be shipped with same minute delivery. Your payment method is a smile. To confirm shout Yes Spryker and smile. Do you confirm?"
            : "I don not have . $variantName . Would you like to order something else?";

        return new JsonResponse(
            [
                'response' => $response,
            ],
            200
        );
    }

    /**
     * @param Request $request
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return JsonResponse
     */
    public function checkoutAndOrderAction(Request $request)
    {
        $isSuccess =  $this->getClient()->checkoutAndPlaceOrder();

        $response = $isSuccess
            ? "Your order is on its way. Enjoy it and remember to smile!"
            : "Sorry, I could not place your order, check your code and try again. I am here all day!";

        return new JsonResponse(
            [
                'response' => $response
            ],
            200
        );
    }
}
