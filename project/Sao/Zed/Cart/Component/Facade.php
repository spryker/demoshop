<?php

class Sao_Zed_Cart_Component_Facade extends ProjectA_Zed_Cart_Component_Facade
{

    /**
     * @var Sao_Zed_Cart_Component_Factory
     */
    protected $factory;

    /**
     * @param string $sku
     * @return bool
     */
    public function isOriginalProduct($sku)
    {
        return $this->factory->getModelCart()->isOriginalProduct($sku);
    }

}
