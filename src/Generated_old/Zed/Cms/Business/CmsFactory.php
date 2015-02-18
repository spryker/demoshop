<?php 

namespace Generated\Zed\Cms\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class CmsFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Cms\Business\CmsFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\CmsFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Cms\Business\CmsSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Cms\Business\CmsSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Exporter\KeyValue\CmsExporter
     */
    public function createExporterKeyValueCmsExporter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Exporter\KeyValue\CmsExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Exporter\KeyValue\RedirectionExporter
     */
    public function createExporterKeyValueRedirectionExporter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Exporter\KeyValue\RedirectionExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall
     */
    public function createInternalDemoDataCmsInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Internal\DemoData\MailTemplateInstall
     */
    public function createInternalDemoDataMailTemplateInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Internal\DemoData\MailTemplateInstall');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\Block\BlockFactory
     */
    public function createModelBlockBlockFactory()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\Block\BlockFactory');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $data (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Cms\Business\Model\Block\BlockGlossary
     */
    public function createModelBlockBlockGlossary($data = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\Block\BlockGlossary');
        $model = new $class($data);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $blockType
     * @return \ProjectA\Zed\Cms\Business\Model\Block\BlockNotFoundException
     */
    public function createModelBlockBlockNotFoundException($blockType)
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\Block\BlockNotFoundException');
        $model = new $class($blockType);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $data (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Cms\Business\Model\Block\BlockProduct
     */
    public function createModelBlockBlockProduct($data = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\Block\BlockProduct');
        $model = new $class($data);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $data (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Cms\Business\Model\Block\BlockText
     */
    public function createModelBlockBlockText($data = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\Block\BlockText');
        $model = new $class($data);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\BlockRepository
     */
    public function createModelBlockRepository()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\BlockRepository');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $idCmsPage (optional) default: null
     * @return \ProjectA\Zed\Cms\Business\Model\CmsPage
     */
    public function createModelCmsPage($idCmsPage = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\CmsPage');
        $model = new $class($idCmsPage);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\CmsPageAttributes
     */
    public function createModelCmsPageAttributes()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\CmsPageAttributes');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\CmsPageBlock
     */
    public function createModelCmsPageBlock()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\CmsPageBlock');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\CmsPageBlockCollection
     */
    public function createModelCmsPageBlockCollection()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\CmsPageBlockCollection');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\DataAccessObject\TemplatePartial
     */
    public function createModelDataAccessObjectTemplatePartial()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\DataAccessObject\TemplatePartial');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\Installer
     */
    public function createModelInstaller()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\Installer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\Layout
     */
    public function createModelLayout()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\Layout');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\Redirection
     */
    public function createModelRedirection()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\Redirection');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\Template
     */
    public function createModelTemplate()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\Template');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cms\Business\Model\TemplatePartial
     */
    public function createModelTemplatePartial()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cms\Business\Model\TemplatePartial');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
