<?php

namespace Pyz\Yves\Product\Builder;

use Pyz\Yves\Product\Model\ProductAbstract;

class FrontendProductBuilder implements FrontendProductBuilderInterface
{

    /**
     * @var \Pyz\Yves\Product\Model\ProductAbstract
     */
    protected $productAbstract;

    /**
     * @param \Pyz\Yves\Product\Model\ProductAbstract $productAbstract
     */
    public function __construct(ProductAbstract $productAbstract)
    {
        $this->productAbstract = $productAbstract;
    }

    /**
     * @param array $productData
     *
     * @return \Pyz\Yves\Product\Model\ProductAbstract
     */
    public function buildProduct(array $productData)
    {
        $productAbstract = $this->createProductAbstractClone();
        $productAbstract->setName($productData['abstract_name']);

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
     * @return \Pyz\Yves\Product\Model\ProductAbstract
     */
    protected function createProductAbstractClone()
    {
        return clone $this->productAbstract;
    }

}
