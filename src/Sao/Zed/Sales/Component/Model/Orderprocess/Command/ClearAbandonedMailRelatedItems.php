<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_ClearAbandonedMailRelatedItems extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements
    ProjectA_Zed_Sales_Component_Interface_OrderCommand,
    ProjectA_Zed_Mail_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Mail_Component_Dependency_Facade_Trait;

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        $saoOrder = $orderEntity->getSaoOrder();
        if ($saoOrder) {
            $userId = $saoOrder->getUserId();
            /* @var Sao_Zed_Cart_Persistence_SaoCartUser $saoCartUserEntity */
            $saoCartUserEntity = (new Sao_Zed_Cart_Persistence_SaoCartUserQuery())->findOneByUserId($userId);
            if ($saoCartUserEntity) {
                $cartUser = $saoCartUserEntity->getCartUser();
                $this->facadeMail->clearAbandonedRelatedItemsSetNoBlacklistEntry($cartUser);
                $this->addNote('Cleared AbandonedMail Related items', $orderEntity, true);
            }
        }
    }
}
