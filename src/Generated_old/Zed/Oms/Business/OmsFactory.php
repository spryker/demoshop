<?php 

namespace Generated\Zed\Oms\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class OmsFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param \ProjectA\Zed\Oms\Business\Model\Process\EventInterface $event
     * @param \ProjectA\Zed\Oms\Business\Model\Process\StatusInterface $status
     * @param \ProjectA\Zed\Oms\Business\Model\Process\TransitionInterface $transition
     * @param $process
     * @param $xmlFolder (optional) default: null
     * @return \ProjectA\Zed\Oms\Business\Model\Builder
     */
    public function createModelBuilder(\ProjectA\Zed\Oms\Business\Model\Process\EventInterface $event, \ProjectA\Zed\Oms\Business\Model\Process\StatusInterface $status, \ProjectA\Zed\Oms\Business\Model\Process\TransitionInterface $transition, $process, $xmlFolder = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Builder');
        $model = new $class($event, $status, $transition, $process, $xmlFolder);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Oms\Business\Model\Builder $builder
     * @return \ProjectA\Zed\Oms\Business\Model\Dummy
     */
    public function createModelDummy(\ProjectA\Zed\Oms\Business\Model\Builder $builder)
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Dummy');
        $model = new $class($builder);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Oms\Persistence\OmsQueryContainer $queryContainer
     * @param \ProjectA\Zed\Oms\Business\Model\BuilderInterface $builder
     * @param $activeProcesses
     * @return \ProjectA\Zed\Oms\Business\Model\Finder
     */
    public function createModelFinder(\ProjectA\Zed\Oms\Persistence\OmsQueryContainer $queryContainer, \ProjectA\Zed\Oms\Business\Model\BuilderInterface $builder, $activeProcesses)
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Finder');
        $model = new $class($queryContainer, $builder, $activeProcesses);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Oms\Persistence\OmsQueryContainer $queryContainer
     * @return \ProjectA\Zed\Oms\Business\Model\OrderStateMachine\Timeout
     */
    public function createModelOrderStateMachineTimeout(\ProjectA\Zed\Oms\Persistence\OmsQueryContainer $queryContainer)
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\OrderStateMachine\Timeout');
        $model = new $class($queryContainer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Oms\Persistence\OmsQueryContainer $queryContainer
     * @param \ProjectA\Zed\Oms\Business\Model\BuilderInterface $builder
     * @param \ProjectA\Zed\Oms\Business\Model\Util\TransitionLogInterface $transitionLog
     * @param \ProjectA\Zed\Oms\Business\Model\OrderStateMachine\TimeoutInterface $timeout
     * @param \ProjectA\Zed\Oms\Business\Model\Util\CollectionToArrayTransformerInterface $collectionToArrayTransformer
     * @param \ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject $activeProcesses
     * @param $conditions
     * @param $commands
     * @return \ProjectA\Zed\Oms\Business\Model\OrderStateMachine
     */
    public function createModelOrderStateMachine(\ProjectA\Zed\Oms\Persistence\OmsQueryContainer $queryContainer, \ProjectA\Zed\Oms\Business\Model\BuilderInterface $builder, \ProjectA\Zed\Oms\Business\Model\Util\TransitionLogInterface $transitionLog, \ProjectA\Zed\Oms\Business\Model\OrderStateMachine\TimeoutInterface $timeout, \ProjectA\Zed\Oms\Business\Model\Util\CollectionToArrayTransformerInterface $collectionToArrayTransformer, \ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject $activeProcesses, $conditions, $commands)
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\OrderStateMachine');
        $model = new $class($queryContainer, $builder, $transitionLog, $timeout, $collectionToArrayTransformer, $activeProcesses, $conditions, $commands);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Oms\Business\Model\PersistenceManager
     */
    public function createModelPersistenceManager()
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\PersistenceManager');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Oms\Business\Model\Process\Event
     */
    public function createModelProcessEvent()
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Process\Event');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Oms\Business\Model\Process\Status
     */
    public function createModelProcessStatus()
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Process\Status');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Oms\Business\Model\Process\Transition
     */
    public function createModelProcessTransition()
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Process\Transition');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Oms\Business\Model\Util\DrawerInterface $drawer
     * @return \ProjectA\Zed\Oms\Business\Model\Process
     */
    public function createModelProcess(\ProjectA\Zed\Oms\Business\Model\Util\DrawerInterface $drawer)
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Process');
        $model = new $class($drawer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Oms\Business\Model\StateMachine
     */
    public function createModelStateMachine()
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\StateMachine');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Oms\Business\Model\Util\CollectionToArrayTransformer
     */
    public function createModelUtilCollectionToArrayTransformer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Util\CollectionToArrayTransformer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Oms\Business\Model\Util\Drawer
     */
    public function createModelUtilDrawer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Util\Drawer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Oms\Business\Model\Util\Loader
     */
    public function createModelUtilLoader()
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Util\Loader');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $array
     * @return \ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject
     */
    public function createModelUtilReadOnlyArrayObject($array)
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject');
        $model = new $class($array);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Oms\Persistence\OmsQueryContainer $queryContainer
     * @param $logContext
     * @return \ProjectA\Zed\Oms\Business\Model\Util\TransitionLog
     */
    public function createModelUtilTransitionLog(\ProjectA\Zed\Oms\Persistence\OmsQueryContainer $queryContainer, $logContext)
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\Model\Util\TransitionLog');
        $model = new $class($queryContainer, $logContext);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\Oms\Business\OmsDependencyContainer
     */
    public function createOmsDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\OmsDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Oms\Business\OmsFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Oms\Business\OmsFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Oms\Business\OmsSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Oms\Business\OmsSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
