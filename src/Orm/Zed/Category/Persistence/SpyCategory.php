<?php

namespace Orm\Zed\Category\Persistence;

use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Collection\ObjectCollection;
use SprykerFeature\Zed\Category\Persistence\Propel\AbstractSpyCategory as BaseSpyCategory;

/**
 * Skeleton subclass for representing a row from the 'spy_category' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class SpyCategory extends BaseSpyCategory
{

    /**
     * @param int $idLocale
     *
     * @return SpyCategoryAttribute[]|ObjectCollection
     */
    public function getLocalisedAttributes($idLocale)
    {
        $criteria = new Criteria();
        $criteria->addAnd(
            SpyCategoryAttributeTableMap::COL_FK_LOCALE,
            $idLocale,
            Criteria::EQUAL
        );

        return $this->getAttributes($criteria);
    }

}
