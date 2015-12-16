<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Product\Builder;

use Pyz\Yves\Product\Model\AbstractProduct;

class FrontendProductBuilder implements FrontendProductBuilderInterface
{

    /**
     * @var AbstractProduct
     */
    protected $abstractProduct;

    /**
     * @param AbstractProduct $abstractProduct
     */
    public function __construct(AbstractProduct $abstractProduct)
    {
        $this->abstractProduct = $abstractProduct;
    }

    /**
     * @param array $productData
     *
     * @return AbstractProduct
     */
    public function buildProduct(array $productData)
    {
        $abstractProduct = $this->createAbstractProductClone();
        foreach ($productData as $name => $value) {
            $arrayParts = explode('_', strtolower($name));
            $arrayParts = array_map('ucfirst', $arrayParts);

            $setter = 'set' . implode('', $arrayParts);

            if (method_exists($abstractProduct, $setter)) {
                $abstractProduct->{$setter}($value);
            } else {
                $abstractProduct->addAttribute($name, $value);
            }
        }

        return $abstractProduct;
    }

    /**
     * @return AbstractProduct
     */
    protected function createAbstractProductClone()
    {
        return clone $this->abstractProduct;
    }

}
