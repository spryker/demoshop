<?php
/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>
 */

abstract class Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Abstract
{

    const MESSAGE_TYPE = 'abstract';

    const MESSAGE_GROUP = 'abstract';

    const MESSAGE_CONTAINER = 'abstract';

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var string
     */
    protected $apiKey;


    /**
     * @var array required fields for all types of requests (Quote and Order)
     */
    protected $requiredFields = ['userId', 'apiKey'];

    /**
     * @var array optional fields
     */
    protected $optionalFields = [];

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    protected function getRequiredFields()
    {
        return $this->requiredFields;
    }

    /**
     * @return array
     */
    protected function getOptionalFields()
    {
        return $this->optionalFields;
    }

    /**
     * @return array
     */
    protected function getAllFields()
    {
        return array_merge(
            $this->requiredFields,
            $this->optionalFields
        );
    }

    /**
     * @return string
     */
    public function getMessageType()
    {
        return static::MESSAGE_TYPE;
    }

    /**
     * @return string
     */
    public function getMessageGroup()
    {
        return static::MESSAGE_GROUP;
    }

    /**
     * @return string
     */
    public function getMessageContainer()
    {
        return ucfirst(strtolower(static::MESSAGE_CONTAINER));
    }


    /**
     * @return string
     */
    public function getMessageContainerName()
    {
        return $this->getMessageGroup() . $this->getMessageContainer();
    }

}