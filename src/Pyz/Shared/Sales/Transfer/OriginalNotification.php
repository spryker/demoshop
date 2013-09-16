<?php
/**
 * Class Pyz_Shared_Sales_Transfer_OriginalNotification
 */
class Pyz_Shared_Sales_Transfer_OriginalNotification extends ProjectA_Shared_Library_Abstract_Object
{

    // Artist confirmed availability
    const RESULT_MESSAGE_CONFIRM = 'confirm';
    // Artist refute availability
    const RESULT_MESSAGE_REFUTE = 'refute';
    // Artist can not change from available to unavailable
    const RESULT_MESSAGE_INVALID_AVAILABLE_TO_UNAVAILABLE = 'from available to unavailable not allowed';
    // Artist can not change from unavailable to available
    const RESULT_MESSAGE_INVALID_UNAVAILABLE_TO_AVAILABLE = 'from unavailable to available not allowed';

    /**
     * @var string $hash
     */
    protected $hash;
    protected $_hash = array('is_string');

    /**
     * @var string $status
     */
    protected $status;
    protected $_status = array('is_string');

    /**
     * @var
     */
    protected $resultMessage;
    protected $_resultMessage = array('is_string');

    /**
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $hash
     *
     * @return Pyz_Shared_Sales_Transfer_OriginalNotification
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param $resultMessage
     * @return $this
     */
    public function setResultMessage($resultMessage)
    {
        $this->resultMessage = $resultMessage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultMessage()
    {
        return $this->resultMessage;
    }

}
