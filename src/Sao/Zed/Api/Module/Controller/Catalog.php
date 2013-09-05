<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Api_Module_Controller_Catalog extends ProjectA_Zed_Library_Controller_Rest implements
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface,
    Sao_Zed_Library_Dependency_ArtistPortalInterface
{

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use Sao_Zed_ArtistPortal_Component_Dependency_Facade_Trait;

    /**
     * @var string
     */
    protected $id;

    /**
     * The index action handles index/list requests; it should respond with a
     * list of the requested resources.
     */
    public function index($version)
    {
        $this->getResponse()->setHttpResponseCode(200);
        $this->getResponse()->setHeader('Content-Type', 'text/plain');
        return [
            'name' => 'ArtistPortal Catalog Sync Service',
            'info' => 'JSON pretty print only active in non production environments',
            'GET' => [
                'description' => 'Get data of product (not activated)',
                'exampleUrl' => 'GET:/api/v' . $version . '/catalog/SKU1234'
            ],
            'HEAD' => [
                'description' => 'Check if a product exists',
                'exampleUrl' => 'HEAD:/api/v' . $version . '/catalog/SKU1234'
            ],
            'POST' => [
                'description' => 'send array of products or one single product for creation or update',
                'exampleUrl' => 'POST:/api/v' . $version . '/catalog/'
            ],
            'PUT' => [
                'description' => 'send array of products or one single product for creation or update (not activated)',
                'exampleUrl' => 'PUT:/api/v' . $version . '/catalog/'
            ],
            'DELETE' => [
                'description' => 'Delete one product by sku (not activated)',
                'exampleUrl' => 'DELETE:/api/v' . $version . '/catalog/SKU1234'
            ]
        ];
    }

    /**
     * The head action handles HEAD requests and receives an 'id' parameter; it
     * should respond with the server resource state of the resource identified
     * by the 'id' value.
     */
    public function head($id, $version)
    {
        $product = $this->facadeCatalog->getProductBySku($this->getParam('id'));

        // we only show products that are available as item not abstract products like bundles or configs
        if ($product && $product->getIsItem()) {
            $this->getResponse()->setHttpResponseCode(200);
        } else {
            $this->getResponse()->setHttpResponseCode(404);
        }
    }

    /**
     * @param string $id
     * @param int $version
     */
    public function get($id, $version)
    {
        $this->getResponse()->setHttpResponseCode(403);
        $this->getResponse()->setBody('{"error": "GET is not allowed"}');
    }

    /**
     * @param array $data
     * @param int $version
     * @return mixed|void
     */
    public function put($data, $version)
    {
        $this->post($data, $version);
    }

    /**
     * @param array $data
     * @param int $version
     * @return array|mixed
     */
    public function post($data, $version)
    {
        $lumberjack = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
        $lumberjack->addField('request', $this->getRequest()->getRawBody()); // do net decode this data, we wanna see the raw response
        $lumberjack->send(Sao_Shared_Lumberjack_Log_Types::ARTIST_PORTAL, 'Product Sync Request', 'request');

        $result = $this->facadeArtistPortal->processProducts($data);

        $lumberjack = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
        $lumberjack->addField('response', $result);
        $lumberjack->send(Sao_Shared_Lumberjack_Log_Types::ARTIST_PORTAL, 'Product Sync Response', 'response');

        if (isset($result['response_code'])) {
            $this->getResponse()->setHttpResponseCode($result['response_code']);
        }
        return $result;
    }

    public function delete($id, $version)
    {
    }

}
