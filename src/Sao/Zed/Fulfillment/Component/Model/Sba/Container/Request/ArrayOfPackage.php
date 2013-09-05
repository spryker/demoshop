<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage[] */
    protected $Package = [];

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            if (is_array($obj->Package)) {
                foreach ($obj->Package as $package) {
                    $this->addPackage($package);
                }
            } else {
                $this->Package[] = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage($obj->Package);
            }
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage
     */
    public function addPackage(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage $value)
    {
        $this->Package[] = $value;
        return $this;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage[] $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage
     */
    public function setPackage(array $value)
    {
        $this->Package = $value;
        return $this;
    }

    /**
     * @return array|Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage[]
     */
    public function getPackage()
    {
        return $this->Package;
    }

}
