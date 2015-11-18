<?php

namespace Pyz\Zed\Product\Business\Attribute;

interface AttributeConverterInterface
{

    /**
     * @param string|array $attributes
     *
     * @return array
     */
    public function getAttributes($attributes);

}
