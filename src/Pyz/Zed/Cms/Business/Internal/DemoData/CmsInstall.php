<?php

namespace Pyz\Zed\Cms\Business\Internal\DemoData;

use Generated\Shared\Transfer\CmsTemplateTransfer;
use Pyz\Zed\Cms\CmsConfig;
use Pyz\Zed\Cms\Dependency\Facade\CmsToLocaleInterface;
use SprykerFeature\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface;
use SprykerFeature\Zed\Cms\Business\Template\TemplateManagerInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

class CmsInstall extends AbstractInstaller
{
    /**
     * @var string
     */
    protected $template;

    /**
     * @var string
     */
    protected $templateName;

    /**
     * @var TemplateManagerInterface
     */
    protected $templateManager;

    /**
     * @param TemplateManagerInterface $templateManager
     * @param CmsConfig $config
     */
    public function __construct(
        TemplateManagerInterface $templateManager,
        CmsConfig $config
    ) {
        $this->templateManager = $templateManager;
        $this->template = $config->getDemoDataTemplate();
        $this->templateName = $config->getDemoDataTemplateName();
    }

    public function install()
    {
        $this->info('This will install a standard set of cms pages in the demo shop');
        $this->installCmsData();
    }

    public function installCmsData()
    {
        $this->getOrCreateTemplate();
    }

    /**
     * @return CmsTemplateTransfer
     */
    private function getOrCreateTemplate()
    {
        if ($this->templateManager->hasTemplatePath($this->template)) {
            return $this->templateManager->getTemplateByPath($this->template);
        }

        return $this->templateManager->createTemplate(
            $this->templateName,
            $this->template
        );
    }


}
