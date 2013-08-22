<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var string[] */
    protected $SpecialService = [];

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            if (is_array($obj->SpecialService)) {
                foreach ($obj->SpecialService as $specialService) {
                    $this->addSpecialService($specialService);
                }
            } else {
                $this->SpecialService[] = (string)$obj->SpecialService;
            }
        }
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString
     */
    public function addSpecialService($value)
    {
        $this->SpecialService[] = $value;
        return $this;
    }

    /**
     * @param string[] $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString
     */
    public function setSpecialService(array $value)
    {
        $this->SpecialService = $value;
        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getSpecialService()
    {
        return $this->SpecialService;
    }

}
