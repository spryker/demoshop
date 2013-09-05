<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_PhpUnit_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA\Zed\PhpUnit\Component\Model\Bootstrap
     */
    public function getProjectA\Zed\PhpUnit\Component\Model\Bootstrap()
    {
        $class = $this->transformClassName('ProjectA\Zed\PhpUnit\Component\Model\Bootstrap');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
