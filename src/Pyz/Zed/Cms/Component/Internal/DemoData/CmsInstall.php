<?php

namespace Pyz\Zed\Cms\Component\Internal\DemoData;

use Generated\Zed\Cms\Component\CmsFactory;
use ProjectA\Zed\Console\Component\Model\Console;
use ProjectA\Zed\Cms\Component\Internal\DemoData\CmsInstall AS CoreCmsInstall;

/**
 * @property CmsFactory $factory
 */
class CmsInstall extends CoreCmsInstall
{
    const TEMPLATE_INDEX = 'index';
    const TEMPLATE_INDEX_ALTERNATIVE = 'index_alt';
    const TEMPLATE_LANDING_PAGE = 'landing_page';

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
                    ],
                    5 => [
                        "name" => "cms test",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<section id="testcms">
            <h3>CMS Test</h3>
            <p>if you can read this, the cms is delivering your homepage. also check all links in the right most column in the footer and the following links</p>
            <ul>
                <li>
                    <a href="/landingpage">very basic landing page example</a>
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
                'name' => 'Landingpage example',
                'url' => '/landingpage',
                'hash' => md5(sha1(uniqid(mt_rand()))),
                'attributes' => [
                    self::ATTRIBUTE_TITLE => 'Landingpage example'
                ],
                'blocks' => [
                    1 => [
                        "name" => "product #1",
                        "type" => self::BLOCK_TYPE_PRODUCT,
                        "content" => '07SING-01'
                    ],
                    2 => [
                        "name" => "intro text",
                        "type" => self::BLOCK_TYPE_TEXT,
                        "content" => '<p>Ut consequat ribeye veniam ball tip ham hock nisi qui deserunt capicola labore. Strip steak id in esse hamburger ex occaecat, prosciutto deserunt non laborum. Pork loin et ground round nostrud veniam dolor enim ullamco aliqua officia spare ribs. Ut ut aliqua, labore sirloin minim sunt exercitation aliquip cupidatat occaecat meatloaf ball tip pig. Laboris cow landjaeger pork belly. Consequat sirloin sunt officia pork ground round velit sint chuck occaecat landjaeger elit laborum.</p><button class="continue">call to action</button>'
                    ],
                    3 => [
                        "name" => "further details",
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
}
