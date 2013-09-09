<?php

use ZendPdf\Color\Html;
use ZendPdf\Image;
use ZendPdf\Page;

class Sao_Zed_Pdf_Component_Model_Document_KagingSlip extends Sao_Zed_Pdf_Component_Model_Document_Base implements
    Sao_Zed_Pdf_Component_Interface_KagingSlipTranslationKeys,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;

    /**
     * page margin
     */
    const PAGE_MARGIN = 1;
    const PAGE_MARGIN_TOP = 1;
    /**
     * default font size
     */
    const DEFAULT_FONT_SIZE = 9;

    /**
     * path to the logo image
     */
    const LOGO_IMAGE_PATH = '/../Data/logo.png';
    /**
     * @var ProjectA_Zed_Sales_Persistence_PacSalesOrder
     */
    protected $entityOrder = null;
    protected $collectionOrderItems = null;

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $entitySalesOrder
     * @param PropelCollection $items
     */
    public function __construct(ProjectA_Zed_Sales_Persistence_PacSalesOrder $entitySalesOrder, PropelCollection $items = null)
    {
        $this->entityOrder = $entitySalesOrder;
        $this->collectionOrderItems = ($items) ? $items : $entitySalesOrder->getItems();

        parent::__construct();
    }

    protected function createLayout()
    {
        $pageStripe = $this->pdfDocument->createPageStripeFromSize(self::PAGE_FORMAT);
        $pageStripe->setMarginLeft(self::PAGE_MARGIN, true);
        $pageStripe->setMarginRight(self::PAGE_MARGIN, true);

        $pageStripe->setHeader($this->getHeader());
        $pageStripe->addObject($this->getBody());
        $pageStripe->setFooter($this->getFooter());
    }

    /**
     * @return ProjectA_Zed_Library_Pdf_Object_Empty
     */
    protected function getHeader()
    {
        $header = $this->getEmptyPdfObject();
        $header->setMarginTop(static::PAGE_MARGIN_TOP, true);

        $header->addObject($this->getEmptyPdfObject());
        $header->addObject($this->getLogo());
        $header->addObject($this->getOrderNumberForHeader());
        $header->addObject($this->getEmptyPdfObject());

        return $header;
    }

    /**
     * @return ProjectA_Zed_Library_Pdf_Object_Image
     */
    protected function getLogo()
    {
        $logoImage = Image::imageWithPath(realpath(__DIR__ . static::LOGO_IMAGE_PATH));

        $logo = new ProjectA_Zed_Library_Pdf_Object_Image($logoImage);
        $logo->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_LEFT);
        $logo->setContentWidth($logoImage->getPixelWidth() * 72 / 300);
        $logo->setMarginLeft(0);
        $logo->setMarginTop(0);

        $pdfObject = $this->getEmptyPdfObject();
        $pdfObject->addObject($logo);

        return $pdfObject;
    }

    protected function getOrderNumberForHeader()
    {
        $prefix = $this->_t(self::ORDER_NUMBER_HEADER);
        $orderId = $this->entityOrder->getIncrementId();
        $string = $prefix . ' ' . $orderId;
        $text = $this->createTextObject($string);
        $text->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_RIGHT);
        $text->setFontSize(10);
        $text->setMarginBottom(0.5, true);
        $text->setMarginTop(-0.5, true);

        return $text;
    }

    protected function getOrderNumberForReturnSlip()
    {
        $string = $this->entityOrder->getIncrementId();
        $text = $this->createTextObject($string);
        $text->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_LEFT);
        $text->setFontSize(7);
        $text->setMarginTop(-3.1, true);
        $text->setMarginLeft(3.9, true);

        return $text;
    }

    protected function getBody()
    {
        $pageTable = new ProjectA_Zed_Library_Pdf_Object_Table();
        $leftColumn = new ProjectA_Zed_Library_Pdf_Object_Table_Column();
        $leftColumn->setWidth(13, true);
        $rightColumn = new ProjectA_Zed_Library_Pdf_Object_Table_Column();
        $rightColumn->setWidth(6.5, true);

        $pageTable->addColumn($leftColumn);
        $pageTable->addColumn($rightColumn);

        $leftColumnContent = $this->getEmptyPdfObject();
        $leftColumnContent->addObject($this->getAddressTable());
        $leftColumnContent->addObject($this->getItemTable());
        $leftColumnContent->addObject($this->getReturnSlip());

        $rightColumnContent = $this->getEmptyPdfObject();
        $rightColumnContent->addObject($this->getReturnPolicyRectangle());
        $rightColumnContent->addObject($this->getReturnPolicyText());

        $contentRow = new ProjectA_Zed_Library_Pdf_Object_Table_Row();
        $contentRow->addDataCell($leftColumnContent);
        $contentRow->addDataCell($rightColumnContent);

        $pageTable->addRow($contentRow);

        return $pageTable;
    }

    /**
     * @return ProjectA_Zed_Library_Pdf_Object_Table
     */
    protected function getAddressTable()
    {
        $orderTable = new ProjectA_Zed_Library_Pdf_Object_Table();
        $orderTable->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_LEFT);

        $orderTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_MAXIMUM));
        $orderTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_MAXIMUM));

        $orderTable->addRow($this->getAddressTableHeaderRow());
        $orderTable->addRow($this->getAddressTableContentRow());

        return $orderTable;
    }

    protected function getAddressTableHeaderRow()
    {
        $headerRowCells = array(
            array(
                'text'    => $this->_t(self::ADDRESS_HEADER_SHIPPING),
                'leading' => 1.3,
            ),
            array(
                'text'    => $this->_t(self::ADDRESS_HEADER_BILLING),
                'leading' => 1.3,
            )
        );

        $headerRow = $this->getTableRow($headerRowCells);

        return $headerRow;
    }

    protected function getAddressTableContentRow()
    {
        $contentRow = new ProjectA_Zed_Library_Pdf_Object_Table_Row();

        $contentRow->addDataCell($this->getAddress($this->entityOrder->getShippingAddress()));
        $contentRow->addDataCell($this->getAddress($this->entityOrder->getBillingAddress()));


        return $contentRow;
    }

    protected function getAddress(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $orderAddress)
    {
        $container = $this->getEmptyPdfObject();

        $container->addObject($this->createTextObject($orderAddress->getFirstName() . ' ' . $orderAddress->getLastName()));
        $container->addObject($this->createTextObject($orderAddress->getAddress1()));
        if ($orderAddress->getAddress2()) {
            $container->addObject($this->createTextObject($orderAddress->getAddress2()));
        }
        if ($orderAddress->getZipCode()) {
            $container->addObject($this->createTextObject($orderAddress->getCity() . ', ' . $orderAddress->getZipCode()));
        } else {
            $container->addObject($this->createTextObject($orderAddress->getCity()));
        }

        if ($orderAddress->getSaoAddress() && $orderAddress->getSaoAddress()->getFkMiscRegion()) {
            $container->addObject($this->createTextObject($orderAddress->getSaoAddress()->getRegion()->getName()));
        }

        $container->addObject($this->createTextObject($orderAddress->getCountry()->getName()));

        return $container;
    }

    /**
     * @return ProjectA_Zed_Library_Pdf_Object_Table
     */
    protected function getItemTable()
    {
        $orderTable = new ProjectA_Zed_Library_Pdf_Object_Table();
        $orderTable->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_NONE);
        $orderTable->setMarginTop(1, true);

        $orderTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_AUTOMATIC));
        $orderTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_MAXIMUM));
        $orderTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_AUTOMATIC));
        $orderTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_AUTOMATIC));

        $orderTable->addRow($this->getItemTableHeaderRow());

        $itemRows = $this->getItemTableRows();
        foreach ($itemRows as $itemRow) {
            $orderTable->addRow($itemRow);
        }
//
//        $emptyRow = $this->getEmptyRow(5);
//        $emptyRow->setBorderTop(1);
//        $orderTable->addRow($emptyRow);

        return $orderTable;
    }

    /**
     * @return ProjectA_Zed_Library_Pdf_Object_Table_Row
     */
    protected function getItemTableHeaderRow()
    {
        $headerRowCells = array(
            array(
                'text'         => $this->_t(self::ITEM_TABLE_HEADER_IMAGE),
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD,
                'fontSize'     => 9,
                'contentWidth' => 25,
                'marginLeft'   => 5,
                'marginRight'  => 5,
                'marginBottom' => 2,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER
            ),
            array(
                'text'        => $this->_t(self::ITEM_TABLE_HEADER_DESCRIPTION),
                'fontStyle'   => ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD,
                'fontSize'    => 9,
                'marginLeft'  => 5,
                'marginRight' => 5,
                'marginBottom' => 2,
                'textAlign'   => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER
            ),
            array(
                'text'         => $this->_t(self::ITEM_TABLE_HEADER_QUANTITY),
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD,
                'fontSize'     => 9,
                'contentWidth' => 30,
                'marginLeft'   => 5,
                'marginRight'  => 5,
                'marginBottom' => 2,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER
            ),
            array(
                'text'         => $this->_t(self::ITEM_TABLE_HEADER_SKU),
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD,
                'fontSize'     => 9,
                'contentWidth' => 75,
                'marginLeft'   => 5,
                'marginRight'  => 5,
                'marginBottom' => 2,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER
            ),
        );

        $headerRow = $this->getTableRow($headerRowCells);
        $headerRow->setBorderBottom(1);

        return $headerRow;
    }

    /**
     * @return array
     */
    protected function getItemTableRows()
    {
        $itemRows = array();

        $items = $this->collectionOrderItems;
        $groupedItems = $this->groupItemsByUniqueKey($items);

        foreach ($groupedItems as $sku => $orderItems) {
            /* @var ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem */
            $orderItem = reset($orderItems);
            $quantity = count($orderItems);
            $product = $this->facadeCatalog->getProductBySku($orderItem->getSku());
            $productModel = $this->facadeCatalog->getProduct($product);

            $sku = $this->formatSku($sku);

            $frame = '';
            foreach ($orderItem->getOptions() as $option) {
                $option = $this->facadeCatalog->getProductOptionByIdentifier($option->getIdentifier());
                if ($option->getOptionType()->getName() === ProjectA_Shared_Library_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_FRAME) {
                    $frame = ' (framed)';
                    break;
                }
            }

            $rowCells = array(
                array(
                    'object' => $this->getImageObjectFromUrl($productModel[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ART_TINY_CROP]),
                ),
                array(
                    'text'      => $productModel[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_NAME] . "\n" .
                        $productModel[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRODUCT_NAME] . $frame,
                    'margin'    => 5,
                    'leading'   => 1.3,
                    'textAlign' => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_LEFT
                ),
                array(
                    'text'      => $quantity,
                    'margin'    => 5,
                    'textAlign' => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER

                ),
                array(
                    'text'      => $sku,
                    'margin'    => 5,
                    'textAlign' => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER

                ),
            );

            $itemRows[] = $this->getTableRow($rowCells);
        }

        return $itemRows;
    }

    /**
     * @param Traversable $orderItems
     * @return array
     */
    public function groupItemsByUniqueKey(Traversable $orderItems)
    {
        $groupedItems = array();
        /* @var $orderItem ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        foreach ($orderItems as $orderItem) {
            $uniqueKey = $this->facadeSales->getFacadeItem()->generateUniqueIdentifierForItem($orderItem);
            $groupedItems[$uniqueKey][] = $orderItem;
        }

        return $groupedItems;
    }

    /**
     * @param string $sku
     * @return string
     */
    protected function formatSku($sku)
    {
        $skuModel = new Sao_Shared_Library_Legacy_Sku($sku);
        return str_replace('-A', "-\nA", $skuModel->getSimpleSku());
    }

    /**
     * @param string $url
     * @return ProjectA_Zed_Library_Pdf_Object_Image
     */
    protected function getImageObjectFromUrl($url)
    {
        if (strpos($url, 'http') === false) {
            $url = 'http:' . $url;
        }

        $path = ProjectA_Shared_Library_Data::getLocalCommonPath('tempForPdf');
        $fileName = rand(0, 89999999999) . '.jpg';

        $imageContent = file_get_contents($url);
        file_put_contents($path . $fileName, $imageContent);

        $image = Image::imageWithPath($path . $fileName);
        $imageObject = new ProjectA_Zed_Library_Pdf_Object_Image($image);
        $imageObject->setMargin(5);
        $imageObject->setContentWidth(25);
        $imageObject->setContentHeight(25);

        return $imageObject;
    }

    protected function getReturnSlip()
    {
        $empty = $this->getEmptyPdfObject();
        $empty->setContentHeight(255);
        $empty->setMarginTop(0.5, true);
        $label = $this->createTextObject($this->_t(self::RETURN_SLIP));
        $label->setMarginBottom(5);
        $empty->addObject($label);

        $parent = new ProjectA_Zed_Library_Pdf_Object_Rectangle();
        $parent->setFillType(Page::SHAPE_DRAW_STROKE);
        $parent->setLineDashingPattern([2, 2]);
        $parent->setLineWidth(2);
        $parent->setContentWidth(318);
        $parent->setContentHeight(235);
        $parent->setLineColor(Html::color('#CCCCCC'));

        $label = $this->createTextObject($this->_t(self::RETURN_REASON));
        $label->setMarginBottom(5);
        $label->setMarginTop(14);
        $label->setMarginLeft(14);
        $parent->addObject($label);

        $reasonTable = new ProjectA_Zed_Library_Pdf_Object_Table();
        $reasonTable->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_NONE);
        $reasonTable->setContentWidth(290);
        $reasonTable->setMarginLeft(14);

        $reasonTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_AUTOMATIC));
        $reasonTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_AUTOMATIC));
        $reasonTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_MAXIMUM));

        $reasonTable->addRow($this->getReturnSlipHeaderRow());

        $codes = [
            'A' => 'Received the wrong item',
            'B' => 'Item does not match the description',
            'C' => 'Item arrived damaged/defective',
            'D' => 'Poor Quality',
            'E' => 'Item arrived too late',
            'F' => 'Changed my mind',
        ];

        foreach ($codes as $code => $reason) {
            $reasonTable->addRow($this->getReturnSlipRow($code, $reason, !(bool)(ord($code)%2)));
        }

        $parent->addObject($reasonTable);

        $label = $this->createTextObject($this->_t(self::CONTACT_INFORMATION));
        $label->setMarginBottom(5);
        $label->setMarginTop(14);
        $label->setMarginLeft(14);
        $parent->addObject($label);

        $orderTable = new ProjectA_Zed_Library_Pdf_Object_Table();
        $orderTable->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_NONE);
        $orderTable->setContentWidth(290);
        $orderTable->setMarginLeft(14);

        $orderTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_AUTOMATIC));
        $orderTable->addColumn(new ProjectA_Zed_Library_Pdf_Object_Table_Column(ProjectA_Zed_Library_Pdf_Object_Table_Column::WIDTH_MAXIMUM));

        $codes = [
            'Order #' => $this->entityOrder->getIncrementId(),
            'Full Name' => $this->entityOrder->getFirstName() . ' ' . $this->entityOrder->getLastName(),
            'Phone Number' => '',
            'Email Address' => ''
        ];

        foreach ($codes as $code => $reason) {
            $orderTable->addRow($this->getReturnSlipContactRow($code, $reason));
        }

        $parent->addObject($orderTable);
        $empty->addObject($parent);

        return $empty;
    }

    /**
     * @return ProjectA_Zed_Library_Pdf_Object_Table_Row
     */
    protected function getReturnSlipHeaderRow()
    {
        $headerRowCells = array(
            array(
                'text'         => $this->_t(self::RETURN_SLIP_TABLE_HEADER_SELECTONE),
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD,
                'fontSize'     => 8,
                'contentWidth' => 60,
                'marginBottom' => 3,
                'marginTop'    => 3,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER,
                'cellOptions'  => [
                    'borderRight' => 1
                ]
            ),
            array(
                'text'         => $this->_t(self::RETURN_SLIP_TABLE_HEADER_CODES),
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD,
                'fontSize'     => 8,
                'contentWidth' => 45,
                'marginBottom' => 3,
                'marginTop'    => 3,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER,
                'cellOptions'  => [
                    'borderRight' => 1
                ]
            ),
            array(
                'text'         => $this->_t(self::RETURN_SLIP_TABLE_HEADER_REASON),
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD,
                'fontSize'     => 8,
                'marginLeft'   => 5,
                'marginBottom' => 3,
                'marginTop'    => 3,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER
            ),
        );

        $headerRow = $this->getTableRow($headerRowCells);
        $headerRow->setBorder(1);
        $headerRow->setBorderColor(Html::color('#EBEBEC'));
        $headerRow->setBackgroundColor(Html::color('#F9F9F9'));

        return $headerRow;
    }

    /**
     * @param $code
     * @param $reason
     * @return ProjectA_Zed_Library_Pdf_Object_Table_Row
     */
    protected function getReturnSlipRow($code, $reason, $odd = true)
    {
        $headerRowCells = array(
            array(
                'object' => new ProjectA_Zed_Library_Pdf_Object_Empty(),
                'cellOptions'  => [
                    'borderRight' => 1
                ]
            ),
            array(
                'text'         => $code,
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD,
                'fontSize'     => 10,
                'marginBottom' => 2,
                'marginTop'    => 2,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_CENTER,
                'cellOptions'  => [
                    'borderRight' => 1
                ]
            ),
            array(
                'text'         => $reason,
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_REGULAR,
                'fontSize'     => 8,
                'marginLeft'   => 5,
                'marginBottom' => 3,
                'marginTop'    => 3,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_LEFT
            ),
        );

        $headerRow = $this->getTableRow($headerRowCells);
        $headerRow->setBorder(1);
        $headerRow->setBorderColor(Html::color('#EBEBEC'));
        $headerRow->setBackgroundColor(Html::color($odd? '#F9F9F9':'#FFFFFF'));

        return $headerRow;
    }

    /**
     * @param $code
     * @param $reason
     * @return ProjectA_Zed_Library_Pdf_Object_Table_Row
     */
    protected function getReturnSlipContactRow($label, $value)
    {
        $headerRowCells = array(
            array(
                'text'         => $label,
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD,
                'fontSize'     => 8,
                'contentWidth' => 100,
                'marginLeft'   => 5,
                'marginBottom' => 4,
                'marginTop'    => 4,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_LEFT,
                'cellOptions'  => [
                    'borderRight' => 1
                ]
            ),
            array(
                'text'         => $value,
                'fontStyle'    => ProjectA_Zed_Library_Pdf_Font::STYLE_REGULAR,
                'fontSize'     => 8,
                'marginLeft'   => 5,
                'marginBottom' => 4,
                'marginTop'    => 4,
                'textAlign'    => ProjectA_Zed_Library_Pdf_Object_Text::TEXT_ALIGN_LEFT
            ),
        );

        $headerRow = $this->getTableRow($headerRowCells);
        $headerRow->setBorder(1);
        $headerRow->setBorderColor(Html::color('#EBEBEC'));

        return $headerRow;
    }

    protected function getReturnPolicyRectangle()
    {
        $obj = new ProjectA_Zed_Library_Pdf_Object_Rectangle();
        $obj->setContentHeight(17.5, true);
        $obj->setContentWidth(6.2, true);
        $obj->setFillColor('#f9f9f9');
        $obj->setMarginLeft(0.5, true);
        $obj->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_NONE);
        $obj->setFillType(Page::SHAPE_DRAW_FILL);

        return $obj;
    }

    protected function getReturnPolicyText()
    {
        $empty = $this->getEmptyPdfObject();
        $empty->setMarginTop(-17.2, true);
        $empty->setMarginLeft(0.7, true);
        $empty->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_NONE);
        $empty->setMaximumConsumedWidthByContent(5.8);

        $fontSize = 8;

        $textObj = $this->createTextObject($this->_t(self::RETURN_POLICY), 11);
        $textObj->setMarginTop(0.2, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::RETURN_POLICY_PARAGRAPH_1), $fontSize, 1.3);
        $textObj->setMarginTop(0.2, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::RETURN_POLICY_PARAGRAPH_2), $fontSize, 1.3);
        $textObj->setMarginTop(0.2, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::PRINT_INFO), 11);
        $textObj->setMarginTop(.5, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::PRINT_INFO_PARAGRAPH_1), $fontSize, 1.3);
        $textObj->setMarginTop(0.2, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::PRINT_INFO_PARAGRAPH_2), $fontSize, 1.3);
        $textObj->setMarginTop(0.2, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::PRINT_INFO_PARAGRAPH_3), $fontSize, 1.3);
        $textObj->setMarginTop(0.2, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::PRINT_INFO_PARAGRAPH_4), $fontSize, 1.3);
        $textObj->setMarginTop(0.2, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject('Saatchi Online', 9, 1.1);
        $textObj->setMarginLeft(0.5, true);
        $empty->addObject($textObj);
        $textObj = $this->createTextObject('Attn: Return Department', 9, 1.1);
        $textObj->setMarginLeft(0.5, true);
        $empty->addObject($textObj);
        $textObj = $this->createTextObject('604 Arizona', 9, 1.1);
        $textObj->setMarginLeft(0.5, true);
        $empty->addObject($textObj);
        $textObj = $this->createTextObject(' Santa Monica, CA 90401', 9, 1.1);
        $textObj->setMarginLeft(0.5, true);
        $textObj->setMarginBottom(0.2, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::PRINT_INFO_PARAGRAPH_5), $fontSize, 1.3);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::PRINT_INFO_PARAGRAPH_6), $fontSize, 1.3);
        $textObj->setMarginTop(0.2, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::QUESTIONS), 11);
        $textObj->setMarginTop(.5, true);
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::SUPPORT_MAIL_ADDRESS), $fontSize, 1.3);
        $textObj->setMarginTop(0.2, true);
        $textObj->setFontStyle('bold');
        $empty->addObject($textObj);

        $textObj = $this->createTextObject($this->_t(self::SUPPORT_PARAGRAPH_1), $fontSize, 1.3);
        $textObj->setMarginTop(0.2, true);
        $textObj->setFontStyle('bold');
        $empty->addObject($textObj);

        return $empty;
    }

    /**
     * @return ProjectA_Zed_Library_Pdf_Object_Empty
     */
    protected function getFooter()
    {
        $footer = new ProjectA_Zed_Library_Pdf_Object_Empty();
        $footer->setMarginBottom(static::PAGE_MARGIN, true);
        $footer->setAlignMode(ProjectA_Zed_Library_Pdf_Object::ALIGN_POSITION_ABSOLUTE);

        return $footer;
    }

    /**
     * @param $columnCount
     * @return ProjectA_Zed_Library_Pdf_Object_Table_Row
     */
    protected function getEmptyRow($columnCount)
    {
        $row = new ProjectA_Zed_Library_Pdf_Object_Table_Row();
        for ($i = 0; $i < $columnCount; $i++) {
            $row->addDataCell(new ProjectA_Zed_Library_Pdf_Object_Empty());
        }

        return $row;
    }

    /**
     * @param $text
     * @param int $fontSize
     * @param float $leading
     * @return ProjectA_Zed_Library_Pdf_Object_Text
     */
    protected function createTextObject($text, $fontSize = null, $leading = self::DEFAULT_LINE_LEADING)
    {
        $textObj = parent::createTextObject($text, $fontSize, $leading);
        $textObj->setFillColor('#666666');
        return $textObj;
    }

}
