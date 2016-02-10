<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Pyz\Zed\Category\Business\CategoryFacade;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatReaderInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

/*
<Category ID="127" LowPic="http://images.icecat.biz/img/low_pic/127-563.jpg" Score="8643" Searchable="0" ThumbPic="http://images.icecat.biz/thumbs/CAT127.jpg" UNCATID="43171520" Visible="0">
    <Description ID="548838" Value="Device or stand where you can rest your mobile or fixed telephone." langid="1"/>
    <Description ID="587504" Value="Urządzenie lub stojak na telefon komórkowy bądź stacjonarny." langid="14"/>
    ...
    <Keywords ID="3274" Value="" langid="1"/>
    <Keywords ID="7655" Value="" langid="14"/>
    ...
    <Name ID="255" Value="telephone rests" langid="1"/>
    <Name ID="514218" Value="podstawki telefoniczne" langid="14"/>
    ...
    <ParentCategory ID="242">
        <Names>
            <Name ID="485" langid="1">networking</Name>
            <Name ID="514289" langid="14">sieci</Name>
            ...
        </Names>
    </ParentCategory>
</Category>
 */
class CategoryImporter extends AbstractIcecatImporter
{

    /**
     * @var string
     */
    protected $dataFilename = 'CategoriesList.xml';

    /**
     * @var CategoryFacade
     */
    protected $categoryFacade;

    /**
     * IcecatInstaller constructor.
     */
    public function __construct(IcecatReaderInterface $xmlReader, CategoryFacade $categoryFacade)
    {
        parent::__construct($xmlReader);
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @param LocaleTransfer $localeTransfer
     * @param int $icecatLangId
     *
     * @return void
     */
    public function import(LocaleTransfer $localeTransfer, $icecatLangId)
    {
        $result = [];
        $xml = $this->xmlReader->getXml($this->dataFilename);

        $rootNodeTransfer = $this->createRootNode($localeTransfer);

        $categoryCollection = $xml->xpath('//Category');
        foreach ($categoryCollection as $categoryNode) {
            $categoryTransfer = $this->getCategoryTransfer($categoryNode, $icecatLangId);

            $name = trim($categoryTransfer->requireName()->getName());
            if ($name === '') {
                throw new Exception('Category name not set for category with key: ' . $categoryTransfer->requireCategoryKey()->getCategoryKey());
            }
            dump($name);
            $categoryTransfer->requireCategoryKey();

            //$icecatIdParent = $this->getParentId($categoryNode);

            $idCategory = $this->categoryFacade->createCategory($categoryTransfer, $localeTransfer);
            $categoryTransfer->setIdCategory($idCategory);

            $categoryNodeTransfer = $this->getCategoryNodeTransfer($categoryTransfer, $rootNodeTransfer->getIdCategoryNode());
            $this->categoryFacade->createCategoryNode($categoryNodeTransfer, $localeTransfer);
        }

        print_r($result);
    }

    /**
     * @param LocaleTransfer $localeTransfer
     *
     * @return NodeTransfer
     */
    protected function createRootNode(LocaleTransfer $localeTransfer)
    {
        $name = 'root_' . $localeTransfer->getLocaleName();

        $rootCategoryTransfer = new CategoryTransfer();
        $rootCategoryTransfer->fromArray([
            'name' => $name,
            'category_key' => $name,
            'is_active' => true,
            'is_in_menu' => true,
            'is_clickable' => true,
            'metaTitle' => '',
            'metaDescription' => '',
            'metaKeywords' => '',
            'categoryImageName' => '',
            'url' => '/' . $localeTransfer->getLocaleName() . '/',
        ]);

        $idCategory = $this->categoryFacade->createCategory($rootCategoryTransfer, $localeTransfer);
        $rootCategoryTransfer->setIdCategory($idCategory);

        $rootNodeTransfer = new NodeTransfer();
        $rootNodeTransfer->setIsRoot(true);
        $rootNodeTransfer->setFkCategory($idCategory);

        $idNode = $this->categoryFacade->createCategoryNode($rootNodeTransfer, $localeTransfer);
        $rootNodeTransfer->setIdCategoryNode($idNode);

        return $rootNodeTransfer;
    }

    /**
     * @param \SimpleXMLElement $categoryNode
     * @param int $icecatLangId
     *
     * @return CategoryTransfer
     */
    protected function getCategoryTransfer(\SimpleXMLElement $categoryNode, $icecatLangId)
    {
        $attributes = $categoryNode->attributes();
        $name = $this->getName($categoryNode, $icecatLangId);
        $description = $this->getDescription($categoryNode, $icecatLangId);

        $data = [
            'name' => $name,
            'category_key' => (string) $attributes->UNCATID,
            'is_active' => true,
            'is_in_menu' => true,
            'is_clickable' => true,
            'metaTitle' => $name,
            'metaDescription' => $description,
            'metaKeywords' => $description,
            'categoryImageName' => (string) $attributes->LowPic,
            //'url' => '/' . $attributes->UNCATID . '/',
        ];

        $categoryTransfer = new CategoryTransfer();
        $categoryTransfer->fromArray($data);

        return $categoryTransfer;
    }

    /**
     * @param CategoryTransfer $categoryTransfer
     * @param int $idFkParentCategoryNode
     *
     * @return NodeTransfer
     */
    protected function getCategoryNodeTransfer(CategoryTransfer $categoryTransfer, $idFkParentCategoryNode)
    {
        $categoryNodeTransfer = new NodeTransfer();
        $categoryNodeTransfer->fromArray([
            'is_root' => false,
            'is_main' => true,
            'fk_category' => $categoryTransfer->getIdCategory(),
            'fk_parent_category_node' => $idFkParentCategoryNode,
            'node_order' => 0,
        ]);

        return $categoryNodeTransfer;
    }

    /**
     * @param \SimpleXMLElement $categoryNode
     * @param int $icecatLangId
     *
     * @return string
     */
    protected function getDescription(\SimpleXMLElement $categoryNode, $icecatLangId)
    {
        return $this->getXmlAttributeValue(
            $categoryNode,
            sprintf('Description[@langid="%d"]', $icecatLangId)
        );
    }

    /**
     * @param \SimpleXMLElement $categoryNode
     * @param int $icecatLangId
     *
     * @return string
     */
    protected function getName(\SimpleXMLElement $categoryNode, $icecatLangId)
    {
        return $this->getXmlAttributeValue(
            $categoryNode,
            sprintf('Name[@langid="%d"]', $icecatLangId)
        );
    }

    /**
     * @param \SimpleXMLElement $categoryNode
     *
     * @return string
     */
    protected function getParentId(\SimpleXMLElement $categoryNode)
    {
        return $this->getXmlAttributeValue($categoryNode, 'ParentCategory', 'ID');
    }

}
