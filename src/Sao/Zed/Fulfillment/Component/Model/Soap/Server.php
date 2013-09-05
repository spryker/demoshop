<?php

class Sao_Zed_Fulfillment_Component_Model_Soap_Server extends Zend_Soap_Server {

    /**
     * @param DOMDocument|DOMNode|SimpleXMLElement|stdClass|string $request
     * @return $this|Zend_Soap_Server
     * @throws Zend_Soap_Server_Exception
     */
    protected function _setRequest($request)
    {
        if ($request instanceof DOMDocument) {
            $xml = $request->saveXML();
        } elseif ($request instanceof DOMNode) {
            $xml = $request->ownerDocument->saveXML();
        } elseif ($request instanceof SimpleXMLElement) {
            $xml = $request->asXML();
        } elseif (is_object($request) || is_string($request)) {
            if (is_object($request)) {
                $xml = $request->__toString();
            } else {
                $xml = $request;
            }

            libxml_disable_entity_loader(true);
            $dom = new DOMDocument();
            if (strlen($xml) == 0 || !$dom->loadXML($xml)) {
                // require_once 'Zend/Soap/Server/Exception.php';
                libxml_disable_entity_loader(false);
                throw new Zend_Soap_Server_Exception('Invalid XML');
            }
            foreach ($dom->childNodes as $child) {
                if ($child->nodeType === XML_DOCUMENT_TYPE_NODE) {
                    // require_once 'Zend/Soap/Server/Exception.php';
                    libxml_disable_entity_loader(false);
                    throw new Zend_Soap_Server_Exception(
                        'Invalid XML: Detected use of illegal DOCTYPE'
                    );
                }
            }
            libxml_disable_entity_loader(false);
        }
        $this->_request = $xml;
        return $this;
    }

}
