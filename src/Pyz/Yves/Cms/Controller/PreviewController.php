<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cms\Controller;

use Generated\Shared\Transfer\FlattenedLocaleCmsPageDataRequestTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Yves\Application\Controller\AbstractController;
use Pyz\Yves\Cms\Plugin\Provider\PreviewControllerProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method \Pyz\Yves\Cms\CmsFactory getFactory()
 * @method \Spryker\Client\Cms\CmsClientInterface getClient()
 */
class PreviewController extends AbstractController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        if (!$this->hasPermission()) {
            $this->addErrorMessage('cms.preview.access_denied');

            return [];
        }

        $idCmsPage = (int)$request->attributes->get(PreviewControllerProvider::PARAM_PAGE);
        $metaData = $this->getMetaData($idCmsPage);

        $this->assertTemplate($metaData['template']);
        $metaData['placeholders'] = $this->getFactory()
            ->getCmsTwigRendererPlugin()
            ->render($metaData['placeholders'], ['cmsContent' => $metaData]);

        return $this->renderView($metaData['template'], [
            'placeholders' => $metaData['placeholders'],
            'edit' => false,
            'page_title' => $metaData['meta_title'],
            'page_description' => $metaData['meta_description'],
            'page_keywords' => $metaData['meta_keywords'],
            'availablePreviewLanguages' => $this->getAvailablePreviewLanguages(
                $this->getCurrentPreviewPageUri($idCmsPage),
                $this->getFactory()->getStore()->getLocales(),
                $this->getLocale()),
        ]);
    }

    /**
     * @param string $template
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return void
     */
    protected function assertTemplate($template)
    {
        $loader = $this->getApplication()['twig']->getLoader();
        if (!$loader->exists($template)) {
            throw new NotFoundHttpException('The Cms Page template is not found');
        }
    }

    /**
     * @param int $idCmsPage
     *
     * @return array
     */
    protected function getMetaData($idCmsPage)
    {
        $localeCmsPageDataRequestTransfer = $this->getClient()->getFlattenedLocaleCmsPageData(
            (new FlattenedLocaleCmsPageDataRequestTransfer())
                ->setIdCmsPage($idCmsPage)
                ->setLocale((new LocaleTransfer())->setLocaleName($this->getLocale()))
        );

        return $localeCmsPageDataRequestTransfer->getFlattenedLocaleCmsPageData();
    }

    /**
     * @return bool
     */
    protected function hasPermission()
    {
        $customer = $this->getFactory()->getCustomerClient()->getCustomer();

        if ($customer === null || empty($customer->getFkUser())) {
            return false;
        }

        return true;
    }

    /**
     * @param int $idCmsPage
     *
     * @return string
     */
    protected function getCurrentPreviewPageUri($idCmsPage)
    {
        return $this->getApplication()->path(
            PreviewControllerProvider::ROUTE_PREVIEW,
            [PreviewControllerProvider::PARAM_PAGE => $idCmsPage]
        );
    }

    /**
     * @param string $currentPageUri
     * @param array $locals
     * @param string $currentLocaleName
     *
     * @return array
     */
    protected function getAvailablePreviewLanguages($currentPageUri, array $locals, $currentLocaleName)
    {
        $availablePreviewLanguages = [];
        foreach ($locals as $locale => $localeName) {
            $availablePreviewLanguages[] = [
                'uri' => $this->replaceLocale($currentPageUri, $locals, $locale),
                'locale' => $locale,
                'isCurrentLocale' => $currentLocaleName === $localeName,
            ];
        }

        return $availablePreviewLanguages;
    }

    /**
     * @param string $uri
     * @param array $locals
     * @param string $targetLocale
     *
     * @return string
     */
    protected function replaceLocale($uri, array $locals, $targetLocale)
    {
        $localMatchRegExp = implode('|', array_keys($locals));

        return preg_replace("#^/($localMatchRegExp)/#", "/$targetLocale/", $uri);
    }

}
