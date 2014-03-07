<?php

namespace Pyz\Zed\Cms\Component\Model;

use Generated\Zed\Cms\Component\CmsFactory;
use ProjectA\Zed\Library\Dependency\DependencyFactoryInterface;
use ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;

/**
 * @property CmsFactory $factory
 */
class DemoShopInstall implements DependencyFactoryInterface
{
    use DependencyFactoryTrait;

    const TEMPLATE_TWOCOLUMNS_GLOSSARY_TEXT = '2 column template (glossary/text)';
    const TEMPLATE_FULLPAGE_GLOSSARY = 'fullpage template (glossary)';
    const ATTRIBUTE_TITLE = "title";

    const LAYOUT_FULL = 'full.twig';
    const LAYOUT_REDUCED = 'reduced.twig';

    const BLOCK_TYPE_PRODUCT = 'product';
    const BLOCK_TYPE_TEXT = 'text';
    const BLOCK_TYPE_GLOSSARY = 'glossary';

    protected $templates = [];
    protected $layouts = [];
    protected $attributes = [];
    protected $pages = [];
    protected $templatePartials = [];

    protected $pagesToCreate = array();

    function __construct()
    {
        $this->pagesToCreate = [
            [
                'layout' => self::LAYOUT_FULL,
                'template' => self::TEMPLATE_FULLPAGE_GLOSSARY,
                'name' => 'Terms of Service',
                'url' => '/agb',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Terms of Service'
                ],
                'blocks' => [
                    1 => [
                        "name" => "Terms of Service",
                        "type" => self::BLOCK_TYPE_GLOSSARY,
                        "content" => 'static.pages.tos'
                    ]
                ]
            ],
            [
                'layout' => self::LAYOUT_FULL,
                'template' => self::TEMPLATE_FULLPAGE_GLOSSARY,
                'name' => 'Contact',
                'url' => '/kontakt',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Contact'
                ],
                'blocks' => [
                    1 => [
                        "name" => "Contact",
                        "type" => self::BLOCK_TYPE_GLOSSARY,
                        "content" => 'static.pages.contact'
                    ]
                ]
            ],
            [
                'layout' => self::LAYOUT_FULL,
                'template' => self::TEMPLATE_FULLPAGE_GLOSSARY,
                'name' => 'Imprint',
                'url' => '/impressum',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Imprint'
                ],
                'blocks' => [
                    1 => [
                        "name" => "Imprint",
                        "type" => self::BLOCK_TYPE_GLOSSARY,
                        "content" => 'static.pages.imprint'
                    ]
                ]
            ],
            [
                'layout' => self::LAYOUT_FULL,
                'template' => self::TEMPLATE_FULLPAGE_GLOSSARY,
                'name' => 'Privacy',
                'url' => '/datenschutz',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Privacy'
                ],
                'blocks' => [
                    1 => [
                        "name" => "Privacy",
                        "type" => self::BLOCK_TYPE_GLOSSARY,
                        "content" => 'static.pages.privacy'
                    ]
                ]
            ],
            [
                'layout' => self::LAYOUT_FULL,
                'template' => self::TEMPLATE_FULLPAGE_GLOSSARY,
                'name' => 'Withdrawal',
                'url' => '/widerrufsrecht',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Withdrawal'
                ],
                'blocks' => [
                    1 => [
                        "name" => "Withdrawal",
                        "type" => self::BLOCK_TYPE_GLOSSARY,
                        "content" => 'static.pages.withdrawal'
                    ]
                ]
            ],
            [
                'layout' => self::LAYOUT_FULL,
                'template' => self::TEMPLATE_FULLPAGE_GLOSSARY,
                'name' => 'Returns',
                'url' => '/ruecksendungen',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Returns'
                ],
                'blocks' => [
                    1 => [
                        "name" => "Returns",
                        "type" => self::BLOCK_TYPE_GLOSSARY,
                        "content" => 'static.pages.returns'
                    ]
                ]
            ],
            [
                'layout' => self::LAYOUT_FULL,
                'template' => self::TEMPLATE_FULLPAGE_GLOSSARY,
                'name' => 'FAQ',
                'url' => '/faq',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'FAQ'
                ],
                'blocks' => [
                    1 => [
                        "name" => "FAQ",
                        "type" => self::BLOCK_TYPE_GLOSSARY,
                        "content" => 'static.pages.faq'
                    ]
                ]
            ]
        ];
    }

    public function install()
    {
        $this->getLayouts();
        $this->getAttributes();

        $this->createTemplatePartials();
        $this->createPages();
    }

    /**
     *
     */
    protected function getLayouts()
    {
        $query = \ProjectA_Zed_Cms_Persistence_PacCmsLayoutQuery::create();
        $collection = $query->find();

        /** @var $entity \ProjectA_Zed_Cms_Persistence_PacCmsLayout */
        foreach ($collection AS $entity) {
            $name = $entity->getName();
            $this->layouts[$name] = $entity;
        }
    }

    /**
     *
     */
    protected function getAttributes()
    {
        $query = \ProjectA_Zed_Cms_Persistence_PacCmsPageAttributeQuery::create();
        $collection = $query->find();

        /** @var $entity \ProjectA_Zed_Cms_Persistence_PacCmsLayout */
        foreach ($collection AS $entity) {
            $name = $entity->getName();
            $this->attributes[$name] = $entity;
        }
    }

    /**
     *
     */
    protected function createTemplatePartials()
    {
        $templates = [
            self::TEMPLATE_FULLPAGE_GLOSSARY => [
                "partials" => [
                    ['glossary-width-12']
                ]
            ],
            self::TEMPLATE_TWOCOLUMNS_GLOSSARY_TEXT => [
                "partials" => [
                    ['text-width-6', 'text-width-6']
                ]
            ]
        ];


        foreach ($templates AS $key => $data) {
            $rowCount = 1;
            $column = 1;
            $position = 1;

            $template = $this->createTemplate($key);
            $this->templates[$key] = $template;

            foreach ($data['partials'] AS $row) {
                foreach ($row AS $partial) {
                    $partial = $this->getPartialByName($partial);
                    $this->templatePartials[$key][$position] = $this->createTemplatePartial(
                        $template,
                        $partial,
                        $rowCount,
                        $column,
                        $position
                    );
                    ++$column;
                    ++$position;
                }
                ++$rowCount;
            }
        }
    }

    /**
     * @param $name
     * @param string $type
     * @return \ProjectA_Zed_Cms_Persistence_PacCmsTemplate
     */
    protected function createTemplate(
        $name,
        $type = \ProjectA_Zed_Cms_Persistence_PacCmsTemplatePeer::TEMPLATE_TYPE_ROW
    ) {
        $query = \ProjectA_Zed_Cms_Persistence_PacCmsTemplateQuery::create();
        $entity = $query->filterByName($name)->findOneOrCreate();
        $entity->setIsDeleted(false);
        $entity->setTemplateType($type);
        $entity->save();

        return $entity;
    }

    /**
     * @param $name
     * @return \ProjectA_Zed_Cms_Persistence_PacCmsPartial
     */
    protected function getPartialByName($name)
    {
        $query = \ProjectA_Zed_Cms_Persistence_PacCmsPartialQuery::create();
        $entity = $query->filterByName($name)->findOne();

        return $entity;
    }

    /**
     * @param \ProjectA_Zed_Cms_Persistence_PacCmsTemplate $template
     * @param \ProjectA_Zed_Cms_Persistence_PacCmsPartial $partial
     * @param $row
     * @param $column
     * @param $position
     * @return \ProjectA_Zed_Cms_Persistence_PacCmsTemplatePartial
     */
    protected function createTemplatePartial(
        \ProjectA_Zed_Cms_Persistence_PacCmsTemplate $template,
        \ProjectA_Zed_Cms_Persistence_PacCmsPartial $partial,
        $row,
        $column,
        $position
    ) {
        /** @var \ProjectA_Zed_Cms_Persistence_PacCmsTemplatePartialQuery $query */
        $query = \ProjectA_Zed_Cms_Persistence_PacCmsTemplatePartialQuery::create();
        /** @var \ProjectA_Zed_Cms_Persistence_PacCmsTemplatePartial $entity */
        $entity = $query
            ->filterByFkCmsTemplate($template->getIdCmsTemplate())
            ->filterByFkCmsPartial($partial->getIdCmsPartial())
            ->findOneOrCreate();
        $entity->setRow($row);
        $entity->setColumn($column);
        $entity->setPosition($position);
        $entity->save();

        return $entity;
    }

    /**
     *
     */
    protected function createPages()
    {

        foreach ($this->pagesToCreate AS $page) {
            $query = \ProjectA_Zed_Cms_Persistence_PacCmsPageQuery::create();
            $entity = $query->filterByName($page['name'])->findOneOrCreate();
            if ($entity->isNew()) {
                $entity->setPacCmsLayout($this->layouts[$page['layout']]);
                $entity->setPacCmsTemplate($this->templates[$page['template']]);
                $entity->setHash($page['hash']);
                $entity->setUrl($page['url']);
                $entity->setStatus(\ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS_ACTIVE);

                if (isset($page['attributes'])) {
                    foreach ($page['attributes'] AS $key => $value) {
                        $entity->addPacCmsPageAttributeValue($this->createAttributeValue($key, $value));
                    }
                }
                if (isset($page['blocks'])) {
                    foreach ($page['blocks'] AS $key => $value) {
                        $entity->addPacCmsPageBlock($this->createPageBlock($page, $key, $value));
                    }
                }
                $entity->save();
            }
        }


    }

    /**
     * @param $key
     * @param $value
     * @return \ProjectA_Zed_Cms_Persistence_PacCmsPageAttributeValue
     */
    protected function createAttributeValue($key, $value)
    {
        $entity = new \ProjectA_Zed_Cms_Persistence_PacCmsPageAttributeValue();
        $entity->setPacCmsPageAttribute($this->attributes[$key]);
        $entity->setValue($value);

        return $entity;
    }

    /**
     * @param array $page
     * @param $position
     * @param array $block
     * @return \ProjectA_Zed_Cms_Persistence_PacCmsPageBlock
     */
    protected function createPageBlock(array $page, $position, array $block)
    {
        $entity = new \ProjectA_Zed_Cms_Persistence_PacCmsPageBlock();

        $blockEntity = $this->createBlock($block);
        $entity->setPacCmsBlock($blockEntity);

        $partial = $this->templatePartials[$page['template']][$position];
        $entity->setPacCmsTemplatePartial($partial);

        return $entity;
    }

    /**
     * @param array $block
     * @return \ProjectA_Zed_Cms_Persistence_PacCmsBlock
     */
    protected function createBlock(array $block)
    {
        $entity = new \ProjectA_Zed_Cms_Persistence_PacCmsBlock();
        $entity->setTitle($block['name']);

        /** @var \ProjectA_Zed_Cms_Persistence_PacCmsBlockType $blockType */
        /** @var \ProjectA_Zed_Cms_Persistence_PacCmsBlockTypeQuery $query */
        $query = \ProjectA_Zed_Cms_Persistence_PacCmsBlockTypeQuery::create();
        $blockType = $query->filterByName($block['type'])->findOne();

        $entity->setPacCmsBlockType($blockType);

        $this->createBlockValue($entity, $block);

        $entity->save();

        return $entity;
    }

    /**
     * @param \ProjectA_Zed_Cms_Persistence_PacCmsBlock $entity
     * @param array $block
     */
    protected function createBlockValue(\ProjectA_Zed_Cms_Persistence_PacCmsBlock $entity, array $block)
    {
        switch ($block['type']) {
            case self::BLOCK_TYPE_GLOSSARY:
                $valueEntity = new \ProjectA_Zed_Cms_Persistence_PacCmsBlockGlossary();
                $query = \ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery::create();
                $glossaryEntry = $query->findOneByName($block['content']);
                $valueEntity->setPacGlossaryKey($glossaryEntry);
                $entity->addPacCmsBlockGlossary($valueEntity);
                break;
            case self::BLOCK_TYPE_TEXT:
                $valueEntity = new \ProjectA_Zed_Cms_Persistence_PacCmsBlockText();
                $valueEntity->setContent($block['content']);
                $entity->addPacCmsBlockText($valueEntity);
                break;
            case self::BLOCK_TYPE_PRODUCT:
                $valueEntity = new \ProjectA_Zed_Cms_Persistence_PacCmsBlockProduct();
                $query = \ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery::create();
                $product = $query->findOneBySku($block['content']);
                $valueEntity->setPacCatalogProduct($product);
                $entity->addPacCmsBlockProduct($valueEntity);
                break;
        }
    }
}
