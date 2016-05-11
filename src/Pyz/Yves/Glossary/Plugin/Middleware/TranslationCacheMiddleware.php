<?php

namespace Pyz\Yves\Glossary\Plugin\Middleware;

use Pyz\Shared\Glossary\GlossaryConstants;
use Spryker\Shared\Config\Config;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\Glossary\GlossaryClientInterface getClient()
 */
class TranslationCacheMiddleware extends AbstractPlugin
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    public function after(Request $request)
    {
        $this
            ->getClient()
            ->saveCache(
                $request->getLocale(),
                $request->getRequestUri(),
                Config::get(GlossaryConstants::GLOSSARY_CACHE_TTL_IN_SECONDS)
            );
    }

}
