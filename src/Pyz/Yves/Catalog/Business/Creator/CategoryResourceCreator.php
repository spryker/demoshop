<?php

namespace Pyz\Yves\Catalog\Business\Creator;

use ProjectA\Shared\Application\Business\Controller\ServiceControllerBuilder;
use ProjectA\Yves\Application\Business\Controller\ControllerResolver;
use ProjectA\Yves\YvesExport\Business\Creator\ResourceCreatorInterface;
use Pyz\Yves\Catalog\Business\Model\FacetConfig;
use Silex\Application;

class CategoryResourceCreator implements ResourceCreatorInterface
{
    /**
     * @var FacetConfig
     */
    protected $facetConfig;

    /**
     * @param FacetConfig $facetConfig
     */
    public function __construct(FacetConfig $facetConfig)
    {
        $this->facetConfig = $facetConfig;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'category';
    }

    /**
     * @param Application $app
     * @param $data
     * @return array
     */
    public function createResource(Application $app, $data)
    {
        $resolver = new ControllerResolver('Catalog', 'Catalog', 'index');
        $service = (new ServiceControllerBuilder())->createServiceForController($app, $resolver);

        return [
            '_controller' => $service,
            '_route' => $resolver->getRouteName(),
            'category' => $data,
            'facetConfig' => $this->facetConfig,
        ];
    }
}