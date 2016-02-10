<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;

/*
<Product Code="1" HighPic="http://images.icecat.biz/img/norm/high/24683119-3185.jpg" HighPicHeight="356" HighPicSize="56494" HighPicWidth="474" ID="24683119" LowPic="http://images.icecat.biz/img/norm/low/24683119-3185.jpg" LowPicHeight="150" LowPicSize="13638" LowPicWidth="200" Name="650 G1" Pic500x500="" Pic500x500Height="0" Pic500x500Size="0" Pic500x500Width="0" Prod_id="K4L00UT" Quality="ICECAT" ReleaseDate="2014-09-28" ThumbPic="http://images.icecat.biz/thumbs/24683119.jpg" ThumbPicSize="3117" Title="HP ProBook 650 G1">
    <Category ID="151">
        <Name ID="436933" Value="Notebooks" langid="4"/>
    </Category>
    <CategoryFeatureGroup ID="269" No="-100">
        <FeatureGroup ID="0">
            <Name ID="438000" Value="Technische Details" langid="4"/>
        </FeatureGroup>
    </CategoryFeatureGroup>
 */
class ProductImporter extends AbstractIcecatImporter
{
    /**
     * @var string
     */
    protected $dataFilename = 'icecat.xml';

    /**
     * @param string $localeName
     * @param int $icecatLangId
     *
     */
    public function import($localeName, $icecatLangId)
    {
        $xml = $this->xmlReader->getXml($this->dataFilename);

        $fileCollection = $xml->xpath('//file');
        foreach ($fileCollection as $fileNode) {
            $attributes = $fileNode->attributes();
            $productFilename = 'products/' . basename($attributes['path']);

            if (!$this->xmlReader->isXmlFile($productFilename)) {
                continue;
            }

            $productData = $this->getProductDataXml($productFilename);

            dump($attributes, $productData);
        }

    }

    /**
     * @param string $filename
     *
     * @return \SimpleXMLElement
     */
    protected function getProductDataXml($filename)
    {
        $xml = $this->xmlReader->getXml($filename);

        $productNodes = $xml->xpath('//Product');
        $productNode = $productNodes[0];
        $attributes = $productNode->attributes();

        return $attributes;
    }

}
