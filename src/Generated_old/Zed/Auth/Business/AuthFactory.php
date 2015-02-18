<?php 

namespace Generated\Zed\Auth\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class AuthFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Auth\Business\Model\Auth
     */
    public function createModelAuth()
    {
        $class = $this->transformClassName('ProjectA\Zed\Auth\Business\Model\Auth');
        $model = $class::getInstance();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Auth\Business\Model\HeaderLogin
     */
    public function createModelHeaderLogin()
    {
        $class = $this->transformClassName('ProjectA\Zed\Auth\Business\Model\HeaderLogin');
        $model = $class::getInstance();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
