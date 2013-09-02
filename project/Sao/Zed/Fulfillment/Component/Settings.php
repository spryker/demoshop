<?php

class Sao_Zed_Fulfillment_Component_Settings implements ProjectA_Zed_Library_Component_Interface_SettingsInterface, ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;



    /**
     * @param string $provider
     * @return ProjectA_Shared_Library_Config_Object
     */
    public function getConfigForProvider($provider)
    {
        $config = $this->getConfig();
        if (null !== $provider && $config->offsetExists($provider)) {
            return $config->{$provider};
        }

        return new ProjectA_Shared_Library_Config_Object();
    }

    /**
     * @return ProjectA_Shared_Library_Config_Object
     */
    public function getConfig()
    {
        return ProjectA_Shared_Library_Config::get('fulfillment');
    }

    /**
     * @return ProjectA_Zed_Library_DataStructure_Named_Map
     */
    public function getProviderApis()
    {
        $providers = new ProjectA_Zed_Library_DataStructure_Named_Map();
        $providers->add($this->factory->getModelJondoApi());
        $providers->add($this->factory->getModelMarcofineartsApi());
        $providers->add($this->factory->getModelSbaApi());
        $providers->add($this->factory->getModelUniversalApi());

        return $providers;
    }

}
