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
    const TEMPLATE_INDEX = 'index';
    const TEMPLATE_INDEX_ALTERNATIVE = 'index_alt';
    const TEMPLATE_LANDING_PAGE = 'landing_page';

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
                'template' => self::TEMPLATE_INDEX,
                'name' => 'Home',
                'url' => '/',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Home'
                ],
                'blocks' => [
                    1 => [
                        "name" => "Slide",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<section id="teaser" class="slideshow borders"><ul>
                            <li><a href="/Master+Chair+Yellow-11.html"><img src="images/slide1.jpg" width="100%" alt="" /></a></li>
                            <li><a href="/Master+Chair+Yellow-11.html"><img src="images/slide2.jpg" width="100%" alt="" /></a></li>
                            <li><a href="/Master+Chair+Yellow-11.html"><img src="images/slide3.jpg" width="100%" alt="" /></a></li>
                        </ul></section>'
                    ],
                    2 => [
                        "name" => "text block",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<section class="content">Some introducing text you can delete for sure.</section>'
                    ],
                    3 => [
                        "name" => "most popular",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<section id="recommendations">
                        <h3>Most popular</h3>
            <ul>
                <li>
                    <a href="/a-table-black-vitra">
                        <img width="100%" src="images/lamp.png" alt="" />
                        <h4>WireShade Lamp Design<br>by Marc Trotereau</h4>
                    </a>
                </li>
                <li>
                    <a href="/bubble-club-sofa-black-kartell">
                        <img width="100%" src="images/couch.png" alt="" />
                        <h4>The big couch<br>by Benedizioni alla Mamma</h4>
                    </a>
                </li>
                <li>
                    <a href="/masters-chair-white-kartell">
                        <img width="100%" src="images/tisch.png" alt="" />
                        <h4>LUCY<br>by Johansen Design</h4>
                    </a>
                </li>
            </ul></section>'
                    ],
                    4 => [
                        "name" => "catalog test products",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<section id="testproducts">
            <h3>Test Products</h3>
            <ul>
                <li>
                    <a href="/vitra-chair">Config Product</a>
                </li>
                <li>
                    <a href="/example-single-product-1">Single Product 1</a>
                </li>
                <li>
                    <a href="/example-single-product-2">Single Product 2</a>
                </li>
                <li>
                    <a href="/example-splittable-bundle">Split Bundle</a>
                </li>
                <li>
                    <a href="/example-non-splittable-bundle">Non Split Bundle</a>
                </li>
            </ul>
        </section>'
                    ]
                ]
            ],
            [
                'layout' => self::LAYOUT_FULL,
                'template' => self::TEMPLATE_INDEX_ALTERNATIVE,
                'name' => 'Home Alternative',
                'url' => '/home',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Home Alternative'
                ],
                'blocks' => [
                    1 => [
                        "name" => "Slide",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<div id="teaser" class="slideshow borders"><ul>
                            <li><a href="/Master+Chair+Yellow-11.html"><img src="images/slide1.jpg" width="100%" alt="" /></a></li>
                            <li><a href="/Master+Chair+Yellow-11.html"><img src="images/slide2.jpg" width="100%" alt="" /></a></li>
                            <li><a href="/Master+Chair+Yellow-11.html"><img src="images/slide3.jpg" width="100%" alt="" /></a></li>
                        </ul></div>'
                    ],
                    2 => [
                        "name" => "text block",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<section class="content">Some introducing text you can delete for sure.</section>'
                    ],
                    3 => [
                        "name" => "most popular",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<section><h3>Most popular</h3></section>'
                    ],
                    4 => [
                        "name" => "product #1",
                        "type" => self::BLOCK_TYPE_PRODUCT,
                        "content" => '04M01BU'
                    ],
                    5 => [
                        "name" => "product #2",
                        "type" => self::BLOCK_TYPE_PRODUCT,
                        "content" => '04J01WA'
                    ],
                    6 => [
                        "name" => "product #3",
                        "type" => self::BLOCK_TYPE_PRODUCT,
                        "content" => '07SING-01'
                    ],
                    7 => [
                        "name" => "end most popular",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<div>'
                    ]
                ]
            ],
            [
                'layout' => self::LAYOUT_FULL,
                'template' => self::TEMPLATE_LANDING_PAGE,
                'name' => 'Awesome Landingpage',
                'url' => '/landingpage',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Awesome Landingpage'
                ],
                'blocks' => [
                    1 => [
                        "name" => "product #1",
                        "type" => self::BLOCK_TYPE_PRODUCT,
                        "content" => '07SING-01'
                    ],
                    2 => [
                        "name" => "totally awesome intro text",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<p>Ut consequat ribeye veniam ball tip ham hock nisi qui deserunt capicola labore. Strip steak id in esse hamburger ex occaecat, prosciutto deserunt non laborum. Pork loin et ground round nostrud veniam dolor enim ullamco aliqua officia spare ribs. Ut ut aliqua, labore sirloin minim sunt exercitation aliquip cupidatat occaecat meatloaf ball tip pig. Laboris cow landjaeger pork belly. Consequat sirloin sunt officia pork ground round velit sint chuck occaecat landjaeger elit laborum.</p><button class="continue">call to action</button>'
                    ],
                    3 => [
                        "name" => "and the rest",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<p>Id jowl in reprehenderit ullamco bresaola in magna proident meatloaf officia pork loin porchetta. Adipisicing jerky officia salami id aute meatball excepteur. Elit in turkey tempor strip steak id ham ex nulla sunt chicken. Aliquip eu ham hock sed id jerky flank excepteur frankfurter rump ex deserunt dolor ut commodo. Tenderloin eu et andouille, sed tongue sausage ball tip pork chop venison salami magna. Shank fugiat fatback, sirloin anim eiusmod filet mignon nulla short ribs ribeye meatball in ham.</p>
<p>Reprehenderit strip steak pork chop, beef ribs drumstick biltong shank cow deserunt officia sed pariatur beef kevin velit. Tri-tip dolore pork magna, boudin porchetta dolor pancetta aute rump flank leberkas beef ribs biltong sunt. Shankle hamburger t-bone, sed in pariatur eiusmod sirloin anim minim pastrami. Bacon laboris ullamco enim kevin, capicola ut kielbasa labore turducken sirloin id meatloaf velit cow. Ullamco ham hock capicola leberkas. Fatback quis ullamco sirloin hamburger tenderloin et.</p>
<p>Drumstick andouille fugiat, aliqua sunt swine cupidatat est pork loin porchetta irure fatback sirloin boudin. Pork belly irure dolore occaecat incididunt salami, drumstick anim proident laboris sunt venison officia commodo. Ad sirloin dolore capicola, hamburger sed pariatur chuck adipisicing. Pastrami consectetur pancetta fugiat. Nulla landjaeger est sausage ham ea. Rump turducken landjaeger esse ham, pig incididunt. Kevin pork loin ground round, short loin beef duis non esse voluptate.</p>
<p>Swine tongue non, cow dolore short loin reprehenderit in magna anim salami. Quis rump tempor short loin. Fugiat consectetur culpa, venison salami reprehenderit aliquip turducken adipisicing ball tip deserunt ham aute laborum sausage. Sausage biltong tempor turducken, bresaola ex meatloaf hamburger anim tail.</p>'
                    ]
                ]
            ],
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
            self::TEMPLATE_INDEX => [
                "partials" => [
                    ['text-only-content-width-12'],
                    ['text-only-content-width-12'],
                    ['text-only-content-width-12'],
                    ['text-only-content-width-12']
                ]
            ],
            self::TEMPLATE_INDEX_ALTERNATIVE => [
                "partials" => [
                    ['text-only-content-width-12'],
                    ['text-only-content-width-12'],
                    ['text-only-content-width-12'],
                    ['product-teaser-width-4', 'product-teaser-width-4', 'product-teaser-width-4'],
                    ['text-only-content-width-12']
                ]
            ],
            self::TEMPLATE_LANDING_PAGE => [
                "partials" => [
                    ['product-width-6', 'text-width-6'],
                    ['text-width-12']
                ]
            ],
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
            $position = 1;

            $template = $this->createTemplate($key);
            $this->templates[$key] = $template;

            foreach ($data['partials'] AS $row) {
                $column = 1;
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
            ->filterByRow($row)
            ->filterByColumn($column)
            ->filterByFkCmsTemplate($template->getIdCmsTemplate())
            ->filterByFkCmsPartial($partial->getIdCmsPartial())
            ->findOneOrCreate();
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