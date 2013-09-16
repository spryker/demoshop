<?php

class Pyz_Shared_Sales_Transfer_Order_Payment extends ProjectA_Shared_Sales_Transfer_Order_Payment
{
    protected $ccValid = false;

    public function setCcValid($ccJsCheckValid)
    {
        $this->ccValid = $ccJsCheckValid;
    }

    public function getCcValid()
    {
        return $this->ccValid;
    }

}
