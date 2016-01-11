<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\Collector\Persistence\Exporter\Factory\PdoQueryAdapter;

class PostgreSqlPdoQueryAdapterFactory
{

    public function createQueryAdapter($name)
    {
        $queryBuilderClassName = "\\Pyz\\Zed\\Collector\\Persistence\\Storage\\Pdo\\PostgreSql\\${name}";

        return new $queryBuilderClassName();
    }

}
