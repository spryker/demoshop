<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2 extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var string[] */
    protected $A = [];

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            if (is_array($obj->A)) {
                foreach ($obj->A as $a) {
                    $this->addA($a);
                }
            } else {
                $this->A[] = (string)$obj->A;
            }
        }
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2
     */
    public function addA($value)
    {
        $this->A[] = $value;
        return $this;
    }

    /**
     * @param string[] $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2
     */
    public function setA(array $value)
    {
        $this->A = $value;
        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getA()
    {
        return $this->A;
    }

}
