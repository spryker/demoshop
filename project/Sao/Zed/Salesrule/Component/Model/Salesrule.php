<?php

/**
 * Class Sao_Zed_Salesrule_Component_Model_Salesrule
 *
 * @property Sao_Zed_Salesrule_Component_Factory $factory
 */
class Sao_Zed_Salesrule_Component_Model_Salesrule extends ProjectA_Zed_Salesrule_Component_Model_Salesrule
{

    /**
     * Modified version for Saatchi
     * Does not group the discount items by type, but saves all discounts as they are in order to be able to send the
     * raw discount-data back to the Artist-portal
     *
     * @see ProjectA_Zed_Salesrule_Component_Model_Salesrule::addDiscountAmountsToItem
     */
    public function addDiscountAmountsToItem(
        Sao_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item, Sao_Shared_Sales_Transfer_Order_Item $transferItem
    ) {
        $discounts = new PropelCollection();
        $isRefundable = $this->getIsRefundable($transferOrder);

        foreach ($transferItem->getDiscounts() as $discount) {
            /* @var Sao_Shared_Sales_Transfer_Discount $discount */
            $this->appendSaoDiscountToCollection(
                $item, $discounts, $discount, $isRefundable, self::DISCOUNT_ATTACHED_TO_ITEM
            );
        }

        if ($discounts->count() > 0) {
            $item->setDiscounts($discounts);
        }

        return true;
    }

    /**
     * Interface slightly changed to ProjectA_Zed_Salesrule_Component_Model_Salesrule::appendDiscountToCollection
     *
     * @param BaseObject              $entity
     * @param PropelCollection        $discounts
     * @param Sao_Shared_Sales_Transfer_Discount $transferDiscount
     * @param bool                    $isRefundable
     * @param string                  $type
     *
     * @return bool
     *
     * @see ProjectA_Zed_Salesrule_Component_Model_Salesrule::appendDiscountToCollection
     */
    protected function appendSaoDiscountToCollection(
        BaseObject $entity, PropelCollection $discounts, Sao_Shared_Sales_Transfer_Discount $transferDiscount,
        $isRefundable = false, $type
    ) {
        if ($transferDiscount->getAmount() <= 0) {
            return false;
        }

        $discount = new ProjectA_Zed_Sales_Persistence_PacSalesDiscount();
        $discount->setIsRefundable($isRefundable);

        $discount->setAmount($transferDiscount->getAmount());

        switch ($type) {
            case self::DISCOUNT_ATTACHED_TO_ITEM:
                $discount->setFkSalesOrderItem($entity->getPrimaryKey());
                break;

            case self::DISCOUNT_ATTACHED_TO_ORDER:
                $discount->setFkSalesOrder($entity->getPrimaryKey());
                break;

            case self::DISCOUNT_ATTACHED_TO_EXPENSE:
                $discount->setFkSalesExpense($entity->getPrimaryKey());
                break;
        }

        $saoDiscount = new Sao_Zed_Sales_Persistence_SaoSalesDiscount();
        $saoDiscount->setSaatchiAmount($transferDiscount->getSaatchiAmount());
        $saoDiscount->setArtistAmount($transferDiscount->getArtistAmount());
        $saoDiscount->setDiscount($discount);

        $discounts->append($discount);
        return true;
    }

    /**
     * (non-PHPdoc)
     *
     * @see Zed/library/Pal/Crud/Pal_Crud_Interface::create()
     */
    public function create(array $data)
    {
        $entity = $this->getEntity();
        $entity->fromArray($data);
        if ($entity->validate()) {
            $entity->save();
        }

        // Sao
        $saoEntity = $this->getSaoEntity();
        $saoEntity->fromArray($data);
        $saoEntity->setPrimaryKey($entity->getPrimaryKey());
        if ($saoEntity->validate()) {
            $saoEntity->save();
        }

        return new ProjectA_Zed_Library_Component_Model_Result($entity);
    }

    /**
     * (non-PHPdoc)
     *
     * @see Zed/library/Pal/Crud/Pal_Crud_Interface::read()
     */
    public function read($id)
    {

        $query = $this->getQuery();
        $entity = $query->findPK($id);

        if ($entity) {
            $saoQuery = $this->getSaoQuery();
            $saoEntity = $saoQuery->findOneByIdSalesrule($id);
            if ($saoEntity) {
                foreach ($saoEntity->toArray() as $k => $v) {
                    $entity->setVirtualColumn($k, $v);
                }
            }
        }

        return new ProjectA_Zed_Library_Component_Model_Result($entity);
    }

    /**
     * (non-PHPdoc)
     *
     * @see Zed/library/Pal/Crud/Pal_Crud_Interface::update()
     */
    public function update($id, array $data)
    {
        $query = $this->getQuery();
        $entity = $query->findPK($id);
        $entity->fromArray($data);
        $modifiedColumns = $entity->getModifiedColumns();

        if ($entity->validate()) {
            $entity->save();
        }

        // Sao
        $saoQuery = $this->getSaoQuery();
        $saoEntity = $saoQuery->findPK($id);

        $saoEntity->fromArray($data);
        $saoModifiedColumns = $saoEntity->getModifiedColumns();

        if ($saoEntity->validate()) {
            $saoEntity->save();
        }

        foreach ($entity->toArray() as $k => $v) {
            $entity->setVirtualColumn($k, $v);
        }

        $result = new ProjectA_Zed_Library_Component_Model_Result($entity);
        // $result->setEntityModifiedColumns($modifiedColumns);
        $result->setEntityModifiedColumns(array_merge($modifiedColumns, $saoModifiedColumns));

        return $result;
    }

    /**
     * @param int $idSalesrule
     */
    public function deleteSalesrule($idSalesrule)
    {
        $saoSalesruleEntity = Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery::create()->findPk($idSalesrule);
        $saoSalesruleEntity->delete();

        $salesruleEntity = ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery::create()->findPk($idSalesrule);
        $conditions = ProjectA_Zed_Salesrule_Persistence_PacSalesruleConditionQuery::create()->findByFkSalesrule($salesruleEntity->getPrimaryKey());

        $connection = $this->getPropelConnection();
        $connection->beginTransaction();

        foreach ($conditions as $condition) {
            /* @var ProjectA_Zed_Salesrule_Persistence_PacSalesruleCondition $condition */
            $condition->delete();
        }
        $salesruleEntity->delete();

        $connection->commit();
    }

    /**
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery
     */
    public function getSaoQuery()
    {
        return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery::create();
    }

    /**
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesrule
     */
    protected function getSaoEntity()
    {
        return new Sao_Zed_Salesrule_Persistence_SaoSalesrule();
    }
}
