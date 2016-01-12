<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Product\Builder;

use Pyz\Yves\Product\Model\ProductAbstract;

class FrontendProductBuilder implements FrontendProductBuilderInterface
{

    /**
     * @var ProductAbstract
     */
    protected $productAbstract;

    /**
     * @param ProductAbstract $productAbstract
     */
    public function __construct(ProductAbstract $productAbstract)
    {
        $this->abstractProduct = $productAbstract;
    }

    /**
     * @param array $productData
     *
     * @return ProductAbstract
     */
    public function buildProduct(array $productData)
    {
        $productAbstract = $this->createAbstractProductClone();
        foreach ($productData as $name => $value) {
            $arrayParts = explode('_', strtolower($name));
            $arrayParts = array_map('ucfirst', $arrayParts);

            $setter = 'set' . implode('', $arrayParts);

            if (method_exists($productAbstract, $setter)) {
                $productAbstract->{$setter}($value);
            } else {
                $productAbstract->addAttribute($name, $value);
            }
        }

        return $productAbstract;
    }

    /**
     * @return ProductAbstract
     */
    protected function createAbstractProductClone()
    {
        return clone $this->abstractProduct;
    }

}
