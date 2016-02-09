<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Mapper;


use Symfony\Component\Console\Output\OutputInterface;

/**
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
class Category extends AbstractMapper
{

    protected $dataFilename = 'CategoriesList.xml';

    protected function getIcecatData()
    {
        return [];
    }

}
