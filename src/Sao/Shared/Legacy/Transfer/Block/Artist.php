<?php

class Sao_Shared_Legacy_Transfer_Block_Artist extends ProjectA_Shared_Library_Abstract_Object
{

    /**
     * @var int
     */
    protected $userId = null;
    protected $_userId = array('is_int');

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

}
