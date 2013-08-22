<?php

class Sao_Shared_Mail_Transfer_CustomerCareMessage extends Sao_Shared_Mail_Transfer_Order implements ProjectA_Shared_Mail_Transfer_Interface_Unique
{
    protected $stateName = null;
    protected $_stateName = array('is_string');

    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * @param string $stateName
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;
    }
}
