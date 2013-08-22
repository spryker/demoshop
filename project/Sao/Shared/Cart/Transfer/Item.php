<?php

class Sao_Shared_Cart_Transfer_Item extends ProjectA_Shared_Cart_Transfer_Item
{

    protected $isMerged = null;
    protected $_isMerged = array();

    /**
     * @param bool $isMerged
     *
     * @return ProjectA_Shared_Cart_Transfer_Item
     */
    public function setIsMerged($isMerged)
    {
        $this->isMerged = $isMerged;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsMerged()
    {
        return $this->isMerged;
    }

}
