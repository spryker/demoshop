<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Db;

use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Connection\StatementInterface;

class MysqlBatchStorageProvider implements BatchStorageProviderInterface
{

    /**
     * @param string $tableName
     * @param array $columns
     * @param array $values
     */
    public function save($tableName, array $columns, array $values)
    {
        $sql = $this->generateSql($tableName, $columns, count($values));

        $stmt = $this->getConnection()->prepare($sql);
        $this->bindValues($stmt, $values);

        $stmt->execute();
    }

    /**
     * @param string $tableName
     * @param array $columns
     * @param int $rowCount
     *
     * @return string
     */
    private function generateSql($tableName, array $columns, $rowCount)
    {
        $columnCount = count($columns);
        $placeholders = rtrim(str_repeat('?,', $columnCount), ',') ;

        $placeholderSql = '';

        for ($i = 0; $i < $rowCount; ++$i) {
            $placeholderSql .= '(' . $placeholders . '),';
        }

        $placeholderSql = rtrim($placeholderSql, ',');

        $sql = sprintf(
            "REPLACE INTO $tableName (%s) VALUES %s",
            implode(', ', $columns),
            $placeholderSql
        );

        return $sql;
    }

    /**
     * @param StatementInterface $stmt
     * @param array $values
     */
    private function bindValues(&$stmt, array $values)
    {
        $i = 1;
        foreach($values as $rowValues) {
            foreach ($rowValues as $value) {
                $stmt->bindValue($i++, $value);
            }
        }
    }

    /**
     * @return ConnectionInterface
     */
    private function getConnection()
    {
        return Propel::getConnection();
    }
}
