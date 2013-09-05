<?php

/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>
 */
class Sao_Zed_Legacy_Component_Model_Share_Cart_User
    extends Sao_Zed_Legacy_Component_Model_Share_Adapter_Db
{
    public function getUserCartItems()
    {
        $fields = array(
            'user_id',
            'sku',
            'quantity',
            'is_deleted' => 'deleted'
        );
        return $this->getAdapter()->select()
            ->from('user_cart', $fields)
            ->where('deleted=0 AND quantity>0')
            ->query()
            ->fetchAll();
    }
}
