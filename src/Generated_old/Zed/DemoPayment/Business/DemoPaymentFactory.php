<?php 

namespace Generated\Zed\DemoPayment\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class DemoPaymentFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\DemoPayment\Business\DemoPaymentFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\DemoPayment\Business\DemoPaymentFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $isSuccess
     * @return \ProjectA\Zed\DemoPayment\Business\Model\Api\Response
     */
    public function createModelApiResponse($isSuccess)
    {
        $class = $this->transformClassName('ProjectA\Zed\DemoPayment\Business\Model\Api\Response');
        $model = new $class($isSuccess);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\DemoPayment\Business\Model\Api
     */
    public function createModelApi()
    {
        $class = $this->transformClassName('ProjectA\Zed\DemoPayment\Business\Model\Api');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
