<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\AlexaBot\Controller;

use Pyz\Yves\Application\Controller\AbstractController;
use Pyz\Yves\AlexaBot\AlexaBotFactory;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method AlexaBotFactory getFactory()
 */
class IndexController extends AbstractController
{

    /**
     * @param Request $request
     *
     * @throws ContainerKeyNotFoundException
     *
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
        $response = "Sorry, we are all out. What about some Nachos or Popcorn?";
        $myFood   = $request->get('food');

        $abstractId = $this->getAbstractIdByName($myFood);

        // Find the list of Variants
        $variant = $this->getFactory()->getAlexaProductPlugin()->getConcreteListByAbstractId($abstractId);

        if ($myFood && !empty($variant)) {
            switch(strtolower($myFood)) {
                case 'popcorn':
                    $response = "Would you like " . $variant[0]
                        . " or " . $variant[1]  . " " . $myFood. "?";
                    break;
                case 'nachos':
                    $response = "Would you like "  . $myFood . " with "
                        . $variant[0] . " or with " . $variant[1]  . "?";
                    break;
            }
        }

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
     * @throws ContainerKeyNotFoundException
     *
     * @return JsonResponse
     */
    public function concreteAction(Request $request)
    {
        $myFood      = $request->get('food');
        $myVariant   = $request->get('variant');
        $response    = "I don't have " . $myVariant . ". Would you like to order something else?";

        $abstractId = $this->getAbstractIdByName(
            $myFood
        );

        $variantSku = $this->getFactory()->getAlexaProductPlugin()->getConcreteSkuByAbstractIdAndVariant(
            $abstractId,
            $myVariant
        );

        $addToCartSuccess = $this->getFactory()->getAlexaProductPlugin()->addConcreteToCartBySku(
            $variantSku
        );


        if ($addToCartSuccess) {
            $response = "Your order is being shipped with same minute delivery. "
                . "Your payment method is a smile. To confirm shout Yes Spryker. "
                . "Do you confirm?";
        }

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
     * @throws ContainerKeyNotFoundException
     *
     * @return JsonResponse
     */
    public function paymentAction(Request $request)
    {
        $response    = "Sorry, it was impossible to complete the order. Could you try again?";

        $checkoutSuccess = $this->getFactory()->getAlexaProductPlugin()->performCheckout();

        if ($checkoutSuccess) {
            $response = "Your order is being delivered. Remember to smile";
        }

        return new JsonResponse(
            [
                'response' => $response
            ],
            200
        );
    }

    /**
     * @param string $abstractName
     *
     * @throws ContainerKeyNotFoundException
     *
     * @return int
     */
    protected function getAbstractIdByName($abstractName)
    {
        $catalogClient   = $this->getFactory()->getCatalogClient();
        $catalogResponse = $catalogClient->catalogSuggestSearch($abstractName);
//        echo "<pre>"; var_dump($catalogResponse); echo "</pre>"; die();
        $abstractId      = $catalogResponse['suggestionByType']['product_abstract'][0]['id_product_abstract'];

        return $abstractId;
    }

}
