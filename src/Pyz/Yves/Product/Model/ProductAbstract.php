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
    protected $abstractAttributes = [];

    /**
     * @var bool
     */
    protected $isActive = true;

    /**
     * @var string
     */
    protected $abstractSku = '';

    /**
     * @var string
     */
    protected $abstractProductId = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var array
     */
    protected $productConcreteCollection = [];

    /**
     * @var array
     */
    protected $category = [];

    /**
     * @return array
     */
    public function getAbstractAttributes()
    {
        return $this->abstractAttributes;
    }

    /**
     * @param array $attributes
     *
     * @return void
     */
    public function setAbstractAttributes(array $attributes)
    {
        $this->abstractAttributes = $attributes;
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return void
     */
    public function addAttribute($name, $value)
    {
        $this->abstractAttributes[$name] = $value;
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
    public function getAbstractSku()
    {
        return $this->abstractSku;
    }

    /**
     * @param string $sku
     *
     * @return void
     */
    public function setAbstractSku($sku)
    {
        $this->abstractSku = $sku;
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
        if (array_key_exists($name, $this->abstractAttributes)) {
            return $this->abstractAttributes[$name];
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
    public function getProductConcreteCollection()
    {
        return $this->ProductConcreteCollection;
    }

    /**
     * @param array $products
     *
     * @return void
     */
    public function setProductConcreteCollection(array $products)
    {
        $this->ProductConcreteCollection = $products;
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
     * @return string
     */
    public function getAbstractProductId()
    {
        return $this->abstractProductId;
    }

    /**
     * @param string $abstractProductId
     * @return void
     */
    public function setAbstractProductId($abstractProductId)
    {
        $this->abstractProductId = $abstractProductId;
    }

}
