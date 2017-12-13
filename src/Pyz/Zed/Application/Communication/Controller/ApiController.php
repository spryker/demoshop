<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Application\Communication\Controller;

use ReflectionClass;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Spryker\Zed\Kernel\Locator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ApiController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction(Request $request)
    {
        $handler = new class {

            /**
             * @var int
             */
            protected $statusCode = 200;

            /**
             * @var \Generated\Zed\Ide\AutoCompletion|\Spryker\Shared\Kernel\LocatorLocatorInterface
             */
            protected $locator;

            public function __construct()
            {
                $this->locator = Locator::getInstance();
            }

            /**
             * @param \Symfony\Component\HttpFoundation\Request $request
             *
             * @return string
             */
            public function getResponse(Request $request)
            {
                $module = ($request->query->has('facade')) ? $request->query->get('facade') : false;
                $method = ($request->query->has('method')) ? $request->query->get('method') : false;

                if ($module && $method) {
                    $facade = $this->locator->$module()->facade();
                    if (method_exists($facade, $method)) {
                        $facadeReflection = new ReflectionClass($facade);
                        $methodReflection = $facadeReflection->getMethod($method);
                        $methodParameters = $methodReflection->getParameters();

                        $propertyTypes = [];
                        foreach ($methodParameters as $methodParameter) {
                            $propertyTypes[$methodParameter->getName()] = 'undefined';
                            if ($methodParameter->hasType()) {
                                $propertyTypes[$methodParameter->getName()] = $methodParameter->getType()->getName();
                            }
                        }

                        $content = $request->getContent();
                        $content = json_decode($content, true);

                        $resolved = [];

                        foreach ($propertyTypes as $propertyName => $propertyType) {
                            if (isset($content[$propertyName])) {
                                $resolved[] = $content[$propertyName];
                                continue;
                            }

                            if (preg_match('/^Generated\\\\Shared\\\\Transfer\\\\(.*)/', $propertyType, $match)) {
                                $transfer = new $propertyType();
                                $className = get_class($transfer);
                                if (isset($content[$className])) {
                                    $transfer->fromArray($content[$className]);
                                }
                                if (isset($content[$match[1]])) {
                                    $transfer->fromArray($content[$match[1]]);
                                }

                                $resolved[] = $transfer;
                                continue;
                            }

                            if ($propertyType === 'undefined') {
                                $resolved[] = $propertyName;
                            }
                        }


                        $result = call_user_func_array([$facade, $method], $resolved);
                        if ($result instanceof AbstractTransfer) {
                            $transferClassNameParts = explode('\\', get_class($result));
                            $className = array_pop($transferClassNameParts);

                            $result = [
                                $className => $result->toArray(),
                            ];
                        }

                        return json_encode(['response' => $result]);
                    }
                };

                $this->statusCode = 500;

                throw new BadRequestHttpException('Could not fulfill current request');
            }

            /**
             * @return int
             */
            public function getResponseCode()
            {
                return $this->statusCode;
            }
        };

        return new JsonResponse($handler->getResponse($request), $handler->getResponseCode());
    }
}
