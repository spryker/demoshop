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
        $response = "Sorry, we are all out. What about some Nachos or Popcorn?";
        $myFood = $request->get('food');

        $variants = $this->getClient()->getVariantsByProductName($myFood);

        if ($myFood && !empty($variants)) {
            switch (strtolower($myFood)) {
                case 'popcorn':
                    $response = "Would you like " . $variants[0]
                        . " or " . $variants[1] . " " . $myFood . "?";
                    break;
                case 'nachos':
                    $response = "Would you like " . $myFood . " with "
                        . $variants[0] . " or with " . $variants[1] . "?";
                    break;
            }
        }

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
    public function cartAction(Request $request)
    {
        $myVariant = $request->get('variant');

        $response = "I don not have " . $myVariant . ". Would you like to order something else?";

        $result = $this->getClient()->addVariantToCart(
            $myVariant
        );

        if ($result) {
            $response = "Your order will be shipped with same minute delivery. "
                . "Your payment method is a smile. To confirm shout Yes Spryker, and smile :) "
                . "Do you confirm?";
        }

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
        $response = "Sorry, it was impossible to complete the order. Could you try again?";

        $isSuccess = $this->getClient()->checkoutAndPlaceOrder();

        if ($isSuccess) {
            //@todo to remove when moved in OMS
            //$this->getFactory()->getAlexaProductPlugin()->sendConfirmationSms($mySession);
            $response = $isSuccess;
        }

        return new JsonResponse(
            [
                'response' => $response,
            ],
            200
        );
    }
}
