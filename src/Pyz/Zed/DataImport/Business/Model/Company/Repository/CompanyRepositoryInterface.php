<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Company\Repository;

interface CompanyRepositoryInterface
{
    /**
     * @param string $name
     *
     * @return int
     */
    public function getIdCompanyByName(string $name): int;
}
