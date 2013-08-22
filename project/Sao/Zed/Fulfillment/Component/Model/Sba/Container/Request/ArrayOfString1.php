<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1 extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var string[] */
    protected $Accessorial = [];

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            if (is_array($obj->Accessorial)) {
                foreach ($obj->Accessorial as $accessorial) {
                    $this->addAccessorial($accessorial);
                }
            } else {
                $this->Accessorial[] = (string)$obj->Accessorial;
            }
        }
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1
     */
    public function addAccessorial($value)
    {
        $this->Accessorial[] = $value;
        return $this;
    }

    /**
     * @param string[] $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1
     */
    public function setAccessorial(array $value)
    {
        $this->Accessorial = $value;
        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getAccessorial()
    {
        return $this->Accessorial;
    }

}
