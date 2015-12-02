<?php

namespace Pyz\Yves\CmsBlock\Communication\Handler;

use Pyz\Yves\CmsBlock\Dependency\Plugin\BlockControllerInterface;
use Symfony\Component\HttpFoundation\Request;

class BlockHandler implements BlockHandlerInterface
{
    const BLOCKS = 'blocks';
    const ID_CATEGORY_NODE = 'id_category_node';
    const TEMPLATE_TYPE = 'template_type';
    const TEMPLATE = 'template';
    const VALUES = 'values';
    const NAME = 'name';
    const DYNAMIC_DATA = 'dynamicData';
    const CMS_VALUES = 'cmsValues';
    const ID_PRODUCT = 'id_product';

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
     */
    public function fetchBlocks(array $pageData, Request $request)
    {
        $blockData = [];
        $pageAttributes = $this->extractPageAttributes($pageData);

        if (!isset($pageData[self::BLOCKS])) {
            return $blockData;
        }

        foreach ($pageData[self::BLOCKS] as $block) {
            $templateType = $block[self::TEMPLATE_TYPE];

            $dynamicData = [];
            if (array_key_exists($templateType, $this->blockControllers)) {
                $blockController = $this->blockControllers[$templateType];
                $dynamicData = $blockController->blockAction($pageAttributes, $request);
            }

            $blockData[] = [
                self::TEMPLATE => $templateType,
                self::CMS_VALUES => $block[self::VALUES],
                self::DYNAMIC_DATA => $dynamicData,
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
            self::ID_CATEGORY_NODE => $pageData[self::ID_CATEGORY_NODE],
            self::ID_PRODUCT => $pageData[self::ID_PRODUCT],
        ];
    }

    /**
     * @param BlockControllerInterface $blockController
     */
    protected function addBlockController(BlockControllerInterface $blockController)
    {
        $this->blockControllers[$blockController->getTemplateType()] = $blockController;
    }
}

