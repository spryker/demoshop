<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Cms\Dependency\Facade;

use Generated\Shared\Transfer\LocaleTransfer;

class CmsToLocaleBridge implements CmsToLocaleInterface
{

    /**
     * @var \SprykerEngine\Zed\Locale\Business\LocaleFacade
     */
    protected $localeFacade;

    /**
     * CmsToLocaleBridge constructor.
     *
     * @param \SprykerEngine\Zed\Locale\Business\LocaleFacade $localeFacade
     */
    public function __construct($localeFacade)
    {
        $this->localeFacade = $localeFacade;
    }

    /**
     * @return array
     */
    public function getAvailableLocales()
    {
        return $this->localeFacade->getAvailableLocales();
    }

    /**
     * @param string $localeName
     *
     * @return bool
     */
    public function hasLocale($localeName)
    {
        return $this->localeFacade->hasLocale($localeName);
    }

    /**
     * @param string $localeName
     *
     * @return LocaleTransfer
     */
    public function getLocale($localeName)
    {
        return $this->localeFacade->getLocale($localeName);
    }

    /**
     * @return LocaleTransfer
     */
    public function getCurrentLocale()
    {
        return $this->localeFacade->getCurrentLocale();
    }
}
