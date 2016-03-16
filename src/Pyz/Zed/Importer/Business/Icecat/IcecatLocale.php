<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Icecat;

class IcecatLocale
{

    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return int
     */
    public function getSid()
    {
        return $this->data['sid'];
    }

    /**
     * @return int
     */
    public function getCountryId()
    {
        return $this->data['countryId'];
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->data['countryCode'];
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->data['code'];
    }

}
