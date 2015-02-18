<?php 

namespace Generated\Zed\Newsletter\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class NewsletterFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Newsletter\Business\Model\Newsletter
     */
    public function createModelNewsletter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Newsletter\Business\Model\Newsletter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Newsletter\Business\Model\Provider\Api\MailChimp
     */
    public function createModelProviderApiMailChimp()
    {
        $class = $this->transformClassName('ProjectA\Zed\Newsletter\Business\Model\Provider\Api\MailChimp');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Newsletter\Business\Model\Provider\Internal
     */
    public function createModelProviderInternal()
    {
        $class = $this->transformClassName('ProjectA\Zed\Newsletter\Business\Model\Provider\Internal');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Newsletter\Business\Model\Provider\MailChimp
     */
    public function createModelProviderMailChimp()
    {
        $class = $this->transformClassName('ProjectA\Zed\Newsletter\Business\Model\Provider\MailChimp');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Newsletter\Business\NewsletterFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Newsletter\Business\NewsletterFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Newsletter\Business\NewsletterSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Newsletter\Business\NewsletterSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
