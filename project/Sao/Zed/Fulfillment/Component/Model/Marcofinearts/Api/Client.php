<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Api_Client implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
	use ProjectA_Zed_Library_Dependency_Factory_Trait;

	/**
	 * @var Zend_Soap_Client
	 */
	protected $soapClient;

	/**
	 * 
	 */
	public function __construct()
	{
	}

	protected function getClient()
	{
		if ($this->soapClient == null) {
			$config = ProjectA_Shared_Library_Config::get('printer');
			print_r($config);
		}
		
		return $this->soapClient;
		
	}

}
