<?php
namespace Pyz\Zed\Cms\Communication\Plugin;

use Generated\Shared\Transfer\CmsTemplateTransfer;
use Generated\Shared\Transfer\PageKeyMappingTransfer;
use Generated\Shared\Transfer\PageTransfer;
use Generated\Shared\Transfer\UrlTransfer;
use SprykerEngine\Shared\Kernel\Store;
use Pyz\Zed\Cms\Communication\CmsDependencyContainer;
use Pyz\Zed\Cms\Dependency\Plugin\CmsInstallerPluginInterface;

/**
 * @method CmsDependencyContainer getDependencyContainer()
 */
class StaticPageInstallerPlugin extends AbstractCmsInstallerPlugin implements CmsInstallerPluginInterface
{
    protected $staticPageKeys = [
        'imprint',
        'privacy',
        'terms',
    ];

    public function installCmsData()
    {
        $cmsFacade = $this->getDependencyContainer()->getInstallerFacade();
        $glossaryFacade = $this->getDependencyContainer()->getGlossaryFacade();
        $urlFacade = $this->getDependencyContainer()->getUrlFacade();

        $basePath = __DIR__ . '/../../File';
        $locales = Store::getInstance()->getLocales();
        $translationData = [];
        foreach ($locales as $locale) {
            $localePath = $basePath . '/' . $locale;
            if (is_dir($localePath)) {
                foreach ($this->staticPageKeys as $pageKey) {
                    $file = $localePath . '/initial_' . $pageKey . '.html';
                    if (file_exists($file)) {
                        $translationKey = 'static.pages.' . $pageKey;
                        $fileContent = file_get_contents($file);

                        $templateTransfer = $cmsFacade->createTemplate('static full page', 'static_fullpage.twig')
                        $templateTransfer = $cmsFacade->saveTemplate($templateTransfer);


                        $pageTransfer = new PageTransfer();

                        $pageTransfer->setFkTemplate($templateTransfer->getIdCmsTemplate());
                        $pageTransfer->setIsActive(true);
                        $pageTransfer = $cmsFacade->savePage($pageTransfer);
                        $urlTransfer = new UrlTransfer();

                        $placeHolder = $cmsFacade->addPlaceholderText($pageTransfer, 'content', $fileContent);


                        $cmsFacade->createPageUrl();

                        $urlFacade->createUrl();


                        $urlFacade->saveUrl();

                        $cmsFacade->createPageUrl($pageTransfer, '/impressum');

                    }
                }
            }
        }
        return $translationData;


    }
}