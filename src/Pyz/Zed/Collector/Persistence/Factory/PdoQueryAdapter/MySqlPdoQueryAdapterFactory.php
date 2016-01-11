<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\Collector\Persistence\Exporter\Factory\PdoQueryAdapter;

class MySqlPdoQueryAdapterFactory
{

    public function createQueryAdapter($name)
    {
        $queryBuilderClassName = "\\Pyz\\Zed\\Collector\\Persistence\\Storage\\Pdo\\MySql\\${name}";

        return new $queryBuilderClassName();
    }

}
