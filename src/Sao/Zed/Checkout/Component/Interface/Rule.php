<?php

interface Sao_Zed_Checkout_Component_Interface_Rule
{

    /**
     * @return bool
     */
    public function match();

    /**
     * @return bool
     */
    public function executeAction();

}
