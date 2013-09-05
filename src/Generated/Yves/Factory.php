<?php 

namespace Generated\Yves;

use ProjectA\Yves\Library\DependencyInjection\FactoryInterface;
use ProjectA\Yves\Cart\Component\Model\CartStorage\CartStorageInterface;
use ProjectA\Yves\Cart\Component\Model\CartSession;
use ProjectA\Yves\Library\Session\TransferSession;
use Symfony\Component\HttpFoundation\Request;
use ProjectA\Yves\Library\Http\ResponseCookieBag;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Factory extends \ProjectA_Shared_Library_Architecture_Store
{

    /**
     * @var Factory
     */
    protected static $instance = null;

    /**
     * @return Factory
     * @throws \BadMethodCallException
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
            return self::$instance;
        } else {
            throw new \BadMethodCallException('It\'s not allowed to create a second instance of this class.');
        }
    }

    private function __construct()
    {
    }

    /**
     * @param CartStorageInterface $cartStorage
     * @param CartSession $cartSession
     * @return \ProjectA\Yves\Cart\Component\Model\Cart
     */
    public function getCartModelCart(CartStorageInterface $cartStorage, CartSession $cartSession)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Component\Model\Cart');
        $model = new $class($cartStorage, $cartSession);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param TransferSession $session
     * @return \ProjectA\Yves\Cart\Component\Model\CartSession
     */
    public function getCartModelCartSession(TransferSession $session)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Component\Model\CartSession');
        $model = new $class($session);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param Request $request
     * @param ResponseCookieBag $cookieBag
     * @param Session $session
     * @return \ProjectA\Yves\Cart\Component\Model\CartStorage\CartStorage
     */
    public function getCartModelCartStorageCartStorage(Request $request, ResponseCookieBag $cookieBag, Session $session)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Component\Model\CartStorage\CartStorage');
        $model = new $class($request, $cookieBag, $session);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Setup\Component\Model\Heartbeat
     */
    public function getSetupModelHeartbeat()
    {
        $class = $this->transformClassName('ProjectA\Yves\Setup\Component\Model\Heartbeat');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }


}
