<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Category\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * @method \Pyz\Yves\Category\CategoryFactory getFactory()
 */
class CategoryReaderPlugin extends AbstractPlugin
{
    /**
     * @param string $categoryPath
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return array
     */
    public function findCategoryNodeByPath($categoryPath)
    {
        $categoryPathPrefix = '/' . $this->getFactory()->getStore()->getCurrentLanguage();
        $categoryPath = $categoryPathPrefix . '/' . ltrim($categoryPath, '/');

        try {
            $resource = $this->getRouter()->match($categoryPath);
        } catch (ResourceNotFoundException $exception) {
            throw new NotFoundHttpException(
                sprintf('Category node with path "%s" not found.', $categoryPath),
                $exception
            );
        }

        return $resource['categoryNode'];
    }

    /**
     * @return \Symfony\Cmf\Component\Routing\ChainRouterInterface
     */
    protected function getRouter()
    {
        return $this->getFactory()->getApplication()['routers'];
    }
}
