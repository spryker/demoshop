<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Spryker\Refactor\ClassInfo;

class ClassInfo
{

    /**
     * @var UseStatement[]
     */
    private $useStatements = [];

    /**
     * @param UseStatement $useStatement
     *
     * @return self
     */
    public function addUseStatement(UseStatement $useStatement)
    {
        $this->useStatements[] = $useStatement;

        return $this;
    }

    public function getUseStatements()
    {
        return $this->useStatements;
    }
}
