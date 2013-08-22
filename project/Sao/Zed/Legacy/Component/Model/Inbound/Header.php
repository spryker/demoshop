<?php

class Sao_Zed_Legacy_Component_Model_Inbound_Header
{
    /**
     * @return string
     */
    public function getLegacyHeader()
    {
        $request = $this->getLegacyRequest();
        /* @var Sao_Shared_Legacy_Transfer_Response_Legacy $transferResponse */
        $transferResponse = $request->request('legacy/webservice/header', Generated_Shared_Library_TransferLoader::getApplicationRequest());

        if ($transferResponse && $transferResponse->getSuccess() && $transferResponse->getMessages()->count()) {
            return unserialize($transferResponse->getMessages()->getFirstItem()->getMessage());
        }

        return '';
    }

    /**
     * @return Sao_Shared_Library_Legacy_Request
     */
    protected function getLegacyRequest()
    {
        return new Sao_Shared_Library_Legacy_Request();
    }

}