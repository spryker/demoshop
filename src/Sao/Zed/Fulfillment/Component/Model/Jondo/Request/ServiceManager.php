<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_ServiceManager
{
    const DOM_SECTION_NAME = 'service';
    const CATEGORY_BRANDING = 'branding';

    /**
     * @var Sao_Zed_Fulfillment_Component_Facade
     */
    protected $printFacade;

    /**
     * @var array
     */
    protected $categories = [];

    /**
     * @var array
     */
    protected $services = [];

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return array
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @return bool
     */
    public function hasServices()
    {
        $total = 0;
        foreach($this->getServices() as $serviceGroup) {
            $total += count($serviceGroup);
        }
        return ($total > 0);
    }

    public function __construct()
    {
        $this->categories[] = self::CATEGORY_BRANDING;
        foreach($this->categories as $category) {
            $this->services[$category] = [];
        }
    }

    /**
     * @param string $category
     * @return array
     * @throws ErrorException
     */
    public function getServicesByCategory($category)
    {
        if(false === in_array($category, $this->getCategories())) {
            throw new ErrorException('Category "' . $category . '" not supported');
        }
        return $this->services[$category];
    }


    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Abstract $service
     * @param string $category ( optional, default = 'branding' )
     */
    public function addService(
        Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Abstract $service,
        $category = self::CATEGORY_BRANDING
    )
    {
        $this->services[$category][] = $service;
    }

    /**
     * @param DOMDocument $dom
     * @param DOMElement $parent
     */
    public function appendToDom(DOMDocument $dom, DOMElement $parent)
    {
        if (false === $this->hasServices()) {
            return;
        }
        $services = $dom->createElement(static::DOM_SECTION_NAME);

        foreach ($this->categories as $category) {
            $categoryElement = $dom->createElement($category);
            /** @var $service Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Abstract */
            $categoryServices = $this->getServicesByCategory($category);
            foreach ($categoryServices as $service) {
                $service->appendToDom($dom, $categoryElement);
            }
            $services->appendChild($categoryElement);
        }
        $parent->appendChild($services);
    }


}
