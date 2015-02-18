<?php 

namespace Generated\Zed\Glossary\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class GlossaryFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Zed\Glossary\Business\Exception\KeyExistsException
     */
    public function createExceptionKeyExistsException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Exception\KeyExistsException');
        $model = new $class($message, $code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Zed\Glossary\Business\Exception\MissingKeyException
     */
    public function createExceptionMissingKeyException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Exception\MissingKeyException');
        $model = new $class($message, $code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Zed\Glossary\Business\Exception\MissingTranslationException
     */
    public function createExceptionMissingTranslationException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Exception\MissingTranslationException');
        $model = new $class($message, $code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Zed\Glossary\Business\Exception\TranslationExistsException
     */
    public function createExceptionTranslationExistsException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Exception\TranslationExistsException');
        $model = new $class($message, $code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\Glossary\Business\GlossaryDependencyContainer
     */
    public function createGlossaryDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\GlossaryDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\Glossary\Business\GlossaryFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\GlossaryFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $locator
     * @return \Pyz\Zed\Glossary\Business\GlossarySettings
     */
    public function createSettings($locator)
    {
        $class = $this->transformClassName('Pyz\Zed\Glossary\Business\GlossarySettings');
        $model = new $class($locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $settings
     * @return \ProjectA\Zed\Glossary\Business\Installer\GlossaryInstaller
     */
    public function createInstallerGlossaryInstaller($settings)
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Installer\GlossaryInstaller');
        $model = new $class($settings);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Glossary\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Glossary\Business\Key\ArrayKeySource
     */
    public function createKeyArrayKeySource()
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Key\ArrayKeySource');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Glossary\Business\Key\FileKeySource
     */
    public function createKeyFileKeySource()
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Key\FileKeySource');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $keySource
     * @param $queryContainer
     * @return \ProjectA\Zed\Glossary\Business\Key\KeyManager
     */
    public function createKeyKeyManager($keySource, $queryContainer)
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Key\KeyManager');
        $model = new $class($keySource, $queryContainer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $glossaryQueryContainer
     * @param $touchFacade
     * @param $localeFacade
     * @param $keyManager
     * @return \ProjectA\Zed\Glossary\Business\Translation\TranslationManager
     */
    public function createTranslationTranslationManager($glossaryQueryContainer, $touchFacade, $localeFacade, $keyManager)
    {
        $class = $this->transformClassName('ProjectA\Zed\Glossary\Business\Translation\TranslationManager');
        $model = new $class($glossaryQueryContainer, $touchFacade, $localeFacade, $keyManager);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
