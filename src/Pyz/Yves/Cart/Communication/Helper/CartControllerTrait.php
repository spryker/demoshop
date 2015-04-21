<?php
namespace Pyz\Yves\Cart\Communication\Helper;

use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use SprykerFeature\Yves\Cart\Model\ZedCart;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CartControllerTrait
 * @package Pyz\Yves\Cart\Communication\Helper
 */
trait CartControllerTrait
{
    /**
     * @param Request $request
     * @return ZedCart
     */
    protected function getCart(Request $request)
    {
        return $this->getLocator()->cart()->pluginZedCart()->createZedCart(
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
     * @return \SprykerFeature\Yves\Library\Session\TransferSession
     */
    abstract protected function getTransferSession();
}
