<?php

namespace Pyz\Zed\CmsBlock\Business\Internal;

use Generated\Shared\Transfer\BlockLocalizedTransfer;
use Generated\Shared\Transfer\BlockTransfer;
use PavFeature\Zed\CmsBlock\Business\Writer\CmsBlockWriterInterface;
use Pyz\Zed\CmsBlock\Dependency\Facade\CmsBlockToLocaleInterface;
use Pyz\Zed\CmsBlock\Dependency\Facade\CmsBlockToTouchInterface;
use Pyz\Zed\CmsBlock\Dependency\Facade\CmsBlockToUrlInterface;
use SprykerFeature\Shared\Cms\CmsConfig;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

class CmsBlockInstaller extends AbstractInstaller
{
    const PAGE_URLS = 'page_urls';
    const NAME = 'name';
    const TEMPLATE_TYPE = 'template_type';
    const LOCALIZED_VALUES = 'localized_values';
    const LOCALE_NAME = 'locale_name';
    const VALUES = 'values';

    /**
     * @var CmsBlockToUrlInterface
     */
    protected $urlFacade;

    /**
     * @var CmsBlockToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var CmsBlockToTouchInterface
     */
    protected $touchFacade;

    /**
     * @var CmsBLockWriterInterface
     */
    protected $blockWriter;

    /**
     * @param CmsBlockToUrlInterface $urlFacade
     * @param CmsBlockToLocaleInterface $localeFacade
     * @param CmsBlockToTouchInterface $touchFacade
     * @param CmsBlockWriterInterface $blockWriter
     */
    public function __construct(
        CmsBlockToUrlInterface $urlFacade,
        CmsBlockToLocaleInterface $localeFacade,
        CmsBlockToTouchInterface $touchFacade,
        CmsBlockWriterInterface $blockWriter
    ) {
        $this->urlFacade = $urlFacade;
        $this->localeFacade = $localeFacade;
        $this->touchFacade = $touchFacade;
        $this->blockWriter = $blockWriter;
    }

    public function install()
    {
        $this->info('This will install a standard set of cms blocks.');
        $blockData = $this->getBlockData();
        foreach ($blockData as $block) {
            $this->installBlock($block);
        }
    }

    /**
     * @return array
     */
    protected function getBlockData()
    {
        return [
            [
                self::PAGE_URLS => [
                    '/impressum',
                ],
                self::NAME => 'test_block',
                self::TEMPLATE_TYPE => 'test',
                self::LOCALIZED_VALUES => [
                    [
                        self::LOCALE_NAME => 'de_DE',
                        self::VALUES => [
                            'test' => 'test'
                        ],
                    ]
                ]
            ]
        ];
    }

    /**
     * @param array $block
     */
    protected function installBlock(array $block)
    {
        $blockTransfer = $this->transformBlockTransfer($block);
        $this->blockWriter->createOrUpdateBlock($blockTransfer);
        $this->addLocalizedBlockTransfers($block[self::LOCALIZED_VALUES], $blockTransfer);
        $this->blockWriter->createOrUpdateLocalizedBlocks($blockTransfer);
        $this->linkBlockWithPages($blockTransfer, $block[self::PAGE_URLS]);
    }

    /**
     * @param array $block
     *
     * @return BlockTransfer
     */
    protected function transformBlockTransfer(array $block)
    {
        $blockTransfer = new BlockTransfer();
        $blockTransfer->setName($block[self::NAME]);
        $blockTransfer->setTemplateType($block[self::TEMPLATE_TYPE]);

        return $blockTransfer;
    }

    /**
     * @param array $localizedBlocks
     * @param BlockTransfer $blockTransfer
     */
    protected function addLocalizedBlockTransfers(array $localizedBlocks, BlockTransfer $blockTransfer)
    {
        foreach ($localizedBlocks as $localizedBlock) {
            $localizedBlockTransfer = new BlockLocalizedTransfer();

            $locale = $this->localeFacade->getLocale($localizedBlock[self::LOCALE_NAME]);
            $localizedBlockTransfer->setLocale($locale);
            $localizedBlockTransfer->setValues($localizedBlock[self::VALUES]);

            $blockTransfer->addLocalizedBlocks($localizedBlockTransfer);
        }
    }

    /**
     * @param BlockTransfer $blockTransfer
     * @param array $pageUrls
     */
    protected function linkBlockWithPages(BlockTransfer $blockTransfer, array $pageUrls)
    {
        foreach ($pageUrls as $pageUrl) {
            $urlTransfer = $this->urlFacade->getUrlByPath($pageUrl);
            // check if exists
            $this->blockWriter->linkPageWithBlock(
                $urlTransfer->getFkPage(),
                $blockTransfer->getIdCmsBlock()
            );
            $this->touchFacade->touchActive(CmsConfig::RESOURCE_TYPE_PAGE, $urlTransfer->getFkPage());
        }
    }
}
