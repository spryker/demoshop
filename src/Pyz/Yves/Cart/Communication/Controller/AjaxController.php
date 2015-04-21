<?php
namespace Pyz\Yves\Cart\Communication\Controller;

use SprykerFeature\Shared\Cart\Transfer\CartItem;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use Pyz\Yves\Cart\Communication\Helper\CartControllerTrait;
use SprykerFeature\Yves\Library\Communication\MessageParser;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends AbstractController
{
    use CartControllerTrait;

    /**
     * @param CartItem $cartItem
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addAction(CartItem $cartItem, Request $request)
    {
        $transferResponse = $this->getCart($request)->addItem($cartItem);
        $parser = new MessageParser($this->getTranslator());

        return $this->jsonResponse([
            'success' => $transferResponse->isSuccess(),
            'messages' => $parser->parseAndTranslateMessages($transferResponse->getMessages()),
            'errorMessages' => $parser->parseAndTranslateMessages($transferResponse->getErrorMessages()),
            'count' => $this->getCart($request)->getCount()
        ]);
    }

    /**
     * @return LocatorLocatorInterface
     */
    protected function getLocator()
    {
        return $this->locator;
    }
}
