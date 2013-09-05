<?php

use ZendPdf\Page;

abstract class Sao_Zed_Pdf_Component_Model_Document_Base
{
    const PAGE_MARGIN = 1;

    const DEFAULT_FONT_SIZE = 11;
    const DEFAULT_LINE_LEADING = 1.0;

    const PAGE_FORMAT = Page::SIZE_LETTER;

    /**
     * @var ProjectA_Zed_Library_Pdf_Document
     */
    protected $pdfDocument;

    /**
     * @var ProjectA_Zed_Library_Pdf_Font
     */
    protected $font;

    protected abstract function createLayout();

    public function __construct()
    {
        $this->pdfDocument = new ProjectA_Zed_Library_Pdf_Document();
    }

    /**
     * @param $fileName
     */
    public function savePdfToFile($fileName)
    {
        $this->createLayout();
        $this->pdfDocument->savePdfToFile($fileName);
    }

    /**
     * @return string
     */
    public function renderPdf()
    {
        $this->createLayout();
        return $this->pdfDocument->renderPdf();
    }

    /**
     * @param $text
     * @param $data
     * @return mixed
     */
    protected function replacePlaceHolders($text, $data)
    {
        $translateHelper = new ProjectA_Zed_Library_Translate_Helper();
        return $translateHelper->replacePlaceHolders($text, $data);
    }

    /**
     * @param $text
     * @param int $fontSize
     * @param float $leading
     * @return ProjectA_Zed_Library_Pdf_Object_Text
     */
    protected function createTextObject($text, $fontSize = null, $leading = self::DEFAULT_LINE_LEADING)
    {
        $fontSize = ($fontSize) ? $fontSize : static::DEFAULT_FONT_SIZE;

        $textObject = new ProjectA_Zed_Library_Pdf_Object_Text();
        $textObject->setText($text);
        $textObject->setFont($this->getFont());
        $textObject->setFontStyle(ProjectA_Zed_Library_Pdf_Font::STYLE_REGULAR);
        $textObject->setFontSize($fontSize);
        $textObject->setLeading($leading);

        return $textObject;
    }

    /**
     * @return ProjectA_Zed_Library_Pdf_Object_Empty
     */
    protected function getEmptyPdfObject()
    {
        return new ProjectA_Zed_Library_Pdf_Object_Empty();
    }

    protected function getPageWidth()
    {
        $pageSize = explode(':', self::PAGE_FORMAT);
        return $pageSize[0];
    }

    protected function getPageHeight()
    {
        $pageSize = explode(':', self::PAGE_FORMAT);
        return $pageSize[1];
    }

    /**
     * @return ProjectA_Zed_Library_Pdf_Font
     */
    protected function getFont()
    {
        if (!$this->font) {
            $this->font = new ProjectA_Zed_Library_Pdf_Font_LiberationLatinSubset();
        }
        return $this->font;
    }

    protected function calculateTextWidth($text)
    {
        $textObject = $this->createTextObject($text);
        $textObject->setFontStyle(ProjectA_Zed_Library_Pdf_Font::STYLE_BOLD);
        $pageSize = explode(':', Page::SIZE_A4);

        $textSize = $textObject->calculateSize($pageSize[1]);

        return $textSize['width'];
    }

    /**
     * @param $data
     * @return ProjectA_Zed_Library_Pdf_Object_Text
     */
    protected function getTextCell($data)
    {
        $text = $this->createTextObject('');
        $text->setFontSize(static::DEFAULT_FONT_SIZE);
        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            $text->$methodName($value);
        }

        return $text;
    }


    /**
     * @param $rowCells
     * @return ProjectA_Zed_Library_Pdf_Object_Table_Row
     */
    protected function getTableRow($rowCells)
    {
        $headerRow = new ProjectA_Zed_Library_Pdf_Object_Table_Row();
        foreach ($rowCells as $rowCell) {
            $options = [];
            if (isset($rowCell['cellOptions'])) {
                $options = $rowCell['cellOptions'];
                unset($rowCell['cellOptions']);
            }
            if (isset($rowCell['object'])) {
                $headerRow->addDataCell($rowCell['object'], $options);
            } else {

                $headerRow->addDataCell($this->getTextCell($rowCell), $options);
            }
        }

        return $headerRow;
    }

    /**
     * get translation
     * @param string $key
     * @return string
     */
    protected function _t($key)
    {
        return __($key);
    }
}
