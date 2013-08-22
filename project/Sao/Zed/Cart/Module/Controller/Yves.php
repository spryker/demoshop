<?php
use ProjectA\Shared\Library\Error\ErrorLogger;

/**
 * @property Sao_Zed_Cart_Component_Facade $facadeCart
 */
class Sao_Zed_Cart_Module_Controller_Yves extends ProjectA_Zed_Cart_Module_Controller_Yves
{
    /**
     * @param Sao_Shared_Cart_Transfer_Change $cartChange
     * @param bool $deltaQuantity
     * @return bool
     */
    protected function canPerformCartChange(Sao_Shared_Cart_Transfer_Change $cartChange, $deltaQuantity = false)
    {
        $returnValue = parent::canPerformCartChange($cartChange, $deltaQuantity);

        if (!$returnValue) {
            $ex = new Exception($this->messages[0]['message'] . ' ' . $cartChange->getCartItems()->getFirstItem()->getSku());
            ErrorLogger::log($ex);
        }

        return $returnValue;
    }
}
