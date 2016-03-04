<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;

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
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint[]
     */
    private $constraints = [];

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface $visitor
     *
     * @return void
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitProductOptionValue($this);

        $visitor->setContext($this);

        foreach ($this->constraints as $constraint) {
            $constraint->accept($visitor);
        }

        $visitor->leaveContext();
    }

    /**
     * @param string $key
     * @param int $sequence
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint[] $constraints
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
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint $constraint
     *
     * @return void
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
     *
     * @return void
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
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint[]
     */
    public function getConstraints()
    {
        return $this->constraints;
    }

}
