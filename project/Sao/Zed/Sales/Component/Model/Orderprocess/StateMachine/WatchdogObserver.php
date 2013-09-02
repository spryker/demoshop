<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_WatchdogObserver implements
    SplObserver,
    ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;



    /**
     * @var array
     */
    protected static $watches = [];

    /**
     * @see SplObserver::update()
     */
    public function update (SplSubject $subject)
    {
        if ($subject instanceof ProjectA_Zed_Library_StateMachine) {

            /* @var $orderItem ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
            $orderItem = $subject->getOwner();

            if (!isset(self::$watches[$orderItem->getIdSalesOrderItem()])) {
                self::$watches[$orderItem->getIdSalesOrderItem()] = 0;
            }

            self::$watches[$orderItem->getIdSalesOrderItem()]++;

            $count = self::$watches[$orderItem->getIdSalesOrderItem()];

            if ($count >= 50) {
                $stateName = $subject->getCurrentState();
                $id = $orderItem->getIdSalesOrderItem();
                $e = new ProjectA_Zed_Library_Exception(
                    'The sales-item with id: ' . $id . ' seems to be in endless loop (' . $count . '). Last state: ' . $stateName
                );
                ProjectA_Shared_Library_Error_Handler::sendExceptionToLumberjack($e);
                ProjectA_Shared_Library_Error_Handler::sendExceptionToNewRelic($e);
                // don't break as we do want to see what's up
                sleep(5);
            }
        }
    }

}
