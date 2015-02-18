<?php 

namespace Generated\Zed\Document\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class DocumentFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Document\Business\DocumentFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\DocumentFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Document\Business\DocumentSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\DocumentSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Document\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Document\Business\Model\Document
     */
    public function createModelDocument()
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\Model\Document');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Document\Business\Model\RenderEngine\Html
     */
    public function createModelRenderEngineHtml()
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\Model\RenderEngine\Html');
        $model = $class::getInstance();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $data (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Document\Business\Model\RenderEngine\Pdf\DeliverySlip
     */
    public function createModelRenderEnginePdfDeliverySlip($data = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\Model\RenderEngine\Pdf\DeliverySlip');
        $model = new $class($data);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $data (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Document\Business\Model\RenderEngine\Pdf\Invoice
     */
    public function createModelRenderEnginePdfInvoice($data = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\Model\RenderEngine\Pdf\Invoice');
        $model = new $class($data);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Document\Business\Model\RenderEngine\Pdf
     */
    public function createModelRenderEnginePdf()
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\Model\RenderEngine\Pdf');
        $model = $class::getInstance();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Document\Business\Model\RenderEngine\Text
     */
    public function createModelRenderEngineText()
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\Model\RenderEngine\Text');
        $model = $class::getInstance();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Document\Business\Model\RenderEngine
     */
    public function createModelRenderEngine()
    {
        $class = $this->transformClassName('ProjectA\Zed\Document\Business\Model\RenderEngine');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
