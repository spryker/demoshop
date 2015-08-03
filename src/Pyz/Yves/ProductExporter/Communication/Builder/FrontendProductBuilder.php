<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\ProductExporter\Communication\Builder;

use Generated\Yves\Ide\FactoryAutoCompletion\ProductExporter;
use SprykerEngine\Shared\Kernel\Factory\FactoryInterface;
use Pyz\Yves\ProductExporter\Communication\Model\AbstractProduct;

class FrontendProductBuilder implements FrontendProductBuilderInterface
{

    /**
     * @var FactoryInterface|ProductExporter
     */
    protected $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param array $productData
     *
     * @return AbstractProduct
     */
    public function buildProduct(array $productData)
    {
        $product = $this->factory->createModelAbstractProduct();

        foreach ($productData as $name => $value) {
            $arrayParts = explode('_', strtolower($name));
            $arrayParts = array_map('ucfirst', $arrayParts);

            $setter = 'set' . implode('', $arrayParts);

            if (method_exists($product, $setter)) {
                $product->{$setter}($value);
            } else {
                $product->addAttribute($name, $value);
            }
        }

        return $product;
    }

}
