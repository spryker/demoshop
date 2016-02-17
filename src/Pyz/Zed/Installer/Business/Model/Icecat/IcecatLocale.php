<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

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
