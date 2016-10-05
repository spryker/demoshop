<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Model;

use Spryker\Shared\Product\Model\ProductAbstractInterface;

class ProductAbstract implements ProductAbstractInterface
{

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var bool
     */
    protected $isActive = true;

    /**
     * @var string
     */
    protected $sku = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var array
     */
    protected $category = [];

    /**
     * @var int
     */
    protected $id = [];

    /**
     * @var int
     */
    protected $price;

    /**
     * @var array
     */
    protected $images = [];

    /**
     * @var array
     */
    protected $superAttributes = [];

    /**
     * @var array
     */
    protected $availableAttributes = [];

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return array
     */
    public function getSuperAttributes()
    {
        return $this->superAttributes;
    }

    /**
     * @param array $superAttributes
     */
    public function setSuperAttributes(array $superAttributes)
    {
        $this->superAttributes = $superAttributes;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     *
     * @return void
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return void
     */
    public function addAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive();
    }

    /**
     * @param bool $isActive
     *
     * @return void
     */
    public function setIsActive($isActive = true)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     *
     * @return void
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     *
     * @return mixed|null
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        return null;
    }

    /**
     * @param string $name
     * @param mixed $arguments
     *
     * @return mixed|null
     */
    public function __call($name, $arguments)
    {
        return $this->__get($name);
    }

    /**
     * @return array
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param array $category
     *
     * @return void
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getAvailableAttributes()
    {
        return $this->availableAttributes;
    }

    /**
     * @param array $availableAttributes
     */
    public function setAvailableAttributes($availableAttributes)
    {
        $this->availableAttributes = $availableAttributes;
    }

}
