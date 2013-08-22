<?php

/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>, Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Legacy_Component_Model_Share_Cart_Guest extends Sao_Zed_Legacy_Component_Model_Share_Adapter_Db
{
    const LEGACY_TABLE_NAME = 'carts';

    /**
     * @var array
     */
    protected $fields = array(
        'cart_hash' => 'cart_cookie',
        'sku',
        'quantity',
        'is_deleted' => 'deleted'
    );

    public function getGuestCartHashes($page = 0, $count = 30)
    {
        return $this->getAdapter()->select()
            ->from(static::LEGACY_TABLE_NAME, array_slice($this->fields, 0, 1))
            ->where('deleted=0 AND quantity>0 AND last_modified >= \'' . date(ProjectA_Zed_Library_Date::MYSQL_DATETIME_FORMAT, (new DateTime())->sub(DateInterval::createFromDateString('31 days'))->getTimestamp()) . '\'')
            ->limitPage($page, $count)
            ->query()
            ->fetchAll();
    }

    public function getGuestCartItemsByHashes(array $hashes)
    {
        return $this->getAdapter()->select()
            ->from(static::LEGACY_TABLE_NAME, $this->fields)
            ->where('cart_cookie IN (?)', $hashes)
            ->query()
            ->fetchAll();
    }
}
