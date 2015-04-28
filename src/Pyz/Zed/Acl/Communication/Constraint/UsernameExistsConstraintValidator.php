<?php

namespace Pyz\Zed\Acl\Communication\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UsernameExistsConstraintValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        $exists = $constraint->getLocator()->user()->facade()->hasUserByUsername($value);

        if (true === $exists) {
            $this->addViolation($value, $constraint);
        }
    }

    /**
     * @param $value
     * @param Constraint $constraint
     */
    protected function addViolation($value, Constraint $constraint)
    {
        $this->buildViolation($constraint->message)
            ->setParameter('{{ value }}', $value)
            ->addViolation();
    }
}
