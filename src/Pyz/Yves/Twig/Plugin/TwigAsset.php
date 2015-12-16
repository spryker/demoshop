<?php

namespace Pyz\Yves\Twig\Plugin;

use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;
use Pyz\Yves\Twig\TwigFactory;
use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @method TwigFactory getFactory()
 */
class TwigAsset extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @param Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        $isDomainSecured = $this->isDomainSecured($application);
        $assetUrlBuilder = $this->getFactory()->createAssetUrlBuilder($isDomainSecured);
        $mediaUrlBuilder = $this->getFactory()->createMediaUrlBuilder($isDomainSecured);

        return [
            new \Twig_SimpleFunction('asset', function ($value) use ($assetUrlBuilder) {
                return $assetUrlBuilder->buildUrl($value);
            }),
            new \Twig_SimpleFunction('media', function ($value) use ($mediaUrlBuilder) {
                return $mediaUrlBuilder->buildUrl($value);
            }),
        ];
    }

    /**
     * @param Application $application
     *
     * @return RequestStack
     */
    private function getRequestStack(Application $application)
    {
        $requestStack = $application['request_stack'];

        return $requestStack;
    }

    /**
     * @param Application $application
     *
     * @return bool
     */
    private function isDomainSecured(Application $application)
    {
        $requestStack = $this->getRequestStack($application);

        return $requestStack->getCurrentRequest()->isSecure();
    }

}
