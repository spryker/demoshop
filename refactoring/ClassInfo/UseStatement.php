<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Spryker\Refactor\ClassInfo;

class UseStatement
{

    /**
     * @var string
     */
    private $fullUseStatement;

    /**
     * @var string
     */
    private $useAlias;

    /**
     * @var bool
     */
    private $hasAlias = false;

    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $classNamespace;

    /**
     * @return string
     */
    public function getFullUseStatement()
    {
        return $this->fullUseStatement;
    }

    /**
     * @param string $fullUseStatement
     *
     * @return UseStatement
     */
    public function setFullUseStatement($fullUseStatement)
    {
        $this->fullUseStatement = $fullUseStatement;

        return $this;
    }

    /**
     * @return string
     */
    public function getUseAlias()
    {
        return $this->useAlias;
    }

    /**
     * @param string $useAlias
     *
     * @return UseStatement
     */
    public function setUseAlias($useAlias)
    {
        $this->useAlias = $useAlias;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasAlias()
    {
        return ($this->getUseAlias() !== null);
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param string $className
     *
     * @return UseStatement
     */
    public function setClassName($className)
    {
        $this->className = $className;

        return $this;
    }

    /**
     * @return string
     */
    public function getClassNamespace()
    {
        return $this->classNamespace;
    }

    /**
     * @param string $classNamespace
     *
     * @return UseStatement
     */
    public function setClassNamespace($classNamespace)
    {
        $this->classNamespace = $classNamespace;

        return $this;
    }

}
