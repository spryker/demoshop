<?php

namespace Pyz\Zed\Cms\Communication\Form;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Cms\Persistence\SpyCmsTemplateQuery;
use Orm\Zed\Cms\Persistence\SpyCmsPageQuery;
use Pyz\Zed\CategoryCmsConnector\Persistence\CategoryCmsConnectorQueryContainer;
use Pyz\Zed\Product\Persistence\ProductQueryContainer;
use Pyz\Zed\Url\Business\UrlFacade;
use SprykerFeature\Zed\Cms\Communication\Form\CmsPageForm as SprykerCmsPageForm;
use SprykerFeature\Zed\Cms\Persistence\CmsQueryContainer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContext;

class CmsPageForm extends SprykerCmsPageForm
{
    const FK_CATEGORY_NODE = 'fk_category_node';
    const FK_ABSTRACT_PRODUCT = 'fk_abstract_product';

    /**
     * @var ProductQueryContainer
     */
    protected $productQueryContainer;

    /**
     * @var CategoryCmsConnectorQueryContainer
     */
    protected $categoryCmsQueryContainer;

    /**
     * @var LocaleTransfer
     */
    protected $locale;

    /**
     * @param SpyCmsTemplateQuery $templateQuery
     * @param SpyCmsPageQuery $pageUrlByIdQuery
     * @param UrlFacade $urlFacade
     * @param string $formType
     * @param int $idPage
     * @param ProductQueryContainer $productQueryContainer
     * @param CategoryCmsConnectorQueryContainer $categoryCmsQueryContainer
     * @param LocaleTransfer $locale
     */
    public function __construct(
        SpyCmsTemplateQuery $templateQuery,
        SpyCmsPageQuery $pageUrlByIdQuery,
        UrlFacade $urlFacade,
        $formType,
        $idPage,
        ProductQueryContainer $productQueryContainer,
        CategoryCmsConnectorQueryContainer $categoryCmsQueryContainer,
        LocaleTransfer $locale
    ) {
        parent::__construct(
            $templateQuery,
            $pageUrlByIdQuery,
            $urlFacade,
            $formType,
            $idPage
        );
        $this->productQueryContainer = $productQueryContainer;
        $this->categoryCmsQueryContainer = $categoryCmsQueryContainer;
        $this->locale = $locale;
    }

    /**
     * @return CmsPageForm
     */
    protected function buildFormFields()
    {
        $urlConstraints = $this->getConstraints()->getMandatoryConstraints();

        $urlConstraints[] = $this->getConstraints()->createConstraintCallback([
            'methods' => [
                function ($url, ExecutionContext $context) {
                    if ($this->urlFacade->hasUrl($url) && $this->pageUrl !== $url) {
                        $context->addViolation('Url is already used');
                    }
                },
            ],
        ]);

        return $this->addHidden(self::ID_CMS_PAGE)
            ->addHidden(CmsQueryContainer::ID_URL)
            ->addHidden(self::CURRENT_TEMPLATE)
            ->addChoice(self::FK_TEMPLATE, [
                'label' => 'Template',
                'choices' => $this->getTemplateList(),
            ])
            ->addText(self::URL, [
                'label' => 'URL',
                'constraints' => $urlConstraints,
            ])
            ->addCheckbox(self::IS_ACTIVE, [
                'label' => 'Active',
            ])
            ->addSelect2ComboBox(self::FK_CATEGORY_NODE, [
                'label' => 'Category',
                'choices' => $this->getCategories(),
            ])
            ->addSelect2ComboBox(self::FK_ABSTRACT_PRODUCT, [
                'label' => 'Product',
                'choices' => $this->getProducts(),
            ])
            ;
    }

    /**
     * @return array
     */
    protected function getTemplateList()
    {
        $templates = $this->templateQuery->find();

        $result = [];
        foreach ($templates->getData() as $template) {
            $result[$template->getIdCmsTemplate()] = $template->getTemplateName();
        }

        return $result;
    }

    /**
     * @return array
     */
    protected function populateFormFields()
    {
        if ($this->idPage !== null) {
            $pageUrlTemplate = $this->pageUrlByIdQuery->findOne();

            $this->pageUrl = $pageUrlTemplate->getUrl();

            return [
                self::ID_CMS_PAGE => $pageUrlTemplate->getIdCmsPage(),
                self::FK_TEMPLATE => $pageUrlTemplate->getFkTemplate(),
                self::FK_CATEGORY_NODE => $pageUrlTemplate->getFkCategoryNode(),
                self::FK_ABSTRACT_PRODUCT => $pageUrlTemplate->getFkAbstractProduct(),
                self::URL => $pageUrlTemplate->getUrl(),
                self::CURRENT_TEMPLATE => $pageUrlTemplate->getFkTemplate(),
                self::IS_ACTIVE => $pageUrlTemplate->getIsActive(),
                CmsQueryContainer::ID_URL => $pageUrlTemplate->getIdUrl(),
            ];
        }
    }

    /**
     * @return array
     */
    protected function getCategories()
    {
        $categoryEntityList = $this->categoryCmsQueryContainer
            ->queryCategoriesNotLinkedToPage($this->locale->getIdLocale(), $this->idPage)
            ->find()
        ;

        $categories = [];
        foreach ($categoryEntityList as $categoryEntity) {
            $categoryName = $categoryEntity
                ->getAttributes()
                ->getFirst()
                ->getName()
            ;
            foreach ($categoryEntity->getNodes() as $nodeEntity) {
                $categories[(int)$nodeEntity->getIdCategoryNode()] = $categoryName;
            }
        }

        return $categories;
    }

    /**
     * @return array
     */
    protected function getProducts()
    {
        $productEntityList = $this->productQueryContainer
            ->queryAbstractProductAttributesNotLinkedToPage($this->locale->getIdLocale(), $this->idPage)
            ->find()
        ;

        $products = [];
        foreach ($productEntityList as $productEntity) {
            $products[$productEntity->getFkAbstractProduct()] = $productEntity->getName();
        }

        return $products;
    }

}
