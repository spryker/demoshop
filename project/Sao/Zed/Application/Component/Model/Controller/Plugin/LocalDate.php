<?php
/**
 * Created by JetBrains PhpStorm.
 * User: slangwald
 * Date: 25.06.13
 * Time: 17:58
 * To change this template use File | Settings | File Templates.
 */
class Sao_Zed_Application_Component_Model_Controller_Plugin_LocalDate extends Zend_Controller_Plugin_Abstract implements Sao_Zed_Application_Component_Model_Controller_Dependency_Facade_Interface{

    /**
     * @var array
     */
    protected $_whiteList = array(
        //'search' => array('created_at' => 'Y-m-d', 'updated_at' => 'Y-m-d'),
        'created_at' => null,
        'updated_at' => null,
    );

    /**
     * @param Zend_Controller_Request_Abstract $request
     */
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $params = $request->getParams();

        foreach($this->_whiteList as $key => $value) {
            if(isset($params[$key])) {
                if(is_array($value)) {
                    foreach($value as $secondLevelKey => $secondLevelValue) {
                        if(isset($params[$key][$secondLevelKey])) {
                            $format = $this->_getDateFormat($secondLevelValue);
                            $params[$key][$secondLevelKey]['value'] = Sao_Shared_Library_Date::dateTimeConvertFrom($params[$key][$secondLevelKey]['value'], $format);
                        }
                    }
                }
                else {
                    $format = $this->_getDateFormat($value);
                    $params[$key] = Sao_Shared_Library_Date::dateTimeConvertFrom($params[$key], $format);
                }
            }
        }

        $request->setParams($params);
        parent::preDispatch($request);
    }

    protected function _getDateFormat($config) {
        if($config == null) {
            $format = 'Y-m-d H:i:s';
        }
        else {
            $format = $config;
        }

        return $format;
    }

}
