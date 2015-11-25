<?php

namespace Pyz\Yves\Catalog\Communication\Plugin\BlockController;

use Pyz\Yves\Catalog\Communication\CatalogDependencyContainer;
use Pyz\Yves\CmsBlock\Communication\Handler\BlockHandler;
use Pyz\Yves\CmsBlock\Dependency\Plugin\BlockControllerInterface;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CatalogDependencyContainer getDependencyContainer
 */
class CatalogBlockController extends AbstractPlugin implements BlockControllerInterface
{

    const CATALOG = 'catalog';

    /**
     * @return string
     */
    public function getTemplateType()
    {
        return self::CATALOG;
    }

    /**
     * @param array $pageAttributes
     * @param Request $request
     *
     * @return array
     */
    public function blockAction(array $pageAttributes, Request $request)
    {
        $idCategoryNode = $pageAttributes[BlockHandler::ID_CATEGORY_NODE];
        $categoryClient = $this->getDependencyContainer()->createCatalogClient();
        $categoryNode = $categoryClient->getCategoryNodeById($idCategoryNode, $request->getLocale());

        $search = $categoryClient->createFacetSearch($request, $categoryNode);
        $search->setItemsPerPage(999);

        return array_merge(
            $search->getResult(),
            [
                'category' => $categoryNode
            ]
        );
    }
}
