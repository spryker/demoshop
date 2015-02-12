<?php
namespace Pyz\Yves\Cart\Communication\Helper;

use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CartControllerTrait
 * @package Pyz\Yves\Cart\Communication\Helper
 */
trait CartControllerTrait
{
    /**
     * @param Request $request
     * @return \ProjectA\Yves\Cart\Business\Model\ZedCart
     */
    protected function getCart(Request $request)
    {
        return $this->getLocator()->cart()->pluginZedCart->createZedCart(
            $this->getTransferSession(),
            $request,
            $this->getCookieBag(),
            $request->getSession()
        );
    }

    /**
     * @return LocatorLocatorInterface
     */
    abstract protected function getLocator();

    /**
     * @return mixed
     */
    abstract protected function getCookieBag();

    /**
     * @return \ProjectA\Yves\Library\Session\TransferSession
     */
    abstract protected function getTransferSession();
}
