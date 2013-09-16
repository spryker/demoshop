<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Pyz_Shared_Mail_Transfer_Cart_Abandoned_AbstractSequence extends Pyz_Shared_Mail_Transfer_Cart_Abandoned_AbstractStep
{
    protected $incrementId;
    protected $_incrementId = array('is_string');

    /**
     * @return mixed
     */
    public function getIncrementId()
    {
        return $this->incrementId;
    }

    /**
     * @param mixed $incrementId
     */
    public function setIncrementId($incrementId)
    {
        $this->incrementId = $incrementId;
    }
}
