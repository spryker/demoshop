<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Business\Model;

class UrlResource
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $referenceKey;

    /**
     * @param string|null $referenceKey
     * @param string|null $type
     */
    public function __construct($referenceKey = null, $type = null)
    {
        $this->referenceKey = $referenceKey;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getReferenceKey()
    {
        return $this->referenceKey;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->type = $data['type'];
        $this->referenceKey = $data['reference_key'];

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->type,
            'reference_key' => $this->referenceKey,
        ];
    }
}
