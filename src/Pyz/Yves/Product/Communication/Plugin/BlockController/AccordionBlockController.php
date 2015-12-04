<?php

namespace Pyz\Yves\Product\Communication\Plugin\BlockController;

use Pyz\Yves\CmsBlock\Communication\Handler\BlockHandler;
use Pyz\Yves\CmsBlock\Dependency\Plugin\BlockControllerInterface;
use Pyz\Yves\Product\Communication\ProductDependencyContainer;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method ProductDependencyContainer getDependencyContainer
 */
class AccordionBlockController extends AbstractPlugin implements BlockControllerInterface
{
    const PDP_ACCORDION = 'pdp_accordion';

    /**
     * @return string
     */
    public function getTemplateType()
    {
        return self::PDP_ACCORDION;
    }

    /**
     * @param array $pageAttributes
     * @param Request $request
     *
     * @return array
     */
    public function blockAction(array $pageAttributes, Request $request)
    {
        $idProduct = $pageAttributes[BlockHandler::ID_PRODUCT];
        $product = $this->getDependencyContainer()
            ->createProductClient()
            ->getAbstractProductFromStorageByIdForCurrentLocale($idProduct);

        if (isset(
            $product['abstract_attributes'],
            $product['abstract_attributes']['feeding_recommendation'],
            $product['abstract_attributes']['feeding_recommendation']['markdown']
        )) {
            $result['feeding_recommendation'] = $product['abstract_attributes']['feeding_recommendation']['markdown'];
        }
        if (isset(
            $product['abstract_attributes'],
            $product['abstract_attributes']['product_info'],
            $product['abstract_attributes']['product_info']['markdown']
        )) {
            $result['product_info']  = $product['abstract_attributes']['product_info']['markdown'];
        }

        return $result;
    }
}
