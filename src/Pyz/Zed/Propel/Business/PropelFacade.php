<?php

namespace Pyz\Zed\Propel\Business;

use Propel\Runtime\ActiveQuery\ModelCriteria;
use SprykerEngine\Zed\Propel\Business\PropelFacade as SprykerPropelFacade;

/**
 * @method PropelDependencyContainer getDependencyContainer()
 */
class PropelFacade extends SprykerPropelFacade
{
    /**
     * @param ModelCriteria $baseQuery
     *
     * @return ModelCriteria
     */
    public function addAggregateToNotGroupedColumns(ModelCriteria $baseQuery)
    {
        return $this->getDependencyContainer()
            ->createPostgresGroupByQueryBuilder()
            ->addAggregateToNotGroupedColumns($baseQuery)
        ;
    }
}
