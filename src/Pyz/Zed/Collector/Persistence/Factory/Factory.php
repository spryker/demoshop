<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\Collector\Persistence\Exporter\Factory;

abstract class Factory implements QueryAdapterFactoryInterface
{

    /**
     * @var
     */
    protected $databaseAdapterType;

    /**
     * @param string $databaseAdapterType 'MySql', 'PostgreSql'
     */
    public function __construct($databaseAdapterType)
    {
        $this->databaseAdapterType = $databaseAdapterType;
    }

    /**
     * @return mixed
     */
    public function createFactory()
    {
        $adapterName = $this->databaseAdapterType;
        $factoryAdapterClassName = "\\SprykerFeature\\Zed\\Collector\\Persistence\\Exporter\\Factory\\PdoQueryAdapter\\${adapterName}PdoQueryAdapterFactory";

        return new $factoryAdapterClassName();
    }

}
