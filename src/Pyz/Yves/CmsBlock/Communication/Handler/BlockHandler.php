<?php

namespace Pyz\Yves\CmsBlock\Communication\Handler;

use Pyz\Yves\CmsBlock\Dependency\Plugin\BlockControllerInterface;
use Pyz\Yves\CmsBlock\Communication\Exception\BlockDataProviderMissingException;
use Symfony\Component\HttpFoundation\Request;

class BlockHandler implements BlockHandlerInterface
{
    const BLOCKS = 'blocks';
    const ID_CATEGORY_NODE = 'id_category_node';
    const TEMPLATE = 'template';
    const VALUES = 'values';
    const NAME = 'name';
    const TEMPLATE_NAME = 'templateName';
    const DYNAMIC_DATA = 'dynamicData';
    const CMS_VALUES = 'cmsValues';

    /**
     * @var BlockControllerInterface[]
     */
    protected $blockControllers = [];

    /**
     * @param array $blockControllers
     */
    public function __construct(array $blockControllers)
    {
        foreach ($blockControllers as $blockController) {
            $this->addBlockController($blockController);
        }
    }

    /**
     * @param array $pageData
     * @param Request $request
     *
     * @return array
     * @throws BlockDataProviderMissingException
     */
    public function fetchBlocks(array $pageData, Request $request)
    {
        $blockData = [];
        $pageAttributes = $this->extractPageAttributes($pageData);

        if (!isset($pageData[self::BLOCKS])) {
            return $blockData;
        }

        foreach ($pageData[self::BLOCKS] as $block) {
            $blockName = $block[self::NAME];

            if (!array_key_exists($blockName, $this->blockControllers)) {
                throw new BlockDataProviderMissingException();
            }

            $blockController = $this->blockControllers[$blockName];
            $blockData[] = [
                self::TEMPLATE => $block[self::TEMPLATE_NAME],
                self::CMS_VALUES => $block[self::VALUES],
                self::DYNAMIC_DATA => $blockController->blockAction($pageAttributes, $request)
            ];
        }

        return $blockData;
    }

    /**
     * @param array $pageData
     *
     * @return array
     */
    protected function extractPageAttributes(array $pageData)
    {
        return [
            self::ID_CATEGORY_NODE => $pageData[self::ID_CATEGORY_NODE]
        ];
    }

    /**
     * @param BlockControllerInterface $blockController
     */
    protected function addBlockController(BlockControllerInterface $blockController)
    {
        $this->blockControllers[$blockController->getBlockName()] = $blockController;
    }
}

