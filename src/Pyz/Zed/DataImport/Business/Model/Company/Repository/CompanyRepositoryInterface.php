<?php

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