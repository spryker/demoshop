<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_KageInfo[] */
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
                $this->Package[] = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_KageInfo($obj->Package);
            }
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_KageInfo $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo
     */
    public function addPackage(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_KageInfo $value)
    {
        $this->Package[] = $value;
        return $this;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo[] $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo
     */
    public function setPackage(array $value)
    {
        $this->Package = $value;
        return $this;
    }

    /**
     * @return array|Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_KageInfo[]
     */
    public function getPackage()
    {
        return $this->Package;
    }

}
