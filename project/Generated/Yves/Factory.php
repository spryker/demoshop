<?php 

namespace Generated\Yves;

use Symfony\Component\HttpFoundation\Response;

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Factory extends \ProjectA_Shared_Library_Architecture_Store
{

    protected static $instance = null;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        } else {
            throw new \Exception('It\'s not allowed to create an instance of this class');
        }
        return self::$instance;
    }

    /**
     * @param Response $response 
     * @return \ProjectA\Yves\Cart\Component\Model\Cart
     */
    public function getCartModelCart(Response $response)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Component\Model\Cart');
        $model = new $class($response);
        return $model;
    }

    /**
     * @param Response $response 
     * @return \ProjectA\Yves\Cart\Component\Model\CartStorage
     */
    public function getCartModelCartStorage(Response $response)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Component\Model\CartStorage');
        $model = new $class($response);
        return $model;
    }


}
