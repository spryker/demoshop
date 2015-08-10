<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\ProductExporter\Communication\Model;

use SprykerFeature\Shared\Product\Model\AbstractProductInterface;

class AbstractProduct implements AbstractProductInterface
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
    protected $name = '';

    /**
     * @var array
     */
    protected $concreteProducts = [];

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
     */
    public function setAbstractAttributes(array $attributes)
    {
        $this->abstractAttributes = $attributes;
    }

    /**
     * @param string    $name
     * @param mixed     $value
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
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     *
     * @return null|mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->abstractAttributes)) {
            return $this->abstractAttributes[$name];
        }

        return;
    }

    /**
     * @param string    $name
     * @param mixed     $arguments
     *
     * @return null|mixed
     */
    public function __call($name, $arguments)
    {
        return $this->__get($name);
    }

    /**
     * @return array
     */
    public function getConcreteProducts()
    {
        return $this->concreteProducts;
    }

    /**
     * @param array $products
     */
    public function setConcreteProducts(array $products)
    {
        $this->concreteProducts = $products;
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
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

}
