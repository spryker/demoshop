<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Pyz_Shared_Mail_Transfer_Cart_Abandoned_Item extends Pyz_Shared_Mail_Transfer_Mail
{
    protected $image;
    protected $_image = array('is_string');

    protected $name;
    protected $_name = array('is_string');

    protected $artistName;
    protected $_artistName = array('is_string');

    protected $subText;
    protected $_subText = array('is_string');

    protected $price;
    protected $_price = array('is_int');

    protected $formattedPrice;
    protected $_formattedPrice = array('is_string');

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getFormattedPrice()
    {
        return $this->formattedPrice;
    }

    /**
     * @param mixed $formattedPrice
     */
    public function setFormattedPrice($formattedPrice)
    {
        $this->formattedPrice = $formattedPrice;
    }

    /**
     * @return mixed
     */
    public function getSubText()
    {
        return $this->subText;
    }

    /**
     * @param mixed $subText
     */
    public function setSubText($subText)
    {
        $this->subText = $subText;
    }

    /**
     * @return mixed
     */
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * @param mixed $artistName
     */
    public function setArtistName($artistName)
    {
        $this->artistName = $artistName;
    }
}
