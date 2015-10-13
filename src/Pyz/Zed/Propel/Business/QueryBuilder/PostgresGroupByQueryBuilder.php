<?php

namespace Pyz\Zed\Propel\Business\QueryBuilder;

use Propel\Runtime\ActiveQuery\ModelCriteria;

class PostgresGroupByQueryBuilder implements PostgresGroupByQueryBuilderInterface
{

    /**
     * @info It is not possible to have a select-column in a group-query without
     * either grouping by that column or aggregating it.
     * http://stackoverflow.com/questions/18061285/postgresql-must-appear-in-the-group-by-clause-or-be-used-in-an-aggregate-functi
     *
     * @param ModelCriteria $baseQuery
     *
     * @return ModelCriteria
     */
    public function addAggregateToNotGroupedColumns(ModelCriteria $baseQuery)
    {
        $selectColumns = $baseQuery->getSelectColumns();
        $asColumns = $baseQuery->getAsColumns();
        $groupByColumns = $baseQuery->getGroupByColumns();

        $baseQuery->clearSelectColumns();

        $selectColumns = $this->prepareColumns($selectColumns, $groupByColumns);
        $asColumns = $this->prepareColumns($asColumns, $groupByColumns);

        foreach ($selectColumns as $columnName) {
            $baseQuery->addSelectColumn($columnName);
        }

        foreach ($asColumns as $alias => $columnName) {
            $baseQuery->addAsColumn($alias, $columnName);
        }

        return $baseQuery;
    }

    /**
     * @param array $columns
     * @param array $groupByColumns
     *
     * @return array
     */
    protected function prepareColumns(array $columns, array $groupByColumns)
    {
        foreach ($columns as $key => $column) {
            if ($this->containsAggregate($column) &&
                !in_array($column, $groupByColumns) &&
                !in_array($key, $groupByColumns)) {
                $column = $this->addMinAggregate($column);
            }
            $columns[$key] = $column;
        }

        return $columns;
    }

    /**
     * @param $columnName
     *
     * @return string
     */
    protected function addMinAggregate($columnName)
    {
        return 'MIN(' . $columnName . ')';
    }

    /**
     * @param $columnName
     *
     * @return bool
     */
    protected function containsAggregate($columnName)
    {
        return strpos($columnName, '(') === false;
    }

}
