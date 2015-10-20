<?php

namespace Pyz\Zed\Propel\Business\QueryBuilder;

use Propel\Runtime\ActiveQuery\ModelCriteria;

interface PostgresGroupByQueryBuilderInterface
{
    /**
     * @info It is not possible to have a select-column in a group-query without
     * either grouping by that column or aggregating it.
     *
     * @param ModelCriteria $baseQuery
     */
    public function addAggregateToNotGroupedColumns(ModelCriteria $baseQuery);
}
