<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace PhpStan\DynamicType;

use Exception;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\DynamicMethodReturnTypeExtension;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;

abstract class AbstractSprykerDynamicTypeExtension implements DynamicMethodReturnTypeExtension
{
    protected $methodResolves = [];

    /**
     * @param MethodReflection $methodReflection
     *
     * @return bool
     */
    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        if (isset($this->methodResolves[$methodReflection->getName()])) {
            return true;
        }

        return false;
    }

    /**
     * @param MethodReflection $methodReflection
     * @param MethodCall $methodCall
     * @param Scope $scope
     * @return Type
     *
     * @throws Exception
     */
    public function getTypeFromMethodCall(MethodReflection $methodReflection, MethodCall $methodCall, Scope $scope): Type
    {
        $docComment = $scope->getClassReflection()->getNativeReflection()->getDocComment();
        preg_match_all('#@method\s+(?:(?P<IsStatic>static)\s+)?(?:(?P<Type>[^\(\*]+?)(?<!\|)\s+)?(?P<MethodName>[a-zA-Z0-9_]+)(?P<Parameters>(?:\([^\)]*\))?)#', $docComment, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            if ($match['MethodName'] === $methodCall->name) {
                return new ObjectType($match['Type']);
            }
        }

        throw new Exception();
    }
}
