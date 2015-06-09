<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;

class ProductOptionValue implements VisitableProductInterface
{

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $key;

    /**
     * @var int|null
     */
    private $sequence;

    /**
     * @var ProductOptionValueConstraint[]
     */
    private $constraints = [];

    /**
     * @param ProductVisitorInterface $visitor
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitProductOptionValue($this);

        $visitor->setContext($this);

        foreach($this->constraints as $constraint) {
            $constraint->accept($visitor);
        }

        $visitor->leaveContext();
    }

    /**
     * @param string $key
     * @param int $sequence
     * @param ProductOptionValueConstraint[] $constraints
     */
    public function __construct($key, $sequence = null, array $constraints = [])
    {
        $this->key = $key;
        $this->sequence = $sequence;

        foreach ($constraints as $constriant) {
            $this->addConstraint($constriant);
        }
    }

    /**
     * @param ProductOptionValueConstraint $constraint
     */
    private function addConstraint(ProductOptionValueConstraint $constraint)
    {
        $this->constraints[] = $constraint;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return int|null
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @return ProductOptionValueConstraint[]
     */
    public function getConstraints()
    {
        return $this->constraints;
    }
}
