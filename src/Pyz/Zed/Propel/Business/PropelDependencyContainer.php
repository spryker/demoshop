<?php

namespace Pyz\Zed\Propel\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\PropelBusiness;
use SprykerEngine\Zed\Propel\Business\PropelDependencyContainer as SprykerPropelDependencyContainer;

/**
 * @method PropelBusiness getFactory()
 */
class PropelDependencyContainer extends SprykerPropelDependencyContainer
{
    /**
     * @return QueryBuilder\PostgresGroupByQueryBuilder
     */
    public function createPostgresGroupByQueryBuilder()
    {
        return $this->getFactory()->createQueryBuilderPostgresGroupByQueryBuilder();
    }

}
