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
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function productAction(Request $request)
    {
        $response = "Sorry, we are all out. What about some Nachos or Popcorn?";
        $myFood = $request->get('food');

        $abstractId = $this->getClient()->getAbstractIdByAbstractName($myFood);

        // Find the list of Variants
        $variant = $this->getClient()->getConcreteListByAbstractId($abstractId);

        if ($myFood && !empty($variant)) {
            switch (strtolower($myFood)) {
                case 'popcorn':
                    $response = "Would you like " . $variant[0]
                        . " or " . $variant[1] . " " . $myFood . "?";
                    break;
                case 'nachos':
                    $response = "Would you like " . $myFood . " with "
                        . $variant[0] . " or with " . $variant[1] . "?";
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
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function cartAction(Request $request)
    {
        $myFood = $request->get('food');
        $myVariant = $request->get('variant');
        $mySession = $request->get('session');

        $response = "I don not have " . $myVariant . ". Would you like to order something else?";

        $abstractId = $this->getClient()->getAbstractIdByAbstractName($myFood);
        $variantSku = $this->getClient()->getConcreteSkuByAbstractIdAndVariant(
            $abstractId,
            $myVariant
        );

        $result = $this->getClient()->addConcreteToCartBySku($variantSku, $mySession);

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
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function checkoutAndOrderAction(Request $request)
    {
        $response = "Sorry, it was impossible to complete the order. Could you try again?";
        $mySession = $request->get('session');

        $isSuccess = $this->getClient()->performCheckout($mySession);

        if ($isSuccess) {
//            $this->getFactory()->getAlexaProductPlugin()->sendConfirmationSms($mySession);
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
