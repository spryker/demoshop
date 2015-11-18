<?php

namespace Pyz\Zed\Product\Business\Attribute;

class AttributeConverter implements AttributeConverterInterface
{

    /**
     * @param string|array $attributes
     */
    public function getAttributes($attributes)
    {
        if (is_string($attributes)) {
            $attributes = $this->getAttributesFromAttributesJson($attributes);
        }

        return $attributes;
    }

    /**
     * @param string $attributesJson
     *
     * @throws \Exception
     * @return array
     */
    protected function getAttributesFromAttributesJson($attributesJson)
    {
        $attributes = json_decode($attributesJson, true);
        if ($attributes === false) {
            throw new \Exception('Invalid attributes json string.');
        }

        return $attributes;
    }
}
