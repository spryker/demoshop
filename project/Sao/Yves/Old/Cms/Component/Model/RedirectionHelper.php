<?php

class Sao_Yves_Cms_Component_Model_RedirectionHelper
{
    /**
     * @var string
     */
    const TYPE_TEMPORARY_302 = 'Temporary_302';

    /**
     * @var string
     */
    const TYPE_PERMANENT_301 = 'Permanent_301';

    /**
     * @var array
     */
    protected $redirection;

    public function __construct(Sao_Yves_Library_Base_Controller $controller)
    {
        header('X-Cms: 1');
    }

    /**
     * @param array $redirection
     *
     * @return void
     */
    public function setRedirection($redirection)
    {
        $this->redirection = $redirection;
    }

    /**
     * @return string|null
     */
    public function getTargetUrl()
    {
        if ($this->redirection && isset($this->redirection['url_target'])) {
            return $this->redirection['url_target'];
        }

        return null;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        if ($this->redirection && isset($this->redirection['type'])) {
            return $this->redirection['type'];
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        if ($this->redirection && isset($this->redirection['status'])) {
            return $this->redirection['status'] == 'Active';
        }

        return false;
    }

}
