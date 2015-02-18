<?php 

namespace Generated\Zed\Acl\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class AclFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Acl\Business\AclFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\AclFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Acl\Business\AclSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\AclSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Acl\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\Acl\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Acl\Business\Model\Acl
     */
    public function createModelAcl()
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\Model\Acl');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $code
     * @param \Exception $previous (optional) default: null
     * @return \ProjectA_Zed_Acl_Business_Model_Exception_ExceptionGroupUsed
     */
    public function createModelExceptionExceptionGroupUsed($code = 0, \Exception $previous = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Business_Model_Exception_ExceptionGroupUsed');
        $model = new $class($code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Acl\Business\Model\Group
     */
    public function createModelGroup()
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\Model\Group');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Acl\Business\Model\GroupPrivilege
     */
    public function createModelGroupPrivilege()
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\Model\GroupPrivilege');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $module
     * @param $controller
     * @param $action
     * @param $parameters
     * @return \ProjectA\Zed\Acl\Business\Model\MvcResource
     */
    public function createModelMvcResource($module, $controller, $action, $parameters)
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\Model\MvcResource');
        $model = new $class($module, $controller, $action, $parameters);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Acl\Business\Model\Pattern
     */
    public function createModelPattern()
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\Model\Pattern');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Acl\Business\Model\Resource\Finder\ResourcesFinder
     */
    public function createModelResourceFinderResourcesFinder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\Model\Resource\Finder\ResourcesFinder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Acl\Business\Model\Role
     */
    public function createModelRole()
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\Model\Role');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Acl\Business\Model\User
     */
    public function createModelUser()
    {
        $class = $this->transformClassName('ProjectA\Zed\Acl\Business\Model\User');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
