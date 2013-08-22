<?php
/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>
 */
abstract class Sao_Zed_Legacy_Component_Model_Share_Adapter_Db
{
    /**
     * @var Zend_Db_Adapter_Pdo_Mysql
     */
    protected $db;

    /**
     * @return Zend_Db_Adapter_Abstract
     */
    public function getAdapter()
    {
        if(false === $this->db instanceof Zend_Db_Adapter_Abstract) {
            $dbConfig = ProjectA_Shared_Library_Config::get('legacy_db')->getData();
            $dbConfig['dbname'] = $dbConfig['database'];
            $this->db = Zend_Db::factory('Pdo_Mysql', $dbConfig);
        }
        return $this->db;
    }


}