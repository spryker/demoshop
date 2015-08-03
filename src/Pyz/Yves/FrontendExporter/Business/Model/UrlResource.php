<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\FrontendExporter\Business\Model;

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
     * @param string $referenceKey
     * @param string $type
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
